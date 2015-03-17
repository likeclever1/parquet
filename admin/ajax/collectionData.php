<?php
    $tbl_name = 'collection';

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

    if(isset($_POST['id_brand'])) {
        $idBrand = $_POST['id_brand'];
    } else {
        $idBrand = null;
    }

    if(isset($_POST['feature'])) {
        $feature = $_POST['feature'];
    } else {
        $feature = null;
    }

    if(!isset($type)) die("Warning error collectionData.php bad value type");

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

            $queryUpdate = "update `collection` set `title`='".$title."', `id_brand`='".$idBrand."', `url`='".$url."', `image`='".$image."', `feature`='".$feature."' where id = '".$id."'";
            $resultUpdate = mysqli_query($connect, $queryUpdate) or die("can't update").mysqli_error();

            $responseUpdateData = array(
                "type" => $type,
                "id" => $id,
                "title" => $title,
                "id_brand" => $idBrand,
                "url" => $url,
                "image" => $image,
                "feature" => $feature
            );
            header("Content-type: application/json");
            echo json_encode($responseUpdateData);
            break;

        case 'add':

            $queryAddTest = "select * from `collection` where url = '".$url."'";
            $resultAddTest = mysqli_fetch_assoc(mysqli_query($connect, $queryAddTest));

            if(isset($resultAddTest['url'])) {
                header("Content-type: application/json");
                echo json_encode(array("type" => $type, "data" => false));
            } else {

                $queryAdd = "insert into `".$tbl_name."` (`title`, `url`, `image`, `id_brand`, `feature`, `id`) values ('".$title."', '".$url."', '".$image."', '".$idBrand."', '".$feature."', null)";
                $resultAdd = mysqli_query($connect, $queryAdd);

                $id = mysqli_fetch_assoc(mysqli_query($connect, "select id from `collection` where url='".$url."'"))['id'];

                $responseAddData = array(
                    "type" => $type,
                    "id" => $id,
                    "title" => $title,
                    "url" => $url,
                    "image" => $image,
                    "id_brand" => $idBrand,
                    "feature" => $feature,
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