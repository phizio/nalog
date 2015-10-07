<?php

// Настройки дефолтных значений для frontend-части сайта

/* Шаблон страницы по-умолчанию */
$page['template'] = 'frontend/layout';
/* CSS - стили по-умолчанию */
$page['css'] = [
        '/css/animate.css',
        '/css/imagelightbox.css',
        '/css/style.css',
        '/css/raleway.css',
        '/css/mainmenu.css',
        '/css/mainmenu.css',
        'http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
        '/js/woothemes-FlexSlider-06b12f8/flexslider.css',
        '/js/isotope/css/style.css',
        '/css/simpletextrotator.css',
        '/css/_style_switcher.css',
];
/* JS - скрипты по-умолчанию */
$page['js'] = [
        '/js/jquery-1.10.2.min.js',
        'twbs/bootstrap/dist/js/bootstrap.min.js',
        '/js/woothemes-FlexSlider-06b12f8/jquery.flexslider-min.js',
        '/js/isotope/jquery.isotope.min.js',
        '/js/jquery.ui.totop.js',
        '/js/easing.js',
        '/js/wow.min.js',
        '/js/jquery.simple-text-rotator.js',
        '/js/cleanstart_theme.js',
        '/js/collapser.js',
        '/js/tweetie/tweetie.min.js',
        '/js/style_switcher.js',
];
/* в этой переменной хранится "сырой" js, не подключаемый из файла, а генерируемый "на лету" */
$page['js_raw'] = '';