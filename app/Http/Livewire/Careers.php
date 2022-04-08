<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Livewire\Component;
use Livewire\WithPagination;

class Careers extends Component
{
    use WithPagination;
    public $id_career, $name;
    public $term;
    public $modal = false;

    public function render()
    {
        //return view('livewire.careers');
        return view('livewire.careers', [
            'careers' => Career::when($this->term, function($query, $term){
                return $query->whereRaw('LOWER(name) LIKE ? ',['%'.trim(strtolower($term)).'%']);
            })->latest()->paginate(5)
        ]);
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
        $this->id_career = null;
    }

    public function editar($id)
    {    
        $career = Career::findOrFail($id);
        $this->id_career = $id;
        $this->name = $career->name;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Career::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Career::updateOrCreate(['id'=>$this->id_career],
            [
                'name' => $this->name
            ]);
            
        session()->flash('message',
            $this->id_career ? '¡Actualización exitosa!' : 'Creado exitosamente');
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
