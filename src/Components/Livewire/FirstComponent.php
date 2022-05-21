<?php

namespace VendorName\Skeleton\Components\Livewire;

use Livewire\Component;

class FirstComponent extends Component
{
    public $first_var = "";

    public function mount()
    {
        // mount
    }

    public function render()
    {
        return view('livewire.first-component');
    }

}
