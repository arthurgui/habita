<!-- Conteúdo -->
<div class="container container-sistema container-usuarios">
	<div class="row mb-5">
		<div class="col-12">
			<div class="card border border-gray-light">
				<div class="card-header bg-brand-primary fc-white m-1">
					<h5>Usuários</h5>
				</div>
				<div class="card-body">
					<div class="navbar navbar-default mb-2">
						<a class="btn btn-brand-primary" href=<?= base_url('usuarios/adicionar'); ?> data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i>&nbsp;Adicionar</a>
					</div>
					<?= ($this->session->flashdata('excluir')) ? $this->session->flashdata('excluir') : ''; ?>
					<?php
						//-- Table Initiation
						$this->table->set_template($table_tmpl_sm);
						//-- Header Row
						$this->table->set_heading('Usuário', 'Login', 'Perfil', 'Status', 'Ações');

						foreach ($usuarios as $usuario) {
							$btn_assinatura = ($this->session->userdata('empresa')) ? '&nbsp;<a class="btn btn-default btn-sm btn-assinatura" href="javascript:;" data-toggle="tooltip" title="Assinatura" data-usuario-nome="'. $usuario->nome .'" data-usuario-id="'. $usuario->id .'" data-usuario-assinatura="'. $usuario->assinatura .'"><i class="fa fa-image"></i></a>&nbsp;' : '&nbsp;';
							$this->table->add_row(
								$usuario->nome,
								$usuario->login,
								$usuario->nome_perfil,
								$usuario->nome_status,
								'<a class="btn btn-default btn-sm" href='. base_url("usuarios/editar/$usuario->id") .' data-toggle="tooltip" title="Editar"><i class="fa fa-pen-square"></i></a>'.
								$btn_assinatura.
								'<a class="btn btn-default btn-sm" href='. base_url("usuarios/recuperar_senha/$usuario->id") .' data-toggle="tooltip" title="Alterar Senha"><i class="fa fa-key"></i></a> '.
								(($perfil_usuario != 'O') ? '<a class="btn btn-default btn-sm btn-excluir" href="javascript:;" data-toggle="tooltip" title="Excluir" data-link="'. base_url("usuarios/excluir/$usuario->id") .'" data-voltar="" data-id="'. $usuario->id .'" data-descricao="<b>'. $usuario->nome .'</b>"><i class="fa fa-times"></i></a>' : '')
							);
						}
						$table = $this->table->generate();
					?>
					<?= $table; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Conteúdo -->