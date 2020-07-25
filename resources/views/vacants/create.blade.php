@extends('layouts.app')
@section('navigation')
@include('ui.nav-admin')
@endsection
@section('content')
<div class="container">
    <h3 class="text-center">Nueva Vacante</h3>
    <form action="{{ route('vacants.store')}} " class="card" method="POST">
        <div class="row d-flex justify-content-center card-body">
            <div class="col-md-6">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo de la vacante</label>
                    <input type="text" name="titulo" value="{{ old('titulo') }}" id="title" class="form-control @error('titulo')
                        is-invalid
                    @enderror" placeholder="Escriba el titulo de la vacante">
                    @error('titulo')
                    <div class="alert alert-warning mt-1" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select class="custom-select @error('categoria') is-invalid @enderror
                    " name="categoria" id="categoria">
                        <option selected disabled>Selecciona una categoria</option>
                        @foreach ($categories as $category)
                        <option {{ old('categoria') == $category->id ? 'selected':''}} value="{{ $category->id }}">
                            {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="experiencia">Experiencia:</label>
                    <select class="custom-select" name="experiencia" id="experiencia">
                        <option selected disabled>Selecciona el nivel de Experiencia</option>
                        @foreach ($experiences as $experience)
                        <option {{ old('experiencia') == $experience->id ? 'selected':''}}
                            value="{{ $experience->id }}">{{ $experience->name }}</option>
                        @endforeach
                    </select>
                    @error('experiencia')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ubicacion">Ubicaión:</label>
                    <select class="custom-select" name="ubicacion" id="ubicacion">
                        <option selected disabled>Selecciona una ubicación</option>
                        @foreach ($locations as $location)
                        <option {{ old('ubicacion') == $location->id ? 'selected':''}} value="{{ $location->id }}">
                            {{ $location->name }}</option>
                        @endforeach
                    </select>
                    @error('ubicacion')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <select class="custom-select" name="salario" id="salario">
                        <option selected disabled>Selecciona una salario</option>
                        @foreach ($salaries as $salary)
                        <option {{ old('salario') == $salary->id ? 'selected':''}} value="{{ $salary->id }}">
                            {{ $salary->name }}</option>
                        @endforeach
                    </select>
                    @error('salario')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripcion de la vacante</label>
                    <div class="editable"></div>
                    <input type="hidden" value="{{ old('description') }}" name="description" id="description">
                </div>
                @error('description')
                <div class="alert alert-warning mt-1 " role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="habilidades">Selecciona las hablidades:</label>
                    <skills-list :skills="{{ $skills }}" :oldskills="{{json_encode(old('habilidades'))}}"></skills-list>
                    @error('habilidades')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dropzoneImgVacante">Imagen Vacante:</label>
                    <div class="dropzone" id="dropzoneImgVacante"></div>
                    <input type="hidden" id="imagen" name="imagen" value="{{ old('imagen') }}">
                    <p class="text-danger" id="errorImg"></p>
                    @error('imagen')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Publicar vacante</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
<script>

</script>
@endsection
