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
                    <form action="{{route('rw.update',$rw->id)}}" method="post">
                    <!-- <input type="hidden" name="_method" value="PUT"> -->
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">id Kelurahan</label>
                            <select name="id_kelurahan" class="form-control">
                            @foreach($kelurahan as $data)
                            <option value="{{$data->id}}"
                            {{$data->id == $rw->id_kelurahan ? "selected": ""}}>{{$data->nama_kelurahan}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Rw</label>
                            <input type="text" name="no_rw" class="form-control" value="{{$rw->no_rw}}" required>  
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