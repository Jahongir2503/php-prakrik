<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/books_page.css">
    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="readerInfo">
        <a class="backButton" href="javascript:history.go(-1)">Назад</a>
    </div>
    <div class="p">
        <p>Популярная книга</p>
    </div>

    <div class="popularBook">

        <?php if ($popularBook): ?>

                <div class="book_card">
                    <div class="car_img">
                        <img src="<?= $popularBook->img ?>" alt="gribi" width="350px" height="250px">
                    </div>
                    <div class="boot_description">
                        <h2><?= $popularBook->name ?></h2>
                        <p><?= $popularBook->short_description ?></p>
                    </div>
                    <div class="button">
                        <a href="<?= app()->route->getUrl("/book_info?book_id=$popularBook->book_id")?>">Узнать Больше</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="card">
        <?php foreach ($books as $book): ?>
            <div class="book_card">
                <div class="car_img">
                    <img src="<?= $book->img ?>" alt="gribi" width="350px" height="250px">
                </div>
                <div class="boot_description">
                    <h2><?= $book->name ?></h2>
                    <p><?= $book->short_description ?></p>
                </div>
                <div class="button">
                    <a href="<?= app()->route->getUrl("/book_info?book_id=$book->book_id")?>">Узнать Больше</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
