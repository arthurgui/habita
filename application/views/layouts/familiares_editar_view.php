<?php
	if ($escolaridades) {
		$opt_escolaridade[''] = "*** Selecione ***";
		foreach ($escolaridades as $esc) {
			$opt_escolaridade[$esc->id] = $esc->descricao;
		}
	} else {
		$opt_escolaridade[''] = "*** Não há escolaridades cadastradas ***";
	}

	if ($graus_parentesco) {
		$opt_grau_parentesco[''] = "*** Selecione ***";
		foreach ($graus_parentesco as $grau) {
			$opt_grau_parentesco[$grau->id] = $grau->descricao;
		}
	} else {
		$opt_grau_parentesco[''] = "*** Não há graus de parentesco cadastrados ***";
	}

	if ($atividades) {
		$opt_atividade_desenvolvida[''] = "*** Selecione ***";
		foreach ($atividades as $ativ) {
			$opt_atividade_desenvolvida[$ativ->id] = $ativ->descricao;
		}
	} else {
		$opt_atividade_desenvolvida[''] = "*** Não há atividades cadastrados ***";
	}

	if ($deficiencias) {
		$opt_deficiencia[''] = "*** Selecione ***";
		foreach ($deficiencias as $defic) {
			$opt_deficiencia[$defic->id] = $defic->descricao;
		}
	} else {
		$opt_deficiencia[''] = "*** Não há deficiências cadastrados ***";
	}

	if ($tipos_vinculo) {
		$opt_tipo_vinculo[''] = "*** Selecione ***";
		foreach ($tipos_vinculo as $vinculo) {
			$opt_tipo_vinculo[$vinculo->id] = $vinculo->descricao;
		}
	} else {
		$opt_tipo_vinculo[''] = "*** Não há tipos de vínculo cadastrados ***";
	}

	$nome				=	array(
								'id'			=>	'nome',
								'name'			=>	'nome',
								'type'			=>	'text',
								'class'			=>	'form-control',
								'value'			=>	set_value("nome", $familiar->nome),
								'placeholder'	=>	'',
								'maxlength'		=>	'100',
								'required'		=>	'',
								'style'			=>  'text-transform: uppercase' 
							);
	$dt_nascimento		=	array(
								'id'			=>	'dt_nascimento',
								'name'			=>	'dt_nascimento',
								'type'			=>	'date',
								'class'			=>	'form-control',
								'max'			=>	date('Y-m-d'),
								'value'			=>	set_value("dt_nascimento", $familiar->dt_nascimento),
								'maxlength'		=>	'10',
								'required'		=>	''
							);
	$grau_parentesco	=	array(
								'id'			=>	'ce_grau_parentesco',
								'name'			=>	'ce_grau_parentesco',
								'class'			=>	'form-control',
								'required'		=>	''
							);
	$escolaridade		=	array(
								'id'			=>	'ce_escolaridade',
								'name'			=>	'ce_escolaridade',
								'class'			=>	'form-control',
								'required'		=>	''
							);
	$escola				=	array(
								'id'			=>	'escola_bairro',
								'name'			=>	'escola_bairro',
								'type'			=>	'text',
								'class'			=>	'form-control',
								'value'			=>	set_value("escola_bairro", $familiar->escola_bairro),
								'placeholder'	=>	'',
								'style'			=>  'text-transform: uppercase', 
								'maxlength'		=>	'100'
							);
	$tipo_vinculo		=	array(
								'id'			=>	'ce_tipo_vinculo',
								'name'			=>	'ce_tipo_vinculo',
								'class'			=>	'form-control'
							);
	$atividade			=	array(
								'id'			=>	'ce_atividade_desenvolvida',
								'name'			=>	'ce_atividade_desenvolvida',
								'class'			=>	'form-control'
							);
	$tempo_atividade_anos	=	array(
								'id'			=>	'tempo_atividade_anos',
								'name'			=>	'tempo_atividade_anos',
								'type'			=>	'number',
								'class'			=>	'form-control',
								'value'			=>	set_value("tempo_atividade_anos",$familiar->tempo_atividade_anos),
								'placeholder'	=>	'Ano(s)',
								'min'			=>	'0',
								'max'			=>	'99',
								'maxlength'		=>	'2',
								'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
								'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
							);
	$tempo_atividade_meses	=	array(
								'id'			=>	'tempo_atividade_meses',
								'name'			=>	'tempo_atividade_meses',
								'type'			=>	'number',
								'class'			=>	'form-control',
								'value'			=>	set_value("tempo_atividade_meses",$familiar->tempo_atividade_meses),
								'placeholder'	=>	'Mês(es)',
								'min'			=>	'0',
								'max'			=>	'11',
								'maxlength'		=>	'2',
								'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
								'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
							);
	$renda				=	array(
								'id'			=>	'renda',
								'name'			=>	'renda',
								'type'			=>	'text',
								'class'			=>	'form-control',
								'value'			=>	set_value("renda", number_format($familiar->renda, 2, ',', '.')),
								'placeholder'	=>	'0,00',
								'maxlength'		=>	'14',
								'onkeypress'	=>	"return moeda(this);"
							);
	$deficiencia		=	array(
								'id'			=>	'ce_deficiencia',
								'name'			=>	'ce_deficiencia',
								'class'			=>	'form-control'
							);
	$cid				=	array(
								'id'			=>	'cid',
								'name'			=>	'cid',
								'type'			=>	'text',
								'class'			=>	'form-control',
								'value'			=>	set_value("cid", $familiar->cid),
								'placeholder'	=>	'',
								'style'			=>  'text-transform: uppercase', 
								'maxlength'		=>	'50'
							);

