<header class="bg-white text-black dark:bg-black dark:text-white">
  <x-container>
    <nav class="flex items-center justify-between pb-4 pt-5">
      {{-- Links uitgelijnd: Site naam --}}
      <div class="flex items-center">
        <a
          href="/"
          class="text-lg md:text-xl font-bold uppercase hover:text-gray-500 dark:hover:text-gray-300 transition"
          aria-label="Robin Dogger"
        >
          Robin Dogger
        </a>
      </div>

      {{-- Midden: Statische tekst --}}
      <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 text-sm md:text-lg text-zinc-500 dark:text-zinc-400">
        ( Graphic & Motion Design )
      </div>

      {{-- Rechts uitgelijnd: Menu --}}
      <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
        <a href="#" class="text-sm md:text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Work</a>
        <a href="#" class="text-sm md:text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Contact</a>
        <a href="#" class="text-sm md:text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">About</a>
        <button id="theme-toggle" type="button" class="flex items-center rounded text-gray-600 dark:text-gray-100 -mt-0.5">
          <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
          </svg>
          <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
              fill-rule="evenodd" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>      

      {{-- Mobiele navigatie: Menu icoon --}}
      <div class="md:hidden">
        <button
          @click="open = !open"
          class="text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition"
          aria-label="Toggle menu"
        >
          menu
        </button>
      </div>
    </nav>

    {{-- Mobiele menu: Zichtbaar bij open --}}
    <div
      x-data="{ open: false }"
      x-show="open"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-95"
      class="md:hidden bg-white dark:bg-black shadow-lg rounded-lg p-4 mt-4 space-y-4"
    >
      <a href="#" class="block text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Work</a>
      <a href="#" class="block text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Contact</a>
      <a href="#" class="block text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">About</a>
      <a href="#" class="block text-lg hover:text-gray-500 dark:hover:text-gray-300 transition" aria-label="Toggle dark mode">
        <x-heroicon-s-moon class="w-5 h-5 text-gray-700 dark:text-gray-300 transition" />
      </a>
    </div>
  </x-container>
</header>