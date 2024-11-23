<div>

  <form
      wire:submit="changeGreeting()"
  >
    <div class="mt-2 flex space-x-2">
      <select id="greeting"
              class="p-4 border rounded-md bg-gray-700 text-white w-28"
              wire:model.fill="greeting"
      >
        @foreach($greetings as $item)
          <option value="{{$item->greeting}}" selected>{{$item->greeting}}</option>
        @endforeach
      </select>
      <input
          id="name"
          type="text"
          class="block w-80 p-4 border rounded-md bg-gray-700 text-white"
          wire:model="name"
      />
    </div>
    <div>
      @error('name')
      {{ $message }}
      @enderror
    </div>
    <div class="mt-2">

      <button
          class="text-white font-medium rounded-md px-4 py-2 bg-blue-600"
      >
        Greet
      </button>
    </div>
  </form>
  @if ($greetingMessage !== '')
    <div>
      {{ $greetingMessage }}
    </div>
  @endif
</div>
