<div>
  <x-hero title="A Graphic & Motion <br /> Designer based in Leeuwarden." />

  <x-container>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($posts as $post)
      {{-- @dd($post ) --}}
        <div>
          <a href="{{ $post->url }}" class="transition group" wire:navigate>
            <div class="w-full mb-2 overflow-hidden group-hover:brightness-90 aspect-[3/4] bg-gray-200 dark:bg-gray-900 relative">
              @if ($post->media)
            
                @if ($post->is_video)
                  <!-- Video als achtergrond -->
                  <video autoplay loop muted playsinline class="object-cover w-full h-full">
                    <source src="{{ $post->media_url }}" type="{{ $post->media->mime_type }}">
                    Your browser does not support the video tag.
                  </video>
                @else
                  <!-- Afbeelding als achtergrond (wanneer media geen video is) -->
                  <img
                    class="object-cover w-full h-full"
                    src="{{ $post->media_url }}"
                    alt="{{ $post->media->alt ?? $post->title }}"
                  />
                @endif
              @elseif ($post->image)
                <!-- Fallback op een image-object als er geen media is -->
                <img
                  class="object-cover w-full h-full"
                  src="{{ asset('storage/' . $post->image->path) }}"
                  alt="{{ $post->image->alt ?? $post->title }}"
                />
              @else
                <!-- Placeholder wanneer er geen media of image beschikbaar is -->
                <div class="flex justify-center items-center w-full h-full text-gray-400 dark:text-gray-500">
                  Article
                </div>
              @endif
            </div>

            <h3 class="my-4 text-lg font-light text-center text-gray-700 dark:text-gray-300 group-hover:text-primary-500 dark:group-hover:text-primary-400">
              {{ $post->title }}
            </h3>
          </a>
        </div>
      @endforeach

      @empty($posts)
        <div class="text-gray-700 dark:text-gray-300">No posts yet.</div>
      @endempty
    </div>
  </x-container>
</div>
