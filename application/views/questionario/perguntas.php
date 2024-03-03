<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Cadastro de Preguntas</h2>
				<ul class="breadcrumb mt-2">
					<li class="breadcrumb-item">
						<a href="<?=base_url();?>"><i class="zmdi zmdi-home"></i> Página Inicial</a>
					</li>
					<li class="breadcrumb-item active">Questionário</li>
				</ul>
				<button class="btn btn-primary btn-icon mobile_menu" type="button">
					<i class="zmdi zmdi-sort-amount-desc"></i>
				</button>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="questionario">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h5>Apresentação do Questionário</h5>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<textarea v-model="Questionario.Descricao" name="Descricao" class="form-control"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Resposta P/ Competência Federal</span>
								</div>
								<textarea v-model="Questionario.Federal" class="form-control"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Resposta P/ Competência Estadual</span>
								</div>
								<textarea v-model="Questionario.Estadual" class="form-control"></textarea>
							</div>
						</div>
						<h5>Perguntas</h5>
						<div class="row" v-for="P in Perguntas">
							<div class="input-group col-5 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" v-text="P.Numero"></span>
								</div>
								<textarea v-model="P.Enunciado" class="form-control"></textarea>
							</div>
							<div class="input-group col-3 mb-5">
								<div v-if="P.Numero > 1" class="input-group-prepend">
									<span class="input-group-text">Depende de</span>
								</div>
								<select v-if="P.Numero > 1" v-model="P.Dependencia" class="form-control show-tick ms select2">
									<option value="0"></option>
									<option v-for="D in Perguntas" v-if="D.Numero != P.Numero" v-bind:value="D.Numero">{{D.Numero}}</option>
								</select>
							</div>
							<div class="input-group col-3 mb-5">
								<div class="input-group-prepend">
									<span class="input-group-text">Federal Se</span>
								</div>
								<select v-model="P.Federal" class="form-control show-tick ms select2">
									<option value="S">Sim</option>
									<option value="N">Não</option>
								</select>
							</div>
							<div class="col-1">
								<button v-if="Perguntas.length > 1" @click="Remove(P.Numero)" class="btn btn-danger" title="Excluir"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="row border-top">
							<div class="col-6">
								<button v-if="renovaPerguntas" @click="Adiciona" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar Pergunta</button>
							</div>
							<div class="col-6 text-right">
								<button @click="checkForm" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/questionario/perguntas.js')?>"></script>