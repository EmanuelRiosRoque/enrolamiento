<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreasInmuebles;

class InmueblesController extends Controller
{
    public function index(Request $request) 
    {
        $data = json_decode($request->query('data'), true);
        // dd($data);
        return view('inmuebles.index', [
            'data' => $data,
        ]);
    }

    public function create(Request $request) 
    {   
        // dd($request->all());
        AreasInmuebles::create([
            'id_locacion' => uniqid(), // Generar un ID único
            'desc_locacion' => $request->new_inmubueble // Tomar el valor del input
        ]);

        $inmuebles = AreasInmuebles::all();
        $data = json_decode($request->query('data'), true);
        // dd($data);
        return view('busqueda.update', [
            'data' => $data,
            'inmuebles' => $inmuebles
        ]);
    }
}