?>
<!-- Conteúdo -->
<div class="container container-sistema questionario">
	<div class="row">
		<div class="col-12">
			<?= form_open($consultar, $form_attr); ?>
				<div class="card border border-gray-light">
					<div class="card-header bg-brand-primary fc-white m-1">
						<h5><i class="fas fa-user"></i>&nbsp;&nbsp;Editar Componente Familiar</h5>
					</div>
					<div class="card-body">
						<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>
						<div class="form-group row">
							<?= form_label('Nome:', 'nome', $label2); ?>
							<div class="col-5">
								<?= form_input($nome); ?>
								<font color="red"><?= form_error('nome'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Data de Nascimento:', 'dt_nascimento', $label2); ?>
							<div class="col-3">
								<?= form_input($dt_nascimento); ?>
								<font color="red"><?= form_error('dt_nascimento'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Sexo:', 'sexo', $label2); ?>
							<div class="col-4 form-inline">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="sexo_m" name="sexo" value="M" required <?= ($familiar->sexo == 'M') ? 'checked' : ''; ?>>
									<label class="custom-control-label" for="sexo_m">Masculino</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="sexo_f" name="sexo" value="F" required <?= ($familiar->sexo == 'F') ? 'checked' : ''; ?>>
									<label class="custom-control-label" for="sexo_f">Feminino</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Grau de Parentesco:', 'ce_grau_parentesco', $label2); ?>
							<div class="col-5">
								<?= form_dropdown('ce_grau_parentesco', $opt_grau_parentesco, $familiar->ce_grau_parentesco, $grau_parentesco); ?>
								<font color="red"><?= form_error('ce_grau_parentesco'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Escolaridade:', 'ce_escolaridade', $label2); ?>
							<div class="col-5">
								<?= form_dropdown('ce_escolaridade', $opt_escolaridade, $familiar->ce_escolaridade, $escolaridade); ?>
								<font color="red"><?= form_error('ce_escolaridade'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Escola/bairro:', 'escola_bairro', $label2); ?>
							<div class="col-5">
								<?= form_input($escola); ?>
								<font color="red"><?= form_error('escola_bairro'); ?></font>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Atividade Remunerada?', 'sn_atividade_remunerada', $label2); ?>
							<div class="col form-inline">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_s" name="sn_atividade_remunerada" value="S" <?= ($familiar->sn_atividade_remunerada == 'S') ? 'checked' : ''; ?>>
									<label class="custom-control-label" for="sn_atividade_remunerada_s">Sim</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_n" name="sn_atividade_remunerada" value="N" <?= ($familiar->sn_atividade_remunerada != 'S') ? 'checked' : ''; ?>>
									<label class="custom-control-label" for="sn_atividade_remunerada_n">Não</label>
								</div>
							</div>
						</div>
						<div class="bg-light opt-atividade-remunerada <?= ($familiar->sn_atividade_remunerada != 'S') ? 'd-none' : ''; ?>">
							<div class="form-group row align-items-center">
								<?= form_label('Atividade Desenvolvida:', 'ce_atividade_desenvolvida', $label4); ?>
								<div class="col-4 mt-2">
									<?= form_dropdown('ce_atividade_desenvolvida', $opt_atividade_desenvolvida, $familiar->ce_atividade_desenvolvida, $atividade); ?>
									<font color="red"><?= form_error('ce_atividade_desenvolvida'); ?></font>
								</div>
							</div>
							<div class="form-group row align-items-center">
								<?= form_label('Tipo de Vínculo:', 'ce_tipo_vinculo', $label4); ?>
								<!-- <div class="col-4">
									<?= form_input($tipo_vinculo); ?>
									<font color="red"><?= form_error('tipo_vinculo'); ?></font>
								</div> -->
								<div class="col-3">
									<?= form_dropdown('ce_tipo_vinculo', $opt_tipo_vinculo, $familiar->ce_tipo_vinculo, $tipo_vinculo); ?>
									<font color="red"><?= form_error('ce_tipo_vinculo'); ?></font>
								</div>
							</div>
							<div class="form-group row align-items-center">
								<?= form_label('Tempo:', 'tempo_atividade_anos', $label4); ?>
								<div class="col-1">
									<?= form_input($tempo_atividade_anos); ?>
									<font color="red"><?= form_error('tempo_atividade_anos'); ?></font>
								</div>
								<?= form_label(' ano(s)', 'tempo_atividade_anos', $label0); ?>
								<div class="col-1">
									<?= form_input($tempo_atividade_meses); ?>
									<font color="red"><?= form_error('tempo_atividade_meses'); ?></font>
								</div>
								<?= form_label(' mês(es)', 'tempo_atividade_meses', $label0); ?>
							</div>
							<div class="form-group row pb-2">
								<?= form_label('Renda:', 'renda', $label4); ?>
								<div class="col-2">
									<?= form_input($renda); ?>
									<font color="red"><?= form_error('renda'); ?></font>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<?= form_label('Possui Deficiência:', 'sn_deficiencia', $label2); ?>
							<div class="col form-inline">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="sn_deficiencia_s" name="sn_deficiencia" value="S" <?= ($familiar->sn_deficiencia == 'S') ? 'checked' : ''; ?>>
									<label class="custom-control-label" for="sn_deficiencia_s">Sim</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" class="custom-control-input" id="sn_deficiencia_n" name="sn_deficiencia" value="N" <?= ($familiar->sn_deficiencia != 'S') ? 'checked' : ''; ?>>
									<label class="custom-control-label" for="sn_deficiencia_n">Não</label>
								</div>
							</div>
						</div>
						<div class="bg-light opt-deficiencia <?= ($familiar->sn_deficiencia != 'S') ? 'd-none' : ''; ?>">
							<div class="form-group row align-items-center">
								<?= form_label('Qual?', 'ce_deficiencia', $label4); ?>
								<div class="col-4 mt-2">
									<?= form_dropdown('ce_deficiencia', $opt_deficiencia, $familiar->ce_deficiencia, $deficiencia); ?>
									<font color="red"><?= form_error('ce_deficiencia'); ?></font>
								</div>
							</div>
							<div class="form-group row pb-2">
								<?= form_label('CID:', 'cid', $label4); ?>
								<div class="col-3">
									<?= form_input($cid); ?>
									<font color="red"><?= form_error('cid'); ?></font>
								</div>
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
<!-- /Conteúdo -->