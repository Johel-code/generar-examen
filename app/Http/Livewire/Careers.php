<?php

namespace App\Http\Livewire;

use App\Models\Career;
use App\Models\Faculty;
use Livewire\Component;
use Livewire\WithPagination;

class Careers extends Component
{
    use WithPagination;

    public $columns = [
        'name' => 'NAME',
        'subjects_count' => 'SUBJECTS', 
        'updated_at' => 'UPDATED_AT',
        'active' => 'ACTIVE'
    ];
    public $id_career, $name;
    public $term;
    public $modal = false;

    public $faculty = null;

    public $sortColumn = "updated_at";
    public $sortDirection = "desc";
    // protected $listeners = ['render'];

    protected $rules = [
        'name' => 'required|max:20',
        'faculty' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es requerido',
        'name.max' => 'El nombre no debe tener mas de 20 caracteres',
        'faculty.required' => 'Debe seleccionar una facultad'
    ];

    public function render()
    {
        $careers = Career::withCount('subjects')
            ->orderBy($this->sortColumn, $this->sortDirection);

        // return view('livewire.careers', [
        //     'careers' => Career::when($this->term, function($query, $term){
        //         return $query->whereRaw('LOWER(name) LIKE ? ',['%'.trim(strtolower($term)).'%']);
        //     })->latest()->paginate(5),
        //     'faculties' => Faculty::all()
        // ]);

        if($this->term){
            $careers->when($this->term, function($query, $term){
                return $query->whereRaw('LOWER(name) LIKE ? ', ['%'.trim(strtolower($term)).'%']);
            });
        }
        $careers = $careers->paginate(5);

        return view('livewire.careers', [
            'careers' => $careers,
            'faculties' => Faculty::all()
        ]);
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal()
    {
        $this->modal = true;
        $this->resetValidation();
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
            $this->name = '';
            $this->faculty = null;
            $this->id_career = null;
        }

    public function editar($id)
    {    
        $career = Career::findOrFail($id);
        $this->id_career = $id;
        $this->name = $career->name;
        $this->faculty = $career->faculty_id;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Career::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        $this->validate();
        Career::updateOrCreate(['id'=>$this->id_career],
            [
                'name' => $this->name,
                'faculty_id' => $this->faculty
            ]);
            
        session()->flash('message',
            $this->id_career ? '¡Actualización exitosa!' : 'Creado exitosamente');
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
