<?php

namespace App\Http\Controllers;

use App\DataTables\CabangDataTable;
use App\Helpers\PermissionCommon;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CabangDataTable $dataTable)
    {
        if (!PermissionCommon::check('role.list')) abort(403);
        return $dataTable->render('pages.cabang.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!PermissionCommon::check('role.create')) abort(403);
        $body = view('pages.cabang.create')->render();
        $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>';

        return [
            'title' => 'Tambah Cabang',
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
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Cabang harus diisi',
            'alamat.required' => 'Alamat Cabang harus diisi',
        ]);
        $data = $request->except('_token');
        try {
            $trx = Cabang::create([
                'uid' => Str::uuid()->toString(),
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
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
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabang $cabang)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        if ($cabang) {
            $uid = $cabang->uid;
            $data = $cabang;
            $body = view('pages.cabang.edit', compact('uid', 'data'))->render();
            $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>';
            return [
                'title' => 'Edit Cabang',
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
    public function update(Request $request, Cabang $cabang)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ], [
            'nama.required' => 'Nama Cabang harus diisi',
            'alamat.required' => 'Alamat Cabang harus diisi',
        ]);
        $formData = $request->except(["_token", "_method"]);
        try {
            $trx = $cabang->update($formData);
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
    public function destroy(Cabang $cabang)
    {
        if (!PermissionCommon::check('role.delete')) abort(403);
        try {
            $delete = $cabang->delete();
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
