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
                
                <h1>Контакты</h1>

                <div class="flexEmbed">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2748.8261315279665!2d30.71411599999999!3d46.45214199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c6323507814e4d%3A0x157ad073d3fc0fc0!2z0LLRg9C7LiDQhNGE0ZbQvNC-0LLQsCwgNCwg0J7QtNC10YHQsCwg0J7QtNC10YHRjNC60LAg0L7QsdC70LDRgdGC0Yw!5e0!3m2!1sru!2sua!4v1424344234262" width="720" height="450" frameborder="0" style="border:0"></iframe>
                </div>

                <ol class="contact-list">
                    <li class="contact-list__item">
                        <ul>
                            <li>1. г.Одесса, ул.Ефимова <b>43/4</b></li>
                            <li>тел/факс. <b>8(048)728-87-70</b></li>
                            <li>моб: <b>+38(093)333-33-33</b></li>
                        </ul>
                    </li>
                    <li class="contact-list__item">
                        <ul>
                            <li>1. г.Одесса, ул.Ефимова <b>43/4</b></li>
                            <li>тел/факс. <b>8(048)728-87-70</b></li>
                            <li>моб: <b>+38(093)333-33-33</b></li>
                        </ul>
                    </li>
                    <li class="contact-list__item">
                        <ul>
                            <li>1. г.Одесса, ул.Ефимова <b>43/4</b></li>
                            <li>тел/факс. <b>8(048)728-87-70</b></li>
                            <li>моб: <b>+38(093)333-33-33</b></li>
                        </ul>
                    </li>
                </ol>

                <div class="contact-secondary">
                    <div class="contact-secondary__workrtime fl-right">
                        <b>Режим работы: с 10-00 до 21-00 (без выходных)</b>
                    </div>
                    <div class="contact-secondary__mail">
                        <b>E-mail: <a href="mailto:parket-antique@mail.ru">parket-antique@mail.ru</a></b>
                    </div>
                </div>
            </article>
                
            <?php
                require_once("include/sidebar.php");
            ?>
        </div>
    </div><!-- end .main -->

    <?php
        require_once("include/footer.inc");
        require_once("include/site-footer.php");
    ?>