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
					'required'		=>	'',
					'onkeyup'		=>	'verificaCPF(this)',
					'oninvalid'		=>	"setCustomValidity('Informe o CPF.')",
					'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
					'onblur' 		=>  "verificaCPF(this);"
				);
?>
<!-- Conteúdo -->
<div class="container container-sistema questionario">
	<div class="row">
		<div class="col-12">
			<div class="card border border-gray-light">
				<div class="card-header bg-brand-primary fc-white m-1">
					<h5><i class="fas fa-question-circle"></i>&nbsp;&nbsp;Questionário Sociodemográfico</h5>
				</div>
				<div class="card-body">
					<?= form_open($consultar, $form_attr); ?>
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<?= ($this->session->flashdata('consultar')) ? $this->session->flashdata('consultar') : ''; ?>
						<!-- CPF -->
						<div class="form-group row mt-4 pb-4">
							<?= form_label('CPF (Titular ou Conjuge):', 'cpf', $label4); ?>
							<div class="col-3">
								<?= form_input($cpf); ?>
								<font color="red" id="cpf_cnpj_erro"><?= form_error('cpf'); ?></font>
							</div>
							<div class="col">
								<button class="btn btn-brand-primary"><i class="fas fa-search"></i>&nbsp;Consultar</button>
							</div>
						</div>
						<div class="form-group row justify-content-center d-none" id="labelLoading"><i class="fas fa-spinner fa-pulse"></i></div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Conteúdo -->
												
												