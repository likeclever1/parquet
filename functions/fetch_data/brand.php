<?php

    $queryBrand = "select * from brand order by `id`";

    $brandData = mysqli_query($connect, $queryBrand);

    if(!$brandData) {
        die("Неудалось выполнить запрос fetch_data_from_brand".mysql_error());
    }

?>