<?php

    $queryCollection = "select * from collection order by `id`";

    $collectionData = mysqli_query($connect, $queryCollection);

    if(!$collectionData) {
        die("Неудалось выполнить запрос fetch_data_from_collection".mysql_error());
    }

?>