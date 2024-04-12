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
            <form>
                <h1>Вход</h1>
                <label>Email address</label>
                <input type="email"  placeholder="Enter email">
                <label>Password</label>
                <input type="password"  placeholder="Password">
                <div class="button">
                    <a href="<?= app()->route->getUrl('/librarian_page')?>">Войти</a>
                </div>

            </form>
        </div>
    </div>
    <div class="footer"></div>
</div>

</body>
</html>