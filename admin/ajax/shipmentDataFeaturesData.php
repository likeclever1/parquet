<?php
    require_once("../../controller/connect_bd.php");
    $tbl_name = 'shipment';
    $feature = mysqli_real_escape_string($connect, json_encode($_POST));
    $id = $_POST['id'];
    
    $query = "update `shipment` set `feature`='".$feature."' where id = '".$id."'";

    $queryUpdate = mysqli_query($connect, $query);

    echo json_encode($_POST);
?>