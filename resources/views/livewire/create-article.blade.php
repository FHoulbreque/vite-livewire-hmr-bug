<div class="m-auto w-2/3 md:1/2 mb-4">
  <h3 class="text-lg text-gray-200 mb-3">Create Article</h3>
  <form wire:submit="save">
    <div class="mb-3">
      <label class="block" for="article-title">Title</label>
      <input
          id="article-title"
          type="text"
          class="p-2 w-full border rounded-md bg-gray-700 text-white"
          wire:model="form.title"
      />
      <div>
        @error('form.title')
        <span class="text-red-600">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="mb-3">
      <label class="block" for="article-content">Content</label>
      <textarea
          id="article-content"
          class="p-2 w-full border rounded-md bg-gray-700 text-white"
          wire:model="form.content"
      ></textarea>
      <div>
        @error('form.content')
        <span class="text-red-600">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="mb-3">
      <label class="block" for="article-photo">
        Photo
      </label>
      <div class="flex items-center">
        <input
            id="article-photo"
            type="file"
            wire:model="form.photo"
        />
        <div>
          @if($form->photo)
            <img src="{{ $form->photo->temporaryUrl() }}" alt="" class="w-1/2" />
          @endif
        </div>
      </div>
      <div>
        @error('photo')
        <span class="text-red-600">{{ $message }}</span> @enderror
      </div>
    </div>
    <div class="mb-3">
      <label class="flex items-center">
        <input type="checkbox"
               name="published"
               wire:model.boolean="form.published"
               class="mr-1"
        />
        Published
      </label>
    </div>
    <div class="mb-3">
      <div>
        <div class="mb-2">Notification Options</div>
        <div class="flex gap-6 mb-3">
          <label for="" class="flex items-center">
            <input type="radio" value="true" class="mr-2" wire:model.boolean="form.allowNotifications" />
            Yes
          </label>
          <label for="" class="flex items-center">
            <input type="radio" value="false" class="mr-2" wire:model.boolean="form.allowNotifications" />
            No
          </label>
        </div>
        <div x-show="$wire.form.allowNotifications" wire:transition>
          <label for="" class="flex items-center">
            <input type="checkbox" value="email" class="mr-2" wire:model="form.notifications" />
            Email
          </label>
          <label for="" class="flex items-center">
            <input type="checkbox" value="sms" class="mr-2" wire:model="form.notifications" />
            SMS
          </label>
          <label for="" class="flex items-center">
            <input type="checkbox" value="push" class="mr-2" wire:model="form.notifications" />
            Push
          </label>
        </div>
      </div>
    </div>
    <div class="mb-3">
      <button
          disabled
          class="text-gray-200 p-2 bg-blue-700 rounded-sm disabled:opacity-75 disabled:bg-blue-300"
          type="submit"
          wire:dirty.class="hover:bg-blue-900"
          wire:dirty.attr.remove="disabled"
      >
        Save
      </button>
    </div>
  </form>
</div>
