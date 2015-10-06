<?php
require_once (MC_ROOT . '/config_for_frontend.php');

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Цены';
$page['desc'] = 'Стоимость услуг нашей компании';
$page['template'] = 'frontend/layout_min';


/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */


/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>

    <section class="pricing_wrapper">
        <div class="container triangles-of-section">
            <div class="triangle-up-left"></div>
            <div class="square-left"></div>
            <div class="triangle-up-right"></div>
            <div class="square-right"></div>
        </div>
        <div class="container">
            <h2 class="section_header fancy centered">
                Стоимость услуг нашей компании
                <small>Мы всегда идем навстречу и готовы рассмотреть индивидуальные нюансы</small>
            </h2>
            <div class="row">

                <div class="col-sm-4 col-md-4">
                    <div class="pricing_plan wow fadeInUp">
                        <h3>Смена директора <small>Срок исполнения: 7 - 10 дней</small></h3>
                        <div class="the_price"><small>от</small> 35 <small>тыс.</small> <i class="fa fa-rub"></i></div>
                        <div class="the_offerings">
                            <p> <strong>35 000 р.</strong> + 10.0% от суммы долга </p>
                        </div>
                        <a href="http://king-screens.com/smena-direktora" class="btn btn-primary">Заказать!</a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="pricing_plan special wow fadeInUp">
                        <h3>Ликвидация <small>от 9 месяцев</small></h3>
                        <div class="the_price"><small>от</small> 490 <small>тыс.</small> <i class="fa fa-rub"></i></div>
                        <div class="the_offerings">
                            Официальная (добровольная) ликвидация
                        </div>
                        <a href="http://king-screens.com/likvidaciya" class="btn btn-primary">Заказать!</a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4">
                    <div class="pricing_plan wow fadeInUp">
                        <h3>Реорганизация <small>Срок исполнения 4-6 месяцев. Для организационно-правовой формы - ООО</small></h3>
                        <div class="the_price"><small>от</small> 49 <small>тыс.</small> <i class="fa fa-rub"></i></div>
                        <div class="the_offerings">
                            <p> <strong>«20 к 1»</strong> 49 000 р.</p>
                            <p> <strong>«5 к 1»</strong> 75 000 р. + 10.0% от суммы долга </p>
                            <p> <strong>«1 к 1»</strong> 95 000 р. + 10.0% от суммы долга </p>
                        </div>
                        <a href="http://king-screens.com/reorganizaciya" class="btn btn-primary">Заказать!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>