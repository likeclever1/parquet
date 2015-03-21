<?php
    $tbl_name = 'brand';

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

    if(isset($_POST['id_category'])) {
        $idCategory = $_POST['id_category'];
    } else {
        $idCategory = null;
    }

    if(isset($_POST['country'])) {
        $country = $_POST['country'];
    } else {
        $country = null;
    }

    if(isset($_POST['text'])) {
        $text = $_POST['text'];
    } else {
        $text = null;
    }

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        $id = null;
    }

    if(!isset($type)) die("Warning error brandData.php bad value type");

    require_once("../../controller/connect_bd.php");

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

            $queryUpdate = "update `brand` set `title`='".$title."', `id_category`='".$idCategory."', `url`='".$url."', `image`='".$image."', `country`='".$country."', `text`='".$text."' where id = '".$id."'";
            $resultUpdate = mysqli_query($connect, $queryUpdate);

            $responseUpdateData = array(
                "type" => $type,
                "id" => $id,
                "title" => $title,
                "id_category" => $idCategory,
                "url" => $url,
                "image" => $image,
                "country" => $country,
                "text" => $text
            );
            header("Content-type: application/json");
            echo json_encode($responseUpdateData);
            break;

        case 'add':

            $queryAddTest = "select * from `brand` where url = '".$url."'";
            $resultAddTest = mysqli_fetch_assoc(mysqli_query($connect, $queryAddTest));

            if(isset($resultAddTest['url'])) {
                header("Content-type: application/json");
                echo json_encode(array("type" => $type, "data" => false));
            } else {

                $queryAdd = "insert into `".$tbl_name."` (`title`, `url`, `image`, `id_category`, `country`, `text`, `id`) values ('".$title."', '".$url."', '".$image."', '".$idCategory."', '".$country."', '".$text."', null)";
                $resultAdd = mysqli_query($connect, $queryAdd);

                $id = mysqli_fetch_assoc(mysqli_query($connect, "select id from brand where url='".$url."'"))['id'];

                $responseAddData = array(
                    "type" => $type,
                    "id"=>$id,
                    "title" => $title,
                    "url" => $url,
                    "image" => $image,
                    "id_category" => $idCategory,
                    "country" => $country,
                    "text" => $text,
                    "data" => true
                );
                header("Content-type: application/json");
                echo json_encode($responseAddData);
            }
            break;

        default:
            break;
    }