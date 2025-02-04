<header x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }" class="fixed top-0 right-0 left-0 z-50 text-black bg-white dark:bg-black dark:text-white">
  <x-container>
    <nav class="flex justify-between items-center pt-5 pb-4">
      {{-- Links uitgelijnd: Site naam --}}
      <div class="flex items-center">
        <a
          href="/"
          class="text-lg font-bold uppercase transition md:text-xl hover:text-gray-500 dark:hover:text-gray-300"
          aria-label="Robin Dogger"
        >
          Robin Dogger
        </a>
      </div>

      {{-- Midden: Statische tekst (alleen desktop) --}}
      <div class="hidden absolute left-1/2 text-sm transform -translate-x-1/2 md:block md:text-lg text-zinc-500 dark:text-zinc-400">
        ( Graphic & Motion Design )
      </div>

      {{-- Rechts uitgelijnd: Desktop Menu & Dark Mode Toggle --}}
      <div class="hidden items-center space-x-6 md:flex lg:space-x-8">
        <a href="/" class="text-sm font-light transition md:text-lg hover:text-gray-500 dark:hover:text-gray-300">Work</a>
        <a href="#" class="text-sm font-light transition md:text-lg hover:text-gray-500 dark:hover:text-gray-300">Contact</a>
        <a wire:navigate href="/about" class="text-sm font-light transition md:text-lg hover:text-gray-500 dark:hover:text-gray-300">About</a>
        {{-- Dark Mode Toggle (Desktop) --}}
        <a
          href="#"
          class="block -mt-0.5 text-lg transition hover:text-gray-500 dark:hover:text-gray-300"
          aria-label="Toggle dark mode"
          @click.prevent="
            darkMode = !darkMode;
            localStorage.setItem('color-theme', darkMode ? 'dark' : 'light');
            document.documentElement.classList.toggle('dark', darkMode);
          "
        >
          <template x-if="!darkMode">
            <x-heroicon-s-moon class="w-5 h-5 text-gray-700 transition dark:text-gray-300" />
          </template>
          <template x-if="darkMode">
            <x-heroicon-s-sun class="w-5 h-5 text-gray-700 transition dark:text-gray-300" />
          </template>
        </a>
      </div>

      {{-- Mobiele navigatie: Menu & Dark Mode Toggle --}}
      <div class="flex items-center space-x-4 md:hidden">
          {{-- Menu Toggle (Mobiel) --}}
          <button
          @click="open = !open"
          class="text-lg font-light transition hover:text-gray-500 dark:hover:text-gray-300"
          aria-label="Toggle menu"
        >
          menu
        </button>
        {{-- Dark Mode Toggle (Mobiel) --}}
        <a
          href="#"
          class="block -mt-0.5 text-lg transition hover:text-gray-500 dark:hover:text-gray-300"
          aria-label="Toggle dark mode"
          @click.prevent="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode);"
        >
          <template x-if="!darkMode">
            <x-heroicon-s-moon class="w-5 h-5 text-gray-700 transition dark:text-gray-300" />
          </template>
          <template x-if="darkMode">
            <x-heroicon-s-sun class="w-5 h-5 text-gray-700 transition dark:text-gray-300" />
          </template>
        </a>


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
      class="mr-4 bg-white md:hidden dark:bg-black pace-y-4"
    >
      <a href="#" class="block text-lg font-light transition hover:text-gray-500 dark:hover:text-gray-300">Work</a>
      <a href="#" class="block text-lg font-light transition hover:text-gray-500 dark:hover:text-gray-300">Contact</a>
      <a href="#" class="block text-lg font-light transition hover:text-gray-500 dark:hover:text-gray-300">About</a>
    </div>
  </x-container>
</header>
