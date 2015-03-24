<div class="collection">
    <form action="admin.php" method="POST" id="collectionForm">
        <table class="table-collection">
            <tablecaption>Таблица 3. <b>Collection</b></tablecaption>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>url</th>
                <th>image</th>
                <th>id_brand</th>
                <th>feature</th>
                <th>text</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
                while($collectionRow = mysqli_fetch_assoc($collectionData)) {
                    echo "<tr>";
                    echo "<td>".$collectionRow['id']."</td>";
                    echo "<td class='title'><textarea cols=\"10\" rows=\"1\">".$collectionRow['title']."</textarea></td>";
                    echo "<td class='url'><textarea cols=\"12\" rows=\"1\">".$collectionRow['url']."</textarea></td>";
                    echo "<td class='image'><textarea cols=\"12\" rows=\"1\">".$collectionRow['image']."</textarea></td>";
                    echo "<td class='id_brand'><textarea cols=\"12\" rows=\"1\">".$collectionRow['id_brand']."</textarea></td>";
                    echo "<td class='feature'><textarea cols=\"12\" rows=\"1\">".$collectionRow['feature']."</textarea></td>";
                    echo "<td class='text'><textarea cols=\"12\" rows=\"1\">".$collectionRow['text']."</textarea></td>";
                    echo "<td><span class=\"btn btn-update\" data-id='".$collectionRow['id']."'>Update</span></td>";
                    echo "<td><span class=\"btn btn-remove\" data-id='".$collectionRow['id']."'>Remove</span></td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <p>
            <b>Введите новую Коллекцию</b>
        </p>

        <div id="inputCollection">
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
                <input type="file" name="collectionImage" id="collectionImage">
            </div>
            <div class="id_brand row">
                <label for="">id_brand</label>
                <input type="text">
            </div>
            <div class="feature row clearfix" id="feature">
                <label for="">Характеристики</label>
                <input type="text">
                <span class="btn fl-left"> Добавить</span>
            </div>
            <div class="text row">
                <label for="">text</label>
                <textarea id="redactorShipment"></textarea>
            </div>
            <div class="row">
                <span class="btn btn-add fl-left">ADD</span>
                <p class="warning output" id="collectionOutput"></p>
            </div>
        </div>
    </form>
</div><!-- end .collection -->