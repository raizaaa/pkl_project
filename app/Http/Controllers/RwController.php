<?php

namespace App\Http\Controllers;

use App\Rw;
use App\Kelurahan;
use Illuminate\Http\Request;

// compact = membuat array
class RwController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('admin.rw.index',compact('rw'));
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('admin.rw.create',compact('kelurahan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'no_rw' => 'required|unique:rws'
            ],
            [
                'no_rw.required' => 'No Rw harus diisi',
                'no_rw.unique' => 'Rw telah terdaftar'
            ]
            );
        $rw = new Rw();
        $rw->no_rw = $request->no_rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'DATA RW BERHASIL ANDA BUAT']);
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('admin.rw.show',compact('rw','kelurahan'));
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('admin.rw.edit',compact('rw','kelurahan'));

    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'no_rw' => 'required:rws'
            ],
            [
                'no_rw.required' => 'No Rw harus diisi',
            ]
            );
        $rw = Rw::findOrFail($id);
        $rw->no_rw = $request->no_rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
                ->with(['message'=>'DATA RW BERHASIL ANDA EDIT']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                ->with(['message'=>'DATA RW BERHASIL ANDA HAPUS']);
    }
}