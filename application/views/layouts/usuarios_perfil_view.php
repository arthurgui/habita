<?php
	$input_nome		=	array(
							'id'			=>	'nome',
							'name'			=>	'nome',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("nome", $usuario->nome),
							'placeholder'	=>	'',
							'maxlength'		=>	'100',
							'required'		=>	''
						);
	$input_login	=	array(
							'id'			=>	'login',
							'name'			=>	'login',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("login", $usuario->login),
							'maxlength'		=>	'30',
							'required'		=>	''
						);
	$input_perfil	=	array(
							'id'			=>	'perfil',
							'name'			=>	'perfil',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("perfil", $usuario->nome_perfil),
							'maxlength'		=>	'100',
							'readonly'		=>	''
						);
?>
<!-- Conteúdo -->
<div class="container container-sistema">
	<div class="row">
		<div class="col-12">
			<div class="card border">
				<div class="card-header bg-brand-primary fc-white m-1">
					<h5><i class="fas fa-user-circle"></i>&nbsp;&nbsp;Perfil</h5>
				</div>
				<?= form_open($salvar, $attrInsert); ?>
					<input type="hidden" name="ce_licenca" value="<?= $ce_licenca; ?>">
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<div class="form-group row">
							<?= form_label('Nome:', 'nome', $label2); ?>
							<div class="col-sm-7 pb-1">
								<?= form_input($input_nome); ?>
								<font color="red"><?= form_error('nome'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Login:', 'login', $label2); ?>
							<div class="col-sm-3 pb-1">
								<?= form_input($input_login); ?>
								<font color="red"><?= form_error('login'); ?></font>
							</div>
							<?= form_label('Perfil:', 'perfil', $label1); ?>
							<div class="col-sm-3 pb-1">
								<?= form_input($input_perfil); ?>
								<font color="red"><?= form_error('perfil'); ?></font>
							</div>
						</div>
					</div>
					<div class="card-footer border-top m-1">
						<button class="btn btn-brand-primary"><i class="fas fa-save"></i>&nbsp;Salvar</button>
						<a class="btn btn-success" href='<?= base_url("usuarios/alterar_senha/$usuario->id") ?>'><i class="fa fa-key"></i>&nbsp;Alterar Senha</a>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>