<!-- ================================== start collection.tpl ====================================== -->

<?php
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where url = '".$categoryGET."'"));
    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where url = '".$brandGET."'"));
    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where url = '".$collectionGET."'"));

    $categoryTitle = $categoryData['title'];
    $categoryUrl = $categoryData['url'];

    $brandTitle = $brandData['title'];
    $brandUrl = $brandData['url'];
    $brandCountry = $brandData['country'];
    $brandImage = $brandData['image'];

    $collectionTitle = $collectionData['title'];
    $collectionUrl = $collectionData['url'];
    $collectionId = $collectionData['id'];
    $collectionFeature = $collectionData['feature'];
    $collectionText = $collectionData['text'];

    $limit = 10000;
    $shipments = mysqli_query($connect, "select * from `shipment` where `id_collection`='".$collectionId."' ORDER BY `title` limit ".$limit." ");
?>
<?php if(!$collectionData): ?>
    <div class="warning ta-left">
        <h2>Данный товар не найден</h2>
    </div>
<?php else: ?>
<div class="collection">
    <div class="collection__content clearfix">
        <h1><?=$categoryTitle;?> <?=$brandTitle;?> коллекция <?=$collectionTitle;?>, <?=$brandCountry;?></h1>
        <img src='/upload/images/brand/<?=$brandImage;?>' class='fl-right' title='<?=$collectionTitle;?>' alt='<?=$collectionTitle;?>'>
        <b><?=$categoryTitle;?> <?=$brandTitle;?> коллекция <?=$collectionTitle;?>:</b>
        
        <?=$collectionFeature;?>
    </div>

    <div class="paging ta-right">
        <select id="selectShipments" data-collection=<?=$collectionUrl;?> name="selectShipments" class="fl-right custom-select">
            <option value="10000">все</option>
            <option value="4">4</option>
            <option value="8">8</option>
            <option value="12">12</option>
        </select>

        <b>Товаров на странице:</b>
    </div>

    <ul class="shipment-list">
        <?php while($row = mysqli_fetch_assoc($shipments)): ?>
            <li class='shipment-list__item'>
                <div class='shipment-list__content'>
                    <a href='/catalog/<?=$categoryUrl;?>/<?=$brandUrl;?>/<?=$collectionUrl;?>/<?=$row['url'];?>' class='shipment-list__img'>
                        <img src='/upload/images/shipment/<?=$row['image'];?>' alt='<?=$row['title'];?>' title='<?=$row['title'];?>'>
                    </a>
                    <div class='shipment-list__info'>
                        <h3><a href='/catalog/'><?=$row['title'];?></a></h3>
                        <p><?=$brandTitle;?> <?=$row['title'];?> коллекция <?=$collectionTitle;?></p>
                    </div>
                </div>
                <div class='shipment-list__control'>
                    <a href='/catalog/<?=$categoryUrl;?>/<?=$brandUrl;?>/<?=$collectionUrl;?>/<?=$row['url'];?>' class='btn'>Подробнее</a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div><!-- end .collection -->
<article class="article">
    <?=$collectionText;?>
</article>

<?php endif; ?>
<!-- ================================== end collection.tpl ====================================== -->