<?php
require_once 'encryptionkeys.php';

if (!empty($_GET['key'])) {
    $logfile = fopen("datas.json", 'a+');

    $encrypted = openssl_encrypt($_GET['key'], CIPHERING, ENCRYPTION_KEY, 0, ENCRYPTION_IV);
    
    $logData = [
        get_client_ip() => $encrypted
    ];

    fwrite($logfile, json_encode($logData) . PHP_EOL);
    fclose($logfile);
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}