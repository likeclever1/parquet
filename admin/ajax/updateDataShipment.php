<?php
    $id = $_POST['id'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $id_brand = $_POST['id_brand'];
    $id_collection = $_POST['id_collection'];
    $id_shipment = $_POST['id_shipment'];
    $news = $_POST['news'];
    $discount = $_POST['discount'];
    $wood = $_POST['wood'];
    $describe = $_POST['describe'];

    if(isset($id)) {
        require_once("../include/connect_to_catalog_bd.php");
        
        $query = "update shipment set `title`='".$title."', `image`='".$image."', `id_brand`='".$id_brand."', `id_collection`='".$id_collection."', `id_shipment`='".$id_shipment."', `describe`='".$describe."', `wood`='".$wood."', `news`='".$news."', `discount`='".$discount."' where id = '".$id."'";
        $result = mysqli_query($connect, $query);

        if($result) {
            echo true;
        } else {
            echo false;
        }
        
    }
?>