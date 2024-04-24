<?php

namespace App\Livewire;

use App\Models\AreasInmuebles;
use Livewire\Component;

class NewInmueble extends Component
{

    public $new_area;
    public function createInmueble()
    {
        if (!empty($this->new_area)) {
            // Crear un nuevo inmueble en la tabla areas_inmueble
            AreasInmuebles::create([
                'id_locacion' => uniqid(), // Generar un ID único
                'desc_locacion' => $this->new_area // Tomar el valor del input
            ]);

            // Limpiar el input después de crear el inmueble
            $this->new_area = '';

            return redirect()->to(url()->current());
        }
    }

    public function render()
    {
        return view('livewire.new-inmueble');
    }
}
