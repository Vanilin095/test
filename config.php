<?php
header("Content-Type: text/html; charset=utf-8");
/* настройки php */




/* данные для подключения к бд (если не указано имя базы - подключаться не будем) */
$db_host = 'localhost'; // хост
$db_user = ''; // имя пользователя бд
$db_pass = ''; // пароль к бд
$db_name = ''; // имя базы данных

$db_prefix = '';
$db_collate = 'utf8'; // кодировка соединения с бд (не изменять, независимо от кодировки сайта и базы - служебный параметр)

$mi=new mysqli($db_host, $db_user, $db_pass, $db_name);
$mi->set_charset("utf8"); # кодировка
if($mi->connect_errno):
    die($mi->connect_error);
endif;



?>