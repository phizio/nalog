<?php
// Получение пути к базовому каталогу веб-сервера
define('MC_ROOT', dirname(__FILE__));
// Путь к ядру фреймворка phix
define('PHIX_CORE', dirname(__FILE__) . '/vendor/phizio/phix/core');
//cache dir
define('CACHE_DIR', '/tmp/cache');

// Учетные данные для соединения с базой данных MySQL
$db = [
    'username' => 'root',
    'password' => '',
    'host' => 'localhost',
    'base' => 'nalog',
];

$app = [
    /* Название приложения и секретный случайный ключ (используется в модуле безопасности f_secure.php) */
    'name' => 'Nalog',
    'domain' => 'nalog.phix',
    'subdomains' => ['kazan', 'moscow'],
    '404' => '/error-404.html',
    'email' => 'info@nalog.phix',
    'key' => '538t5jht804jht8054jh',
    /* Время жизни токена в минутах (с момента генерации, т.е. вывода формы),
       не рекомендуется более 60, т.к. будет тормозить процедуру валидации токена */
    'token_lifetime' => 5,
    /* Режим работы приложения (индикация ошибок, активация сервисных функций и пр.): 'debug' или 'production' */
    'mode' => 'debug',
    /* Ключ для работы с API всплывающих подсказок Dadata */
    'dadata_api_key' => '154fa715902b207f0c64b376646db03631fa273e',
    'os_windows' => true, //false on real server
    'smtp' => [
        'server' => 'mailtrap.io',
        'port' => 2525,
        'user' => '4643500c521769f5b',
        'password' => '78aaa57f0e395d'
    ]
];

// Дефолтные настройки страницы
$page = [
    /* Шаблон страницы по-умолчанию */
    'template' => 'layout',

    /* CSS - стили по-умолчанию */
    'css' => [
        'twbs/bootstrap/dist/css/bootstrap.min.css',
        /*'twbs/bootstrap/dist/css/bootstrap-theme.min.css',*/
        'components/font-awesome/css/font-awesome.min.css',
        /*'http://fonts.googleapis.com/css?family=Open+Sans',*/
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'AdminLTE.min.css',
        'skins/skin-blue.min.css'
    ],

    /* JS - скрипты по-умолчанию */
    'js' => [
        'components/jquery/jquery.min.js',
        'twbs/bootstrap/dist/js/bootstrap.min.js',
        '/plugins/slimScroll/jquery.slimscroll.min.js',
        '/plugins/fastclick/fastclick.min.js',
        'app.min.js',
        'demo.js'
    ],
    'js_raw' => '', /* в этой переменной хранится "сырой" js, не подключаемый из файла, а генерируемый "на лету" */
];

// Подключение к БД и основных функций для работы с ней
require_once(PHIX_CORE . '/f_mysql.php');
// Фиксация и фильтрация входных данных
require_once(PHIX_CORE . '/request.php');

// js & css minifiers
//require_once(MC_ROOT . '/vendor/tubalmartin/cssmin/cssmin.php');
//require_once(MC_ROOT . '/scripts/minifiers/js.php');
require_once(MC_ROOT . '/vendor/matthiasmullie/minify/src/Minify.php');
require_once(MC_ROOT . '/vendor/matthiasmullie/minify/src/CSS.php');
require_once(MC_ROOT . '/vendor/matthiasmullie/minify/src/JS.php');
require_once(MC_ROOT . '/vendor/matthiasmullie/minify/src/Exception.php');
require_once(MC_ROOT . '/vendor/matthiasmullie/path-converter/src/Converter.php');

// Функции для управления подключаемыми стилями и скриптами
require_once(PHIX_CORE . '/assets_cache.php');
// Функции для работы с текстовым контентом
require_once(PHIX_CORE . '/f_content.php');
// Функции защиты и шифрования
require_once(PHIX_CORE . '/f_secure.php');
// Короткие алиасы функций
require_once(PHIX_CORE . '/aliases.php');
// Регистрация, логин и сессии авторизации на сайте
require_once(PHIX_CORE . '/f_sessions.php');
// Хелперы
//require_once(PHIX_CORE . '/f_helpers.php');
