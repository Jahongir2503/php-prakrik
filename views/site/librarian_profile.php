<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/librarian_profile.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="searchContainer">
        <form method="GET" action="">
            <input type="text" id="searchInput" name="searchInput" placeholder="Поиск" value="<?= $searchInput ?>">
            <button id="searchButton">Найти</button>
            <?php if ($searchInput): ?>
                <a href="<?= $resetUrl ?>">Сбросить результаты</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="main">
        <?php foreach($readers as $reader): ?>
            <div class="readerInfo">
                <h2>Читатель: <?= $reader->surname ?></h2>
                <p>Номер читательского билета: <?= $reader->number_library_card ?></p>
                <a href="<?= app()->route->getUrl('/readers_profile?reader_id=' . $reader->reader_id) ?>">Подробнее</a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="readerInfo">
        <a class="backButton" href="javascript:history.go(-1)">Назад</a>
    </div>
</div>
</body>
</html>

