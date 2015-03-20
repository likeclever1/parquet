<?php
    
    if(isset($_GET['category'])) {
        $categoryGET = mysqli_real_escape_string($connect, $_GET['category']);
    } else {
        $categoryGET = false;
    }
    if(isset($_GET['brand'])) {
        $brandGET = mysqli_real_escape_string($connect, $_GET['brand']);
    } else {
        $brandGET = false;
    }
    if(isset($_GET['collection'])) {
        $collectionGET = mysqli_real_escape_string($connect, $_GET['collection']);
    } else {
        $collectionGET = false;
    }
    if(isset($_GET['shipment'])) {
        $shipmentGET = mysqli_real_escape_string($connect, $_GET['shipment']);
    } else {
        $shipmentGET = false;
    }
