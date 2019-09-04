<!-- Modals -->
<?php if($this->session->userdata('is_logged_in')): ?>
	<!-- Modal de Confirmação de Logout -->
	<div id="logoutModal" name="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header header-primary">
					<h4><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">Deseja sair do sistema?</div>
				<div class="modal-footer">
					<button id="btn-confirma" name="btn-confirma" type="button" class="btn btn-primary">Logout</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal de Confirmação de Troca de Licença -->
	<div id="modalTrocarLicenca" name="modalTrocarLicenca" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header header-primary">
					<h4><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Trocar Licença</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">Deseja trocar de licença?</div>
				<form action="<?= base_url('licencas/trocar_licenca'); ?>" method="POST">
					<div class="modal-footer">
						<button id="btn-trocar" name="btn-trocar" type="submit" class="btn btn-primary">Trocar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal de Confirmação de cancelamento -->
	<div class="modal fade" id="modalConfirmaCancelar" tabindex="-1" role="dialog" aria-labelledby="modalConfirmaCancelar" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Cancelamento</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">Deseja confirmar o cancelamento?</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-danger btn-cancelar">Confirmar</a>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal de Confirmação de Exclusão -->
	<div class="modal fade" id="modalConfirmaExcluir" tabindex="-1" role="dialog" aria-labelledby="modalConfirmaExcluir" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Excluir</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">Tem certeza que deseja excluir o registro?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-excluir">Excluir</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- modalExcluir -->
	<div id="modalExcluir" name="modalExcluir" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fas fa-times"></i>&nbsp;Excluir</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<p>Confirma a exclusão do registro?<br>Registro: <span id="span-registro" class="font-bold"></span></p>
				</div>
				<form id="form-excluir" action="" method="post">
					<div class="modal-footer">
						<input type="hidden" id="id" name="id">
						<input type="hidden" id="voltar" name="voltar">
						<input type="hidden" id="excluir" name="excluir" value="excluir">
						<button id="btn-excluir" name="btn-excluir" type="submit" class="btn btn-danger">Excluir</button>
						<button id="btn-cancela" name="btn-cancela" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /modalExcluir -->

	<!-- modalExcluirCF -->
	<div id="modalExcluirCF" name="modalExcluirCF" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><i class="fas fa-times"></i>&nbsp;Excluir</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<p>Tem certeza que deseja excluir do registro?<br>Registro: <span id="span-registro" class="font-bold"></span></p>
				</div>
				<div class="modal-footer">
					<button id="btn-excluir-cf" name="btn-excluir-cf" type="button" class="btn btn-danger">Excluir</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modalExcluir -->

	<!-- modalCopiaTabela -->
	<div id="modalCopiaTabela" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Copiar Tabela" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-copy"></i>&nbsp;Copiar Tabela</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<form>
					<div class="modal-body">
						<div class="form-group">
							<label for="tabela_original" class="control-label">Tabela original:</label>
							<input type="text" class="form-control" id="tabela_original" name="tabela_original" readonly style="border: none;">
						</div>
						<div class="form-group">
							<label for="tabela_destino" class="control-label">Tabela destino:</label>
							<input type="text" class="form-control" id="tabela_destino" name="tabela_destino">
						</div>
						<div id="labelError" class="form-group fc-brand-danger" style="display: none;">
							<label>Informe um nome para a tabela!</label>
						</div>
						<div id="labelLoading" class="form-group" style="display: none;">
							<i class="fas fa-spinner fa-pulse"></i>&nbsp;Aguarde...
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" id="btnCopiarTabela" class="btn btn-primary">Copiar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modalCopiaTabela -->

	<!-- modalCopiaRelatorio -->
	<div id="modalCopiaRelatorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Copiar Relatório" style="display: none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel"><i class="fas fa-copy"></i>&nbsp;Copiar Relatório</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
				</div>
				<form>
					<div class="modal-body">
						<div class="form-group">
							<label for="relatorio_original" class="control-label">Relatório original:</label>
							<input type="hidden" id="idRelatorio" name="idRelatorio">
							<input type="text" class="form-control" id="relatorio_original" name="relatorio_original" readonly style="border: none;">
						</div>
						<div class="form-group">
							<label for="relatorio_destino" class="control-label">Relatório destino:</label>
							<input type="text" class="form-control" id="relatorio_destino" name="relatorio_destino">
						</div>
						<div id="labelError" class="form-group fc-brand-danger" style="display: none;">
							<label>Informe um nome para a relatório!</label>
						</div>
						<div id="labelLoading" class="form-group" style="display: none;">
							<i class="fas fa-spinner fa-pulse"></i>&nbsp;Aguarde...
						</div>
					</div>
				</form>
				<div class="modal-footer">
					<button type="button" id="btnCopiarRelatorio" class="btn btn-primary">Copiar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal para marcar o contemplado-->
	<div id="modalMarcarContemplado" name="modalMarcarContemplado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary fc-white">
					<h4><i class="fas fa-exclamation fc-brand-warning"></i>&nbsp;&nbsp;Marcar Contemplado <span class="small font-weight-bold"></span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form id="frm-MarcarContemplado" class="form-horizontal" action=<?= base_url("questionario/marcarContemplado"); ?> method="post">
					<input type="hidden" class="id_usuario" name="id_usuario" value="<?= $this->session->userdata('id_usuario'); ?>">
					<input type="hidden" class="id_familia" name="id_familia">

					<div class="modal-body">
						<!-- <div class="alert bg-gray-lighter border-gray-light p-1">
							<div class="row m-auto">
								<div class="col-6">Data da Contemplação:&nbsp;<span class="font-weight-bold dt-emissao"></span></div>
							</div>
						</div> -->
						<div class="form-group row m-auto mb-2">
							<?= form_label('Data da Contemplação:', ' dt_contemplado', $label3); ?>
							<div class="col-3 p-1">
								<input type="date" name=" dt_contemplado" class="form-control  dt_contemplado" maxlength="10" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<span class="loading d-none"><i class="fas fa-spinner fa-pulse fa-2x"></i>&nbsp;Aguarde...</span>
						<button name="btn-cancela" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-brand-primary" type="submit"><i class="fas fa-save"></i>&nbsp;Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="modalDesmarcarContemplado" name="modalDesmarcarContemplado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary fc-white">
					<h4><i class="fas fa-exclamation fc-brand-warning"></i>&nbsp;&nbsp;Desmarcar Contemplado <span class="small font-weight-bold"></span></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form id="frm-DesmarcarContemplado" class="form-horizontal" action=<?= base_url("questionario/MarcarContemplado"); ?> method="post">
					<input type="hidden" class="id_usuario" name="id_usuario" value="<?= $this->session->userdata('id_usuario'); ?>">
					<input type="hidden" class="id_familia" name="id_familia">

					<div class="modal-body">
						<div class="modal-body">
						<p>Tem certeza que deseja desmarcar o modal ? <span id="span-registro" class="font-bold"></span></p>
					</div>
						<!-- <div class="alert bg-gray-lighter border-gray-light p-1">
							<div class="row m-auto">
								<div class="col-6">Data da Contemplação:&nbsp;<span class="font-weight-bold dt-emissao"></span></div>
							</div>
						</div> -->
						<!-- <div class="form-group row m-auto mb-2">
							<?= form_label('Data da Contemplação:', ' dt_contemplado', $label3); ?>
							<div class="col-3 p-1">
								<input type="date" name=" dt_contemplado" class="form-control  dt_contemplado" maxlength="10" required>
							</div>
						</div> -->
					</div>
					<div class="modal-footer">
						<span class="loading d-none"><i class="fas fa-spinner fa-pulse fa-2x"></i>&nbsp;Aguarde...</span>
						<button name="btn-cancela" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-brand-primary" type="submit"><i class="fas fa-save"></i>&nbsp;Desmarcar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- /modalCopiaRelatorio -->
<?php endif; ?>
<!-- /Modals -->