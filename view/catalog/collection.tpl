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
    
    $shipmentsData = [];
    $shipmentsQuery = mysqli_query($connect, "select * from `shipment` where `id_collection`='".$collectionId."' ORDER BY `title` limit ".$limit." ");

    while($row = mysqli_fetch_assoc($shipmentsQuery)) {
        $row['total'] = mysqli_fetch_assoc(mysqli_query($connect, "select count(`id_collection`) as total from `shipment` where `id_collection`='".$row['id']."'"))['total'];
        array_push($shipmentsData, $row);
    }
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
        <?php for($i = 0, $len = count($shipmentsData); $i < $len; $i++): ?>
            <li class='shipment-list__item'>
                <div class='shipment-list__content'>
                    <a href='/catalog/<?=$categoryUrl;?>/<?=$brandUrl;?>/<?=$collectionUrl;?>/<?=$shipmentsData[$i]['url'];?>' class='shipment-list__img'>
                        <img src='/upload/images/shipment/<?=$shipmentsData[$i]['image'];?>' alt='<?=$shipmentsData[$i]['title'];?>' title='<?=$shipmentsData[$i]['title'];?>'>
                    </a>
                    <div class='shipment-list__info'>
                        <h3><a href='/catalog/'><?=$shipmentsData[$i]['title'];?></a></h3>
                        <p><?=$brandTitle;?> <?=$shipmentsData[$i]['title'];?> коллекция <?=$collectionTitle;?></p>
                    </div>
                </div>
                <div class='shipment-list__control'>
                    <a href='/catalog/<?=$categoryUrl;?>/<?=$brandUrl;?>/<?=$collectionUrl;?>/<?=$shipmentsData[$i]['url'];?>' class='btn'>Подробнее</a>
                </div>
            </li>
        <?php endfor; ?>
    </ul>
</div><!-- end .collection -->
<article class="article">
    <?=$collectionText;?>
</article>

<?php endif; ?>
<!-- ================================== end collection.tpl ====================================== -->