@php
    // Haal 4-5 willekeurige posts op
    $randomPosts = App\Models\Post::inRandomOrder()->limit(4)->get();
@endphp

<footer class="justify-self-end py-8 mt-8 bg-white dark:bg-black">
  <x-container class="mx-auto max-w-7xl"> <!-- Maximale breedte en centreren -->
    <h1 class="mb-6 text-3xl font-light leading-tight text-black sm:text-4xl md:text-5xl dark:text-white md:mb-8">
      Let's work together <br />
      email: 
      <a class="transition text-zinc-500 dark:text-zinc-400 hover:text-zinc-700 dark:hover:text-zinc-300" href="mailto:robindogger@gmail.com">
        robindogger@gmail.com
      </a>
    </h1>

    <!-- Grid voor de 4 kolommen -->
    <div class="grid grid-cols-1 gap-8 mb-8 md:grid-cols-2 lg:grid-cols-4">
      <!-- Kolom 1: Selected Works -->
      <div>
        <h2 class="mb-4 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Selected Works
        </h2>
        <ul>
          @foreach ($randomPosts as $post)
            <li>
              <a href="{{ route('post.show', $post->slug) }}" class="text-xl font-light text-black dark:text-white hover:underline">
                {{ $post->title }}
              </a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Kolom 2: Experience -->
      <div>
        <h2 class="mb-4 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Experience
        </h2>
        <ul>
          <li class="text-xl font-light text-black dark:text-white">(2024) BW H ontwerpers</li>
          <li class="text-xl font-light text-black dark:text-white">(2025) Freelance Work</li>
        </ul>
      </div>

      <!-- Kolom 3: Contact -->
      <div>
        <h2 class="mb-4 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Contact
        </h2>
        <ul>
          <li>
            <a href="mailto:info@robindogger.nl" class="text-xl font-light text-black dark:text-white hover:underline">
              info@robindogger.nl
            </a>
          </li>
          <li>
            <a href="tel:0634828920" class="text-xl font-light text-black dark:text-white hover:underline">
              06 34828920
            </a>
          </li>
        </ul>
      </div>

      <!-- Kolom 4: Socials -->
      <div>
        <h2 class="mb-4 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Socials
        </h2>
        <ul>
          <li>
            <a href="#" class="text-xl font-light text-black dark:text-white hover:underline">
              Instagram
            </a>
          </li>
          <li>
            <a href="#" class="text-xl font-light text-black dark:text-white hover:underline">
              Linkedin
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Bottom footer section -->
    <div class="grid col-span-4 pt-8 mt-8 md:grid-cols-2">
      <div class="text-xl font-light text-zinc-500" >
        All visuals, animations, and text on this site are original works by Robin Dogger. Copying, reproducing, or sharing without prior permission is strictly prohibited.
        <br><br>
        © 2024 Robin Dogger. All rights reserved.
      </div>
      <div class="mt-4 text-xl font-light md:mt-0 text-zinc-500">
        Website development: <a href="https://sanderr.site" class="hover:underline">Sanderr</a>
      </div>
    </div>
  </x-container>
</footer>