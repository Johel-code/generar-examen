<?php

namespace App\Http\Livewire;

use App\Models\Faculty;
use Livewire\Component;

class ToggleButton extends Component
{
    public Faculty $faculty;
    public string $field;
    public bool $isActive;

    public function mount()
    {
        $this->isActive = $this->faculty->getAttribute('active');
    }

    public function render()
    {
        return view('livewire.toggle-button');
    }

    public function updating($field, $value)
    {
        $this->faculty->setAttribute($this->field, $value)->save();
    }
}
