<?php
/**
 * Created by PhpStorm.
 * User: SANEK333
 * Date: 08.10.2015
 * Time: 20:44
 */
//require_once (MC_ROOT . '/config_for_frontend.php');
require_once (MC_ROOT . '/vendor/alexkonov/mailer/class/mailer.php');

/* ----------------------- ПАРАМЕТРЫ СТРАНИЦЫ ----------------------- */
$page['title'] = 'Демонстрация отправки почты';
$page['desc'] = '';
//$page['template'] = 'frontend/layout_min';

/* ---------------------- КОНТРОЛЛЕР СТРАНИЦЫ ----------------------- */
$print='';
$dir=$_SERVER['DOCUMENT_ROOT'].'/local/pages';
$files=scandir($dir);
$pages=[];
foreach ($files as $file)
    if (preg_match('/\.html$/si',$file))
        $pages[]=$file;

if (isset($_REQUEST['send'])) {
    $p=intval($_REQUEST['page']);
    if (isset($pages[$p])) {
        $mail = new mailer($_REQUEST['name']);
        if ($app['smtp'])
            $mail->setSMTP($app['smtp']['server'], $app['smtp']['port'], $app['smtp']['user'], $app['smtp']['password']);
        $html = file_get_contents($dir.'/'.$pages[$p]);
        $send=$mail->send($_REQUEST['to'], $_REQUEST['subject'], $html, $dir);
    }
}

if (isset($send))
    $page[($send===true?'success':'error').'_msg']=$send===true?'Сообщение успешно отправлена.':'Произошла ошибка: "'.$mail->ErrorInfo.'"';

$get=function ($str) {
     return $str;
};
$print.= <<<START
       <form class="form-horizontal" action="?" method="post">
            <div class="form-group">
                <label class="col-md-4 control-label">Имя:</label>
                <div class="col-md-8">
                    <input type="text" name="name" value="{$get(@$_REQUEST['name'])}" class="form-control" placeholder=""/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Получатель:</label>
                <div class="col-md-8">
                    <input type="text" name="to" value="{$get(@$_REQUEST['to'])}" class="form-control" placeholder=""/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Тема:</label>
                <div class="col-md-8">
                    <input type="text" name="subject" value="{$get($_REQUEST['subject'])}" class="form-control" placeholder=""/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Сообщение (html страница):</label>
                <div class="col-md-8">
                    <select name="page" size="1" class="form-control">
                    <option value="-1"> выбрать </option>
START;
foreach ($pages as $k=>$p)
    $print.=  '<option value="'.$k.'"'.((isset($_REQUEST['page']) && $_REQUEST['page']==$k)?' selected':'').'>'.$p.'</option>';

$print.=  <<<START
                    </select>
                </div >
            </div >

            <div class="form-group" >
                <div class="col-md-12" style="text-align: right;">
                    <button type = "submit" class="btn btn-primary" name = "send" style="width:150px;">Отправить</button >
                </div >
            </div >
        </form >
START;


/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>
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
