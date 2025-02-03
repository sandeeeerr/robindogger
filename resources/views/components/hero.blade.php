@props([
  'title' => null,
  'afterTitle' => null,
])

<div {{ $attributes->merge(['class' => 'pt-12 md:pt-16 pb-4 md:pb-6 text-zinc-500 dark:text-zinc-400 bg-white dark:bg-black']) }}>
  <x-container>
    <h1 class="text-3xl font-light leading-tight sm:text-4xl md:text-5xl">
      {!! $title ?? $slot !!}
    </h1>

    @if ($afterTitle)
      <div class="mt-4 text-sm sm:text-base">
        {{ $afterTitle }}
      </div>
    @endif
  </x-container>
</div>
