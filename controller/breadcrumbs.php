<?php
    include("get_param.php");

    if($categoryGET) {
        $categoryTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `category` where `url`='".$categoryGET."'"))['title'];
    }

    if($brandGET) {
        $brandTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `brand` where `url`='".$brandGET."'"))['title'];
    }

    if($collectionGET) {
        $collectionTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `collection` where `url`='".$collectionGET."'"))['title'];
    }

    if($shipmentGET) {
        $shipmentTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `shipment` where `url`='".$shipmentGET."'"))['title'];
    }