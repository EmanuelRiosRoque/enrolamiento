<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class info extends Controller
{
    public function index()
    {
        //phpinfo();


        // $curl_post_data = [
        //     "NumEmpleado" => 8005715
        // ];

         $n_empleado = 8005715;

		 $url ="http://172.19.202.43/WebServices/META/api/Empleado?NumEmpleado=".$n_empleado;
        // $data = json_encode($curl_post_data);
        // $ch=curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_ENCODING, "");
        // curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // $response = curl_exec($ch);
        // curl_close($ch);
        // echo $response;
        $ch = curl_init();

        // Configura las opciones de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Aumenta el tiempo de espera a 60 segundos

        // Realiza la solicitud cURL
        $response = curl_exec($ch);

        echo $response;
    }
}
