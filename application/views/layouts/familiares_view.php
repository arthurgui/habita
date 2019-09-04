<?php
	$cpf		=	array(
						'id'			=>	'cpf',
						'name'			=>	'cpf',
						'type'			=>	'text',
						'class'			=>	'form-control',
						'value'			=>	set_value("cpf"),
						'placeholder'	=>	'000.000.000-00',
						'maxlength'		=>	'14',
						'onblur'        =>   "verificaCPF(this);",
						'onkeypress'	=>	"return txtBoxFormat(this, '999.999.999-99', event);"
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
			<div class="card border border-gray-light">
				<div class="card-header bg-brand-primary fc-white m-1">
					<h5><i class="fas fa-users"></i>&nbsp;&nbsp;Componentes Familiares</h5>
				</div>
				<div class="card-body">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">Titular: <strong><?= $familia->titular; ?></strong></li>
						</ol>
					</nav>

					<div class="navbar navbar-default mb-2">
						<a class="btn btn-primary" href=<?= base_url("questionario/adicionar_familiar/$familia->id"); ?> data-toggle="tooltip" title="Adicionar"><i class="fa fa-plus"></i>&nbsp;Adicionar</a>
					</div>

					<?= ($this->session->flashdata('excluir')) ? $this->session->flashdata('excluir') : ''; ?>
					<?php
						//-- Table Initiation
						$this->table->set_template($table_tmpl_sm);
						//-- Header Row
						$this->table->set_heading('Nome', 'Idade', 'Parentesco', 'Escolaridade', 'Escola/Bairro', 'Trabalha', 'Deficiência', 'Opções');

						foreach ($familiares as $familiar) {
							$this->table->add_row(
								$familiar->nome,
								$familiar->idade,
								$familiar->grau_parentesco,
								$familiar->escolaridade,
								$familiar->escola_bairro,
								$familiar->trabalha,
								$familiar->deficiencia,
								'<a class="btn btn-default btn-sm" href='. base_url("questionario/editar_familiar/$familiar->ce_familia/$familiar->id") .' data-toggle="tooltip" title="Editar"><i class="fa fa-pen-square"></i></a>
								<a class="btn btn-default btn-sm btn-excluir" href="javascript:;" data-toggle="tooltip" title="Excluir" data-link="'. base_url("questionario/excluir_familiar/$familiar->ce_familia/$familiar->id") .'" data-voltar="" data-id="'. $familiar->id .'" data-descricao="'. $familiar->nome .'"><i class="fa fa-times"></i></a>'
							);
						}
					?>
					<?= $this->table->generate(); ?>
				</div>
				<div class="card-footer border-top m-1">
					<a class="btn btn-success" href=<?= $voltar; ?>><i class="fa fa-reply"></i>&nbsp;Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Conteúdo -->