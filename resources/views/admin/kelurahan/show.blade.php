@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Kelurahan
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="">id Kecamatan</label>
                            <input type="text" name="{{$kelurahan->kecamatan->id}}" class="form-control" value="{{$kelurahan->kecamatan->nama_kecamatan}}" readonly>  
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kelurahan" class="form-control" value="{{$kelurahan->nama_kelurahan}}" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-primary btn-lg btn-block">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection