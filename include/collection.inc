<!-- ================================== start collection.inc ====================================== -->
<?php
    include("functions/get_param.php");
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));
    $collectionQuery = mysqli_query($connect, "select * from `collection` where `id_brand` = '".$brandData['id']."'");
?>
<div class="collection">
    <div class="collection__content">
        <img src='/upload/images/brand/<?=$brandData['image'];?>' class='fl-right' alt='<?=$brandData['title'];?>'>
        <h1><?=$categoryData['title'];?> <?=$brandData['title'];?>, <?=$brandData['country'];?></h1>
        <p><?=$brandData['text'];?></p>
    </div>

    <ul class="collection-list">
    <?php while($row = mysqli_fetch_assoc($collectionQuery)): ?>

        <li class='collection-list__item'>
            <a href='/catalog/<?=$categoryData['url'];?>/<?=$brandData['url'];?>/<?=$row['url'];?>' class='collection-list__link'>
                <span class='collection-list__img'>
                    <img src='/upload/images/collection/<?=$row['image'];?>' alt='<?=$row['title'];?>'>
                </span>
                <span class='collection-list__title'><?=$brandData['title'];?> <?=$row['title'];?></span>
                <span class='hint'><?=$row['feature'];?></span>
            </a>
        </li>

    <?php endwhile; ?>
    </ul>

    <div class='collection__nav'>
        <?php
            $prevRecord = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where (`id` < '".$brandData['id']."' AND `id_category` = '".$brandData['id_category']."') ORDER BY id DESC LIMIT 1"));
            $nextRecord = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where (`id` > '".$brandData['id']."' AND `id_category` = '".$brandData['id_category']."') ORDER BY id ASC LIMIT 1"));

            if(isset($prevRecord)) {
        ?>
            <a href='/catalog/<?=$categoryData['url'];?>/<?=$prevRecord['url'];?>' class='btn-arrow btn-arrow_left fl-left'>Предыдущий бренд</a>
        <?php } ?>

        <?php
            if(isset($nextRecord)) {
        ?>
            <a href='/catalog/<?=$categoryData['url'];?>/<?=$nextRecord['url'];?>' class='btn-arrow btn-arrow_right fl-right'>Следующий бренд</a>
        <?php } ?>

    </div><!-- end .collection__nav -->
</div><!-- end .collection -->

<!-- ================================== end collection.inc ====================================== -->