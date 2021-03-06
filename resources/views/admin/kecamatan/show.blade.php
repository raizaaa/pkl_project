@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data kecamatan
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="">id Kota</label>
                            <input type="text" name="{{$kecamatan->kota->id}}" class="form-control" value="{{$kecamatan->kota->nama_kota}}" readonly>  
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kecamatan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" value="{{$kecamatan->kode_kecamatan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" value="{{$kecamatan->nama_kecamatan}}" readonly>  
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-secondary btn-lg btn-block">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection