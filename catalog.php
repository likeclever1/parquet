<?php
    require_once("functions/connect_to_bd.php");

    require_once("include/site-header.php");

    require_once("include/header.php");

    require_once("include/main-menu.php");
?>
    
    <div class="main">
        <div class="container">
            <?php
                require_once("include/l-menu.php");
            ?>

            <article class="content" role="main">
                <ul class="catalog">
                

                <?php
                    $img_path = 'images/content/catalog/';

                    $query = "select * from catalog order by id";

                    $items = mysqli_query($connect, $query);

                    if(!$items) {
                        die("Неудалось выполнить запрос".mysql_error());
                    }

                    while($row = mysqli_fetch_assoc($items)) {
                        echo "<li class=\"hero__item\">";
                        echo "<a href='brand.php?type=". $row['id_type'] ."' class='hero__link'>";
                        echo "<img src='".$img_path.$row['id_type'].".png' alt='".$row['type']."'>";
                        echo "<span>".$row['type']."</span>";
                        echo "</a>";

                        $queryBrand = "select distinct id_brand, brand from brand where id_type = '". $row['id_type'] ."'";
                        $listBrand = mysqli_query($connect, $queryBrand);
                        if(!$listBrand) {die("Не удалось выполнить запрос, чтобы получить список брендов!");}

                        echo "<ul>";
                        while($itemBrand = mysqli_fetch_assoc($listBrand)) {
                            echo "<li>";
                            echo "<a href='collection.php?type=". $row['id_type'] ."&brand=".$itemBrand['id_brand']."'>".$itemBrand['brand']."</a>";
                            echo "</li>";
                        }
                        echo "</ul>";

                        echo "</li>";
                    }
                ?>
                </ul><!-- end .catalog -->
            </article>

            <?php
                require_once("include/sidebar.php");
            ?>
        </div>
    </div><!-- end .main -->
    
    <?php
        require_once("include/footer.php");
        require_once("include/site-footer.php");
    ?>