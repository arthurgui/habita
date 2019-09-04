<?php
	$input_nome		=	array(
							'id'			=>	'nome',
							'name'			=>	'nome',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("nome", $usuario->nome),
							'placeholder'	=>	'',
							'maxlength'		=>	'50',
							'required'		=>	''
						);
	$input_login	=	array(
							'id'			=>	'login',
							'name'			=>	'login',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("login", $usuario->login),
							'placeholder'	=>	'',
							'maxlength'		=>	'20',
							'required'		=>	''
						);
	$input_senha	=	array(
							'id'			=>	'senha',
							'name'			=>	'senha',
							'type'			=>	'password',
							'class'			=>	'form-control',
							'placeholder'	=>	'',
							'maxlength'		=>	'20',
							'required'		=>	''
						);
	$input_email	=	array(
							'id'			=>	'email',
							'name'			=>	'email',
							'type'			=>	'email',
							'class'			=>	'form-control',
							'value'			=>	set_value("email", $usuario->email),
							'placeholder'	=>	'',
							'maxlength'		=>	'100',
							'required'		=>	''
						);
	$opt_perfil		=	array(
							''	=>	'Selecione',
							'A'	=>	'Administrador',
							'O'	=>	'Operador'
						);
	if ($perfil_usuario == 'S') {
		$opt_perfil['S'] = 'Superusuário';
	}

	if ($this->session->userdata('empresa')) {
		$opt_funcoes['']	=	'*** Selecione ***';
		foreach ($funcoes as $funcao) {
			$opt_funcoes[$funcao->id]	= $funcao->descricao;
		}
		$opt_setores['']	=	'*** Selecione ***';
		foreach ($setores as $setor) {
			$opt_setores[$setor->id]	= $setor->descricao;
		}
	}
?>
<!-- Conteúdo -->
<div class="container container-sistema conatainer-usuarios">
	<div class="row mb-5">
		<div class="col-12">
			<div class="card border border-gray-light">
				<div class="card-header bg-brand-primary fc-white m-1"><h5>Editar Usuário</h5></div>
				<?= form_open($salvar, $form_attr); ?>
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<div class="form-group row">
							<?= form_hidden('login_old', $usuario->login); ?>
							<?= form_hidden('email_old', $usuario->email); ?>
							<?= form_label('Nome:', 'nome', $label2); ?>
							<div class="col-sm-6">
								<?= form_input($input_nome); ?>
								<font color="red"><?= form_error('nome'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Email:', 'email', $label2); ?>
							<div class="col-sm-6">
								<?= form_input($input_email); ?>
								<font color="red"><?= form_error('email'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Perfil:', 'perfil', $label2); ?>
							<div class="col-sm-3">
								<?= form_dropdown('perfil', $opt_perfil, set_value('perfil', $usuario->perfil), $class.$required); ?>
								<font color="red"><?= form_error('perfil'); ?></font>
							</div>
							<div class="col-sm-4">
								<div class="col">
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" id="status_a" name="status" value="A" required <?= ($usuario->status == 'A') ? 'checked' : '' ?>>
										<label class="custom-control-label" for="status_a">Ativo</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" class="custom-control-input" id="status_i" name="status" value="I" required <?= ($usuario->status == 'I') ? 'checked' : '' ?>>
										<label class="custom-control-label" for="status_i">Inativo</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Login:', 'login', $label2); ?>
							<div class="col-sm-3">
								<?= form_input($input_login); ?>
								<font color="red"><?= form_error('login'); ?></font>
							</div>
						</div>
					</div>
					<div class="card-footer border-top bg-green-system fc-white m-1">
						<button class="btn btn-brand-primary" type="submit"><i class="fas fa-save"></i>&nbsp;Salvar</button>
						<a class="btn btn-success" href=<?= $voltar; ?>><i class="fa fa-reply"></i>&nbsp;Voltar</a>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>