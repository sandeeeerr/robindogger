<?php

use App\Livewire\Home;
use App\Livewire\Post\Show as PostShow;
use App\Livewire\Info;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');
Route::get('/curator/test', function () {
    return 'Curator route works!';
});
Route::get('/info', Info::class)->name('info');
Route::get('/phpinfo', function () {
    phpinfo();
});

// Language switcher route
Route::get('/locale/{locale}', function (string $locale) {
    $allowed = ['nl', 'en'];
    if (! in_array($locale, $allowed, true)) {
        $locale = config('app.fallback_locale', 'en');
    }

    session(['locale' => $locale]);

    $intended = url()->previous();
    $host = parse_url($intended, PHP_URL_HOST);
    $appHost = parse_url(config('app.url'), PHP_URL_HOST);

    if ($host !== null && $appHost !== null && $host !== $appHost) {
        $intended = url('/');
    }

    return redirect()->to($intended ?? url('/'));
})->name('locale.switch');