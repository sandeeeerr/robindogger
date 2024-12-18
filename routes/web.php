<?php

use App\Livewire\CommingSoon;
use App\Livewire\Post\Show as PostShow;
use Illuminate\Support\Facades\Route;

Route::get('/', CommingSoon::class)->name('home');
Route::get('/article/{post:slug}', PostShow::class)->name('post.show');
