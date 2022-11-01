<?php

namespace App\Http\Livewire\Search;

use App\Models\Faculty;
use Livewire\Component;

class SearchFaculty extends Component
{
    public $term;

    public function render()
    {
        return view('livewire.search.search-faculty');
    }
}
