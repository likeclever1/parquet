<?php
    
    $id = $_POST['id'];
    $id_type = $_POST['id_type'];
    $id_brand = $_POST['id_brand'];
    $brand = $_POST['brand'];
    $id_collection = $_POST['id_collection'];
    $collection = $_POST['collection'];
    $country = $_POST['country'];
    $describe = $_POST['describe'];

    if(isset($id)) {
        require_once("../include/connect_to_catalog_bd.php");

        $selectRow = mysqli_query($connect, "select * from brand where id_collection = '".$id_collection."'");
        $rowData = mysqli_fetch_assoc($selectRow);

        if(true) {

            $query = "update brand set `brand`='".$brand."',`id_brand`='".$id_brand."', `id_type`='".$id_type."', `id_collection`='".$id_collection."', `collection`='".$collection."', `country`='".$country."', `describe`='".$describe."' where id = '".$id."'";

            $result = mysqli_query($connect, $query);

            if($result) {
                echo true;
            }
        } else {
            echo false;
        }
    }
?>