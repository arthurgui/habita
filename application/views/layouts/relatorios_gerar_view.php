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
	$conjuge				=	array(
									'id'			=>	'conjuge',
									'name'			=>	'conjuge',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("conjuge"),
									'placeholder'	=>	'',
									'maxlength'		=>	'60'
								);


	/*
	$cpf					=	array(
									'id'			=>	'cpf',
									'name'			=>	'cpf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("cpf"),
									'placeholder'	=>	'000.000.000-00',
									'maxlength'		=>	'14',
									'onkeypress'	=>	"return txtBoxFormat(this, '999.999.999-99', event);",
									'disabled'		=>	''
								);
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

	$attrForm 			=	array(
								'class'		=>	'form-horizontal',
								'role'		=>	'form',
								'id'		=>	'form_consulta',
								'target'	=>	'_blank'
							);
?>
<!-- Conteúdo -->
<div class="container container-sistema">
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
																				'id'		=> $relatorio->id,
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

									<!-- Bairro -->
									<div class="form-group row">
										<?= form_label('Bairro:', 'ce_bairro', $label3); ?>
										<div class="row col-lg-9">
											<?= form_dropdown('ce_bairro', $opt_bairro, set_value("ce_bairro"), $bairro); ?>
										</div>
									</div>

									<!-- Faixa de Renda -->
									<div class="form-group row">
										<?= form_label('Faixa de Renda:', 'ce_faixa_renda', $label3); ?>
										<div class="row col-lg-6">
											<?= form_dropdown('ce_faixa_renda', $opt_faixa_renda, set_value("ce_faixa_renda"), $faixa_renda); ?>
										</div>
									</div>

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

									<!-- Titular -->
									<div class="form-group row">
										<?= form_label('Titular:', 'titular', $label3); ?>
										<div class="row col-lg-9">
											<?= form_input($titular); ?>
										</div>
									</div>

									<!-- Côjuge -->
									<div class="form-group row">
										<?= form_label('Côjuge:', 'conjuge', $label3); ?>
										<div class="row col-lg-9">
											<?= form_input($conjuge); ?>
										</div>
									</div>

									<!-- PERÍODO -->
									<!-- <?php if ($opcaoMenu == 'FINANC') : ?>
										<div class="form-group row">
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
										</div>
									<?php endif; ?> -->

									<!-- USUÁRIO -->
									<!-- <div class="form-group row">
										<?= form_label('Usuário:', 'ce_usuario', $label3); ?>
										<div class="row col-lg-9">
											<?= form_dropdown('ce_usuario', $opt_usuario, '', $usuario); ?>
										</div>
									</div> -->
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