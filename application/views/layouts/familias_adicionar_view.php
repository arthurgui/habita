<?php
	//-- Template Table Slim
	$tmpl_sm	=	array (
						'table_open'			=>	'<table name="table-componente-familiar" class="table table-sm table-bordered table-condensed table-hover table-striped" style="text-align: center;"> ',
						'heading_row_start'		=>	'<tr class="heading">',
						'heading_row_end'		=>	'</tr>',
						'heading_cell_start'	=>	'<th style="text-align: center;">',
						'heading_cell_end'		=>	'</th>',
						'row_start'				=>	'<tr>',
						'row_end'				=>	'</tr>',
						'cell_start'			=>	'<td class="text-center">',
						'cell_end'				=>	'</td>',
						'row_alt_start'			=>	'<tr class="alt">',
						'row_alt_end'			=>	'</tr>',
						'cell_alt_start'		=>	'<td class="text-center">',
						'cell_alt_end'			=>	'</td>',
						'table_close'			=>	'</table>'
					);

	if ($religioes) {
		$opt_religiao[''] = "*** Selecione ***";
		foreach ($religioes as $r) {
			$opt_religiao[$r->id] = $r->descricao;
		}
	} else {
		$opt_religiao[''] = "*** Não há religiões cadastradas ***";
	}

	if ($racas) {
		$opt_raca[''] = "*** Selecione ***";
		foreach ($racas as $raca) {
			$opt_raca[$raca->id] = $raca->descricao;
		}
	} else {
		$opt_raca[''] = "*** Não há raças cadastradas ***";
	}

	if ($escolaridades) {
		$opt_escolaridade[''] = "*** SELECIONE ***";
		foreach ($escolaridades as $esc) {
			$opt_escolaridade[$esc->id] = $esc->descricao;
		}
	} else {
		$opt_escolaridade[''] = "*** Não há escolaridades cadastradas ***";
	}

	if ($estados_civis) {
		$opt_estado_civil[''] = "*** Selecione ***";
		foreach ($estados_civis as $est_civil) {
			$opt_estado_civil[$est_civil->id] = $est_civil->descricao;
		}
	} else {
		$opt_estado_civil[''] = "*** Não há estados civis cadastrados ***";
	}

	if ($atividades) {
		$opt_atividade_desenvolvida[''] = "*** Selecione ***";
		foreach ($atividades as $ativ) {
			$opt_atividade_desenvolvida[$ativ->id] = $ativ->descricao;
		}
	} else {
		$opt_atividade_desenvolvida[''] = "*** Não há atividades cadastrados ***";
	}

	if ($tipos_vinculo) {
		$opt_tipo_vinculo[''] = "*** Selecione ***";
		foreach ($tipos_vinculo as $vinculo) {
			$opt_tipo_vinculo[$vinculo->id] = $vinculo->descricao;
		}
	} else {
		$opt_tipo_vinculo[''] = "*** Não há tipos de vínculo cadastrados ***";
	}

	if ($deficiencias) {
		$opt_deficiencia[''] = "*** Selecione ***";
		foreach ($deficiencias as $defic) {
			$opt_deficiencia[$defic->id] = $defic->descricao;
		}
	} else {
		$opt_deficiencia[''] = "*** Não há deficiências cadastrados ***";
	}

	if ($bairros) {
		$opt_bairro[''] = "*** Selecione ***";
		foreach ($bairros as $b) {
			$opt_bairro[$b->id] = $b->descricao;
		}
	} else {
		$opt_bairro[''] = "*** Não há bairros cadastrados ***";
	}

	if ($graus_parentesco) {
		$opt_grau_parentesco[''] = "*** SELECIONE ***";
		foreach ($graus_parentesco as $grau) {
			$opt_grau_parentesco[$grau->id] = $grau->descricao;
		}
	} else {
		$opt_grau_parentesco[''] = "*** Não há graus de parentesco cadastrados ***";
	}

	if ($faixas_renda) {
		$opt_faixa_renda[''] = "*** Selecione ***";
		foreach ($faixas_renda as $faixa) {
			$opt_faixa_renda[$faixa->id] = $faixa->descricao;
		}
	} else {
		$opt_faixa_renda[''] = "*** Não há tipos de renda cadastrados ***";
	}

	if ($formas_ocupacao) {
		$opt_forma_ocupacao[''] = "*** Selecione ***";
		foreach ($formas_ocupacao as $forma) {
			$opt_forma_ocupacao[$forma->id] = $forma->descricao;
		}
	} else {
		$opt_forma_ocupacao[''] = "*** Não há formas de ocupação cadastradas ***";
	}

	if ($tipos_uso_imovel) {
		$opt_tipo_uso_imovel[''] = "*** Selecione ***";
		foreach ($tipos_uso_imovel as $uso) {
			$opt_tipo_uso_imovel[$uso->id] = $uso->descricao;
		}
	} else {
		$opt_tipo_uso_imovel[''] = "*** Não há tipos de uso de imóvel cadastrados ***";
	}

	if ($tipos_construcao) {
		$opt_tipo_construcao[''] = "*** Selecione ***";
		foreach ($tipos_construcao as $construcao) {
			$opt_tipo_construcao[$construcao->id] = $construcao->descricao;
		}
	} else {
		$opt_tipo_construcao[''] = "*** Não há tipos de construção cadastrados ***";
	}

	if ($tipos_abastecimentos) {
		$opt_tipo_abastecimento[''] = "*** Selecione ***";
		foreach ($tipos_abastecimentos as $agua) {
			$opt_tipo_abastecimento[$agua->id] = $agua->descricao;
		}
	} else {
		$opt_tipo_abastecimento[''] = "*** Não há tipos de abastecimento de água cadastrados ***";
	}

	if ($destinos_lixo) {
		$opt_destino_lixo[''] = "*** Selecione ***";
		foreach ($destinos_lixo as $destino) {
			$opt_destino_lixo[$destino->id] = $destino->descricao;
		}
	} else {
		$opt_destino_lixo[''] = "*** Não há tipos de destino de lixo cadastrados ***";
	}

	if ($motivos_cadastro) {
		$opt_motivo_cadastro[''] = "*** Selecione ***";
		foreach ($motivos_cadastro as $motivo) {
			$opt_motivo_cadastro[$motivo->id] = $motivo->descricao;
		}
	} else {
		$opt_motivo_cadastro[''] = "*** Não há motivos cadastrados ***";
	}

	if ($origens_cadastro) {
		$opt_origem_cadastro[''] = "*** Selecione ***";
		foreach ($origens_cadastro as $origem) {
			$opt_origem_cadastro[$origem->id] = $origem->descricao;
		}
	} else {
		$opt_origem_cadastro[''] = "*** Não há origens cadastradas ***";
	}

	if ($programas_habitacionais) {
		$opt_programa_habitacional[''] = "*** Selecione ***";
		foreach ($programas_habitacionais as $programa) {
			$opt_programa_habitacional[$programa->id] = $programa->descricao;
		}
	} else {
		$opt_programa_habitacional[''] = "*** Não há programas habitacionais cadastrados ***";
	}

	// Titular
		$cpf				=	array(
									'id'			=>	'cpf',
									'name'			=>	'cpf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("cpf", $familia->cpf),
									'placeholder'	=>	'000.000.000-00',
									'readonly'		=>	'',
									'onblur'        =>   "verificaCPF(this);",
									'onkeypress'	=>	"return txtBoxFormat(this, \'999.999.999-99\', event);",
									'maxlength'		=>	'14'
									
								);
		$titular			=	array(
									'id'			=>	'titular',
									'name'			=>	'titular',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("titular"),
									'placeholder'	=>	'',
									'maxlength'		=>	'100',
									'data-e'		=>	'100',
									'required'		=>	'',
									'style'			=>  'text-transform: uppercase' 
								);
		$dt_nascimento		=	array(
									'id'			=>	'dt_nascimento',
									'name'			=>	'dt_nascimento',
									'type'			=>	'date',
									'class'			=>	'form-control',
									'max'			=>	date('Y-m-d'),
									'value'			=>	set_value("dt_nascimento"),
									'maxlength'		=>	'10',
									'required'		=>	''
								);
		$rg					=	array(
									'id'			=>	'rg',
									'name'			=>	'rg',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("rg"),
									'placeholder'	=>	'',
									'maxlength'		=>	'11',
									'onkeypress'	=>	"return txtBoxFormat(this, '99999999', event);",
									'style'			=>  'text-transform: uppercase', 
									'required'		=>	''
								);
		$rg_org_emissor		=	array(
									'id'			=>	'rg_org_emissor',
									'name'			=>	'rg_org_emissor',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("rg_org_emissor"),
									'placeholder'	=>	'',
									'maxlength'		=>	'5',
									'required'		=>	'',
									'style'			=>  'text-transform: uppercase' 
								);
		$rg_uf 				=	array(
									'id'			=>	'rg_uf',
									'name'			=>	'rg_uf',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$religiao			=	array(
									'id'			=>	'ce_religiao',
									'name'			=>	'ce_religiao',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$raca				=	array(
									'id'			=>	'ce_raca',
									'name'			=>	'ce_raca',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$escolaridade		=	array(
									'id'			=>	'ce_escolaridade',
									'name'			=>	'ce_escolaridade',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$estado_civil		=	array(
									'id'			=>	'ce_estado_civil',
									'name'			=>	'ce_estado_civil',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$telefone_res		=	array(
									'id'			=>	'telefone_res',
									'name'			=>	'telefone_res',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("telefone_res"),
									'placeholder'	=>	'(99) 99999-9999',
									'maxlength'		=>	'15',
									'onkeypress'	=>	"return txtBoxFormat(this, '(99) 9999-9999', event);"
								);
		$telefone_cel		=	array(
									'id'			=>	'telefone_cel',
									'name'			=>	'telefone_cel',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("telefone_cel"),
									'placeholder'	=>	'(99) 99999-9999',
									'maxlength'		=>	'15',
									'onkeypress'	=>	"return txtBoxFormat(this, '(99) 99999-9999', event);"
								);
		$atividade			=	array(
									'id'			=>	'ce_atividade_desenvolvida',
									'name'			=>	'ce_atividade_desenvolvida',
									'class'			=>	'form-control'
								);
		$tipo_vinculo		=	array(
									'id'			=>	'ce_tipo_vinculo',
									'name'			=>	'ce_tipo_vinculo',
									'class'			=>	'form-control'
								);
		$tempo_atividade_anos	=	array(
									'id'			=>	'tempo_atividade_anos',
									'name'			=>	'tempo_atividade_anos',
									'type'			=>	'text ',
									'class'			=>	'form-control',
									'value'			=>	set_value("tempo_atividade_anos"),
									'placeholder'	=>	'Ano(s)',
									'min'			=>	'0',
									'max'			=>	'99',
									'maxlength'		=>	'2',
									//'required'		=>	'',
									'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
							);
		$tempo_atividade_meses	=	array(
									'id'			=>	'tempo_atividade_meses',
									'name'			=>	'tempo_atividade_meses',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("tempo_atividade_meses"),
									'placeholder'	=>	'Mês(es)',
									'min'			=>	'0',
									'max'			=>	'12',
									'maxlength'		=>	'2',
									'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
								);
		$renda				=	array(
									'id'			=>	'renda',
									'name'			=>	'renda',
									'type'			=>	'text',
									'class'			=>	'form-control renda',
									'value'			=>	set_value("renda"),
									'placeholder'	=>	'',
									'maxlength'		=>	'14',
									'onkeyup'		=>	"return moeda(this);"
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
									'value'			=>	set_value("cid"),
									'placeholder'	=>	'',
									'maxlength'		=>	'50',
									'style'			=>  'text-transform: uppercase' 
								);
		$cep				=	array(
									'id'			=>	'cep',
									'name'			=>	'cep',
									'type'			=>	'text',
									'class'			=>	'form-control cep',
									'value'			=>	set_value("cep"),
									'placeholder'	=>	'00000-000',
									'maxlength'		=>	'9',
									'onkeyup'		=>	"return txtBoxFormat(this, '99999-999', event);",
									'required'		=>	'',
									'data-endereco'	=>	'#endereco',
									'data-bairro'	=>	'#bairro',
									'data-cidade'	=>	'#cidade',
									'data-uf'		=>	'#uf',
									'data-erro'		=>	'#erro'
 								);
		$endereco			=	array(
									'id'			=>	'endereco',
									'name'			=>	'endereco',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("endereco"),
									'placeholder'	=>	'',
									'maxlength'		=>	'60',
									'required'		=>	'',
									'style'			=>  'text-transform: uppercase' 
								);
		$numero				=	array(
									'id'			=>	'numero',
									'name'			=>	'numero',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("numero"),
									'placeholder'	=>	'',
									'maxlength'		=>	'10',
									'style'			=>  'text-transform: uppercase', 
									'required'		=>	''
								);
		$complemento		=	array(
									'id'			=>	'complemento',
									'name'			=>	'complemento',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("complemento"),
									'placeholder'	=>	'',
									'maxlength'		=>	'60',
									'style'			=>  'text-transform: uppercase' 
								);
		$referencia			=	array(
									'id'			=>	'referencia',
									'name'			=>	'referencia',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("referencia"),
									'placeholder'	=>	'',
									'maxlength'		=>	'60',
									'required'		=>	'',
									'style'			=>  'text-transform: uppercase' 
								);
		$bairro				=	array(
									'id'			=>	'ce_bairro',
									'name'			=>	'ce_bairro',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$cidade				=	array(
									'id'			=>	'cidade',
									'name'			=>	'cidade',
									'class'			=>	'form-control',
									'value'			=>	set_value("cidade", 'Cabedelo'),
									'readonly'		=>	'',
									'style'			=>  'text-transform: uppercase' 
								);
		$uf					=	array(
									'id'			=>	'uf',
									'name'			=>	'uf',
									'class'			=>	'form-control',
									'value'			=>	set_value("uf", 'PB'),
									'readonly'		=>	''
								);

	// Conjuge
		$cpf_cj				=	array(
									'id'			=>	'cpf_cj',
									'name'			=>	'cpf_cj',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("cpf_cj"),
									'placeholder'	=>	'000.000.000-00',
									'maxlength'		=>	'14',
									'onkeypress'	=>	"return txtBoxFormat(this, '999.999.999-99', event);",
									'onkeyup'		=>	'verificaCPF(this)',
									'oninvalid'		=>	"setCustomValidity('Informe o CPF.')",
									'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onblur' 		=>  "verificaCPF(this);",
							);
		$conjuge			=	array(
									'id'			=>	'conjuge',
									'name'			=>	'conjuge',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("conjuge"),
									'placeholder'	=>	'',
									'maxlength'		=>	'100',
									'style'			=>  'text-transform: uppercase' 
								);
		$dt_nascimento_cj	=	array(
									'id'			=>	'dt_nascimento_cj',
									'name'			=>	'dt_nascimento_cj',
									'type'			=>	'date',
									'class'			=>	'form-control',
									'max'			=>	date('Y-m-d'),
									'value'			=>	set_value("dt_nascimento_cj"),
									'maxlength'		=>	'10',
									'style'			=>  'text-transform: uppercase' 
								);
		$rg_cj				=	array(
									'id'			=>	'rg_cj',
									'name'			=>	'rg_cj',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("rg_cj"),
									'placeholder'	=>	'',
									'maxlength'		=>	'20',
									'onkeypress'	=>	"return txtBoxFormat(this, '99999999999999999999', event);",
									'style'			=>  'text-transform: uppercase' 
								);
		$rg_org_emissor_cj	=	array(
									'id'			=>	'rg_org_emissor_cj',
									'name'			=>	'rg_org_emissor_cj',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("rg_org_emissor_cj"),
									'placeholder'	=>	'',
									'maxlength'		=>	'20',
									'style'			=>  'text-transform: uppercase' 
								);
		$rg_uf_cj 			=	array(
									'id'			=>	'rg_uf_cj',
									'name'			=>	'rg_uf_cj',
									'class'			=>	'form-control'
								);
		$raca_cj			=	array(
									'id'			=>	'ce_raca_cj',
									'name'			=>	'ce_raca_cj',
									'class'			=>	'form-control'
								);
		$escolaridade_cj	=	array(
									'id'			=>	'ce_escolaridade_cj',
									'name'			=>	'ce_escolaridade_cj',
									'class'			=>	'form-control'
								);
		$religiao_cj		=	array(
									'id'			=>	'ce_religiao_cj',
									'name'			=>	'ce_religiao_cj',
									'class'			=>	'form-control'
								);
		$estado_civil_cj	=	array(
									'id'			=>	'ce_estado_civil_cj',
									'name'			=>	'ce_estado_civil_cj',
									'class'			=>	'form-control'
								);
		$telefone_cj_res		=	array(
									'id'			=>	'telefone_cj_res',
									'name'			=>	'telefone_cj_res',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("telefone_cj_res"),
									'placeholder'	=>	'(99) 99999-9999',
									'maxlength'		=>	'15',
									'onkeypress'	=>	"return txtBoxFormat(this, '(99) 99999-9999', event);"
								);
		$telefone_cj_cel		=	array(
									'id'			=>	'telefone_cj_cel',
									'name'			=>	'telefone_cj_cel',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("telefone_cj_cel"),
									'placeholder'	=>	'(99) 99999-9999',
									'maxlength'		=>	'15',
									'onkeypress'	=>	"return txtBoxFormat(this, '(99) 99999-9999', event);"
								);
		$atividade_cj		=	array(
									'id'			=>	'ce_atividade_desenvolvida_cj',
									'name'			=>	'ce_atividade_desenvolvida_cj',
									'class'			=>	'form-control'
								);
		$tempo_atividade_cj_anos	=	array(
									'id'			=>	'tempo_atividade_cj_anos',
									'name'			=>	'tempo_atividade_cj_anos',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("tempo_atividade_cj_anos"),
									'placeholder'	=>	'Ano',
									'min'			=>  '0',
									'max'			=>  '99',
									'maxlength'		=>	'2',
									//'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
								);
		$tempo_atividade_cj_meses	=	array(
									'id'			=>	'tempo_atividade_cj_meses',
									'name'			=>	'tempo_atividade_cj_meses',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("tempo_atividade_cj_meses"),
									'placeholder'	=>	'Mês(es)',
									'maxlength'		=>	'2',
									'min'			=>  '0',
									'max'			=>  '12',
									'maxlength'		=>	'2',
									//'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
								);
		$tipo_vinculo_cj	=	array(
									'id'			=>	'ce_tipo_vinculo_cj',
									'name'			=>	'ce_tipo_vinculo_cj',
									'class'			=>	'form-control'
									/*'type'			=>	'text',
									'value'			=>	set_value("ce_tipo_vinculo_cj"),
									'placeholder'	=>	'',
									'maxlength'		=>	'20'*/
								);
		$renda_cj			=	array(
									'id'			=>	'renda_cj',
									'name'			=>	'renda_cj',
									'type'			=>	'text',
									'class'			=>	'form-control renda_cj',
									'value'			=>	set_value("renda_cj"),
									'placeholder'	=>	'',
									'maxlength'		=>	'14',
									'onkeyup'		=>	"return moeda(this);"
								);
		$deficiencia_cj		=	array(
									'id'			=>	'ce_deficiencia_cj',
									'name'			=>	'ce_deficiencia_cj',
									'class'			=>	'form-control'
								);
		$cid_cj				=	array(
									'id'			=>	'cid_cj',
									'name'			=>	'cid_cj',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("cid_cj"),
									'placeholder'	=>	'',
									'style'			=>  'text-transform: uppercase', 
									'maxlength'		=>	'50'
								);

	// Composição Famíliar
		$nome_cf			=	array(
									'id'			=>	'inc_nome_cf',
									'name'			=>	'inc_nome_cf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("inc_nome_cf"),
									'placeholder'	=>	'',
									'maxlength'		=>	'100',
									'style'			=>  'text-transform: uppercase' 
								);
		$dt_nascimento_cf	=	array(
									'id'			=>	'inc_dt_nascimento_cf',
									'name'			=>	'inc_dt_nascimento_cf',
									'type'			=>	'date',
									'class'			=>	'form-control',
									'max'			=>	date('Y-m-d'),
									'value'			=>	set_value("inc_dt_nascimento_cf"),
									'maxlength'		=>	'10'
								);
		$grau_parentesco_cf	=	array(
									'id'			=>	'inc_ce_grau_parentesco_cf',
									'name'			=>	'inc_ce_grau_parentesco_cf',
									'class'			=>	'form-control'
								);
		$escolaridade_cf	=	array(
									'id'			=>	'inc_ce_escolaridade_cf',
									'name'			=>	'inc_ce_escolaridade_cf',
									'class'			=>	'form-control',
									'style'			=>  'text-transform: uppercase'
								);
		$escola_cf			=	array(
									'id'			=>	'inc_escola_cf',
									'name'			=>	'inc_escola_cf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("inc_escola_cf"),
									'placeholder'	=>	'',
									'style'			=>  'text-transform: uppercase', 
									'maxlength'		=>	'100'
								);
		$tipo_vinculo_cf	=	array(
									'id'			=>	'inc_ce_tipo_vinculo_cf',
									'name'			=>	'inc_ce_tipo_vinculo_cf',
									'class'			=>	'form-control'
								);
		$atividade_cf		=	array(
									'id'			=>	'inc_ce_atividade_desenvolvida_cf',
									'name'			=>	'inc_ce_atividade_desenvolvida_cf',
									'class'			=>	'form-control'
								);
		$tempo_atividade_cf_anos	=	array(
									'id'			=>	'inc_tempo_atividade_anos_cf',
									'name'			=>	'inc_tempo_atividade_anos_cf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("inc_tempo_atividade_anos_cf"),
									'placeholder'	=>	'Ano(s)',
									'min'			=>  '0',
									'max'			=>  '99',
									'maxlength'		=>	'2',
									//'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
								);
		$tempo_atividade_cf_meses	=	array(
									'id'			=>	'inc_tempo_atividade_meses_cf',
									'name'			=>	'inc_tempo_atividade_meses_cf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("inc_tempo_atividade_meses_cf"),
									'placeholder'	=>	'Mês(es)',
									'maxlength'		=>	'2',
									'min'			=>  '0',
									'max'			=>  '12',
									//'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
									'onkeypress'	=>	"return txtBoxFormat(this, '99', event);"
								);
		$renda_cf			=	array(
									'id'			=>	'inc_renda_cf',
									'name'			=>	'inc_renda_cf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("inc_renda_cf"),
									'placeholder'	=>	'',
									'maxlength'		=>	'14',
									'onkeyup'		=>	"return moeda(this);"
								);
		$deficiencia_cf		=	array(
									'id'			=>	'inc_ce_deficiencia_cf',
									'name'			=>	'inc_ce_deficiencia_cf',
									'class'			=>	'form-control'
								);
		$cid_cf				=	array(
									'id'			=>	'inc_cid_cf',
									'name'			=>	'inc_cid_cf',
									'type'			=>	'text',
									'class'			=>	'form-control',
									'value'			=>	set_value("inc_cid_cf"),
									'placeholder'	=>	'',
									'style'			=>  'text-transform: uppercase', 
									'maxlength'		=>	'50'
								);

	// Trabalho e Renda
		$faixa_renda			=	array(
										'id'			=>	'ce_faixa_renda',
										'name'			=>	'ce_faixa_renda',
										'class'			=>	'form-control',
										'readonly'		=> '',
										'disabled'		=>	(($familia->sn_conjuge != 'S') ? 'true' : 'false')

									);
		$vlr_bolsa_familia		=	array(
										'id'			=>	'vlr_bolsa_familia',
										'name'			=>	'vlr_bolsa_familia',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("vlr_bolsa_familia"),
										'placeholder'	=>	'0,00',
										'maxlength'		=>	'14',
										'onkeyup'		=>	"return moeda(this);"
									);
		$vlr_auxilio_aluguel		=	array(
										'id'			=>	'vlr_auxilio_aluguel',
										'name'			=>	'vlr_auxilio_aluguel',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("vlr_auxilio_aluguel"),
										'placeholder'	=>	'0,00',
										'min'			=>	'1,00',
										'maxlength'		=>	'14',
										//'required'      =>  '',
										'onkeyup'		=>	"return moeda(this);"
									);
		$vlr_bpc				=	array(
										'id'			=>	'vlr_bpc',
										'name'			=>	'vlr_bpc',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("vlr_bpc"),
										'placeholder'	=>	'0,00',
										'maxlength'		=>	'14',
										'onkeyup'		=>	"return moeda(this);"
									);
		$vlr_peti				=	array(
										'id'			=>	'vlr_peti',
										'name'			=>	'vlr_peti',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("vlr_peti"),
										'placeholder'	=>	'0,00',
										'maxlength'		=>	'14',
										'onkeyup'		=>	"return moeda(this);"
									);
		$vlr_outros_beneficios	=	array(
										'id'			=>	'vlr_outros_beneficios',
										'name'			=>	'vlr_outros_beneficios',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("vlr_outros_beneficios"),
										'placeholder'	=>	'0,00',
										'maxlength'		=>	'14',
										'onkeyup'		=>	"return moeda(this);"
									);
		$desc_outros_beneficios	=	array(
										'id'			=>	'descricao_outros_beneficios',
										'name'			=>	'descricao_outros_beneficios',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("descricao_outros_beneficios"),
										'placeholder'	=>	'',
										'style'			=>  'text-transform: uppercase', 
										'maxlength'		=>	'25'
									);
		$tempo_moradia_meses			=	array(
										'id'			=>	'tempo_moradia_meses',
										'name'			=>	'tempo_moradia_meses',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("tempo_moradia_meses"),
										'placeholder'	=>  'Mês(s)',
										'min'			=>  '1',
										'max'			=>  '12',
										'maxlength'		=>	'2',
										//'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
										'onkeypress'	=>	"return txtBoxFormat(this, '99', event);",
										'onkeyup'	=>	"return txtBoxFormat(this, '99', event);"
										//'onkeyup'		=>	"tamanho_campo(this)"
									);
		$tempo_moradia_anos			=	array(
										'id'			=>	'tempo_moradia_anos',
										'name'			=>	'tempo_moradia_anos',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("tempo_moradia_anos"),
										'placeholder'	=>	'Ano(s)',
										'maxlength'		=>	'2',
										'min'			=>  '0',
										'max'			=>  '99',
										'maxlength'		=>	'2',
										//'onchange'		=>	"try{setCustomValidity('')}catch(e){}",
										'onkeyup'	=>	"return txtBoxFormat(this, '99', event);"
									);
		$vlr_aluguel			=	array(
										'id'			=>	'vlr_aluguel',
										'name'			=>	'vlr_aluguel',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("vlr_aluguel"),
										'placeholder'	=>	'0,00',
										'maxlength'		=>	'14',
										//'required'      =>  '',
										'onkeyup'		=>	"return moeda(this);"									
									);
		$forma_ocupacao			=	array(
										'id'			=>	'ce_forma_ocupacao',
										'name'			=>	'ce_forma_ocupacao',
										'class'			=>	'form-control',
										'required'		=>	''
									);
		$tipo_uso_imovel		=	array(
										'id'			=>	'ce_tipo_uso_imovel',
										'name'			=>	'ce_tipo_uso_imovel',
										'class'			=>	'form-control',
										'required'		=>	''
									);
		$tipo_construcao		=	array(
										'id'			=>	'ce_tipo_construcao',
										'name'			=>	'ce_tipo_construcao',
										'class'			=>	'form-control',
										'required'		=>	''
									);

	// Saúde
		$num_pessoas_doenca		=	array(
										'id'			=>	'num_pessoas_doenca',
										'name'			=>	'num_pessoas_doenca',
										'type'			=>	'number',
										'class'			=>	'form-control',
										'value'			=>	set_value("num_pessoas_doenca"),
										'placeholder'	=>	'0',
										'min'			=>	'1',
										'max'			=>	'20'
									);
		$doencas				=	array(
										'id'			=>	'doencas',
										'name'			=>	'doencas',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("doencas"),
										'placeholder'	=>	'',
										'style'			=>  'text-transform: uppercase', 
										'maxlength'		=>	'100'
									);
		$num_gestantes			=	array(
										'id'			=>	'num_gestantes',
										'name'			=>	'num_gestantes',
										'type'			=>	'number',
										'class'			=>	'form-control',
										'value'			=>	set_value("num_gestantes"),
										'placeholder'	=>	'',
										'min'			=>	'1',
										'max'			=>	'20'
									);
		$num_idosos				=	array(
										'id'			=>	'num_idosos',
										'name'			=>	'num_idosos',
										'type'			=>	'number',
										'class'			=>	'form-control',
										'value'			=>	set_value("num_idosos"),
										'placeholder'	=>	'',
										'min'			=>	'1',
										'max'			=>	'20'
									);
		$num_recem_nascidos		=	array(
										'id'			=>	'num_recem_nascidos',
										'name'			=>	'num_recem_nascidos',
										'type'			=>	'number',
										'class'			=>	'form-control',
										'value'			=>	set_value("num_recem_nascidos"),
										'placeholder'	=>	'',
										'min'			=>	'1',
										'max'			=>	'20'
									);
		$psf					=	array(
										'id'			=>	'psf',
										'name'			=>	'psf',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("psf"),
										'style'			=>  'text-transform: uppercase', 
										'maxlength'		=>	'50',
										'style'			=>  'text-transform: uppercase'
									);
		$agente_familia			=	array(
										'id'			=>	'agente_familia',
										'name'			=>	'agente_familia',
										'type'			=>	'text',
										'class'			=>	'form-control',
										'value'			=>	set_value("agente_familia"),
										'style'			=>  'text-transform: uppercase', 
										'maxlength'		=>	'60'
									);
		$abastecimento			=	array(
										'id'			=>	'ce_tipo_abastecimento_agua',
										'name'			=>	'ce_tipo_abastecimento_agua',
										'class'			=>	'form-control',
										'required'		=>	''
									);
		$destino_lixo			=	array(
										'id'			=>	'ce_destino_lixo',
										'name'			=>	'ce_destino_lixo',
										'class'			=>	'form-control',
										'required'		=>	''
									);

	// Outros
		$motivo_cadastro	=	array(
									'id'			=>	'ce_motivo_cadastro',
									'name'			=>	'ce_motivo_cadastro',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$origem_cadastro	=	array(
									'id'			=>	'ce_origem_cadastro',
									'name'			=>	'ce_origem_cadastro',
									'class'			=>	'form-control',
									'required'		=>	''
								);
		$observacoes 		=	array(
									'id'			=>	'observacoes',
									'name'			=>	'observacoes',
									'class'			=>	'form-control',
									'value'			=>	set_value("observacoes"),
									'rows'			=>	'4',
									'cols'			=>	'45',
									'style'			=>  'text-transform: uppercase' 
								);
		$programa_habitacional	=	array(
									'id'			=>	'ce_programa_habitacional',
									'name'			=>	'ce_programa_habitacional',
									'class'			=>	'form-control'
									//'required'		=>	''
								);
?>
<!-- Conteúdo -->
<div class="container container-sistema questionario">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-brand-primary fc-white">
					<h5><i class="fas fa-question-circle"></i>&nbsp;&nbsp;Questionário Sociodemográfico</h5>
				</div>
				<div class="card-body">
					<nav class="pb-4">
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
							<a class="nav-item nav-link tabelas disabled active" id="nav-titular-tab" data-toggle="tab" href="#nav-titular" role="tab" aria-controls="nav-titular" aria-selected="true">1. Titular</a>
							<a class="nav-item nav-link tabelas disabled" id="nav-conjuge-tab" data-toggle="tab" href="#nav-conjuge" role="tab" aria-controls="nav-conjuge" aria-selected="false">2. Cônjuge</a>
							<a class="nav-item nav-link tabelas disabled" id="nav-familiar-tab" data-toggle="tab" href="#nav-familiar" role="tab" aria-controls="nav-familiar" aria-selected="false">3. Composição Familiar</a>
							<a class="nav-item nav-link tabelas disabled " id="nav-renda-tab" data-toggle="tab" href="#nav-renda" role="tab" aria-controls="nav-renda" aria-selected="false">4. Trabalho e Renda</a>
							<a class="nav-item nav-link tabelas disabled " id="nav-saude-tab" data-toggle="tab" href="#nav-saude" role="tab" aria-controls="nav-saude" aria-selected="false">5. Saúde e Ambiente</a>
							<a class="nav-item nav-link tabelas disabled" id="nav-outros-tab" data-toggle="tab" href="#nav-outros" role="tab" aria-controls="nav-outros" aria-selected="false">6. Outros</a>
						</div>
					</nav>
				</div>
					<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>

					<?= form_open($salvar, $form_attr); ?>
						<div class="tab-content" id="nav-tabContent">
							<input type="hidden" id="vlr_renda_total" name="vlr_renda_total" value="0">
							<!-- Cadastro do Titular -->
							<div class="tab-pane fade show active" id="nav-titular" role="tabpanel" aria-labelledby="nav-titular-tab">
								<?= ($this->session->flashdata('salvar')) ? $this->session->flashdata('salvar') : ''; ?>

								<!-- CPF -->
								<div class="form-group row align-items-center mt-4 pb-4">
									<?= form_label('CPF:', 'cpf', $label2); ?>
									<div class="col-3">
										<?= form_input($cpf); ?>
										<font color="red"><?= form_error('cpf'); ?></font>
									</div>
									<a class="btn btn-primary" href=<?= base_url($consultar); ?>>
										<i class="fas fa-search"></i>&nbsp;Consultar Novo
									</a>
								</div>
								<div class="form-group row mt-3">
									<?= form_label('Nome:', 'titular', $label2); ?>
									<div class="col-6">
										<?= form_input($titular); ?>
										<span class='font-weight-light text-danger msg-erro msg-nome'></span>
										<font color="red"><?= form_error('titular', '<div class="error">', '</div>'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Data de Nascimento:', 'dt_nascimento', $label2); ?>
									<div class="col-3">
										<?= form_input($dt_nascimento); ?>
										<font color="red"><?= form_error('dt_nascimento'); ?></font>
									</div>
								</div>
								<div class="form-group row align-items-center">
									<?= form_label('RG:', 'rg', $label2); ?>
									<div class="col-2">
										<?= form_input($rg); ?>
										<font color="red"><?= form_error('rg'); ?></font>
									</div>
									<?= form_label('Órgão Emissor:', 'rg_org_emissor', $label2); ?>
									<div class="col-2">
										<?= form_input($rg_org_emissor); ?>
										<font color="red"><?= form_error('rg_org_emissor'); ?></font>
									</div>
									<?= form_label('UF:', 'rg_uf', $label1); ?>
									<div class="col-2">
										<?= form_dropdown('rg_uf', $opt_uf, 'PB', $rg_uf); ?>
										<font color="red"><?= form_error('rg_uf'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Sexo:', 'sexo', $label2); ?>
									<div class="col-4 form-inline">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sexo_m" name="sexo" value="M" required checked>
											<label class="custom-control-label" for="sexo_m">Masculino</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sexo_f" name="sexo" value="F" required>
											<label class="custom-control-label" for="sexo_f">Feminino</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Raça/Cor:', 'ce_raca', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_raca', $opt_raca, '', $raca); ?>
										<font color="red"><?= form_error('ce_raca', '<div class="error">', '</div>'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Escolaridade:', 'ce_escolaridade', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_escolaridade', $opt_escolaridade, '', $escolaridade); ?>
										<font color="red"><?= form_error('ce_escolaridade'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Religião:', 'ce_religiao', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_religiao', $opt_religiao, '', $religiao); ?>
										<font color="red"><?= form_error('ce_religiao'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Estado Civil:', 'ce_estado_civil', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_estado_civil', $opt_estado_civil, '', $estado_civil); ?>
										<font color="red"><?= form_error('ce_estado_civil'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Telefone:', 'telefone_res', $label2); ?>
									<div class="col-3">
										<?= form_input($telefone_res); ?>
										<font color="red"><?= form_error('telefone_res'); ?></font>
									</div>
									<?= form_label('Celular:', 'telefone_cel', $label1); ?>
									<div class="col-3">
										<?= form_input($telefone_cel); ?>
										<font color="red"><?= form_error('telefone_cel'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Chefe de Família:', 'sn_chefe', $label2); ?>
									<div class="col form-inline">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_chefe_s" name="sn_chefe" value="S" required checked>
											<label class="custom-control-label" for="sn_chefe_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_chefe_n" name="sn_chefe" value="N" required>
											<label class="custom-control-label" for="sn_chefe_n">Não</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Atividade Remunerada?', 'sn_atividade_remunerada', $label2); ?>
									<div class="col form-inline">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_s" name="sn_atividade_remunerada" value="S" required>
											<label class="custom-control-label" for="sn_atividade_remunerada_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_n" name="sn_atividade_remunerada" value="N" required checked>
											<label class="custom-control-label" for="sn_atividade_remunerada_n">Não</label>
										</div>
									</div>
								</div>
								<div class="bg-light opt-atividade-remunerada d-none">
									<div class="form-group row align-items-center">
										<?= form_label('Atividade Desenvolvida:', 'ce_atividade_desenvolvida', $label4); ?>
										<div class="col-4 mt-2">
											<?= form_dropdown('ce_atividade_desenvolvida', $opt_atividade_desenvolvida, '', $atividade); ?>
											<font color="red"><?= form_error('ce_atividade_desenvolvida'); ?></font>
										</div>
									</div>
									<div class="form-group row align-items-center">
										<?= form_label('Tipo de Vínculo:', 'ce_tipo_vinculo', $label4); ?>
										<div class="col-3">
											<?= form_dropdown('ce_tipo_vinculo', $opt_tipo_vinculo,  set_value('ce_tipo_vinculo'), $tipo_vinculo); ?>
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
											<input type="radio" class="custom-control-input" id="sn_deficiencia_s" name="sn_deficiencia" value="S" required>
											<label class="custom-control-label" for="sn_deficiencia_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_deficiencia_n" name="sn_deficiencia" value="N" required checked>
											<label class="custom-control-label" for="sn_deficiencia_n">Não</label>
										</div>
									</div>
								</div>
								<div class="bg-light opt-deficiencia d-none">
									<div class="form-group row align-items-center">
										<?= form_label('Qual?', 'ce_deficiencia', $label4); ?>
										<div class="col-4 mt-2">
											<?= form_dropdown('ce_deficiencia', $opt_deficiencia, '', $deficiencia); ?>
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
								<!-- ENDEREÇO, COM BUSCA AUTOMATICA -->
								<fieldset class="border-top mt-4">
									<legend>Endereço</legend>
									<div class="form-group row">
										<?= form_label('CEP:', 'cep', $label2); ?>
										<div class="col-2">
											<?= form_input($cep); ?>
											<font color="red" id = "erro" ><?= form_error('cep'); ?></font>
										</div>
											<div class="col-2">
												<a class="btn btn-primary" href="http://www.buscacep.correios.com.br/sistemas/buscacep" target="_blank"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Busca CEP</a>
											</div>
									</div>
									<div class="form-group row">
										<?= form_label('Endereço:', 'endereco', $label2); ?>
										<div class="col-6">
											<?= form_input($endereco); ?>
											<font color="red"><?= form_error('endereco'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Número:', 'numero', $label2); ?>
										<div class="col-2">
											<?= form_input($numero); ?>
											<font color="red"><?= form_error('numero'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Complemento:', 'complemento', $label2); ?>
										<div class="col-4">
											<?= form_input($complemento); ?>
											<font color="red"><?= form_error('complemento'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Bairro:', 'ce_bairro', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_bairro', $opt_bairro, set_value('ce_bairro'), $bairro); ?>
											<font color="red"><?= form_error('ce_bairro'); ?></font>
										</div>
										<!-- <?= form_label('Bairro:', 'ce_bairro', $label2); ?>
										<div class="col-5">
											<?= form_input($bairro); ?>
											<font color="red"><?= form_error('ce_bairro'); ?></font>
										</div> -->
									</div>
									<div class="form-group row">
										<?= form_label('Cidade:', 'cidade', $label2); ?>
										<div class="col-4">
											<?= form_input($cidade); ?>
											<font color="red"><?= form_error('cidade'); ?></font>
										</div>
										<!-- <div class="col-4">
											<?= form_dropdown('ce_cidade', $opt_cidade, '1', $cidade); ?>
											<font color="red"><?= form_error('ce_cidade'); ?></font>
										</div> -->
									</div>
									<div class="form-group row">
										<?= form_label('UF:', 'uf', $label2); ?>
										<div class="col-2">
											<?= form_input($uf); ?>
											<!-- <?= form_dropdown('uf', $opt_uf, 'PB', $uf); ?> -->
											<font color="red"><?= form_error('uf'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Ponto de Referência:', 'referencia', $label2); ?>
										<div class="col-5">
											<?= form_input($referencia); ?>
											<font color="red"><?= form_error('referencia'); ?></font>
										</div>
									</div>
								</fieldset>

								<div class="form-group col border-top mt-4 pb-2"></div>

								<div class="form-group row justify-content-center">
									<button type="button" class="btn btn-primary next-step">Avançar</button>
								</div>
							</div>
							<!-- Cadastro do Cônjuge -->
							<div class="tab-pane fade" id="nav-conjuge" role="tabpanel" aria-labelledby="nav-conjuge-tab">
								<div class="form-group row mt-4">
									<?= form_label('Possui Cônjuge:', 'sn_conjuge', $label2); ?>
									<div class="col form-inline">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_conjuge_s" name="sn_conjuge" value="S" required>
											<label class="custom-control-label" for="sn_conjuge_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_conjuge_n" name="sn_conjuge" value="N" required checked>
											<label class="custom-control-label" for="sn_conjuge_n">Não</label>
										</div>
									</div>
								</div>

								<!-- CPF -->
								<div class="form-group row mt-2 pb-4 opt-conjuge d-none">
									<?= form_label('CPF:', 'cpf_cj', $label2); ?>
									<div class="col-3">
										<?= form_input($cpf_cj); ?>
										<!-- <p class="text-danger font-italic cj-error-msg d-none">CPF já cadastrado!</p> -->
										<font class="disabled" color="red" id="cpf_cnpj_erro"><?= form_error('cpf_cj'); ?></font>
									</div>
									<div class="col">
										<button class="btn btn-primary" type="button" onclick="consultarConjuge()">
											<i class="fas fa-search"></i>&nbsp;Consultar
										</button>
									</div>
								</div>
								<div class="alert alert-danger cj-error-msg d-none" role="alert">
									<i class="fa fa-times"></i>&nbsp;CPF já cadastrado!
								</div>
								<div class="form-group row justify-content-center d-none" id="labelLoadingCj">
									<i class="fas fa-spinner fa-pulse"></i>
								</div>
								<div class="opt-adicionar-conjuge d-none">
									<div class="form-group row mt-3">
										<?= form_label('Nome:', 'conjuge', $label2); ?>
										<div class="col-6">
											<?= form_input($conjuge); ?>
											<font color="red"><?= form_error('conjuge'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Data de Nascimento:', 'dt_nascimento_cj', $label2); ?>
										<div class="col-3">
											<?= form_input($dt_nascimento_cj); ?>
											<font color="red"><?= form_error('dt_nascimento_cj'); ?></font>
										</div>
									</div>
									<div class="form-group row align-items-center">
										<?= form_label('RG:', 'rg_cj', $label2); ?>
										<div class="col-2">
											<?= form_input($rg_cj); ?>
											<font color="red"><?= form_error('rg_cj'); ?></font>
										</div>
										<?= form_label('Órgão Emissor:', 'rg_org_emissor_cj', $label2); ?>
										<div class="col-2">
											<?= form_input($rg_org_emissor_cj); ?>
											<font color="red"><?= form_error('rg_org_emissor_cj'); ?></font>
										</div>
										<?= form_label('UF:', 'rg_uf_cj', $label1); ?>
										<div class="col-2">
											<?= form_dropdown('rg_uf_cj', $opt_uf, 'PB', $rg_uf_cj); ?>
											<font color="red"><?= form_error('rg_uf_cj'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Sexo:', 'sexo_cj', $label2); ?>
										<div class="col-4 form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sexo_cj_m" name="sexo_cj" value="M" checked>
												<label class="custom-control-label" for="sexo_cj_m">Masculino</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sexo_cj_f" name="sexo_cj" value="F">
												<label class="custom-control-label" for="sexo_cj_f">Feminino</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Raça/Cor:', 'ce_raca_cj', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_raca_cj', $opt_raca, '', $raca_cj); ?>
											<font color="red"><?= form_error('ce_raca_cj'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Escolaridade:', 'ce_escolaridade_cj', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_escolaridade_cj', $opt_escolaridade, '', $escolaridade_cj); ?>
											<font color="red"><?= form_error('ce_escolaridade_cj'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Religião:', 'ce_religiao_cj', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_religiao_cj', $opt_religiao, '', $religiao_cj); ?>
											<font color="red"><?= form_error('ce_religiao_cj'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Estado Civil:', 'ce_estado_civil_cj', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_estado_civil_cj', $opt_estado_civil, '', $estado_civil_cj); ?>
											<font color="red"><?= form_error('ce_estado_civil_cj'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Telefone:', 'telefone_cj_res', $label2); ?>
										<div class="col-3">
											<?= form_input($telefone_cj_res); ?>
											<font color="red"><?= form_error('telefone_cj_res'); ?></font>
										</div>
											<?= form_label('Celular:', 'telefone_cj_cel', $label1); ?>
											<div class="col-3">
												<?= form_input($telefone_cj_cel); ?>
												<font color="red"><?= form_error('telefone_cj_cel'); ?></font>
											</div>
									</div>
									<div class="form-group row">
										<?= form_label('Chefe de Família:', 'sn_chefe_cj', $label2); ?>
										<div class="col form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_chefe_cj_s" name="sn_chefe_cj" value="S">
												<label class="custom-control-label" for="sn_chefe_cj_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_chefe_cj_n" name="sn_chefe_cj" value="N" checked>
												<label class="custom-control-label" for="sn_chefe_cj_n">Não</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Atividade Remunerada?', 'sn_atividade_remunerada_cj', $label2); ?>
										<div class="col form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_cj_s" name="sn_atividade_remunerada_cj" value="S">
												<label class="custom-control-label" for="sn_atividade_remunerada_cj_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_cj_n" name="sn_atividade_remunerada_cj" value="N" checked>
												<label class="custom-control-label disabled" for="sn_atividade_remunerada_cj_n">Não</label>
											</div>
										</div>
									</div>
									<div class="bg-light opt-atividade-remunerada-cj d-none">
										<div class="form-group row align-items-center">
											<?= form_label('Atividade Desenvolvida:', 'ce_atividade_desenvolvida_cj', $label4); ?>
											<div class="col-4 mt-2">
												<?= form_dropdown('ce_atividade_desenvolvida_cj', $opt_atividade_desenvolvida, '', $atividade_cj); ?>
												<font color="red"><?= form_error('ce_atividade_desenvolvida_cj'); ?></font>
											</div>
										</div>
										<div class="form-group row align-items-center">
											<?= form_label('Tipo de Vínculo:', 'ce_tipo_vinculo_cj', $label4); ?>
											<div class="col-3">
												<?= form_dropdown('ce_tipo_vinculo_cj', $opt_tipo_vinculo,  set_value('ce_tipo_vinculo_cj'), $tipo_vinculo_cj); ?>
												<font color="red"><?= form_error('ce_tipo_vinculo_cj'); ?></font>
											</div>
										</div>
										<!-- <div class="form-group row align-items-center">
											<?= form_label('Tipo de Vínculo:', 'tipo_vinculo_cj', $label4); ?>
											<div class="col-4">
												<?= form_input($tipo_vinculo_cj); ?>
												<font color="red"><?= form_error('tipo_vinculo_cj'); ?></font>
											</div>
										</div> -->
										<div class="form-group row align-items-center">
												<?= form_label('Tempo:', 'tempo_atividade_cj_anos', $label4); ?>
											<div class="col-1">
												<?= form_input($tempo_atividade_cj_anos); ?>
												<font color="red"><?= form_error('tempo_atividade_cj_anos'); ?></font>
											</div>
											<?= form_label(' ano(s)', 'tempo_atividade_cj_anos', $label0); ?>
											<div class="col-1">
												<?= form_input($tempo_atividade_cj_meses); ?>
												<font color="red"><?= form_error('tempo_atividade_cj_meses'); ?></font>
											</div>
											<?= form_label(' mês(es)', 'tempo_atividade_cj_meses', $label0); ?>
										</div>
										<div class="form-group row pb-2">
											<?= form_label('Renda:', 'renda_cj', $label4); ?>
											<div class="col-2">
												<?= form_input($renda_cj); ?>
												<font color="red"><?= form_error('renda_cj'); ?></font>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Possui Deficiência:', 'sn_deficiencia_cj', $label2); ?>
										<div class="col form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_deficiencia_cj_s" name="sn_deficiencia_cj" value="S">
												<label class="custom-control-label" for="sn_deficiencia_cj_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_deficiencia_cj_n" name="sn_deficiencia_cj" value="N" checked>
												<label class="custom-control-label" for="sn_deficiencia_cj_n">Não</label>
											</div>
										</div>
									</div>
									<div class="bg-light opt-deficiencia-cj d-none">
										<div class="form-group row align-items-center">
											<?= form_label('Qual?', 'ce_deficiencia_cj', $label4); ?>
											<div class="col-4 mt-2">
												<?= form_dropdown('ce_deficiencia_cj', $opt_deficiencia, '', $deficiencia_cj); ?>
												<font color="red"><?= form_error('ce_deficiencia_cj'); ?></font>
											</div>
										</div>
										<div class="form-group row pb-2">
											<?= form_label('CID:', 'cid_cj', $label4); ?>
											<div class="col-3">
												<?= form_input($cid_cj); ?>
												<font color="red"><?= form_error('cid_cj'); ?></font>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group col border-top mt-4 pb-2"></div>

								<div class="form-group row justify-content-center">
									<button type="button" class="btn btn-success prev-step">Voltar</button>
									<button type="button" class="btn btn-primary next-step">Avançar</button>
								</div>
							</div>
							<!-- COMPOSIÇÃO FAMILIAR -->
							<div class="tab-pane fade" id="nav-familiar" role="tabpanel" aria-labelledby="nav-familiar-tab">
								<!-- CADASTRO COMPONENTE FAMILIAR -->
								<div class="card card-add-familiar mt-4 mb-4">
									<div class="card-header text-center">
										Cadastro de Componente Familiar
									</div>
									<div class="card-body">
										<input type="hidden" id="inc_id_cf" name="inc_id_cf" />
										<div class="form-group row">
											<?= form_label('Nome:', 'inc_nome_cf', $label2); ?>
											<div class="col-5">
												<?= form_input($nome_cf); ?>
												<font color="red"><?= form_error('inc_nome_cf'); ?></font>
											</div>
										</div>
										<div class="form-group row">
											<?= form_label('Data de Nascimento:', 'inc_dt_nascimento_cf', $label2); ?>
											<div class="col-3">
												<?= form_input($dt_nascimento_cf); ?>
												<font color="red"><?= form_error('inc_dt_nascimento_cf'); ?></font>
											</div>
										</div>

										<div class="form-group row">
											<?= form_label('Sexo:', 'inc_sexo_cf', $label2); ?>
											<div class="col-4 form-inline">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sexo_cf_m" name="inc_sexo_cf" value="M" required checked>
													<label class="custom-control-label" for="sexo_cf_m">Masculino</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sexo_cf_f" name="inc_sexo_cf" value="F" required>
													<label class="custom-control-label" for="sexo_cf_f">Feminino</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<?= form_label('Grau de Parentesco:', 'inc_ce_grau_parentesco_cf', $label2); ?>
											<div class="col-5">
												<?= form_dropdown('inc_ce_grau_parentesco_cf', $opt_grau_parentesco, '', $grau_parentesco_cf); ?>
												<font color="red"><?= form_error('inc_ce_grau_parentesco_cf'); ?></font>
											</div>
										</div>
										<div class="form-group row">
											<?= form_label('Escolaridade:', 'inc_ce_escolaridade_cf', $label2); ?>
											<div class="col-5">
												<?= form_dropdown('inc_ce_escolaridade_cf', $opt_escolaridade, '', $escolaridade_cf); ?>
												<font color="red"><?= form_error('inc_ce_escolaridade_cf'); ?></font>
											</div>
										</div>
										<div class="form-group row">
											<?= form_label('Escola/bairro:', 'inc_escola_cf', $label2); ?>
											<div class="col-5">
												<?= form_input($escola_cf); ?>
												<font color="red"><?= form_error('inc_escola_cf'); ?></font>
											</div>
										</div>
										<div class="form-group row">
											<?= form_label('Atividade Remunerada?', 'sn_atividade_remunerada_cf', $label2); ?>
											<div class="col form-inline">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_cf_s" name="inc_sn_atividade_remunerada_cf" value="S">
													<label class="custom-control-label" for="sn_atividade_remunerada_cf_s">Sim</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sn_atividade_remunerada_cf_n" name="inc_sn_atividade_remunerada_cf" value="N" checked>
													<label class="custom-control-label" for="sn_atividade_remunerada_cf_n">Não</label>
												</div>
											</div>
										</div>
										<div class="bg-light opt-atividade-remunerada-cf d-none">
											<div class="form-group row align-items-center">
												<?= form_label('Atividade Desenvolvida:', 'inc_ce_atividade_desenvolvida_cf', $label4); ?>
												<div class="col-4 mt-2">
													<?= form_dropdown('inc_ce_atividade_desenvolvida_cf', $opt_atividade_desenvolvida, '', $atividade_cf); ?>
													<font color="red"><?= form_error('inc_ce_atividade_desenvolvida_cf'); ?></font>
												</div>
											</div>
											<!-- <div class="form-group row align-items-center">
												<?= form_label('Tipo de Vínculo:', 'inc_tipo_vinculo_cf', $label4); ?>
												<div class="col-4">
													<?= form_input($tipo_vinculo_cf); ?>
													<font color="red"><?= form_error('inc_tipo_vinculo_cf'); ?></font>
												</div>
											</div> -->
											<div class="form-group row align-items-center">
												<?= form_label('Tipo de Vínculo:', 'inc_ce_tipo_vinculo_cf', $label4); ?>
												<div class="col-3">
													<?= form_dropdown('inc_ce_tipo_vinculo_cf', $opt_tipo_vinculo, '', $tipo_vinculo_cf); ?>
													<font color="red"><?= form_error('inc_ce_tipo_vinculo_cf'); ?></font>
												</div>
											</div>
											<div class="form-group row align-items-center">
													<?= form_label('Tempo:', 'inc_tempo_atividade_anos_cf', $label4); ?>
												<div class="col-1">
													<?= form_input($tempo_atividade_cf_anos); ?>
													<font color="red"><?= form_error('inc_tempo_atividade_anos_cf'); ?></font>
												</div>
												<?= form_label(' ano(s)', 'inc_tempo_atividade_anos_cf', $label0); ?>
												<div class="col-1">
													<?= form_input($tempo_atividade_cf_meses); ?>
													<font color="red"><?= form_error('inc_tempo_atividade_meses_cf'); ?></font>
												</div>
												<?= form_label(' mês(s)', 'inc_tempo_atividade_meses_cf', $label0); ?>
											</div>
											<div class="form-group row pb-2">
												<?= form_label('Renda:', 'inc_renda_cf', $label4); ?>
												<div class="col-2">
													<?= form_input($renda_cf); ?>
													<font color="red"><?= form_error('inc_renda_cf'); ?></font>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<?= form_label('Possui Deficiência:', 'inc_sn_deficiencia_cf', $label2); ?>
											<div class="col form-inline">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sn_deficiencia_cf_s" name="inc_sn_deficiencia_cf" value="S">
													<label class="custom-control-label" for="sn_deficiencia_cf_s">Sim</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sn_deficiencia_cf_n" name="inc_sn_deficiencia_cf" value="N" checked>
													<label class="custom-control-label" for="sn_deficiencia_cf_n">Não</label>
												</div>
											</div>
										</div>
										<div class="bg-light opt-deficiencia-cf d-none">
											<div class="form-group row align-items-center">
												<?= form_label('Qual?', 'inc_ce_deficiencia_cf', $label4); ?>
												<div class="col-4 mt-2">
													<?= form_dropdown('inc_ce_deficiencia_cf', $opt_deficiencia, '', $deficiencia_cf); ?>
													<font color="red"><?= form_error('inc_ce_deficiencia_cf'); ?></font>
												</div>
											</div>
											<div class="form-group row pb-2">
												<?= form_label('CID:', 'inc_cid_cf', $label4); ?>
												<div class="col-3">
													<?= form_input($cid_cf); ?>
													<font color="red"><?= form_error('inc_cid_cf'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-muted">
										<button class="btn btn-primary btn-add-cf" type="button" onclick="adicionarCF()">Adicionar</button>
										<button class="btn btn-primary btn-alt-cf d-none" type="button" onclick="alterarCF()">Alterar</button>
										<button class="btn btn-success btn-cancelar-cf d-none" type="button" onclick="limparCamposCF()">Cancelar</button>
									</div>
								</div>

								<div class="card-header border bar-btn-add-familiar mt-4 mb-4 d-none">
									<button class="btn btn-primary" type="button" onclick="showOptionsAddCF()"><i class="fa fa-plus"></i>&nbsp;Adicionar</button>
								</div>

								<?= form_hidden('qtd_familiares', '0'); ?>

								<?php
									$this->table->set_template($tmpl_sm);
									//-- Header Row
									$this->table->set_heading('Nome', 'Idade', 'Parentesco', 'Escolaridade', 'Escola/Bairro', 'Trabalha', 'Deficiência', 'Ações');

									if ($familiares) {
										foreach ($familiares as $componente) {
											$this->table->add_row(
												$componente->nome.toUpperCase(),
												$componente->idade,
												$componente->grau_parentesco,
												$componente->escolaridade,
												$componente->escola_bairro.toUpperCase(),
												$componente->trabalha,
												$componente->deficiencia,
												'<a class="btn btn-default btn-sm" href='. base_url("componente/editar/$componente->id") .' data-toggle="tooltip" title="Editar"><i class="fa fa-pen-square"></i></a>
												<a class="btn btn-default btn-sm btn-excluir-cf" data-id='. $componente->id .' data-toggle="modal" data-target="#modalConfirmaExcluirCF" title="Excluir"><i class="fa fa-times"></i></a>'
											);
										}
									}
									$table = $this->table->generate();
									echo $table;
								?>
								<div class="form-group col border-top mt-4 pb-2"></div>
								<div class="form-group row justify-content-center">
									<button type="button" class="btn btn-success prev-step">Voltar</button>
									<button type="button" class="btn btn-primary next-step">Avançar</button>
								</div>
							</div>
							<!-- RENDA FAMILIAR -->
							<div class="tab-pane fade" id="nav-renda" role="tabpanel" aria-labelledby="nav-renda-tab">
								<div class="form-group row mt-4">
									<?= form_label('Renda Total da Família:', 'ce_faixa_renda', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_faixa_renda', $opt_faixa_renda, '', $faixa_renda); ?>
										<font  color="red"><?= form_error('ce_faixa_renda'); ?></font>
									</div>
								</div>
								<div class="form-group row">
									<?= form_label('Benefícios Sociais:', 'sn_beneficios', $label2); ?>
									<div class="col-4 form-inline">
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_beneficios_s" name="sn_beneficios" value="S" required>
											<label class="custom-control-label" for="sn_beneficios_s">Sim</label>
										</div>
										<div class="custom-control custom-radio custom-control-inline">
											<input type="radio" class="custom-control-input" id="sn_beneficios_n" name="sn_beneficios" value="N" required checked>
											<label class="custom-control-label" for="sn_beneficios_n">Não</label>
										</div>
									</div>
								</div>
								<div class="bg-light opt-beneficios-sociais d-none">
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('', 'auxilio aluguel', $label2); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="custom-control-input" id="auxilio_aluguel" name="auxilio_aluguel" value="S">
												<label class="custom-control-label" for="auxilio_aluguel">Auxílio Aluguel</label>
											</div>
										</div>
										<div class="col-7 opt-auxilio_aluguel d-none">
											<div class="row align-items-center">
												<?= form_label('Valor:', 'vlr_auxilio_aluguel', $label2); ?>
												<div class="row col-3 mt-2">
													<?= form_input($vlr_auxilio_aluguel); ?>
													<font color="red"><?= form_error('vlr_auxilio_aluguel'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('', 'bolsa_familia', $label2); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="custom-control-input" id="bolsa_familia" name="bolsa_familia" value="S">
												<label class="custom-control-label" for="bolsa_familia">Bolsa Família</label>
											</div>
										</div>
										<div class="col-7 opt-bolsa-familia d-none">
											<div class="row align-items-center">
												<?= form_label('Valor:', 'vlr_bolsa_familia', $label2); ?>
												<div class="row col-3 mt-2">
													<?= form_input($vlr_bolsa_familia); ?>
													<font color="red"><?= form_error('vlr_bolsa_familia'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row" style="height:35px;">
										<?= form_label('', 'bpc', $label2); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="custom-control-input" id="bpc" name="bpc" value="S">
												<label class="custom-control-label" for="bpc">BPC</label>
											</div>
										</div>
										<div class="col-7 opt-bpc d-none">
											<div class="row align-items-center">
												<?= form_label('Valor:', 'vlr_bpc', $label2); ?>
												<div class="row col-3">
													<?= form_input($vlr_bpc); ?>
													<font color="red"><?= form_error('vlr_bpc'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row" style="height:35px;">
										<?= form_label('', 'peti', $label2); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="custom-control-input" id="peti" name="peti" value="S">
												<label class="custom-control-label" for="peti">PETI</label>
											</div>
										</div>
										<div class="col-7 opt-peti d-none">
											<div class="row align-items-center">
												<?= form_label('Valor:', 'vlr_peti', $label2); ?>
												<div class="row col-3">
													<?= form_input($vlr_peti); ?>
													<font color="red"><?= form_error('vlr_peti'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center pb-2" style="height:35px;">
										<?= form_label('', 'outros_beneficios', $label2); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="custom-control-input" id="outros_beneficios" name="outros_beneficios" value="S">
												<label class="custom-control-label" for="outros_beneficios">Outros</label>
											</div>
										</div>
										<div class="col-7 opt-outros-beneficios d-none">
											<div class="row align-items-center">
												<?= form_label('Valor:', 'vlr_outros_beneficios', $label2); ?>
												<div class="row col-3">
													<?= form_input($vlr_outros_beneficios); ?>
													<font color="red"><?= form_error('vlr_outros_beneficios'); ?></font>
												</div>
												<?= form_label('Descrição:', 'descricao_outros_beneficios', $label2); ?>
												<div class="col-4">
													<?= form_input($desc_outros_beneficios); ?>
													<font color="red"><?= form_error('descricao_outros_beneficios'); ?></font>
												</div>
											</div>
										</div>
									</div>
								</div>
								<fieldset class="mt-5">
									<legend>Situação Habitacional</legend>
									<div class="form-group row align-items-center">
										<?= form_label('Tempo de Moradia:', 'tempo_moradia_anos', $label2); ?>
										<div class="col-1">
											<?= form_input($tempo_moradia_anos); ?>
											<font color="red"><?= form_error('tempo_moradia_anos'); ?></font>
										</div>
										<?= form_label(' ano(s)', 'tempo_moradia_anos', $label0); ?>
										<div class="col-1">
											<?= form_input($tempo_moradia_meses); ?>
											<font color="red"><?= form_error('tempo_moradia_meses'); ?></font>
										</div>
										<?= form_label(' mês(es)', 'tempo_moradia_meses', $label0); ?>
									</div>
									<br>
									<div class="form-group row align-items-center">
										<?= form_label('Paga - IPTU:', 'sn_paga_iptu', $label2); ?>
										<div class="form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_paga_iptu_s" name="sn_paga_iptu" value="S" required checked>
												<label class="custom-control-label" for="sn_paga_iptu_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_paga_iptu_n" name="sn_paga_iptu" value="N" required>
												<label class="custom-control-label" for="sn_paga_iptu_n">Não</label>
											</div>
										</div>
										<?= form_label('Aluguel/Valor:', 'vlr_aluguel', $label2); ?>
										<div class="col-2">
											<?= form_input($vlr_aluguel); ?>
											<font color="red"><?= form_error('vlr_aluguel'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Forma de Ocupação:', 'ce_forma_ocupacao', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_forma_ocupacao', $opt_forma_ocupacao, '', $forma_ocupacao); ?>
											<font color="red"><?= form_error('ce_forma_ocupacao'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Uso do Imóvel:', 'ce_tipo_uso_imovel', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_tipo_uso_imovel', $opt_tipo_uso_imovel, '', $tipo_uso_imovel); ?>
											<font color="red"><?= form_error('ce_tipo_uso_imovel'); ?></font>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Tipo de Construção:', 'ce_tipo_construcao', $label2); ?>
										<div class="col-5">
											<?= form_dropdown('ce_tipo_construcao', $opt_tipo_construcao, '', $tipo_construcao); ?>
											<font color="red"><?= form_error('ce_tipo_construcao'); ?></font>
										</div>
										<!-- <div class="col-2 pb-1">
											<?= form_input($outro_tipo_construcao); ?>
											<font color="red"><?= form_error('outro_tipo_construcao'); ?></font>
										</div> -->
									</div>
								</fieldset>

								<div class="form-group col border-top mt-4 pb-2"></div>

								<div class="form-group row justify-content-center">
									<button type="button" class="btn btn-success prev-step">Voltar</button>
									<button type="button" class="btn btn-primary next-step">Avançar</button>
								</div>
							</div>
							<!-- SAÚDE -->
							<div class="tab-pane fade" id="nav-saude" role="tabpanel" aria-labelledby="nav-saude-tab">
								<fieldset class="mt-4">
									<legend>Saúde</legend>

									<div class="form-group">
										<div class="row">
											<?= form_label('Alguém na família sofre de alguma doença (diabetes, hipertensão, doença cardiovascular, asma, depressão)?', 'sn_doenca', "class='col-9 col-form-label'"); ?>
											<div class="form-inline">
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sn_doenca_s" name="sn_doenca" value="S" required>
													<label class="custom-control-label" for="sn_doenca_s">Sim</label>
												</div>
												<div class="custom-control custom-radio custom-control-inline">
													<input type="radio" class="custom-control-input" id="sn_doenca_n" name="sn_doenca" value="N" required checked>
													<label class="custom-control-label" for="sn_doenca_n">Não</label>
												</div>
											</div>
										</div>
										<div class="bg-light opt-doencas d-none">
											<div class="form-group row align-items-center">
												<?= form_label('Quantas?', 'num_pessoas_doenca', $label3); ?>
												<div class="col-1 mt-2 pb-2">
													<?= form_input($num_pessoas_doenca); ?>
													<font color="red"><?= form_error('num_pessoas_doenca'); ?></font>
												</div>
												<?= form_label('Quais?', 'doencas', $label1); ?>
												<div class="col-5 mt-2 pb-2">
													<?= form_input($doencas); ?>
													<font color="red"><?= form_error('doencas'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('Há gestantes na família?', 'sn_gestantes', $label3); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_gestantes_s" name="sn_gestantes" value="S" required>
												<label class="custom-control-label" for="sn_gestantes_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_gestantes_n" name="sn_gestantes" value="N" required checked>
												<label class="custom-control-label" for="sn_gestantes_n">Não</label>
											</div>
										</div>
										<div class="col bg-light opt-gestantes d-none">
											<div class="row">
												<?= form_label('Nº:', 'num_gestantes', $label2); ?>
												<div class="col-2 mt-1 pb-1">
													<?= form_input($num_gestantes); ?>
													<font color="red"><?= form_error('num_gestantes'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('Há pessoas idosas?', 'sn_idosos', $label3); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_idosos_s" name="sn_idosos" value="S" required>
												<label class="custom-control-label" for="sn_idosos_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_idosos_n" name="sn_idosos" value="N" required checked>
												<label class="custom-control-label" for="sn_idosos_n">Não</label>
											</div>
										</div>
										<div class="col bg-light opt-idosos d-none">
											<div class="row">
												<?= form_label('Nº:', 'num_idosos', $label2); ?>
												<div class="col-2 mt-1 pb-1">
													<?= form_input($num_idosos); ?>
													<font color="red"><?= form_error('num_idosos'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('Há crianças de 0 a 1 ano?', 'sn_recem_nascidos', $label3); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_recem_nascido_s" name="sn_recem_nascidos" value="S" required>
												<label class="custom-control-label" for="sn_recem_nascido_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_recem_nascido_n" name="sn_recem_nascidos" value="N" required checked>
												<label class="custom-control-label" for="sn_recem_nascido_n">Não</label>
											</div>
										</div>
										<div class="col bg-light opt-recem-nascidos d-none">
											<div class="row">
												<?= form_label('Nº:', 'num_recem_nascidos', $label2); ?>
												<div class="col-2 mt-1 pb-1">
													<?= form_input($num_recem_nascidos); ?>
													<font color="red"><?= form_error('num_recem_nascidos'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('A família é atendida pelo PSF do seu bairro?', 'sn_psf', $label3); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_psf_s" name="sn_psf" value="S" required>
												<label class="custom-control-label" for="sn_psf_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_psf_n" name="sn_psf" value="N" required checked>
												<label class="custom-control-label" for="sn_psf_n">Não</label>
											</div>
										</div>
										<div class="col bg-light opt-psf d-none">
											<div class="row">
												<?= form_label('Qual?', 'psf', $label2); ?>
												<div class="col-8 mt-1 pb-1">
													<?= form_input($psf); ?>
													<font color="red"><?= form_error('psf'); ?></font>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group row align-items-center" style="height:35px;">
										<?= form_label('Possui algum agente de saúde na família?', 'sn_agente_familia', $label3); ?>
										<div class="col-2 form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_agente_familia_s" name="sn_agente_familia" value="S" required>
												<label class="custom-control-label" for="sn_agente_familia_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_agente_familia_n" name="sn_agente_familia" value="N" required checked>
												<label class="custom-control-label" for="sn_agente_familia_n">Não</label>
											</div>
										</div>
										<div class="col bg-light opt-agente-familia d-none">
											<div class="row">
												<?= form_label('Nome:', 'agente_familia', $label2); ?>
												<div class="col-8 mt-1 pb-1">
													<?= form_input($agente_familia); ?>
													<font color="red"><?= form_error('agente_familia'); ?></font>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset class="mt-4">
									<legend>Condições Ambientais / Sanitárias</legend>

									<div class="form-group row">
										<?= form_label('Possui Energia Elétrica:', 'sn_energia_eletrica', $label3); ?>
										<div class="col form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="energia_eletrica_s" name="sn_energia_eletrica" value="S" required checked>
												<label class="custom-control-label" for="energia_eletrica_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="energia_eletrica_n" name="sn_energia_eletrica" value="N" required>
												<label class="custom-control-label" for="energia_eletrica_n">Não</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Saneamento Básico:', 'sn_esgoto', $label3); ?>
										<div class="col form-inline">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_esgoto_s" name="sn_esgoto" value="S" required checked>
												<label class="custom-control-label" for="sn_esgoto_s">Sim</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="sn_esgoto_n" name="sn_esgoto" value="N" required>
												<label class="custom-control-label" for="sn_esgoto_n">Não</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<?= form_label('Abastecimento de Água:', 'ce_tipo_abastecimento_agua', $label3); ?>
										<div class="col-5">
											<?= form_dropdown('ce_tipo_abastecimento_agua', $opt_tipo_abastecimento, '', $abastecimento); ?>
											<font color="red"><?= form_error('ce_tipo_abastecimento_agua'); ?></font>
										</div>
										<!-- <div class="col-2">
											<?= form_input($outro_tipo_abastecimento); ?>
											<font color="red"><?= form_error('outro_tipo_abastecimento'); ?></font>
										</div> -->
									</div>
									<div class="form-group row">
										<?= form_label('Destino do Lixo:', 'ce_destino_lixo', $label3); ?>
										<div class="col-5">
											<?= form_dropdown('ce_destino_lixo', $opt_destino_lixo, '', $destino_lixo); ?>
											<font color="red"><?= form_error('ce_destino_lixo'); ?></font>
										</div>
									</div>
								</fieldset>
								<div class="form-group col border-top mt-4 pb-2"></div>
								<div class="form-group row justify-content-center">
									<button type="button" class="btn btn-success prev-step">Voltar</button>
									<button type="button" class="btn btn-primary next-step">Avançar</button>
								</div>
							</div>
							<!-- OUTROS -->
							<div class="tab-pane fade" id="nav-outros" role="tabpanel" aria-labelledby="nav-outros-tab">
								<?php foreach ($criterios as $i => $criterio) : ?>
									<div class="form-group row <?= ($i == 0) ? 'mt-4' : ''; ?>">
										<?= form_label(($i == 0) ? 'Critérios Observados:' : '', 'ce_criterios', $label2); ?>
										<div class="col form-inline">
											<div class="custom-control custom-checkbox custom-control-inline">
												<input type="checkbox" class="custom-control-input" id="criterio<?= $criterio->id; ?>" name="ce_criterios[]" value="<?= $criterio->id; ?>">
												<label class="custom-control-label" for="criterio<?= $criterio->id; ?>"><?= $criterio->descricao; ?></label>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								<div class="form-group row mt-4">
									<?= form_label('Observações Técnicas:', 'observacoes', $label2); ?>
									<div class="col-6">
										<?= form_textarea($observacoes); ?>
										<font color="red"><?= form_error('observacoes'); ?></font>
									</div>
								</div>
								<div class="form-group row mt-4">
									<?= form_label('Motivo do cadastro:', 'ce_motivo_cadastro', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_motivo_cadastro', $opt_motivo_cadastro, '', $motivo_cadastro); ?>
										<font color="red"><?= form_error('ce_motivo_cadastro'); ?></font>
									</div>
								</div>
								<div class="form-group row mt-4">
									<?= form_label('Origem de cadastro:', 'ce_origem_cadastro', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_origem_cadastro', $opt_origem_cadastro, '', $origem_cadastro); ?>
										<font color="red"><?= form_error('ce_origem_cadastro'); ?></font>
									</div>
								</div>
									<div class="form-group row mt-4">
									<?= form_label('Programa Habitacional', 'ce_programa_habitacional', $label2); ?>
									<div class="col-5">
										<?= form_dropdown('ce_programa_habitacional', $opt_programa_habitacional, '', $programa_habitacional); ?>
										<font color="red"><?= form_error('ce_programa_habitacional'); ?></font>
									</div>
								</div>
								<div class="form-group col border-top mt-4 pb-2"></div>
								<div class="form-group row justify-content-center">
									<button type="button" class="btn btn-success prev-step">Voltar</button>
									<button class="btn btn-primary">Salvar Questionário</button>
								</div>
							</div>
						</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /Conteúdo -->