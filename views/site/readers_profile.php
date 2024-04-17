<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/readers_profile.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="reader_block">
        <p>Читатель: <?= $reader->surname ?> <?= $reader->name ?> <?= $reader->patronymic ?></p>
        <p>Номер читательского билета: <?= $reader->number_library_card ?></p>
        <p>Адрес: <?= $reader->address ?></p>
        <p>Номер телефона: <?= $reader->phone_number ?></p>
    </div>
</div>
</body>
</html>