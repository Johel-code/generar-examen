<?php

namespace App\Http\Livewire;

use App\Models\Career;
use Livewire\Component;

class ToggleCareer extends Component
{
    public Career $career;
    public string $field;
    public bool $isActive;

    public function mount()
    {
        $this->isActive = $this->career->getAttribute('active');
    }

    public function render()
    {
        return view('livewire.toggle-career');
    }

    public function updating($field, $value)
    {
        $this->career->setAttribute($this->field, $value)->save();
    }
}
