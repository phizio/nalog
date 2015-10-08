<?php
require_once 'config.php';

function redirect($url)
{
    if (preg_match('/^\d+$/', $url)) {
        if ($url==404) {
            $url='/error-404.php';
            header('HTTP/1.1 404 Not Found');
            header('location:'.$url);
        }
    } else
        header('location:' . $url);
    exit('<a href="'.$url.'">You will be redirected to: '.$_SERVER['HTTP_HOST'].$url.'</a>');
}

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
if (!file_exists(MC_ROOT . "/pages" . $path))
    redirect(404);
elseif ($path='/error-404.php')
    header('HTTP/1.1 404 Not Found');
require(MC_ROOT . "/pages" . $path);
// Завершение рендеринга страницы
require PHIX_CORE . '/render_view.php';