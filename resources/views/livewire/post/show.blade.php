<div>
  <!-- Article -->
  <article>
    <x-hero :title="$post->getTranslated('title')"></x-hero>

    <x-container>
      <div class="max-w-none prose dark:prose-invert">
        <!-- Bovenste blok: Description, Services en Year -->
        <div class="grid grid-cols-1 mb-4 md-gap-0 md:grid-cols-4 md:gap-8 md:mb-8">
          <div class="md:col-span-2">
            <h2 class="mt-0 mb-2 text-xl font-light md:mb-2 text-zinc-500 dark:text-zinc-400">
              {{ __('Description') }}
            </h2>
            @if ($post->getTranslated('description'))
              <p class="text-xl font-light text-gray-700 dark:text-gray-300">
                {{ $post->getTranslated('description') }}
              </p>
            @else
              <p class="text-xl font-light text-gray-500 dark:text-gray-400">
                No description available.
              </p>
            @endif
          </div>

          <div class="md:col-span-1">
            <h2 class="mt-0 mb-2 text-xl font-light md:mb-2 text-zinc-500 dark:text-zinc-400">
              {{ __('Services') }}
            </h2>
            @php
              $tags = collect(explode(',', (string) ($post->services ?? '')))
                ->map(fn ($t) => trim($t))
                ->filter(fn ($t) => $t !== '');
            @endphp
            @if (isset($tags) && $tags->isNotEmpty())
              @foreach ($tags as $tag)
                <p class="text-xl font-light text-gray-500 dark:text-gray-400 m-0">{{ __($tag) }}</p>
              @endforeach
            @else
              <p class="text-xl font-light text-gray-500 dark:text-gray-400">
                No services available.
              </p>
            @endif
          </div>

          <div class="mt-4 md:mt-0 md:col-span-1">
            <h2 class="mt-0 mb-2 text-xl font-light md:mb-2 text-zinc-500 dark:text-zinc-400">
              {{ __('Year') }}
            </h2>
            @if ($post->year)
              <p class="text-xl font-light text-gray-700 dark:text-gray-300">
                {{ $post->year }}
              </p>
            @else
              <p class="text-xl font-light text-gray-500 dark:text-gray-400">
                No year available.
              </p>
            @endif
          </div>
        </div>

        <!-- Media rows -->
        @if (isset($post->rows) && count($post->rows) > 0)
          @foreach ($post->rows as $row)
            @php
              $cols = count($row['media']);
            @endphp
            <!-- Op mobiel altijd 1 kolom, op grotere schermen evenveel als er media-elementen zijn -->
            <div class="grid gap-4 mb-4 grid-cols-1 md:grid-cols-{{ $cols }}">
              @foreach ($row['media'] as $media)
                @php
                  $mediaFile = \Awcodes\Curator\Models\Media::where('id', $media['media_file'])->first();
                @endphp
                @if ($mediaFile)
                  <div class="relative 
                    @if($cols == 1)
                      aspect-auto
                    @elseif($cols == 3)
                      aspect-[3/4]
                    @else
                      aspect-square
                    @endif
                    @if($cols == 3)
                      md:aspect-[3/4]
                    @elseif($cols == 2)
                      md:aspect-square
                    @else
                      md:aspect-[2/1]
                    @endif">
                    @if (Str::endsWith($mediaFile->path, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                      <!-- Render image -->
                      <img
                        src="{{ Storage::url($mediaFile->path) }}"
                        alt="{{ $mediaFile->alt ?? 'Media' }}"
                        class="@if($cols == 1) object-contain md:object-cover md:object-center @else object-cover object-center @endif mt-0 mb-0 w-full h-full"
                      />
                    @elseif (Str::endsWith($mediaFile->path, ['.mp4', '.avi', '.mpeg']))
                      <!-- Render video -->
                      <video autoplay loop muted playsinline class="@if($cols == 1) object-contain md:object-cover md:object-center @else object-cover object-center @endif mt-0 w-full h-full">
                        <source src="{{ Storage::url($mediaFile->path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
                    @else
                      <!-- Unsupported media type -->
                      <div class="flex justify-center items-center mt-0 w-full h-full bg-gray-200 dark:bg-gray-800">
                        <p class="text-center text-gray-500 dark:text-gray-400">Unsupported media type</p>
                      </div>
                    @endif
                  </div>
                @else
                  <!-- Media not found -->
                  <div class="flex justify-center items-center w-full h-full bg-gray-200 dark:bg-gray-800">
                    <p class="text-center text-gray-500 dark:text-gray-400">Media not found</p>
                  </div>
                @endif
              @endforeach
            </div>
          @endforeach
        @else
          <p class="text-xl font-light text-gray-500 dark:text-gray-400">
            No media rows available.
          </p>
        @endif
      </div>
    </x-container>
  </article>
</div>
