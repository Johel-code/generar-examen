<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Career;
use App\Models\Faculty;

class CreateCareer extends Component
{

    public $open = false;

    public $name, $id_career;
    public $faculty = null;

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
        return view('livewire.create-career', ['faculties' => Faculty::all()] );
    }

    public function guardar()
    {
        $this->validate();
        Career::updateOrCreate(['id'=>$this->id_career],
            [
                'name' => $this->name,
                'faculty_id' => $this->faculty
            ]);

        $this->emitTo('careers','render');
        $this->emit('alert', 
            $this->id_career ? '¡Actualización exitosa!' : 'Creado exitosamente');

        $this->reset(['open', 'id_career', 'name', 'faculty']);
            
    }
}
