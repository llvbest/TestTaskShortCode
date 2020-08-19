ссылка на git https://github.com/llvbest/newscat
развернуто приложение сдесь
http://test.socanalysis.org/

спроектирована бд со связями многие ко многим, модели News и Rubric
в модели Rubric реализован компонент nested sets для хранения древовидной структуры рубрик
https://github.com/creocoder/yii2-nested-sets

вывод новостей для одной любой рубрики (id=2) в отдельном контроллере (NewsController),
в виде таблицы с подгрузкой данных при помощи pajax
http://test.socanalysis.org/index.php?r=news
Взаимодействие с пользователем происходит посредством HTTP запросов к API серверу. 
Все ответы представляют собой JSON объекты, далее преобразование в ArrayDataProvider для GridView

формат запроса для рубрики, указываем id (ApiController)
http://test.socanalysis.org/frontend/web/index.php?r=api/view&id=2
возвращает 6 новостей в формате json, которые относятся к указанной рубрике, включая дочерние

применение миграции на создание трех таблиц, новости и рубрики, промежуточная таблица
/console/controllers/m200611_071952_create_news_catalog
её усспешное применение
http://prntscr.com/tzagnk

все сделано очень просто без излишеств на минимализме функциональности
применено
mysql, apache, yii2

http://yii2.com/frontend/web/index.php?r=api/update&id=2
http://yii2.com/frontend/web/index.php?r=api/view&id=4cefefv32


http://yii2.com/frontend/web/index.php?r=site
http://yii2.com/frontend/web/index.php?r=data

