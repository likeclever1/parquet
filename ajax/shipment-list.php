<?php
    require_once("../functions/connect_bd.php");
    $limit = 4;
    if(isset($_POST['limit'])) {
        $limit = $_POST['limit'];
    }

    if(isset($_POST['collection'])) {
        $collectionGET = $_POST['collection'];
    }

    $queryCollection = "select * from `brand` where `url`='".$collectionGET."'";
    $collection = mysqli_fetch_assoc(mysqli_query($connect, $queryCollection));

    $shipments = mysqli_query($connect, "select * from `shipment` where `id_collection`='".$collectionGET."' ORDER BY `title` limit ".$limit." ");

    while($shipment = mysqli_fetch_assoc($shipments)) {
        echo "<li class='shipment-list__item'>";
        echo "<div class='shipment-list__content'>";
        echo "<a href='shipment.php?shipment=".$shipment['id_shipment']."' class='shipment-list__img'>";
        echo "<img src='images/content/shipments/".$collection['id_brand']."/".$collection['id_collection']."/mini/".$shipment['id_shipment']."_mini.png' alt='".$shipment['title']."' title='".$shipment['title']."'>";
        echo "</a>";
        echo "<div class='shipment-list__info'>";
        echo "<h3><a href='shipment.php?shipment=".$shipment['id_shipment']."'>".$shipment['title']."</a></h3>";
        echo "<p>".$collection['brand']." ".$shipment['title']." коллекция ".$collection['collection']."</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='shipment-list__control'>";
        echo "<a href='shipment.php?shipment=".$shipment['id_shipment']."' class='btn'>Подробнее</a>";
        echo "</div>";
        echo "</li>";
    }
?>