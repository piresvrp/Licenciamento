<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Questionário</h2>
				<ul class="breadcrumb mt-2">
					<li class="breadcrumb-item">
						<a href="<?=base_url();?>"><i class="zmdi zmdi-home"></i> Página Inicial</a>
					</li>
					<li class="breadcrumb-item active">Licenciamento Ambiental</li>
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
						<h5>Competência para o Licenciamento Ambiental Federal</h5>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Empreendimento / Atividade:</span>
								</div>
								<textarea v-model="Empreendimento" class="form-control"></textarea>
							</div>
						</div>
						<div class="row" v-for="P in Perguntas" v-if="P.Visivel">
							<div class="col-10 mb-3 border-top">{{P.Enunciado}}</div>
							<div class="col-1 mb-3 border-top text-center">
								<button v-if="P.Valor == 'S'" class="btn btn-sm btn-success">SIM</button>
								<button v-else @click="Responde(P, 'S')" class="btn btn-sm">SIM</button>
							</div>
							<div class="col-1 mb-3 border-top text-center">
								<button v-if="P.Valor == 'N'" class="btn btn-sm btn-danger">N&Atilde;O</button>
								<button v-else @click="Responde(P, 'N')" class="btn btn-sm">N&Atilde;O</button>
							</div>
						</div>
						<div class="w-100 border-top text-right">
							<button v-if="renovaPerguntas" @click="checkForm" class="btn btn-success">Enviar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/competencia/questionario.js')?>"></script>