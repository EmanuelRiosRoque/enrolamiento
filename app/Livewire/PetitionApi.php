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


        $curl_post_data = [
            "NumEmpleado" => $this->nEmpleado
        ];

        $n_empleado = $this->nEmpleado;

		$url ="http://172.19.202.43/WebServices/META/api/Empleado?NumEmpleado=".$n_empleado;
        $data = json_encode($curl_post_data);
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $response = curl_exec($ch);
        curl_close($ch);
        dd($response);
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
