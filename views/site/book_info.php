<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/book_info.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="book_info">
        <div class="book_title">
            <p><?= $book->name ?></p>
        </div>

        <div class="book_posotion">
            <div class="book_card">
                <div class="car_img">
                    <img src="<?= $book->img ?>" alt="<?= $book->name ?>" width="350px" height="250px">
                </div>
                <div class="boot_description">
                    <p>Автор: <?= $book->author_id ?></p>
                    <p>Год издания: <?= $book->year_of_publication ?></p>
                    <p>Издание: <?= $book->new_edition ? 'новое' : 'старое' ?></p>
                    <p>Цена по городу <?= $book->price ?>р.</p>
                </div>
            </div>
            <div class="book_text">
                <p><?= $book->short_description ?></p>
            </div>
        </div>
        <div class="button_position">
            <button>Забронировать</button>
        </div>
    </div>
</div>
</body>
</html>