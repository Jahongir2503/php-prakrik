<?php

namespace Controller;

use Illuminate\Support\Str;
use Model\Author;
use Model\Book;
use Model\author_of_books;
use Model\reader;
use Model\Book_rentals;
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


    public function book(Request $request): string
    {
        $books = Book::all();
        $popularBook = Book::where('is_popular', true)->first();
        return new View('site.book_page', ['books' => $books, 'popularBook' => $popularBook]);
    }

    public function getBookById($bookId)
    {
        return Book::find($bookId);
    }

    public function book_info(Request $request): string
    {
        $bookId = $request->query('book_id');
        $book = $this->getBookById($bookId);

        $authors = $book->authors()->get();

        return new View('site.book_info', ['book' => $book, 'authors' => $authors]);
    }

    public function getReaderById($readerId)
    {
        return Reader::find($readerId);
    }

    public function readers_profile(Request $request): string
    {
        $readerId = $request->query('reader_id');
        $id = $request->get('reader_id');
        $reader = $this->getReaderById($readerId);

        $rentedBooks = Book_rentals::where('reader_id', $readerId)->with('book')->get();

        return new View('site.readers_profile', ['reader' => $reader, 'rentedBooks' => $rentedBooks]);
    }



    public function librarian_profile(Request $request): string
    {
        $searchInput = $request->query('searchInput');

        $readers = Reader::query();

        if ($searchInput) {
            $readers->where('surname', 'like', '%' . $searchInput . '%');
        }

        $filteredReaders = $readers->get();
        $resetUrl = app()->route->getUrl('/librarian_profile');

        return new View('site.librarian_profile', ['readers' => $filteredReaders, 'searchInput' => $searchInput, 'resetUrl' => $resetUrl]);
    }


    public function librarian_page(): string
    {
        return new View('site.librarian_page');
    }

    public function add_readers(Request $request): string
    {
        $libraryCardNumber = Str::random(6);


        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'phone_number' => ['required'],
                'address' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
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
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required', 'unique:users,login'],
                'patronymic' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            return new View('site.add_author', ['message' => 'Вы успешно добавли автора']);
        }
        return new View('site.add_author');
    }


    public function add_book(Request $request): string
    {
        $authors = Author::all();

        if ($request->method === 'POST') {
            $data = $request->all();
            $file = $request->files();

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'year_of_publication' => ['required'],
                'price' => ['required'],
                'new_edition' => ['required'],
                'short_description' => ['required'],
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if ($validator->fails()) {
                return new View('site.admin',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            $fileName = $file['img']['name'];
            $path = ('/pop-it-mvc/public/media/' . $fileName);

            if (move_uploaded_file($file['img']['tmp_name'], 'media/' . $_FILES['img']['name'])) {
                $data['new_edition'] = $data['new_edition'] === '1' ? true : false;

                // Создание книги
                $book = Book::create([
                    'name' => $data['name'],
                    'year_of_publication' => $data['year_of_publication'],
                    'price' => $data['price'],
                    'new_edition' => $data['new_edition'],
                    'short_description' => $data['short_description'],
                    'img' => $path
                ]);

                // Связывание с авторами
                if (isset($data['authors'])) {
                    $book->authors()->attach($data['authors']);
                }

                return new View('site.add_book', ['message' => 'Вы успешно добавили книгу', 'authors' => $authors]);
            } else {
                echo 'Ошибка загрузки файла';
            }
        }

        return new View('site.add_book', ['authors' => $authors]);
    }


    public function give_book_Page(Request $request): string
    {
        $date = $request->all();
        $readers = Reader::all();
        $books = Book::all();

        if ($request->method === 'POST') {


            if (Book_rentals::create([
                'book_id' => $date['book_id'],
                'reader_id' => $date['reader_id'],
                'date_of_issue' => $date['date_of_issue'],
                'return_date' => $date['return_date'],
            ])) {
                return new View('site.give_book_Page', ['readers' => $readers, 'books' => $books, 'message' => 'Книга успешно выдана']);
            } else {
                return new View('site.give_book_Page', ['readers' => $readers, 'books' => $books, 'error' => 'Ошибка при выдаче книги']);
            }

        }
        return new View('site.give_book_Page', ['readers' => $readers, 'books' => $books]);
    }


    public function accept_the_book(Request $request): string {

        if ($request->method === 'POST') {
            $id = $request->get('rental_id');
            $rental = Book_rentals::find($id);
            $rental->status = 1;
            $rental->save();
            app()->route->redirect('/readers_profile?reader_id='. $request->get('reader_id'));
        }
        return (new View())->render('site.readers_profile');
    }

    public function book_stat(): string
    {
        $bookStats = Book_rentals::selectRaw('book_id, COUNT(*) as rentals_count')
            ->groupBy('book_id')
            ->orderByDesc('rentals_count')
            ->get();

        $booksInfo = [];
        foreach ($bookStats as $bookStat) {
            $book = Book::find($bookStat->book_id);
            if ($book) {
                $booksInfo[] = [
                    'book' => $book,
                    'rentals_count' => $bookStat->rentals_count,
                ];
            }
        }
        return (new View())->render('site.book_stat', ['booksInfo' => $booksInfo]);
    }

    public function choosePopularBook(Request $request)
    {
        $bookStats = Book_rentals::selectRaw('book_id, COUNT(*) as rentals_count')
            ->groupBy('book_id')
            ->orderByDesc('rentals_count')
            ->get();

        $booksInfo = [];
        foreach ($bookStats as $bookStat) {
            $book = Book::find($bookStat->book_id);
            if ($book) {
                $booksInfo[] = [
                    'book' => $book,
                    'rentals_count' => $bookStat->rentals_count,
                ];
            }
        }


        if ($request->method === 'POST') {
//            Book::where('is_popular', 1)->get()
            $book = Book::find($request->get('book_id'));
            $book->is_popular = 1;
            $book->save();
            return (new View())->render('site.book_stat', ['booksInfo' => $booksInfo, 'message' => 'Популярная книга успешно назначена']);
        }
    }




}
