<div>
  @foreach($articles as $article)
    <div class="m-5 p-3 m-auto w-2/3 md:1/2" wire:key="{{ $article->id }}">
      <h3 class="text-2xl text-blue-500 mb-3 hover:text-blue-700">
        <a href="/articles/{{$article->id}}">{{$article->title}}</a>
      </h3>
      <p>{{ str($article->content)->words(30) }}</p>
    </div>
  @endforeach
</div>
