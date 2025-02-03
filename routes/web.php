<?php

use App\Livewire\Home;
use App\Livewire\Post\Show as PostShow;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');
Route::get('/curator/test', function () {
    return 'Curator route works!';
});
