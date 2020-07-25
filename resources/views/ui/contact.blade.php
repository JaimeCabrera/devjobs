<aside class="bg-primary text-white mt-2 p-3">
    <h4 class="text-center">Contacta al reclutador</h4>
    <hr class="bg-success">
    <form action="{{ route('candidates.store') }}" method="POST" class=" p-4" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                placeholder="Escribe tu nombre">
            @error('name')
            <div class="alert alert-warning mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"
                placeholder="Escribe tu nombre">
            @error('email')
            <div class="alert alert-warning mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="curriculum">Curriculum (PDF)</label>
            <input type="file" name="curriculum" id="curriculum" class="form-control-file" accept="application/pdf">
            @error('curriculum')
            <div class="alert alert-warning mt-1" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>
        <input type="hidden" name="vacant_id" value="{{ $vacant->id}}">
        <div class="form-group mt-4">
            <button class="btn btn-success btn-block text-uppercase font-weight-bold" type="submit">Contactar</button>
        </div>
    </form>
</aside>
