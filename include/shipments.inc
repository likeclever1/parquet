<!-- ================================== start shipments.inc ====================================== -->
<?php
    include("functions/get_param.php");
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));
    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where url = '".$collectionGET."'"));
?>

<div class="collection">
    <div class="collection__content clearfix">
        <h1><?=$categoryData['title'];?> <?=$brandData['title'];?> коллекция <?=$collectionData['title'];?>, <?=$brandData['country'];?></h1>
        <img src='/upload/images/brand/<?=$brandData['image'];?>' class='fl-right' title='<?=$collectionData['title'];?>' alt='<?=$collectionData['title'];?>'>
        <b>Характеристика <?=$categoryData['title'];?> <?=$brandData['title'];?> коллекция <?=$collectionData['title'];?>:</b>
        
        <?=$collectionData['feature'];?>
    </div>

    <div class="paging ta-right">
        <select id="selectShipments" name="selectShipments" class="fl-right custom-select">
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="12">12</option>
            <option value="10000">все</option>
        </select>

        <b>Товаров на странице:</b>
    </div>

    <ul class="shipment-list">
        <?php
            $limit = 4;
            $shipments = mysqli_query($connect, "select * from `shipment` where `id_collection`='".$collectionData['id']."' ORDER BY `title` limit ".$limit." ");
        ?>
        
        <?php while($row = mysqli_fetch_assoc($shipments)): ?>
            <li class='shipment-list__item'>
                <div class='shipment-list__content'>
                    <a href='/catalog/<?=$categoryData['url'];?>/<?=$brandData['url'];?>/<?=$collectionData['url'];?>/<?=$row['url'];?>' class='shipment-list__img'>
                        <img src='/upload/images/shipment/<?=$row['image'];?>' alt='<?=$row['title'];?>' title='<?=$row['title'];?>'>
                    </a>
                    <div class='shipment-list__info'>
                        <h3><a href='/catalog/'><?=$row['title'];?></a></h3>
                        <p><?=$brandData['title'];?> <?=$row['title'];?> коллекция <?=$collectionData['title'];?></p>
                    </div>
                </div>
                <div class='shipment-list__control'>
                    <a href='/catalog/<?=$categoryData['url'];?>/<?=$brandData['url'];?>/<?=$collectionData['url'];?>/<?=$row['url'];?>' class='btn'>Подробнее</a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div><!-- end .collection -->

<!-- ================================== end shipments.inc ====================================== -->