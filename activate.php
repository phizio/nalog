<?php require_once 'config.php';
require_once 'config_for_frontend.php';

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Активация';
$page['desc'] = 'Подтверждение статуса личного кабинета в системе Nalog.team';
$page['template'] = 'frontend/layout_min';

/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */



if (!empty($user_id) && !empty($user_activate)) {
    $user_info = db_row("SELECT * FROM `users` WHERE `id` = '$user_id'");
    if (isset($answ_user)) $user_info = mysql_fetch_assoc($answ_user);
    if (!empty($user_info['user_id'])) {
        if ($user_activate == $user_info['user_activate'] && !empty($user_info['user_activate'])) {
            $answ_user = mysql_query("UPDATE `lim_users` SET `user_activate`=0 WHERE `user_id` ='$user_id'");
            if (isset($answ_user)) $activate_success = "Ваш личный кабинет успешно активирован!";
            else $activate_error = "Произошла ошибка активации";
        } else if (empty($user_info['user_activate'])) {
            $activate_error = "Данный аккаунт уже активирован Вами ранее";
        } else $activate_error = "Ошибка! Неверный код активации";
    } else $activate_error = "Ошибка! Не найден пользователь с таким id";
} else {header("Location: /"); exit;}

/* -------------------------- ОТОБРАЖЕНИЕ ------------ */ ob_start(); ?>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-sm-4">
            <a class="btn btn-success" href="/login">Войти на сайт</a>
        </div>
    </div>
</div>



<?php require PHIX_CORE . '/render_view.php';