<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Session;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Manage Articles')]
class ArticleList extends AdminComponent
{

    use withPagination;

    #[Session]
    public $showOnlyPublished = false;

    #[Computed]
    public function articles(): \Illuminate\Contracts\Pagination\LengthAwarePaginator|\LaravelIdea\Helper\App\Models\_IH_Article_C|\Illuminate\Pagination\LengthAwarePaginator|array
    {
        $query = Article::query();

        if ($this ->showOnlyPublished) {
            $query->where('published', 1);
        }
        return $query->paginate(10, pageName: 'articles-page');
    }

    public function delete(Article $article):void
    {
//        if ($this->articles->count() < 10) {
//            throw new \Exception('There can\'t be less than 10 articles');
//        }
        $article->delete();
//        unset($this->articles);
        cache()->forget('published-count');
    }

    public function togglePublished($showOnlyPublished):void
    {
        $this->showOnlyPublished = $showOnlyPublished;
        $this->resetPage('articles-page');
    }


    public function render(): \Illuminate\View\View
    {
        return view('livewire.article-list');
    }
}
