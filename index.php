<?php
    require_once("controller/connect_bd.php");

    if(isset($_GET['page'])) {
        $page = mysqli_real_escape_string($connect, $_GET['page']);
    } else {
        $page = null;
    }
    
    require_once("view/part/site-header.tpl");
    require_once("view/part/header.tpl");
    require_once("view/part/main-menu.tpl");
?>

    <div class="main">
        <div class="container">

            <?php require_once("view/part/l-menu.tpl"); ?>

            <article class="content" role="main">
                <?php
                    
                    if($page == null || file_exists('view/pages/'.$page.'.tpl'))
                    {
                        if($page == 'contact'){
                            include('view/pages/contact.tpl');
                        } else if($page == 'instructions'){
                            include('view/pages/instructions.tpl');
                        } else if($page == 'delivery') {
                            include('view/pages/delivery.tpl');
                        } else if($page == 'partners') {
                            include('view/pages/partners.tpl');
                        } else {
                            include("view/part/hero.tpl");
                            include('view/pages/home.tpl');
                        }
                    }
                    else
                    {
                        include('view/part/404.tpl');
                    }


                ?>
            </article>

            <?php require_once("view/part/sidebar.tpl"); ?>

        </div>
    </div><!-- end .main -->
    
<?php
    require_once("view/part/footer.tpl");
    require_once("view/part/site-footer.tpl");
?>