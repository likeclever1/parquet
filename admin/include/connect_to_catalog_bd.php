<?php

    $host = 'localhost';
    $db = 'parquet';
    $username = 'yb';
    $password = '123';

    $connect = mysqli_connect($host, $username, $password);

    if(!$connect) {
        die("Ошибка подключения к БД".mysql_error());
    }

    mysqli_set_charset($connect, "utf8");

    mysqli_select_db($connect, $db) or die(mysql_error());

?>