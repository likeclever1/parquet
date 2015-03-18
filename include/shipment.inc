<!-- ================================== start shipment.inc ====================================== -->
<?php
    include("functions/get_param.php");
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));
    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where url = '".$collectionGET."'"));
    $shipmentData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `shipment` where url = '".$shipmentGET."'"));
?>

<div class="shipment">
    <h1><?=$categoryData['title'];?> <?=$brandData['title'];?> коллекция <?=$collectionData['title'];?> <?=$shipmentData['title'];?></h1>

    

    <a href="#" class="shipment__img">
        <img src='/upload/images/shipment/<?=$shipmentData['image'];?>' alt='<?=$shipmentData['title'];?>' title='<?=$shipmentData['title'];?>'>
    </a>

</div><!-- end .shipment -->

<!-- ================================== end shipment.inc ====================================== -->
