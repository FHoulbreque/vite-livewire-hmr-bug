<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Url(as: 'q', except: '')]
    public $searchText = '';
    public $placeholder;

    #[On('search:clear-results')]
    public function clear():void
    {
        $this->reset( 'searchText');
    }

    public function render(): \Illuminate\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('livewire.search', [
            'results' => Article::where('title', 'like', "%{$this->searchText}%")->get()
        ]);
    }
}
