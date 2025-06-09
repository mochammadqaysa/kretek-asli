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
        //
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
