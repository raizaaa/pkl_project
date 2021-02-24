<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;
use App\Models\Rw;
use App\Models\Tracking;
use DB;

class ApiController extends Controller
{

    public function track()
    {
        $track = DB::table('trackings')
                ->select(
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->get();
        $response = [
            'succes' => true,
            'data' => [$track],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function provinsi()
    {
        $provinsi = DB::table('trackings')
                ->select(DB::raw('provinsis.nama_provinsi'), 
                DB::raw('provinsis.kode_provinsi'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
    			->groupBy('provinsis.nama_provinsi')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('provinsis.nama_provinsi'), 
                DB::raw('provinsis.kode_provinsi'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->join('provinsis', 'provinsis.id', '=', 'kotas.id_provinsi')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $provinsi],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

 public function kota()
    {
        $kota = DB::table('trackings')
                ->select(DB::raw('kotas.nama_kota'), 
                DB::raw('kotas.kode_kota'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
    			->groupBy('kotas.nama_kota')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('kotas.nama_kota'), 
                DB::raw('kotas.kode_kota'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->join('kotas', 'kotas.id', '=', 'kecamatans.id_kota')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $kota],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }
   
 public function kecamatan()
    {
        $kecamatan = DB::table('trackings')
                ->select(DB::raw('kecamatans.nama_kecamatan'), 
                DB::raw('kecamatans.kode_kecamatan'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
    			->groupBy('kecamatans.nama_kecamatan')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('kecamatans.nama_kecamatan'), 
                DB::raw('kecamatans.kode_kecamatan'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->join('kecamatans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $kecamatan],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

 public function kelurahan()
    {
        $kelurahan = DB::table('trackings')
                ->select(DB::raw('kelurahans.nama_kelurahan'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
    			->groupBy('kelurahans.nama_kelurahan')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('kelurahans.nama_kelurahan'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->join('kelurahans', 'kelurahans.id', '=', 'rws.id_kelurahan')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $kelurahan],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }
    
 public function rw()
    {
        $rw = DB::table('trackings')
                ->select(DB::raw('rws.no_rw'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
    			->groupBy('rws.no_rw')
                ->get();
        $harini = DB::table('trackings')
                ->select(DB::raw('rws.no_rw'), 
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
    			->join('rws', 'rws.id', '=', 'trackings.id_rw')
                ->wheredate('trackings.tanggal', date('Y-m-d'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['hari ini' => $harini,
            'total' => $rw],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }


    public function indonesia()
    {
        $indonesia = DB::table('trackings')
                ->select(
                DB::raw('SUM(jumlah_positif) as positif'), 
                DB::raw('SUM(jumlah_sembuh) as sembuh'), 
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['name' => 'indonesia', 'value' => $indonesia],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function positif()
    {
        $positif = DB::table('trackings')
                ->select(
                DB::raw('SUM(jumlah_positif) as positif'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['name' => 'total positif', 'value' => $positif],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function sembuh()
    {
        $sembuh = DB::table('trackings')
                ->select(
                DB::raw('SUM(jumlah_sembuh) as sembuh'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['name' => 'total sembuh', 'value' => $sembuh],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function meninggal()
    {
        $meninggal = DB::table('trackings')
                ->select(
                DB::raw('SUM(jumlah_meninggal) as meninggal'))
                ->get();
        $response = [
            'succes' => true,
            'data' => ['name' => 'total meninggal', 'value' => $meninggal],
            'message' => 'berhasil'
        ];
    	return response()->json($response, 200);
    }

    public function global(){
        $url = Http::get('https://api.kawalcorona.com/')->json();
        $data = [
            'success' => true,
            'data' => $url,
            'message' => 'Data Global berhasil ditampilkan!'
        ];
        return response()->json($data, 200);
        }
}