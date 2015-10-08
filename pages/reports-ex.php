<?php
/**
 * Created by PhpStorm.
 * User: SANEK333
 * Date: 08.10.2015
 * Time: 15:47
 */

require_once (MC_ROOT . '/config_for_frontend.php');
require_once (MC_ROOT . '/vendor/alexkonov/docreports/class/docReports.php');

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Демонстрация генерации отчетов';
$page['desc'] = 'Демка';
$page['template'] = 'frontend/layout_min';

/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */
$act = isset($_GET['act']) ? $_GET['act'] : '';
$print='';
switch ($act) {
    default:
        $print.='<a href="?act=excel">Excel example</a></br/>';
        $print.='<a href="?act=word">Word example</a></br/>';
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
            $print.='<div class="col-md-12"><div class="download">Файл успешно сгенерирован, <a href="' . $download . '">скачать</a>.</div></div>';
        $print.='       <form class="form-horizontal" action="?act=word" method="post">';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Наименование ООО:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="name" value="' . @$_REQUEST['name'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Форма проведения собрания:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="form" value="' . @$_REQUEST['form'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Адрес:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="address" value="' . @$_REQUEST['address'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Дата собрания:</label>';
        $print.='                <div class="col-md-2">';
        $print.='                    <input type="text" name="meetingDay" value="' . @$_REQUEST['meetingDay'] . '" class="form-control" placeholder="день (09)"/>';
        $print.='                </div>';
        $print.='                <div class="col-md-4">';
        $print.='                    <input type="text" name="meetingMonth" value="' . @$_REQUEST['meetingMonth'] . '" class="form-control" placeholder="месяц (ноября)"/>';
        $print.='                </div>';
        $print.='                <div class="col-md-2">';
        $print.='                    <input type="text" name="meetingYear" value="' . @$_REQUEST['meetingYear'] . '" class="form-control" placeholder="год (2015)"/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Дата составления протокола:</label>';
        $print.='                <div class="col-md-2">';
        $print.='                    <input type="text" name="protocolDay" value="' . @$_REQUEST['protocolDay'] . '" class="form-control" placeholder="день (09)"/>';
        $print.='                </div>';
        $print.='                <div class="col-md-4">';
        $print.='                    <input type="text" name="protocolMonth" value="' . @$_REQUEST['protocolMonth'] . '" class="form-control" placeholder="месяц (ноября)"/>';
        $print.='                </div>';
        $print.='                <div class="col-md-2">';
        $print.='                    <input type="text" name="protocolYear" value="' . @$_REQUEST['protocolYear'] . '" class="form-control" placeholder="год (2015)"/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Участники через запятую:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="members" value="' . @$_REQUEST['members'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Всего голосов:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="percentVotes" value="' . @$_REQUEST['percentVotes'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Инициаторы:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="initiators" value="' . @$_REQUEST['initiators'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Председатель:</label>';
        $print.='                <div class="col-md-4">';
        $print.='                    <input type="text" name="chairman" value="' . @$_REQUEST['chairman'] . '" class="form-control" placeholder="Иванов Иван Иванович"/>';
        $print.='                </div>';
        $print.='                <div class="col-md-4">';
        $print.='                    <input type="text" name="chairmanShort" value="' . @$_REQUEST['chairmanShort'] . '" class="form-control" placeholder="Иванов И.И."/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Секретарь:</label>';
        $print.='                <div class="col-md-4">';
        $print.='                    <input type="text" name="secretary" value="' . @$_REQUEST['secretary'] . '" class="form-control" placeholder="Иванов Иван Иванович"/>';
        $print.='                </div>';
        $print.='                <div class="col-md-4">';
        $print.='                    <input type="text" name="secretaryShort" value="' . @$_REQUEST['secretaryShort'] . '" class="form-control" placeholder="Иванов И.И."/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Голосовали за повестку:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="offersVote" value="' . @$_REQUEST['offersVote'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Голосовали за постановление:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="resultsVote" value="' . @$_REQUEST['resultsVote'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='            <div class="form-group">';
        $print.='                <div class="col-md-12">';
        $print.='                    <button type="submit" class="btn btn-primary" style="width:100%;" name="genre">Сгенерировать</button>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='        </form>';
        break;

    case 'excel':
        if (isset($_REQUEST['genre'])) {
            $data = $_REQUEST;
            $download = 'local/demo.xlsx';
            $report = new docReports('local/template.xls');
            $report->setData($data, $download);

        }

        if (isset($download))
            $print.='<div class="col-md-12"><div class="download">Файл успешно сгенерирован, <a href="' . $download . '">скачать</a>.</div></div>';
        $print.='       <form class="form-horizontal" action="?act=excel" method="post">';
        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Полное имя:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="fullName" value="' . @$_REQUEST['fullName'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';

        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">ОГРН:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="ogrn" value="' . @$_REQUEST['ogrn'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';

        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">ИНН:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="inn" value="' . @$_REQUEST['inn'] . '" class="form-control" placeholder=""/>';
        $print.='                </div>';
        $print.='            </div>';

        $print.='            <div class="form-group">';
        $print.='                <label class="col-md-4 control-label">Дата принятия решения:</label>';
        $print.='                <div class="col-md-8">';
        $print.='                    <input type="text" name="date" value="' . @$_REQUEST['date'] . '" class="form-control" placeholder="dd.mm.yyyy"/>';
        $print.='                </div>';
        $print.='            </div>';

        $print.='            <div class="form-group">';
        $print.='                <div class="col-md-12">';
        $print.='                    <button type="submit" class="btn btn-primary" style="width:100%;" name="genre">Сгенерировать</button>';
        $print.='                </div>';
        $print.='            </div>';
        $print.='        </form>';
        break;
}


/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>
<style>
    div.content {
        margin:25px auto 0;
    }

    div.download {
        text-align: center;
        font-size:20px;
        color:#e00;
        margin:0 0 30px 0;
    }

    div.download a {
        font-weight: bold;
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
