{{-- extendiendo el layout principal --}}
@extends('layouts.app')

{{-- Navegacion --}}
@section('navigation')
    @include('ui.nav-admin')
@endsection
{{-- Fin Navegación --}}
{{-- contenido de la pagina --}}
@section('content')
    <div class="container text-center mt-5">
        <h5>Administra tus Vacantes</h5>
        @if (Session::has('flash_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            {{ Session::get('flash_message') }}
        </div>
        @endif
        @if ($vacants)
            <table class="table table-borderless bg-primary text-white mt-3">
                <thead>
                    <tr>
                        <th>Titulo Vacante</th>
                        <th>Estado</th>
                        <th>Candidatos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-dark">
                    @foreach ($vacants as $vacant)
                    <tr>
                        <td>
                            <div class="float-left mx-1">
                                <div class="row text-primary">
                                    <h6>{{ $vacant->title }}</h6>
                                </div>
                                <div class="row">
                                    <strong>Categoria-</strong> <span> {{  $vacant->category->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{-- al pasar los id a vue se cambia vacant-state en vue = vacantState --}}
                            <vacant-state
                                vacant-state={{$vacant->active}}
                                vacant-id={{$vacant->id}}
                            ></vacant-state>
                            {{-- <span
                                class=" {{$vacant->active ? 'badge badge-success':'badge badge-danger'}}">
                                {{$vacant->active ? 'Activa':'Inactiva'}}
                            </span> --}}
                        </td>
                        <td><a href="{{ route('candidates.index',$vacant)}}" class="text-decoration-none">{{$vacant->candidates->count()}} candidatos</a></td>
                        <td>
                            <div class="btn-group">
                                <a class="text-decoration-none  text-primary mr-2" href="{{ route('vacants.edit',$vacant)}}">
                                    <i class="btn btn-outline-info fas fa-edit"></i>

                                </a>
                                <delete-vacant
                                    vacant-id={{$vacant->id}}
                                >
                                </delete-vacant>
                                <a class="text-decoration-none text-success"
                                    href="{{ route('vacants.show',$vacant)}}">
                                    <i class="btn btn-outline-success fas fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $vacants->links()}}
        @else
            <h5>No tiene vacantes aun</h5>
        @endif
    </div>
@endsection
{{-- fin del contenido de la página --}}
