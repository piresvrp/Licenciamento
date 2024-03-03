<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Trocar Usuário Logado</h2>
				<ul class="breadcrumb mt-2">
					<li class="breadcrumb-item">
						<a href="<?=base_url();?>"><i class="zmdi zmdi-home"></i> Página Inicial</a>
					</li>
					<li class="breadcrumb-item active">Segurança</li>
				</ul>
				<button class="btn btn-primary btn-icon mobile_menu" type="button">
					<i class="zmdi zmdi-sort-amount-desc"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="usuarios">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h5>Usuários Cadastrados</h5>
						<table class="table table-striped" id="listaUsuarios">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Email</th>
									<th>Perfil</th>
									<th>Status</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="i in listaUsuarios">
									<td nowrap v-text="i.Nome"></td>
									<td nowrap v-text="i.Email"></td>
									<td v-text="i.Perfil == 1 ? 'Administrador' : 'Usuário'"></td>
									<td v-text="i.Status == 'A' ? 'Ativo' : 'Inativo'"></td>
									<td nowrap>
										<button v-if="i.Status == 'A'" @click="Login(i.Email);" class="btn btn-success btn-sm" title="Selecionar"><i class="fa fa-check"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/seguranca/trocar.js')?>"></script>