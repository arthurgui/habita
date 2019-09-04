<?php
	$cpf		=	array(
						'id'			=>	'cpf',
						'name'			=>	'cpf',
						'type'			=>	'text',
						'class'			=>	'form-control',
						'value'			=>	set_value("cpf"),
						'placeholder'	=>	'000.000.000-00',
						'onblur'        =>   "verificaCPF(this);",
						'onkeypress'	=>	"return txtBoxFormat(this, \'999.999.999-99\',, event);",
						'maxlength'		=>	'14'
					);
	$titular	=	array(
						'id'			=>	'titular',
						'name'			=>	'titular',
						'type'			=>	'text',
						'class'			=>	'form-control',
						'value'			=>	set_value("titular"),
						'placeholder'	=>	'',
						'maxlength'		=>	'100'
					);
	$conjuge	=	array(
						'id'			=>	'conjuge',
						'name'			=>	'conjuge',
						'type'			=>	'text',
						'class'			=>	'form-control',
						'value'			=>	set_value("conjuge"),
						'placeholder'	=>	'',
						'maxlength'		=>	'100'
					);
?>
<!-- Conteúdo -->
<div class="container container-sistema questionario">
	<div class="row">
		<div class="col-12">
			<?= form_open($consultar, $form_attr); ?>
				<div class="card border border-gray-light">
					<div class="card-header bg-brand-primary fc-white m-1">
						<h5>
							<i class="fas fa-users"></i>&nbsp;&nbsp;Famílias
							<span class="float-right"><i class="fas fa-search"></i>&nbsp;Consulta&nbsp;<i class="fas fa-caret-down"></i></span>
						</h5>
					</div>
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<?= ($this->session->flashdata('consultar')) ? $this->session->flashdata('consultar') : ''; ?>
						<!-- CPF -->
						<div class="form-group row">
							<?= form_label('CPF (Titular ou Conjuge):', 'cpf', $label3); ?>
							<div class="col-3">
								<?= form_input($cpf); ?>
								<font color="red"><?= form_error('cpf'); ?></font>
							</div>
						</div>
						<!-- TITULAR -->
						<div class="form-group row">
							<?= form_label('Titular:', 'titular', $label3); ?>
							<div class="col-5">
								<?= form_input($titular); ?>
								<font color="red"><?= form_error('titular'); ?></font>
							</div>
						</div>
						<!-- CÔNJUGE -->
						<div class="form-group row">
							<?= form_label('Cônjuge:', 'conjuge', $label3); ?>
							<div class="col-5">
								<?= form_input($conjuge); ?>
								<font color="red"><?= form_error('conjuge'); ?></font>
							</div>
						</div>
					</div>
					<div class="card-footer border-top m-1">
						<button class="btn btn-brand-primary"><i class="fas fa-search"></i>&nbsp;Consultar</button>
						<?php if($filtro) : ?>
							<a class="btn btn-success" href=""><i class="fas fa-eraser"></i>&nbsp;Limpar</a>
						<?php endif; ?>
						<!-- <button class="btn btn-secondary border border-light" type="submit" onclick="relatorio('questionario/relatorio');"><i class="fas fa-file-alt"></i>&nbsp;Relatório</button> -->
					</div>
				</div>
			<?= form_close(); ?>
			<div class="card border border-gray-light mt-3">
				<div class="card-header bg-brand-primary fc-white m-1">
					<h5><i class="fas fa-users"></i>&nbsp;&nbsp;Famílias</h5>
				</div>
				<div class="card-body">
					<?= ($this->session->flashdata('excluir')) ? $this->session->flashdata('excluir') : ''; ?>
					<?php
						//-- Table Initiation
						$this->table->set_template($table_tmpl_sm);
						//-- Header Row
						$this->table->set_heading('Titular', 'Cônjuge', 'Familiares', 'Benefícios','Contemplado', 'Opções');

						$btn_excluir = ($this->session->userdata('perfil') == 'A') ?'<a class="btn btn-default btn-sm btn-excluir" href="javascript:;" data-toggle="tooltip" title="Excluir" data-link="'. base_url("questionario/excluir/$familia->id") .'" data-voltar="" data-id="'. $familia->id .'" data-descricao="'. $familia->titular .'"><i class="fa fa-times"></i></a>':'';

						foreach ($familias as $familia) {
							$btn_marcar_contemplado = ($familia->sn_contemplado == 'N') ? '<a class="btn btn-default btn-sm" href="javascript:;" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalMarcarContemplado" data-id_familia="'. $familia->id .'" onclick="showModalMarcarContemplado(this);"><i class="fas fa-check-square" data-toggle="tooltip" title="Marcar Contemplado" ></i></a>&nbsp;':'';
							$btn_desmarcar_contemplado = ($familia->sn_contemplado == 'S') ? '<a class="btn btn-default btn-sm" href="javascript:;" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalDesmarcarContemplado" data-id_familia="'. $familia->id .'" onclick="showModalDesmarcarContemplado(this);"><i class="fas fa-check-square" data-toggle="tooltip" title="Desmarcar Contemplado" ></i></a>&nbsp;':'';

							$this->table->add_row(
								$familia->titular,
								$familia->conjuge,
								$familia->num_familiares,
								$familia->possui_beneficios,
								$familia->contemplado,
								'<a class="btn btn-default btn-sm" href='. base_url("questionario/editar/$familia->id") .' data-toggle="tooltip" title="Editar"><i class="fa fa-pen-square"></i></a>
								<a class="btn btn-default btn-sm" href='. base_url("questionario/familiares/$familia->id") .' data-toggle="tooltip" title="Familiares"><i class="fas fa-user-friends"></i></a>
								<a class="btn btn-default btn-sm" href='. base_url("questionario/imprimir_protocolo/$familia->id") .' data-toggle="tooltip" title="Imprimir Protocolo de Confirmação" target="_blank"><i class="fas fa-print"></i></a>
								<a class="btn btn-default btn-sm" href='. base_url("questionario/imprimir_ficha/$familia->id") .' data-toggle="tooltip" title="Imprimir Ficha de Cadastro" target="_blank"><i class="fas fa-print"></i></a>&nbsp;'
									.$btn_marcar_contemplado
									.$btn_desmarcar_contemplado
									.$btn_excluir
								
							);
						}
					?>
					<?= $this->table->generate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Conteúdo -->