<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/pop-it-mvc/public/css/give_book_Page.css">

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
                <h1>Выдать Книгу</h1>
                <label for="pet-select">Ввыбирите Номер читательского билета</label>
                <select>
                    <option value="">--Please choose an option--</option>
                    <option >№54321</option>
                    <option >№42321</option>

                </select>
                <label for="pet-select">Выбирите книгу</label>
                <select>
                    <option value="">--Please choose an option--</option>
                    <option >Капитанская Дочка</option>
                    <option >Война и Мир</option>
                </select>
                <div class="admin_input">
                    <label >Выдано</label>
                    <input   type="date">
                    <label >Сдавать</label>
                    <input class="" type="date">
                </div>

                <div class="button">
                    <button>Выдать Книгу</button>
                </div>

            </form>
        </div>
    </div>
    <div class="footer"></div>
</div>

</body>
</html>