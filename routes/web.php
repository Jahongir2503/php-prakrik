<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add(['GET', 'POST'],'/admin', [Controller\Site::class, 'addLibrarian'])->middleware('auth', 'role');
Route::add("GET",'/book_page', [Controller\Site::class, 'book'])->middleware('auth', 'roleLibrarian');
Route::add("GET",'/book_info', [Controller\Site::class, 'book_info'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/readers_profile', [Controller\Site::class, 'readers_profile'])->middleware('auth', 'roleLibrarian');
Route::add("GET",'/librarian_page', [Controller\Site::class, 'librarian_page'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/add_readers', [Controller\Site::class, 'add_readers'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/add_book', [Controller\Site::class, 'add_book'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/give_book_Page', [Controller\Site::class, 'give_book_Page'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/accept_the_book', [Controller\Site::class, 'accept_the_book'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/book_stat', [Controller\Site::class, 'book_stat'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/choose_popular_book', [Controller\Site::class, 'choosePopularBook'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/choose_book', [Controller\Site::class, 'choose_book'])->middleware('auth', 'roleLibrarian');
Route::add('GET','/librarian_profile', [Controller\Site::class, 'librarian_profile'])->middleware('auth', 'roleLibrarian');
Route::add(['GET', 'POST'],'/add_author', [Controller\Site::class, 'add_author'])->middleware('auth', 'roleLibrarian');

