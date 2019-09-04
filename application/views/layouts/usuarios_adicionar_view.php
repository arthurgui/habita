<?php
	$input_nome		=	array(
							'id'			=>	'nome',
							'name'			=>	'nome',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("nome"),
							'placeholder'	=>	'',
							'maxlength'		=>	'50',
							'required'		=>	''
						);
	$input_login	=	array(
							'id'			=>	'login',
							'name'			=>	'login',
							'type'			=>	'text',
							'class'			=>	'form-control',
							'value'			=>	set_value("login"),
							'placeholder'	=>	'',
							'maxlength'		=>	'20',
							'required'		=>	''
						);
	$input_senha	=	array(
							'id'			=>	'senha',
							'name'			=>	'senha',
							'type'			=>	'password',
							'class'			=>	'form-control',
							'value'			=>	set_value("senha"),
							'placeholder'	=>	'',
							'maxlength'		=>	'20',
							'required'		=>	''
						);
	$input_email	=	array(
							'id'			=>	'email',
							'name'			=>	'email',
							'type'			=>	'email',
							'class'			=>	'form-control',
							'value'			=>	set_value("email"),
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


	$classe_perfil	=	"id='perfil' class='form-control' required";

	if ($this->session->userdata('empresa')) {
		$classe_funcao		=	"id='ce_funcao' class='form-control' required";
		$opt_funcoes['']	=	'*** Selecione ***';
		foreach ($funcoes as $funcao) {
			$opt_funcoes[$funcao->id]	= $funcao->descricao;
		}
		$classe_setor		=	"id='ce_setor' class='form-control' required";
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
				<div class="card-header bg-brand-primary fc-white m-1">
					<h5>Adicionar Usuário</h5>
				</div>
				<?= form_open($salvar, $form_attr); ?>
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<div class="form-group row">
							<?= form_label('Nome:', 'nome', $label2); ?>
							<div class="col-sm-6 pb-1">
								<?= form_input($input_nome); ?>
								<font color="red"><?= form_error('nome'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Email:', 'email', $label2); ?>
							<div class="col-sm-6 pb-1">
								<?= form_input($input_email); ?>
								<font color="red"><?= form_error('email'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Perfil:', 'perfil', $label2); ?>
							<div class="col-sm-3 pb-1">
								<?= form_dropdown('perfil', $opt_perfil, set_value('perfil'), $classe_perfil); ?>
								<font color="red"><?= form_error('perfil'); ?></font>
							</div>
							<div class="col-sm-4 pb-1">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="status_a" name="status" value="A" required checked>
									<label class="custom-control-label" for="status_a">Ativo</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="status_i" name="status" value="I" required>
									<label class="custom-control-label" for="status_i">Inativo</label>
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
						<div class="form-group row">
							<?= form_label('Senha:', 'senha', $label2); ?>
							<div class="col-sm-3">
								<?= form_input($input_senha); ?>
								<font color="red"><?= form_error('senha'); ?></font>
							</div>
						</div>
						<?php if ($this->session->userdata('empresa')) : ?>
							<div class="form-group row">
								<?= form_label('Função:', 'ce_funcao', $label2); ?>
								<div class="col-sm-3 pb-1">
									<?= form_dropdown('ce_funcao', $opt_funcoes, set_value('ce_funcao'), $classe_funcao); ?>
									<font color="red"><?= form_error('ce_funcao'); ?></font>
								</div>
								<?= form_label('Setor:', 'ce_setor', $label1); ?>
								<div class="col-sm-3 pb-1">
									<?= form_dropdown('ce_setor', $opt_setores, set_value('ce_setor'), $classe_setor); ?>
									<font color="red"><?= form_error('ce_setor'); ?></font>
								</div>
							</div>
						<?php endif; ?>
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