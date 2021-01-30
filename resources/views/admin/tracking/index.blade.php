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
                        <table class="table table-bordered" id="datatable">
                            <thead class="table-dark">
                                <tr>
                                <th>No</th>
                                <th>Lokasi</th>
                                <th>Rw</th>
                                <th>Positif</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($tracking as $data)
                                <tr>
                                        <th>{{$no++}}</th>
                                        <td>
                                            Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}<br>
                                            Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>
                                            Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>
                                            Kelurahan : {{$data->rw->kelurahan->nama_kelurahan}}
                                        </td>
                                        <td align="center"><br>{{$data->rw->no_rw}}</td>
                                        <td align="center"><br>{{$data->jumlah_positif}}</td>
                                        <td align="center"><br>{{$data->jumlah_sembuh}}</td>
                                        <td align="center"><br>{{$data->jumlah_meninggal}}</td>
                                        <td align="center"><br>{{$data->tanggal}}</td>
                                        <td align="center"><br>
                                        <form action="{{route('tracking.destroy',$data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('tracking.show',$data->id)}}" class="btn btn-primary">
                                        <img src="https://img.icons8.com/material-outlined/15/000000/visible--v2.png"/>
                                        </a> |
                                        <a href="{{route('tracking.edit',$data->id)}}" class="btn btn-warning">
                                        <img src="https://img.icons8.com/android/15/000000/edit.png"/>
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