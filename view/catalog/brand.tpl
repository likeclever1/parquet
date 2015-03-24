<!-- ================================== start brand.tpl ====================================== -->
<?php
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));

    $brandTitle = $brandData['title'];
    $brandImage = $brandData['image'];
    $brandCountry = $brandData['country'];
    $brandText = $brandData['text'];
    $brandUrl = $brandData['url'];
    $brandId = $brandData['id'];
    $brandIdcategory = $brandData['id_category'];

    $categoryTitle = $categoryData['title'];
    $categoryUrl = $categoryData['url'];

    $collectionData = [];
    $collectionQuery = mysqli_query($connect, "select * from `collection` where `id_brand` = '".$brandData['id']."'");

    while($row = mysqli_fetch_assoc($collectionQuery)) {
        if(isset($row['feature'])) {
            $row['feature'] = explode(", ", $row['feature']);
        }
        $row['total'] = mysqli_fetch_assoc(mysqli_query($connect, "select count(`id_collection`) as total from `shipment` where `id_collection`='".$row['id']."'"))['total'];
        array_push($collectionData, $row);
    }
    
    $prevRecord = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where (`id` < '".$brandId."' AND `id_category` = '".$brandIdcategory."') ORDER BY id DESC LIMIT 1"));
    $nextRecord = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where (`id` > '".$brandId."' AND `id_category` = '".$brandIdcategory."') ORDER BY id ASC LIMIT 1"));
?>

<?php if(!$brandData): ?>
    <div class="warning ta-left">
        <h2>Данный товар не найден</h2>
    </div>
<?php else: ?>

<div class="collection">
    <div class="collection__content clearfix">
        <img src='/upload/images/brand/<?=$brandImage;?>' class='fl-right' alt='<?=$brandTitle;?>'>
        <h1><?=$categoryTitle;?> <?=$brandTitle;?>, <?=$brandCountry;?></h1>
    </div>

    <ul class="collection-list">
    <?php for($i = 0, $collectionLength = count($collectionData); $i < $collectionLength; $i++): ?>
        <li class='collection-list__item'>
            <a href='/catalog/<?=$categoryUrl;?>/<?=$brandUrl;?>/<?=$collectionData[$i]['url'];?>' class='collection-list__link'>
                <span class='collection-list__img'>
                    <img src='/upload/images/collection/<?=$collectionData[$i]['image'];?>' alt='<?=$collectionData[$i]['title'];?>'>
                    <?php if(count ($collectionData[$i]['feature']) > 0) : ?>
                        <ul class="hint">
                            <?php for($j = 0, $jlen = count($collectionData[$i]['feature']); $j < $jlen; $j++): ?>
                                <li><?=$collectionData[$i]['feature'][$j];?></li>
                            <?php endfor; ?>
                        </ul>
                    <?php endif; ?>
                </span>
                <span class='collection-list__title'><?=$brandTitle;?> <?=$collectionData[$i]['title'];?></span>
                <span class='counter'> <?=$collectionData[$i]['total'];?> </span>
            </a>
        </li>

    <?php endfor; ?>
    </ul>

    <div class='collection__nav'>
        <?php if(isset($prevRecord)): ?>
            <a href='/catalog/<?=$categoryUrl;?>/<?=$prevRecord['url'];?>' class='btn-arrow btn-arrow_left fl-left'>Предыдущий бренд</a>
        <?php endif ?>

        <?php if(isset($nextRecord)): ?>
            <a href='/catalog/<?=$categoryUrl;?>/<?=$nextRecord['url'];?>' class='btn-arrow btn-arrow_right fl-right'>Следующий бренд</a>
        <?php endif ?>

    </div><!-- end .collection__nav -->
</div><!-- end .collection -->

<article class="article">
    <?=$brandText;?>
</article>

<?php endif; ?>
<!-- ================================== end brand.tpl ====================================== -->