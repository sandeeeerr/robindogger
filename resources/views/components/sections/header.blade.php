<header x-data="{ open: false }" class="fixed top-0 right-0 left-0 z-50 text-black bg-white">
  <x-container>
    <nav class="flex justify-between items-center pt-5 pb-4">
      {{-- Links uitgelijnd: Site naam --}}
      <div class="flex items-center">
        <a
          href="/"
          class="text-lg font-bold uppercase transition md:text-xl hover:text-gray-500"
          aria-label="Robin Dogger"
        >
          Robin Dogger
        </a>
      </div>

      {{-- Midden: Statische tekst (alleen desktop) --}}
      <div class="hidden absolute left-1/2 text-sm transform -translate-x-1/2 md:block md:text-lg text-zinc-500">
        {{ __('( Graphic & Motion Design )') }}
      </div>

      {{-- Rechts uitgelijnd: Desktop Menu, Language Switch & Dark Mode Toggle --}}
      <div class="hidden items-center space-x-6 md:flex lg:space-x-8">
        <a href="/" class="text-sm font-light transition md:text-lg hover:text-gray-500">{{ __('Work') }}</a>
        <a href="mailto:robindogger@gmail.com" class="text-sm font-light transition md:text-lg hover:text-gray-500">{{ __('Contact') }}</a>
        <a wire:navigate href="/about" class="text-sm font-light transition md:text-lg hover:text-gray-500">{{ __('About') }}</a>

        {{-- Language dropdown (Desktop) --}}
        <div class="relative" x-data="{ openLang: false }">
          @php($current = app()->getLocale())
          <button
            @click="openLang = !openLang"
            class="inline-flex items-center justify-center w-8 h-8 rounded-md focus:outline-none"
            aria-label="Switch language"
          >
            @if ($current === 'nl')
              <span class="fi fi-nl"></span>
            @else
              <span class="fi fi-gb"></span>
            @endif
          </button>
          <div
            x-show="openLang"
            @click.outside="openLang = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 mt-2 w-16 rounded-md border border-gray-200 bg-white p-1 shadow-sm"
          >
            <a
              href="{{ route('locale.switch', ['locale' => 'nl']) }}"
              class="flex items-center justify-center rounded p-1 hover:bg-gray-100"
              aria-label="Nederlands"
            >
              <span class="fi fi-nl"></span>
            </a>
            <a
              href="{{ route('locale.switch', ['locale' => 'en']) }}"
              class="mt-1 flex items-center justify-center rounded p-1 hover:bg-gray-100"
              aria-label="English"
            >
              <span class="fi fi-gb"></span>
            </a>
          </div>
        </div>
      </div>

      {{-- Mobiele navigatie: Menu & Language Switch --}}
      <div class="flex items-center space-x-4 md:hidden">
          {{-- Menu Toggle (Mobiel) --}}
          <button
          @click="open = !open"
          class="text-lg font-light transition hover:text-gray-500"
          aria-label="Toggle menu"
        >
          menu
        </button>
        {{-- Language dropdown (Mobiel) --}}
        <div class="relative" x-data="{ openLang: false }">
          @php($current = app()->getLocale())
          <button
            @click="openLang = !openLang"
            class="inline-flex items-center justify-center w-8 h-8 rounded-md focus:outline-none"
            aria-label="Switch language"
          >
            @if ($current === 'nl')
              <span class="fi fi-nl"></span>
            @else
              <span class="fi fi-gb"></span>
            @endif
          </button>
          <div
            x-show="openLang"
            @click.outside="openLang = false"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 mt-2 w-16 rounded-md border border-gray-200 bg-white p-1 shadow-sm"
          >
            <a href="{{ route('locale.switch', ['locale' => 'nl']) }}" class="flex items-center justify-center rounded p-1 hover:bg-gray-100" aria-label="Nederlands"><span class="fi fi-nl"></span></a>
            <a href="{{ route('locale.switch', ['locale' => 'en']) }}" class="mt-1 flex items-center justify-center rounded p-1 hover:bg-gray-100" aria-label="English"><span class="fi fi-gb"></span></a>
          </div>
        </div>
      </div>
    </nav>

    {{-- Mobiele menu: Zichtbaar bij open --}}
    <div
      x-show="open"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      class="mr-4 bg-white md:hidden pace-y-4 pb-4" 
    >
      <a href="#" class="block text-lg font-light transition hover:text-gray-500">Work</a>
      <a href="mailto:robindogger@gmail.com" class="block text-lg font-light transition hover:text-gray-500">Contact</a>
      <a href="/about" class="block text-lg font-light transition hover:text-gray-500">About</a>
    </div>
  </x-container>
</header>
