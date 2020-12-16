<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public $name;


    public function increment()
    {
        $this->count++;
    }

    public function resetName()
    {
        $this->name ='Chico';
    }


    public function render()
    {
        // return view('livewire.counter');
        return view('livewire.counter', [
             'name' => 'Jelly'
         ]);
    }
}
