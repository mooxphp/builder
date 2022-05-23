<?php

namespace VendorName\Skeleton\Components\Blade;

use VendorName\Skeleton\BladeComponent;
use Illuminate\Contracts\View\View;

class FirstBladeComponent extends Component
{
    public $first_var = "";

    public function mount()
    {
        // mount
    }

    public function render()
    {
        return view('blade.first-blade-component');
    }

}
