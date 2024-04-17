<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/adminPage.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="blok">
        <div class="main-content">
            <pre><?= $message ?? ''; ?></pre>
            <form method="post">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <h1>Добавить Библиотекаря</h1>
                <label>Имя</label>
                <input type="text" name="name" placeholder="Имя">
                <label>Логин</label>
                <input type="text" name="login" placeholder="Логин">
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Пароль">
                <div class="button">
                    <button>Создать</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
