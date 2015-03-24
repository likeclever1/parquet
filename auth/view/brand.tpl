<div class="brand">
    <form action="admin.php" method="POST" id="brandForm">
        <table class="table-brand">
        <tablecaption>Таблица 2. <b>Brand</b></tablecaption>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>url</th>
            <th>image</th>
            <th>id_category</th>
            <th>country</th>
            <th>text</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php

            require_once("../controller/fetch_data/brand.php");

            while($brandRow = mysqli_fetch_assoc($brandData)) {
                echo "<tr>";
                echo "<td>".$brandRow['id']."</td>";
                echo "<td class='title'><textarea cols=\"10\" rows=\"1\">".$brandRow['title']."</textarea></td>";
                echo "<td class='url'><textarea cols=\"12\" rows=\"1\">".$brandRow['url']."</textarea></td>";
                echo "<td class='image'><textarea cols=\"12\" rows=\"1\">".$brandRow['image']."</textarea></td>";
                echo "<td class='id_category'><textarea cols=\"12\" rows=\"1\">".$brandRow['id_category']."</textarea></td>";
                echo "<td class='country'><textarea cols=\"12\" rows=\"1\">".$brandRow['country']."</textarea></td>";
                echo "<td class='text'><textarea cols=\"17\" rows=\"1\">".$brandRow['text']."</textarea></td>";
                echo "<td><span class=\"btn btn-update\" data-id='".$brandRow['id']."'>Update</span></td>";
                echo "<td><span class=\"btn btn-remove\" data-id='".$brandRow['id']."'>Remove</span></td>";
                echo "</tr>";
            }

        ?>
        </table>
        <br>
        <p>
            <b>Введите новый Brand</b>
        </p>

        <div id="inputBrand">
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
                <input type="file" name="brandImage" id="brandImage">
            </div>
            <div class="id_category row">
                <label for="">id_category</label>
                <input type="text">
            </div>
            <div class="country row">
                <label for="">country</label>
                <input type="text">
            </div>
            <div class="text row">
                <label for="">text</label>
                <textarea id="" cols="30" rows="10"></textarea>
            </div>
            <div class="row">
                <span class="btn btn-add fl-left">ADD</span>
                <p class="warning output" id="brandOutput"></p>
            </div>
        </div>
    </form>
</div><!-- end .brand -->