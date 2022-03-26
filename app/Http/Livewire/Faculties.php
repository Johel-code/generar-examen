<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faculty;

class Faculties extends Component
{
    public $faculties, $id_faculty, $name;
    public $modal = false;

    public function render()
    {
        $this->faculties = Faculty::latest()->take(5)->get();
        return view('livewire.faculties');
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->name = '';
        $this->id_faculty = null;
    }

    public function editar($id)
    {    
        $faculty = Faculty::findOrFail($id);
        $this->id_faculty = $id;
        $this->name = $faculty->name;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Faculty::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Faculty::updateOrCreate(['id'=>$this->id_faculty],
            [
                'name' => $this->name
            ]);
            
        session()->flash('message',
            $this->id_faculty ? '¡Actualización exitosa!' : 'Creado exitosamente');
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
