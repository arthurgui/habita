<?php defined('BASEPATH') OR exit('Não é permitido acesso direto de script'); ?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<!-- <meta http-equiv="pragma"		content="no-cache" /> -->
		<!-- <meta http-equiv="expires"		content="-1" /> -->
		<meta charset="utf-8"/>
		<meta name="viewport"		content="width=device-width, initial-scale = 1">
		<meta name='author'			content='Walder B. Andriola'>
		<meta name='Copyright'		content="<?= $copyright; ?>">
		<link rel='shortcut icon'	type='image/x-icon'	href=<?= base_url($favicon); ?>>

		<!-- styles -->
		<link rel="stylesheet"		type="text/css"		href=<?= base_url($bootstrap4css); ?> />
		<link rel="stylesheet"		type="text/css"		href=<?= base_url($fontawesomecss); ?> />
		<link rel="stylesheet"		type="text/css"		href=<?= base_url($bootstrap_chosencss); ?> />
		<link rel="stylesheet"		type="text/css"		href=<?= base_url($stylecss); ?> />
		<link rel="stylesheet"		type="text/css"		href=<?= base_url($toastrcss); ?> />
		<!-- styles -->

		<!-- scripts -->
		<script src=<?= base_url($jqueryjs); ?>></script>
		<script src=<?= base_url($popperjs); ?>></script>
		<script src=<?= base_url($jqueryformjs); ?>></script>
		<script src=<?= base_url($fontawesomejs); ?>></script>
		<script src=<?= base_url($bootstrap4js); ?>></script>
		<script src=<?= base_url($bootstrap_chosenjs); ?>></script>
		<script src=<?= base_url($pagingjs); ?>></script>
		<script src=<?= base_url($functionsjs); ?>></script>
		<script src=<?= base_url($cpf_cnpjjs); ?>></script>
		<script src=<?= base_url($momentjs); ?>></script>
		<script src=<?= base_url($datatablesjs); ?>></script>
		<script src=<?= base_url($datetimemomentjs); ?>></script>
		<script src=<?= base_url($datatablesbootstrapjs); ?>></script>
		<script src=<?= base_url($moment_localejs); ?>></script>
		<script src=<?= base_url($webshim); ?>></script>
		<script src=<?= base_url($toastrjs); ?>></script>
		<script src=<?= base_url($scriptjs); ?>></script>
		<!-- scripts -->

		<title><?= $title; ?></title>
	</head>
	<body>
		<script type="text/javascript">var _systempath = "<?= base_url(); ?>";</script>
		<?php if($this->session->userdata('is_logged_in')): ?>
			<input type="hidden" id="is_logged_in" name="is_logged_in" value="<?= $this->session->userdata('is_logged_in'); ?>">
			<input type="hidden" id="hour" name="hour" value="1">
			<input type="hidden" id="min" name="min" value="59">
			<input type="hidden" id="sec" name="sec" value="59">
			<nav class="navbar navbar-expand-md fixed-top bg-gray-lighter fc-gray-base border-bottom">
				<a class="navbar-brand" href="<?= base_url(); ?>">
					<img src=<?= base_url("$images/logo_login.png") ?> class="img-responsive">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<i class="fas fa-align-justify"></i>
				</button>
				<!-- Menu -->
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url(); ?>" role="button"><i class="fas fa-home"></i>&nbsp;&nbsp;Principal<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCadastros" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros<span class="sr-only">(current)</span></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownCadastros">
								<?php if($this->session->userdata('perfil') == 'S' && $this->session->userdata('login') == 'logon') : ?>
									<div class="dropdown-header">Administrador</div>
									<a class="dropdown-item" href="<?= base_url('cad_cadastros'); ?>">Cadastrar</a>
									<div class="dropdown-divider"></div>
								<?php endif; ?>
								<?php foreach($this->session->userdata('itens_menu') as $item_menu) : ?>
									<a class="dropdown-item" href=<?= base_url("cadastro/$item_menu->id"); ?>><?= $item_menu->descricao; ?></a>
								<?php endforeach; ?>
								<?php if($this->session->userdata('perfil') == 'S' || $this->session->userdata('perfil') == 'A') : ?>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?= base_url('usuarios'); ?>">Usuários</a>
								<?php endif; ?>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRelatorios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios<span class="sr-only">(current)</span></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownRelatorios">
								<?php if($this->session->userdata('perfil') == 'S' && $this->session->userdata('login') == 'logon') : ?>
									<div class="dropdown-header">Administrador</div>
									<a class="dropdown-item" href="<?= base_url('relatorios/cadastrar'); ?>">Cadastrar</a>
									<!-- <a class="dropdown-item" href="<?= base_url('relatorios/configurar'); ?>">Configurar</a> -->
									<a class="dropdown-item" href="<?= base_url('rotinas/executarSQL'); ?>">Executar SQL</a>
									<div class="dropdown-divider"></div>
								<?php endif; ?>
								<a class="dropdown-item" href=<?= base_url("relatorios/geral"); ?>>Geral</a>
								<!-- <?php if ($this->session->userdata('itens_relatorios')) : ?>
									<?php foreach($this->session->userdata('itens_relatorios') as $item_relatorio) : ?>
										<a class="dropdown-item" href=<?= base_url("relatorios/gerar/$item_relatorio->opcao_menu"); ?>><?= $item_relatorio->titulo_relatorio; ?></a>
									<?php endforeach; ?>
								<?php endif; ?> -->
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownGestao" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sociodemográfico<span class="sr-only">(current)</span></a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownGestao">
								<a class="dropdown-item" href="<?= base_url('questionario'); ?>">Questionario</a>
								<a class="dropdown-item" href="<?= base_url('questionario/familias'); ?>">Consulta</a>
							</div>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUsuario" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user-circle"></i>&nbsp;<?= $this->session->userdata('nome'); ?><!-- Usuário --><span class="sr-only">(current)</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownUsuario">
								<a class="dropdown-item" href="<?= base_url('usuarios/perfil/'. $this->session->userdata('id_usuario')); ?>"><i class="fas fa-user-circle"></i>&nbsp;Perfil</a>
								<a class="dropdown-item" href="javascript:;" onclick="logout();"><i class="fas fa-power-off"></i>&nbsp;Logout</a>
							</div>
						</li>&nbsp;
						<li class="nav-item">
							<span class="navbar-text fc-brand-primary"><i class="far fa-clock"></i></span>
							<span class="navbar-text fc-brand-primary" id="timer"><i class="fas fa-spinner fa-pulse"></i></span>
						</li>
						<div id="user-content" style="display: none;">
							<div class="container-fluid" >
							<?php if($ce_licenca): ?>
								<div class="row">
									<div class="col-12">
										<span class="navbar-text fs-small90"><i class='fas fa-unlock'></i>&nbsp;Licenciado:&nbsp;<?= $this->session->userdata('licenciado'); ?></span>
									</div>
								</div>
							<?php endif; ?>
								<div class="row">
									<div class="col-12">
										<button class='btn btn-default fs-small90' data-toggle='modal' data-target='#modalAlterarSenha'>Alterar Senha</button>
										<a class='btn btn-default fs-small90' id="btn-logout" href="javascript:;" onclick="logout();"><i class="fas fa-power-off"></i>&nbsp;Logout</a></li></a>
									</div>
								</div>
							</div>
						</div>
						<!-- <span class="navbar-text"><?= $this->session->userdata('licenciado'); ?></span> -->
					</ul>
				</div>
				<!-- /Menu -->
			</nav>
			<div class="well well-sm">
				<h4></h4>
			</div>
		<?php endif; ?>