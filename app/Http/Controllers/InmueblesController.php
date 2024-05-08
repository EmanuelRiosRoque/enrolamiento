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

    public function list()
    {
        $areasInmuebles = AreasInmuebles::all();

        return view('inmuebles.list', [
            'inmuebles' => $areasInmuebles
        ]);
    }

    public function active($id_locacion)
    {
        $affected = AreasInmuebles::where('id_locacion', $id_locacion)
            ->update(['estatus' => 1]);

        if ($affected) {
            return redirect()->back()->with('success', 'El estado del inmueble se cambió correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se encontró ningún inmueble con el ID proporcionado.');
        }
    }




    public function reset()
    {
        // Actualizar todos los registros
        $affectedRows = AreasInmuebles::query()->update(['estatus' => 2]);

        // Verificar si se actualizaron registros
        if ($affectedRows > 0) {
            return redirect()->back()->with('success', 'Todos los estatus se cambiaron correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se pudo cambiar el estatus de ningún inmueble.');
        }
    }


}
