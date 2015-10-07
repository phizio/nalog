<?php
require_once (MC_ROOT . '/config_for_frontend.php');

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Вход';
$page['desc'] = 'Авторизация в личном кабинете Nalog.team';
$page['template'] = 'frontend/layout_min';


/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */

if ( auth() ) {header("Location: /profile"); exit;}

/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>
<div class="container" style="margin-top: 20px;">

    <? e('sections/alerts') ?>

    <div class="row">
        <div class="col-sm-4">
            <form action="login.php" method="post">

                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="Логин" value="<? echo $login; ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="pass" placeholder="Пароль">
                </div>

                <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember"> &nbsp; Запомнить меня
                    </label>
                </div>

                <button type="submit" class="btn btn-success">ВОЙТИ</button>
                <a class="pull-right" href="/register">регистрация</a>
            </form>
        </div>
    </div>

</div>