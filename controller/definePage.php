<?php 
    if(!isset($home)) {
        $home = false;
    }
    if(!isset($catalog)) {
        $catalog = false;
    }

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = false;
    }
