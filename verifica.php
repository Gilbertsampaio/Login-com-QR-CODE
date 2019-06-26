<?php
/*ESSE ARQUIVO FAZ A VERIFICAÇÃO SE O STATUS DO USUÁRIO ESTÁ COM O VALOR "1", QUE SIGNIFICA QUE ELE ESTÁ LOGADO NO SISTEMA.*/  
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();

$email = $_GET['email'];
$senha = sha1($_GET['senha']);

$sql = mysqli_query($connect,"select * from users where email='".$email."' and senha='".$senha."' and login_status = '1'");
if(mysqli_num_rows($sql) > 0){

	echo '<script language="JavaScript">window.location="restrito.php";</script>';

}
?>