<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestLiveWire extends Component
{
    public string $aaa;
    public array $bbb;

    public function mount()
    {
        $this->aaa = 'AAA';
        $this->bbb = [1, 2, 3, 4, 5];
    }

    public function render()
    {
        return view('livewire.test-live-wire');
    }
}
