<?php require_once 'config.php';
require_once 'config_for_frontend.php';

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Регистрация';
$page['desc'] = 'Создание личного кабинета в системе Nalog.team';
$page['template'] = 'frontend/layout_min';


/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */



/* -------------------------- ОТОБРАЖЕНИЕ ------------ */ ob_start(); ?>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-sm-4">

            <? e('sections/alerts') ?>

            <form action="register.php?act=register" method="post">

                <div class="form-group">
                    <label>Ваше имя</label>
                    <input type="text" name="user_name" class="form-control" placeholder="Имя" value="<?= $user_name ?>" autofocus>
                </div>

                <div class="form-group">
                    <label>Адрес электронной почты</label>
                    <input type="text" name="user_email" class="form-control" placeholder="E-mail" value="<?= $user_email ?>">
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="agree"> &nbsp; Согласен с правилами Сайта
                    </label>
                </div>

                <button type="submit" class="btn btn-success">РЕГИСТРАЦИЯ</button>
                <a class="pull-right" href="/login">уже зарегистрирован</a>
            </form>
        </div>
    </div>
</div>


<?php require PHIX_CORE . '/render_view.php';