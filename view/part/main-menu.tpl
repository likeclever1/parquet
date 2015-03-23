<?php include ("controller/definePage.php"); ?>

<nav class="main-menu" role="navigation">
    <div class="container">
        <ul class="main-menu__list">
            <li class="<?php if($home) echo 'active'; ?>" ><a href="/">на главную</a></li>
            <li class="<?php if($catalog) echo 'active'; ?>" ><a href="/catalog">каталог товаров</a></li>
            <li class="<?php if($page == 'gallery') echo 'active'; ?>" ><a href="/gallery">Галерея</a></li>
            <li class="<?php if($page == 'delivery') echo 'active'; ?>" ><a href="/delivery">доставка</a></li>
            <li class="<?php if($page == 'partners') echo 'active'; ?>" ><a href="/partners">партнёры</a></li>
            <li class="<?php if($page == 'packing') echo 'active'; ?>" ><a href="/packing">Укладка</a></li>
            <li class="<?php if($page == 'contact') echo 'active'; ?>" ><a href="/contact">контакты</a></li>
        </ul>

        <div class="worktime">с <span>9:00</span> до <span>17:00</span></div>
</nav><!-- end .main-menu -->