@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">
                    Data Kecamatan
                    <a href="{{route('kecamatan.create')}}"
                        class="float-right">
                        <img src="https://img.icons8.com/ios/30/000000/create-order--v1.png"/>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nomor</th>
                                    <th>id Kota</th>
                                    <th>Kode Kecamatan</th>
                                    <th>Kecamatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($kecamatan as $data)
                                <tr>
                                    <td align="center">{{$no++}}</td>
                                    <td align="center">{{$data->kota->id}}</td>
                                    <td align="center">{{$data->kode_kecamatan}}</td>
                                    <td align="center">{{$data->nama_kecamatan}}</td>
                                    <td align="center">
                                        <form action="{{route('kecamatan.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('kecamatan.show',$data->id)}}" class="btn btn-primary">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/visible--v2.png"/>
                                        </a> |
                                        <a href="{{route('kecamatan.edit',$data->id)}}" class="btn btn-warning">
                                        <img src="https://img.icons8.com/android/24/000000/edit.png"/>
                                        </a> |
                                        <button type="submit" class="btn btn-danger" onclick="return confirm
                                        ('Apakah anda yakin?')">
                                        <img src="https://img.icons8.com/metro/26/000000/trash.png"/>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection