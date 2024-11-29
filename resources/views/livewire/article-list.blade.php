<div class="m-auto w-2/3 md:1/2 mb-4">
  <div class="mb-3 flex justify-between items-center">
    <a
        href="/dashboard/articles/create"
        class="text-blue-500 hover:text-blue-700"
        wire:navigate
    >
      Create Article
    </a>
    <div>
      <button
          @class([
                'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                'bg-gray-700' => $showOnlyPublished,
                'bg-blue-700' => !$showOnlyPublished
          ])
          wire:click="togglePublished(false)"
      >
        Show all
      </button>
      <button
          @class([
                'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                'bg-gray-700' => !$showOnlyPublished,
                'bg-blue-700' => $showOnlyPublished
          ])
          wire:click="togglePublished(true)"
      >
        Show published (
        <livewire:published-count placeholder-text="loading" />
        )
      </button>

    </div>
  </div>
  @if (session('status'))
    <div class="text-center bg-green-700 text-gray-200">
      {{ session('status') }}
    </div>
  @endif
  <div class="my-3">
    {{ $this->articles->links() }}
  </div>
  <table class="w-full">
    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
      <tr>
        <th class="px-6 py-3">Title</th>
        <th class="px-6 py-3"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($this->articles as $article)
        <tr class="border-b bg-gray-800 border-gray-700" wire:key="{{$article->id}}">
          <td class="px-6 py-3">{{ $article->title }}</td>
          <td class="px-6 py-3 text-nowrap">
            <a
                href="/dashboard/articles/{{$article->id}}/edit"
                class="text-gray-200 p-1 md:p-2 text-sm md:text-base"
                wire:navigate
            >
              Edit
            </a>
            <button
                class="text-gray-200 text-sm md:text-base p-1 md:p-2 bg-red-700 hover:bg-red-900 rounded-sm"
                wire:click="delete({{$article->id}})"
                wire:confirm="Are you sure you want to delete this article?"
            >Delete
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-3">
    {{ $this->articles->links() }}
  </div>
</div>
