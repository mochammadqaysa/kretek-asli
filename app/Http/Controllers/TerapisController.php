<?php

namespace App\Http\Controllers;

use App\DataTables\TerapisDataTable;
use App\Helpers\PermissionCommon;
use App\Models\Cabang;
use App\Models\Terapis;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TerapisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TerapisDataTable $dataTable)
    {
        if (!PermissionCommon::check('role.list')) abort(403);
        return $dataTable->render('pages.terapis.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!PermissionCommon::check('role.create')) abort(403);
        $cabang = Cabang::all();
        $body = view('pages.terapis.create', compact('cabang'))->render();
        $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>';

        return [
            'title' => 'Tambah Terapis',
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
            'cabang' => 'required',
        ], [
            'nama.required' => 'Nama Cabang harus diisi',
            'cabang.required' => 'Cabang harus diisi',
        ]);
        $data = $request->except('_token');
        try {
            $trx = Terapis::create([
                'uid' => Str::uuid()->toString(),
                'nama' => $data['nama'],
                'cabang_uid' => $data['cabang'],
            ]);
            if ($trx) {
                return response([
                    'status' => true,
                    'message' => 'Berhasil Membuat Cabang'
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Gagal Membuat Cabang'
                ], 400);
            }
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
    public function show(Terapis $terapis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uid)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        $terapis = Terapis::find($uid);
        if ($terapis) {
            $uid = $terapis->uid;
            $data = $terapis;
            $cabang = Cabang::all();
            $body = view('pages.terapis.edit', compact('uid', 'data', 'cabang'))->render();
            $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>';
            return [
                'title' => 'Edit Terapis',
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
    public function update(Request $request, $uid)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        $request->validate([
            'nama' => 'required',
            'cabang' => 'required',
        ], [
            'nama.required' => 'Nama Cabang harus diisi',
            'cabang.required' => 'Cabang harus diisi',
        ]);
        $formData = $request->except(["_token", "_method"]);
        try {
            $terapis = Terapis::find($uid);
            //change key cabang to cabang_uid
            $formData['cabang_uid'] = $formData['cabang'];
            unset($formData['cabang']);
            $trx = $terapis->update($formData);
            if ($trx) {
                return response([
                    'status' => true,
                    'message' => 'Data Berhasil Diubah'
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Data Gagal Diubah'
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
    public function destroy($uid)
    {
        if (!PermissionCommon::check('role.delete')) abort(403);
        try {
            $terapis = Terapis::find($uid);
            $delete = $terapis->delete();
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

    public function select2(Request $request)
    {
        $request->validate([
            'limit' => 'required',
            'page' => 'required'
        ]);

        $limit = $request->limit;
        $start = $limit * $request->page;
        $term = isset($request->term) ? $request->term : '';
        $cabang = $request->cabang; // Get the cabang from the request

        $terapis = Terapis::where('cabang_uid', $cabang)->get()->sortBy('nama');
        if ($start) {
            $terapis->skip($start);
        }

        if ($limit) {
            $terapis->take($limit);
        }

        if ($term != '' && $term) {
            $terapis = Terapis::where('nama', 'like', '%' . $term . '%')->skip($start)->take($limit)->get();
        }

        $run = DataTables::of($terapis)->addColumn('id', function ($role) {
            $uid = $role->uid;
            return (string) $uid; // Explicitly cast to string
        })->make(true);
        $decode = json_encode($run);
        $encode = json_decode($decode, true);

        $res['items'] = [];
        $res['total'] = 0;
        if (count($terapis) > 0) {
            $res['items'] = $encode['original']['data'];
            $res['total'] = $encode['original']['recordsFiltered'];
        }
        return $res;
    }

    public function getTerapisByCabang($cabang_uid)
    {
        $terapis = Terapis::where('cabang_uid', $cabang_uid)
            ->get(['uid', 'nama']);

        return response()->json([
            'status' => true,
            'data' => $terapis
        ]);
    }
}
