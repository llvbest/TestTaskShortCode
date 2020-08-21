Реализована форма для встраивания на любые контентные страницы сайта.
Оба сайта реализованы на yii2 advanced, соответственно настроены хосты в папки frontend.

**Api сайт: yii2.com**
Cодержит простой api контроллер frontend\controllers\ApiController extends \JsonRpc2\Controller, 
содержит два метода :
actionView($id) получение данных по page_uid
actionUpdate($id) изменение данных
Модель Data (\frontend\models\Data.php) имеет следующие поля (валидация данных в rule) :
id, name, email, page_uid (id страницы в формате string, в примере 111-qwerty-222, уникальный индекс), created (дата добавления)
бд: mysql
дамп: yii2 базы данных - dump.sql


**Основной сайт: yii2site.com**
Cодержит простой http клиент для отправки запросов в сервис yii2.com(data), 
а также встраиваемый виджет в который передается параметр page_uid - уникальный ID страницы, во вьюхе
\frontend\views\site\index.php (http://prntscr.com/u1v406)

**Описание работы виджета:**
вставляем html код на любую страницу сайта
при рендере страници происходит ajax запрос c js, 
    JSON.stringify ({jsonrpc:'2.0',method:'view', params:[page_id], id:"1"} ),
на получение данных Content-Type: application/json :
    {"jsonrpc":"2.0","id":"1","result":{"id":1,"page_uid":"111-qwerty-222","name":"test name","email":"mytest@mail.ru","created":"2020-08-18 23:14:02"}}
при отправке данных с формы происходит ajax на метод изменения данных
cоответственно тоже json rpc

**Настройка:**
настроить на сервере CORS для хоста в который встраивается виджет или указать для всех *
Access-Control-Allow-Origin ...
лежит js виджета http://yii2.com/js/widgets.js

Сам встраиваемый код, написан на нативном js без стилей и jquery, дабы не тянуть лишнее:
&lt;!-- Begin widget --&gt;
&lt;form id="wbd-widget-form" class="wbd-widget__form"&gt;
    &lt;input type="hidden" id="page_id" name="page_id" value="111-qwerty-222"&gt;
    Name &lt;input type="text" id="name" name="name" value=""&gt;
    Email &lt;input type="email" id="email" name="email" value=""&gt;
    &lt;input type="submit" id="wbd-widget-update" class="wbd-widget__form-submit" value="Обновить"&gt;
    &lt;div id="error"&gt;&lt;/div&gt;
&lt;/form&gt;
&lt;script src="http://yii2.com/js/widgets.js" charset="UTF-8"&gt;&lt;/script&gt;
&lt;!-- end widget --&gt;

**Также можно было в widgets.js:**
добавить динамически создавать всю html форму с полями в js
вывод ошибок в виджете под полями при неправильном ввооде email
{"jsonrpc":"2.0","id":"1","error":{"code":-32603,"message":"Internal error","data":null}}
пример валидации данных:
http://prntscr.com/u395eu

crud для модели Data : http://yii2.com/data (http://prntscr.com/u1v1ot)
