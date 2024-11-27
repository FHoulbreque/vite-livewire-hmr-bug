<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

#[Title("Edit Article")]
class EditArticle extends AdminComponent
{
    public ArticleForm $form;

    public function mount(Article $article):void {
        $this->form->setArticle($article);
    }

    public function save():void
    {
        $this->form->update();

        $this->redirect('/dashboard/articles', navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-article');
    }
}
