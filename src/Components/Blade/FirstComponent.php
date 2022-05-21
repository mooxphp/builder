<?php

namespace VendorName\Skeleton\Components\Blade;

class FirstComponent extends Component
{
    public $first_var = "";

    public function mount()
    {
        // mount
    }

    public function render()
    {
        return view('blade.first-component');
    }

}
