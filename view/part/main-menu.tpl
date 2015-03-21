<nav class="main-menu" role="navigation">
    <div class="container">
        <ul class="main-menu__list">
            <li class="<?php if($home) echo 'active'; ?>" ><a href="/">на главную</a></li>
            <li class="<?php if($catalog) echo 'active'; ?>" ><a href="/catalog">каталог товаров</a></li>
            <li class="<?php if($_GET['page'] == 'instructions') echo 'active'; ?>" ><a href="/instructions">инструкции по укладке</a></li>
            <li class="<?php if($_GET['page'] == 'delivery') echo 'active'; ?>" ><a href="/delivery">доставка</a></li>
            <li class="<?php if($_GET['page'] == 'partners') echo 'active'; ?>" ><a href="/partners">партнёры</a></li>
            <li class="<?php if($_GET['page'] == 'contact') echo 'active'; ?>" ><a href="/contact">контакты</a></li>
        </ul>

        <div class="worktime">с <span>10:00</span> до <span>21:00</span></div>
</nav><!-- end .main-menu -->