<?php
    require_once("functions/connect_to_bd.php");

    require_once("include/site-header.php");

    require_once("include/header.php");

    require_once("include/main-menu.php");

?>
    
    <div class="main">
        <div class="container">
            <?php
                require_once("include/l-menu.php");
            ?>

            <article class="content" role="main">
                
                <?php
                    include "include/breadcrumbs.php";
                    include("include/shipment-item.php");
                ?>
                
            </article>
            
            <?php
                require_once("include/sidebar.php");
            ?>

        </div>
    </div><!-- end .main -->

    <?php
        require_once("include/footer.php");
        require_once("include/site-footer.php");
    ?>