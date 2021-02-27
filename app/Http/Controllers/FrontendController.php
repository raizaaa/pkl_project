<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use DB;
use App\Http\Provinsi;
use App\Http\Kota;
use App\Http\Kecamatan;
use App\Http\Kelurahan;
use App\Http\Rw;
use App\Http\Tracking;
use Illuminate\Support\Carbon;


class FrontendController extends Controller
{
    
    public function index()
    {       

        $output = DB::table('provinsis')
                ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                ->join('trackings','trackings.id_rw','=','rws.id')
                ->select('nama_provinsi',
                DB::raw('SUM(trackings.jumlah_positif) as jumlah_positif'),
                DB::raw('SUM(trackings.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('SUM(trackings.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                ->get();
        
        // $dtDunia = file_get_contents("https://api.kawalcorona.com/");
        // $dunia = json_decode($dtDunia, TRUE);

        $tanggal = Carbon::now()->format('D d-M-Y');

        return view('frontend.index', compact('positif','sembuh','meninggal','output','dunia','tanggal'));

    }

}