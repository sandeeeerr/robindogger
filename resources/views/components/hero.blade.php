@props([
  'title' => null,
  'afterTitle' => null,
])

<div {{ $attributes->merge(['class' => 'py-12 md:py-16 text-zinc-500 dark:text-zinc-400 bg-white dark:bg-black']) }}>
  <x-container>
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-light leading-tight">
      {!! $title ?? $slot !!}
    </h1>

    @if ($afterTitle)
      <div class="mt-4 text-sm sm:text-base">
        {{ $afterTitle }}
      </div>
    @endif
  </x-container>
</div>
