<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('color-theme') === 'dark' || (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches) }" x-init="$watch('darkMode', value => localStorage.setItem('color-theme', value ? 'dark' : 'light')); darkMode ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark')">
  <head>
    {{ seo()->render() }}

    @stack('head')

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="font-sans text-base leading-normal tracking-normal text-gray-800 dark:text-gray-200 dark:bg-black">
    <div class="flex flex-col min-h-screen">
      <x-sections.header />

      <div class="flex-1">
        {{ $slot }}
      </div>

      <x-sections.footer />
    </div>

    @livewireScriptConfig
    @stack('scripts')
  </body>
</html>
