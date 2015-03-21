<?php
    $catalog = true;
    require_once("controller/connect_bd.php");
    include("controller/get_param.php");
    require_once("view/part/site-header.tpl");
    require_once("view/part/header.tpl");
    require_once("view/part/main-menu.tpl");

    //var_dump($categoryGET, $brandGET, $collectionGET, $shipmentGET);
?>
    
    <div class="main">
        <div class="container">
            <?php require_once("view/part/l-menu.tpl");?>

            <article class="content" role="main">
                <?php
                    if($categoryGET) {
                        include "view/part/breadcrumbs.tpl";
                    }

                    if(!$categoryGET && !$brandGET && !$collectionGET && !$shipmentGET) {
                        $outputSubmenu = true;
                        require_once("view/part/hero.tpl");
                    }

                    if($categoryGET && !$brandGET && !$collectionGET && !$shipmentGET) {
                        include "view/catalog/category.tpl";
                    }

                    if($categoryGET && $brandGET && !$collectionGET && !$shipmentGET) {
                        include "view/catalog/brand.tpl";
                    }

                    if($categoryGET && $brandGET && $collectionGET && !$shipmentGET) {
                        include "view/catalog/collection.tpl";
                    }

                    if($categoryGET && $brandGET && $collectionGET && $shipmentGET) {
                        include "view/catalog/shipment.tpl";
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