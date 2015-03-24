<div class="category">
    <form action="admin.php" method="POST" id="categoryForm">
        <table class="table-category">
        <tablecaption>Таблица 1. <b>Категории товаров</b></tablecaption>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>url</th>
            <th>image</th>
            <th>text</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php

            require_once("../controller/fetch_data/category.php");

            while($categoryRow = mysqli_fetch_assoc($categoryData)) {
                echo "<tr>";
                echo "<td class='id'>".$categoryRow['id']."</td>";
                echo "<td class='title'><textarea cols=\"30\" rows=\"1\">".$categoryRow['title']."</textarea></td>";
                echo "<td class='url'><textarea cols=\"30\" rows=\"1\">".$categoryRow['url']."</textarea></td>";
                echo "<td class='image'><textarea cols=\"30\" rows=\"1\">".$categoryRow['image']."</textarea></td>";
                echo "<td class='text'><textarea cols=\"30\" rows=\"1\">".$categoryRow['text']."</textarea></td>";
                echo "<td><span class=\"btn btn-update\" data-id='".$categoryRow['id']."'>Update</span></td>";
                echo "<td><span class=\"btn btn-remove\" data-id='".$categoryRow['id']."'>Remove</span></td>";
                echo "</tr>";
            }

        ?>
        </table>
        <div id="inputCategory">
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
                <input type="file" name="categoryImage" id="categoryImage">
            </div>
            <div class="text row">
                <label for="">text</label>
                <textarea id="redactorCategory" name="redactorCategory"></textarea>
            </div>
            <div class="row">
                <span class="fl-left btn btn-add">ADD</span>
                <p class="warning output" id="categoryOutput"></p>
            </div>
        </div>
    </form>
</div><!-- end .category -->