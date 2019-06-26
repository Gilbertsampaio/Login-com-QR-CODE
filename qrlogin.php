<?php  
ini_set('default_charset','UTF-8'); 
session_start();

$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = 'temp/';
include "qrlib.php";    
$filename = $PNG_TEMP_DIR.'test.png';
$errorCorrectionLevel = 'H';
$matrixPointSize = 3.5;


$email = $_GET['email'];
$senha = sha1($_GET['senha']);

$loginpost = "http://www.carlospiller.adv.br/phpqrcode/logar_mobile.php?email=".$email."&senha=".$senha;
QRcode::png($loginpost, $filename, $errorCorrectionLevel, $matrixPointSize, 4); 

echo "<span class='codigo'><div style='margin:10px 0 20px 0; font-size:14px'>Acesse: www.site.com.br/autentica.php e escaneie o código abaixo.</div><img style='width:200px; height:200px' src='".$PNG_WEB_DIR.basename($filename)."'/><div style='padding:10px 0 15px 0;cursor:pointer'><span class='state' onClick='novoLogin()'>Novo Login</span></div></span>";
?>