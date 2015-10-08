<?php
require_once(MC_ROOT . '/config_for_frontend.php');
/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Ошибка 404';
$page['desc'] = 'Ошибка 404 - страница не найдена';
$page['template'] = 'frontend/layout_min';

resource([
    <<<JS
$('.full_page_photo').removeClass('no_photo').css({backgroundImage:'url(/assets/image/404.jpg)'});
JS
]);
/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */

/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>

<section class="call_to_action four-o-four">
    <div class="container"> <i class="fa fa-ambulance"></i>
        <h3>Отсутствие страницы</h3>
        <h4>не является чем-то опасным и плохим. Попробуйте воспользоваться поиском</h4>
    </div>
</section>

<section>
    <div class="container">
        <div class="search_form">
            <form name="search_form" id="search_form" method="post" action="#">
                <div class="row">
                    <div class="col-sm-2 col-md-2"></div>
                    <div class="col-sm-6 col-md-6">
                        <input name="search" id="search" class="form-control" type="text">
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <a id="submit_btn" class="btn btn-primary" name="submit">Поиск</a>
                    </div>
                    <div class="col-sm-2 col-md-2"></div>
                </div>
            </form>
        </div>
    </div>
</section>
