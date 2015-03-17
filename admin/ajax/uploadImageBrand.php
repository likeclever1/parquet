<?php
    if($_FILES) {
        if($_FILES['file']['size'] < 10000000) {
            $name = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], '../../upload/images/brand/'.$name);
        }
    }
?>