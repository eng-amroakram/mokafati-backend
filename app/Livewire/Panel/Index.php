<?php

namespace App\Livewire\Panel;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{

    #[Layout('layouts.panel.app'), Title('لوحة التحكم - الصفحة الرئيسية')]
    public function render()
    {
        return view('livewire.panel.index');
    }
}
