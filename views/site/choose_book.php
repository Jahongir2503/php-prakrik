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
        <p>Назначить популярную книгу</p>
    </div>
    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Номер</th>
                <th>Произведение</th>
                <th>Количество аренд</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($booksInfo as $index => $bookInfo): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $bookInfo['book']->name ?></td>
                    <td><?= $bookInfo['rentals_count'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>