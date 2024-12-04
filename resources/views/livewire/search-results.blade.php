<div>
  <div class="mt-4 p-4 absolute border rounded-md bg-gray-700 border-indigo-600">
    @if (count($results) == 0)
      <p>Aucun résultat trouvé</p>
    @endif
    @foreach($results as $result)
      <div class="pt-2" wire:key="{{ $result->id }}">
        <a wire:navigate href="/articles/{{$result->id}}">{{ $result->title }}</a>
      </div>
    @endforeach
  </div>
</div>
