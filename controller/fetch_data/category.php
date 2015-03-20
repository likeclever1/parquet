<?php

    $queryCategory = "select * from `category` order by `id`";
    $categoryData = mysqli_query($connect, $queryCategory);
    if(!$categoryData) {
        die("Неудалось выполнить запрос fetch_data_from_category".mysql_error());
    }