<!--============================================================= COLLECTION-LIST =======================================================-->
<?php
    require_once("functions/connect_to_bd.php");
    $brand = $_GET['brand'];
    $id_type = $_GET['type'];
    $query = "select * from `brand` where `id_brand`='$brand'";
    $result = mysqli_query($connect, $query);

    if(!$result) { die("Не возможно выполнить запрос collection-list"); }
    $collection = mysqli_fetch_assoc(mysqli_query($connect, "select DISTINCT `collection`, `country`, `brand`, `describe` from `brand` where `id_brand`='$brand'") );

    $type = mysqli_fetch_assoc(mysqli_query($connect, "select `type` from `catalog` where `id_type`='".$id_type."'") );
?>

<div class="collection__content">
    <?php
        echo "<img src='/images/content/brand/".$brand.".jpg' class='fl-right' alt='".$collection['brand']."'>";
        echo "<h1>".$type['type']." ".$collection['brand'].", ".$collection['country']."</h1>";
        echo "<p>".$collection['describe']."</p>";
    ?>

    
</div>

<ul class="collection-list">
<?php
    while($row = mysqli_fetch_assoc($result)) {
        echo "<li class='collection-list__item'>";
        echo "<a href='collection-shipments.php?collection=".$row['id_collection']."' class='collection-list__link'>";
        echo "<span class='collection-list__img'>";
        echo "<img src='/images/content/collection/quick_step/castello.jpg' alt='".$row['collection']."'>"; // картинки
        echo "</span>";
        echo "<span class='collection-list__title'>".$row['brand']." ".$row['collection']."</span>";
        echo "<span class='hint'><ul><li>толщина доски 14 мм, 2-стор. </li><li>V-образная фаска,</li><li>толщина верхнего слоя 4 мм, </li><li>широкие доски, </li><li>1-полосная </li></ul></span>";
        echo "</a>";
        echo "</li>";
    }
?>
</ul>
<?php
    $queryNext = "select * from `brandList` where `id_brand`='".$brand."'";
    $resultNext = mysqli_query($connect, $queryNext);

    if(!$resultNext) { die("Не возможно выполнить запрос collection-list"); }
    $brandItem = mysqli_fetch_assoc($resultNext);
    $id = $brandItem['id'];
    
    if( isset($id) ) {
        $nextId = $id + 1;
        $prevId = $id - 1;
        $prevBrand = mysqli_fetch_assoc(mysqli_query($connect, "select id_brand from `brandList` where `id`='".$prevId."'"));
        $nextBrand = mysqli_fetch_assoc(mysqli_query($connect, "select id_brand from `brandList` where `id`='".$nextId."'"));
        echo "<div class='collection__nav'>";
            if($nextBrand['id_brand']) {
                var_dump(isset($id));
                echo "<div class='fl-right'>";
                echo "<a href='collection.php?type=flooring&brand=".$nextBrand['id_brand']."' class='btn-arrow'>Следующий бренд</a>";
                echo "</div>";
            }
            if($prevBrand['id_brand']) {
                echo "<div class='fl-left'>";
                echo "<a href='collection.php?type=flooring&brand=".$prevBrand['id_brand']."' class='btn-arrow btn-arrow_left'>Предыдущий бренд</a>";
                echo "</div>";
            }
        echo "</div>";
    }
?>

