@extends('layouts.app')
@section('navigation')
@include('ui.categories-nav')
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5 shadow p-4">
            <h3 class=" font-weight-bold mx-5 mt-4">Categoria
                <span>{{$category->name}}</span>
            </h3>
            @include('ui.vacantsList')
        </div>
    </div>
@endsection
