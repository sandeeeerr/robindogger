<div>
  <!-- Article -->
  <article>
    <x-hero :title="$post->title"></x-hero>

    <x-container>
      <h3 class="text-gray-900 dark:text-gray-100">
        Under Construction – We hope to go live as soon as possible. Please check back soon!
      </h3>
      {{-- <div class="prose max-w-none dark:prose-invert">
        <!-- Render content blocks -->
        @foreach ($post->blocks as $block)
          @switch($block->type)
            @case('markdown')
              @markdom($block->data->content)
            @break
            @default
              @dump($block)
          @endswitch
        @endforeach

        <!-- Render parsed rows -->
        @foreach ($post->parsed_rows as $row)
          <div class="grid gap-4 "
               style="grid-template-columns: repeat({{ count($row['media']) }}, minmax(0, 1fr));">
            @foreach ($row['media'] as $media)
              @php
                $mediaFile = \Awcodes\Curator\Models\Media::find($media['media_file']);
              @endphp
              @if ($mediaFile)
                <div class="relative 
                  @if(count($row['media']) == 3) aspect-[3/4] 
                  @elseif(count($row['media']) == 2) aspect-square 
                  @else aspect-[2/1] @endif">
                  @if (Str::endsWith($mediaFile->path, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                    <!-- Render image -->
                    <img
                      src="{{ Storage::url($mediaFile->path) }}"
                      alt="{{ $mediaFile->alt ?? 'Media' }}"
                      class="w-full h-full object-cover"
                    />
                  @elseif (Str::endsWith($mediaFile->path, ['.mp4', '.avi', '.mpeg']))
                    <!-- Render video -->
                    <video autoplay loop muted playsinline class="w-full h-full object-cover ">
                      <source src="{{ Storage::url($mediaFile->path) }}" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  @else
                    <!-- Unsupported media type -->
                    <div class="w-full h-full  bg-gray-200 dark:bg-gray-800 flex items-center justify-center">
                      <p class="text-center text-gray-500 dark:text-gray-400">Unsupported media type</p>
                    </div>
                  @endif
                </div>
              @else
                <!-- Media not found -->
                <div class="w-full h-full  bg-gray-200 dark:bg-gray-800 flex items-center justify-center">
                  <p class="text-center text-gray-500 dark:text-gray-400">Media not found</p>
                </div>
              @endif
            @endforeach
          </div>
        @endforeach
      </div>

      <!-- Edit knop voor ingelogde gebruikers -->
      @if (Auth::check())
        <div class="pt-4 mt-4 border-t dark:border-gray-700">
          <a class="inline-flex items-center text-sm text-primary-500 hover:text-primary-600 dark:hover:text-primary-400" href="{{ $post->editUrl }}">
            <x-heroicon-s-pencil class="inline-block w-3 h-3 mr-2" />
            Edit post
          </a>
        </div>
      @endif --}}
    </x-container>
  </article>
</div>
