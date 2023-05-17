<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PetProfiles extends Component
{
    public $pets;

    public function __construct($pets)
    {
        $this->pets = $pets;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pet-profiles');
    }
}
