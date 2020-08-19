����������� ����� ��� ����������� �� ����� ���������� �������� �����.
��� ����� ����������� �� yii2 advanced, �������������� ��������� ����� � ����� frontend.

Api ����: yii2.com
C������� ������� api ���������� frontend\controllers\ApiController extends \JsonRpc2\Controller, 
�������� ��� ������ :
actionView($id) ��������� ������ �� page_uid
actionUpdate($id) ��������� ������
������ Data (\frontend\models\Data.php) ����� ��������� ���� (��������� ������ � rule) :
id, name, email, page_uid (id �������� � ������� string, � ������� 111-qwerty-222, ���������� ������), created (���� ����������)
��: mysql
����: yii2 ���� ������ - dump.sql


�������� ����: yii2site.com
C������� ������� http ������ ��� �������� �������� � ������ yii2.com(data), 
� ����� ������������ ������ � ������� ���������� �������� page_uid - ���������� ID ��������, �� �����
\frontend\views\site\index.php (http://prntscr.com/u1v406)

�������� ������ �������:
��������� html ��� �� ����� �������� �����
��� ������� �������� ���������� ajax ������ c js, 
    JSON.stringify ({jsonrpc:'2.0',method:'view', params:[page_id], id:"1"} ),
�� ��������� ������ Content-Type: application/json :
    {"jsonrpc":"2.0","id":"1","result":{"id":1,"page_uid":"111-qwerty-222","name":"test name","email":"mytest@mail.ru","created":"2020-08-18 23:14:02"}}
��� �������� ������ � ����� ���������� ajax �� ����� ��������� ������
c������������� ���� json rpc

���������:
��������� �� ������� CORS ��� ����� � ������� ������������ ������ ��� ������� ��� ���� *
Access-Control-Allow-Origin ...
����� js ������� http://yii2.com/js/widgets.js

��� ������������ ���, ������� �� �������� js ��� ������ � jquery:
<!-- Begin widget -->
<form id="wbd-widget-form" class="wbd-widget__form">
    <input type="hidden" id="page_id" name="page_id" value="111-qwerty-222">
    Name <input type="text" id="name" name="name" value="">
    Email <input type="text" id="email" name="email" value="">
    <input type="submit" id="wbd-widget-update" class="wbd-widget__form-submit" value="��������">
</form>
<script src="http://yii2.com/js/widgets.js" charset="UTF-8"></script>
<!-- end widget -->

����� ����� ���� � widgets.js:
�������� ����������� ��������� ��� html ����� � ������
�������� ��������� � ������ ��� email, � ����� ������ � ������� ��� ������ ��� ������������ ������ email
{"jsonrpc":"2.0","id":"1","error":{"code":-32603,"message":"Internal error","data":null}}

crud ��� ������ Data : http://yii2.com/data (http://prntscr.com/u1v1ot)