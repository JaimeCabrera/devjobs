@extends('layouts.app')
@section('navigation')
@include('ui.nav-admin')
@endsection
@section('content')
<h4 class="text-center mt-5">Notificaciones</h4>
<hr>
@if ($unreadnotifications->count() > 0)
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="list-group">
            @foreach ($unreadnotifications as $unreadnotification)
            {{-- acceder al objeto de data de las noticaciones --}}
            @php
            $data = $unreadnotification->data
            @endphp
            <div class="list-group-item list-group-item-action">
                <p>Tienes un nuevo Candidato en: <span>{{$data['vacant']}}</span> </p>
                <p>Te escribio el dia: <span>{{$notification->created_at->diffforHumans()}}</span> </p>
                <p>{{$data['vacant']}}: <span>{{$unreadnotification->created_at->diffforHumans()}}</span>
                    <a href="{{ route('candidates.index',$data['vacant_id']) }}">Ver Vacante</a>
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>Excelente!</strong> No tienes notificaciones.
</div>

@endif

<hr>
<h4 class="mx-3 bg-primary p-3 text-white">Notificaiones Anteriores</h4>

<div class="card-body">
    <div class="list-group">
        @foreach ($notifications as $notification)
        {{-- acceder al objeto de data de las noticaciones --}}
        @php
        $data = $notification->data
        @endphp
        <div class="list-group-item list-group-item-action text-primary">
            <p>Tienes un nuevo Candidato en: <span>{{$data['vacant']}}</span> </p>
            <p>Te escribio: <span>{{$notification->created_at->diffforHumans()}}</span> </p>
            <p>{{$data['vacant']}}: <span>{{$notification->created_at->diffforHumans()}}</span>
                <a href="{{ route('candidates.index',$data['vacant_id']) }}" class="badge badge-success">Ver Vacante</a>
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection
