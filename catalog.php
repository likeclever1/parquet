<?php
    require_once("functions/connect_bd.php");

    require_once("include/site-header.inc");

    require_once("include/header.inc");

    require_once("include/main-menu.inc");

    include("functions/get_param.php");

    var_dump($categoryGET, $brandGET, $collectionGET, $shipmentGET);
?>
    
    <div class="main">
        <div class="container">
            <?php
                require_once("include/l-menu.inc");
            ?>

            <article class="content" role="main">
                <?php
                    if($categoryGET) {
                        include "include/breadcrumbs.inc";
                    }

                    if(!$categoryGET && !$brandGET && !$collectionGET && !$shipmentGET) {
                        $outputSubmenu = true;
                        require_once("include/hero.inc");
                    }

                    if($categoryGET && !$brandGET && !$collectionGET && !$shipmentGET) {
                        include "include/brand.inc";
                    }

                    if($categoryGET && $brandGET && !$collectionGET && !$shipmentGET) {
                        include "include/collection.inc";
                    }

                    if($categoryGET && $brandGET && $collectionGET && !$shipmentGET) {
                        include "include/shipments.inc";
                    }

                    if($categoryGET && $brandGET && $collectionGET && $shipmentGET) {
                        include "include/shipment.inc";
                    }
                ?>
            </article>

            <?php
                require_once("include/sidebar.inc");
            ?>
        </div>
    </div><!-- end .main -->
    
    <?php
        require_once("include/footer.inc");
        require_once("include/site-footer.inc");
    ?>