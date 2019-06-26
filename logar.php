<?php  
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

	if($email == ''){

		echo 2;

	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

		echo 3;

	} else {

		if($senha == ''){

			echo 4;

		} else {

			$sql = "select * from users where email='".$email."' and senha='".sha1($senha)."'"; 
			$resultados = mysqli_query($connect,$sql) or die (mysqli_error());
			$res = mysqli_fetch_array($resultados);

			if (mysqli_num_rows($resultados) > 0){

				echo 1;

	  			$_SESSION['email'] = $email;
	  			$_SESSION['senha'] = sha1($senha);
	  			$_SESSION['senha_descrypt'] = $senha;
	  			$_SESSION['nome'] = $res['nome'];
	  			$_SESSION['sobrenome'] = $res['sobrenome'];
	  			$_SESSION['nickname'] = $res['nickname'];
	  			$_SESSION['frase'] = $res['frase'];
	  			$_SESSION['foto'] = $res['foto'];
	  			$_SESSION['last_login'] = $res['last_login'];
	  			$_SESSION['id'] = $res['id'];
	  			$_SESSION['ddd'] = $res['ddd'];
	  			$_SESSION['telefone'] = $res['telefone'];

  			} else {

  				echo 5;

  			}

		}
	} 
?>