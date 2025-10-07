@php
    // Haal 4-5 willekeurige posts op
    $randomPosts = App\Models\Post::inRandomOrder()->limit(5)->get();
    $settings = App\Models\SiteSetting::query()->first();
@endphp

<footer class="justify-self-end py-8 mt-8 bg-white dark:bg-black">
  <x-container class="mx-auto max-w-7xl"> <!-- Maximale breedte en centreren -->
    <h1 class="text-3xl font-light leading-tight text-black sm:text-4xl md:text-5xl dark:text-white md:mb-8">
      Let's work together <br />
      email: 
      <a class="transition text-zinc-500 dark:text-zinc-400 hover:text-zinc-700 dark:hover:text-zinc-300" href="mailto:{{ $settings->email ?? 'robindogger@gmail.com' }}">
        {{ $settings->email ?? 'robindogger@gmail.com' }}
      </a>
    </h1>

    <!-- Grid voor de 4 kolommen -->
    <div class="grid grid-cols-1 gap-8 mt-24 mb-0 md:grid-cols-2 lg:grid-cols-4">
      <!-- Kolom 1: Selected Works -->
      <div>
        <h2 class="mb-2 text-xl font-light text-zinc-500 dark:text-zinc-400">
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
        <h2 class="mb-2 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Experience
        </h2>
        <ul>
          @foreach(($settings->experience ?? ['BW H ontwerpers (intern)', 'Freelance Work']) as $exp)
          @php(
            $label = is_array($exp) ? ($exp['label'] ?? ($exp['value'] ?? null)) : $exp
          )
          @php($url = is_array($exp) ? ($exp['url'] ?? null) : null)
          @if ($label)
            @if ($url)
            <li>
              <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" class="text-xl font-light text-black dark:text-white hover:underline">{{ $label }}</a>
            </li>
            @else
            <li class="text-xl font-light text-black dark:text-white">{{ $label }}</li>
            @endif
          @endif
          @endforeach
        </ul>
      </div>

      <!-- Kolom 3: Contact -->
      <div>
        <h2 class="mb-2 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Contact
        </h2>
        <ul>
          <li>
            <a href="mailto:{{ $settings->email ?? 'robindogger@gmail.com' }}" class="text-xl font-light text-black dark:text-white hover:underline">
              {{ $settings->email ?? 'robindogger@gmail.com' }}
            </a>
          </li>
        </ul>
      </div>

      <!-- Kolom 4: Socials -->
      <div>
        <h2 class="mb-2 text-xl font-light text-zinc-500 dark:text-zinc-400">
          Socials
        </h2>
        <ul>
          @php($socials = $settings->socials ?? [['name' => 'Instagram', 'url' => '#'], ['name' => 'LinkedIn', 'url' => '#']])
          @foreach($socials as $social)
          <li>
            <a href="{{ is_array($social) ? ($social['url'] ?? '#') : '#' }}" target="_blank" rel="noopener noreferrer" class="text-xl font-light text-black dark:text-white hover:underline">
              {{ is_array($social) ? ($social['name'] ?? 'Social') : 'Social' }}
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <!-- Bottom footer section -->
    <div class="grid col-span-4 pt-8 mt-8 md:grid-cols-2">
      <div class="pr-2 text-xl font-light text-zinc-500" >
        All visuals, animations, and text on this site are original works by Robin Dogger. Copying, reproducing, or sharing without prior permission is strictly prohibited.
        <br><br>
        © {{ date('Y') }} Robin Dogger. All rights reserved.
      </div>
      <div class="pr-2 mt-4 text-xl font-light md:mt-0 text-zinc-500">
        Website development: <a href="https://sanderr.nl" target="_blank" rel="noopener noreferrer" class="hover:underline">Sanderr</a>
      </div>
    </div>
  </x-container>
</footer>