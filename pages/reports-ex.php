<?php
/**
 * Created by PhpStorm.
 * User: SANEK333
 * Date: 08.10.2015
 * Time: 15:47
 */

//require_once(MC_ROOT . '/config_for_frontend.php');
require_once(MC_ROOT . '/vendor/alexkonov/docreports/class/docReports.php');

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Демонстрация генерации отчетов';
$page['desc'] = '';
//$page['template'] = 'frontend/layout_min';

resource([
    'https://dadata.ru/static/css/lib/suggestions-15.8.css',
    'https://dadata.ru/static/js/lib/jquery.suggestions-15.8.min.js',
    '/assets/js/pages/reports-ex.js'
]);


/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */
$act = isset($_GET['act']) ? $_GET['act'] : '';
$print = '';
switch ($act) {
    default:
        $print .= '<a class="btn btn-success" href="?act=excel">'
            . '<i class="fa fa-file-excel-o"></i> '
            . 'Пример создания документа в Excel</a></br/></br/>';
        $print .= '<a class="btn btn-info" href="?act=word">'
            . '<i class="fa fa-file-word-o"></i> '
            . 'Пример создания документа в Word</a></br/>';
        break;

    /*example create docx pattern*/
    case 'word':
        if (isset($_REQUEST['genre'])) {
            $_REQUEST = array_map('htmlspecialchars', $_REQUEST);
            $data = $_REQUEST;
            if (isset($data['members']))
                $data['members'] = array_map('trim', explode(',', $data['members']));
            $download = 'local/demo.docx';
            $report = new docReports('local/template.docx');
            $report->setData($data, $download);

        }

        if (isset($download))
            $page['success_msg']= 'Файл успешно сгенерирован, <a href="' . $download . '">скачать</a>.';
        $print.='<h3>Генерация Word</h3>';
        $print .= '       <form class="form-horizontal" action="?act=word" method="post" data-role="word">';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Наименование ООО:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="name" data-role="name" value="' . @$_REQUEST['name'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Форма проведения собрания:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="form" data-role="form" value="' . @$_REQUEST['form'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Адрес:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="address" data-role="address" value="' . @$_REQUEST['address'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Дата собрания:</label>';
        $print .= '                <div class="col-md-2">';
        $print .= '                    <input type="text" name="meetingDay" data-role="meetingDay" value="' . @$_REQUEST['meetingDay'] . '" class="form-control" placeholder="день (09)"/>';
        $print .= '                </div>';
        $print .= '                <div class="col-md-4">';
        $print .= '                    <input type="text" name="meetingMonth" data-role="meetingMonth" value="' . @$_REQUEST['meetingMonth'] . '" class="form-control" placeholder="месяц (ноября)"/>';
        $print .= '                </div>';
        $print .= '                <div class="col-md-2">';
        $print .= '                    <input type="text" name="meetingYear" data-role="meetingYear" value="' . @$_REQUEST['meetingYear'] . '" class="form-control" placeholder="год (2015)"/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Дата составления протокола:</label>';
        $print .= '                <div class="col-md-2">';
        $print .= '                    <input type="text" name="protocolDay" data-role="protocolDay" value="' . @$_REQUEST['protocolDay'] . '" class="form-control" placeholder="день (09)"/>';
        $print .= '                </div>';
        $print .= '                <div class="col-md-4">';
        $print .= '                    <input type="text" name="protocolMonth" data-role="protocolMonth" value="' . @$_REQUEST['protocolMonth'] . '" class="form-control" placeholder="месяц (ноября)"/>';
        $print .= '                </div>';
        $print .= '                <div class="col-md-2">';
        $print .= '                    <input type="text" name="protocolYear" data-role="protocolYear" value="' . @$_REQUEST['protocolYear'] . '" class="form-control" placeholder="год (2015)"/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Участники через запятую:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="members" data-role="members" value="' . @$_REQUEST['members'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Всего голосов:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="percentVotes" data-role="percentVotes" value="' . @$_REQUEST['percentVotes'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Инициаторы:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="initiators" data-role="initiators" value="' . @$_REQUEST['initiators'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Председатель:</label>';
        $print .= '                <div class="col-md-4">';
        $print .= '                    <input type="text" name="chairman" data-role="chairman" value="' . @$_REQUEST['chairman'] . '" class="form-control" placeholder="Иванов Иван Иванович"/>';
        $print .= '                </div>';
        $print .= '                <div class="col-md-4">';
        $print .= '                    <input type="text" name="chairmanShort" data-role="chairmanShort" value="' . @$_REQUEST['chairmanShort'] . '" class="form-control" placeholder="Иванов И.И."/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Секретарь:</label>';
        $print .= '                <div class="col-md-4">';
        $print .= '                    <input type="text" name="secretary" data-role="secretary" value="' . @$_REQUEST['secretary'] . '" class="form-control" placeholder="Иванов Иван Иванович"/>';
        $print .= '                </div>';
        $print .= '                <div class="col-md-4">';
        $print .= '                    <input type="text" name="secretaryShort" data-role="secretaryShort" value="' . @$_REQUEST['secretaryShort'] . '" class="form-control" placeholder="Иванов И.И."/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Голосовали за повестку:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="offersVote" data-role="offersVote" value="' . @$_REQUEST['offersVote'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Голосовали за постановление:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="resultsVote" data-role="resultsVote" value="' . @$_REQUEST['resultsVote'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '            <div class="form-group">';
        $print .= '                <div class="col-md-12" style="text-align: right;">';
        $print .= '                    <button type="submit" class="btn btn-primary" style="width:150px;" name="genre" data-role="genre">Сгенерировать</button>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '        </form>';
        break;

    case 'excel':
        if (isset($_REQUEST['genre'])) {
            $data = $_REQUEST;
            $download = 'local/demo.xlsx';
            $report = new docReports('local/template.xls');
            $report->setData($data, $download);

        }
        if (isset($download))
            $page['success_msg']= 'Файл успешно сгенерирован, <a href="' . $download . '">скачать</a>.';
        $print.='<h3>Генерация Excel</h3>';
        $print .= '       <form class="form-horizontal" action="?act=excel" method="post" data-role="excel">';
        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Полное имя:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="fullName" data-role="fullName" value="' . @$_REQUEST['fullName'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';

        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">ОГРН:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="ogrn" data-role="ogrn" value="' . @$_REQUEST['ogrn'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';

        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">ИНН:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="inn" data-role="inn" value="' . @$_REQUEST['inn'] . '" class="form-control" placeholder=""/>';
        $print .= '                </div>';
        $print .= '            </div>';

        $print .= '            <div class="form-group">';
        $print .= '                <label class="col-md-4 control-label">Дата принятия решения:</label>';
        $print .= '                <div class="col-md-8">';
        $print .= '                    <input type="text" name="date" data-role="date" value="' . @$_REQUEST['date'] . '" class="form-control" placeholder="dd.mm.yyyy"/>';
        $print .= '                </div>';
        $print .= '            </div>';

        $print .= '            <div class="form-group">';
        $print .= '                <div class="col-md-12" style="text-align: right;">';
        $print .= '                    <button type="submit" class="btn btn-primary" style="width:150px;" name="genre" data-role="genre">Сгенерировать</button>';
        $print .= '                </div>';
        $print .= '            </div>';
        $print .= '        </form>';
        break;
}


/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */ ?>
<style>
    div.content {
        margin: 25px auto 0;
        width: 70%;
    }

    .clear {
        clear: both;
    }
</style>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="content">
                <?= $print ?>
            </div>
        </div>
    </div>
</div>
