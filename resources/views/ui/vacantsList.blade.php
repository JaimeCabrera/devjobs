
<div class="row p-4 container shadow mt-5 pt-5">
    <div class="col-md-12 mx-3">
        <h3>Nuevas Vacantes</h3>
        <hr>
    </div>
    @foreach ($vacants as $vacant)
    <div class="card_vacants col-md-5 card p-3 mr-4 ml-4 mb-3 shadow-sm">
        <h5 class="font-weight-bold text-success">{{$vacant->title}}</h5>
        <p>{{$vacant->category->name}}</p>
        <p>Ubicacion: <span class="font-weight-bold">{{$vacant->location->name}}</span> </p>
        <p>Experiencia: <span class="font-weight-bold">{{$vacant->experience->name}}</span> </p>
        <a class="btn btn-success btn-sm btn-view-vacant" href="{{ route('vacants.show',$vacant) }}"> ver
            vacante</a>
    </div>
    @endforeach
</div>
