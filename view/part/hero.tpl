<!--============================================================= start hero.tpl =======================================================-->

<?php require("controller/fetch_data/category.php");?>

<div class="hero">
    <ul class="hero__list">
    <?php while($row = mysqli_fetch_assoc($categoryData)) :?>
            <li class="hero__item">
                <a href='<?='/catalog/'.$row['url'];?>' class='hero__link'>
                    <img src='/upload/images/category/<?=$row['image'];?>' alt='".$title."'>
                    <span><?=$row['title'];?></span>
                </a>
            
            <?php if(isset($outputSubmenu)) :?>
                <?php $brandData = mysqli_query($connect, "select distinct url, title from brand where `id_category` = '". $row['id'] ."'") or die("Warning unavailable query to bd"); ?>
                    <ul>
                    <?php while($itemBrand = mysqli_fetch_assoc($brandData)) :?>
                        <li><a href='<?="/catalog/". $row['url'] ."/".$itemBrand['url'];?>'><?=$itemBrand['title'];?></a></li>
                    <? endwhile; ?>
                    </ul>
                </li>
            <? endif; ?>
    <? endwhile; ?>


    </ul>
</div><!-- end .hero -->

<!--============================================================= end hero.tpl =======================================================-->