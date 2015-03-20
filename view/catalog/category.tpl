<!-- ================================== start category.tpl ====================================== -->
<?php
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where `url`='".$categoryGET."'"));
    $queryBrandList = mysqli_query($connect,"select * from `brand` where `id_category` = '".$categoryData['id']."'") or die ("Bad query in brand.tpl");

?>

<?php if(!mysqli_fetch_assoc(mysqli_query($connect,"select * from `brand` where `id_category` = '".$categoryData['id']."'"))['id']): ?>
    <div class="warning ta-left">
        <h2>Данный товар не найден</h2>
    </div>
<?php endif; ?>

<ul class="brand-list">
    <?php while($row = mysqli_fetch_assoc($queryBrandList)) : ?>

        <?php 
            $title = $row['title'];
            $image = $row['image'];
            $link = '/catalog/'.$categoryGET."/".$row['url'];
            $country = $row['country'];
            $countData = mysqli_fetch_assoc(mysqli_query($connect, "select count(`id_brand`) as total from `collection` where `id_brand`='".$row['id']."'"))['total'];
        ?>

        <li class='brand-list__item'>
            <a href='<?=$link;?>'>
                <span class='brand-list__img'>
                    <img src='/upload/images/brand/<?=$image;?>' alt='<?=$title;?>'>
                </span>
                <span class='brand-list__title'><?=$row['title']."(".$row['country'].")";?></span>
            </a>
            <span class='counter'> <?=$countData;?> </span>
        </li>
    <?php endwhile ?>
</ul><!-- end .brand-list -->

<article class="article">
    <?= $categoryData['text'] ;?>
</article>

<!-- ================================== end category.tpl ====================================== -->