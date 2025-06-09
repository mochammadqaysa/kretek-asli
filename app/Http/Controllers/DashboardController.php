<?php

namespace App\Http\Controllers;

use App\Helpers\PermissionCommon;
use App\Models\Usulan;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [];

        return view('pages.dashboard.admin', compact('statistics'));
    }
}
