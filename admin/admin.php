<?php
    require_once("../functions/connect_bd.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <article class="main">
        <div class="category">
            <form action="admin.php" method="POST" id="categoryForm">
                <table class="table-category">
                <tablecaption>Таблица 1. <b>Категории товаров</b></tablecaption>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>url</th>
                    <th>image</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php

                    require_once("../functions/fetch_data_from_category.php");

                    while($categoryRow = mysqli_fetch_assoc($categoryData)) {
                        echo "<tr>";
                        echo "<td class='id'>".$categoryRow['id']."</td>";
                        echo "<td class='title'><textarea cols=\"30\" rows=\"1\">".$categoryRow['title']."</textarea></td>";
                        echo "<td class='url'><textarea cols=\"30\" rows=\"1\">".$categoryRow['url']."</textarea></td>";
                        echo "<td class='image'><textarea cols=\"30\" rows=\"1\">".$categoryRow['image']."</textarea></td>";
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
                    <div class="row">
                        <span class="fl-left btn btn-add">ADD</span>
                        <p class="warning output" id="categoryOutput"></p>
                    </div>
                </div>
            </form>
        </div><!-- end .category -->

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

                    $queryBrand = "select * from brand order by `id_category`";
                    $resultBrand = mysqli_query($connect, $queryBrand);

                    if(!$resultBrand) {
                        die("Неудалось выполнитьзапрос".mysql_error());
                    }

                    while($brandRow = mysqli_fetch_assoc($resultBrand)) {
                        echo "<tr>";
                        echo "<td>".$brandRow['id']."</td>";
                        echo "<td class='id_type'><textarea cols=\"10\" rows=\"1\">".$brandRow['title']."</textarea></td>";
                        echo "<td class='id_brand'><textarea cols=\"12\" rows=\"1\">".$brandRow['url']."</textarea></td>";
                        echo "<td class='brand'><textarea cols=\"12\" rows=\"1\">".$brandRow['image']."</textarea></td>";
                        echo "<td class='id_collection'><textarea cols=\"12\" rows=\"1\">".$brandRow['id_category']."</textarea></td>";
                        echo "<td class='country'><textarea cols=\"12\" rows=\"1\">".$brandRow['country']."</textarea></td>";
                        echo "<td class='describe'><textarea cols=\"17\" rows=\"1\">".$brandRow['text']."</textarea></td>";
                        echo "<td><button class=\"btn btn-update\" type='submit' data-id='".$brandRow['id']."'>Update</button></td>";
                        echo "<td><button class=\"btn btn-remove\" type='submit' data-id='".$brandRow['id']."'>Remove</button></td>";
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
        
    </article>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="javascript/requestData.js"></script>

</body>
</html>