<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DropzoneController extends Controller
{
    public function store(Request $request)
    {
        // imagen del cliente
        $imagen = $request->file('file');
        $nombreImagen = time() .'.'.$imagen->extension();
        $imagen->move(public_path('storage/vacants'), $nombreImagen);
        return response()->json(['correcto'=> $nombreImagen,'status' => 200]);
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $imagen = $request->get('imagen');
            if(File::exists('storage/vacants/'. $imagen)){
                File::delete('storage/vacants/'. $imagen);
            }
            return response('Imagen Elminada',200);
        }
    }
}
