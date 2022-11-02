<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Faculty;
use Livewire\WithPagination;

class Faculties extends Component
{
    use WithPagination;

    public $columns = [
        'name' => 'NAME',
        'careers_count' => 'CAREERS', 
        'updated_at' => 'UPDATED_AT',
        'active' => 'ACTIVE'
    ];
    
    public $id_faculty, $name;
    public $faculty;
    public $term;
    public $modal = false;
    public $confirm_delete = false;

    public $sortColumn = "updated_at";
    public $sortDirection = "desc";

    protected $rules = [
        'name' => 'required|max:20',
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es requerido',
        'name.max' => 'El nombre no debe tener mas de 20 caracteres',
    ];

    public function render()
    {
        //$faculties = Faculty::paginate(3);
        //return view('livewire.faculties');
        /* return view('livewire.faculties', [
            'faculties' => Faculty::when($this->term, function($query, $term){
                return $query->where('name', 'LIKE', "%$term%");
            })->latest()->paginate(3)
        ]); */

        $faculties = Faculty::withCount('careers')
            ->orderBy($this->sortColumn, $this->sortDirection);

        // return view('livewire.faculties', [
        //     'faculties' => Faculty::when($this->term, function($query, $term){
        //         return $query->whereRaw('LOWER(name) LIKE ? ',['%'.trim(strtolower($term)).'%']);
        //     })->latest()->paginate(5)
        // ]);

        if($this->term) {
            $faculties->when($this->term, function($query, $term){
                 return $query->whereRaw('LOWER(name) LIKE ? ',['%'.trim(strtolower($term)).'%']);
            });
        }
        $faculties = $faculties->paginate(5);

        return view('livewire.faculties', ['faculties' => $faculties]);
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function cerrarBuscador()
    {
        $this->term = "";
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
        $this->id_faculty = null;
    }

    public function editar($id)
    {    
        $faculty = Faculty::findOrFail($id);
        $this->id_faculty = $id;
        $this->name = $faculty->name;
        $this->abrirModal();
    }

    public function confirmDelete($id)
    {
        $this->faculty = $id;  
        $this->confirm_delete = true; 
    }

    public function deleteFaculty()
    {
        Faculty::find($this->faculty)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
        $this->confirm_delete = false; 
    }

    public function guardar()
    {
        $this->validate();
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
