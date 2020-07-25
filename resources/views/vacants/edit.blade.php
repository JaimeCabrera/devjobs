@extends('layouts.app')
@section('navigation')
@include('ui.nav-admin')
@endsection
@section('content')
<div class="container">
    <h3 class="text-center bg-success text-white p-2 mb-5 mt-5">Editando Vacante {{$vacant->title}}</h3>
    <form action="{{ route('vacants.update',$vacant)}} " class="card" method="post">
        @method('put')
        <div class="row d-flex justify-content-center card-body">
            <div class="col-md-6">
                @csrf
                <div class="form-group">
                    <label for="titulo" class="font-weight-bold">Titulo de la vacante</label>
                    <input type="text" name="titulo" value="{{ $vacant->title}}" id="title" class="form-control @error('titulo')
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
                        <option {{ $vacant->category_id == $category->id ? 'selected':''}} value="{{ $category->id }}">
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
                        <option {{ $vacant->experience_id == $experience->id ? 'selected':''}}
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
                        <option {{ $vacant->location_id == $location->id ? 'selected':''}} value="{{ $location->id }}">
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
                        <option {{ $vacant->salary_id == $salary->id ? 'selected':''}} value="{{ $salary->id }}">
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
                    <input type="hidden" value="{{ $vacant->description }}" name="description" id="description">
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
                    <skills-list :skills="{{ $skills }}" :oldskills="{{json_encode($vacant->skills)}}"></skills-list>
                    @error('habilidades')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dropzoneImgVacante">Imagen Vacante:</label>
                    <div class="dropzone" id="dropzoneImgVacante"></div>
                    <input type="hidden" id="imagen" name="imagen" value="{{ $vacant->image }}">
                    <p class="text-danger" id="errorImg"></p>
                    @error('imagen')
                    <div class="alert alert-warning mt-1 " role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-danger btn-block" type="submit">Actualizar Vacante</button>
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
