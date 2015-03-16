<?php

    if(isset($_POST['title'])
        && isset($_POST['image'])
        && isset($_POST['id_brand'])
        && isset($_POST['id_shipment'])
        && isset($_POST['id_collection'])
        && isset($_POST['discount'])
        ) {

    $pathImg = 'images/upload/';

    $title = $_POST['title'];
    $image = $pathImg.$_POST['image'];
    $id_brand = $_POST['id_brand'];
    $id_collection = $_POST['id_collection'];
    $id_shipment = $_POST['id_shipment'];
    $news = $_POST['news'];
    $discount = $_POST['discount'];
    $wood = $_POST['wood'];
    $describe = $_POST['describe'];
    
        require_once("../include/connect_to_catalog_bd.php");

        $testQuery = "select * from shipment where `id_shipment` = '".$id_shipment."'";
        $testRow = mysqli_query($connect, $testQuery);
        
        if(!mysqli_fetch_assoc($testRow)) {
            $query = "insert into shipment (`title`, `image`, `id_brand`, `id_collection`, `id_shipment`, `wood`, `describe`, `id`, `news`, `discount`) values ('".$title."', '".$image."', '".$id_brand."', '".$id_collection."', '".$id_shipment."', '".$wood."', '".$describe."', null, '".$news."', '".$discount."')";
            $result = mysqli_query($connect, $query);

            $queryNewRow = mysqli_query($connect, "select * from shipment where id_shipment = '".$id_shipment."'");
            $selectNewRow = mysqli_fetch_assoc($queryNewRow);
            if($selectNewRow) {
                $data = array(
                    "title" => $selectNewRow['title'],
                    "image" => $selectNewRow['image'],
                    "id_brand" => $selectNewRow['id_brand'],
                    "id_collection" => $selectNewRow['id_collection'],
                    "id_shipment" => $selectNewRow['id_shipment'],
                    "wood" => $selectNewRow['wood'],
                    "describe" => $selectNewRow['describe'],
                    "id" => $selectNewRow['id'],
                    "news" => $selectNewRow['news'],
                    "discount" => $selectNewRow['discount']
                );
                header("Content-type: application/json");
                echo json_encode($data);
            }

        } else {
            echo "Такой Shipment уже есть в таблице";
        }
    }
?>