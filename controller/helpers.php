<?php

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