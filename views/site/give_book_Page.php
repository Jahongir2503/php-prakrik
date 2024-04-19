<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/give_book_Page.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="blok">
        <div class="readerInfo">
            <a class="backButton" href="javascript:history.go(-1)">Назад</a>
        </div>
        <div class="main-content">

            <form method="POST">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <h1>Выдать Книгу</h1>
                <label for="reader-select">Выберите читателя</label>
                <select name="reader_id">
                    <option>-- Пожалуйста, выберите --</option>
                    <?php foreach ($readers as $reader): ?>
                        <option value="<?= $reader->reader_id ?>"><?= $reader->surname ?>
                            №<?= $reader->number_library_card ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="book-select">Выберите книгу</label>
                <select name="book_id">
                    <option>-- Пожалуйста, выберите --</option>
                    <?php foreach ($books as $book): ?>
                        <option value="<?= $book->book_id ?>"><?= $book->name ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="admin_input">
                    <label for="date_of_issue">Дата выдачи</label>
                    <input type="date" name="date_of_issue">
                    <label for="return_date">Дата возврата</label>
                    <input type="date" name="return_date">
                </div>
                <div class="button">
                    <button type="submit">Выдать Книгу</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>