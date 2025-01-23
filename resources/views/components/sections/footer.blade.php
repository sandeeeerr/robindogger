@php
    // Haal 4-5 willekeurige posts op
    $randomPosts = App\Models\Post::inRandomOrder()->limit(4)->get();
@endphp

<footer class="py-8 mt-8 bg-white dark:bg-black justify-self-end">
  <x-container class="max-w-7xl mx-auto"> <!-- Maximale breedte en centreren -->
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-light text-black dark:text-white mb-6 md:mb-8 leading-tight">
      Let's work together <br />
      email: 
      <a class="text-zinc-500 dark:text-zinc-400 hover:text-zinc-700 dark:hover:text-zinc-300 transition" href="mailto:robindogger@gmail.com">
        robindogger@gmail.com
      </a>
    </h1>

    <!-- Grid voor de 4 kolommen -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
      <!-- Kolom 1: Selected Works -->
      <div>
        <h2 class="text-zinc-500 dark:text-zinc-400 text-xl font-light mb-4">
          Selected Works
        </h2>
        <ul>
          @foreach ($randomPosts as $post)
            <li>
              <a href="{{ route('post.show', $post->slug) }}" class="text-black dark:text-white hover:underline">
                {{ $post->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Kolom 2: Experience -->
      <div>
        <h2 class="text-zinc-500 dark:text-zinc-400 text-xl font-light mb-4">
          Experience
        </h2>
        <ul>
          <li class="text-black dark:text-white">(2024) BW H ontwerpers</li>
          <li class="text-black dark:text-white">(2025) Freelance Work</li>
        </ul>
      </div>

      <!-- Kolom 3: Contact -->
      <div>
        <h2 class="text-zinc-500 dark:text-zinc-400 text-xl font-light mb-4">
          Contact
        </h2>
        <ul>
          <li>
            <a href="mailto:info@robindogger.nl" class="text-black dark:text-white hover:underline">
              info@robindogger.nl
            </a>
          </li>
          <li>
            <a href="tel:0634828920" class="text-black dark:text-white hover:underline">
              06 34828920
            </a>
          </li>
        </ul>
      </div>

      <!-- Kolom 4: Socials -->
      <div>
        <h2 class="text-zinc-500 dark:text-zinc-400 text-xl font-light mb-4">
          Socials
        </h2>
        <ul>
          <li>
            <a href="#" class="text-black dark:text-white hover:underline">
              Instagram
            </a>
          </li>
          <li>
            <a href="#" class="text-black dark:text-white hover:underline">
              Linkedin
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Copyright sectie -->
    <div class="text-xs text-gray-800/50 dark:text-gray-400/50">
      &copy; {{ date('Y') }} {{ config('app.name') }}
    </div>
  </x-container>
</footer>