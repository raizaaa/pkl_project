<?php

namespace App\Http\Controllers;

use App\Tracking;
use App\Rw;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index()
    {
        $tracking = Tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('admin.tracking.index',compact('tracking'));
        
    }

    public function create()
    {
        return view('admin.tracking.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_positif' => 'required:trackings',
            'jumlah_sembuh' => 'required:trackings',
            'jumlah_meninggal' => 'required:trackings',
            'tanggal' => 'required:trackings'
        ], [
            'jumlah_positif.required' => 'Jumlah pasien sembuh harus diisi',
            'jumlah_sembuh.required' => 'Jumlah pasien sembuhharus diisi',
            'jumlah_meninggal.required' => 'Jumlah pasien meninggal harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
        ]);
        $tracking = new Tracking;
        $tracking -> id_rw = $request->id_rw;
        $tracking -> jumlah_positif = $request->jumlah_positif;
        $tracking -> jumlah_sembuh = $request->jumlah_sembuh;
        $tracking -> jumlah_meninggal = $request->jumlah_meninggal;
        $tracking -> tanggal = $request->tanggal;
        $tracking ->save();
        return redirect()->route('tracking.index');
    }

    public function show($id)
    {
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.show',compact('tracking'));
    }

    public function edit( $id)
    {
        $tracking = Tracking::findOrFail($id);
        return view('admin.tracking.edit',compact('tracking'));
    }

    public function update(Request $request,  $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking -> id_rw = $request->id_rw;
        $tracking -> jumlah_positif = $request->jumlah_positif;
        $tracking -> jumlah_sembuh = $request->jumlah_sembuh;
        $tracking -> jumlah_meninggal = $request->jumlah_meninggal;
        $tracking -> tanggal = $request->tanggal;
        $tracking ->save();
        return redirect()->route('tracking.index');
    }

    public function destroy( $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->delete();
        return redirect()->route('tracking.index');
    }
}