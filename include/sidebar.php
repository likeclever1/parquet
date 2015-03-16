<?php
    
    $resourseDiscountItem = mysqli_query($connect, "select * from shipment where `discount`= 1");
    $resourseNewsItem = mysqli_query($connect, "select * from shipment where `news`= 1");

?>

<aside class="sidebar">
    <div class="info-block">
        <div class="b-title ta-center">Акции</div>
        
        <ul class="info-block__list">
            <?php
                while( $row = mysqli_fetch_assoc($resourseDiscountItem) ) {
                    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from brand where `id_collection`='".$row['id_collection']."'"));
                    $typeData = mysqli_fetch_assoc(mysqli_query($connect, "select * from brand where `id_type`='".$brandData['id_type']."'"));

                    echo "<li class='info-block__item'>";
                    echo "<a href='shipment.php?shipment=".$row['id_shipment']."' class='b-shipment'>";

                    echo "<div class='b-shipment__img'>";
                    echo "<img src='/images/content/01.png' alt='Паркетная доска '".$brandData["brand"]."''>";
                    echo "</div>";

                    echo "<div class='b-shipment__type'><b>Паркетная доска ".$brandData["brand"]."</b></div>";
                    echo "<div class='b-shipment__country'>(".$brandData["country"].")</div>";
                    echo "<div class='b-shipment__title'>".$row["title"]."</div>";

                    echo "</a>";
                    echo "</li>";
                }
            ?>
        </ul>
    </div><!-- end .info-block -->

    <div class="info-block">
        <div class="b-title ta-center">Новинки</div>
        
        <ul class="info-block__list">
            <?php
                while( $row = mysqli_fetch_assoc($resourseNewsItem) ) {
                    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from brand where `id_collection`='".$row['id_collection']."'"));
                    $typeData = mysqli_fetch_assoc(mysqli_query($connect, "select * from brand where `id_type`='".$brandData['id_type']."'"));

                    echo "<li class='info-block__item'>";
                    echo "<a href='shipment.php?shipment=".$row['id_shipment']."' class='b-shipment'>";

                    echo "<div class='b-shipment__img'>";
                    echo "<img src='/images/content/01.png' alt='Паркетная доска '".$brandData["brand"]."''>";
                    echo "</div>";

                    echo "<div class='b-shipment__type'><b>Паркетная доска ".$brandData["brand"]."</b></div>";
                    echo "<div class='b-shipment__country'>(".$brandData["country"].")</div>";
                    echo "<div class='b-shipment__title'>".$row["title"]."</div>";

                    echo "</a>";
                    echo "</li>";
                }
            ?>
        </ul>
    </div><!-- end .info-block -->
</aside><!-- end .sidebar -->