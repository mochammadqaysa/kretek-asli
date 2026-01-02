<?php

namespace App\Http\Controllers;

use App\Helpers\PermissionCommon;
use App\Helpers\Utils;
use App\Models\Appointment;
use App\Models\Cabang;
use App\Models\PatientMeta;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [];
        $totalAppointment = Appointment::count();
        $totalPendingAppotintment = Appointment::where('status', '0')->count();
        $totalConfirmedAppointment = Appointment::where('status', '1')->count();
        $totalCancelledAppointment = Appointment::where('status', '2')->count();
        $statistics['total_appointment'] = $totalAppointment;
        $statistics['total_pending_appointment'] = $totalPendingAppotintment;
        $statistics['total_confirmed_appointment'] = $totalConfirmedAppointment;
        $statistics['total_cancelled_appointment'] = $totalCancelledAppointment;

        $listAppointment = Appointment::all();
        $cabang = Cabang::select('uid', 'nama')->get();
        $calender = [];
        foreach ($listAppointment as $key => $value) {
            $patient = $value->patient;
            $patientMetas = PatientMeta::where('patient_uid', $patient->uid)->get();
            $meta = [];
            foreach ($patientMetas as $metaValue) {
                $meta[$metaValue->meta_field] = $metaValue->meta_value;
            }
            $calender[] = [
                'start' => $value->date_sched,
                'end' => $value->date_sched,
                'title' => $patient ? $patient->nama : 'Unknown',
                'nama' => $patient ? $patient->nama : 'Unknown',
                'keluhan' => $value->keluhan,
                'layanan' => $value->service ? $value->service->nama : 'Unknown',
                'harga' => $value->service ? Utils::rupiah($value->service->harga) : 'Unknown',
                'className' => $value->status == '0' ? 'bg-info' : ($value->status == '1' ? 'bg-success' : 'bg-danger'),
                ...($patientMetas ? $meta : []),
            ];
        }


        return view('pages.dashboard.admin', compact('statistics', 'calender', 'cabang'));
    }

    public function getDashboardStatistics(Request $request)
    {
        $cabangUid = $request->cabang;
        $tanggal = $request->tanggal;

        // Validasi input
        if (!$cabangUid || ! $tanggal) {
            return response()->json([
                'status' => false,
                'message' => 'Cabang dan tanggal harus diisi'
            ], 400);
        }

        // Query untuk mendapatkan total pelanggan dan pendapatan
        // Sesuaikan dengan struktur database Anda
        $appointments = Appointment::where('cabang_uid', $cabangUid)
            ->whereDate('date_sched', $tanggal)
            ->get();
        $sum_pendapatan = 0;
        foreach ($appointments as $appointment) {
            $sum_pendapatan += $appointment->service ? $appointment->service->harga : 0;
        }

        $totalPelanggan = $appointments->count();
        $totalPendapatan = $sum_pendapatan; // sesuaikan dengan field harga

        // Format rupiah untuk total pendapatan
        $totalPendapatanFormatted = 'Rp ' . number_format($totalPendapatan, 0, ',', '.');

        return response()->json([
            'status' => true,
            'data' => [
                'total_pelanggan' => $totalPelanggan . " Orang",
                'total_pendapatan' => $totalPendapatan,
                'total_pendapatan_formatted' => $totalPendapatanFormatted
            ]
        ]);
    }
}
