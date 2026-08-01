<?php

declare(strict_types=1);

namespace Usernotnull\Toast\Tests\Fixtures\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class WireToastHarness extends Component
{
    use WireToast;

    public function queueToast(string $message = 'toast-from-livewire', ?string $title = 'Livewire title'): void
    {
        toast()
            ->success($message, $title)
            ->push();
    }

    public function render(): View|Factory|Application
    {
        return view('base');
    }
}
