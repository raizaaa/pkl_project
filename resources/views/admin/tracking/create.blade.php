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
                    <form action="{{route('tracking.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            @livewire('dropdowns')
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Positif</label>
                                <input type="text" class="form-control" name="jumlah_positif">
                            @if($errors->has('jumlah_positif'))
                                <span class="text-danger">{{$errors->first('jumlah_positif')}}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="">Sembuh</label>
                                <input type="text" class="form-control" name="jumlah_sembuh">
                            @if($errors->has('jumlah_sembuh'))
                                <span class="text-danger">{{$errors->first('jumlah_sembuh')}}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="">Meninggal</label>
                                <input type="text" class="form-control" name="jumlah_meninggal">
                            @if($errors->has('jumlah_meninggal'))
                                <span class="text-danger">{{$errors->first('jumlah_meninggal')}}</span>
                            @endif
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal">
                            @if($errors->has('tanggal'))
                                <span class="text-danger">{{$errors->first('tanggal')}}</span>
                            @endif
                            </div>
                        </div>
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