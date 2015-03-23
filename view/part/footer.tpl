<?php include ("controller/definePage.php"); ?>

<footer class="footer" role="contentinfo">
    <div class="container">
        <ul class="footer-nav">
            <li class="footer-nav__item <?php if($home) echo 'active'; ?>"><a href="/" class="footer-nav__link">на главную</a></li>
            <li class="footer-nav__item <?php if($catalog) echo 'active'; ?>"><a href="/catalog" class="footer-nav__link">каталог товаров</a></li>
            <li class="footer-nav__item <?php if($page == 'gallery') echo 'active'; ?>"><a href="/gallery" class="footer-nav__link">галерея</a></li>
            <li class="footer-nav__item <?php if($page == 'delivery') echo 'active'; ?>"><a href="/delivery" class="footer-nav__link">доставка</a></li>
            <li class="footer-nav__item <?php if($page == 'partners') echo 'active'; ?>"><a href="/partners" class="footer-nav__link">партнёры</a></li>
            <li class="footer-nav__item <?php if($page == 'packing') echo 'active'; ?>"><a href="/packing" class="footer-nav__link">укладка</a></li>
            <li class="footer-nav__item <?php if($page == 'contact') echo 'active'; ?>"><a href="/contact" class="footer-nav__link">контакты</a></li>
        </ul>

        <ul class="social-list">
            <li class="social-list__item fb"><a href="#"></a></li>
            <li class="social-list__item odn"><a href="#"></a></li>
            <li class="social-list__item vk"><a href="#"></a></li>
        </ul>
        
        <div class="copyright">2010-2015 &copy; <a href="/">parquet.od.ua</a>, Все права защищены.</div>
        
        <div class="f-logo">
            <a href="/">
                <img src="/images/design/logo_mini.png" alt="Паркетный салон">
            </a>
        </div>

    </div>
</footer><!-- end .footer -->