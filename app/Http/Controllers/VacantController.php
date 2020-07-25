<?php

namespace App\Http\Controllers;

use App\Skill;
use App\Salary;
use App\Vacant;
use App\Category;
use App\Location;
use App\Experience;
use Illuminate\Http\Request;

class VacantController extends Controller
{
    // // constructor para verificar que este autenticado y el email verificado
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // vacantes del usuario autenticado
        // $vacants = auth()->user()->vacants();
        // segunda forma con el modelo
        $vacants  = Vacant::where('user_id',auth()->user()->id)->latest()->paginate(10);
        return view('vacants.index')->with('vacants', $vacants);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // consultas
        $categories = Category::all();
        $experiences = Experience::all();
        $locations = Location::all();
        $salaries = Salary::all();
        $skills = Skill::all();

        return view('vacants.create')
                ->with('categories', $categories)
                ->with('experiences', $experiences)
                ->with('locations', $locations)
                ->with('salaries', $salaries)
                ->with('skills', $skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->only('title','category_id','experience_id','location_id','salary_id','description',
        //                 'skills','image');
        $data = $request->validate([
            'titulo' => 'required|min:5',
            'categoria'=>'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario'=>'required',
            'description'=>'required',
            'habilidades' => 'required',
            'imagen' =>'required'

        ]);
        // almacenar en la db
        auth()->user()->vacants()->create([
            'title' => $data['titulo'],
            'category_id' => $data['categoria'],
            'experience_id' => $data['experiencia'],
            'location_id' => $data['ubicacion'],
            'salary_id' => $data['salario'],
            'description' => $data['description'],
            'skills' => $data['habilidades'],
            'image' => $data['imagen']
        ]);

        return redirect()->route('vacants.index')->with('sataus','Vacante agregada con Exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function show(Vacant $vacant)
    {
        return view('vacants.show')->with('vacant',$vacant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacant $vacant)
    {
        // añadiendo el policy
        $this->authorize('view',$vacant);
        // consultas
        $categories = Category::all();
        $experiences = Experience::all();
        $locations = Location::all();
        $salaries = Salary::all();
        $skills = Skill::all();
        return view('vacants.edit')
                ->with('vacant',$vacant)
                ->with('categories', $categories)
                ->with('experiences', $experiences)
                ->with('locations', $locations)
                ->with('salaries', $salaries)
                ->with('skills', $skills);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacant $vacant)
    {
        $this->authorize('update',$vacant);
        // Validar la informacion del request
        $data = $request->validate([
            'titulo' => 'required|min:5',
            'categoria'=>'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario'=>'required',
            'description'=>'required',
            'habilidades' => 'required',
            'imagen' =>'required'

        ]);
        // añadir los campos a la variable vacant para guardarlo
        $vacant->title = $data['titulo'];
        $vacant->category_id = $data['categoria'];
        $vacant->experience_id = $data['experiencia'];
        $vacant->location_id = $data['ubicacion'];
        $vacant->salary_id = $data['salario'];
        $vacant->description = $data['description'];
        $vacant->skills = $data['habilidades'];
        $vacant->image = $data['imagen'];

        // guardar el objeto con los datros
        if($vacant->save()){
            return redirect()->route('vacants.index')->withFlashMessage('Vacante '.$vacant->title.' Actaulizada con exito');
        }else{
            return redirect()->back()->with('status', 'Hubo un error por favor intentalo de nuevo');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacant  $vacant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacant $vacant)
    {
        $this->authorize('delete',$vacant);
        $vacant->delete();
        return response()->json(['message'=>'Se elimino la vacante'.$vacant->title]);
    }

    //_____________  METODOS PERSONALIZADOS___________
    // cambia el estado de una vacante( Activa->Inactiva)
    public function state(Request $request, Vacant $vacant)
    {
        //leer nuevo estado
        $vacant->active = $request->state;
        // asignarlo a la base de datos
        $vacant->save();
        return response()->json(['respuesta'=>'El Estado de la vacante se cambio con exito']);
    }

    // buscar vacantes
    public function search(Request $request)
    {
        //validacion
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required'
        ]);
        // asidangar categoria
        $category_id = $data['categoria'];
        $location_id = $data['ubicacion'];

        $locations = Location::all();
        $vacants = Vacant::where('category_id','=', $category_id)->orWhere('location_id','=', $location_id)->get();
        return view('search.index')
            ->with('vacants', $vacants)
            ->with('locations', $locations);
    }

    public function result()
    {

    }
}
