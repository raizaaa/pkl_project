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
                    Data tracking
                    <a href="{{route('tracking.create')}}"
                        class="float-right">
                        <img src="https://img.icons8.com/ios/30/000000/create-order--v1.png"/>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="datatable">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Rw</th>
                                <th scope="col">Positif</th>
                                <th scope="col">Sembuh</th>
                                <th scope="col">Meninggal</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($tracking as $data)
                                <tr>
                                        <th scope="row">{{$no++}}</th>
                                        <td>Kelurahan : {{$data->rw->kelurahan->nama_kelurahan}}
                                        <br>Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}
                                        <br>Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}
                                        <br>Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}</td>
                                        <td>{{$data->rw->nama}}</td>
                                        <td>{{$data->jumlah_positif}}</td>
                                        <td>{{$data->jumlah_sembuh}}</td>
                                        <td>{{$data->jumlah_meninggal}}</td>
                                        <td>{{$data->tanggal}}</td>
                                        <td>
                                        <form action="{{route('tracking.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('tracking.show',$data->id)}}" class="btn btn-primary">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/visible--v2.png"/>
                                        </a> |
                                        <a href="{{route('tracking.edit',$data->id)}}" class="btn btn-warning">
                                        <img src="https://img.icons8.com/android/24/000000/edit.png"/>
                                        </a> |
                                        <button type="submit" class="btn btn-danger" onclick="return confirm
                                        ('Apakah anda yakin?')">
                                        <img src="https://img.icons8.com/metro/26/000000/trash.png"/>
                                        </button>
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