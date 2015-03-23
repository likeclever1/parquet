<!--============================================================= start hero.tpl =======================================================-->

<?php 
    require("controller/fetch_data/category.php");

    $categoryArray = [];

    while($row = mysqli_fetch_assoc($categoryData)) {
        if(isset($outputSubmenu)) {
            $brandData = mysqli_query($connect, "select distinct title, url from brand where `id_category` = '". $row['id'] ."'");
            $row['brands'] = [];
            while($item = mysqli_fetch_assoc($brandData)) {
                array_push($row['brands'], $item);
            }
        }
        array_push($categoryArray, $row);
    }
?>

<div class="hero">
    <ul class="hero__list">
        <?php for($i = 0, $len = count($categoryArray); $i < $len; $i++): ?>
        <li class="hero__item">
            <a href='<?='/catalog/'.$categoryArray[$i]['url'];?>' class='hero__link'>
                <img src='/upload/images/category/<?=$categoryArray[$i]['image'];?>' alt='".$title."'>
                <span><?=$categoryArray[$i]['title'];?></span>
            </a>
            
            <?php if(isset($categoryArray[$i]['brands'])): ?>
                <?php if(!empty($categoryArray[$i]['brands'])): ?>
                    <ul>
                    <?php for($j = 0, $jlen = count($categoryArray[$i]['brands']); $j < $jlen; $j++): ?>
                        <li>
                            <a href='<?="/catalog/". $categoryArray[$i]['url'] ."/".$categoryArray[$i]['brands'][$j]['url'];?>'><?=$categoryArray[$i]['brands'][$j]['title'];?></a>
                        </li>
                    <?php endfor; ?>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
        </li>
        <?php endfor; ?>
    </ul>
</div><!-- end .hero -->

<!--============================================================= end hero.tpl =======================================================-->