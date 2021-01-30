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
                    <form action="{{route('kecamatan.update',$kecamatan->id)}}" method="post">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Kota</label>
                            <select name="id_kota" class="form-control">
                            @foreach($kota as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $kecamatan->id_kota ? "selected": ""}}>{{$data->nama_kota}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Kecamatan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" value="{{$kecamatan->kode_kecamatan}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" value="{{$kecamatan->nama_kecamatan}}" required>  
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