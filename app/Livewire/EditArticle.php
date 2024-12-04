<?php

namespace App\Livewire;

use App\Livewire\Forms\ArticleForm;
use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Storage;

#[Title("Edit Article")]
class EditArticle extends AdminComponent
{
    use WithFileUploads;
    public ArticleForm $form;

    public function mount(Article $article):void {
        $this->form->setArticle($article);
    }

    public function downloadPhoto()
    {
        return response()->download(
          Storage::disk('public')->path($this->form->photo_path), 'article.png'
        );
    }

    public function save():void
    {
        $this->form->update();

        session()->flash('status', 'Article successfully updated');

        $this->redirect(ArticleList::class, navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-article');
    }
}
