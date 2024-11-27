<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Articles')]
class ArticleIndex extends Component
{

    public function render():\Illuminate\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {

        return view('livewire.article-index', [
            'articles' => Article::all(),
        ]);
    }
}
