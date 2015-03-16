<?php
    $id = $_POST['id'];

    if(isset($id)) {
        require_once("../include/connect_to_catalog_bd.php");

        $selectQuery = "select * from shipment where id = '".$id."'";
        $selectRow = mysqli_fetch_assoc(mysqli_query($connect, $selectQuery));

        $query = "delete from shipment where id='".$id."'";
        $result = mysqli_query($connect, $query);
        
        if($result) {
            $data = array(
                "id" => $selectRow["id"],
                "title" => $selectRow["title"]
            );
            header("Content-type: application/json");
            echo json_encode($data);
        }
    }
?>