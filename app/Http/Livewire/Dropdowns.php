<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Kelurahan;
use App\Rw;
use App\Tracking;

class Dropdowns extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;

    public $idTrack;
    public $idRw;
    public $cek1 = NULL;

    public $Dprovinsi = NULL;
    public $Dkota = NULL;
    public $Dkecamatan = NULL;
    public $Dkelurahan = NULL;
    public $Drw = NULL;

    public function mount($idtrack = NULL,$idrw = NULL, $cek = NULL)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();

        if(!is_null($idtrack)){
            $tracking = Tracking::findorfail($idtrack);
            
        }
        if (!is_null($idrw)) {
            $rw = rw::with('kelurahan.kecamatan.kota.provinsi')->find($idrw);
        
            if($rw){
                $this->rw = Rw::where('id_kelurahan', $rw->id_kelurahan)->get();
                $this->kelurahan = Kelurahan::where('id_kecamatan', $rw->kelurahan->id_kecamatan)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $rw->kelurahan->kecamatan->kota->id_provinsi)->get();

                $this->Dprovinsi = $rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->Dkota = $rw->kelurahan->kecamatan->id_kota;
                $this->Dkecamatan = $rw->kelurahan->id_kecamatan;
                $this->Dkelurahan = $rw->id_kelurahan;
                $this->Drw = $rw->id;
                if ($cek == 1) {
                    $this->cek1 = $cek;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdowns');

        
    }

    public function updatedDprovinsi($Drovinsi)
    {
        $this->kota = Kota::where('id_provinsi', $Drovinsi)->get();
        $this->Dkota = NULL;
        $this->Dkecamatan = NULL;
        $this->Dkelurahan = NULL;
        $this->Drw = NULL;
    }

    public function updatedDkota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->Dkecamatan = NULL;
        $this->Dkelurahan = NULL;
        $this->Drw = NULL;
    }

    public function updatedDkecamatan($kecamatan)
    {
        $this->kelurahan = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        $this->Dkelurahan = NULL;
        $this->Drw = NULL;
    }

    public function updatedDkelurahan($kelurahan)
    {
        $this->rw = rw::where('id_kelurahan', $kelurahan)->get();
        $this->Drw = NULL;
    }


}