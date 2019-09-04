<?php
	$input_nome				=	array(
									'id'			=>	'nome',
									'name'			=>	'nome',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("nome", $usuario->nome),
									'placeholder'	=>	'Nome',
									'maxlength'		=>	'100',
									'disabled'		=>	''
								);
	$input_login			=	array(
									'id'			=>	'login',
									'name'			=>	'login',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("login", $usuario->login),
									'maxlength'		=>	'30',
									'disabled'		=>	''
								);
	$input_perfil			=	array(
									'id'			=>	'perfil',
									'name'			=>	'perfil',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("perfil", $usuario->nome_perfil),
									'maxlength'		=>	'100',
									'disabled'		=>	''
								);
	$input_senha			=	array(
									'id'			=>	'senha',
									'name'			=>	'senha',
									'type'			=>	'password',
									'class'			=>	'form-control',
									'value'			=>	set_value("senha"),
									'maxlength'		=>	'30',
									'required'		=>	''
								);
	$input_confirmar_senha	=	array(
									'id'			=>	'confirmar_senha',
									'name'			=>	'confirmar_senha',
									'type'			=>	'password',
									'class'			=>	'form-control',
									'value'			=>	set_value("confirmar_senha"),
									'maxlength'		=>	'30',
									'required'		=>	''
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
						<div class="form-group row border-top"></div>
						<div class="form-group row">
							<?= form_label('Nova Senha:', 'senha', $label2); ?>
							<div class="col-3">
								<?= form_input($input_senha); ?>
								<font color="red"><?= form_error('senha'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Confirmar Nova Senha:', 'confirmar_senha', $label2); ?>
							<div class="col-3">
								<?= form_input($input_confirmar_senha); ?>
								<font color="red"><?= form_error('confirmar_senha'); ?></font>
							</div>
						</div>
					</div>
					<div class="card-footer border-top m-1">
						<button class="btn btn-brand-primary"><i class="fas fa-save"></i>&nbsp;Salvar</button>
						<a class="btn btn-success" href=<?= $voltar; ?>><i class="fa fa-reply"></i>&nbsp;Voltar</a>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>