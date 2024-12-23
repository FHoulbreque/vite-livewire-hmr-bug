<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Title("Create Article")]
class CreateArticle extends AdminComponent
{
    use WithFileUploads;
    public ArticleForm $form;

    public function save():void
    {
        $this->form->store();

        session()->flash('status', 'Article successfully created');

        $this->redirectRoute('dashboard.articles.list', navigate: true);
    }


    public function render()
    {
        return view('livewire.create-article');
    }
}
