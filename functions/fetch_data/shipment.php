<?php

    $queryShipment = "select * from shipment order by `id`";

    $shipmentData = mysqli_query($connect, $queryShipment);

    if(!$shipmentData) {
        die("Неудалось выполнить запрос fetch_data_from_shipment".mysql_error());
    }

?>