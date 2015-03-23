<?php include ("controller/sidebar.php"); ?>

<aside class="sidebar">
    <div class="info-block">
        <div class="b-title ta-center">Акции</div>
        
        <ul class="info-block__list <?php if($discountLength > 4 ) echo "bxslider"; ?>">
        <?php for($i = 0, $len = count($discountDataArray); $i < $len; $i++): ?>
            <li class='info-block__item'>
                <a href='/catalog/<?=$discountDataArray[$i]['CATEGORY']['url']."/".$discountDataArray[$i]['BRAND']['url']."/".$discountDataArray[$i]['COLLECTION']['url']."/".$discountDataArray[$i]['url'];?>' class='b-shipment'>
                
                <div class='b-shipment__img'>
                    <img src='/upload/images/shipment/<?=$discountDataArray[$i]['image'];?>' alt='<?=$discountDataArray[$i]['title'];?>'>
                </div>

                <div class='b-shipment__type'><b><?=$discountDataArray[$i]['CATEGORY']["title"]." ".$discountDataArray[$i]['BRAND']["title"];?></b></div>
                <div class='b-shipment__country'>(<?=$discountDataArray[$i]['BRAND']["country"];?>)</div>
                <div class='b-shipment__title'><?=$discountDataArray[$i]["title"];?></div>

                </a>
            </li>
        <?php endfor; ?>
        </ul>
    </div><!-- end .info-block -->

    <div class="info-block">
        <div class="b-title ta-center">Новинки</div>
        
        <ul class="info-block__list <?php if($newsLength > 4 ) echo "bxslider"; ?>">
        <?php for($i = 0, $len = count($newsDataArray); $i < $len; $i++): ?>
            <li class='info-block__item'>
                <a href='/catalog/<?=$newsDataArray[$i]['CATEGORY']['url']."/".$newsDataArray[$i]['BRAND']['url']."/".$newsDataArray[$i]['COLLECTION']['url']."/".$newsDataArray[$i]['url'];?>' class='b-shipment'>
                    <div class='b-shipment__img'>
                        <img src='/upload/images/shipment/<?=$newsDataArray[$i]['image'];?>' alt='<?=$newsDataArray[$i]['title'];?>'>
                    </div>

                    <div class='b-shipment__type'><b><?=$newsDataArray[$i]['CATEGORY']["title"]." ".$newsDataArray[$i]['BRAND']["title"];?></b></div>
                    <div class='b-shipment__country'>(<?=$newsDataArray[$i]['BRAND']["country"];?>)</div>
                    <div class='b-shipment__title'><?=$newsDataArray[$i]["title"];?></div>
                </a>
            </li>
        <?php endfor; ?>
        </ul>
    </div><!-- end .info-block -->
</aside><!-- end .sidebar -->