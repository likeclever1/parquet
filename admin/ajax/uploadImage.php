<?php
    require_once("../../controller/connect_bd.php");

    if(isset($_POST['folder'])) {
       $folder = mysqli_real_escape_string($connect, $_POST['folder']);
    }

    if($_FILES) {
        if($_FILES['file']['size'] < 10000000) {
            $name = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../../upload/images/'.$folder.'/'.$name);
        }
    }