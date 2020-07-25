<form action="{{ route('vacants.search') }}" class="card p-4" method="post">
    @csrf
    <h5 class="text-center">Busca una vacante</h5>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <select class="form-control @error('categoria') is-invalid  @enderror"  name="categoria" id="categoria">
            <option selected disabled> Selecciona una categoria</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach
        </select>
        @error('categoria')
        <div class="alert alert-warning mt-1" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="ubicacion">Ubicacion:</label>
        <select class="form-control @error('ubicacion') is-invalid @enderror" name="ubicacion" id="ubicacion">
            <option selected disabled> Selecciona una ubicacion</option>
            @foreach ($locations as $location)
            <option value="{{ $location->id}}">{{ $location->name}}</option>
            @endforeach
        </select>
        @error('ubicacion')
        <div class="alert alert-warning mt-1" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success btn-block">Buscar</button>
</form>
