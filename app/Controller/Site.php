<?php

namespace Controller;

use Model\Post;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;


class Site
{
    public function index(Request $request): string
    {
        $posts = Post::where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }


    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function addLibrarian(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            app()->route->redirect('/login');
        }
        return new View('site.adminPage');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }
    public function admin(): string{
        return new View('site.adminPage');
    }
    public function book(): string{
        return new View('site.book_page');
    }

    public function book_info(): string{
        return new View('site.book_info');
    }
    public function readers_profile(): string{
        return new View('site.readers_profile');
    }
    public function librarian_page(): string{
        return new View('site.librarian_page');
    }
    public function add_readers(): string{
        return new View('site.add_readers');
    }
    public function add_book(): string{
        return new View('site.add_book');
    }
    public function give_book_Page(): string{
        return new View('site.give_book_Page');
    }
    public function accept_the_book(): string{
        return new View('site.accept_the_book');
    }
    public function book_stat(): string{
        return new View('site.book_stat');
    }
    public function choose_book(): string{
        return new View('site.choose_book');
    }
    public function librarian_profile(): string{
        return new View('site.librarian_profile');
    }



}
