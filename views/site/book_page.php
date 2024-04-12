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
    <div class="card">
        <div class="book_card">
            <div class="car_img">
                <img src="/pop-it-mvc/public/media/voina_i_mir.jpg" alt="gribi" width="350px" height="250px">
            </div>
            <div class="boot_description">
                <h2>Толстой Л. Н. «Война и мир»</h2>
                <p>Роман-эпопея Льва Николаевича Толстого, <br>
                    описывающий русское общество в эпоху <br>
                    войн против Наполеонав 1805—1812 годах.<br>
                    Эпилог романа доводит повествование до <br> 1820 года.</p>
            </div>
            <div class="button">
                <a href="<?= app()->route->getUrl('/book_info')?>">Узнать Больше</a>
            </div>
        </div>
        <div class="book_card">
            <div class="car_img">
                <img src="/pop-it-mvc/public/media/kapitanskay_dochka.jpg" alt="gribi" width="350px" height="250px">
            </div>
            <div class="boot_description">
                <h2>Пушкин А.С.Капитанская Дочка</h2>
                <p>«Капитанская дочка» принадлежит к числу <br>
                    произведений, которыми русские писатели <br>
                    1830-х годов откликнулись на успех <br>
                    переводных романов Вальтера Скотта</p>
            </div>
            <div class="button">
                <a href="<?= app()->route->getUrl('/book_info')?>">Узнать Больше</a>
            </div>
        </div>
        <div class="book_card">
            <div class="car_img">
                <img src="/pop-it-mvc/public/media/gore_ot_uma.jpg" alt="gribi" width="350px" height="250px">
            </div>
            <div class="boot_description">
                <h2>Грибоедов А.С. Горе от ума</h2>
                <p>Комедия «Горе от ума - сатира <br>
                    на аристократическое московское общество <br>
                    первой половины XIX века — одна из вершин <br>
                    русской драматургии и поэзии; фактически <br>
                    завершила комедию в стихах как жанр. </p>
            </div>
            <div class="button">
                <a href="<?= app()->route->getUrl('/book_info')?>">Узнать Больше</a>
            </div>
        </div>
    </div>
</div>

<div class="footer"></div>
</div>

</body>
</html>