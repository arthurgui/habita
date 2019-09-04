<?php
	$input_login	=	array(
							'id'			=>	'input_login',
							'name'			=>	'login',
							'type'			=>	'text',
							'maxlength'		=>	'50',
							'class'			=>	'form-control',
							'placeholder'	=>	'Login',
							'required'		=>	'',
							'autofocus'		=>	''
					);
	$input_senha	=	array(
							'id'			=>	'input_senha',
							'name'			=>	'senha',
							'type'			=>	'password',
							'maxlength'		=>	'100',
							'class'			=>	'form-control',
							'placeholder'	=>	'Senha',
							'required'		=>	''
					);
	$form_attr		= 	array(
							'id'	=>	'form_login',
							'name'	=>	'form_login',
							'class'	=>	"form-horizontal form-signin" ,
							'role'	=>	"form"
						);
?>
<div class="container" id="container-login">
	<div class="row justify-content-md-center mb-3">
		<!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
			<img class="img-fluid" src=<?= base_url("$images/logo_login.png") ?>>
		</div> -->
	</div>
	<div class="row justify-content-md-center">
		<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
			<?= form_open($login, $form_attr); ?>
				<div class="card">
					<div class="card-header bg-brand-primary fc-white">
						<h3 class="text-center"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Login</h3>
					</div>
					<div class="card-body">
						<?= ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : ''; ?>
						<div class="form-label-group">
							<?= form_input($input_login); ?>
							<?= form_label('Login', 'input_login'); ?>
						</div>
						<div class="form-label-group">
							<?= form_input($input_senha); ?>
							<?= form_label('Senha', 'input_senha'); ?>
						</div>
					</div>
					<div class="card-footer bg-brand-primary">
						<button class="btn btn-lg btn-brand-primary btn-block" type="submit">Entrar</button>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>