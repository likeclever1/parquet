<!--============================================================= HERO =======================================================-->

<div class="hero">
    <ul class="hero__list">
        <?php
            require("functions/fetch_data/category.php");

            while($row = mysqli_fetch_assoc($categoryData)) {
                
                $title = $row['title'];
                $link = '/catalog/'.$row['url'];
                $image = $row['image'];
        ?>
                <li class="hero__item">
                    <a href='<?=$link;?>' class='hero__link'>
                        <img src='upload/images/category/<?=$image;?>' alt='".$title."'>
                        <span><?=$title;?></span>
                    </a>
                
                <?php
                    if(isset($outputSubmenu)) {
                        $queryBrand = "select distinct url, title from brand where `id_category` = '". $row['id'] ."'";
                        $brandData = mysqli_query($connect, $queryBrand) or die("Не удалось выполнить запрос, чтобы получить список брендов!");
                ?>
                    <ul>
                    <?php
                        while($itemBrand = mysqli_fetch_assoc($brandData)) {
                            $linkPathBrand = "catalog/". $row['url'] ."/".$itemBrand['url'];
                    ?>
                        <li><a href='<?=$linkPathBrand;?>'><?=$itemBrand['title'];?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </li>
    <?php }} ?>
    </ul>
</div><!-- end .hero -->