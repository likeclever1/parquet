<!--============================================================= HERO =======================================================-->

<div class="hero">
    <ul class="hero__list">
        <?php
            require_once("functions/fetch_data/category.php");

            while($row = mysqli_fetch_assoc($categoryData)) {
                
                $title = $row['title'];
                $url = $row['url'];
                $image = $row['image'];

                echo "<li class=\"hero__item\">";
                echo "<a href='brand.php?type=".$url."' class='hero__link'>";
                echo "<img src='upload/images/category/".$image."' alt='".$title."'>";
                echo "<span>".$title."</span>";
                echo "</a>";
                echo "</li>";
            }
        ?>
    </ul>
</div><!-- end .hero -->