@extends('layouts.app')
@section('navigation')
    @include('ui.categories-nav')
@endsection
@section('content')
    <div class="container">
        <div class="row shadow-sm">
            <div class="col-md-6 mt-4 p-4">
                <h4 class="text-center">
                    Dev<span class="font-weight-bold">Jobs</span>
                </h4>
                <h3 class="title_1 font-weight-light text-center text-sm">
                    Encuentra un trabajo remoto o en tu pais
                    <span class="block title_2 text-success">Para Desarrolladores / Diseñadores</span>
                </h3>
                @include('ui.search-vacant')

            </div>
            <div class="col-md-6 block">
                <img src="{{ asset('/images/4321.jpg')}}" class="img-fluid" alt="">
            </div>
        </div>

        @include('ui.vacantsList')
    </div>
@endsection
