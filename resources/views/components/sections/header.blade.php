<header x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }" class="bg-white text-black dark:bg-black dark:text-white">
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

      {{-- Midden: Statische tekst (alleen desktop) --}}
      <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 text-sm md:text-lg text-zinc-500 dark:text-zinc-400">
        ( Graphic & Motion Design )
      </div>

      {{-- Rechts uitgelijnd: Desktop Menu & Dark Mode Toggle --}}
      <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
        <a href="#" class="text-sm md:text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Work</a>
        <a href="#" class="text-sm md:text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Contact</a>
        <a href="#" class="text-sm md:text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">About</a>
        {{-- Dark Mode Toggle (Desktop) --}}
        <a
          href="#"
          class="block text-lg hover:text-gray-500 dark:hover:text-gray-300 transition -mt-0.5"
          aria-label="Toggle dark mode"
          @click.prevent="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode);"
        >
          <template x-if="!darkMode">
            <x-heroicon-s-moon class="w-5 h-5 text-gray-700 dark:text-gray-300 transition" />
          </template>
          <template x-if="darkMode">
            <x-heroicon-s-sun class="w-5 h-5 text-gray-700 dark:text-gray-300 transition" />
          </template>
        </a>
      </div>

      {{-- Mobiele navigatie: Menu & Dark Mode Toggle --}}
      <div class="md:hidden flex items-center space-x-4">
          {{-- Menu Toggle (Mobiel) --}}
          <button
          @click="open = !open"
          class="text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition"
          aria-label="Toggle menu"
        >
          menu
        </button>
        {{-- Dark Mode Toggle (Mobiel) --}}
        <a
          href="#"
          class="block text-lg hover:text-gray-500 dark:hover:text-gray-300 transition -mt-0.5"
          aria-label="Toggle dark mode"
          @click.prevent="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode);"
        >
          <template x-if="!darkMode">
            <x-heroicon-s-moon class="w-5 h-5 text-gray-700 dark:text-gray-300 transition" />
          </template>
          <template x-if="darkMode">
            <x-heroicon-s-sun class="w-5 h-5 text-gray-700 dark:text-gray-300 transition" />
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
      class="md:hidden bg-white dark:bg-black mr-4 pace-y-4"
    >
      <a href="#" class="block text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Work</a>
      <a href="#" class="block text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">Contact</a>
      <a href="#" class="block text-lg font-light hover:text-gray-500 dark:hover:text-gray-300 transition">About</a>
    </div>
  </x-container>
</header>
