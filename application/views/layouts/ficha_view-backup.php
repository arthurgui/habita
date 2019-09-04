<?php

	$opt_religiao[''] = "Não especificado";
	if ($religioes) {
		foreach ($religioes as $r) {
			$opt_religiao[$r->id] = $r->descricao;
		}
	}

	$opt_raca[''] = "Não especificado";
	if ($racas) {
		foreach ($racas as $raca) {
			$opt_raca[$raca->id] = $raca->descricao;
		}
	}

	$opt_escolaridade[''] = "Não especificado";
	if ($escolaridades) {
		foreach ($escolaridades as $esc) {
			$opt_escolaridade[$esc->id] = $esc->descricao;
		}
	}

	$opt_estado_civil[''] = "Não especificado";
	if ($estados_civis) {
		foreach ($estados_civis as $est_civil) {
			$opt_estado_civil[$est_civil->id] = $est_civil->descricao;
		}
	}

	$opt_atividade_desenvolvida[''] = "Não especificada";
	$opt_atividade_desenvolvida['0'] = "Não especificada";
	if ($atividades) {
		foreach ($atividades as $ativ) {
			$opt_atividade_desenvolvida[$ativ->id] = $ativ->descricao;
		}
	}

	$opt_tipo_vinculo[''] = "Não especificado";
	if ($tipos_vinculo) {
		foreach ($tipos_vinculo as $vinculo) {
			$opt_tipo_vinculo[$vinculo->id] = $vinculo->descricao;
		}
	} else {
		$opt_tipo_vinculo[''] = "*** Não há tipos de vínculo cadastrados ***";
	}

	$opt_deficiencia[''] = "Não especificado";
	if ($deficiencias) {
		foreach ($deficiencias as $defic) {
			$opt_deficiencia[$defic->id] = $defic->descricao;
		}
	}

	$opt_bairro[''] = "Não especificado";
	if ($bairros) {
		foreach ($bairros as $b) {
			$opt_bairro[$b->id] = $b->descricao;
		}
	}

	$opt_cidade[''] = "Não especificado";
	/*if ($cidades) {
		foreach ($cidades as $c) {
			$opt_cidade[$c->id] = $c->descricao;
		}
	}*/

	$opt_grau_parentesco[''] = "Não especificado";
	if ($graus_parentesco) {
		foreach ($graus_parentesco as $grau) {
			$opt_grau_parentesco[$grau->id] = $grau->descricao;
		}
	}

	$opt_faixa_renda[''] = "Não especificado";
	if ($faixas_renda) {
		foreach ($faixas_renda as $faixa) {
			$opt_faixa_renda[$faixa->id] = $faixa->descricao;
		}
	}

	$opt_forma_ocupacao[''] = "Não especificado";
	if ($formas_ocupacao) {
		foreach ($formas_ocupacao as $forma) {
			$opt_forma_ocupacao[$forma->id] = $forma->descricao;
		}
	}

	$opt_tipo_uso_imovel[''] = "Não especificado";
	if ($tipos_uso_imovel) {
		foreach ($tipos_uso_imovel as $uso) {
			$opt_tipo_uso_imovel[$uso->id] = $uso->descricao;
		}
	}

	$opt_tipo_construcao[''] = "Não especificado";
	if ($tipos_construcao) {
		foreach ($tipos_construcao as $construcao) {
			$opt_tipo_construcao[$construcao->id] = $construcao->descricao;
		}
	}

	$opt_tipo_abastecimento[''] = "Não especificado";
	if ($tipos_abastecimentos) {
		foreach ($tipos_abastecimentos as $agua) {
			$opt_tipo_abastecimento[$agua->id] = $agua->descricao;
		}
	}

	$opt_destino_lixo[''] = "Não especificado";
	if ($destinos_lixo) {
		foreach ($destinos_lixo as $destino) {
			$opt_destino_lixo[$destino->id] = $destino->descricao;
		}
	}

	$opt_motivo_cadastro['0'] = "Não especificado";
	if ($motivos_cadastro) {
		foreach ($motivos_cadastro as $motivo) {
			$opt_motivo_cadastro[$motivo->id] = $motivo->descricao;
		}
	}

	$opt_origem_cadastro['0'] = "Não especificado";
	if ($origens_cadastro) {
		foreach ($origens_cadastro as $origem) {
			$opt_origem_cadastro[$origem->id] = $origem->descricao;
		}
	}

	$sexos	=	array(
					''	=> 'Não especificado',
					'M'	=> 'Masculino',
					'F'	=> 'Feminino'
				);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url($favicon); ?>">
	<link rel="stylesheet" href="<?= base_url($bootstrap4css); ?>">
	<link rel="stylesheet" href="<?= base_url($stylecss); ?>">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous"> -->
	<title>:: Ficha ::</title>
