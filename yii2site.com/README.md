Реализована форма для встраивания на любые контентные страницы сайта.
Оба сайта реализованы на yii2 advanced, соответственно настроены хосты.

Api сайт: yii2.com
Cодержит простой api контроллер frontend\controllers\ApiController , содержит два метода :
actionView($id) получение данных по page_uid
actionUpdate($id) изменение данных
Модель Data (\frontend\models\Data.php) имеет следующие поля (валидация данных в rule) :
id, name, email, page_uid (id страницы в формате string, в примере 111-qwerty-222, уникальный индекс), created (дата добавления)
бд: mysql
дамп: yii2 базы данных - dump.sql


Основной сайт: yii2site.com
Cодержит простой http клиент для отправки запросов в сервис yii2.com(data), 
а также встраиваемый виджет в который передается параметр page_uid - уникальный ID страницы, во вьюхе
\frontend\views\site\index.php (http://prntscr.com/u1v406)

Описание работы виджета:
вставляем html код на любую страницу сайта
при рендере страници происходит ajax запрос в js, на получение данных http://prntscr.com/u1v306
при отправке данных с формы происходит ajax на метод изменения данных

Настройка:
включить на сервере cors для хоста в который встраивается виджет или указать для всех *
Access-Control-Allow-Origin ...
лежит js виджета http://yii2.com/js/widgets.js

Сам встраиваемый код
<!-- Begin widget -->
<form id="wbd-widget-form" class="wbd-widget__form">
    <input type="hidden" id="page_id" name="page_id" value="111-qwerty-222">
    Name <input type="text" id="name" name="name" value="">
    Email <input type="text" id="email" name="email" value="">
    <input type="submit" id="wbd-widget-update" class="wbd-widget__form-submit" value="Обновить">
</form>
<script src="http://yii2.com/js/widgets.js" charset="UTF-8"></script>
<!-- end widget -->

Также можно было в widgets.js:
добавить динамически создавать всю html форму с полями
добавить валидацию в модель для email, и вывод ошибок в виджете под полями при неправильном ввооде email
чпу для обоих проектов не настраивалось
crud для модели Data : http://yii2.com/frontend/web/index.php?r=data (http://prntscr.com/u1v1ot)