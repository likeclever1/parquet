<!--============================================================= start l-menu =======================================================-->

<?php
    require_once("controller/connect_bd.php");
    require_once("controller/fetch_data/category.php");
    require_once("controller/fetch_data/brand.php");
    
    include("controller/get_param.php");


    $categoryData = [];
    $categoryQuery = mysqli_query($connect, "select * from `category` order by `id`");
    
    if(!$categoryQuery) {
        die("Неудалось выполнить запрос l-menu category".mysql_error());
    }

    while($row = mysqli_fetch_assoc($categoryQuery)) {
        $row['brands'] = [];
        $queryBrand = mysqli_query($connect, "select * from brand where id_category = '".$row['id']."'");
        while($item = mysqli_fetch_assoc($queryBrand)) {
            $item['total'] = mysqli_fetch_assoc(mysqli_query($connect, "select count(`id_brand`) as total from `collection` where `id_brand`='".$row['id']."'"))['total'];
            array_push($row['brands'], $item);
        }
        array_push($categoryData, $row);
    }
?>

<div class="l-menu">
    <div class="b-title">Каталог товаров</div>
    <ul class="l-menu__list">
        <?php for($i = 0, $len = count($categoryData); $i < $len; $i++): ?>
        <li class="l-menu__item">
            <a href='<?="/catalog/". $categoryData[$i]['url'];?>' class="l-menu__link"><?=$categoryData[$i]['title'];?></a>
            <?php if(isset($categoryGET) && $categoryGET == $categoryData[$i]['url']): ?>
                <?php
                    $brandData = (isset($categoryData[$i]['brands'])) ? $categoryData[$i]['brands'] : [];
                    $brandGET = (isset($brandGET)) ? $brandGET : false;
                ?>
                <ul class="l-menu__sublist">
                    <li class="l-menu__subitem">
                        <?php for($j = 0, $jlen = count($brandData); $j < $jlen; $j++ ): ?>
                            <?php if($brandData[$j]['url'] == $brandGET): ?>
                                <a href='<?="/catalog/". $categoryData[$i]['url']."/".$brandData[$j]['url'];?>' class='l-menu__sublink active'><?=$brandData[$j]['title'];?></a>
                            <?php else: ?>
                                <a href='<?="/catalog/". $categoryData[$i]['url']."/".$brandData[$j]['url'];?>' class='l-menu__sublink'><?=$brandData[$j]['title'];?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </li>
                </ul>
            <?php endif; ?>
        </li>
        <?php endfor; ?>
    </ul><!-- end .l-menu__list -->
</div><!-- end .l-menu -->

<!--============================================================= end l-menu =======================================================-->