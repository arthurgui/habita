<script type="text/javascript">
	$(document).ready(function() {
		$('input[name="inlineRadioOptions"]').on('click',function(){
			$valor = $(this).val();
			if ($valor == 'cpf') {
				$("#cpf_cnpj").val('').attr('onkeypress',"return txtBoxFormat(this, '999.999.999-99', event);").attr('maxlength','14').focus();
			}
			else if ($valor == 'cnpj') {
				$("#cpf_cnpj").val('').attr('onkeypress',"return txtBoxFormat(this, '99.999.999/9999-99', event);").attr('maxlength','18').focus();
			}
		});
	});
</script>
<?php
	if ($bairros) {
		if (count($bairros) > 1) {
			$opt_bairro[''] = '*** Todos ***';
		}
		foreach ($bairros as $b) {
			$opt_bairro[$b->id] = $b->descricao;
		}
	} else {
		$opt_bairro[''] = '*** Não há bairros cadastrados ***';
	}

	if ($faixas_renda) {
		if (count($faixas_renda) > 1) {
			$opt_faixa_renda[''] = '*** Todos ***';
		}
		foreach ($faixas_renda as $faixa) {
			$opt_faixa_renda[$faixa->id] = $faixa->descricao;
		}
	} else {
		$opt_faixa_renda[''] = "*** Não há faixas de renda cadastrados ***";
	}

	if ($motivos_cadastro) {
		if (count($motivos_cadastro) > 1) {
			$opt_motivo_cadastro[''] = "*** Todos ***";
		}
		foreach ($motivos_cadastro as $motivo) {
			$opt_motivo_cadastro[$motivo->id] = $motivo->descricao;
		}
	} else {
		$opt_motivo_cadastro[''] = "*** Não há motivos cadastrados ***";
	}

	if ($origens_cadastro) {
		if (count($origens_cadastro) > 1) {
			$opt_origem_cadastro[''] = "*** Todos ***";
		}
		foreach ($origens_cadastro as $origem) {
			$opt_origem_cadastro[$origem->id] = $origem->descricao;
		}
	} else {
		$opt_origem_cadastro[''] = "*** Não há origens cadastradas ***";
	}

	if ($formas_ocupacao) {
		if (count($formas_ocupacao) > 1) {
			$opt_forma_ocupacao[''] = "*** Todos ***";
		}
		foreach ($formas_ocupacao as $ocupacao) {
			$opt_forma_ocupacao[$ocupacao->id] = $ocupacao->descricao;
		}
	} else {
		$opt_forma_ocupacao [''] = "*** Não há origens cadastradas ***";
	}
	if ($tipos_uso_imovel) {
		if (count($tipos_uso_imovel) > 1) {
			$opt_tipos_uso_imovel[''] = "*** Todos ***";
		}
		foreach ($tipos_uso_imovel as $imovel) {
			$opt_tipos_uso_imovel[$imovel->id] = $imovel->descricao;
		}
	} else {
		$opt_tipos_uso_imovel [''] = "*** Não há origens cadastradas ***";
	}
	if ($tipos_construcao) {
		if (count($tipos_construcao) > 1) {
			$opt_tipos_uso_construcao[''] = "*** Todos ***";
		}
		foreach ($tipos_construcao as $construcao) {
			$opt_tipos_uso_construcao[$construcao->id] = $construcao->descricao;
		}
	} else {
		$opt_tipos_uso_construcao[''] = "*** Não há origens cadastradas ***";
	}

	$bairro					=	array(
									'id'			=>	'ce_bairro',
									'name'			=>	'ce_bairro',
									'class'			=>	'form-control'
								);
	$faixa_renda			=	array(
									'id'			=>	'ce_faixa_renda',
									'name'			=>	'ce_faixa_renda',
									'class'			=>	'form-control'
								);
	$titular				=	array(
									'id'			=>	'titular',
									'name'			=>	'titular',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("titular"),
									'placeholder'	=>	'',
									'maxlength'		=>	'60'
								);
	/*$conjuge				=	array(
									'id'			=>	'conjuge',
									'name'			=>	'conjuge',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("conjuge"),
									'placeholder'	=>	'',
									'maxlength'		=>	'60'
								);*/
	$cpf					=	array(
									'id'			=>	'cpf',
									'name'			=>	'cpf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("cpf"),
									'placeholder'	=>	'000.000.000-00',
									'maxlength'		=>	'14',
									'onkeypress'	=>	"return txtBoxFormat(this, '999.999.999-99', event);"
								);
	$cpf_cj					=	array(
									'id'			=>	'cpf_cj',
									'name'			=>	'cpf_cj',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("cpf_cj"),
									'placeholder'	=>	'000.000.000-00',
									'maxlength'		=>	'14',
									'onkeypress'	=>	"return txtBoxFormat(this, '999.999.999-99', event);"
								);
	$motivo_cadastro		=	array(
									'id'			=>	'ce_motivo_cadastro',
									'name'			=>	'ce_motivo_cadastro',
									'class'			=>	'form-control'
								);
	$origem_cadastro		=	array(
									'id'			=>	'ce_origem_cadastro',
									'name'			=>	'ce_origem_cadastro',
									'class'			=>	'form-control'
								);
	$forma_ocupacao			=  array(
									'id' 			=> 'ce_forma_ocupacao',
									'name'			=> 'ce_forma_ocupacao',
									'class'			=> 'form-control'
								 );
	$tipo_imovel			=  array(
									'id' 			=> 'ce_tipo_imovel',
									'name'			=> 'ce_tipo_imovel',
									'class'			=> 'form-control'
								 );
	$tipo_construcao			=  array(
									'id' 			=> 'ce_tipo_construcao',
									'name'			=> 'ce_tipo_construcao',
									'class'			=> 'form-control'
								 );

	$attrForm 			=	array(
								'class'		=>	'form-horizontal',
								'role'		=>	'form',
								'id'		=>	'form_consulta',
								'target'	=>	'_blank'
							);
	/*
	$dt_vencimento_inicio	=	array(
									'id'	=>	'dt_vencimento_inicio',
									'name'	=>	'dt_vencimento_inicio',
									'class'	=>	'form-control',
									'type'	=>	'date'
								);
	$dt_vencimento_fim		=	array(
									'id'	=>	'dt_vencimento_fim',
									'name'	=>	'dt_vencimento_fim',
									'class'	=>	'form-control input-group-append',
									'type'	=>	'date'
								);
	$usuario				=	array(
									'id'			=>	'ce_usuario',
									'name'			=>	'ce_usuario',
									'class'			=>	'form-control'
								);
	if ($usuarios) {
		if (count($usuarios) > 1) {
			$opt_usuario[''] = '*** Todos ***';
		}
		foreach ($usuarios as $user) {
			$opt_usuario[$user->id] = $user->nome;
		}
	} else {
		$opt_usuario[''] = '*** Não há usuários cadastrados ***';
	}
	*/
