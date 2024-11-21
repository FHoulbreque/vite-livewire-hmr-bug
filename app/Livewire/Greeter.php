<?php

namespace App\Livewire;

use App\Models\Greeting;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Greeter extends Component
{

    #[Validate('required|min:2')]
    public $name = '';
    public $greeting = '';
    public $greetings = [];
    public $greetingMessage = '';


    public function mount():void
    {
        $this->greetings = Greeting::all();
    }

    public function updatedName($value):void {
        $this->name = strtolower($value);
    }


    public function changeGreeting(): void
    {
        $this->reset('greetingMessage');
        $this->validate();
        $this->greetingMessage = "{$this->greeting}, {$this->name}!";
    }

    public function render(): \Illuminate\View\View|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('livewire.greeter');
    }
}
