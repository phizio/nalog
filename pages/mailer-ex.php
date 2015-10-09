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
        $mail = new mailer('mailtrap.io', 2525, '4643500c521769f5b', '78aaa57f0e395d', $_REQUEST['name']);
        $images = [];
        $html = file_get_contents($dir.'/'.$pages[$p]);
        preg_match_all('/<img[^<]*src[^"]{1,}(\'|")(.*?)\\1[^>]*>/si', $html, $result);
        $result = array_unique($result[2]);
        foreach ($result as $file) {
            $cid = md5($file);
            $html = str_replace($file, 'cid:' . $cid, $html);
            $images[] = [
                'path' => $dir.'/' . $file,
                'cid' => $cid
            ];
        }
        $send=$mail->send($_REQUEST['to'], $_REQUEST['subject'], $html, $images);
    }
}

if (isset($send))
    $page['success_msg']=$send===true?'Сообщение успешно отправлена.':'Произошла ошибка.';

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
                <div class="col-md-12" >
                    <button type = "submit" class="btn btn-success" name = "send" >Отправить</button >
                </div >
            </div >
        </form >
START;


/* -------------------------- ОТОБРАЖЕНИЕ ------------------------- */?>
<style>
    div.content {
        margin:25px auto 0;
        padding:30px 0 0 0;
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
