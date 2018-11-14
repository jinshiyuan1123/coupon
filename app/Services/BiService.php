<?php
namespace App\Services;

use App\Models\Api;
use App\Services\CurlService;
class BiService{

    protected $url;
    protected $merchant_code;
    protected $desKey;
    protected $signKey;
    protected $platformCode;
    protected $encode_url;
    protected $password;

    public function __construct()
    {
        $mod = Api::where('api_name', 'BI')->first();
        $this->url = $mod->api_domain;
        $this->merchant_code = $mod->api_token;
        $this->desKey = $mod->api_id;
        $this->signKey = $mod->api_key;
        $this->platformCode = $mod->api_name;
        $this->password = $mod->api_password;
        $this->encode_url= $mod->api_username;

    }

    public function register($platformCode, $username)
    {
        $t = time();
        $str_check = "platformCode=" . $platformCode . '&userName=' . $username .'&userPassWord='.$this->password .'&TimeStamp='.$t;
        $data = [
            'str' => $str_check,
            'key' => $this->desKey
        ];
        $str_encheck = $this->send_post($this->encode_url.'/2Aov8hIFD/', $data);
        $url = 'http://'.$this->url.'/Api/Register?parameter=' . $str_encheck . '&WebSiteCode=' . $this->signKey;
        $res = $this->https_request($url);

        return $res;
    }

    public function zzmoney($game,$username,$type,$money)
    {
        $t = time();
        $s = "platformCode=" . $game . '&userName=' . $username . '&transferType=' . $type . '&credit=' . $money.'&TimeStamp='.$t;
        //$urlen = ($this->encode($data, $this->desKey));

        $data = [
            'str' => $s,
            'key' => $this->desKey
        ];
        //$en_url = $this->encode_url."?str=$str_check&key=$this->desKey";
        $pp = $this->send_post($this->encode_url.'/2Aov8hIFD/', $data);

        $url = 'http://'.$this->url.'/Api/Transfer?parameter=' . $pp . '&WebSiteCode=' . $this->signKey;

        $res = $this->https_request($url);

        return $res;
    }

    //查询余额
    public function balances($game,$username)
    {
        $t=time();
        $s = 'platformCode='.$game.'&userName='.$username.'&userPassWord='.$this->password.'&TimeStamp='.$t;

        $data = [
            'str' => $s,
            'key' => $this->desKey
        ];
        $pp = $this->send_post($this->encode_url.'/2Aov8hIFD/', $data);

        $url='http://'.$this->url.'/Api/GetUserBalance?parameter='.$pp.'&WebSiteCode='.$this->signKey;
        $res=$this->https_request($url);

        return $res;
    }

    //登录
    public function loginbi($game,$username,$gametype=null,$devices=null,$gameId = null, $gameName = null)
    {
        $t= time();
        if ($devices == null && $this->isMobile())
            $devices = 1;
        $str = 'platformCode='.$game.'&userName='.$username.'&userPassWord='.$this->password.'&TimeStamp'.$t;
        //
        if ($gametype ==0 || $gametype != null)
            $str .= '&gameType='.$gametype;
        //
        if ($devices != 0)
            $str .= '&devices='.$devices;
        //
        if ($gameId != null)
            $str .='&gameId='.$gameId;
        //
        if ($gameName != null)
            $str .='&gameName='.$gameName;

        $data = [
            'str' => $str,
            'key' => $this->desKey
        ];

        $pp = $this->send_post($this->encode_url.'/2Aov8hIFD/', $data);

        $url='http://'.$this->url.'/Api/Login?parameter='.$pp.'&WebSiteCode='.$this->signKey;

        return $url;
    }

    public function playGame($platformCode, $username, $GameType = null)
    {
        $t=time();
        $str = 'platformCode='.$platformCode.'&userName='.$username.'&userPassWord='.$this->password.'&TimeStamp='.$t.'&GameType='.$GameType;
        $data = [
            'str' => $str,
            'key' => $this->desKey
        ];

        $pp = $this->send_post($this->encode_url.'/2Aov8hIFD/', $data);

        $url='http://'.$this->url.'/Api/PlayGame?parameter='.$pp.'&WebSiteCode='.$this->signKey;

        return $url;

    }

    //下注记录
    public function GetMerchantReport($platformCode, $StartTime, $EndTime, $PageIndex, $PageSize, $TimeStamp) {
        $Str = "platformCode=" . $platformCode . "&StartTime=" . $StartTime . "&EndTime=" . $EndTime . "&TimeStamp=" . $TimeStamp . "&PageIndex=" . $PageIndex . "&PageSize=" . $PageSize . "";

        $data = [
            'str' => $Str,
            'key' => $this->desKey
        ];
        $DesStr = $this->send_post($this->encode_url.'/2Aov8hIFD/', $data);

        $url = 'http://report.gebbs.net/QueryApi/GetMerchantReport?parameter=' . $DesStr . '&WebSiteCode=' . $this->signKey;
        $data_array = $this->https_request($url);
        return $data_array;
    }

    // 商户余额
    public function BusinessBalance(){
        $url='http://'.$this->url.'/Api/BusinessBalance?WebSiteCode='.$this->signKey;
        $Business_data= $this->https_request($url);
        return $Business_data;
    }


    public function https_request($url,$data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        if (!empty($data))
        {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

       $output = curl_exec($curl);

        curl_close($curl);
        //$output=json_decode($output,true);
        return $output;
    }

    //判断是否手机
    function isMobile()
    {
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        if (isset ($_SERVER['HTTP_VIA']))
        {
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array ('nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }

    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }

}