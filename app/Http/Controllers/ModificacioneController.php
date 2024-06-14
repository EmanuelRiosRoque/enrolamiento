<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreasInmuebles;
use App\Models\UpdateEmpleados;
use Illuminate\Support\Facades\Validator;

class ModificacioneController extends Controller
{
    function index () {
        return view('modificaciones.index');
    }

    public function search(Request $request) {
        $validator = Validator::make($request->all(), [
            'numeroEmpleado' => 'required|integer|min:1',
        ], [
            'numeroEmpleado.required' => 'El número de empleado es obligatorio.',
            'numeroEmpleado.integer' => 'El número de empleado debe ser un número entero.',
            'numeroEmpleado.min' => 'El número de empleado debe ser un número positivo.',
        ]);

        // Comprobar si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $numeroEmpleado = $request->input('numeroEmpleado');
        $empleado = UpdateEmpleados::where('nuM_EMPL', $numeroEmpleado)->first();
        $inmuebles = AreasInmuebles::all();

        // Verificar si se encontró el empleado
        if (!$empleado) {
            return redirect()->back()->with('error', 'Empleado no encontrado.')->withInput();
        }

        // Almacenar los datos en la sesión para mostrarlos una vez
        return redirect()->route('modifica.index')
                         ->with(['empleado' => $empleado, 'inmuebles' => $inmuebles]);
    }

    public function update(Request $request, $nEmpleado) {
        $empleado = UpdateEmpleados::where('nuM_EMPL', $nEmpleado)->first();

        if (!$empleado) {
            return redirect()->back()->with('error', 'Empleado no encontrado.');
        }

        // Actualizar los datos del empleado
        $empleado->n_tarjeta = $request->input('numeroT');
        $empleado->horario = $request->input('horario');
        $empleado->descripcioN_AREA_ADSCRIPCION = $request->input('descripcioN_AREA_ADSCRIPCION');
        $empleado->areA_ADSCRIPCION = $request->input('hidden_areaAdscrito');

        $empleado->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente.');
    }
}
