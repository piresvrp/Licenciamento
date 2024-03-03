<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
		<title>Compet&ecirc;ncia para o Licenciamento Ambiental</title>
		<link rel="stylesheet" href="<?=base_url('webroot/arquivos/plugins/bootstrap/css/bootstrap.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('webroot/arquivos/styles/style.min.css')?>" />
		<link rel="stylesheet" href="<?=base_url('webroot/arquivos/styles/login.css')?>" />
		<script type="text/javascript">var base_url = '<?=base_url()?>';</script>
		<script src="<?=base_url('webroot/arquivos/plugins/vue/vue.js')?>"></script>
		<script src="<?=base_url('webroot/arquivos/plugins/axios/axios.min.js')?>"></script>
		<script src="<?=base_url('webroot/arquivos/plugins/bootstrap/js/popper.js')?>"></script>
		<script src="<?=base_url('webroot/arquivos/plugins/sweetalert2/sweetalert2.all.min.js')?>"></script>
		<script src="<?=base_url('webroot/arquivos/bundles/libscripts.bundle.js')?>"></script>
		<script src="<?=base_url('webroot/arquivos/scripts/wow.min.js')?>"></script>
	</head>
	<body class="theme-blush">
		<!-- Page Loader -->
		<div class="page-loader-wrapper">
			<div class="loader">
				<img src="<?=base_url('webroot/arquivos/images/loader0.gif')?>" width="140" alt="carregando">
				<p>Por favor aguarde...</p>
			</div>
		</div>
		<div class="authentication">
			<div id="login" class="container col-sm-6 col-md-6 col-lg-3 col-12 fas fa-lock wow fadeIn" data-wow-duration="3s" data-wow-offset="2" data-wow-iteration="2">
				<form class="card auth_form">
					<div class="header">
						<img class="img-responsive" src="<?=base_url('webroot/arquivos/images/barra-dnit.png');?>" alt="">
						<h5>Licen&ccedil;a Ambiental</h5>
					</div>
					<div class="body">
						<div class="input-group mb-3">
							<input type="email" v-model="Login.Email" class="form-control" placeholder="E-mail">
							<div class="input-group-append">
								<span class="input-group-text"><a href="#" class="forgot" title="Digite o e-mail"><i class="zmdi zmdi-account-circle"></i></a></span>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" v-model="Login.Senha" class="form-control" placeholder="Senha">
							<div class="input-group-append">                                
								<span class="input-group-text"><a href="#" class="forgot" title="Digite a Senha"><i class="zmdi zmdi-lock"></i></a></span>
							</div>                            
						</div>
						<div class="mt-2 mb-2 wow pulse"><a href="<?=base_url('Login/cadastro')?>">N&atilde;o tem acesso? cadastre-se aqui.</a></div>
						<button v-if="Login.Email && Login.Senha" type="button" @click="efetuarLogin" class="btn btn-success btn-r waves-effect waves-light mr-3 wow pulse">ENTRAR</button>
						<div class="signin_with mt-5"></div>
					</div>
				</form>
				<div class="copyright text-center">
					&copy; <?=date('Y')?>,
					<span>Desenvolvido por <a href="http://www.gov.br/dnit" target="_blank">DNIT</a></span>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/home/login.js')?>"></script>
	</body>
</html>