<?php
    include ("controller/breadcrumbs.php");
?>

<ul class="breadcrumbs">
    <li><a href="/">Главная</a></li>
    <?php if($categoryGET && $brandGET && $collectionGET && $shipmentGET): ?>
        <li><a href='/catalog/<?=$categoryGET;?>'><?=$categoryTitle;?></a></li>
        <li><a href='/catalog/<?=$categoryGET;?>/<?=$brandGET;?>'><?=$brandTitle;?></a></li>
        <li><a href='/catalog/<?=$categoryGET;?>/<?=$brandGET;?>/<?=$collectionGET;?>'><?=$collectionTitle;?></a></li>
        <li><span><?=$shipmentTitle;?></span></li>
    <?php endif; ?>
        
    
    <?php if($categoryGET && $brandGET && $collectionGET && !$shipmentGET): ?>
        <li><a href='/catalog/<?=$categoryGET;?>'><?=$categoryTitle;?></a></li>
        <li><a href='/catalog/<?=$categoryGET;?>/<?=$brandGET;?>'><?=$brandTitle;?></a></li>
        <li><span><?=$collectionTitle;?></span></li>
    <?php endif; ?>

    <?php if($categoryGET && $brandGET && !$collectionGET && !$shipmentGET): ?>
        <li><a href='/catalog/<?=$categoryGET;?>'><?=$categoryTitle;?></a></li>
        <li><span><?=$brandTitle;?></span></li>
    <?php endif; ?>

    <?php if($categoryGET && !$brandGET && !$collectionGET && !$shipmentGET): ?>
        <li><span><?=$categoryTitle;?></span></li>
    <?php endif; ?>
</ul>