<?php
function curlPost($url, $data, $timeout = 30)
{
    $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
    $ch = curl_init();
    $opt = array(
            CURLOPT_URL     => $url,
            CURLOPT_POST    => 1,
            CURLOPT_HEADER  => 0,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT         => $timeout,
            );
    if ($ssl)
    {
        $opt[CURLOPT_SSL_VERIFYHOST] = 1;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
    }
    curl_setopt_array($ch, $opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function curlPostJson($url, $data, $timeout = 30)
{
    $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
    $ch = curl_init();
    $opt = array(
            CURLOPT_URL     => $url,
            CURLOPT_POST    => 1,
            CURLOPT_HEADER  => 0,
            CURLOPT_POSTFIELDS      => $data,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT         => $timeout,
			CURLOPT_HTTPHEADER		=>array(  
				'Content-Type: application/json; charset=utf-8',  
				'Content-Length: '.strlen($data) ),
            );
    if ($ssl)
    {
        $opt[CURLOPT_SSL_VERIFYHOST] = 1;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
    }
    curl_setopt_array($ch, $opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}


function curlGet($url, $data, $timeout = 30)
{
    $ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;
    $ch = curl_init();
    $opt = array(
            CURLOPT_URL     => $url."?".$data,
            CURLOPT_POST    => 0,
            CURLOPT_HEADER  => 0,
            CURLOPT_RETURNTRANSFER  => 1,
            CURLOPT_TIMEOUT         => $timeout,
            );
    if ($ssl)
    {
        $opt[CURLOPT_SSL_VERIFYHOST] = 1;
        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
    }
    curl_setopt_array($ch, $opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

?>