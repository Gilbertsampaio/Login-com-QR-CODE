<?php
/*ESSA PÁGINA RECEBE OS DADOS DO ESCANEAMENTO DO QR CODE. FAZ A VERIFICAÇÃO NO BANCO DE DADOS SE JÁ EXISTE UMA SESSÃO INCIADA PARA ESSE USUÁRIO.*/
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();

$email = $_GET['email'];
$senha = $_GET['senha'];

$sql = "select * from users where email='".$email."' and senha='".$senha."' and login_status = '0'"; 
$resultados = mysqli_query($connect,$sql)or die (mysqli_error());
$res = mysqli_fetch_array($resultados); 

/*A CONDIÇÃO ABAIXO SIGNIFICA QUE SE EXISTIR NO BANCO DE DADOS UM USUÁRIO COM O EMAIL E A SENHA DIGITADA E QUE O STATUS DO LOGIN SEJA "0", ELE FAZ O UPDATE DO STATUS DO USUÁRIO PARA O VALOR "1" E CRIA A SESSÃO.*/
if (mysqli_num_rows($resultados) > 0){

	/*PEGA O ID DO USUÁRIO DONO DO EMAIL E SENHA*/
	$id = $res['id'];

	/*REALIZA O UPDATE NO BANCO*/
	mysqli_query($connect,"UPDATE users SET login_status = '1' WHERE id = '$id'");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>CodePen - Animated login form</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
      body {
  font-family: "Open Sans", sans-serif;
  height: 100vh;
  background: url("https://i.imgur.com/HgflTDf.jpg") 50% fixed;
  background-size: cover;
}


* {
  box-sizing: border-box;
}

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
  background: rgba(4, 40, 68, 0.85);
}

.alerta {
  border-radius: 2px 2px 5px 5px;
  padding: 10px 20px 20px 20px;
  width: 100%;
  height: 700px;
  max-width: 90%;
  position: relative;
  padding-bottom: 20px;
  border: 0px solid rgba(0, 0, 0, 0.1);
  border-radius: 5px 5px 5px 5px;
  border-bottom-width: 7px;
  text-align: center;
}

.sucesso {
  background-color: #8bc34a;
}

.erro {
  background-color: #CD0000;
}

.title {
  position: relative;
  top: 50px;
  color: #fff;
  font-size: 60px;
  font-weight: bold;
  border-bottom: 1px solid #;
  padding-bottom: 20px;
  padding-top: 20px;
  text-align: center;
  /*white-space: nowrap;*/
}
.alerta i {
  position: absolute;
  left: 45%;
  top: 45%;
  margin-left: -15%;
  margin-top: -15%;
  color: #fff;
  font-size: 450px
}


footer {
  display: block;
  padding-top: 50px;
  text-align: center;
  color: #ddd;
  font-weight: normal;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.2);
  font-size: 50px;
}
footer a, footer a:link {
  color: #fff;
  text-decoration: none;
}

    </style>

</head>
<body>
<div class="wrapper">
	<div class="alerta <?php if (mysqli_num_rows($resultados) > 0){ echo 'sucesso'; } else { echo 'erro'; }?>">
		<span class="title"><?php if (mysqli_num_rows($resultados) > 0){ echo 'Login realizado com sucesso!'; } else { echo 'Existe uma sessão Ativa!'; }?></span>
		<i class="fa fa-<?php if (mysqli_num_rows($resultados) > 0){ echo 'check'; } else { echo 'times'; }?>"></i>
	</div>
<footer><a href="#">Fechar a janela</a></footer>
</div>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="login.js"></script>
</body>
</html>