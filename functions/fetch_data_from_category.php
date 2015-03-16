<?php

    $query = "select * from category order by `id`";

    $categoryData = mysqli_query($connect, $query);

    if(!$categoryData) {
        die("Неудалось выполнить запрос fetch_data_from_category".mysql_error());
    }

?>