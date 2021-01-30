@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Data Provinsi
                </div>
                <div class="card-body">
                    <form action="{{route('provinsi.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="number" name="kode_provinsi" class="form-control">
                            @if($errors->has('kode_provinsi'))
                                <span class="text-danger">{{$errors->first('kode_provinsi')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" name="nama_provinsi" class="form-control">
                            @if($errors->has('nama_provinsi'))
                                <span class="text-danger">{{$errors->first('nama_provinsi')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection