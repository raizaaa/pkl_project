<?php

namespace App\Http\Controllers;

use App\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __constract(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //
        if($request->has('cari')){
            $provinsi = Provinsi::where('nama_provinsi','LIKE','%'.$request->cari.'%')->paginate(20);
        }
        else{
            $provinsi = Provinsi::all();
        }
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index',compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'kode_provinsi' => 'required|unique:provinsis',
                'nama_provinsi' => 'required|unique:provinsis',
            ],
            [
                'kode_provinsi.required' => 'Kode provinsi harus diisi',
                'kode_provinsi.unique' => 'Kode provinsi telah terdaftar',
                'nama_provinsi.required' => 'Provinsi harus diisi',
                'nama_provinsi.unique' => 'Provinsi telah terdaftar'
            ]
            );
        $provinsi = new Provinsi();
        $provinsi-> kode_provinsi = $request->kode_provinsi;
        $provinsi-> nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message'=>'DATA PROVINSI BERHASIL ANDA BUAT']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.show',compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit',compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message'=>'DATA PROVINSI BERHASIL ANDA EDIT']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')->with(['message'=>'DATA PROVINSI BERHASIL ANDA HAPUS']);
    }
}
