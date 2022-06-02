<?php

declare(strict_types=1);

namespace VendorName\Skeleton\Components\Blade;

use VendorName\Skeleton\Components\BladeComponent;
use Illuminate\Contracts\View\View;

class FirstBladeComponent extends Component
{
    /** @var array */
    protected static $assets = ['example'];

    /** @var string|null */
    public string $first_var = "";

    public function mount(): void
    {
        // mount
    }

    public function render(): View
    {
        return view('blade.first-blade-component');
    }

}
