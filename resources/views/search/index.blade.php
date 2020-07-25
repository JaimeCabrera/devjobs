@extends('layouts.app')
@section('navigation')
@include('ui.categories-nav')
@endsection
@section('content')
<div class="container">
    <div class="row mt-5 shadow p-4">
        <div class="col-md-12">
            @if(count($vacants) > 0)
            @include('ui.vacantsList')
            @else
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">
                    Lamentablemente no hemos encotrado vacantes disponibles para tu seleccion
                </h4>
                <p class="mb-0">Por favor intentalode nuevo con otra seleccion</p>
            </div>
            <div class="col-md-6 mx-auto">
                @include('ui.search-vacant')
            </div>

            @endif
        </div>
    </div>
</div>

@endsection
