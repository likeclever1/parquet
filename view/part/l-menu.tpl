<!--============================================================= start l-menu =======================================================-->

<?php
    require_once("controller/connect_bd.php");
    require_once("controller/fetch_data/category.php");
    require_once("controller/fetch_data/brand.php");
    
    include("controller/get_param.php");

?>
<div class="l-menu">
    <div class="b-title">Каталог товаров</div>
        
        <ul class="l-menu__list">
            <?php
                while($row = mysqli_fetch_assoc($categoryData)) {
                    $linkCategory = "/catalog/". $row['url'];
            ?>

            <li class="l-menu__item">
                <a href='<?=$linkCategory;?>' class="l-menu__link"><?=$row['title'];?></a>

            <?php
                if($categoryGET) {
                    if($categoryGET == $row['url']) {
                        $queryBrand = "select * from brand where id_category = '".$row['id']."'";
                        $listIdBrandItems = mysqli_query($connect, $queryBrand);
                        if(!$listIdBrandItems) { die("Неудалось выполнитьзапрос1".mysql_error()); }
            ?>

                    <ul class="l-menu__sublist">
                    <li class="l-menu__subitem">

             <?php
                while($brandRow = mysqli_fetch_assoc($listIdBrandItems)) {
                    $linkBrand = "/catalog/". $row['url']."/".$brandRow['url'];
                    if($brandGET) {
                        if($brandRow['url'] == $brandGET) {
            ?>
                        <a href='<?=$linkBrand;?>' class='l-menu__sublink active'><?=$brandRow['title'];?></a>
            <?php
                } else {
            ?>
                        <a href='<?=$linkBrand;?>' class='l-menu__sublink'><?=$brandRow['title'];?></a>
            <?php
                    }
                } else {
            ?>
                        <a href='<?=$linkBrand;?>' class='l-menu__sublink'><?=$brandRow['title'];?></a>
            <?php
                }
            }
            ?>
                        </li>
                        </ul>
                <?php
                    }
                }
                    echo "</li>";
                }
            ?>
        </ul><!-- end .l-menu__list -->
</div><!-- end .l-menu -->

<!--============================================================= end l-menu =======================================================-->