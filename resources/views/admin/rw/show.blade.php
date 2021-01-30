@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Rw
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="">id Kelurahan</label>
                            <input type="text" name="{{$rw->kelurahan->id}}" class="form-control" value="{{$rw->kelurahan->nama_kelurahan}}" readonly>  
                        </div>
                        <div class="form-group">
                            <label for="">Rw</label>
                            <input type="text" name="no_rw" class="form-control" value="{{$rw->no_rw}}" readonly>  
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