<!-- ================================== start category.tpl ====================================== -->
<?php
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where `url`='".$categoryGET."'"));
    $queryBrand = mysqli_query($connect,"select * from `brand` where `id_category` = '".$categoryData['id']."'") or die ("Bad query in brand.tpl");

    $brandData = [];

    while($row = mysqli_fetch_assoc($queryBrand)) {
        $row['total'] = mysqli_fetch_assoc(mysqli_query($connect, "select count(`id_brand`) as total from `collection` where `id_brand`='".$row['id']."'"))['total'];
        array_push($brandData, $row);
    }

?>

<?php if(!$categoryData): ?>
    <div class="warning ta-left">
        <h2>Данный товар не найден</h2>
    </div>
<?php endif; ?>

<ul class="brand-list">
    <?php for( $i = 0, $brandDataLength = count($brandData); $i < $brandDataLength; $i++): ?>

        <li class='brand-list__item'>
            <a href='<?='/catalog/'.$categoryGET."/".$brandData[$i]['url'];?>'>
                <span class='brand-list__img'>
                    <img src='/upload/images/brand/<?=$brandData[$i]['image'];?>' alt='<?=$brandData[$i]['title'];?>'>
                </span>
                <span class='brand-list__title'><?=$row['title']."(".$brandData[$i]['country'].")";?></span>
            </a>
            <span class='counter'> <?=$brandData[$i]['total'];?> </span>
        </li>

    <?php endfor; ?>
</ul><!-- end .brand-list -->

<article class="article">
    <?= $categoryData['text'] ;?>
</article>

<!-- ================================== end category.tpl ====================================== -->