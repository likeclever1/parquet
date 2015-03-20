<!-- ================================== start brand.tpl ====================================== -->
<?php
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));
    $collectionQuery = mysqli_query($connect, "select * from `collection` where `id_brand` = '".$brandData['id']."'");

    $brandTitle = $brandData['title'];
    $brandImage = $brandData['image'];
    $brandCountry = $brandData['country'];
    $brandText = $brandData['text'];
    $brandUrl = $brandData['url'];
    $brandId = $brandData['id'];
    $brandIdcategory = $brandData['id_category'];

    $categoryTitle = $categoryData['title'];
    $categoryUrl = $categoryData['url'];
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
    <?php while($row = mysqli_fetch_assoc($collectionQuery)): ?>

        <li class='collection-list__item'>
            <a href='/catalog/<?=$categoryUrl;?>/<?=$brandUrl;?>/<?=$row['url'];?>' class='collection-list__link'>
                <span class='collection-list__img'>
                    <img src='/upload/images/collection/<?=$row['image'];?>' alt='<?=$row['title'];?>'>
                </span>
                <span class='collection-list__title'><?=$brandTitle;?> <?=$row['title'];?></span>
                <span class='hint'><?=$row['feature'];?></span>
            </a>
        </li>

    <?php endwhile; ?>
    </ul>

    <div class='collection__nav'>
        <?php
            $prevRecord = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where (`id` < '".$brandId."' AND `id_category` = '".$brandIdcategory."') ORDER BY id DESC LIMIT 1"));
            $nextRecord = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where (`id` > '".$brandId."' AND `id_category` = '".$brandIdcategory."') ORDER BY id ASC LIMIT 1"));
        ?>
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