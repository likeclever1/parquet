<?php
    
    $db_host = 'localhost';
    $db_name = 'parquet';
    $db_user = 'root';
    $db_password = 'weerweer';

    $connect = mysqli_connect($db_host, $db_user, $db_password);

    if(!$connect) {
        die("Ошибка подключения к БД".mysql_error());
    }

    mysqli_set_charset($connect, "utf8");

    mysqli_select_db($connect, $db_name) or die(mysql_error());
?>
