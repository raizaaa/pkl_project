@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data kecamatan
                </div>
                <div class="card-body">
                    <form action="{{route('kecamatan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">id kota</label>
                            <select class="form-control" name="id_kota" id="">
                                @foreach($kota as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Kode kecamatan</label>
                            <input type="text" name="kode_kecamatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">nama kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" required>  
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