<!-- ================================== brand-list.tpl ====================================== -->
<ul class="brand-list">
<?php
    require_once("functions/connect_to_bd.php");
    $type = mysqli_escape_string($connect, $_GET['type']);
    $brandList = "select * from `brand` where `id_type`='$type' group by `id_brand`";
    $queryBrandList = mysqli_query($connect, $brandList);

    if(!$queryBrandList) {die("Не удалось выполнить запрос brand-list.php".mysql_error());}

    while($rowBrandList = mysqli_fetch_assoc($queryBrandList)) {
        echo "<li class='brand-list__item'>";

        echo "<a href='collection.php?type=".$type."&brand=".$rowBrandList['id_brand']."'>";
        echo "<span class='brand-list__img'>";
        echo "<img src='/images/content/brand/".$rowBrandList['id_brand'].".jpg' alt='".$rowBrandList['brand']."'>";
        echo "</span>";
        echo "<span class='brand-list__title'>";
        echo $rowBrandList['brand']."(".$rowBrandList['country'].")";
        echo "</span>";

        echo "</a>";
        echo "<span class='counter'>";
        $queryCount = "select count(`collection`) as total from `brand` where `id_brand`='".$rowBrandList['id_brand']."'";
        $count = mysqli_query($connect, $queryCount);
        $countData = mysqli_fetch_assoc($count);
        echo $countData['total'];
        echo "</span>";
        echo "</li>";
    }
?>
</ul><!-- end .brand-list -->