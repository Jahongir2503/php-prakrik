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
Route::add("GET",'/readers_profile', [Controller\Site::class, 'readers_profile']);
Route::add("GET",'/librarian_page', [Controller\Site::class, 'librarian_page']);
Route::add(['GET', 'POST'],'/add_readers', [Controller\Site::class, 'add_readers']);
Route::add(['GET', 'POST'],'/add_book', [Controller\Site::class, 'add_book']);
Route::add(['GET', 'POST'],'/give_book_Page', [Controller\Site::class, 'give_book_Page']);
Route::add(['GET', 'POST'],'/accept_the_book', [Controller\Site::class, 'accept_the_book']);
Route::add(['GET', 'POST'],'/book_stat', [Controller\Site::class, 'book_stat']);
Route::add(['GET', 'POST'],'/choose_book', [Controller\Site::class, 'choose_book']);
Route::add('GET','/librarian_profile', [Controller\Site::class, 'librarian_profile']);