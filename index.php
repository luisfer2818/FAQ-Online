<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login | FAQ Online</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/faq.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/toastr/jquery.toast.min.css">
<!--===============================================================================================-->

</head>
<body>
	
<!--===============================================================================================-->
							<!-- LOGIN -->
<!--===============================================================================================-->

<div id="login" class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<!-- <div class="login100-pic js-tilt" data-tilt> -->
				<!-- <img src="images/323.jpg" alt="IMG"> -->
			<!-- </div> -->

			<form id="form-login" class="login100-form validate-form" action="controller/autentica.php" method="POST">
				<span class="login100-form-title">
					Login
				</span>
				<!-- <div class="alert alert-danger" style="display: none;"> -->
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
                            		<!-- <span aria-hidden="true">&times;</span> -->
                        	<!-- </button> -->
                        	<!-- <i class="fa fa-exclamation-circle"></i> <strong></strong> -->
				<!-- </div> -->
				<div class="wrap-input100 validate-input" data-validate = "Digite um e-mail">
					<input class="input100" type="email" id="email" name="email" placeholder="E-mail">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Digite uma senha">
					<input class="input100" type="password" id="senha" name="senha" placeholder="Senha">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">Entrar<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
				</div>
				<div class="text-center p-t-136">
					<a id="nova-conta" class="txt2" href="#">
						Criar nova conta
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>

<!--===============================================================================-->
					<!-- CADASTRO -->
<!--===============================================================================-->

<div id="cadastro" class="limiter" style="display:none;">
	<div class="container-login100">
		<div class="wrap-login100">
			<!-- <div class="login100-pic js-tilt" data-tilt> -->
				<!-- <img src="images/323.jpg" alt="IMG"> -->
			<!-- </div> -->

			<form id="form-cadastro" class="login100-form validate-form" action="" method="POST">
				<input type="hidden" name="action">
				<span class="login100-form-title">
					Cadastro
				</span>
				<div class="wrap-input100 validate-input" data-validate = "Digite o nome">
					<input class="input100" type="text" id="nome" name="nome" placeholder="Nome">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Digite algum e-mail">
					<input class="input100" type="text" id="cad-email" name="email" placeholder="E-mail">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Digite alguma senha">
					<input class="input100" type="password" id="cad-senha" name="senha" placeholder="Senha">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">Salvar<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
				</div>
				<div class="text-center p-t-136">
					<a id="realiza-login" class="txt2" href="#">
						<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						Realizar login
					</a>
				</div>
			</form>
		</div>
	</div>
</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/toastr/jquery.toast.min.js"></script>
<!--===============================================================================================-->
	<script>

	$(document).ready(function() {
		$('.js-tilt').tilt({
			scale: 1.2
		});

	
		//MENSAGEM - CONFIGURAÇÃO DO TOASTR(POPUP -> NOTIFICAÇÃO)
		function message(type, msg) {
			if (msg) {
			//CONFIG MENSAGEM
			toastr.options = {
				//"closeButton": true,
				"closeButton": true,
				"newestOnTop": true,
				"progressBar": true,
				"showDuration": "600",
				"progressBar": true,
				"hideDuration": "500",
				"timeOut": "3000",
				"extendedTimeOut": "1000",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut",
				"positionClass": "toast-top-center",
			}
			}
			//EXIBE MENSAGEM
			Command:toastr[type]('<strong>'+msg+'</strong>');
		}

			$('#form-login').unbind('submit').submit(function(e) {
				e.preventDefault();

				let email = $('#email').val();
				let senha = $('#senha').val();

				if (!email){
				return message('error', 'Campo Email vazio!');
				}
				if (!senha){
				return message('error', 'Campo Senha vazio!');
				}
				
				//MANDA O AJAX DE LOGIN
				$.ajax({
					method:'POST',
					url: 'controller/autentica.php',
					data: $(this).serialize(),
					dataType:'json',
					success: function(json) {
						if (json.type == 'success') {
							if (json.tipoUsuarioLogado == 'A') {
								window.location.href = "./views/template.php";
							}
							if (json.tipoUsuarioLogado == 'U') {
								window.location.href = "./views/ViewFaq/faq.php";
							}
						} else {
							return message('error', json.msg);
						}
					}
				})				
			});

			$('#form-cadastro').unbind('submit').submit(function(e) {
				e.preventDefault();
				
				$('[name="action"]').val('inserirUser');

				let nome = $('#nome').val();
				let email = $('#cad-email').val();
				let senha = $('#cad-senha').val();

				if (!nome){
				return message('error', 'Campo Nome vazio!');
				}
				if (!email){
				return message('error', 'Campo Email vazio!');
				}
				if (!senha){
				return message('error', 'Campo Senha vazio!');
				}

				$.ajax({
					method:'POST',
					url: 'controller/crud.php',
					data: $(this).serialize(),
					dataType:'json',
					success: function(json) {
						if (json.type == 'success') {							
							$('#form-cadastro')[0].reset()
							setTimeout(() => {
								$('#cadastro').css('display', 'none');
								$('#login').css('display', 'block');
							}, 3200);	
							return message('success', json.msg);						
						} else {
							return message('error', json.msg);
						}
					}
				})
			});

		$('#nova-conta').unbind('click').click(function() {
			$('#login').css('display', 'none');
			$('#cadastro').css('display', 'block');
			$('.alert-danger').css('display', 'none');
		});

		$('#realiza-login').unbind('click').click(function() {
			$('#cadastro').css('display', 'none');
			$('#login').css('display', 'block');
		});
	});
	</script>
	<script src="js/main.js"></script>

</body>
</html>