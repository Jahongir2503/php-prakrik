<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/book_stat.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="title">
        <p>Статистика Популярных Книг</p>
    </div>
    <?php
        if (isset($message)) {
            echo "<h4>$message</h4>";
        }
    ?>
    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Номер</th>
                <th>Произведение</th>
                <th>Количество аренд</th>
                <th>Назначить книгу популярной</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($booksInfo as $index => $bookInfo): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $bookInfo['book']->name ?></td>
                    <td><?= $bookInfo['rentals_count'] ?></td>
                    <td>
                        <form action="<?= app()->route->getUrl('/choose_popular_book')?>" method="post">
                            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                            <input type="hidden" name="book_id" value="<?= $bookInfo['book']->book_id ?>">
                            <button>Назначить популярной</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="readerInfo">
        <a class="backButton" href="javascript:history.go(-1)">Назад</a>
    </div>
</div>
</body>
</html>