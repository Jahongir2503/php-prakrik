<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'],'/admin', [Controller\Site::class, 'addLibrarian']);
Route::add("GET",'/book_page', [Controller\Site::class, 'book']);
Route::add("GET",'/book_info', [Controller\Site::class, 'book_info']);