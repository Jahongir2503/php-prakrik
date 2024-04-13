<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/librarian_page.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="reader_block">
        <a class="link" href="<?= app()->route->getUrl('/add_readers') ?>">Добавить читателя</a>
        <a class="link" href="<?= app()->route->getUrl('/add_book') ?>">Добавить Книгу</a>
        <a class="link" href="<?= app()->route->getUrl('/give_book_Page') ?>">Выдать Книгу</a>
        <a class="link" href="<?= app()->route->getUrl('/accept_the_book') ?>">Принять Книгу</a>
        <a class="link" href="<?= app()->route->getUrl('/readers_profile') ?>">Выбрать Книгу</a>
        <a class="link" href="<?= app()->route->getUrl('/book_stat') ?>">Посмотреть Статистику</a>
        <a class="link" href="<?= app()->route->getUrl('/choose_book') ?>">Назначить Популярную Книгу</a>
        <a class="link" href="<?= app()->route->getUrl('/librarian_profile') ?>">Профиль</a>
        <a href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
    </div>


    <div class="footer"></div>
</div>

</body>
</html>