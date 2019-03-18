<?php 
namespace BitLy;

class BitLyApi
{
    private $_login;
    private $_key;
    private $_format;

    public function __construct($login, $key)
    {
        $this->_login = $login;
        $this->_key = $key;
        $this->_format = 'txt';
    }

    private function connect($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);
        $parse = parse_url($data);

        if ( isset($parse['host']) )
        return trim($data);
        else
        return '';
    }

    public function getLink($url)
    {
        $connection = $this->setUrlConnection($url);
        return $this->connect($connection);        
    }

    private function setUrlConnection($url)
    {
        return 'http://api.bit.ly/v3/shorten?login=' . $this->_login . '&apiKey=' . $this->_key . '&uri=' . urlencode($url) . '&format=' . $this->_format;
    }
}