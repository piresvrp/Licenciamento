<?php
	$version = '1.0.0';
	if (ENVIRONMENT == 'development') {
		header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
		header('Pragma: no-cache');
		header('Expires: 0');
		$version = date('YmdHis');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
		<title>Compet&ecirc;ncia para o Licenciamento Ambiental</title>
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/bootstrap/css/bootstrap.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/datatables/dataTables.bootstrap4.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/datatables/jquery.dataTables.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/datatables/buttons.dataTables.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/fontawesome/css/all.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/fontawesome/css/solid.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/fontawesome/css/brands.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/fontawesome/css/regular.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/fontawesome/css/svg-with-js.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/fontawesome/css/v4-shims.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/dropify/css/dropify.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/plugins/charts-c3/plugin.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/styles/animate.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/styles/style.min.css?ver={$version}")?>" />
		<link rel="stylesheet" href="<?=base_url("webroot/arquivos/styles/comum.css?ver={$version}")?>" />
		<script type="text/javascript">var base_url = '<?=base_url()?>';</script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/vue/vue.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/axios/axios.min.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/bootstrap/js/popper.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/bundles/libscripts.bundle.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/bundles/vendorscripts.bundle.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/bundles/jvectormap.bundle.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/bundles/sparkline.bundle.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/bundles/c3.bundle.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/bundles/mainscripts.bundle.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/moment/moment.min.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/ckeditor/js/ckeditor.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/dropify/js/dropify.min.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/datatables/jquery_dataTables.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/plugins/sweetalert2/sweetalert2.all.min.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/scripts/wow.min.js?ver={$version}")?>"></script>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/scripts/application/application.js?ver={$version}")?>"></script>
	</head>
	<body class="theme-blush ls-toggle-menu">
		<!-- Page Loader -->
		<div class="page-loader-wrapper">
			<div class="loader">
				<img src="<?=base_url('webroot/arquivos/images/loader0.gif')?>" width="140" alt="carregando">
				<p>Por favor aguarde...</p>
			</div>
		</div>
		<!-- Right Icon menu Sidebar -->
		<div class="navbar-right">
			<ul class="navbar-nav">
				<li>
					<a href="javascript:void(0);" class="js-right-sidebar" title="Setting">
						<i class="zmdi zmdi-settings zmdi-hc-spin"></i>
					</a>
				</li>
				<li>
					<a href="<?=base_url('Login/logout')?>" class="mega-menu" title="Sign Out">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar border-right">
			<div class="navbar-brand">
				<button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
				<a href="<?=base_url()?>"><span class="m-l-10">Licen&ccedil;a Ambiental</span></a>
			</div>
			<div class="menu">
				<?php if (!empty($this->session->Logado)): ?>
				<ul class="list" id="menus-acesso">
					<li>
						<div class="user-info">
							<div class="detail m-2">
								<small>
									Usu&aacute;rio: <?=$this->session->Logado['Apelido'];?>
									<?php if ($this->session->Admin && ENVIRONMENT == 'development'): ?>
									<a href="<?= base_url('Seguranca/Usuarios/trocar')?>">Trocar de Usu&aacute;rio</a>
									<?php endif ?>
									<a href="<?=base_url('Seguranca/MeusDados')?>">Meus Dados</a>
								</small>
							</div>
						</div>
					</li>
					<li v-for="a in filtrarArea(<?=$this->session->Logado['Perfil'];?>)">
						<a href="javascript:void(0);" class="menu-toggle">
							<i :class="a.Icone" :title="a.Area"></i>
							<span>{{a.Area}}</span>
						</a>
						<ul class="ml-menu">
							<li v-for="m in filtrarMenu(a.ID)">
								<a :href="base_url+a.Url+'/'+m.Url">{{m.Menu}}</a>
							</li>
						</ul>
					</li>
				</ul>
				<script type="text/javascript"src="<?=base_url("webroot/arquivos/scripts/application/menu.js?ver={$version}")?>"></script>
				<?php endif ?>
			</div>
		</aside>
		<!-- Right Sidebar -->
		<aside id="rightsidebar" class="right-sidebar">
			<ul class="nav nav-tabs sm">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#setting">
						<i class="zmdi zmdi-settings zmdi-hc-spin"></i>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="setting">
					<div class="slim_scroll">
						<div class="card">
							<h6>Personalizar</h6>
							<div class="light_dark">
								<div class="radio">
									<input type="radio" name="radio1" id="lighttheme" value="light" checked="">
									<label for="lighttheme">Modo Light</label>
								</div>
								<div class="radio mb-0">
									<input type="radio" name="radio1" id="darktheme" value="dark">
									<label for="darktheme">Modo Dark</label>
								</div>
							</div>
						</div>
						<div class="card">
							<h6>Cores</h6>
							<ul class="choose-skin list-unstyled">
								<li data-theme="purple">
									<div class="purple"></div>
								</li>
								<li data-theme="blue">
									<div class="blue"></div>
								</li>
								<li data-theme="cyan">
									<div class="cyan"></div>
								</li>
								<li data-theme="green">
									<div class="green"></div>
								</li>
								<li data-theme="orange">
									<div class="orange"></div>
								</li>
								<li data-theme="blush" class="active">
									<div class="blush"></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</aside>
		<section class="content">
			<div class="col-lg-5 col-md-6 col-sm-12">
				<button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button">
					<i class="zmdi zmdi-arrow-right"></i>
				</button>
			</div>
			<?php $this->load->view($pagina) ?>
		</section>
		<script type="text/javascript" src="<?=base_url("webroot/arquivos/scripts/application/template.js?ver={$version}")?>"></script>
	</body>
</html>