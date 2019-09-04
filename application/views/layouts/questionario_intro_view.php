<?php
	$cpf	=	array(
					'id'			=>	'cpf',
					'name'			=>	'cpf',
					'type'			=>	'text',
					'class'			=>	'form-control',
					'value'			=>	set_value("cpf"),
					'placeholder'	=>	'000.000.000-00',
					'maxlength'		=>	'14',
					'onkeypress'	=>	"return txtBoxFormat(this, '999.999.999-99', event);",
					'required'		=>	''
				);
?>
<!-- Conteúdo -->
<div class="container container-sistema questionario">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-brand-primary fc-white">
					<h5><i class="fas fa-question-circle"></i>&nbsp;&nbsp;Questionário Sociodemográfico</h5>
				</div>
				<div class="card-body">
					<nav class="pb-4">
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-titular-tab" data-toggle="tab" href="#nav-titular" role="tab" aria-controls="nav-titular" aria-selected="true">1. Titular</a>
							<a class="nav-item nav-link disabled" id="nav-conjuge-tab" data-toggle="tab" href="#nav-conjuge" role="tab" aria-controls="nav-conjuge" aria-selected="false">2. Cônjuge</a>
							<a class="nav-item nav-link disabled" id="nav-familiar-tab" data-toggle="tab" href="#nav-familiar" role="tab" aria-controls="nav-familiar" aria-selected="false">3. Composição Familiar</a>
							<a class="nav-item nav-link disabled" id="nav-renda-tab" data-toggle="tab" href="#nav-renda" role="tab" aria-controls="nav-renda" aria-selected="false">4. Trabalho e Renda</a>
							<a class="nav-item nav-link disabled" id="nav-saude-tab" data-toggle="tab" href="#nav-saude" role="tab" aria-controls="nav-saude" aria-selected="false">5. Saúde e Ambiente</a>
							<a class="nav-item nav-link disabled" id="nav-outros-tab" data-toggle="tab" href="#nav-outros" role="tab" aria-controls="nav-outros" aria-selected="false">6. Outros</a>
						</div>
					</nav>

					<?= form_open($consultar, $form_attr); ?>
						<div class="tab-content" id="nav-tabContent">
							<!-- Cadastro do Titular -->
							<div class="tab-pane fade show active" id="nav-titular" role="tabpanel" aria-labelledby="nav-titular-tab">
								<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>

								<!-- CPF -->
								<div class="form-group row align-items-center mt-4 pb-4">
									<?= form_label('CPF:', 'cpf', $label2); ?>
									<div class="col-3">
										<?= form_input($cpf); ?>
										<font color="red"><?= form_error('cpf'); ?></font>
									</div>
									<button class="btn btn-brand-primary" type="submit"><i class="fas fa-search"></i>&nbsp;Consultar</button>
									<!-- <button class="btn btn-brand-primary"><i class="fas fa-search"></i>&nbsp;Consultar</button> -->
								</div>

								<div class="form-group row justify-content-center d-none" id="labelLoading"><i class="fas fa-spinner fa-pulse"></i></div>
							</div>
						</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Conteúdo -->