</head>
<body>
	<script type="text/javascript">
		$(document).ready(function(){
			$('td.input > input[type="text"]').attr('readonly','');
			$('td.input > input[type="date"]').attr('readonly','');
			$('.navbar-empreender').css('display','none');
			$('footer').css('display','none');
			$('.pag-length').html($('.div-pagina').length);
		});
	</script>
	<!-- .print -->
	<div class="print">
		<!-- .botoes -->
		<div class="container botoes">
			<div class="row">
				<button class="btn btn-primary" onclick="window.print();">Imprimir</button>
			</div>
		</div>
		<!-- /.botoes -->

		<div>&nbsp;</div>

		<!-- #pagina1 -->
		<div class="div-pagina container" id="pagina1">
			<div class="row">
				<table width="100%">
					<tr>
						<td style="width: 50%">
							<img src=<?= base_url("$images/logo_login.png"); ?> class="img-responsive" style="width: inherit !important;">
						</td>
						<td>
							<h4>FICHA DE CADASTRO DE FAMÍLIAS</h4>
						</td>
						<td align="right">Pág. 1/3<span class="pag-length"></span></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<table width="100%">
					<tr>
						<td align="left" width="60%"><h5>FICHA DE CADASTRO DE FAMÍLIAS</h5></td>
						<td align="right" width="40%"><h5><strong>Cadastro N° <?= $familia->id; ?></strong></h5></td>
					</tr>
				</table>
			</div>
			<br>
			<div class="row">
				<fieldset>
					<legend>Titular</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="60%">Nome</td>
							<td class="label-input" width="20%">Sexo</td>
							<td class="label-input" width="20%">Estado Civil</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->titular; ?></td>
							<td class="input"><?= $sexos[$familia->sexo]; ?></td>
							<td class="input"><?= $opt_estado_civil[$familia->ce_estado_civil]; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="20%">Data de nascimento</td>
							<td class="label-input" width="30%">CPF</td>
							<td class="label-input" width="20%">RG</td>
							<td class="label-input" width="20%">Órgão Emissor</td>
							<td class="label-input" width="10%" >UF</td>
						</tr>
						<tr>
							<td class="input"><?= date('d/m/Y', strtotime($familia->dt_nascimento)); ?></td>
							<td class="input"><?= $familia->cpf; ?></td>
							<td class="input"><?= $familia->rg; ?></td>
							<td class="input"><?= $familia->rg_org_emissor; ?></td>
							<td class="input"><?= $familia->rg_uf; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="20%">Raça/Cor</td>
							<td class="label-input" width="50%">Escolaridade</td>
							<td class="label-input" width="30%">Religião</td>
						</tr>
						<tr>
							<td class="input"><?= $opt_raca[$familia->ce_raca]; ?></td>
							<td class="input"><?= $opt_escolaridade[$familia->ce_escolaridade]; ?></td>
							<td class="input"><?= $opt_religiao[$familia->ce_religiao]; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="20%">Telefone Residencial</td>
							<td class="label-input" width="30%">Celular</td>
							<td class="label-input" width="50%">Chefe da família</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->telefone_res; ?></td>
							<td class="input"><?= $familia->telefone_cel; ?></td>
							<td class="input"><?= ($familia->sn_chefe == 'S') ? 'Sim' : 'Não'; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_atividade_remunerada == 'S') : ?>
								<td class="label-input" width="20%">Trabalha</td>
								<td class="label-input" width="40%">Atividade Desenvolvida</td>
								<td class="label-input" width="20%">Vínculo</td>
								<td class="label-input" width="10%">Tempo</td>
								<td class="label-input" width="10%">Renda</td>
							<?php else : ?>
								<td class="label-input" width="100%">Trabalha</td>
							<?php endif; ?>
						</tr>
						<tr>
							<td class="input"><?= ($familia->sn_atividade_remunerada == 'S') ? 'Sim' : 'Não'; ?></td>
							<?php if ($familia->sn_atividade_remunerada == 'S') : ?>
								<td class="input"><?= $opt_atividade_desenvolvida[$familia->ce_atividade_desenvolvida]; ?></td>
								<td class="input"><?= $opt_tipo_vinculo[$familia->ce_tipo_vinculo]; ?></td>
								<td class="input"><?= $familia->tempo_atividade; ?> anos</td>
								<td class="input"><?= number_format($familia->renda, 2, '.', ','); ?></td>
							<?php endif; ?>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_deficiencia == 'S') : ?>
								<td class="label-input" width="20%">Possui Deficiência</td>
								<td class="label-input" width="60%">Deficiência</td>
								<td class="label-input" width="20%">CID</td>
							<?php else : ?>
								<td class="label-input" width="100%">Possui Deficiência</td>
							<?php endif; ?>
						</tr>
						<tr>
							<td class="input"><?= ($familia->sn_deficiencia == 'S') ? 'Sim' : 'Não'; ?></td>
							<?php if ($familia->sn_deficiencia == 'S') : ?>
								<td class="input"><?= $opt_deficiencia[$familia->ce_deficiencia]; ?></td>
								<td class="input"><?= $familia->cid; ?></td>
							<?php endif; ?>
						</tr>
					</table>
				</fieldset>
				<?php $qtdfamiliares = count($familiares); ?>
				<?= ($qtdfamiliares < 8) ? '<br>' : '' ?>
				<fieldset>
					<legend>Conjuge</legend>
					<?php if ($familia->sn_conjuge == 'S') : ?>
						<table width="100%">
							<tr>
								<td class="label-input" width="60%">Nome</td>
								<td class="label-input" width="20%">Sexo</td>
								<td class="label-input" width="20%">Estado Civil</td>
							</tr>
							<tr>
								<td class="input"><?= $familia->conjuge; ?></td>
								<td class="input"><?= $sexos[$familia->sexo_cj]; ?></td>
								<td class="input"><?= $opt_estado_civil[$familia->ce_estado_civil_cj]; ?></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td class="label-input" width="20%">Data de nascimento</td>
								<td class="label-input" width="30%">CPF</td>
								<td class="label-input" width="20%">RG</td>
								<td class="label-input" width="20%">Órgão Emissor</td>
								<td class="label-input" width="10%" >UF</td>
							</tr>
							<tr>
								<td class="input"><?= date('d/m/Y', strtotime($familia->dt_nascimento_cj)); ?></td>
								<td class="input"><?= $familia->cpf_cj; ?></td>
								<td class="input"><?= $familia->rg_cj; ?></td>
								<td class="input"><?= $familia->rg_org_emissor_cj; ?></td>
								<td class="input"><?= $familia->rg_uf_cj; ?></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td class="label-input" width="20%">Raça/Cor</td>
								<td class="label-input" width="50%">Escolaridade</td>
								<td class="label-input" width="30%">Religião</td>
							</tr>
							<tr>
								<td class="input"><?= $opt_raca[$familia->ce_raca_cj]; ?></td>
								<td class="input"><?= $opt_escolaridade[$familia->ce_escolaridade_cj]; ?></td>
								<td class="input"><?= $opt_religiao[$familia->ce_religiao_cj]; ?></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td class="label-input" width="50%">Telefone</td>
								<td class="label-input" width="50%">Chefe da família</td>
							</tr>
							<tr>
								<td class="input"><?= $familia->telefone_cj; ?></td>
								<td class="input"><?= ($familia->sn_chefe_cj == 'S') ? 'Sim' : 'Não'; ?></td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<?php if ($familia->sn_atividade_remunerada_cj == 'S') : ?>
									<td class="label-input" width="20%">Trabalha</td>
									<td class="label-input" width="40%">Atividade Desenvolvida</td>
									<td class="label-input" width="20%">Vínculo</td>
									<td class="label-input" width="10%">Tempo</td>
									<td class="label-input" width="10%">Renda</td>
								<?php else : ?>
									<td class="label-input" width="100%">Trabalha</td>
								<?php endif; ?>
							</tr>
							<tr>
								<td class="input"><?= ($familia->sn_atividade_remunerada_cj == 'S') ? 'Sim' : 'Não'; ?></td>
								<?php if ($familia->sn_atividade_remunerada_cj == 'S') : ?>
									<td class="input"><?= $opt_atividade_desenvolvida[$familia->ce_atividade_desenvolvida_cj]; ?></td>
									<td class="input"><?= $opt_tipo_vinculo[$familia->ce_tipo_vinculo_cj]; ?></td>
									<td class="input"><?= $familia->tempo_atividade_cj; ?></td>
									<td class="input"><?= number_format($familia->renda_cj, 2, '.', ','); ?></td>
								<?php endif; ?>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<?php if ($familia->sn_deficiencia_cj == 'S') : ?>
									<td class="label-input" width="20%">Possui Deficiência</td>
									<td class="label-input" width="60%">Deficiência</td>
									<td class="label-input" width="20%">CID</td>
								<?php else : ?>
									<td class="label-input" width="100%">Possui Deficiência</td>
								<?php endif; ?>
							</tr>
							<tr>
								<td class="input"><?= ($familia->sn_deficiencia_cj == 'S') ? 'Sim' : 'Não'; ?></td>
								<?php if ($familia->sn_deficiencia_cj == 'S') : ?>
									<td class="input"><?= $opt_deficiencia[$familia->ce_deficiencia_cj]; ?></td>
									<td class="input"><?= $familia->cid_cj; ?></td>
								<?php endif; ?>
							</tr>
						</table>
					<?php else : ?>
						<table width="100%">
							<tr>
								<td class="input" width="100%">Não possui conjuge</td>
							</tr>
						</table>
					<?php endif; ?>
				</fieldset>
				<?= ($qtdfamiliares < 7) ? '<br>' : '' ?>
				<fieldset>
					<legend>Endereço</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="15%">CEP</td>
							<td class="label-input" width="45%">Endereço</td>
							<td class="label-input" width="10%">Número</td>
							<td class="label-input" width="30%">Complemento</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->cep; ?></td>
							<td class="input"><?= $familia->endereco; ?></td>
							<td class="input"><?= $familia->numero; ?></td>
							<td class="input"><?= $familia->complemento; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="40%">Bairro</td>
							<td class="label-input" width="50%">Cidade</td>
							<td class="label-input" width="10%">UF</td>
						</tr>
						<tr>
							<td class="input"><?= $opt_bairro[$familia->ce_bairro]; ?></td>
							<td class="input"><?= $familia->cidade; ?></td>
							<td class="input"><?= $familia->uf; ?></td>
						</tr>
					</table>
				</fieldset>
				<?= ($qtdfamiliares < 6) ? '<br>' : '' ?>
				<fieldset>
					<legend>Composição Familiar</legend>
					<?php if ($qtdfamiliares > 0) : ?>
						<table width="100%">
							<tr>
								<td class="label-input" width="5%">Nº</td>
								<td class="label-input" width="30%">Nome</td>
								<td class="label-input" width="5%">Idade</td>
								<td class="label-input" width="15%">Parentesco</td>
								<td class="label-input" width="35%">Escolaridade</td>
								<!-- <td class="label-input" width="25%">Deficiência</td> -->
								<td class="label-input" width="5%">Trabalha</td>
								<td class="label-input" width="5%">Vínculo</td>
							</tr>
							<?php foreach ($familiares as $key => $familiar) : ?>
								<tr>
									<td class="input"><?= $key + 1; ?></td>
									<td class="input"><?= $familiar->nome; ?></td>
									<td class="input"><?= $familiar->idade; ?></td>
									<td class="input"><?= $opt_grau_parentesco[$familiar->ce_grau_parentesco]; ?></td>
									<td class="input"><?= $opt_escolaridade[$familiar->ce_escolaridade]; ?></td>
									<!-- <td class="input"><?= ($familiar->sn_deficiencia == 'S') ? 'Sim' : 'Não'; ?></td> -->
									<td class="input"><?= ($familiar->sn_atividade_remunerada == 'S') ? 'Sim' : 'Não'; ?></td>
									<td class="input"><?= ($familiar->sn_atividade_remunerada == 'S') ? $opt_tipo_vinculo[$familiar->ce_tipo_vinculo] : '---'; ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					<?php else : ?>
						<table width="100%">
							<tr>
								<td class="input" width="100%">Não possui componentes familiares</td>
							</tr>
						</table>
					<?php endif; ?>
				</fieldset>
			</div>
			<!-- <br>
			<div class="row">
				<table width="100%">
					<tr>
						<td align="left" width="60%"><h5>Habitacional</h5></td>
						<td align="right" width="40%"><h5><strong></strong></h5></td>
					</tr>
				</table>
			</div> -->
		</div>
		<!-- /#pagina1 -->

		<div class="quebra">&nbsp;</div>

		<div class="div-pagina container texto-contrato" id="pagina2">
			<div class="row">
				<table width="100%">
					<tr>
						<td style="width: 50%">
							<img src=<?= base_url("$images/logo_login.png"); ?> class="img-responsive" style="width: inherit !important;">
						</td>
						<td>
							<h4>FICHA DE CADASTRO DE FAMÍLIAS</h4>
						</td>
						<td align="right" style="width: 10%">Pág. 2/3<span class="pag-length"></span></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<table width="100%">
					<tr>
						<td align="left" width="60%"><h5>FICHA DE CADASTRO DE FAMÍLIAS</h5></td>
						<td align="right" width="40%"><h5><strong>Cadastro N° <?= $familia->id; ?></strong></h5></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<fieldset>
					<legend>Trabalho e renda</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Renda Total da Família</td>
						</tr>
						<tr>
							<td class="input"><?= $opt_faixa_renda[$familia->ce_faixa_renda]; ?></td>
						</tr>
					</table>
				</fieldset>
				<?= ($familia->sn_beneficios != 'S') ? '<br>' : '' ?>
				<fieldset>
					<legend>Benefícios Sociais</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Benefícios Sociais</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->possui_beneficios ?></td>
						</tr>
					</table>
					<?php if ($familia->sn_beneficios == 'S') : ?>
						<table width="100%">
							<tr>
								<?php if ($familia->bolsa_familia == 'S') : ?>
									<td class="label-input" width="80%">Bolsa Família</td>
									<td class="label-input" width="20%">Valor</td>
								<?php else : ?>
									<td class="label-input" width="100%">Bolsa Família</td>
								<?php endif; ?>
							</tr>
							<tr>
								<?php if ($familia->bolsa_familia == 'S') : ?>
									<td class="input" width="80%">Sim</td>
									<td class="input" width="20%"><?= number_format($familia->vlr_bolsa_familia, 2, ',', '.'); ?></td>
								<?php else : ?>
									<td class="input" width="100%">Não</td>
								<?php endif; ?>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<?php if ($familia->bpc == 'S') : ?>
									<td class="label-input" width="80%">BPC</td>
									<td class="label-input" width="20%">Valor</td>
								<?php else : ?>
									<td class="label-input" width="100%">BPC</td>
								<?php endif; ?>
							</tr>
							<tr>
								<?php if ($familia->bpc == 'S') : ?>
									<td class="input" width="80%">Sim</td>
									<td class="input" width="20%"><?= number_format($familia->vlr_bpc, 2, ',', '.'); ?></td>
								<?php else : ?>
									<td class="input" width="100%">Não</td>
								<?php endif; ?>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<?php if ($familia->peti == 'S') : ?>
									<td class="label-input" width="80%">PETI</td>
									<td class="label-input" width="20%">Valor</td>
								<?php else : ?>
									<td class="label-input" width="100%">PETI</td>
								<?php endif; ?>
							</tr>
							<tr>
								<?php if ($familia->peti == 'S') : ?>
									<td class="input" width="80%">Sim</td>
									<td class="input" width="20%"><?= number_format($familia->vlr_peti, 2, ',', '.'); ?></td>
								<?php else : ?>
									<td class="input" width="100%">Não</td>
								<?php endif; ?>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<?php if ($familia->outros_beneficios == 'S') : ?>
									<td class="label-input" width="80%">Outro</td>
									<td class="label-input" width="20%">Valor</td>
								<?php else : ?>
									<td class="label-input" width="100%">Outro</td>
								<?php endif; ?>
							</tr>
							<tr>
								<?php if ($familia->peti == 'S') : ?>
									<td class="input" width="80%">Sim <?= ($familia->descricao_outros_beneficios) ? '- ('. $familia->descricao_outros_beneficios .')' : ''; ?></td>
									<td class="input" width="20%"><?= number_format($familia->vlr_outros_beneficios, 2, ',', '.') ?></td>
								<?php else : ?>
									<td class="input" width="100%">Não</td>
								<?php endif; ?>
							</tr>
						</table>
					<?php endif; ?>
				</fieldset>
				<?= ($familia->sn_beneficios != 'S') ? '<br>' : '' ?>
				<fieldset>
					<legend>Situação Habitacional</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="30%">Tempo de moradia</td>
							<td class="label-input" width="40%">Paga IPTU</td>
							<td class="label-input" width="30%">Aluguel/Valor</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->tempo_moradia; ?></td>
							<td class="input"><?= ($familia->sn_paga_iptu == 'S') ? 'Sim' : 'Não'; ?></td>
							<td class="input"><?= number_format($familia->vlr_aluguel, 2, ',', '.'); ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="30%">Forma de Ocupação</td>
							<td class="label-input" width="40%">Uso do Imóvel</td>
							<td class="label-input" width="30%">Tipo de Construção</td>
						</tr>
						<tr>
							<td class="input"><?= $opt_forma_ocupacao[$familia->ce_forma_ocupacao]; ?></td>
							<td class="input"><?= $opt_tipo_uso_imovel[$familia->ce_tipo_uso_imovel]; ?></td>
							<td class="input"><?= $opt_tipo_construcao[$familia->ce_tipo_construcao]; ?></td>
						</tr>
					</table>
				</fieldset>
				<?= ($familia->sn_beneficios != 'S') ? '<br>' : '' ?>
				<fieldset>
					<legend>Saúde</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Alguém na família sofre de alguma doença (diabetes, hipertensão, doença cardiovascular, asma, depressão)?</td>
						</tr>
						<tr>
							<td class="input"><?= ($familia->sn_doenca == 'S') ? 'Sim' : 'Não'; ?></td>
						</tr>
					</table>
					<?php if ($familia->sn_doenca == 'S') : ?>
						<table width="100%">
							<tr>
								<td class="label-input" width="20%">Quantas?</td>
								<td class="label-input" width="80%">Quais</td>
							</tr>
							<tr>
								<td class="input"><?= $familia->num_pessoas_doenca; ?></td>
								<td class="input"><?= $familia->doencas; ?></td>
							</tr>
						</table>
					<?php endif; ?>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_gestantes == 'S') : ?>
								<td class="label-input" width="80%">Há gestantes na família</td>
								<td class="label-input" width="20%">Nº</td>
							<?php else : ?>
								<td class="label-input" width="100%">Há gestantes na família</td>
							<?php endif; ?>
						</tr>
						<tr>
							<?php if ($familia->sn_gestantes == 'S') : ?>
								<td class="input" width="80%">Sim</td>
								<td class="input" width="20%"><?= $familia->num_gestantes; ?></td>
							<?php else : ?>
								<td class="input" width="100%">Não</td>
							<?php endif; ?>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_idosos == 'S') : ?>
								<td class="label-input" width="80%">Há pessoas idosas?</td>
								<td class="label-input" width="20%">Nº</td>
							<?php else : ?>
								<td class="label-input" width="100%">Há pessoas idosas?</td>
							<?php endif; ?>
						</tr>
						<tr>
							<?php if ($familia->sn_idosos == 'S') : ?>
								<td class="input" width="80%">Sim</td>
								<td class="input" width="20%"><?= $familia->num_idosos; ?></td>
							<?php else : ?>
								<td class="input" width="100%">Não</td>
							<?php endif; ?>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_recem_nascidos == 'S') : ?>
								<td class="label-input" width="80%">Há crianças de 0 a 1 ano?</td>
								<td class="label-input" width="20%">Nº</td>
							<?php else : ?>
								<td class="label-input" width="100%">Há crianças de 0 a 1 ano?</td>
							<?php endif; ?>
						</tr>
						<tr>
							<?php if ($familia->sn_recem_nascidos == 'S') : ?>
								<td class="input" width="80%">Sim</td>
								<td class="input" width="20%"><?= $familia->num_recem_nascidos; ?></td>
							<?php else : ?>
								<td class="input" width="100%">Não</td>
							<?php endif; ?>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_psf == 'S') : ?>
								<td class="label-input" width="30%">Atendimento PSF no Bairro?</td>
								<td class="label-input" width="70%">PSF</td>
							<?php else : ?>
								<td class="label-input" width="100%">Atendimento PSF no Bairro?</td>
							<?php endif; ?>
						</tr>
						<tr>
							<?php if ($familia->sn_psf == 'S') : ?>
								<td class="input" width="30%">Sim</td>
								<td class="input" width="70%"><?= $familia->psf; ?></td>
							<?php else : ?>
								<td class="input" width="100%">Não</td>
							<?php endif; ?>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<?php if ($familia->sn_agente_familia == 'S') : ?>
								<td class="label-input" width="30%">Possui algum agente de saúde na família?</td>
								<td class="label-input" width="70%">Nome</td>
							<?php else : ?>
								<td class="label-input" width="100%">Possui algum agente de saúde na família?</td>
							<?php endif; ?>
						</tr>
						<tr>
							<?php if ($familia->sn_agente_familia == 'S') : ?>
								<td class="input" width="30%">Sim</td>
								<td class="input" width="70%"><?= $familia->agente_familia; ?></td>
							<?php else : ?>
								<td class="input" width="100%">Não</td>
							<?php endif; ?>
						</tr>
					</table>
				</fieldset>
				<?= ($familia->sn_beneficios != 'S') ? '<br>' : '' ?>
			</div>
		</div>

		<div class="quebra">&nbsp;</div>

		<div class="div-pagina container texto-contrato" id="pagina3">
			<div class="row">
				<table width="100%">
					<tr>
						<td style="width: 50%">
							<img src=<?= base_url("$images/logo_login.png"); ?> class="img-responsive" style="width: inherit !important;">
						</td>
						<td>
							<h4>FICHA DE CADASTRO DE FAMÍLIAS</h4>
						</td>
						<td align="right" style="width: 10%">Pág. 3/3<span class="pag-length"></span></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<table width="100%">
					<tr>
						<td align="left" width="60%"><h5>FICHA DE CADASTRO DE FAMÍLIAS</h5></td>
						<td align="right" width="40%"><h5><strong>Cadastro N° <?= $familia->id; ?></strong></h5></td>
					</tr>
				</table>
			</div>
				<fieldset>
					<legend>Condições Ambientais / Sanitárias</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Possui Energia Elétrica?</td>
						</tr>
						<tr>
							<td class="input"><?= ($familia->sn_energia_eletrica == 'S') ? 'Sim' : 'Não'; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Possui Esgoto?</td>
						</tr>
						<tr>
							<td class="input"><?= ($familia->sn_esgoto == 'S') ? 'Sim' : 'Não'; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="50%">Tipo de Abastecimento de Água</td>
							<td class="label-input" width="50%">Destino do Lixo</td>
						</tr>
						<tr>
							<td class="input"><?= $opt_tipo_abastecimento[$familia->ce_tipo_abastecimento_agua]; ?></td>
							<td class="input"><?= $opt_destino_lixo[$familia->ce_destino_lixo]; ?></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend>Outros</legend>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Critérios Observados</td>
						</tr>
						<tr>
							<td class="input">
								<?php
									$desc_criterios = '';
									foreach ($criterios as $key => $criterio) {
										$desc_criterios .= (($criterios_familia) ? in_array($criterio->id, $criterios_familia) : false) ? ' - '. $criterio->descricao .'<br>' : '';
									}
									echo $desc_criterios;
								?>
							</td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="50%">Motivo do cadastro</td>
							<td class="label-input" width="50%">Origem do cadastro</td>
						</tr>
						<tr>
							<td class="input"><?= $opt_motivo_cadastro[$familia->ce_motivo_cadastro]; ?></td>
							<td class="input"><?= $opt_origem_cadastro[$familia->ce_origem_cadastro]; ?></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td class="label-input" width="100%">Observações Técnicas</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->observacoes; ?></td>
						</tr>
					</table>
				</fieldset>
			</div>
		</div>
	</div>
	<!-- /.print -->
</body>
</html>