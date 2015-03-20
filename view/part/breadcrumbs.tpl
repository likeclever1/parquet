<ul class="breadcrumbs">
    <li><a href="/">Главная</a></li>
    <?php
        include("controller/get_param.php");
        if($categoryGET) {
            $categoryTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `category` where `url`='".$categoryGET."'"))['title'];
        }

        if($brandGET) {
            $brandTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `brand` where `url`='".$brandGET."'"))['title'];
        }

        if($collectionGET) {
            $collectionTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `collection` where `url`='".$collectionGET."'"))['title'];
        }

        if($shipmentGET) {
            $shipmentTitle = mysqli_fetch_assoc(mysqli_query($connect, "select `title` from `shipment` where `url`='".$shipmentGET."'"))['title'];
        }

        if($categoryGET && $brandGET && $collectionGET && $shipmentGET) {
    ?>
        <li><a href='/catalog/<?=$categoryGET;?>'><?=$categoryTitle;?></a></li>
        <li><a href='/catalog/<?=$categoryGET;?>/<?=$brandGET;?>'><?=$brandTitle;?></a></li>
        <li><a href='/catalog/<?=$categoryGET;?>/<?=$brandGET;?>/<?=$collectionGET;?>'><?=$collectionTitle;?></a></li>
        <li><span><?=$shipmentTitle;?></span></li>
    <?php } ?>
        
    
    <?php
        if($categoryGET && $brandGET && $collectionGET && !$shipmentGET) {
    ?>
        <li><a href='/catalog/<?=$categoryGET;?>'><?=$categoryTitle;?></a></li>
        <li><a href='/catalog/<?=$categoryGET;?>/<?=$brandGET;?>'><?=$brandTitle;?></a></li>
        <li><span><?=$collectionTitle;?></span></li>
    <?php } ?>

    <?php
        if($categoryGET && $brandGET && !$collectionGET && !$shipmentGET) {
    ?>
        <li><a href='/catalog/<?=$categoryGET;?>'><?=$categoryTitle;?></a></li>
        <li><span><?=$brandTitle;?></span></li>
    <?php } ?>

    <?php
        if($categoryGET && !$brandGET && !$collectionGET && !$shipmentGET) {
    ?>
        <li><span><?=$categoryTitle;?></span></li>
    <?php } ?>
</ul>