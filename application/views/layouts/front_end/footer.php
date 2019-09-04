		<footer id="footer" class="bg-brand-primary fc-white">
			<div class="container-fluid">
				<div class="row">
					<div class="col-6 text-left">
						<p><?= $this->session->userdata('licenciado') ?></p>
					</div>
					<div class="col-6 text-right">
						<p><a href="http://www.logon.inf.br" target="_blank"><img src=<?= base_url("$images/logon-footer.png"); ?>></a></p>
						<p>LOGON® INFORMÁTICA <?= date('Y') ?> - Todos os direitos reservados</p>
						<p><small>Av. Almirante Barroso, 600 - Ed. Villa Empresarial (Sala 1002) - Centro</small></p>
						<p><small>João Pessoa - PB | CEP: 58013-120 | Fone/Fax: (83) 3241-4530</small></p>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>