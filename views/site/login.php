<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/styles.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="blok">
        <div class="main-content">


            <h3><?= app()->auth->user()->name ?? ''; ?></h3>
            <?php
            if (!app()->auth::check()):
            ?>
                <h3><?= $message ?? ''; ?></h3>
            <form method="post">
                <label>Логин <input type="text" name="login"></label>
                <label>Пароль <input type="password" name="password"></label>
                <button>Войти</button>
            </form>
            <?php endif;
            ?>
        </div>
    </div>
    <div class="footer"></div>
</div>

</body>
</html>
