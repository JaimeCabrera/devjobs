<?php

namespace App\Http\Controllers;

use App\Vacant;
use App\Location;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // las ultimas 5 vacantes
        $vacants = Vacant::latest()->where('active', true)->take(10)->get();
        // locations
        $locations = Location::all();
        return view('inicio.index')
                ->with('vacants', $vacants)
                ->with('locations', $locations);
    }
}
