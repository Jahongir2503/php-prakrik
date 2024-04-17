<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/add_book.css">

    <title>Document</title>
</head>
<body>
<div class="adminPage">
    <div class="head">
        <p>ReadMore</p>
    </div>
    <div class="blok">
        <div class="main-content">
            <h3><?= $message ?? ''; ?></h3>
            <form method="post" enctype="multipart/form-data">
                <h1>Добавить Книгу</h1>
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <label   >Название Книги</label>
                <input name="name" type="text">
                <label for="">Автор</label>
                <select name="author_id">
                    <option value="">Выберите автора</option>
                    <?php foreach($authors as $author) {
                       echo "<option label='$author->surname'> $author->author_id </option>";
                    } ?>
                </select>
                <label for="">Год издания</label>
                <input name="year_of_publication" type="date">
                <label for="">Укажите Цену</label>
                <input name="price" type="number">
                <label for="">Укажите Издание</label>
                <select name="new_edition">
                    <option value="">--Please choose an option--</option>
                    <option label="Новое">1</option>
                    <option label="Старое">0</option>
                </select>
                <label for="">Короткое Описание</label>
                <input name="short_description" type="text">
                <lable>Добавьте Обложку</lable>
                <input type="file" name="img">
                <div class="button">
                    <button>Добавить Книгу</button>
                </div>

            </form>
        </div>

        <?php


        ?>

    </div>
</div>

</body>
</html>