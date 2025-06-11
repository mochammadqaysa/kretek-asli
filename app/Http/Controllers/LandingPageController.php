<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientMeta;
use App\Models\ScheduleSetting;
use App\Models\Service;
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
        return view('pages.landing.index', compact('day_schedule', 'morning_schedule', 'afternoon_schedule', 'services'));
    }

    public function create_appointment(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'meta' => 'required|array',
            'meta.jenis_kelamin' => 'required',
            'meta.tanggal_lahir' => 'required',
            'service' => 'required',
            'appointment_date' => 'required',
        ], [
            'nama.required' => 'Nama Lengkap harus diisi',
            'meta.jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'meta.tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'service.required' => 'Layanan harus dipilih',
            'appointment_date.required' => 'Tanggal Janji Temu harus diisi',
        ]);
        $data = $request->except('_token');
        // dd($data);
        try {
            $trxPatient = Patient::create([
                'uid' => Str::uuid()->toString(),
                'nama' => $data['nama'],
                'created_by' => auth()->user()->uid,
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
                    'status' => '0',
                    'created_by' => auth()->user()->uid,
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
}
