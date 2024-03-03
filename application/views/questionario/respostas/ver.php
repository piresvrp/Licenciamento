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
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<div class="body">
						<h5>Questionário Respondido</h5>
						<div class="row">
							<div class="input-group col-8 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Respondido por:</span>
								</div>
								<div class="form-control"><?=$resultado['Usuario']?></div>
							</div>
							<div class="input-group col-4 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Data e Hora:</span>
								</div>
								<div class="form-control"><?=$resultado['DataHora']?></div>
							</div>
						</div>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Empreendimento / Atividade:</span>
								</div>
								<div class="form-control"><?=$resultado['Empreendimento']?></div>
							</div>
						</div>
						<?php foreach ($resultado['Respostas'] as $item): ?>
						<div class="row">
							<div class="col-11 mb-3 border-top"><?=$item['Pergunta']?></div>
							<div class="col-1 mb-3 border-top text-center">
								<?php $class = (strtoupper($item['Valor']) == 'SIM' ? 'btn-success' : 'btn-danger'); ?>
								<span class="btn btn-sm <?=$class?>"><?=$item['Valor']?></span>
							</div>
						</div>
						<?php endforeach ?>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Licenciamento é de Competência:</span>
								</div>
								<div class="form-control"><?=$resultado['Competencia']?></div>
							</div>
						</div>
						<div class="row">
							<div class="input-group col-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Competência para o Licenciamento:</span>
								</div>
								<div class="form-control"><?=$resultado[$resultado['Competencia']]?></div>
							</div>
						</div>
						<div class="w-100 border-top text-right">
							<a href="<?=base_url('Questionario/Respostas/')?>" class="btn btn-info">Voltar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>