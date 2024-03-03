<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Meus Dados</h2>
				<ul class="breadcrumb mt-2">
					<li class="breadcrumb-item">
						<a href="<?=base_url();?>"><i class="zmdi zmdi-home"></i> Página Inicial</a>
					</li>
					<li class="breadcrumb-item active">Segurança</li>
					<li class="breadcrumb-item active">Usuários</li>
				</ul>
				<button class="btn btn-primary btn-icon mobile_menu" type="button">
					<i class="zmdi zmdi-sort-amount-desc"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="dadosUsuario">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h5>Dados do Usuário</h5>
						<div class="row p-4">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Nome *</span>
								</div>
								<div class="form-control">{{Usuario.Nome}}</div>
							</div>
							<div class="input-group col-6 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">E-mail *</span>
								</div>
								<div class="form-control">{{Usuario.Email}}</div>
							</div>
							<div class="input-group col-6 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Senha</span>
								</div>
								<input v-model="Senha" type="password" maxlength="8" class="form-control">
							</div>
							<div class="p-4 col-12">
								<p>* campos bloqueados para edição</p>
							</div>
							<div class="w-100 border-top text-right" v-if="Usuario.ID">
								<button @click="checkForm" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/seguranca/meus-dados.js')?>"></script>