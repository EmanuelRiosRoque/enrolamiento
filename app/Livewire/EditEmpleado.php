<?php

namespace App\Livewire;

use App\Models\UpdateEmpleados;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class EditEmpleado extends ModalComponent
{
    public $nombre;
    public $plaza;
    public $rfc;
    public $curp;
    public $area;
    public $areaAdscrito;
    public $puesto;
    public $ubicacion;
    public $descripcion;
    public $nivel;

    public function guardarDatos()
{
    try {
        UpdateEmpleados::create([
            'nuM_EMPL' => $this->nuM_EMPL,
            'nombres' => $this->nombres,
            'apellidop' => $this->apellidop,
            'apellidom' => $this->apellidom,
            'estatus' => $this->estatus,
            'rfc' => $this->rfc,
            'curp' => $this->curp,
            'areA_ADSCRIPCION' => $this->areA_ADSCRIPCION,
            'descripcioN_AREA_ADSCRIPCION' => $this->descripcioN_AREA_ADSCRIPCION,
            'puesto' => $this->puesto,
            'descripcioN_PUESTO' => $this->descripcioN_PUESTO,
            'ubicacioN_AREA_TRABAJO' => $this->ubicacioN_AREA_TRABAJO,
            'descripcioN_AREA_TRABAJO' => $this->descripcioN_AREA_TRABAJO,
            'nivel' => $this->nivel,
            'plaza' => $this->plaza,
        ]);

        // Limpiar los campos después de guardar los datos
        $this->reset();
    } catch (\Exception $e) {
        throw new \Exception("Error al guardar los datos: " . $e->getMessage());
    }
}

    public function render()
    {
        return view('livewire.edit-empleado');
    }
}
