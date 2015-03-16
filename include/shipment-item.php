<!--============================================================= sSHIPMENT-ITEM =======================================================-->
<?php
    $shipmentGet = $_GET['shipment'];

    // Данные из таблицы shipment(конкретный товар)
    $shipmentData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `shipment` where `id_shipment`='".$shipmentGet."'"));
    $shipmentBrend = $shipmentData['id_brand'];

    // Данные из таблицы brand(марка товара)
    $dataFromBrand = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where `id_brand`='".$shipmentBrend."'"));

    // Данные из таблицы catalog(тип товара)
    $dataFromCatalog = mysqli_fetch_assoc(mysqli_query($connect, "select * from `catalog` where `id_type`='".$dataFromBrand['id_type']."'"));
?>
<div class="shipment">
    <?php
        echo "<h1>".$dataFromCatalog['type']." ".$dataFromBrand['brand']." коллекция ".$dataFromBrand['collection']." ".$shipmentData['title']."</h1>";
    ?>
    

    <a href="#" class="shipment__img">
        <?php
            echo "<img src='/".$shipmentData['image']."' alt='' title='".$shipmentData['image']."'>";
        ?>
    </a>

    <div class="tabs">
        <ul class="tabs__nav">
            <li class="tabs__nav-item current">
                <a href="#tab-1" class="tabs__nav-link">Характеристики</a>
            </li>
            <li class="tabs__nav-item">
                <a href="#" class="tabs__nav-link">О бренде</a>
            </li>
        </ul>

        <div id="tab-1" class="tabs__panel">
            
            <table class="table-stripped">
                <tr>
                    <td>Тип:</td>
                    <td><?php echo $dataFromCatalog['type'];?></td>
                </tr>
                <tr>
                    <td>Производитель:</td>
                    <td><?php echo $dataFromBrand['brand'];?></td>
                </tr>
                <tr>
                    <td>Коллекция:</td>
                    <td><?php echo $dataFromBrand['collection'];?></td>
                </tr>
            </table>
        </div>
        <div id="tab-2" class="tabs__panel">
            <article class="article">
                <?php
                    echo $shipmentData['describe'];
                ?>
            </article>
        </div>
    </div><!-- end .tabs -->
</div><!-- end .shipment -->