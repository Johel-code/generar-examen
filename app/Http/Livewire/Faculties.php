<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faculty;
use Livewire\WithPagination;

class Faculties extends Component
{
    use WithPagination;
    public $id_faculty, $name;
    public $term;
    protected $queryString = ['term'];
    public $modal = false;

    public function render()
    {
        //$faculties = Faculty::paginate(3);
        //return view('livewire.faculties');
        return view('livewire.faculties', [
            'faculties' => Faculty::when($this->term, function($query, $term){
                return $query->where('name', 'LIKE', "%$term%");
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
