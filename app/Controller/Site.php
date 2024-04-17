<?php

namespace Controller;

use Illuminate\Support\Str;
use Model\Author;
use Model\Book;
use Model\reader;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Src\Validator\Validator;


class Site
{

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/librarian_page');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    //функиця добавления библиотекарей
    public function addLibrarian(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.admin');
    }


    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/login');
    }

    public function admin(): string
    {
        return new View('site.admin');
    }

    public function book(Request $request): string
    {
        $books = Book::all();



        return new View('site.book_page', ['books' => $books]);
    }

    public function getBookById($bookId)
    {
        return Book::find($bookId);
    }

    public function book_info(Request $request): string
    {
        $bookId = $request->query('book_id');
        $book = $this->getBookById($bookId);
        return new View('site.book_info', ['book' => $book]);
    }

    public function getReaderById($readerId)
    {
        return Reader::find($readerId);
    }

    public function readers_profile(Request $request): string
    {
        $readerId = $request->query('reader_id');
        $reader = $this->getReaderById($readerId);

        return new View('site.readers_profile', ['reader' => $reader]);
    }


    public function librarian_profile(): string
    {
        $readers = Reader::all();

        return new View('site.librarian_profile', ['readers' => $readers]);
    }

    public function librarian_page(): string
    {
        return new View('site.librarian_page');
    }

    public function add_readers(Request $request): string
    {
        $libraryCardNumber = Str::random(6);


        if ($request->method === 'POST') {
            $readerData = $request->all();
            $readerData['number_library_card'] = $libraryCardNumber;
            if (Reader::create($readerData)) {
                return new View('site.add_readers', ['message' => 'Вы успешно добавили читателя']);
            }
        }
        return new View('site.add_readers');
    }

    public function add_author(Request $request): string
    {
        if ($request->method === 'POST' && Author::create($request->all())) {
            return new View('site.add_author', ['message' => 'Вы успешно добавли автора']);
        }
        return new View('site.add_author');
    }


    public function add_book(Request $request): string
    {
        $authors = Author::all();
        if ($request->method === 'POST') {
            {
                $data = $request->all();
                $file = $request->files();

                $fileName = $file['img']['name'];
                $path = ('/pop-it-mvc/public/media/' . $fileName);

                if(move_uploaded_file($file['img']['tmp_name'],
                    'media/' . $_FILES['img']['name'])) {
                } else {
                    echo 'Ошибка загрузки файла';
                }


                $data['new_edition'] = $data['new_edition'] === '1' ? true : false;
                Book::create([
                    ...$request->all(),
                    'img' => $path
                ]);
            }
//            return new View('site.add_book', ['message' => 'Вы успешно добавили книгу', 'authors' => $authors]);
        }
        return new View('site.add_book', ['authors' => $authors]);
    }

    public function give_book_Page(): string
    {
        return new View('site.give_book_Page');
    }

    public function accept_the_book(): string
    {
        return new View('site.accept_the_book');
    }

    public function book_stat(): string
    {
        return new View('site.book_stat');
    }

    public function choose_book(): string
    {
        return new View('site.choose_book');
    }



}
