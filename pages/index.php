<?php
require_once (MC_ROOT . '/config_for_frontend.php');

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Главная';
$page['desc'] = 'Главная страница сайта';
$page['template'] = 'frontend/layout';


/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */


/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>

<? e('frontend/widgets/features') ?>
<? e('frontend/widgets/call_block') ?>
<? e('frontend/widgets/main_3_services') ?>

