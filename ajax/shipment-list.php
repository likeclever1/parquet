<?php
    require_once("../controller/connect_bd.php");

    if(isset($_POST['limit'])) {
        $limit = mysqli_real_escape_string($connect, $_POST['limit']);
    } else {
        $limit = 4;
    }

    if(isset($_POST['collection'])) {
        $collection = mysqli_real_escape_string($connect, $_POST['collection']);
    } else {
        $collection = false;
    }

    $collectionData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `collection` where url = '".$collection."'"));

    $shipments = mysqli_query($connect, "select * from `shipment` where `id_collection`='".$collectionData['id']."' ORDER BY `title` limit ".$limit." ");

    $brandData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `brand` where id = '".$collectionData['id_brand']."'"));
    $categoryData = mysqli_fetch_assoc(mysqli_query($connect, "select * from `category` where id = '".$brandData['id_category']."'"));

?>

<?php while($row = mysqli_fetch_assoc($shipments)): ?>
    <li class='shipment-list__item'>
        <div class='shipment-list__content'>
            <a href='/catalog/<?=$categoryData['url'];?>/<?=$brandData['url'];?>/<?=$collectionData['url'];?>/<?=$row['url'];?>' class='shipment-list__img'>
                <img src='/upload/images/shipment/<?=$row['image'];?>' alt='<?=$row['title'];?>' title='<?=$row['title'];?>'>
            </a>
            <div class='shipment-list__info'>
                <h3><a href='/catalog/'><?=$row['title'];?></a></h3>
                <p><?=$brandData['title'];?> <?=$row['title'];?> коллекция <?=$collectionData['title'];?></p>
            </div>
        </div>
        <div class='shipment-list__control'>
            <a href='/catalog/<?=$categoryData['url'];?>/<?=$brandData['url'];?>/<?=$collectionData['url'];?>/<?=$row['url'];?>' class='btn'>Подробнее</a>
        </div>
    </li>
<?php endwhile; ?>