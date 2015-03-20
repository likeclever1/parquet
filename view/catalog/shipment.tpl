<!-- ================================== start shipment.tpl ====================================== -->
<?php
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));
    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where url = '".$collectionGET."'"));
    $shipmentData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `shipment` where url = '".$shipmentGET."'"));

    $categoryTitle = $categoryData['title'];

    $brandTitle = $brandData['title'];

    $collectionTitle = $collectionData['title'];

    $shipmentTitle = $shipmentData['title'];
    $shipmentimage = $shipmentData['image'];
    $shipmentFeature = json_decode($shipmentData['feature']);
    
?>
<?php if(!$shipmentData): ?>
    <div class="warning ta-left">
        <h1>Данный товар не найден</h1>
    </div>
<?php else: ?>
<div class="shipment">
    <h1><?=$categoryTitle;?> <?=$brandTitle;?> коллекция <?=$collectionTitle;?> <?=$shipmentTitle;?></h1>

    <a href="/upload/images/shipment/<?=$shipmentimage;?>" title="<?=$categoryTitle;?> <?=$brandTitle;?> коллекция <?=$collectionTitle;?> <?=$shipmentTitle;?>" class="shipment__img">
        <img src='/upload/images/shipment/<?=$shipmentimage;?>' alt='<?=$shipmentTitle;?>'>
    </a>

    <div class="tabs">
        <ul class="tabs__nav">
            <li class="tabs__nav-item current"><span class="tabs__nav-link" data-tab="#tab-1">Характеристики</span></li>
            <li class="tabs__nav-item"><span class="tabs__nav-link" data-tab="#tab-2">О бренде</span></li>
        </ul>
        <div class="tabs__content">
            <div id="tab-1" class="tabs__item">
                <table class="table-stripped">
                    <?php if(isset($shipmentFeature)): ?>
                        <?php foreach ($shipmentFeature as $key => $value): ?>
                        <?php if($key == 'id') continue; ?>
                        <tr>
                            <td><?=str_replace("_", " ", $key);?></td>
                            <td><?=str_replace("_", " ", $value);?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </table>
            </div>
            <div id="tab-2" class="tabs__item">
                <article class="article">
                    <?= $categoryData['text'] ;?>
                </article>
            </div>
        </div><!-- end .tabs__content -->
    </div><!-- end .tabs -->
</div><!-- end .shipment -->
<?php endif; ?>
<!-- ================================== end shipment.tpl ====================================== -->
