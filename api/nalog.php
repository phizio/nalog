<?php
/**
 * Created by PhpStorm.
 * User: SANEK333
 * Date: 13.10.2015
 * Time: 15:22
 */
namespace AlexKonov;

class Parser
{
    public function __construct()
    {

    }

    public function load($url, $headers = [], $printheaders = false, $nobody = false, $cookie = false, $post = false)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($cookie)
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_NOBODY, $nobody);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, $printheaders);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

class ParserNalog extends Parser
{
    private
        $_url = 'https://service.nalog.ru/uwsfind.do',
        $_headers = [],
        $_SID;

    public function __construct()
    {
        parent::__construct();
        $this->_headers = [
            'User-Agent: ' . $_SERVER['HTTP_USER_AGENT'],
            'Accept: ' . $_SERVER['HTTP_ACCEPT'],
            'Accept-Language: ru-RU,ru;q=0.9,en;q=0.8',
            'Accept-Charset: iso-8859-1, utf-8, utf-16, *;q=0.1',
            'Accept-Encoding: deflate',
            'Cache-Control: no-cache',
            'Connection: Keep-Alive'
        ];
    }

    private function _loadSID($data = false)
    {
        if (!$data)
            $data = $this->load($this->_url, $this->_headers, true, true);
        preg_match('/JSESSIONID=([^;]+);/s', $data, $result);
        $this->_SID = $result[1];
    }

    public function getData($nptype = 'ul', $ogrn = '', $ogrnip = '', $name = '', $frm = '', $frmip = '', $ifns = '', $dtform = '', $dtto = '')
    {
        if (!$this->_SID)
            $this->_loadSID();
        $data = $this->load($this->_url . ';jsessionid=' . $this->_SID, $this->_headers, false, false, 'JSESSIONID=' . $this->_SID,
            'nptype=' . $nptype . '&ogrn=' . $ogrn . '&ogrnip=' . $ogrnip . '&name=' . $name . '&frm=' . $frm . '&frmip=' . $frmip . '&ifns=' . $ifns
            . '&dtform=' . $dtform . '&dtto=' . $dtto);
        $this->_loadSID($data);
        return $this->parseData($data);
    }

    public function parseData($data)
    {
        preg_match('/<table id="uwsdata" class="grid">(.*?)<\/table>/siu', $data, $tmp);
        $data = $tmp[1];
        preg_match_all('/<th>([^<]+)<\/th>/siu', $data, $tmp);
        $titles=$tmp[1];
        $values=[];
        $data=preg_replace('/<thead>(.*?)<\/thead>/si','',$data);
        preg_match_all('(<tr>(.*?)<\/tr>)', $data, $tmp);
        foreach ($tmp[1] as $v) {
            preg_match_all('/<td>(.*?)<\/td>/siu', $v, $tmp2);
            $values[]=$tmp2[1];
        }
        return ['title'=>$titles, 'data'=>$values];
    }

}

header('Content-type:text/plain; charset=utf8');
$p = new ParserNalog();

print_r($p->getData('ul', '1136318003975'));