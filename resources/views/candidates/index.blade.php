@extends('layouts.app')
@section('navigation')
    @include('ui.nav-admin')
@endsection
@section('content')

    <h4 class="text-center text-danger mt-5 mb-4">Candidatos vacante: {{$vacant->title}}</h4>
    @if (count($vacant->candidates) > 0)
        <div class="row">
           <div class="list-group col-md-6 mx-auto">
                <a href="#" class="list-group-item list-group-item-action active">
                    Candidatos
                </a>
                @foreach ($vacant->candidates as $candidate)
                    <div href="#" class="list-group-item list-group-item-action">
                        <span>{{$candidate->name}}</span>
                        <p>{{$candidate->email}}</p>
                        <a class="btn btn-outline-success btn-sm" href="/storage/cv/{{$candidate->cv}}">Ver Curriculum</a>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No hay candidatos</p>
    @endif
@endsection
