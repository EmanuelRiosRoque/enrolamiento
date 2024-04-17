<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PetitionApi extends Component
{
    public $nEmpleado;
    public $responseData;

    public function fetchData()
    {
        // Verifica que se haya proporcionado un número de empleado
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

        } else {
            // Si la solicitud no fue exitosa, puedes manejar el error aquí
            $this->responseData = [];
        }
    }
    public $modalAbierto = false;

    // Método para abrir el modal
    public function abrirModal()
    {
        $this->modalAbierto = true;
    }

    // Método para cerrar el modal
    public function cerrarModal()
    {
        $this->modalAbierto = false;
    }

    public function render()
    {
        return view('livewire.petition-api');
    }

}
