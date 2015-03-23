<?php
    
    $resourseDiscountItem = mysqli_query($connect, "select * from shipment where `discount`= 1");
    $resourseNewsItem = mysqli_query($connect, "select * from shipment where `news`= 1");

    $discountLength = (int) mysqli_fetch_assoc(mysqli_query($connect, "SELECT count(*) as total from shipment where `discount`= 1"))['total'];
    $newsLength = (int) mysqli_fetch_assoc(mysqli_query($connect, "SELECT count(*) as total from shipment where `news`= 1"))['total'];
    $discountTotal = $discountLength['total'];
    $newsTotal = $newsLength['total'];

    $discountDataArray = [];
    $newsDataArray = [];
    
    while($row = mysqli_fetch_assoc($resourseDiscountItem) ) {
        $row['COLLECTION'] = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where `id`='".$row['id_collection']."'"));
        $row['BRAND'] = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where `id`='".$row['COLLECTION']['id_brand']."'"));
        $row['CATEGORY'] = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where `id`='".$row['BRAND']['id_category']."'"));
        array_push($discountDataArray, $row);
    }

    while($row = mysqli_fetch_assoc($resourseNewsItem) ) {
        $row['COLLECTION'] = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where `id`='".$row['id_collection']."'"));
        $row['BRAND'] = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where `id`='".$row['COLLECTION']['id_brand']."'"));
        $row['CATEGORY'] = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where `id`='".$row['BRAND']['id_category']."'"));
        array_push($newsDataArray, $row);
    }