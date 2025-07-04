<?php

namespace App\Http\Controllers;

use App\Helpers\PermissionCommon;
use App\Helpers\Utils;
use App\Models\Appointment;
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


        return view('pages.dashboard.admin', compact('statistics', 'calender'));
    }
}