?>

<!-- Conteúdo -->
<div class="container container-sistema ">
		<div class="row mb-5">
			<div class="col-12">
				<?= form_open($form_relatorios, $attrForm); ?>
					<div class="card border border-gray-light">
						<div class="card-header bg-brand-primary fc-white m-1">
							<h5>Relatórios</h5>
						</div>
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<div class="row">
							<div class="col-lg-5">
								<fieldset>
									<legend>Tipos de Relatório</legend>

									<div class="form-group">
										<?php foreach ($relatorios as $key => $relatorio) : ?>
											<div class="form-check mb-3">
												<div class="custom-control custom-radio mb-3">
													<?php
														$checked = ($key == 0) ? true : false;
														$input_relatorio =	array(
																				'id'		=> 'relatorio'. $relatorio->id,
																				'name'		=> 'relatorio',
																				'type'		=> 'radio',
																				'class'		=> 'custom-control-input',
																				'value'		=> $relatorio->id,
																				'checked'	=> $checked
																			);
													?>
													<?= form_radio($input_relatorio); ?>
													<label class="custom-control-label" for="<?= $relatorio->id; ?>"><?= $relatorio->nome_relatorio; ?></label>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</fieldset>
							</div>

							<div class="col-lg-7">
								<fieldset class="border">
									<legend>Filtros</legend>
									<fieldset>
										<legend>Ordem</legend>
										<table class="table table-condensed relatorio-filtro">
											<tr>
												<td width="60%">
													<div class="checkbox">
														<label>
														&nbsp;
														</label>
													</div>
												</td>
													<td>
														<?= form_dropdown('ordem',$optordem,'',$select_attr); ?>
													</td>
											</tr>
										</table>
									</fieldset>
									<fieldset>
										<legend>Agrupar</legend>
										<table class="table table-condensed relatorio-filtro">
											<tr>
												<td width="60%">
													<div class="checkbox">
														<label>
														&nbsp;
														</label>
													</div>
												</td>
													<td>
														<?= form_dropdown('ordem',$optordem,'',$select_attr); ?>
													</td>
											</tr>
										</table>
									</fieldset>

									<!-- Bairro -->
									<div class="form-group row">
										<?= form_label('Bairro:', 'ce_bairro', $label3); ?>
										<div class="row col-lg-7">
											<?= form_dropdown('ce_bairro', $opt_bairro, set_value("ce_bairro"), $bairro); ?>
										</div>
									</div>

									<!-- Faixa de Renda -->
									<div class="form-group row">
										<?= form_label('Faixa de Renda:', 'ce_faixa_renda', $label3); ?>
										<div class="row col-lg-7">
											<?= form_dropdown('ce_faixa_renda', $opt_faixa_renda, set_value("ce_faixa_renda"), $faixa_renda); ?>
										</div>
									</div>


									<!-- Titular
									<div class="form-group row">
										<?= form_label('Titular:', 'titular', $label3); ?>
										<div class="row col-lg-9">
											<?= form_input($titular); ?>
										</div>
									</div>
									
									CPF Titular
									<div class="form-group row">
										<?= form_label('CPF (Titular):', 'cpf', $label3); ?>
										<div class="row col-lg-4">
											<?= form_input($cpf); ?>
										</div>
									</div>
									
									Côjuge
									<div class="form-group row">
										<?= form_label('Cônjuge:', 'conjuge', $label3); ?>
										<div class="row col-lg-9">
											<?= form_input($conjuge); ?>
										</div>
									</div>
									
									CPF Conjuge
									<div class="form-group row">
										<?= form_label('CPF (Cônjuge):', 'cpf_cj', $label3); ?>
										<div class="row col-lg-4">
											<?= form_input($cpf_cj); ?>
										</div>
									</div> -->

									<!-- Motivo do cadastro -->
									<div class="form-group row">
										<?= form_label('Motivo cadastro:', 'ce_motivo_cadastro', $label3); ?>
										<div class="row col-lg-7">
											<?= form_dropdown('ce_motivo_cadastro', $opt_motivo_cadastro, set_value("ce_motivo_cadastro"), $motivo_cadastro); ?>
										</div>
									</div>

									<!-- Origem do cadastro -->
									<div class="form-group row">
										<?= form_label('Origem cadastro:', 'ce_origem_cadastro', $label3); ?>
										<div class="row col-lg-7">
											<?= form_dropdown('ce_origem_cadastro', $opt_origem_cadastro, set_value("ce_origem_cadastro"), $origem_cadastro); ?>
										</div>
									</div>

									<!-- forma de ocupação -->

									<div class="form-group row">
										<?= form_label('Forma de Ocupação:','ce_forma_ocupacao', $label3); ?>
										<div class ="row col-lg-7">
											<?= form_dropdown('ce_forma_ocupacao', $opt_forma_ocupacao, set_value("ce_forma_ocupacao"), $forma_ocupacao); ?>
										</div>
									</div>
									
									<!--ce_tipo_uso_imovel -->
									<div class="form-group row">
										<?= form_label('Uso do Imovel','ce_tipo_uso_imovel', $label3); ?>
										<div class ="row col-lg-7">
											<?= form_dropdown('ce_tipo_imovel', $opt_tipos_uso_imovel, set_value("ce_tipo_imovel"), $tipo_imovel); ?>
										</div>
									</div>	

									<!-- Tipos de construção -->
									<div class="form-group row">
										<?= form_label('Tipo de Construção:','ce_tipo_construcao', $label3); ?>
										<div class ="row col-lg-7">
											<?= form_dropdown('ce_tipo_construcao', $opt_tipos_uso_construcao, set_value("ce_tipo_construcao"), $tipo_construcao); ?>
										</div>
									</div>	
								</fieldset>
							</div>
						</div>
					</div>
					<div class="card-footer border-top bg-green-system fc-white m-1">
						<button class="btn btn-brand-primary"><i class="fa fa-print"></i>&nbsp;Gerar</button>
					</div>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!-- /Conteúdo -->
									<!-- Possui Benefícios -->
									<!-- <div class="form-group row align-items-center">
										<?= form_label('Possui Benefícios?', 'sn_beneficios', $label3); ?>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_beneficios_t" name="sn_beneficios" value="" required checked>
											<label class="custom-control-label" for="sn_beneficios_t">Todos</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_beneficios_s" name="sn_beneficios" value="S" required>
											<label class="custom-control-label" for="sn_beneficios_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_beneficios_n" name="sn_beneficios" value="N" required>
											<label class="custom-control-label" for="sn_beneficios_n">Não</label>
										</div>
									</div> -->

									<!-- Possui PSF -->
									<!-- <div class="form-group row align-items-center">
										<?= form_label('Possui PSF?', 'sn_psf', $label3); ?>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_psf_t" name="sn_psf" value="" required checked>
											<label class="custom-control-label" for="sn_psf_t">Todos</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_psf_s" name="sn_psf" value="S" required>
											<label class="custom-control-label" for="sn_psf_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_psf_n" name="sn_psf" value="N" required>
											<label class="custom-control-label" for="sn_psf_n">Não</label>
										</div>
									</div> -->
									
									<!-- PERÍODO -->
									<!-- <div class="form-group row">
										<?= form_label('Vencimento:', 'dt_vencimento_inicio', $label3); ?>
										<div class="form-inline">
											<div class="input-group">
												<?= form_input($dt_vencimento_inicio); ?>
												<div class="input-group-append">
													<span class="input-group-text">a</span>
												</div>
												<?= form_input($dt_vencimento_fim); ?>
											</div>
										</div>
									</div> -->

									<!-- USUÁRIO -->
									<!-- <div class="form-group row">
										<?= form_label('Usuário:', 'ce_usuario', $label3); ?>
										<div class="row col-lg-9">
											<?= form_dropdown('ce_usuario', $opt_usuario, '', $usuario); ?>
										</div>
									</div> -->