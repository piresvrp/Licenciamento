<div class="body_scroll">
	<div class="block-header">
		<div class="row">
			<div class="col-lg-7 col-md-6 col-sm-12">
				<h2>Licen&ccedil;a Ambiental Federal</h2>
				<ul class="breadcrumb mt-2">
					<li class="breadcrumb-item active">Compet&ecirc;ncia para o Licenciamento Ambiental</li>
				</ul>
				<button class="btn btn-primary btn-icon mobile_menu" type="button">
					<i class="zmdi zmdi-sort-amount-desc"></i>
				</button>
			</div>
		</div>
		<div class="container-fluid">
			<div class="header">&nbsp;</div>
			<div class="row clearfix">
				<div class="col-lg-12">
					<div class="card">
						<div class="body">
							<?=$descricao?>
						</div>
						<?php if (!empty($descricao)): ?>
						<div class="w-100 border-top text-right">
							<a href="<?=base_url('Competencia/Questionario')?>" class="btn btn-success">Responder Questionário</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>