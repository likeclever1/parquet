<?php
    $tbl_name = 'shipment';

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        $id = null;
    }

    if(isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = null;
    }

    if(isset($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $title = null;
    }

    if(isset($_POST['url'])) {
        $url = $_POST['url'];
    } else {
        $url = null;
    }

    if(isset($_POST['image'])) {
        $image = $_POST['image'];
    } else {
        $image = null;
    }

    if(isset($_POST['id_collection'])) {
        $idCollection = $_POST['id_collection'];
    } else {
        $idCollection = null;
    }

    if(isset($_POST['text'])) {
        $text = $_POST['text'];
    } else {
        $text = null;
    }

    if(isset($_POST['news'])) {
        $news = $_POST['news'];
    } else {
        $news = null;
    }

    if(isset($_POST['discount'])) {
        $discount = $_POST['discount'];
    } else {
        $discount = null;
    }

    if(!isset($type)) die("Warning error shipmentData.php bad value type");

    require_once("../../functions/connect_bd.php");

    switch ($type) {
        case 'remove':
            if(isset($id)) {

                $queryDelete = "delete from ".$tbl_name." where id='".$id."'";
                $resultDelete = mysqli_query($connect, $queryDelete);

                if($resultDelete) {
                    $responseDeleteData = array(
                        "type" => $type,
                        "id" => $id,
                        "title" => $title
                    );
                    header("Content-type: application/json");
                    echo json_encode($responseDeleteData);
                }
            }
            break;

        case 'update':

            $queryUpdate = "update `shipment` set `title`='".$title."', `id_collection`='".$idCollection."', `url`='".$url."', `image`='".$image."', `text`='".$text."', `news`='".$news."', `discount`='".$discount."' where id = '".$id."'";
            $resultUpdate = mysqli_query($connect, $queryUpdate) or die("can't update").mysqli_error();

            $responseUpdateData = array(
                "type" => $type,
                "id" => $id,
                "title" => $title,
                "url" => $url,
                "image" => $image,
                "id_collection" => $idCollection,
                "news" => $news,
                "discount" => $discount,
                "text" => $text
            );
            header("Content-type: application/json");
            echo json_encode($responseUpdateData);
            break;

        case 'add':

            $queryAddTest = "select * from `shipment` where url = '".$url."'";
            $resultAddTest = mysqli_fetch_assoc(mysqli_query($connect, $queryAddTest));

            if(isset($resultAddTest['url'])) {
                header("Content-type: application/json");
                echo json_encode(array("type" => $type, "data" => false));
            } else {

                $queryAdd = "insert into `".$tbl_name."` (`title`, `url`, `image`, `id_collection`, `text`, `news`, `discount`, `id`) values ('".$title."', '".$url."', '".$image."', '".$idCollection."', '".$text."', '".$news."', '".$discount."' , null)";
                $resultAdd = mysqli_query($connect, $queryAdd);

                $id = mysqli_fetch_assoc(mysqli_query($connect, "select id from `shipment` where url='".$url."'"))['id'];

                $responseAddData = array(
                    "type" => $type,
                    "id" => $id,
                    "title" => $title,
                    "url" => $url,
                    "image" => $image,
                    "id_collection" => $idCollection,
                    "text" => $text,
                    "news" => $news,
                    "discount" => $discount,
                    "data" => true
                );
                header("Content-type: application/json");
                echo json_encode($responseAddData);
            }
            break;

        default:
            break;
    }
?>