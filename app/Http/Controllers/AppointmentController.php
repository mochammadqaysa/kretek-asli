<?php

namespace App\Http\Controllers;

use App\DataTables\AppointmentDataTable;
use App\Helpers\PermissionCommon;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\PatientMeta;
use App\Models\ScheduleSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AppointmentDataTable $dataTable)
    {
        if (!PermissionCommon::check('module.list')) abort(403);
        return $dataTable->render('pages.appointment.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!PermissionCommon::check('role.create')) abort(403);
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

        $body = view('pages.appointment.create',compact('day_schedule','morning_schedule','afternoon_schedule'))->render();
        $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>';

        return [
            'title' => 'Tambah Janji Temu',
            'body' => $body,
            'footer' => $footer
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!PermissionCommon::check('role.create')) abort(403);
        $request->validate([
            'nama' => 'required',
            'meta' => 'required|array',
            'meta.jenis_kelamin' => 'required',
            'meta.tanggal_lahir' => 'required',
            'keluhan' => 'required',
            'appointment_date' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama Lengkap harus diisi',
            'meta.jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'meta.tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'keluhan.required' => 'Keluhan harus diisi',
            'appointment_date.required' => 'Tanggal Janji Temu harus diisi',
            'status.required' => 'Status harus dipilih',
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
                    'keluhan' => $data['keluhan'],
                    'date_sched' => $data['appointment_date'],
                    'status' => $data['status'],
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

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        if ($appointment) {
            $uid = $appointment->uid;
            $data = $appointment;
            $meta = PatientMeta::where('patient_uid', $appointment->patient_uid)->get();
            $dataMeta = [];
            foreach ($meta as $m) {
                $dataMeta[$m->meta_field] = $m->meta_value;
            }

            $body = view('pages.appointment.edit', compact('uid', 'data', 'dataMeta'))->render();
            $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>';
            return [
                'title' => 'Edit Janji Temu',
                'body' => $body,
                'footer' => $footer
            ];
        } else {
            return response([
                'status' => false,
                'message' => 'Failed Connect to Server'
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        $request->validate([
            'nama' => 'required',
            'meta' => 'required|array',
            'meta.jenis_kelamin' => 'required',
            'meta.tanggal_lahir' => 'required',
            'keluhan' => 'required',
            'appointment_date' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama Lengkap harus diisi',
            'meta.jenis_kelamin.required' => 'Jenis Kelamin harus dipilih',
            'meta.tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'keluhan.required' => 'Keluhan harus diisi',
            'appointment_date.required' => 'Tanggal Janji Temu harus diisi',
            'status.required' => 'Status harus dipilih',
        ]);
        $formData = $request->except(["_token", "_method"]);
        try {
            $patient = $appointment->patient;
            $patient->nama = $formData['nama'];
            $patient->save();
            $insertMetas = [];
            $insertMetas[] = [
                'patient_uid' => $patient->uid,
                'meta_field' => 'nama',
                'meta_value' => $formData['nama'],
            ];
            foreach ($formData['meta'] as $key => $value) {
                if (in_array($key, ['jenis_kelamin', 'kontak', 'email', 'tanggal_lahir', 'alamat'])) {
                    $insertMetas[] = [
                        'patient_uid' => $patient->uid,
                        'meta_field' => $key,
                        'meta_value' => $value,
                    ];
                }
            }
            $trxMetas = PatientMeta::where('patient_uid', $patient->uid)->delete();
            $trxMetas = PatientMeta::insert($insertMetas);
            if ($trxMetas) {
                $appointment->keluhan = $formData['keluhan'];
                $appointment->date_sched = $formData['appointment_date'];
                $appointment->status = $formData['status'];
                $appointment->save();
                return response([
                    'status' => true,
                    'message' => 'Berhasil Mengubah Janji Temu'
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Gagal Mengubah Janji Temu'
                ], 400);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal',
            ], 400);
        } catch (\Illuminate\Database\QueryException $e) {
            return response([
                'status' => false,
                'message' => 'Terjadi Kesalahan Internal',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        if (!PermissionCommon::check('role.delete')) abort(403);
        try {
            $patient = $appointment->patient;
            $patient->delete();
            $delete = $appointment->delete();
            if ($delete) {
                return response()->json([
                    'message' => 'Berhasil Menghapus Data'
                ]);
            } else {
                return response()->json([
                    'message' => 'Gagal Menghapus Data'
                ]);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Data Failed, this data is still used in other modules !'
            ]);
        }
    }
}
