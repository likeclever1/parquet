<?php
    
    $dir = '../../upload/images/content/';

    $_FILES['file']['type'] = strtolower($_FILES['file']['type']);
    
    

    if ($_FILES['file']['type'] == 'image/png'
        || $_FILES['file']['type'] == 'image/jpg'
        || $_FILES['file']['type'] == 'image/gif'
        || $_FILES['file']['type'] == 'image/jpeg') {

        $filename = md5(date('YmdHis')).'.jpg';
        $file = $dir.$filename;

        move_uploaded_file($_FILES['file']['tmp_name'], $file);

        $array = array(
            'filelink' => '/upload/images/content/'.$filename
        );

        echo stripcslashes(json_encode($array));
    }