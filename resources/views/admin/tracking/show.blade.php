@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Tracking
                </div>
                <div class="card-body">
                            <form action="{{('tracking.show')}}" class="m-t-30" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col">
                                    @livewire('dropdowns',['idtrack' => $tracking->id, 'idrw' => $tracking->id_rw, 'cek' => 1])
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Positif</label>
                                <input type="text" class="form-control" name="jumlah_positif" value="@if(isset($tracking)){{$tracking->jumlah_positif}}@endif" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Sembuh</label>
                                <input type="text" class="form-control" name="jumlah_sembuh" value="@if(isset($tracking)){{$tracking->jumlah_sembuh}}@endif" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Meninggal</label>
                                <input type="text" class="form-control" name="jumlah_meninggal" value="@if(isset($tracking)){{$tracking->jumlah_meninggal}}@endif" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="@if(isset($tracking)){{$tracking->tanggal}}@endif" readonly>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-outline-secondary btn-lg btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection