<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreasImuebles;
use App\Models\EmailRegistro;
use App\Models\AreasInmuebles;
use App\Models\UpdateEmpleados;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class petitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $inmuebles = AreasInmuebles::all();
        $data = json_decode($request->query('data'), true);

        // Verificar si $data['empleado'] está presente
        if (isset($data['empleado'])) {
            $data = $data['empleado'];
        }

        return view('busqueda.update', [
            'data' => $data,
            'inmuebles' => $inmuebles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new inmueble.
     */
    public function createInmueble(Request $request)
    {
        dd($request->new_area); exit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // Busca un registro existente con el ID proporcionado
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'apellidop' => 'required|string|max:255',
            'apellidom' => 'required|string|max:255',
            'rfc' => 'required|string|max:255',
            'curp' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'ubicacioN_AREA_TRABAJO' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'plaza' => 'required|string|max:255',
            'numeroT' => 'required|string|max:255',
            'horario' => 'required|string|max:255',
            'descripcioN_AREA_ADSCRIPCION' => 'required', // Validar que no esté vacío o nulo
            'hidden_areaAdscrito' => 'required', // Validar que no esté vacío o nulo
        ], [
            'nombres.required' => 'El campo nombres es obligatorio.',
            'apellidop.required' => 'El campo apellido paterno es obligatorio.',
            'apellidom.required' => 'El campo apellido materno es obligatorio.',
            'rfc.required' => 'El campo RFC es obligatorio.',
            'curp.required' => 'El campo CURP es obligatorio.',
            'puesto.required' => 'El campo puesto es obligatorio.',
            'ubicacioN_AREA_TRABAJO.required' => 'El campo ubicación área de trabajo es obligatorio.',
            'nivel.required' => 'El campo nivel es obligatorio.',
            'plaza.required' => 'El campo plaza es obligatorio.',
            'numeroT.required' => 'El campo número de tarjeta es obligatorio.',
            'horario.required' => 'El campo horario es obligatorio.',
            'descripcioN_AREA_ADSCRIPCION.required' => 'El campo área es obligatorio.',
            'hidden_areaAdscrito.required' => 'El campo área de adscripción es obligatorio.',
        ]);

        // Si la validación falla, redirige de nuevo al formulario con los errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $empleado = UpdateEmpleados::firstOrNew(['nuM_EMPL' => $id]);

        $userId = Auth::id();
        // Actualiza los campos con los valores de la solicitud
        $empleado->fill([
            'nombres' => $request->nombres,
            'apellidop' => $request->apellidop,
            'apellidom' => $request->apellidom,
            'estatus' => "Activo",
            'rfc' => $request->rfc,
            'curp' => $request->curp,
            'areA_ADSCRIPCION' => $request->hidden_areaAdscrito,
            'descripcioN_AREA_ADSCRIPCION' => $request->descripcioN_AREA_ADSCRIPCION,
            'puesto' => $request->puesto,
            'descripcioN_PUESTO' => $request->descripcioN_PUESTO,
            'ubicacioN_AREA_TRABAJO' => $request->ubicacioN_AREA_TRABAJO,
            'descripcioN_AREA_TRABAJO' => $request->descripcioN_AREA_TRABAJO,
            'nivel' => $request->nivel,
            'plaza' => $request->plaza,
            'fk_usrCreated' => $userId,
            'n_tarjeta' => $request->numeroT,
            'horario' => $request->horario,
        ]);


        // Guarda el registro en la base de datos
        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
