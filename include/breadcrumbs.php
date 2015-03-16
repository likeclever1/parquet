<?php
    require_once("functions/connect_to_bd.php");
?>

<ul class="breadcrumbs">
    <li><a href="home.php">Главная</a></li>
    <?php
        if(isset($_GET["type"])) {
            $queryType = "select `type` from `catalog` where `id_type`='".mysqli_escape_string($connect, $_GET['type'])."'";
            $resultType = mysqli_fetch_assoc(mysqli_query($connect, $queryType));

            if(isset($_GET["brand"])) {
                
                echo "<li><a href='brand.php?type=".$_GET['type']."'>".$resultType['type']."</a></li>";

                $queryBrand = "select `brand` from `brand` where `id_brand`='".mysqli_escape_string($connect, $_GET['brand'])."'";
                $resultBrand = mysqli_fetch_assoc(mysqli_query($connect, $queryBrand));

                echo "<li><span>".$resultBrand['brand']."</span></li>";
            } else {
                echo "<li><span>".$resultType['type']."</span></li>";
            }
        }
    ?>

    <?php
        // если получаем коллекцию
        if(isset($_GET["collection"])) {
            $queryBrand = "select * from `brand` where `id_collection`='".($_GET["collection"])."'";
            $resultBrand = mysqli_fetch_assoc(mysqli_query($connect, $queryBrand));

            $queryType = "select `type` from `catalog` where `id_type`='".$resultBrand['id_type']."'";
            $resultType = mysqli_fetch_assoc(mysqli_query($connect, $queryType));

            echo "<li><a href='brand.php?type=".$resultBrand['id_type']."'>".$resultType['type']."</a></li>";
            echo "<li><a href='collection.php?type=".$resultBrand['id_type']."&brand=".$resultBrand['id_brand']."'>".$resultBrand['brand']."</a></li>";
            echo "<li><span>".$resultBrand['collection']."</span></li>";
        }
    ?>

    <?php
        // если получаем товар
        if(isset($_GET["shipment"])) {
            $queryShipment = "select * from `shipment` where `id_shipment`='".($_GET["shipment"])."'";
            $resultShipment = mysqli_fetch_assoc(mysqli_query($connect, $queryShipment));

            $queryBrand = "select * from `brand` where `id_collection`='".($resultShipment["id_collection"])."'";
            $resultBrand = mysqli_fetch_assoc(mysqli_query($connect, $queryBrand));

            $queryType = "select `type` from `catalog` where `id_type`='".$resultBrand['id_type']."'";
            $resultType = mysqli_fetch_assoc(mysqli_query($connect, $queryType));

            echo "<li><a href='brand.php?type=".$resultBrand['id_type']."'>".$resultType['type']."</a></li>";
            echo "<li><a href='collection.php?type=".$resultBrand['id_type']."&brand=".$resultBrand['id_brand']."'>".$resultBrand['brand']."</a></li>";
            echo "<li><a href='collection-shipments.php?collection=".$resultBrand['id_collection']."'>".$resultBrand['collection']."</a></li>";
            echo "<li><span>".$resultShipment['title']."</span></li>";
        }
    ?>
</ul>