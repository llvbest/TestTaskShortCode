����������� ����� ��� ����������� �� ����� ���������� �������� �����.
��� ����� ����������� �� yii2 advanced, �������������� ��������� �����.

Api ����: yii2.com
C������� ������� api ���������� frontend\controllers\ApiController , �������� ��� ������ :
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
��� ������� �������� ���������� ajax ������ � js, �� ��������� ������ http://prntscr.com/u1v306
��� �������� ������ � ����� ���������� ajax �� ����� ��������� ������

���������:
�������� �� ������� cors ��� ����� � ������� ������������ ������ ��� ������� ��� ���� *
Access-Control-Allow-Origin ...
����� js ������� http://yii2.com/js/widgets.js

��� ������������ ���
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
��� ��� ����� �������� �� �������������
crud ��� ������ Data : http://yii2.com/frontend/web/index.php?r=data (http://prntscr.com/u1v1ot)