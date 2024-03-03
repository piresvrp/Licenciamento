<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Cadastro de Usuários</h2>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body" id="usuario">
						<h5>Dados do Usuário</h5>
						<div class="row p-4">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Nome</span>
								</div>
								<input v-model="Usuario.Nome" type="text" maxlength="100" class="form-control">
							</div>
							<div class="input-group col-6 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">E-mail</span>
								</div>
								<input v-model="Usuario.Email" type="email" maxlength="100" class="form-control">
							</div>
							<div class="input-group col-6 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Senha</span>
								</div>
								<input v-model="Usuario.Senha" type="password" maxlength="8" class="form-control">
							</div>
							<div class="alert alert-warning p-4 text-left" v-show="errors.length > 0">
								<h5>Verifique o preenchimento dos seguintes campos!</h5>
								<ul class="mt-4">
									<li v-for="i in errors" v-text="i"></li>
								</ul>
							</div>
							<div class="w-100 border-top text-right">
								<button @click="location='<?=base_url('Login')?>'" class="btn btn-outline-secondary mr-2"> Cancelar</button>
								<button @click="checkForm" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url("webroot/arquivos/scripts/application/home/cadastro.js")?>"></script>