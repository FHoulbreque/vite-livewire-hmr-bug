<div class="m-auto w-2/3 md:1/2 mb-4">
  <div class="mb-3">
    <a
        href="/dashboard/articles/create"
        class="text-gray-200 bg-indigo-700 hover:bg-indigo-900 rounded-sm"
        wire:navigate
    >
      Create Article
    </a>
  </div>

  <table>
    <thead class="text-xs uppercase bg-gray-700 text-gray-400">
      <tr>
        <th class="px-6 py-3">Title</th>
        <th class="px-6 py-3"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $article)
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
</div>
