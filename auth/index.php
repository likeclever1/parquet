<?php
    require_once("../controller/connect_bd.php");
    require_once("../controller/fetch_data/category.php");
    require_once("../controller/fetch_data/brand.php");
    require_once("../controller/fetch_data/collection.php");
    require_once("../controller/fetch_data/shipment.php");
    if(isset($_POST['login'])) {
        $login = $_POST['login'];
    } else {
        $login = null;
    }

    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $password = null;
    }
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
<?php if($login === 'parazit' && md5($password) === '93c1c1a55153df93e0fcd53b04bc5ec2'): ?>
    <article class="main">
        <div class="tabs">
            <ul class="tabs__nav">
                <li class="tabs__nav-item current"><span class="tabs__nav-link" data-tab="#tab-1">Категории</span></li>
                <li class="tabs__nav-item"><span class="tabs__nav-link" data-tab="#tab-2">Бренд</span></li>
                <li class="tabs__nav-item"><span class="tabs__nav-link" data-tab="#tab-3">Коллекции</span></li>
                <li class="tabs__nav-item"><span class="tabs__nav-link" data-tab="#tab-4">Товар</span></li>
            </ul>
        
            <div class="tabs__content">
                <div id="tab-1" class="tabs__item">
                    <?php include("view/category.tpl"); ?>
                </div>
                <div id="tab-2" class="tabs__item">
                    <?php include("view/brand.tpl"); ?>
                </div>
                <div id="tab-3" class="tabs__item">
                    <?php include("view/collection.tpl"); ?>
                </div>
                <div id="tab-4" class="tabs__item">
                    <?php include("view/shipment.tpl"); ?>
                </div>
            </div><!-- end .tabs__content -->
        </div><!-- end .tabs -->
    </article>
    
<?php else: ?>
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

<?php endif; ?>

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="redactor/redactor.js"></script>
    <script type="text/javascript" src="javascript/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="javascript/requestData.js"></script>
    <script type="text/javascript" src="../javascript/plugins/jquery.tabsUi.js"></script>
    <script type="text/javascript" src="javascript/common.js"></script>

</body>
</html>