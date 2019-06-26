$(document).ready(function(){

	$('#formlogin').submit(function(){
	
		var email=$('#email').val();
		var senha=$('#senha').val();
		var working = false;	
		$.ajax({			
			url:"logar.php",			
			type:"post",				
			data: "email="+email+"&senha="+senha,	
			success: function (result){			
								
				if(result==1){	
						
				  	if (working) return;
				  	working = true;
				  	var $this = $('#formlogin'),
				  	$state = $this.find('button > .state');
				  	$this.addClass('loading');
				  	$state.html('Gerando QR Code...');


					  setTimeout(function () {
					  	$state.html('');
					  	var pagina = "qrlogin.php?email="+email+"&senha="+senha;
						$state.load(pagina);
					    $this.addClass('ok');
					    $('.spinner').remove();
					    $( '.login.loading button').css('padding-top','10px');
					    $('.state').css('cursor','default');
					    $('.login').removeAttr('id');
					  }, 3000);

					  setInterval(function(){

					  	var verifica = "verifica.php?email="+email+"&senha="+senha;
						$('.verificando').load(verifica);

					  }, 3000);

					
					$('input#email').val("");
					$('input#senha').val("");

				}
				
				if(result==2){
					
						$(".alerta").html('<span style="color:red; font-size:12px">* Informe o E-mail</span>').fadeIn(300);
						$('input#senha').val("");
						$('input#email').focus();
						return false;
				}

				if(result==3){
					
						$(".alerta").html('<span style="color:red; font-size:12px">* Informe um E-mail válido</span>').fadeIn(300);
						$('input#email').val("");
						$('input#senha').val("");
						$('input#email').focus();
						return false;
				}

				if(result==4){
					
						$(".alerta").html('<span style="color:red; font-size:12px">* Informe a Senha</span>').fadeIn(300);
						$('input#senha').focus();
						return false;
				}

				if(result==5){
					
						$(".alerta").html('<span style="color:red; font-size:12px">* Dados incorretos!</span>').fadeIn(300);
						$('input#email').val("");
						$('input#senha').val("");
						$('input#email').focus();
						return false;
				}
			}
		})
	return false;	
	})
})