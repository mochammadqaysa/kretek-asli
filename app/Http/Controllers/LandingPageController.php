<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Cabang;
use App\Models\Patient;
use App\Models\PatientMeta;
use App\Models\ScheduleSetting;
use App\Models\Service;
use App\Models\Terapis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    public function index()
    {
        $schedule = ScheduleSetting::where('meta_field', 'day_schedule')->first();
        $day_schedule = [];
        if ($schedule) {
            $day_schedule = explode(',', $schedule->meta_value);
        }
        $schedule = ScheduleSetting::where('meta_field', 'morning_schedule')->first();
        $morning_schedule = [];
        if ($schedule) {
            $morning_schedule = explode(',', $schedule->meta_value);
        }
        $schedule = ScheduleSetting::where('meta_field', 'afternoon_schedule')->first();
        $afternoon_schedule = [];
        if ($schedule) {
            $afternoon_schedule = explode(',', $schedule->meta_value);
        }
        $services = Service::all();
        $cabang = Cabang::all();
        $terapis = Terapis::all();
        return view('pages.landing.index', compact('day_schedule', 'morning_schedule', 'afternoon_schedule', 'services', 'cabang', 'terapis'));
    }

    public function create_appointment(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'meta' => 'required|array',
            'meta.jenis_kelamin' => 'required',
            'meta.tanggal_lahir' => 'required',
            'service' => 'required',
            'keluhan' => 'required',
            'appointment_date' => 'required',
            'terapis' => 'required',
            // 'cabang' => 'required',
        ], [
            'nama.required' => 'Nama Lengkap harus diisi',
            'meta.jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'meta.tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'service.required' => 'Layanan harus dipilih',
            'keluhan.required' => 'Keluhan harus diisi',
            'appointment_date.required' => 'Tanggal Janji Temu harus diisi',
            'terapis.required' => 'Terapis harus dipilih',
            // 'cabang.required' => 'Cabang harus dipilih',
        ]);
        $data = $request->except('_token');
        // dd($data);
        try {
            // Ambil data service untuk mendapatkan durasi
            $service = Service::find($data['service']);

            if (!$service) {
                return response([
                    'status' => false,
                    'message' => 'Layanan tidak ditemukan'
                ], 400);
            }

            $date = Carbon::parse($data['appointment_date']);

            // Hitung waktu mulai dan selesai berdasarkan durasi service
            $startTime = $date->copy();
            $endTime = $date->copy()->addMinutes($service->durasi);

            // Cek jumlah appointment di waktu yang sama
            $appointmentCount = Appointment::whereBetween('date_sched', [$startTime, $endTime])->count();

            if ($appointmentCount >= 4) {
                return response([
                    'status' => false,
                    'message' => 'Jam janji temu sudah penuh'
                ], 400);
            }

            // Cek apakah terapis sudah memiliki jadwal yang bentrok
            // Validasi overlap waktu berdasarkan durasi service
            $terapisBooked = Appointment::where('terapis_uid', $data['terapis'])
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->where(function ($q) use ($startTime, $endTime) {
                        // Cek jika appointment baru dimulai di tengah appointment yang sudah ada
                        $q->whereRaw(
                            'date_sched <= ? AND DATE_ADD(date_sched, INTERVAL (SELECT durasi FROM services WHERE uid = service_uid) MINUTE) > ?',
                            [$startTime, $startTime]
                        );
                    })
                        ->orWhere(function ($q) use ($startTime, $endTime) {
                            // Cek jika appointment yang sudah ada dimulai di tengah appointment baru
                            $q->where('date_sched', '>=', $startTime)
                                ->where('date_sched', '<', $endTime);
                        });
                })
                ->exists();

            if ($terapisBooked) {
                return response([
                    'status' => false,
                    'message' => 'Terapis sudah memiliki janji temu di waktu yang sama'
                ], 400);
            }

            $trxPatient = Patient::create([
                'uid' => Str::uuid()->toString(),
                'nama' => $data['nama']
            ]);

            $insertMetas = [];
            $insertMetas[] = [
                'patient_uid' => $trxPatient->uid,
                'meta_field' => 'nama',
                'meta_value' => $data['nama'],
            ];
            foreach ($data['meta'] as $key => $value) {
                if (in_array($key, ['jenis_kelamin', 'kontak', 'email', 'tanggal_lahir', 'alamat'])) {
                    $insertMetas[] = [
                        'patient_uid' => $trxPatient->uid,
                        'meta_field' => $key,
                        'meta_value' => $value,
                    ];
                }
            }
            $trxMetas = PatientMeta::insert($insertMetas);

            if ($trxPatient && $trxMetas) {
                $appointment = Appointment::create([
                    'uid' => Str::uuid()->toString(),
                    'patient_uid' => $trxPatient->uid,
                    'date_sched' => $data['appointment_date'],
                    'service_uid' => $data['service'],
                    'terapis_uid' => $data['terapis'],
                    // 'cabang_uid' => $data['cabang'],
                    'keluhan' => $data['keluhan'],
                    'status' => '1',
                ]);
                if ($appointment) {
                    return response([
                        'status' => true,
                        'message' => 'Berhasil Membuat Janji Temu'
                    ], 200);
                } else {
                    return response([
                        'status' => false,
                        'message' => 'Gagal Membuat Janji Temu'
                    ], 400);
                }
            } else {
                return response([
                    'status' => false,
                    'message' => 'Gagal Membuat Pasien atau Metas'
                ], 400);
            }
        } catch (\Throwable $th) {
            dd($th);
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal'
            ], 400);
        } catch (\Illuminate\Database\QueryException $e) {
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal',
            ], 400);
        }
    }

    public function nearest_cabang(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $userLat = $request->latitude;
        $userLon = $request->longitude;

        $cabangList = Cabang::all();
        $cabangWithDistance = [];

        foreach ($cabangList as $cabang) {
            if ($cabang->latitude && $cabang->longitude) {
                $distance = Cabang::calculateDistance(
                    $userLat,
                    $userLon,
                    $cabang->latitude,
                    $cabang->longitude
                );

                $cabangWithDistance[] = [
                    'uid' => $cabang->uid,
                    'nama' => $cabang->nama,
                    'alamat' => $cabang->alamat,
                    'map_link' => $cabang->map_link,
                    'img_path' => $cabang->img_path,
                    'latitude' => $cabang->latitude,
                    'longitude' => $cabang->longitude,
                    'distance' => round($distance, 2),
                ];
            }
        }

        // Sort by distance, nearest first
        usort($cabangWithDistance, function ($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });

        return response()->json([
            'status' => true,
            'data' => $cabangWithDistance,
        ]);
    }
}
