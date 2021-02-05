<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Provinsi;
use Validator;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Provinsi',
            'data' => $provinsi
        ], 200);
    }

    public function store(Request $request)
    {
        //validasi data
        $validator = Validator::make($request->all(), [
            'kode_provinsi' => 'required|unique:provinsis',
            'nama_provinsi' => 'required'
        ],
            [
                'kode_provinsi.required' => 'Masukan kode Provinsi',
                'kode_provinsi.unique' => 'Kode Provinsi Sudah Ada',
                'nama_provinsi.required' => 'Masukan nama Provinsi',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data' => $validator->errors()
            ],400);

        } else {

             $provinsi = Provinsi::create([
                'kode_provinsi' => $request->input('kode_provinsi'),
                'nama_provinsi'   => $request->input('nama_provinsi')
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Provinsi!',
                'data'    => $Provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        //validasi data
        $validator = Validator::make($request->all(), [
            'kode_provinsi' => 'required|unique:provinsis',
            'nama_provinsi' => 'required',
        ],
            [
                'kode_provinsi.required' => 'Masukkan kode Provinsi',
                'kode_provinsi.unique' => 'Kode Provinsi Sudah Ada',
                'nama_provinsi.required' => 'Masukkan nama Provinsi',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Data Yang Kosong',
                'data' => $validator->errors()
            ],400);

        } else {

            $provinsi = Provinsi::whereId($request->input('id'))->update([
                'kode_provinsi' => $request->input('kode_provinsi'),
                'nama_provinsi' => $request->input('nama_provinsi'),
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil DiUpdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi Gagal DiUpdate!',
                ], 500);
            }

        }

    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Gagal Dihapus!',
            ], 500);
        }

    }
}