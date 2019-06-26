<?php
include_once('conexao.php');

$id = $_GET['id'];

$sql = mysqli_query($connect,"UPDATE users SET login_status = '0' WHERE id = $id");

session_start();
session_unset();
session_destroy(); 

session_start();

header("Location: index.php");
exit;  
?>