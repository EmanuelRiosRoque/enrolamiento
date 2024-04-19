<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PetitionApi extends Component
{
    public $nEmpleado;
    public $responseData;
    public $showLoader = false;

    public function fetchData()
    {

        $this->showLoader();

        // Simula una solicitud de datos con un retraso de 5 segundos
        sleep(3);


        if (!$this->nEmpleado) {
            return;
        }

        $response = Http::get('http://172.19.202.43/WebServices/META/api/Empleado', [
            'NumEmpleado' => $this->nEmpleado
        ]);

        // Verifica si la solicitud fue exitosa
        if ($response->ok()) {
            // Decodifica el contenido JSON de la respuesta y asigna los datos a $responseData
            $this->responseData = $response->json();
            $this->hideLoader();

        } else {
            // Si la solicitud no fue exitosa, puedes manejar el error aquí
            $this->responseData = [];
            $this->hideLoader();
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
