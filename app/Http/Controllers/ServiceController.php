<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceDataTable;
use App\Helpers\PermissionCommon;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceDataTable $dataTable)
    {
        if (!PermissionCommon::check('role.list')) abort(403);
        return $dataTable->render('pages.service.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!PermissionCommon::check('role.create')) abort(403);
        $body = view('pages.service.create')->render();
        $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="save()">Save</button>';

        return [
            'title' => 'Tambah Layanan',
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
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ], [
            'nama.required' => 'Nama Layanan harus diisi',
            'deskripsi.required' => 'Deskripsi Layanan harus diisi',
            'harga.required' => 'Harga Layanan harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
        ]);
        $data = $request->except('_token');
        try {
            $trx = Service::create([
                'uid' => Str::uuid()->toString(),
                'nama' => $data['nama'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
            ]);
            if ($trx) {
                return response([
                    'status' => true,
                    'message' => 'Berhasil Membuat Layanan'
                ], 200);
            } else {
                return response([
                    'status' => false,
                    'message' => 'Gagal Membuat Layanan'
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
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        if ($service) {
            $uid = $service->uid;
            $data = $service;
            $body = view('pages.service.edit', compact('uid', 'data'))->render();
            $footer = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>';
            return [
                'title' => 'Edit Layanan',
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
    public function update(Request $request, Service $service)
    {
        if (!PermissionCommon::check('role.update')) abort(403);
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
        ], [
            'nama.required' => 'Nama Layanan harus diisi',
            'deskripsi.required' => 'Deskripsi Layanan harus diisi',
            'harga.required' => 'Harga Layanan harus diisi',
            'harga.numeric' => 'Harga harus berupa angka',
        ]);
        $formData = $request->except(["_token", "_method"]);
        try {
            $trx = $service->update($formData);
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
    public function destroy(Service $service)
    {
        if (!PermissionCommon::check('role.delete')) abort(403);
        try {
            $delete = $service->delete();
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
