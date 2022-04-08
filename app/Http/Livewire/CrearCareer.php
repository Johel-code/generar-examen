<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class CrearCareer extends Component
{
    public Model $model;

    public function render()
    {
        return view('livewire.crear-career');
    }
}
