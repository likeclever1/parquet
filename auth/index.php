<?php
    require_once("../controller/connect_bd.php");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="redactor/redactor.css" />
</head>
<body>
<?php if($_POST['login'] <> 'admin' && $_POST['password'] <> 'weerweer'): ?>
    <form class="auth" method="post" action="index.php">
    <h2>Administrator</h2>
        <div class="row">
            <input type="text" name="login" placeholder="login">
            <input type="password" name="password" placeholder="password">
        </div>
        <div class="row">
            <button class="btn" type="submit">Войти</button>
        </div>
    </form>
<?php else: ?>
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
                        echo "<td class='text'><textarea cols=\"80\" rows=\"10\">".$categoryRow['text']."</textarea></td>";
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

                        require_once("../controller/fetch_data/collection.php");

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
                    <div class="feature row">
                        <label for="">feature</label>
                        <textarea id="" cols="30" rows="10"></textarea>
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
    </article>

<?php endif; ?>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="redactor/redactor.js"></script>
    <script type="text/javascript" src="javascript/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="javascript/requestData.js"></script>
    <script type="text/javascript" src="javascript/common.js"></script>

</body>
</html>