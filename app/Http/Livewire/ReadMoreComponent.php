<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReadMoreComponent extends Component
{
    public $description;
    public $showFullDescription = false;

    public function toggleDescription()
    {
        $this->showFullDescription = !$this->showFullDescription;
    }

    public function render()
    {
        return view('livewire.read-more-component');
    }
}
