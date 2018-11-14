<?php
namespace App\Services;

use App\Models\Api;
class EgService {

    protected $url;
    protected $merchant_code;
    protected $api_id;
    protected $api_key;
    protected $platformCode;
    protected $api_username;
    protected $password;

    public function __construct()
    {
        $mod = Api::where('api_name', 'EG')->first();
        $this->url = $mod->api_domain;
        $this->merchant_code = $mod->api_token;
        $this->api_id = $mod->api_id;
        $this->api_key = $mod->api_key;
        $this->platformCode = $mod->api_name;
        $this->password = $mod->api_password;
        $this->api_username= $mod->api_username;
        $this->lang = 'CNY';

    }

    public function common()
    {
        return [
            'Common' => [
                'token' => md5($this->api_username.$this->api_key),
                'site_code' => $this->api_id,
                'at_username' => $this->api_username
            ]
        ];
    }

    public function register($username,$password){

        $url = "http://".$this->url."/api/CreateOrCheckAccout";
        $data = [
            'Common' => $this->common()['Common'],
            'Data' => [
                'username' => $username,
                'password' => md5(md5($password)),
                'currency' => $this->lang
            ]
        ];

        $data = json_encode($data);
        $receive = $this->send_post($url,$data);
        return $receive;
    }

    public function balance($username,$password){
        $url = "http://".$this->url."/api/GetBalance";

        $data = [
            'Common' => $this->common()['Common'],
            'Data' => [
                'username' => $username,
                'password' => md5(md5($password)),
            ]
        ];
        $data = json_encode($data);
        $receive = $this->send_post($url,$data);
        return $receive;
    }

    public function transfer($username,$password,$money,$type = 'IN')
    {
        $url = "http://".$this->url."/api/TransferCredit";

        $data = [
            'Common' => $this->common()['Common'],
            'Data' => [
                'username' => $username,
                'password' => md5(md5($password)),
                'Money' => (int)$money,
                'Method' => $type
            ]
        ];
        $data = json_encode($data);
        $receive = $this->send_post($url,$data);
        return $receive;
    }


    public function login($username,$password, $fc_id, $device = 0){
        $url = "http://".$this->url."/api/ForwardGame";

        $data = [
            'Common' => $this->common()['Common'],
            'Data' => [
                'username' => $username,
                'password' => md5(md5($password)),
                'lang' => $this->lang,
                'device' => (int)$device,
                'fc_id' => $fc_id
            ]
        ];
        $data = json_encode($data);
        $receive = $this->send_post($url,$data);
        return $receive;
    }


    public function betrecord($startTime,$endTime,$fc_type,$fc_id = 0,$page,$pagesize = 500)
    {
        $url = "http://".$this->url."/api/BetRecord";

        $data = [
            'Common' => $this->common()['Common'],
            'Data' => [
                'stime' => $startTime,
                'etime' => $endTime,
                'fc_type' => $fc_type,
                'fc_id' => $fc_id,
                'page' => $page,
                'ppage' => $pagesize
            ]
        ];
        $data = json_encode($data);
        $receive = $this->send_post($url,$data);
        return $receive;
    }

    /*
    * 商户余额查询
    */
    public function credit(){

    }


    protected function send_post($url,$post_data) {
        $result = (new CurlService())->post($url, $post_data);

        return $result;
    }
}