<?php
    $id_type = $_POST['id_type'];
    $id_brand = $_POST['id_brand'];
    $brand = $_POST['brand'];
    $id_collection = $_POST['id_collection'];
    $collection = $_POST['collection'];
    $country = $_POST['country'];
    $describe = $_POST['describe'];
    
    if(isset($brand)
        && isset($id_brand)
        && isset($id_type)
        && isset($id_collection)
        && isset($collection)
        && isset($country)
        && isset($describe)
        ) {

        require_once("../include/connect_to_catalog_bd.php");

        $testQuery = "select * from brand where collection = '".$collection."'";
        $testRow = mysqli_query($connect, $testQuery);
        
        if(!mysqli_fetch_assoc($testRow)) {
            $query = "insert into brand (`id_type`, `id_brand`, `brand`, `id_collection`, `collection`, `country`, `describe`, `id`) values ('".$id_type."', '".$id_brand."','".$brand."', '".$id_collection."', '".$collection."', '".$country."', '".$describe."', null)";
            $result = mysqli_query($connect, $query);

            $queryNewRow = mysqli_query($connect, "select * from brand where collection = '$collection'");
            $selectNewRow = mysqli_fetch_assoc($queryNewRow);

            if($result) {
                $data = array(
                    "id_type" => $selectNewRow['id_type'],
                    "id_brand" => $selectNewRow['id_brand'],
                    "brand" => $selectNewRow['brand'],
                    "id_collection" => $selectNewRow['id_collection'],
                    "collection" => $selectNewRow['collection'],
                    "country" => $selectNewRow['country'],
                    "describe" => $selectNewRow['describe'],
                    "id" => $selectNewRow['id']
                );
                header("Content-type: application/json");
                echo json_encode($data);
            }

        } else {
            echo "Такая Collection уже есть в таблице";
        }
    }
?>