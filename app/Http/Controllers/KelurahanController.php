<?php

namespace App\Http\Controllers;

use App\Kelurahan;
use App\Kecamatan;
use Illuminate\Http\Request;

// compact = membuat array
class KelurahanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('admin.kelurahan.index',compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.create',compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'kode_kelurahan' => 'required|unique:kelurahans',
                'nama_kelurahan' => 'required|unique:kelurahans',
            ],
            [
                'kode_kelurahan.required' => 'Kode kelurahan harus diisi',
                'kode_kelurahan.unique' => 'Kode kelurahan telah terdaftar',
                'nama_kelurahan.required' => 'kelurahan harus diisi',
                'nama_kelurahan.unique' => 'kelurahan telah terdaftar'
            ]
            );
        $kelurahan = new Kelurahan();
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'DATA KELURAHAN BERHASIL ANDA BUAT']);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.show',compact('kelurahan','kecamatan'));
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::findOrFail($id);
        return view('admin.kelurahan.edit',compact('kelurahan','kecamatan'));

    }

    public function update(Request $request, $id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->id_kecamatan = $request->id_kecamatan;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'DATA KELURAHAN BERHASIL ANDA EDIT']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')
                ->with(['message'=>'DATA KELURAHAN BERHASIL ANDA HAPUS']);
    }
}