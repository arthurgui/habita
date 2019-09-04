<?php
	$opt_grau_parentesco[''] = "Não especificado";
	if ($graus_parentesco) {
		foreach ($graus_parentesco as $grau) {
			$opt_grau_parentesco[$grau->id] = $grau->descricao;
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
	<title>:: Protocolo ::</title>
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
							<img src=<?= base_url("$images/logo_pmc.png"); ?> class="img-responsive" style="width: inherit !important;">
						</td>
						<td>
							<h4>PROTOCOLO DE CONFIRMAÇÃO DE CADASTRO</h4>
						</td>
					</tr>
				</table>
			</div>
			<div class="row">
				<table width="100%">
					<tr>
						<td align="left" width="60%"><h5>PROTOCOLO DE CONFIRMAÇÃO DE CADASTRO</h5></td>
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
							<td class="label-input" width="20%">CPF</td>
							<td class="label-input" width="60%">Nome</td>
							<td class="label-input" width="20%">Sexo</td>
						</tr>
						<tr>
							<td class="input"><?= $familia->cpf; ?></td>
							<td class="input"><?= $familia->titular; ?></td>
							<td class="input"><?= $sexos[$familia->sexo]; ?></td>
						</tr>
					</table>
				</fieldset>
				<br>
				<fieldset>
					<legend>Conjuge</legend>

					<?php if ($familia->sn_conjuge == 'S') : ?>
						<table width="100%">
							<tr>
								<td class="label-input" width="20%">CPF</td>
								<td class="label-input" width="60%">Nome</td>
								<td class="label-input" width="20%">Sexo</td>
							</tr>
							<tr>
								<td class="input"><?= $familia->cpf_cj; ?></td>
								<td class="input"><?= $familia->conjuge; ?></td>
								<td class="input"><?= $sexos[$familia->sexo_cj]; ?></td>
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
				<br>
				<fieldset>
					<legend>Composição Familiar</legend>
					<?php if (count($familiares) > 0) : ?>
						<table width="100%">
							<tr>
								<td class="label-input" width="50%">Nome</td>
								<td class="label-input" width="10%">Idade</td>
								<td class="label-input" width="40%">Grau de Parentesco</td>
							</tr>
							<?php foreach ($familiares as $key => $familiar) : ?>
								<tr>
									<td class="input"><?= $familiar->nome; ?></td>
									<td class="input"><?= $familiar->idade; ?></td>
									<td class="input"><?= $opt_grau_parentesco[$familiar->ce_grau_parentesco]; ?></td>
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
			<br>
				<td class="border" colspan="2">
					<fieldset class="mt-3">
								<table width="100%">
									<tr>
										<td align="center">
											<hr class="assinatura" style="width: 50%; margin-bottom: 0px; margin-top: 3rem" />
										</td>
									</tr>
									<tr>
										<td align="center" width="100%"><h7><strong>(Assinatura)</strong></h7></td>
									</tr>
								</table>
								<br>
								<table width="100%">
									<td align="center">
										<tr>	
											<p class="text-uppercase font-weight-bold m-auto">Cadastro efetuado por:&nbsp;<?= $nome_usuario; ?></p>
											<p class="text-uppercase font-weight-bold m-auto">Em: <?= date('d/m/Y h:i:s', strtotime($familia->dt_cadastro));?></p>
											<p class="text-uppercase font-weight-bold m-auto">Ultima alteração efetuada por:&nbsp;<?= $nome_usuario .' '. date('d/m/Y h:i:s', strtotime($familia->dt_ult_atualizacao)) ?></p>
										</tr>
									</td>
								</table>
					</fieldset>
				</td>
			 			<div class="row mt-1 mt-auto ml-auto mr-auto mb-0 justify-content-center align-items-end">
						<div>
						<!-- </div> -->
						<!-- <div class="row m-auto justify-content-center"> -->
						</div>
			</div>
			<!-- <div class="row">
				<table width="100%">
					<tr>
						<td align="left" width="60%"><h5>Habitacional</h5></td>
						<td align="right" width="40%"><h5><strong></strong></h5></td>
					</tr>
				</table>
			</div> -->
		</div>
		<!-- /#pagina1 -->
	</div>
	<!-- /.print -->
</body>
</html>