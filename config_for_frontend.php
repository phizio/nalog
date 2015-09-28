<?php

// Дефолтные настройки страницы
$page = [
    /* Шаблон страницы по-умолчанию */
    'template'  => 'frontend/layout',

    /* CSS - стили по-умолчанию */
    'css'  => [
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
    ],

    /* JS - скрипты по-умолчанию */
    'js'  => [
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
    ],
    'js_raw' => '', /* в этой переменной хранится "сырой" js, не подключаемый из файла, а генерируемый "на лету" */
];