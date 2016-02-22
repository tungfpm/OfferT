<?php
require_once "checkip.php";
$ip=  getRealIPAddress();
function ip_details($ip) {
    if(!filter_var($ip, FILTER_VALIDATE_IP)) {
        return array();
    }
    $json = file_get_contents("http://ipinfo.io/{$ip}");
    $details = json_decode($json);
    return $details;
}
echo $ip;
var_dump(ip_details($ip));
?>