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

    function destroySession() {
        $_SESSION = array();

        if(session_id() != "" || isset($COOKIE[session_name])) {
            setcookie(session_name(), '', time() - 2592000, '/');
        }

        session_destroy();
    }

    function sanitizeString($var) {
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripcslashes($var);
        return mysql_real_escape_string($var);
    }

?>