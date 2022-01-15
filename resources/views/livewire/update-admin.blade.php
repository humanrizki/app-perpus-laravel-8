<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="block p-7 bg-white shadow-md">
        <label for="name" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Name</label>
        <input type="text" class="block p-2 border rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" wire:model="name" id="name">
        <label for="username" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">username</label>
        <input type="text" class="block p-2 border rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" wire:model="username" id="username">
        <label for="email" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">email</label>
        <input type="email" class="block p-2 border rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" wire:model="email" id="email">
        <label for="position" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">position</label>
            <select class="block p-2 border rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" id="position" wire:model="position">
              @foreach ($positions as $pos)
              <option value="{{ $pos->id }}">{{ $pos->name }}</option>
              @endforeach
              
            </select>
        <label for="gender" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">gender</label>
        <select class="block p-2 border rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" id="position">
          @foreach ($positions as $pos)
          @if ($position == $pos->id)
          <option value="{{ $pos->id }}" selected>{{ $pos->name }}</option>
          @else
          <option value="{{ $pos->id }}">{{ $pos->name }}</option>
          @endif
          @endforeach
          
        </select>
        <label for="email" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">email</label>
        <input type="email" class="block p-2 border rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" wire:model="email" id="email">
    </div>
</div>
