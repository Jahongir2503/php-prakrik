<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/accept_the_book.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="reader_info">
        <div class="info">
            <h2>Информация о читателе</h2>
            <p>Читатель: <?= $reader->surname ?> <?= $reader->name ?> <?= $reader->patronymic ?></p>
            <p>Номер читательского билета: <?= $reader->number_library_card ?></p>
            <p>Адрес: <?= $reader->address ?></p>
            <p>Номер телефона: <?= $reader->phone_number ?></p>
        </div>
        <div class="rented_books">
            <h2>Арендованные книги</h2>
            <?php foreach ($rentedBooks as $rental): ?>
                <div class="book_card">
                    <div class="book_details">
                        <h3>Название Книги:</h3>
                        <p><?= $rental->book->name ?></p>
                    </div>
                    <h4>Дата выдачи: <?= $rental->date_of_issue ?></h4>
                    <h4>Дата сдачи: <?= $rental->return_date ?></h4>
                    <h4>Статус: <?= $rental->status ? 'Сдана' : 'В аренде' ?></h4>
                    <?php if (!$rental->status): ?>
                        <form method="POST" action="/return_book">
                            <input type="hidden" name="rental_id" value="<?= $rental->rental_id ?>">
                            <button type="submit">Сдать книгу</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="readerInfo">
            <a class="backButton" href="javascript:history.go(-1)">Назад</a>
        </div>
    </div>
</div>
</body>
</html>