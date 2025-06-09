<?php

namespace App\Http\Controllers;

use App\Helpers\AuthCommon;
use App\Helpers\PermissionCommon;
use App\Models\ScheduleSetting;
use Illuminate\Http\Request;

class ScheduleSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!PermissionCommon::check('role.list')) abort(403);
        $user = AuthCommon::getUser();
        $day_schedule = explode(',', ScheduleSetting::where('meta_field', 'day_schedule')->first()->meta_value);
        $morning_schedule = explode(',', ScheduleSetting::where('meta_field', 'morning_schedule')->first()->meta_value);
        $afternoon_schedule = explode(',', ScheduleSetting::where('meta_field', 'afternoon_schedule')->first()->meta_value);
        // dd($day_schedule, $morning_schedule, $afternoon_schedule);
        return view('pages.schedule_setting.index', compact('user', 'day_schedule', 'morning_schedule', 'afternoon_schedule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!PermissionCommon::check('role.create')) abort(403);
        $request->validate([
            'days.*' => 'required',
            'morning_from' => 'required',
            'morning_to' => 'required',
            'afternoon_from' => 'required',
            'afternoon_to' => 'required',
        ],[
            'days.*.required' => 'Hari Wajib Diisi',
            'morning_from.required' => 'Jam Mulai Pagi Wajib Diisi',
            'morning_to.required' => 'Jam Selesai Pagi Wajib Diisi',
            'afternoon_from.required' => 'Jam Mulai Siang Wajib Diisi',
            'afternoon_to.required' => 'Jam Selesai Siang Wajib Diisi',
        ]);
        $data = $request->except('_token');
        try {
            ScheduleSetting::where('meta_field', 'day_schedule')->delete();
            ScheduleSetting::where('meta_field', 'morning_schedule')->delete();
            ScheduleSetting::where('meta_field', 'afternoon_schedule')->delete();

            ScheduleSetting::create([
                'meta_field' => 'day_schedule',
                'meta_value' => implode(',', $data['days'])
            ]);

            ScheduleSetting::create([
                'meta_field' => 'morning_schedule',
                'meta_value' => $data['morning_from'] . ',' . $data['morning_to']
            ]);
            ScheduleSetting::create([
                'meta_field' => 'afternoon_schedule',
                'meta_value' => $data['afternoon_from'] . ',' . $data['afternoon_to']
            ]);
            return response([
                'status' => true,
                'message' => 'Berhasil Mengupdate Jadwal'
            ], 200);
        } catch (\Throwable $th) {
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
