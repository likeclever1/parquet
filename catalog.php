<?php
    require_once("functions/connect_bd.php");

    require_once("include/site-header.php");

    require_once("include/header.inc");

    require_once("include/main-menu.inc");
?>
    
    <div class="main">
        <div class="container">
            <?php
                require_once("include/l-menu.php");
            ?>

            <article class="content" role="main">
                <div class="hero">
                    <ul class="hero__list">
                    

                    <?php
                        $img_path = 'upload/images/category/';

                        require_once("functions/fetch_data/category.php");

                        while($row = mysqli_fetch_assoc($categoryData)) {
                            
                            $linkPathCategory = "catalog/". $row['url'];

                            echo "<li class=\"hero__item\">";
                            echo "<a href='".$linkPathCategory."' class='hero__link'>";
                            echo "<img src='".$img_path.$row['image']."' alt='".$row['title']."'>";
                            echo "<span>".$row['title']."</span>";
                            echo "</a>";

                            $queryBrand = "select distinct url, title from brand where `id_category` = '". $row['id'] ."'";
                            $brandData = mysqli_query($connect, $queryBrand);
                            if(!$brandData) {die("Не удалось выполнить запрос, чтобы получить список брендов!");}

                            echo "<ul>";

                            while($itemBrand = mysqli_fetch_assoc($brandData)) {

                                $linkPathBrand = "catalog/". $row['url'] ."/".$itemBrand['url'];

                                echo "<li>";
                                echo "<a href='".$linkPathBrand."'>".$itemBrand['title']."</a>";
                                echo "</li>";
                            }
                            echo "</ul>";

                            echo "</li>";
                        }
                    ?>
                    </ul><!-- end .catalog -->
                </div><!-- end .hero -->
            </article>

            <?php
                require_once("include/sidebar.php");
            ?>
        </div>
    </div><!-- end .main -->
    
    <?php
        require_once("include/footer.inc");
        require_once("include/site-footer.php");
    ?>