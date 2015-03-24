<div class="shipment">
    <form action="admin.php" method="POST" id="shipmentForm">
        <table class="table-shipment">
            <tablecaption>Таблица 3. <b>Shipment</b></tablecaption>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>url</th>
                <th>image</th>
                <th>id_collection</th>
                <th>text</th>
                <th>feature</th>
                <th>news</th>
                <th>discount</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php

                require_once("../controller/fetch_data/shipment.php");

                while($shipmentRow = mysqli_fetch_assoc($shipmentData)) {

                    if(isset($shipmentRow['news'])  && $shipmentRow['news'] != 0) {
                        $checkedNews = "checked";
                    } else {
                        $checkedNews = "";
                    }

                    if(isset($shipmentRow['discount']) && $shipmentRow['discount'] != 0) {
                        $checkedDiscount = "checked";
                    } else {
                        $checkedDiscount = "";
                    }

                    echo "<tr>";
                    echo "<td>".$shipmentRow['id']."</td>";
                    echo "<td class='title'><textarea cols=\"14\" rows=\"2\">".$shipmentRow['title']."</textarea></td>";
                    echo "<td class='url'><textarea cols=\"17\" rows=\"3\">".$shipmentRow['url']."</textarea></td>";
                    echo "<td class='image'><textarea cols=\"12\" rows=\"4\">".$shipmentRow['image']."</textarea></td>";
                    echo "<td class='id_collection'><textarea cols=\"12\" rows=\"2\">".$shipmentRow['id_collection']."</textarea></td>";
                    echo "<td class='text'><textarea cols=\"12\" rows=\"2\">".$shipmentRow['text']."</textarea></td>";
                    echo "<td class='feature'><textarea readonly cols=\"12\" rows=\"2\">".$shipmentRow['feature']."</textarea></td>";
                    echo "<td class='news'><input type='checkbox' name='".$shipmentRow['url']."' ".$checkedNews." value='".$shipmentRow['url']."'></td>";
                    echo "<td class='discount'><input type='checkbox' name='".$shipmentRow['url']."' ".$checkedDiscount." value='".$shipmentRow['url']."'></td>";
                    echo "<td><span class=\"btn btn-update\" data-id='".$shipmentRow['id']."'>Update</span></td>";
                    echo "<td><span class=\"btn btn-remove\" data-id='".$shipmentRow['id']."'>Remove</span></td>";
                    echo "</tr>";
                }

            ?>
        </table>
        <br>
        <p>
            <b>Введите новый Товар</b>
        </p>

        <div id="inputShipment">
            <div class="title row">
                <label for="">title</label>
                <input type="text">
            </div>
            <div class="url row">
                <label for="">url</label>
                <input type="text">
            </div>
            <div class="image row">
                <label for="">image</label>
                <input type="file" name="shipmentImage" id="shipmentImage">
            </div>
            <div class="id_collection row">
                <label for="">id_collection</label>
                <input type="text">
            </div>
            <div class="text row">
                <label for="">text</label>
                <textarea id="redactorShipment"></textarea>
            </div>
            <div class="news row">
                <label for="">news</label>
                <input type="checkbox">
            </div>
            <div class="discount row">
                <label for="">discount</label>
                <input type="checkbox">
            </div>
            <div class="row">
                <h4><a class="fancybox" href="ajax/shipmentFeatures.php">Добавить характеристики</a></h4>
            </div>
            <div class="row">
                <span class="btn btn-add fl-left">ADD</span>
                <p class="warning output" id="shipmentOutput"></p>
            </div>
        </div>

        
    </form>
</div><!-- end .shipment -->