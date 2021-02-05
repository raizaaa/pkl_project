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
                    <form action="{{route('provinsi.update',$provinsi->id)}}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <!-- @method('PUT') -->
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="text" name="kode_provinsi" class="form-control" value="{{$provinsi->kode_provinsi}}">
                            @if($errors->has('kode_provinsi'))
                                <span class="text-danger">{{$errors->first('kode_provinsi')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" name="nama_provinsi" class="form-control" value="{{$provinsi->nama_provinsi}}">
                            @if($errors->has('nama_provinsi'))
                                <span class="text-danger">{{$errors->first('nama_provinsi')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg btn-block" onclick="return confirm('Apakah anda yakin?')">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection