@extends('layouts.app')


@section('styles')

@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<h3 class="text-center mt-4">{{ $vacant->title}}</h3>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 info-vacant">
                <p class="text-capitalize">
                    Publicado: <span >{{ $vacant->created_at->diffForHumans() }}</span>
                    <button class="btn">
                    Por: <span class="badge badge-primary">{{$vacant->user->name}}</span>
                    </button>
                </p>
                <p>
                    Categoría: <span>{{ $vacant->category->name }}</span>
                </p>
                <p>
                    Salario: <span>{{ $vacant->salary->name }}</span>
                </p>
                <p>
                    Ubicacion: <span>{{ $vacant->location->name }}</span>
                </p>
                <p>
                    Experiencia: <span>{{ $vacant->experience->name }}</span>
                </p>
                <hr>
                <h4 class="text-center">Conocimientos y tecnoligas</h4>
                @php
                    $arraySkills = explode(",",$vacant->skills)
                @endphp
                <div class="btn-group-sm mt-4">
                    @foreach ($arraySkills as $skill)
                        <button class="mx-2 mb-4 btn btn-outline-success" disabled>{{ $skill }}</button>
                    @endforeach
                </div>
                <div class=" d-flex">
                    <a href="/storage/vacants/{{$vacant->image}}" data-lightbox="imagen">
                        <img src="/storage/vacants/{{$vacant->image}}" class="mx-auto img-thumbnail" alt="">
                    </a>
                </div>
                <div class="description">
                    {!! $vacant->description !!}
                </div>
            </div>
            <div class="col-md-6">
                @if ($vacant->active === 1)
                    @include('ui.contact')
                @endif
            </div>
        </div>
    </div>

@endsection
