<?php
    $tbl_name = 'category';

    if(isset($_POST['type'])) {
        $type = $_POST['type'];
    } else {
        $type = null;
    }

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        $id = null;
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

    if(isset($_POST['text'])) {
        $text = $_POST['text'];
    } else {
        $text = null;
    }

    if(!isset($type)) die("Warning error categoryData.php bad value type");

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

            $queryUpdate = "update `".$tbl_name."` set `title`='".$title."', `url`='".$url."', `image`='".$image."', `text`='".$text."' where id = '".$id."'";
            $resultUpdate = mysqli_query($connect, $queryUpdate);

            $responseUpdateData = array(
                "type" => $type,
                "id" => $id,
                "title" => $title,
                "url" => $url,
                "image" => $image,
                "text" => $text
            );
            header("Content-type: application/json");
            echo json_encode($responseUpdateData);
            break;

        case 'add':

            $queryAddTest = "select * from `category` where url = '".$url."'";
            $resultAddTest = mysqli_fetch_assoc(mysqli_query($connect, $queryAddTest));
            
            if(isset($resultAddTest['url'])) {
                header("Content-type: application/json");
                echo json_encode(array("type" => $type, "data" => false));
            } else {

                $queryAdd = "insert into `".$tbl_name."` (`url`, `title`, `image`, `text`, `id`) values ('".$url."', '".$title."', '".$image."', '".$text."', null)";
                $resultAdd = mysqli_query($connect, $queryAdd);

                $id = mysqli_fetch_assoc(mysqli_query($connect, "select id from category where url='".$url."'"))['id'];

                $responseAddData = array(
                    "type" => $type,
                    "id"=>$id,
                    "title" => $title,
                    "url" => $url,
                    "image" => $image,
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