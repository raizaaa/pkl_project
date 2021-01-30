<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kota;
use Illuminate\Http\Request;

// compact = membuat array
class KecamatanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan'));
    }

    public function create()
    {
        $kota = Kota::all();
        return view('admin.kecamatan.create',compact('kota'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'kode_kecamatan' => 'required|unique:kecamatans',
                'nama_kecamatan' => 'required|unique:kecamatans',
            ],
            [
                'kode_kecamatan.required' => 'Kode kecamatan harus diisi',
                'kode_kecamatan.unique' => 'Kode kecamatan telah terdaftar',
                'nama_kecamatan.required' => 'kecamatan harus diisi',
                'nama_kecamatan.unique' => 'kecamatan telah terdaftar'
            ]
            );
        $kecamatan = new Kecamatan();
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'DATA KECAMATAN BERHASIL ANDA BUAT']);
    }

    public function show($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.show',compact('kecamatan','kota'));
    }

    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit',compact('kecamatan','kota'));

    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'DATA KECAMATAN BERHASIL ANDA EDIT']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index')
                ->with(['message'=>'DATA KECAMATAN BERHASIL ANDA HAPUS']);
    }
}