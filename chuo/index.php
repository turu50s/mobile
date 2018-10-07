<?php
$date = getdate();
$day  = $date["mday"];

$path = '.' .PATH_SEPARATOR. '../../PEAR';
ini_set('include_path',get_include_path() .PATH_SEPARATOR. $path);
ini_set('error_reporting', E_ALL & ~E_STRICT);

require_once('Net/UserAgent/Mobile.php');
require_once('HTTP.php');

$agent = Net_UserAgent_Mobile::singleton(); 
 
if ($agent->isDoCoMo()) {
    HTTP::redirect("i-mode.php");  
} elseif ($agent->isVodafone()) {
    HTTP::redirect("sb.php");  
} elseif ($agent->isEZweb()) {
    HTTP::redirect("au.php");  
} elseif ($agent->isWILLcom()) {
    HTTP::redirect("i-mode.php");
} else {
    $ag = $agent->getUserAgent();
    if ((preg_match('/iPhone/',$ag)) || (preg_match('/iPad/',$ag))) {
   	    HTTP::redirect("fon-i.php");
    } elseif (preg_match('/Android/',$ag)){
        HTTP::redirect("fon.php");
    } else {
//      echo "当サイトは携帯専用です。\n";
        HTTP::redirect("fon.php");
    }
}
?>