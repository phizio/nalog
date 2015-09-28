<?php require_once 'config.php';
require_once 'config_for_frontend.php';

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Главная';
$page['desc'] = 'Главная страница сайта';
$page['template'] = 'frontend/layout';


/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */


/* -------------------------- ОТОБРАЖЕНИЕ ------------ */ ob_start(); ?>

<? e('frontend/widgets/features') ?>
<? e('frontend/widgets/call_block') ?>
<? e('frontend/widgets/main_3_services') ?>

<?php require PHIX_CORE . '/render_view.php';