<?php
/**
 * Created by PhpStorm.
 * User: SANEK333
 * Date: 06.10.2015
 * Time: 11:07
 */

$dadataKEY = '54da3aafbc833c05409561f10b0a46ae5fe1c32b';
$dadataSECRET = 'd4917ced30c889ebc560718c4456eb7f0b02a62a';
function arrayToQuery($array, $alias = false)
{
    $result = [];
    foreach ($array as $k => $v)
        if (is_array($v))
            $result[] = arrayToQuery($v, $alias ? $alias . '[' . $k . ']' : $k);
        else
            $result[] = $alias ? $alias . '[' . $k . ']=' . $v : $k . '=' . urlencode($v);
    return implode('&', $result);
}

function load($url, $data, $post = false, $dataType = 'json', $headers = [])
{
    $length = 0;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, false);
    if ($post) {
        if (isset($data['key'])) {
            $url .= '?key=' . $data['key'];
            unset($data['key']);
        }
        if ($dataType == 'json')
            $data = json_encode($data);
        $length = strlen($data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    } else {
        curl_setopt($ch, CURLOPT_URL, $url . '?' . arrayToQuery($data));
    }
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge([
        'User-Agent: APILoader (' . $_SERVER['HTTP_HOST'] . ')',
        'Accept-Language: ru-RU,ru;q=0.9',
        'Accept-Charset: utf-8',
        'Accept-Encoding: deflate',
        'Content-Type: application/json',
        'Accept: application/json',
        'Content-length: ' . $length,
        'Cache-Control: no-cache',
        'Connection: Keep-Alive'
    ], $headers));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function konturLoad($path, $data, $post)
{
    $data['key'] = '110e33b7d0716c172f340e0596081a939172c11';
    return load('https://focus-api.kontur.ru/api2/' . $path, $data, $post);
}

function getArray($data)
{
    return is_array($data) ? $data : [$data];
}

////
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
header('Content-type:text/plain; charset=utf8');
switch ($act) {

    //Получаем информацию о компании, акцент на ОГРН (используется в дальнейших запросах)
    case 'search':
        $data = [];
        if (isset($_REQUEST['query'])) {
            $data = ['q' => $_REQUEST['query']];
            if (isset($_REQUEST['page']))
                $data['page'] = intval($_REQUEST['page']);
            echo konturLoad('search', $data);
        }
        break;

    //Общие данные
    case 'info':
        $q = false;
        if (isset($_REQUEST['inn']))
            $data = ['inn' => $_REQUEST['inn']];
        elseif (isset($_REQUEST['ogrn']))
            $data = ['ogrn' => $_REQUEST['ogrn']];
        else
            break;
        echo konturLoad(isset($_REQUEST['ip']) ? 'ip' : 'ul', $data);
        break;

    //Аналитические данные (РНП, реестры ФНС)
    case 'analytics':
        if (isset($_REQUEST['ogrn']))
            $q = 'ogrn=' . $_REQUEST['ogrn'];
        else
            break;
        echo konturLoad('analytics', $q);
        break;

    //Лицензии компании
    case 'licences':
        if (isset($_REQUEST['ogrn']))
            $q = 'ogrn=' . $_REQUEST['ogrn'];
        else
            break;
        echo konturLoad('licences', $q);
        break;

    //Бухформы
    case 'buhforms':
        if (isset($_REQUEST['ogrn']))
            $q = 'ogrn=' . $_REQUEST['ogrn'];
        else
            break;
        echo konturLoad('buhforms', $q);
        break;

    //Позволяет получить арбитражные дела организации
    case 'arbitration':
        //TODO: не нашел информации по запросу к апи, поинтересоваться
        break;

    case 'checkPassport':
        if (isset($_REQUEST['series'], $_REQUEST['number']))
            echo load('https://dadata.ru/api/v2/clean/passport', ['structure'=>['PASSPORT'],'data'=> [[$_REQUEST['series'].' '. $_REQUEST['number']]] ], true, 'json', [
                'Authorization: Token ' . $dadataKEY,
                'X-Secret: ' . $dadataSECRET
            ]);
        break;


}