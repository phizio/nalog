<?php
require_once 'config.php';

// Анализ поддоменов
$host_arr = explode('.', $_SERVER['HTTP_HOST']);
if (count($host_arr) == 3) {
    // Присутствует поддомен, проверяем по списку разрешенных
    if (in_array($host_arr[0], $app['subdomains'])) $page['subdomain'] = $host_arr[0];
    else redirect(404);
}

// Анализ строки запроса
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // путь к запрошенной странице

// Добавление окончания .php в случае его отсутствия
if ($path == '/') $path .= 'index.php';
else {
    $type = substr($path, (strlen($path) - 4), 4);
    if ($type != '.php') $path = trim($path) . '.php';
}


/*echo "URL: {$_SERVER['REQUEST_URI']}<br />"
    ."Будет подключен файл: " . MC_ROOT . "/pages" . $path . "<br />"
    ."Массив \$_GET:<br />";*/

//dd($_GET); // Для отладки! (хелпер dump & die - выводит содержимое переменной и завершает выполнение скрипта)

ob_start();
// Проверка существования файла страницы
if (! @require(MC_ROOT . "/pages" . $path)) redirect(404);
// Завершение рендеринга страницы
require PHIX_CORE . '/render_view.php';