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
                    Data Kota
                    <a href="{{route('kota.create')}}"
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
                                    <th>id Provinsi</th>
                                    <th>Kode Kota</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($kota as $data)
                                <tr>
                                    <td align="center">{{$no++}}</td>
                                    <td align="center">{{$data->provinsi->id}}</td>
                                    <td align="center">{{$data->kode_kota}}</td>
                                    <td align="center">{{$data->nama_kota}}</td>
                                    <td align="center">
                                        <form action="{{route('kota.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('kota.show',$data->id)}}" class="btn btn-primary">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/visible--v2.png"/>
                                        </a> |
                                        <a href="{{route('kota.edit',$data->id)}}" class="btn btn-warning">
                                        <img src="https://img.icons8.com/android/24/000000/edit.png"/>
                                        </a> |
                                        <button type="submit" class="btn btn-danger" onclick="return confirm
                                        ('Apakah anda yakin?')">
                                        <img src="https://img.icons8.com/metro/15/000000/trash.png"/>
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