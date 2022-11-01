<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditCareer extends Component
{
    public $id_career, $name;
    public $faculty = null;
    
    public function render()
    {
        return view('livewire.edit-career', ['faculties' => Faculty::all() ]);
    }

    public function editar($id)
    {
        $career = Career::findOrFail($id);
        $this->id_career = $id;
        $this->name = $career->name;
        $this->faculty = $career->faculty_id;
    }
}
