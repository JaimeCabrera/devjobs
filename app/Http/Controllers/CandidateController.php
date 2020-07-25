<?php

namespace App\Http\Controllers;

use App\Vacant;
use App\Candidate;
use Illuminate\Http\Request;
use App\Notifications\NewCandidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // leer parametros extras de url $request->route('id)
        // obtener el id de la vacante:actual
        $vacant_id = $request->route('vacant');

        // obetener la vacante y los candidatos
        $vacant = Vacant::findOrFail($vacant_id);

        // agregando el policy
        $this->authorize('view',$vacant);


        // obtenemos por relacion la vacante y los candidatpos
        // $candidates = $vacant->candidates;
        return view('candidates.index')
            ->with('vacant',$vacant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validaciones
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'curriculum' => 'required|mimes:pdf',
            'vacant_id' => 'required'
        ]);

        // Almacenar archivo pdf

        if($request->file('curriculum'))
        {
            $archivo = $request->file('curriculum');
            // generar un nombre para el archiv
            $nombreArchivo = time().".".$request->file('curriculum')->extension();
            // ubicacion del archivo
            $ubication = public_path('/storage/cv');
            $archivo->move($ubication, $nombreArchivo);
            // return $nombreArchivo;
        }

        // forma 1
        // $candidate = new Candidate();
        // $candidate->name = $data['name'];
        // $candidate->email = $data['email'];
        // $candidate->cv = "123.pdf";
        // $candidate->vacant_id = $data['vacant_id'];

        // Segunda form
        // $candidate = new Candidate($data);

        // Tercer forma
        // $candidate = new Candidate();
        // $candidate->fill($data);
         // guardamis
        // $candidate->save();

        // cuarta forma con la relacion  de la tablas
        //obtener el id de la vacante
        $vacant = Vacant::find($data['vacant_id']);
        // añadimos el resto de campos a la variable vancant
        $vacant->candidates()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cv' => $nombreArchivo
        ]);


        // notificaciones al reclutador:user qeu creo la vacante
        $user = $vacant->user;
        // tambien se le puede pasar parametros
        $user->notify( new NewCandidate($vacant->title, $vacant->id));
        return back()->with('status','Curriculum enviado con Exito!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
