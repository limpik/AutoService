<?php
$db_host = 'localhost';
$db_user = 'root';
$db_database ='kingart';

$link=mysql_connect(localhost, root);
mysql_select_db(kingart, $link) or die("��� ���������� � �����". mysql_error());
mysql_query("SET names cp1251");
?>

