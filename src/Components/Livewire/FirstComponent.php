<?php

namespace VendorName\Skeleton\Components\Livewire;

use VendorName\Skeleton\LivewireComponent;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FirstLivewireComponent extends Component
{
    public $first_var = "";

    public function mount()
    {
        // mount
    }

    public function render()
    {
        return view('livewire.first-livewire-component');
    }

}
