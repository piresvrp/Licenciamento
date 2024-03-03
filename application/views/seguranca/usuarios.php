<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Gestão de Usuários</h2>
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
					<div class="text-right">
						<button @click="mostrarAdd = true; Usuario = {}; errors = []" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Adicionar Usuário</button>
						<div class="modal-w98-h50 sombra-2 p-4" v-if="mostrarAdd">
							<button @click="mostrarAdd = false; getUsuarios();" class="btn btn-secondary btn-r mb-2"><i class="fa fa-times"></i></button>
							<h4 class="col-12 mb-4 mt-4 text-left">Cadastro de Usuários</h4>
							<div class="row p-4">
								<div class="input-group col-6 mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Nome *</span>
									</div>
									<input v-model="Usuario.Nome" type="text" maxlength="100" class="form-control">
								</div>
								<div class="input-group col-6 mb-3">
									<div class="input-group-prepend">
										<span id="basic-addon1" class="input-group-text">Perfil *</span>
									</div>
									<select v-model="Usuario.Perfil" class="form-control show-tick ms select2">
										<option value="1">Administrador</option>
										<option value="2">Usuário</option>
									</select>
								</div>
								<div class="input-group col-6 mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">E-mail *</span>
									</div>
									<input v-model="Usuario.Email" type="email" maxlength="100" class="form-control">
								</div>
								<div class="input-group col-6 mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Senha <span v-if="!Usuario.ID">&nbsp;*</span></span>
									</div>
									<input v-model="Usuario.Senha" type="password" maxlength="8" class="form-control">
								</div>
								<div class="p-2 col-12 text-left">
									<p>* campos de preenchimento obrigatório</p>
								</div>
								<div class="alert alert-warning p-4 text-left" v-show="errors.length > 0">
									<h5>Verifique o preenchimento dos seguintes campos!</h5>
									<ul class="mt-4">
										<li v-for="i in errors" v-text="i"></li>
									</ul>
								</div>
								<div class="w-100 border-top text-right">
									<button @click="mostrarAdd = false; getUsuarios();" class="btn btn-outline-secondary mr-2"> Cancelar</button>
									<button @click="checkFormUsuario" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
								</div>
							</div>
						</div>
					</div>
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
										<button @click="mostrarAdd = true; Usuario = i; Usuario.Senha = ''; errors = []" class="btn btn-info btn-sm" title="Ver / Editar"><i class="fa fa-pen"></i></button>
										<button @click="Status(i.ID);" v-if="i.Status == 'A'" class="btn btn-danger btn-sm" title="Desativar"><i class="fa fa-minus"></i></button>
										<button @click="Status(i.ID);" v-else class="btn btn-success btn-sm" title="Ativar"><i class="fa fa-check"></i></button>
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
<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/seguranca/usuarios.js')?>"></script>