<?php
    
    $resourseDiscountItem = mysqli_query($connect, "select * from shipment where `discount`= 1");
    $resourseNewsItem = mysqli_query($connect, "select * from shipment where `news`= 1");

    $discountLength = mysqli_query($connect, "SELECT count(*) as total from shipment where `discount`= 1");
    $newsLength = mysqli_query($connect, "SELECT count(*) as total from shipment where `news`= 1");
    $discountTotal = mysqli_fetch_assoc($discountLength)['total'];
    $newsTotal = mysqli_fetch_assoc($newsLength)['total'];

?>

<aside class="sidebar">
    <div class="info-block">
        <div class="b-title ta-center">Акции</div>
        
        <ul class="info-block__list">
            <?php
                while( $row = mysqli_fetch_assoc($resourseDiscountItem) ) {
                    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where `id`='".$row['id_collection']."'"));
                    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where `id`='".$collectionData['id_brand']."'"));
                    $typeData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where `id`='".$brandData['id_category']."'"));
            ?>
                    <li class='info-block__item'>
                        <a href='/catalog/<?=$typeData['url']."/".$brandData['url']."/".$collectionData['url']."/".$row['url'];?>' class='b-shipment'>
                        <div class='b-shipment__img'>
                            <img src='/upload/images/shipment/<?=$row['image'];?>' alt='<?=$row['title'];?>'>
                        </div>

                        <div class='b-shipment__type'><b><?=$typeData["title"]." ".$brandData["title"];?></b></div>
                        <div class='b-shipment__country'>(<?=$brandData["country"];?>)</div>
                        <div class='b-shipment__title'><?=$row["title"];?></div>

                        </a>
                    </li>
            <?php
                }
            ?>
        </ul>
    </div><!-- end .info-block -->

    <div class="info-block">
        <div class="b-title ta-center">Новинки</div>
        
        <ul class="info-block__list">
            <?php
                while( $row = mysqli_fetch_assoc($resourseNewsItem) ) {
                    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where `id`='".$row['id_collection']."'"));
                    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where `id`='".$collectionData['id_brand']."'"));
                    $typeData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where `id`='".$brandData['id_category']."'"));
            ?>
                    <li class='info-block__item'>
                        <a href='/catalog/<?=$typeData['url']."/".$brandData['url']."/".$collectionData['url']."/".$row['url'];?>' class='b-shipment'>
                        <div class='b-shipment__img'>
                            <img src='/upload/images/shipment/<?=$row['image'];?>' alt='<?=$row['title'];?>'>
                        </div>

                        <div class='b-shipment__type'><b><?=$typeData["title"]." ".$brandData["title"];?></b></div>
                        <div class='b-shipment__country'>(<?=$brandData["country"];?>)</div>
                        <div class='b-shipment__title'><?=$row["title"];?></div>

                        </a>
                    </li>
            <?php
                }
            ?>
        </ul>
    </div><!-- end .info-block -->
</aside><!-- end .sidebar -->