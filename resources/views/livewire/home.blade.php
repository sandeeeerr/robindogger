<div>
  <x-hero title="A Graphic & Motion <br /> Designer based in Leeuwarden." />

  <x-container>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($posts as $post)
        <div>
          <a
            class="*:transition group"
            href="{{ $post->url }}"
            wire:navigate
          >
            <div class="w-full mb-2 overflow-hidden group-hover:brightness-90 aspect-[3/4] bg-gray-200 dark:bg-gray-900">
              @if ($post->image)
                <img
                  class="object-cover w-full h-full"
                  src="{{ asset('storage/' . $post->image->path) }}"
                  alt="{{ $post->image->alt ?? $post->title }}"
                />
              @else
                <div class="flex items-center justify-center w-full h-full text-gray-400 dark:text-gray-500 bg-gray-200 dark:bg-gray-900">
                  Article
                </div>
              @endif
            </div>

            <h3 class="text-lg text-gray-700 dark:text-gray-300 font-light text-center my-4 group-hover:text-primary-500 dark:group-hover:text-primary-400">
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