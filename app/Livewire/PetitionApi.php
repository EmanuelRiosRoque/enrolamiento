<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UpdateEmpleados;
use Illuminate\Support\Facades\Http;

class PetitionApi extends Component
{
    public $nEmpleado;
    public $responseData;
    public $showLoader = false;
    public $error = null; // Agrega una propiedad para almacenar el mensaje de error

    public function fetchData()
    {
        // Verifica si el número de empleado ya existe en la tabla update_empleado
        $empleadoExistente = UpdateEmpleados::where('nuM_EMPL', $this->nEmpleado)->exists();

        if ($empleadoExistente) {
            $this->error = 'Este empleado ya fue dado de alta.';
            return;
        }

        // Continúa con la lógica de la solicitud API solo si el empleado no existe en la base de datos local
        $this->showLoader();

        // Simula una solicitud de datos con un retraso de 3 segundos
        sleep(3);

        if (!$this->nEmpleado) {
            return;
        }

        $response = Http::get('http://172.19.202.43/WebServices/META/api/Empleado?NumEmpleado=', [
            'NumEmpleado' => $this->nEmpleado
        ]);


        if ($response->ok()) {
            $this->responseData = $response->json();
            $this->hideLoader();
            $this->error = null; // Resetea el mensaje de error en caso de éxito
        } else {
            $this->responseData = [];
            $this->hideLoader();
            $this->error = 'Error al obtener datos. Por favor, inténtelo de nuevo más tarde.'; // Establece el mensaje de error
        }
    }


    public function showLoader()
    {
        // Mostrar el loader
        $this->showLoader = true;
    }

    public function hideLoader()
    {
        // Ocultar el loader
        $this->showLoader = false;
    }

    public function render()
    {
        return view('livewire.petition-api');
    }

}
