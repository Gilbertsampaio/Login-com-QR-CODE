<?php
/*ESSA É A PÁGINA RESTRITA QUE SÓ É POSSÍVEL ACESSAR SE EXISTIR UMA SESSÃO ABERTA*/
ini_set('default_charset','UTF-8');
include "conexao.php";
session_start();

if(isset($_SESSION['id'])){

  $email    = $_SESSION['email'];
  $senha    = $_SESSION['senha'];
  $senha_descrypt    = $_SESSION['senha_descrypt'];
  $nome     = $_SESSION['nome'];
  $sobrenome  = $_SESSION['sobrenome'];
  $nickname   = $_SESSION['nickname'];
  $frase    = $_SESSION['frase'];
  $foto     = $_SESSION['foto'];
  $last_login = $_SESSION['last_login'];
  $id     = $_SESSION['id'];
  $ddd     = $_SESSION['ddd'];
  $telefone     = $_SESSION['telefone'];

} else {

  header("location: index.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Página Administrativa - PROFILE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{
    margin-top:20px;
    background:#f5f5f5;
}
/**
 * Panels
 */
/*** General styles ***/
.panel {
  box-shadow: none;
}
.panel-heading {
  border-bottom: 0;
}
.panel-title {
  font-size: 17px;
}
.panel-title > small {
  font-size: .75em;
  color: #999999;
}
.panel-body *:first-child {
  margin-top: 0;
}
.panel-footer {
  border-top: 0;
}

.panel-default > .panel-heading {
    color: #333333;
    background-color: transparent;
    border-color: rgba(0, 0, 0, 0.07);
}

/**
 * Profile
 */
/*** Profile: Header  ***/
.profile__avatar {
  float: left;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  margin-right: 20px;
  overflow: hidden;
}
@media (min-width: 768px) {
  .profile__avatar {
    width: 100px;
    height: 100px;
  }
}
.profile__avatar > img {
  width: 100%;
  height: auto;
}
.profile__header {
  overflow: hidden;
}
.profile__header p {
  margin: 20px 0;
}
/*** Profile: Table ***/
@media (min-width: 992px) {
  .profile__table tbody th {
    width: 200px;
  }
}
/*** Profile: Recent activity ***/
.profile-comments__item {
  position: relative;
  padding: 15px 16px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}
.profile-comments__item:last-child {
  border-bottom: 0;
}
.profile-comments__item:hover,
.profile-comments__item:focus {
  background-color: #f5f5f5;
}
.profile-comments__item:hover .profile-comments__controls,
.profile-comments__item:focus .profile-comments__controls {
  visibility: visible;
}
.profile-comments__controls {
  position: absolute;
  top: 0;
  right: 0;
  padding: 5px;
  visibility: hidden;
}
.profile-comments__controls > a {
  display: inline-block;
  padding: 2px;
  color: #999999;
}
.profile-comments__controls > a:hover,
.profile-comments__controls > a:focus {
  color: #333333;
}
.profile-comments__avatar {
  display: block;
  float: left;
  margin-right: 20px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
}
.profile-comments__avatar > img {
  width: 100%;
  height: auto;
}
.profile-comments__body {
  overflow: hidden;
}
.profile-comments__sender {
  color: #333333;
  font-weight: 500;
  margin: 5px 0;
}
.profile-comments__sender > small {
  margin-left: 5px;
  font-size: 12px;
  font-weight: 400;
  color: #999999;
}
@media (max-width: 767px) {
  .profile-comments__sender > small {
    display: block;
    margin: 5px 0 10px;
  }
}
.profile-comments__content {
  color: #999999;
}
/*** Profile: Contact ***/
.profile__contact-btn {
  padding: 12px 20px;
  margin-bottom: 20px;
}
.profile__contact-hr {
  position: relative;
  border-color: rgba(0, 0, 0, 0.1);
  margin: 40px 0;
}
.profile__contact-hr:before {
  content: "OU";
  display: block;
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: #f5f5f5;
  color: #c6c6cc;
}
.profile__contact-info-item {
  margin-bottom: 30px;
}
.profile__contact-info-item:before,
.profile__contact-info-item:after {
  content: " ";
  display: table;
}
.profile__contact-info-item:after {
  clear: both;
}
.profile__contact-info-item:before,
.profile__contact-info-item:after {
  content: " ";
  display: table;
}
.profile__contact-info-item:after {
  clear: both;
}
.profile__contact-info-icon {
  float: left;
  font-size: 18px;
  color: #999999;
}
.profile__contact-info-body {
  overflow: hidden;
  padding-left: 20px;
  color: #999999;
}
.profile__contact-info-body a {
  color: #999999;
}
.profile__contact-info-body a:hover,
.profile__contact-info-body a:focus {
  color: #999999;
  text-decoration: none;
}
.profile__contact-info-heading {
  margin-top: 2px;
  margin-bottom: 5px;
  font-weight: 500;
  color: #999999;
}    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">
<div class="row">
      <div class="col-xs-12 col-sm-9">
        
        <!-- User profile -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Perfil do Usuário</h4>
          </div>
          <div class="panel-body">
            <div class="profile__avatar">
              <img src="img/<?php echo $foto; ?>" alt="<?php echo $nome; ?> <?php echo $sobrenome; ?>">
            </div>
            <div class="profile__header">
              <h4><?php echo $nome; ?> <?php echo $sobrenome; ?> <small>Administrador</small></h4>
              <p class="text-muted">
                <?php echo $frase; ?>
              </p>
              <p>
                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
              </p>
            </div>
          </div>
        </div>

        <!-- User info -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Informações do Usuário</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>Nome</strong></th>
                  <td><?php echo $nome; ?></td>
                </tr>
                <tr>
                  <th><strong>Sobrenome</strong></th>
                  <td><?php echo $sobrenome; ?></td>
                </tr>
                <tr>
                  <th><strong>Nickname</strong></th>
                  <td><?php echo $nickname; ?></td>
                </tr>
                <tr>
                  <th><strong>Telefone</strong></th>
                  <td>(<?php echo $ddd; ?>) <?php echo $telefone; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Community -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Dados de acesso</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>Último acesso</strong></th>
                  <td><?php echo date("d/m/Y H:i:s", strtotime($last_login)); ?></td>
                </tr>
                <tr>
                  <th><strong>E-mail</strong></th>
                  <td><?php echo $email; ?></td>
                </tr>
                <tr>
                  <th><strong>Senha</strong></th>
                  <td><?php echo substr("$senha_descrypt", 0, -4) . '&#9679;&#9679;&#9679;&#9679;'; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Latest posts -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Resumo das Informações</h4>
          </div>
          <div class="panel-body">
            <div class="profile__comments">
              <div class="profile-comments__item">
                <div class="profile-comments__controls">
                  <a href="#"><i class="fa fa-share-square-o"></i></a>
                  <a href="#"><i class="fa fa-edit"></i></a>
                  <a href="#"><i class="fa fa-trash-o"></i></a>
                </div>
                <div class="profile-comments__avatar">
                  <img src="img/<?php echo $foto; ?>" alt="...">
                </div>
                <div class="profile-comments__body">
                  <h5 class="profile-comments__sender">
                    <?php echo $nome; ?> <?php echo $sobrenome; ?> <small><?php echo $email; ?></small>
                  </h5>
                  <div class="profile-comments__content">
                    <?php echo $frase; ?>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>

      </div>
      <div class="col-xs-12 col-sm-3">
        
        <!-- Contact user -->
        <p>
          <a href="logout.php?id=<?php echo $id; ?>" class="profile__contact-btn btn btn-lg btn-block btn-info">
            Sair do Sistema
          </a>
        </p>

        <hr class="profile__contact-hr">

        <p>
          <a onclick="window.open('https://<?php echo $dispositivo; ?>.whatsapp.com/send?phone=+55<?php echo $ddd; ?><?php echo $telefone; ?>&text=Olá, eu me chamo <?php echo $nome; ?> <?php echo $sobrenome; ?>'); return false;" class="profile__contact-btn btn btn-lg btn-block btn-success">
            Enviar WhatsApp
          </a>
        </p>
        
        <!-- Contact info -->
        <!--<div class="profile__contact-info">
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work number</h5>
              (000)987-65-43
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Mobile number</h5>
              (000)987-65-43
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              <a href="mailto:admin@domain.com">admin@domain.com</a>
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work address</h5>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </div>
          </div>
        </div>-->

      </div>
    </div>
</div>	
<script type="text/javascript">
  
$('#show_password').hover(function(e) {
      e.preventDefault();
    if ($("#password").attr("type") == "password") {
        $("#password").attr("type", "text");
        $('#show_password').attr("class", 'fa fa-eye');

    } else {
        $("#password").attr("type", "password");
        $('#show_password').attr("class", 'fa fa-eye-slash');
    }
});

</script>
</body>
</html>
