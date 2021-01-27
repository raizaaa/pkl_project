@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tracking.update', $tracking->id)}}" class="form-horizontal m-t-30" method="post">
                    @csrf
                    @method('put')
                    @livewire('tracking-data',['selectedRw' => $tracking->id_rw, 'idt' => $tracking->id])
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">edit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection