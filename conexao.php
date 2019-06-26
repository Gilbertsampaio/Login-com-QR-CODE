<?php 
header("Cache-Control: no-cache, must-revalidate");

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");

if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
$dispositivo='api';
} else {
$dispositivo='web';
}

$connect=mysqli_connect('localhost','root','','login_qrcode');

if ($connect) {
    mysqli_set_charset($connect, "UTF8");
}else{
    die("erro ao conectar o banco: " . mysqli_connect_error());
}

date_default_timezone_set("America/Sao_Paulo");
error_reporting(0);
?>