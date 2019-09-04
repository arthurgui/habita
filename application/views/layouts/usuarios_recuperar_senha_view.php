<?php
	$input_email	=	array(
							'id'		=>	'email',
							'name'		=>	'email',
							'type'		=>	'email',
							'class'		=>	'form-control',
							'value'		=>	set_value('email'),
							'maxlength'	=>	'100',
							'required'	=>	''
						);
?>
<!-- Conteúdo -->
<div class="container container-sistema">
	<div class="row">
		<div class="col-12">
			<?= form_open($salvar, $attrInsert); ?>
				<div class="card border">
					<div class="card-header bg-brand-primary fc-white m-1">
						<h5><i class="fa fa-key"></i>&nbsp;&nbsp;Alterar Senha</h5>
					</div>
					<input type="hidden" name="ce_licenca" value="<?= $ce_licenca; ?>">
					<input type="hidden" name="tela" value="<?= $tela; ?>">
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<div class="form-group row align-items-center mt-4 pb-4">
							<?= form_label('Informe o email cadastrado:', 'email', $label4); ?>
							<div class="col-4">
								<?= form_input($input_email); ?>
								<font color="red"><?= form_error('email'); ?></font>
							</div>
							<button class="btn btn-brand-primary"><!-- <i class="fas fa-save"></i>&nbsp; -->Enviar</button>
						</div>
					</div>
					<div class="card-footer border-top m-1">
						<a class="btn btn-success" href=<?= $voltar; ?>><i class="fa fa-reply"></i>&nbsp;Voltar</a>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>