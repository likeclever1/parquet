<!--============================================================= COLLECTION-ITEMS =======================================================-->
<?php
    require_once("functions/connect_to_bd.php");

    $collectionGet = $_GET['collection'];
    $queryCollection = "select * from `brand` where `id_collection`='".$collectionGet."'";
    $collection = mysqli_fetch_assoc(mysqli_query($connect, $queryCollection));

    if(!$collection) {die("Не удалось выполнить запрос к БД").mysql_error();}


    // table catalog need param type
    $type = mysqli_fetch_assoc(mysqli_query($connect, "select `type` from `catalog` where `id_type`='".$collection['id_type']."'"));

    $type1 = $type['type'];
?>
<div class="collection">
    <div class="collection__content">
        <?php
            echo "<h1>".$type['type']." ".$collection['brand']." коллекция ".$collection['collection'].", ".$collection['country']."</h1>";
            echo "<img src='/images/content/brand/".$collection['id_brand'].".jpg' class='fl-right' title='".$collection['brand']."' alt='".$collection['brand']."'>";
            echo "<b>Характеристика ".$type['type']." ".$collection['brand']." коллекция ".$collection['collection'].":</b>";
        ?>
        
        <ul>
            <li>размеры: длина 1820 мм, ширина 190 мм, толщина 14 мм;</li>
            <li>2-сторонняя V-образная фаска;</li>
            <li>толщина верхнего слоя 4 мм;</li>
            <li>широкие доски;</li>
            <li>различные варианты отделки;</li>
            <li>1-полосная.</li>
        </ul>
    </div>

    <div class="paging ta-right">
        <select id="selectShipments" name="selectShipments" class="fl-right custom-select">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="10000">все</option>
        </select>

        <b>Товаров на странице:</b>
    </div>

    <ul class="shipment-list">
        <?php
            include "shipment-list.php";
        ?>
    </ul>
</div><!-- end .collection -->