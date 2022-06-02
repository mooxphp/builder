<?php

declare(strict_types=1);

namespace VendorName\Skeleton\Components\Livewire;

use Illuminate\Contracts\View\View;
use VendorName\Skeleton\Components\LivewireComponent;

class FirstLivewireComponent extends Component
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
        return view('livewire.first-livewire-component');
    }
}
