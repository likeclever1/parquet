<?php

    if(isset($_FILES['file']['name'])) {
        if ($_FILES['file']['type'] == 'image/png'
        || $_FILES['file']['type'] == 'image/jpg'
        || $_FILES['file']['type'] == 'image/gif'
        || $_FILES['file']['type'] == 'image/jpeg') {
            if($_FILES['file']['size'] < 10000000) {
                $name = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], '../../upload/images/'.$_POST['folder'].'/'.$name);
            }
        }
    }