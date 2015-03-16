<?php
    require_once("functions/connect_to_bd.php");
?>
<div class="l-menu">
    <div class="b-title">Каталог товаров</div>
        
        <ul class="l-menu__list">
            <?php
                $query = "select * from catalog ORDER by id";

                $listItems = mysqli_query($connect, $query);

                if(!$listItems) {
                    die("Неудалось выполнитьзапрос".mysql_error());
                }

                while($row = mysqli_fetch_assoc($listItems)) {
                    echo "<li class=\"l-menu__item\">";
                    echo "<a href='brand.php?type=". $row['id_type'] ."' class=\"l-menu__link\">" . $row['type'] . "</a>";
                    if(isset($_GET['type'])) {
                        if($_GET['type'] == $row['id_type']) {

                            $query_id_brand = "select DISTINCT id_brand, brand from brand where id_type = '".$row['id_type']."'";
                            $listIdBrandItems = mysqli_query($connect, $query_id_brand);

                            if(!$listIdBrandItems) { die("Неудалось выполнитьзапрос1".mysql_error()); }

                            echo '<ul class="l-menu__sublist">';
                            echo '<li class="l-menu__subitem">';

                            while($brandRow = mysqli_fetch_assoc($listIdBrandItems)) {

                                if(isset($_GET['brand'])) {
                                    if($brandRow['id_brand'] == $_GET['brand']) {
                                        echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brandRow['id_brand']." class='l-menu__sublink active'>".$brandRow['brand']."</a>";
                                    } else {
                                        echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brandRow['id_brand']." class='l-menu__sublink'>".$brandRow['brand']."</a>";
                                    }
                                } else {
                                    echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brandRow['id_brand']." class='l-menu__sublink'>".$brandRow['brand']."</a>";
                                }
                            }
                            echo "</li>";
                            echo "</ul>";
                        }
                    }
                    if(isset($_GET['collection'])) {
                        // в цикле вывода item брендов берём данные по выводимому бренду чтоб узнать его коллекции
                        $dataBrandType = mysqli_query($connect, "select DISTINCT * from brand where id_type = '".$row['id_type']."'");
                        

                        // берём данные из таблицы Brand по коллекции, которая поступила из GET параметра
                        $dataBrandCollection = mysqli_query($connect, "select DISTINCT * from `brand` where `id_collection`='".$_GET['collection']."'");
                        $dataBrandCollectionAssoc = mysqli_fetch_assoc($dataBrandCollection);

                        // берём данные из таблицы Catalog, чтобы определить к какой группе товаров пренадлежит наша колекция из GET
                        $collectionTypeMysql = mysqli_query($connect, "select DISTINCT * from `catalog` where `id_type` = '".$dataBrandCollectionAssoc['id_type']."'");
                        $collectionType = mysqli_fetch_assoc($collectionTypeMysql);

                        if(!$dataBrandType || !$dataBrandCollection || !$collectionTypeMysql) { die("Неудалось выполнитьзапрос1".mysql_error()); }

                            $arr = [];

                            // выводим торговые марки по типу товара
                            while($brandRow = mysqli_fetch_assoc($dataBrandType)) {
                                $key = array_search($brandRow['id_brand'], $arr);
                                array_push($arr, $brandRow['id_brand']);
                                    
                                if($collectionType['id_type'] == $brandRow['id_type'] && !$key) {
                                    if(count($arr) === 1) {
                                        echo '<ul class="l-menu__sublist">';
                                    }
                                    if($dataBrandCollectionAssoc['id_brand'] == $brandRow['id_brand']) {
                                        echo '<li class="l-menu__subitem">';
                                        echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brandRow['id_brand']." class='l-menu__sublink active'>".$brandRow['brand']."</a>";
                                        echo "</li>";
                                    } else {
                                        echo '<li class="l-menu__subitem">';
                                        echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brandRow['id_brand']." class='l-menu__sublink'>".$brandRow['brand']."</a>";
                                        echo "</li>";
                                    }
                                }
                                
                            }
                            echo "</ul>";

                    }
                    if(isset($_GET['shipment'])) {
                        
                        // берём данные об товаре
                        $dataShipment = mysqli_fetch_assoc(mysqli_query($connect, "select * from `shipment` where `id_shipment` = '".$_GET['shipment']."'"));
                        // берём данные об бренде
                        $dataBrand = mysqli_fetch_assoc(mysqli_query($connect, "select DISTINCT * from `brand` where `id_brand` = '".$dataShipment['id_brand']."'"));

                        // берём данные о типе товара
                        $dataBrandType = mysqli_fetch_assoc(mysqli_query($connect, "select * from `catalog` where `id_type` = '".$dataBrand['id_type']."'"));
                        
                        if($row['id_type'] == $dataBrandType['id_type']) {
                            echo '<ul class="l-menu__sublist">';
                            // выводим торговые марки по типу товара
                            $brandList = mysqli_query($connect, "select DISTINCT `id_brand`, `brand` from `brand` where `id_type` = '".$dataBrandType['id_type']."'");

                            while($brand = mysqli_fetch_assoc($brandList)) {
                                echo '<li class="l-menu__subitem">';
                                if($brand['id_brand'] == $dataShipment['id_brand']) {
                                    echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brand['id_brand']." class='l-menu__sublink active'>".$brand['brand']."</a>";
                                } else {
                                    echo "<a href=collection.php?type=". $row['id_type'] ."&brand=".$brand['id_brand']." class='l-menu__sublink'>".$brand['brand']."</a>";
                                }
                                echo "</li>";
                            }
                            echo "</ul>";
                            
                        }
                    }
                    echo "</li>";
                }
            ?>
        </ul><!-- end .l-menu__list -->
</div><!-- end .l-menu -->