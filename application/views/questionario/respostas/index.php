<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Consulta de Respostas</h2>
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
						<h5>Questionários Respondidos</h5>
						<table class="table table-striped" id="respostas">
							<thead>
								<tr>
									<th>Empreendimento</th>
									<th>Competência</th>
									<th>Respondido por</th>
									<th>Data e Hora</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="R in Respostas">
									<td v-text="R.Empreendimento"></td>
									<td v-text="R.Competencia"></td>
									<td nowrap v-text="R.Nome"></td>
									<td nowrap v-text="R.DataHora"></td>
									<td><a v-bind:href="'<?=base_url('Questionario/Respostas/ver')?>?id='+R.ID" class="btn btn-sm btn-info" title="Ver">Ver</a></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('webroot/arquivos/scripts/application/questionario/respostas.js')?>"></script>