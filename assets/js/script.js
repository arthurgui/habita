$(document).ready(function() {
	var _docwidth	=	document.body.clientWidth;
	var _docheight	=	document.body.clientHeight;

	if (isIE || isFirefox) {
		webshims.setOptions('waitReady', true);
		webshims.setOptions('forms-ext', {types: 'date'});
		webshims.polyfill('forms forms-ext');
	}

	$('a[data-toggle="tooltip"]').on('click', function() {
		$(this).tooltip('hide').tooltip();
	});

	/*if ($(".dropdown-menu")) {
		$(".dropdown-menu").is(":visible",function(){
			$(this).css('max-height','500px').css('overflow','auto');
		});
	}*/

	$(".dropdown-toggle").on('click', function() {
		$(".dropdown-toggle ~ div.dropdown-menu").css('max-height', '500px').css('overflow', 'auto');
	});

	/* Tooltip */
	$('[data-toggle="tooltip"]').tooltip();
	/* /Tooltip */

	/* Popover */
	$('[data-toggle="popover"]').popover(
		{
			delay:		{ "show": 100, "hide": 10 },
			html:		true,
			trigger:	'click',
			template:	'<div class="popover" role="tooltip">'+
							'<div class="arrow"></div>'+
							'<h3 class="popover-header"></h3>'+
							'<div class="popover-body text-justify"></div>'+
						'</div>'
		}
	);
	$('[data-toggle="popover"]').on('inserted.bs.popover', function() {
		_css		=	$(this).attr('data-css');
		_popover	=	$(this).attr('aria-describedby');
		$("#"+_popover).addClass(_css);
	});

	$("#nav-btn-user").popover(
		{
			delay:		{ "show": 100, "hide": 10 },
			html:		true,
			placement:	'bottom',
			trigger:	'manual',
			css:		'popover-primary',
			content:	$("#user-content").html(),
			template:	'<div class="popover" role="tooltip">'+
							'<div class="arrow"></div>'+
							'<h3 class="popover-header"></h3>'+
							'<div class="popover-body text-justify">'+
							'</div>'+
						'</div>'
		}
	);
	$('#nav-btn-user').on('inserted.bs.popover', function() {
		_css		=	$(this).attr('data-css');
		_popover	=	$(this).attr('aria-describedby');
		$("#"+_popover).addClass(_css);
	});
	// $("#nav-btn-user").popover('show');
	/* /Popover */

	/* DataTable */
	if ($('.dataTable').length) {
		$.fn.dataTable.moment('MM/DD/YYYY');
		$('.dataTable').DataTable(
			{
				destroy:		true,
				"lengthMenu":	[[25, 50, 100, -1], [25, 50, 100, "Todos"]],
				"bJQueryUI":	true, 
				"oLanguage":	{
									"sProcessing":	"Processando...", 
									"sLengthMenu":	"Mostrar _MENU_ registros", 
									"sZeroRecords":	"Não foram encontrados resultados", 
									"sInfo":		"Mostrando de _START_ até _END_ de _TOTAL_ registros", 
									"sInfoEmpty":	"Mostrando de 0 até 0 de 0 registros", 
									"sInfoFiltered":"", 
									"sInfoPostFix":	"", 
									"sSearch":		"Buscar:", 
									"sUrl":			"", 
									"oPaginate":	{ 
														"sFirst": "Primeiro", 
														"sPrevious": "Anterior", 
														"sNext": "Próximo", 
														"sLast": "Último"
													}
								}
			}
		);
	}
	/* /DataTable */

	/* DataTable - DESC */
	if ($('.dataTable-desc').length) {
		$.fn.dataTable.moment( 'MM/DD/YYYY' );
		$('.dataTable-desc').DataTable(
			{
				destroy: true,
				"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Todos"]],
				"bJQueryUI": true, 
				"order": [[0, "desc"]],
				"oLanguage":	{ 
									"sProcessing":	"Processando...", 
									"sLengthMenu":	"Mostrar _MENU_ registros", 
									"sZeroRecords":	"Não foram encontrados resultados", 
									"sInfo":		"Mostrando de _START_ até _END_ de _TOTAL_ registros", 
									"sInfoEmpty":	"Mostrando de 0 até 0 de 0 registros", 
									"sInfoFiltered":"", 
									"sInfoPostFix":	"", 
									"sSearch":		"Buscar:", 
									"sUrl":			"", 
									"oPaginate":	{ 
														"sFirst": "Primeiro", 
														"sPrevious": "Anterior", 
														"sNext": "Próximo", 
														"sLast": "Último"
													}
								}
			}
		);
	}
	/* /DataTable */

	/* Data-Table - exibe todos na inicialização */
	if ($('.data-Table').length) {
		$.fn.dataTable.moment( 'MM/DD/YYYY' );
		$('.data-Table').DataTable(
			{
				destroy:		true,
				"lengthMenu":	[[-1, 25, 50, 100], ["Todos", 25, 50, 100]],
				"bJQueryUI":	true, 
				"oLanguage":	{
									"sProcessing":	"Processando...", 
									"sLengthMenu":	"Mostrar _MENU_ registros", 
									"sZeroRecords":	"Não foram encontrados resultados", 
									"sInfo":		"Mostrando de _START_ até _END_ de _TOTAL_ registros", 
									"sInfoEmpty":	"Mostrando de 0 até 0 de 0 registros", 
									"sInfoFiltered":"", 
									"sInfoPostFix":	"", 
									"sSearch":		"Buscar:", 
									"sUrl":			"", 
									"oPaginate":	{ 
														"sFirst": "Primeiro", 
														"sPrevious": "Anterior", 
														"sNext": "Próximo", 
														"sLast": "Último"
													}
								}
			}
		);
	}
	/* /Data-Table */

	if ($('.dataTables_wrapper').length) {
		$('select[name="table-list_length"]').addClass('form-control');
		$('input[type="search"]').addClass('form-control');
	}

	/* Bootstrap Chosen Select*/
	if ($('.chosen-select-deselect').length) {
		$('.chosen-select-deselect').chosen({ allow_single_deselect: false }).trigger("chosen:updated");
	}
	/* /Bootstrap Chosen Select*/

	$(".cep").blur(function() {
		var campo_cep	=	$(this);
		var cep_code	=	$(this).val();
		var endereco	=	$(this).attr('data-endereco');
		var bairro		=	$(this).attr('data-bairro');
		var cidade		=	$(this).attr('data-cidade');
		var uf			=	$(this).attr('data-uf');
		var erro		=	$(this).attr('data-erro');
		if ($(this).val().length == 9) {
			$(erro).html('<i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Pesquisando...</span>');
			if(cep_code.length <= 0) return;
			$.get("https://viacep.com.br/ws/"+ cep_code + "/json/", { code: cep_code },
				function(result) {
					console.log(result);
					if(result.status == 0) {
						$(endereco).val('');
						$(bairro).val('');
						//$(cidade).val('');
						//$(cidade).removeAttr('readonly');
						//$(cidade).prop('disabled', false).trigger("chosen:updated");
						//$(cidade).chosen();
						//$(uf).val('');
						// $(uf).removeAttr('readonly');
						$(erro).html('<font style="color: red;">'+ result.message +'</font>');
						//$(uf).val('PB');
						return;
					} else {
						if (result.uf == 'PB') { //Se não for da Paraíba
							if (result.localidade == 'Cabedelo') {
								$(this).val(result.code);
								$(endereco).val(result.logradouro);
								$(bairro).val(result.bairro);
								$.post(
									_systempath +'questionario/consultarBairro',
									{
										bairro : result.bairro
									},
									function(retorno) {
										console.log(retorno);
										if (retorno != '0') {
											$(bairro).val(retorno);
										}
									}
								);
								//$(cidade).val(result.city);
								//$(cidade).attr('readonly', 'readonly').trigger("chosen:updated");
								//$(cidade).prop('disabled', true);
								//$(cidade).change();
								//$(uf).val(result.state);
								//$(uf).attr('readonly', 'readonly');
								/*if ($(uf).val() != 'PB') { //Se não for da Paraíba
									$(endereco).val('');
									$(bairro).val('');
									//$(cidade).val('');
									//$(cidade +" option:not(:selected)").prop('disabled', false).chosen('destroy');
									$(uf).val('');
									$(erro).html('');
									$(campo_cep).focus();
									$(campo_cep).select();
									$(erro).html('<font style="color: red;">O CEP informado não é da Paraíba!</font>');
								} else {
									$(erro).html('');
								}*/
								$(erro).html('');
							} else {
								$(erro).html('<font style="color: red;">O CEP informado não é de Cabedelo</font>');
							}
						} else {
							$(erro).html('');
							$(campo_cep).focus();
							$(campo_cep).select();
							$(erro).html('<font style="color: red;">O CEP informado não é da Paraíba!</font>');
						}
					}
				}
			);
		} else {
			$(this).val('');
			$(endereco).val('');
			$(bairro).val('');
			//$(cidade).val('');
			//$(cidade +" option:not(:selected)").prop('disabled', false).chosen('destroy');
			//$(uf).val('');
			$(erro).html('');
		}
	});

	/* Timer da Session */
	if ($("#is_logged_in").val()) {
		var hor = $("#hour").val();
		var min = $("#min").val();
		var sec = $("#sec").val();
		var outSession = setInterval(function() {
			if(sec == 0){
				if (min == 0) {
					if (hor == 0) {
						clearInterval(outSession);
						window.location.href = _systempath +'usuarios/logout';
					}
					else {
						hor--
					}
				}
				else {
					min--;
				}
				sec = 60;
			}
			sec--;
			$("#timer").html(hor + "h:" + min +":m" + sec + "s");
		}, 1000);
	}
	/* /Timer da Session */

	/* Logout */
	$("#btn-logout").click(function() {
		$("#logoutModal").modal();
		$("#btn-confirma").click(function() {
			$("#logoutModal").modal("hide");
			$('#logoutModal').on('hidden.bs.modal', function (e) {
				window.location.href = _systempath + 'usuarios/logout';
			});
		});
	});

	// PESSOA FÍSICA / JURÍDICA
	if ($('input[name="fis_jur"]').length) {
		$('input[name="fis_jur"]').on('click', function() {
			$valor = $(this).val();
			if ($valor == 'F' || $valor == '01') { // PESSOA FÍSICA
				$('#div_cpf_cnpj').removeClass('d-none');
				$('.p_fis').removeClass('d-none');
				$('.p_jur').addClass('d-none');
				$("#cpf_cnpj")
					.val('')
					.attr('onkeypress', "return txtBoxFormat(this, '999.999.999-99', event);")
					.attr('placeholder', '000.000.000-00')
					.attr('maxlength', '14')
					.focus();
				$("#cnpj_cpf")
					.val('')
					.attr('onkeypress', "return txtBoxFormat(this, '999.999.999-99', event);")
					.attr('placeholder', '000.000.000-00')
					.attr('maxlength', '14')
					.focus();
				$('#label_cpf_cnpj').html('CPF:');
				$("#div_cpf_cnpj :input").attr("disabled", false);
			}
			else if ($valor == 'J' || $valor == '02') { // PESSOA JURÍDICA
				$('#div_cpf_cnpj').removeClass('d-none');
				$('.p_jur').removeClass('d-none');
				$('.p_fis').addClass('d-none');
				$("#cpf_cnpj")
					.val('')
					.attr('onkeypress', "return txtBoxFormat(this, '99.999.999/9999-99', event);")
					.attr('placeholder', '00.000.000/0000-00')
					.attr('maxlength', '18')
					.focus();
				$("#cnpj_cpf")
					.val('')
					.attr('onkeypress', "return txtBoxFormat(this, '99.999.999/9999-99', event);")
					.attr('placeholder', '00.000.000/0000-00')
					.attr('maxlength', '18')
					.focus();
				$('#label_cpf_cnpj').html('CNPJ:');
				$("#div_cpf_cnpj :input").attr("disabled", false);
			}
			else if ($valor == 'T') { // TODOS
				$('#div_cpf_cnpj').addClass('d-none');
				$("#div_cpf_cnpj :input").attr("disabled", true);
			}
		});
	}

	// CHECKBOX - SELECIONAR TODOS OS ITENS
	if ($('input[id="chk_todos"]').length) {
		if ($('.chk_item').length) {
			$('input[id="chk_todos"]').on('click', function() {
				if ($('#chk_todos').prop("checked")) {
					$('.chk_item').prop("checked", true);
					$('.opt_pane').removeClass('d-none');
					$('.opt_btn').removeAttr('disabled');
				}
				else {
					$('.chk_item').prop("checked", false);
					$(".opt_pane").addClass('d-none');
					$('.opt_btn').attr('disabled', true);
				}
			});
		}
	}
	// CHECKBOX - SE TODOS OS ITENS FOREM SELECIONADOS MARCAR O ITEM CHECK_TODOS
	if ($('.chk_item').length) {
		$('.chk_item').on('click', function() {
			$count = 0;
			for (var i = 0; i < $('.chk_item').length; i++) {
				if ($('.chk_item')[i].checked) {
					$count++;
				}
			}
			if ($count > 0) {
				if ($count == $('.chk_item').length) {
					$('#chk_todos').prop("checked", true);
				} else {
					$('#chk_todos').prop("checked", false);
				}
				$('.opt_pane').removeClass('d-none');
				$('.opt_btn').removeAttr('disabled');
			} else {
				$('#chk_todos').prop("checked", false);
				$(".opt_pane").addClass('d-none');
				$('.opt_btn').attr('disabled', true);
			}
		});
	}

	// MODAL -> Confirmar Trocar Licença
	$('#modalTrocarLicenca').on('show.bs.modal', function(e) {
		$(this).find('.btn-trocar').attr('href', $(e.relatedTarget).data('href'));
	});

	// MODAL -> Confirmar Excluir
	$('#modalConfirmaExcluir').on('show.bs.modal', function(e) {
		$(this).find('.btn-excluir').attr('href', $(e.relatedTarget).data('href'));
	});

	// MODAL -> Confirmar Cancelar
	$('#modalConfirmaCancelar').on('show.bs.modal', function(e) {
		$(this).find('.btn-cancelar').attr('href', $(e.relatedTarget).data('href'));
	});

	$('.btn-excluir').on('click', function() {
		//console.log('click');
		$link		=	$(this).attr('data-link');
		$descricao	=	$(this).attr('data-descricao');
		$id			=	$(this).attr('data-id');
		$voltar		=	$(this).attr('data-voltar');
		$("#modalExcluir #span-registro").html($descricao);
		$("#modalExcluir form").attr('action', $link);
		$("#modalExcluir form #id").val($id);
		$("#modalExcluir form #voltar").val($voltar);
		$("#modalExcluir").modal('show');
	});

	$("#modalExcluir").on('hide.bs.modal', function() {
		$("#modalExcluir #span-registro").html('');
		$("#modalExcluir form").attr('action', '');
		$("#modalExcluir form #id").val('');
		$("#modalExcluir form #voltar").val('form ');
	});

	$(".copiar-tabela").on('click', function() {
		$tabela_original	=	$(this).attr('data-nome-tabela');
		$("#modalCopiaTabela input#tabela_original").val($tabela_original);
		$("#modalCopiaTabela input#tabela_destino").val($tabela_original+'_2');
		$("#modalCopiaTabela").modal('show');
	});

	/* #modalCopiaTabela */
	$("#modalCopiaTabela #btnCopiarTabela").on('click', function() {
		$tabela_original	=	$("#modalCopiaTabela #tabela_original").val();
		$tabela_destino		=	$("#modalCopiaTabela #tabela_destino").val();
		if ($tabela_destino != '') {
			$("#modalCopiaTabela #labelLoading").toggle('slow');
			$.post(
				_systempath +'cad_cadastros/clonarTabela',
				{
					tabela_original:$tabela_original,
					tabela_destino:$tabela_destino
				},
				function(retorno) {
					if (retorno == '1') {
						location.reload();
					}
				}
			);
		}
		else {
			toastr.error("Informe o nome da tabela!");
			$("#modalCopiaTabela #tabela_destino").focus();
		}
	});
	/* /#modalCopiaTabela */

	$(".copiar-relatorio").on('click', function() {
		$idRelatorio		=	$(this).attr('data-id-relatorio');
		$tituloRelatorio	=	$(this).attr('data-titulo-relatorio');
		$("#modalCopiaRelatorio input#idRelatorio").val($idRelatorio);
		$("#modalCopiaRelatorio input#relatorio_original").val($tituloRelatorio);
		$("#modalCopiaRelatorio input#relatorio_destino").val($tituloRelatorio +'_2');
		$("#modalCopiaRelatorio").modal('show');
	});

	/* #modalCopiaRelatorio */
	$("#modalCopiaRelatorio #btnCopiarRelatorio").on('click', function() {
		$idRelatorio		=	$("#modalCopiaRelatorio #idRelatorio").val();
		$tituloRelatorio	=	$("#modalCopiaRelatorio #relatorio_destino").val();
		if ($tituloRelatorio != '') {
			$("#modalCopiaRelatorio #labelLoading").toggle('slow');
			$.post(
				_systempath +'relatorios/copiarRelatorio',
				{
					idRelatorio:$idRelatorio,
					tituloRelatorio:$tituloRelatorio
				},
				function(retorno) {
					if (retorno == '1') {
						location.reload();
					} else {
						console.log(retorno);
					}
				}
			);
		}
		else {
			toastr.error("Informe o nome do relatório!");
			$("#modalCopiaRelatorio #relatorio_destino").focus();
		}
	});
	/* /#modalCopiaRelatorio */

	if ($('.questionario').length) {

		$("#modalExcluirCF").on('hide.bs.modal', function() {
			$("#modalExcluirCF #span-registro").html('');
			$("#modalExcluirCF #btn-excluir-cf").attr('onclick', '');
		});

		/* $(".tabelas").on('click', function() {
		 	return false;
		 });*/

		$(".next-step").click(function (e) {
			var $active = $('.questionario .nav-tabs a.active');
			//console.log($active[0]);
			$fieldsEmpty = 0;
			switch($active[0]['id']) {
				case "nav-titular-tab" :
					$('#nav-titular :input').each(function() {
						$input = $(this);
						if ($input.attr('required') && $input.val().length == 0) {
							$input.addClass('is-invalid');
							if ($fieldsEmpty == 0) {
								$input.focus();
							}
							$fieldsEmpty++;
							$('.questionario .nav-tabs .nav-link').addClass('disabled');
							$('.questionario .msg-erro').html('Preencha esse campo');
							$active.removeClass('disabled');
							

						} else {
							$input.removeClass('is-invalid');
						}
					});
					break;

				case "nav-conjuge-tab" :
					if ($('input[name="sn_conjuge"]').val() == "S") {
						$('#nav-conjuge :input').each(function() {
							$input = $(this);
							if ($input.attr('required') && $input.val().length == 0) {
								$input.addClass('is-invalid');
								$input.focus();
								if ($fieldsEmpty == 0) {
									$input.focus();
								}
								$fieldsEmpty++;
								$('.questionario .nav-tabs #nav-familiar-tab').addClass('disabled');
								$('.questionario .nav-tabs #nav-renda-tab').addClass('disabled');
								$('.questionario .nav-tabs #nav-saude-tab').addClass('disabled');
								$('.questionario .nav-tabs #nav-outros-tab').addClass('disabled');
							} else {
								$input.removeClass('is-invalid');
							}
						});
					}
					if ($('.editar').length) {
						$rendaTitular	= $('#renda').val();
						$rendaTitular	= ($rendaTitular) ? moeda2float($rendaTitular) : '0.00';
						$rendaFamiliar  = $('#renda_familiares').val();
						$rendaFamiliar  = ($rendaFamiliar) ? moeda2float(rendaFamiliar) : '0.00'
						$rendaConjuge	= $('#renda_cj').val();
						$rendaConjuge	= ($rendaConjuge) ? moeda2float($rendaConjuge) : '0.00';

						$qtdFamiliares	= $('input[name="qtd_familiares"]').val();

						$rendaFamiliar	= 0;
						for (var i = 0; i < $qtdFamiliares; i++) {
							$rendaCompFamiliar	= $('#renda_cf_'+ i).val();
							$rendaCompFamiliar	= ($rendaCompFamiliar) ? moeda2float($rendaCompFamiliar) : '0.00';
							$rendaFamiliar		= $rendaFamiliar + parseFloat($rendaCompFamiliar);
						}

						$rendaTotal	= parseFloat($rendaTitular) + parseFloat($rendaConjuge) + parseFloat($rendaFamiliar);

						$.post(
							_systempath +'questionario/selecionarFaixaRenda',
							{
								renda : $rendaTotal
							},
							function(retorno) {
								if (retorno != '') {
									$('#ce_faixa_renda').val(retorno);
									$('#ce_faixa_renda').val(retorno);
									$('#ce_faixa_renda option:not(:selected)').prop('disabled', true);
								}
							}
						);
					}
					break;

				case "nav-familiar-tab" :
					$rendaTitular	= $('#renda').val();
					$rendaTitular	= ($rendaTitular) ? moeda2float($rendaTitular) : '0.00';
					$rendaConjuge	= $('#renda_cj').val();
					$rendaConjuge	= ($rendaConjuge) ? moeda2float($rendaConjuge) : '0.00';

					$qtdFamiliares	= $('input[name="qtd_familiares"]').val();

					$rendaFamiliar	= 0;
					for (var i = 0; i < $qtdFamiliares; i++) {
						$rendaCompFamiliar	= $('#renda_cf_'+ i).val();
						$rendaCompFamiliar	= ($rendaCompFamiliar) ? moeda2float($rendaCompFamiliar) : '0.00';
						$rendaFamiliar		= $rendaFamiliar + parseFloat($rendaCompFamiliar);
					}

					$rendaTotal	= parseFloat($rendaTitular) + parseFloat($rendaConjuge) + parseFloat($rendaFamiliar);

					$.post(
						_systempath +'questionario/selecionarFaixaRenda',
						{
							renda : $rendaTotal
						},
						function(retorno) {
							if (retorno != '') {
								$('#ce_faixa_renda').val(retorno);
								$('#ce_faixa_renda option:not(:selected)').prop('disabled', true);
							}
						}
					);
					break;

				case "nav-renda-tab" :
					$('#nav-renda :input').each(function() {
						$input = $(this);
						if ($input.attr('required') && $input.val().length == 0) {
							$input.addClass('is-invalid');
							if ($fieldsEmpty == 0) {
								$input.focus();
							}
							$fieldsEmpty++;
							$('.questionario .nav-tabs #nav-saude-tab').addClass('disabled');
							$('.questionario .nav-tabs #nav-outros-tab').addClass('disabled');
						} else {
							$input.removeClass('is-invalid');
						}
					});
					break;

				case "nav-saude-tab" :
					$('#nav-saude :input').each(function() {
						$input = $(this);
						if ($input.attr('required') && $input.val().length == 0) {
							$input.addClass('is-invalid');
							if ($fieldsEmpty == 0) {
								$input.focus();
							}
							$fieldsEmpty++;
							$('.questionario .nav-tabs #nav-outros-tab').addClass('disabled');
						} else {
							$input.removeClass('is-invalid');
						}
					});
					break;
			}
			if ($fieldsEmpty == 0) {
				$active.addClass('disabled');

				$active.next().removeClass('disabled');
				nextTab($active);
				$('.msg-erro').addClass('d-none');
				//$("html, body").animate({ scrollTop: 0 }, "slow"); // Scroll to Top
				//$active.focus();
			} else {
				toastr.error("Preencha os campos obrigatórios!", '', {positionClass: 'toast-top-center'});
			}
		});
		$(".prev-step").click(function (e) {
			var $active = $('.questionario .nav-tabs a.active');
			$active.addClass('disabled');
			console.log($($active).prev());
			$($active).prev().removeClass('disabled');
			prevTab($active);
			//$("html, body").animate({ scrollTop: 0 }, "slow"); // Scroll to Top
		});

		// POSSUI CONJUGE
		if ($('input[name="sn_conjuge"]').length) {
			$('input[name="sn_conjuge"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-conjuge').removeClass('d-none');
					$(".opt-conjuge :input").attr("disabled", false);
					$("#cpf_cj").attr('required', true);
					$("#conjuge").attr('required', true);
				}
				else if ($valor == 'N') { // NÃO
					$('.cj-error-msg').addClass('d-none');
					$('.opt-adicionar-conjuge').addClass('d-none');
					$('.opt-adicionar-conjuge :input').attr('disabled', true);
					$('.opt-conjuge').addClass('d-none');
					$(".opt-conjuge :input").attr("disabled", true);
					$("#cpf_cj").attr('required', false);
					$("#cpf_cj").val('');
					$("#conjuge").attr('required', false);
					$("#conjuge").val('');
					$("#cpf_cj").removeAttr('readonly');

				}
			});
		}
		// ATIVIDADE REMUNERADA
		if ($('input[name="sn_atividade_remunerada"]').length) {
			$('input[name="sn_atividade_remunerada"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-atividade-remunerada').removeClass('d-none');
					$(".opt-atividade-remunerada :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-atividade-remunerada').addClass('d-none');
					$(".opt-atividade-remunerada :input").attr("disabled", true);
				}
			});
		}
		// ATIVIDADE REMUNERADA - CONJUGE
		if ($('input[name="sn_atividade_remunerada_cj"]').length) {
			$('input[name="sn_atividade_remunerada_cj"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-atividade-remunerada-cj').removeClass('d-none');
					$(".opt-atividade-remunerada-cj :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-atividade-remunerada-cj').addClass('d-none');
					$(".opt-atividade-remunerada-cj :input").attr("disabled", true);
				}
			});
		}
		// ATIVIDADE REMUNERADA - COMPONENTE FAMILIAR
		if ($('input[name="inc_sn_atividade_remunerada_cf"]').length) {
			$('input[name="inc_sn_atividade_remunerada_cf"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-atividade-remunerada-cf').removeClass('d-none');
					$(".opt-atividade-remunerada-cf :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-atividade-remunerada-cf').addClass('d-none');
					$(".opt-atividade-remunerada-cf :input").attr("disabled", true);
				}
			});
		}
		// DEFICIÊNCIA
		if ($('input[name="sn_deficiencia"]').length) {
			$('input[name="sn_deficiencia"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-deficiencia').removeClass('d-none');
					$(".opt-deficiencia :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-deficiencia').addClass('d-none');
					$(".opt-deficiencia :input").attr("disabled", true);
				}
			});
		}
		// DEFICIÊNCIA - CONJUGE
		if ($('input[name="sn_deficiencia_cj"]').length) {
			$('input[name="sn_deficiencia_cj"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-deficiencia-cj').removeClass('d-none');
					$(".opt-deficiencia-cj :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-deficiencia-cj').addClass('d-none');
					$(".opt-deficiencia-cj :input").attr("disabled", true);
				}
			});
		}
		// DEFICIÊNCIA - COMPONENTE FAMILIAR
		if ($('input[name="inc_sn_deficiencia_cf"]').length) {
			$('input[name="inc_sn_deficiencia_cf"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-deficiencia-cf').removeClass('d-none');
					$(".opt-deficiencia-cf :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-deficiencia-cf').addClass('d-none');
					$(".opt-deficiencia-cf :input").attr("disabled", true);
				}
			});
		}
		// BENEFÍCIOS SOCIAIS
		if ($('input[name="sn_beneficios"]').length) {
			$('input[name="sn_beneficios"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-beneficios-sociais').removeClass('d-none');
					//$(".opt-beneficios-sociais :input").attr("disabled", false);
					$('#auxilio_aluguel').attr("disabled", false);
					if ($('input[name="auxilio_aluguel"]').checked == false) {
						$('.opt-auxilio_aluguel').addClass('d-none');
					}
					$('#bolsa_familia').attr("disabled", false);
					if ($('input[name="bolsa_familia"]').checked == false) {
						$('.opt-bolsa-familia').addClass('d-none');
					}
					$('#bpc').attr("disabled", false);
					if ($('input[name="bpc"]').checked == false) {
						$('.opt-bpc').addClass('d-none');
					}
					$('#peti').attr("disabled", false).attr("checked", false);
					if ($('input[name="peti"]').checked == false) {
						$('.opt-peti').addClass('d-none');
					}
					$('#outros_beneficios').attr("disabled", false).attr("checked", false);
					if ($('input[name="outros_beneficios"]').checked == false) {
						$('.opt-outros-beneficios').addClass('d-none');
					}
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-beneficios-sociais').addClass('d-none');
					$(".opt-beneficios-sociais :input").attr("disabled", true);
					$('#auxilio_aluguel').prop("checked", false);
					$('.opt-auxilio_aluguel').addClass('d-none');
					$('#bolsa_familia').prop("checked", false);
					$('.opt-bolsa-familia').addClass('d-none');
					$('#bpc').prop("checked", false);
					$('.opt-bpc').addClass('d-none');
					$('#peti').prop("checked", false);
					$('.opt-peti').addClass('d-none');
					$('#outros_beneficios').prop("checked", false);
					$('.opt-outros-beneficios').addClass('d-none');
				}
			});
		}

		//auxilio aluguel
		if ($('input[name="auxilio_aluguel"]').length) {
			$('input[name="auxilio_aluguel"]').on('click', function() {
				if ($(this).is(':checked')) { // SIM
					$('#vlr_auxilio_aluguel').attr("disabled", false);
					$('.opt-auxilio_aluguel').removeClass('d-none');
				}
				else { // NÃO
					$('#vlr_auxilio_aluguel').attr("disabled", true);
					$('.opt-auxilio_aluguel').addClass('d-none');
				}
			});
		}
		// BOLSA FAMÍLIA
		if ($('input[name="bolsa_familia"]').length) {
			$('input[name="bolsa_familia"]').on('click', function() {
				if ($(this).is(':checked')) { // SIM
					$('#vlr_bolsa_familia').attr("disabled", false);
					$('.opt-bolsa-familia').removeClass('d-none');
				}
				else { // NÃO
					$('#vlr_bolsa_familia').attr("disabled", true);
					$('.opt-bolsa-familia').addClass('d-none');
				}
			});
		}
		// BPC
		if ($('input[name="bpc"]').length) {
			$('input[name="bpc"]').on('click', function() {
				if ($(this).is(':checked')) { // SIM
					$('#vlr_bpc').attr("disabled", false);
					$('.opt-bpc').removeClass('d-none');
				}
				else { // NÃO
					$('#vlr_bpc').attr("disabled", true);
					$('.opt-bpc').addClass('d-none');
				}
			});
		}
		// PETI
		if ($('input[name="peti"]').length) {
			$('input[name="peti"]').on('click', function() {
				if ($(this).is(':checked')) { // SIM
					$('#vlr_peti').attr("disabled", false);
					$('.opt-peti').removeClass('d-none');
				}
				else { // NÃO
					$('#vlr_peti').attr("disabled", true);
					$('.opt-peti').addClass('d-none');
				}
			});
		}
		// OUTROS BENEFICIOS
		if ($('input[name="outros_beneficios"]').length) {
			$('input[name="outros_beneficios"]').on('click', function() {
				if ($(this).is(':checked')) { // SIM
					$('#vlr_outros_beneficios').attr("disabled", false);
					$('#desc_outros_beneficios').attr("disabled", false);
					$('.opt-outros-beneficios').removeClass('d-none');
				}
				else { // NÃO
					$('#vlr_outros_beneficios').attr("disabled", true);
					$('#desc_outros_beneficios').attr("disabled", true);
					$('.opt-outros-beneficios').addClass('d-none');
				}
			});
		}
		// DOENÇAS
		if ($('input[name="sn_doenca"]').length) {
			$('input[name="sn_doenca"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-doencas').removeClass('d-none');
					$(".opt-doencas :input").attr("disabled", false);
					$(".opt-doencas :input[name=num_pessoas_doenca]").val("1");
					$(".opt-doencas :input[name=num_pessoas_doenca]").attr("min", '1');
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-doencas').addClass('d-none');
					$(".opt-doencas :input").attr("disabled", true);
					$(".opt-doencas :input[name=num_pessoas_doenca]").val("0");
					$(".opt-doencas :input[name=num_pessoas_doenca]").attr("min", '0');
				}
			});
		}
		// GESTANTES
		if ($('input[name="sn_gestantes"]').length) {
			$('input[name="sn_gestantes"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-gestantes').removeClass('d-none');
					$(".opt-gestantes :input").attr("disabled", false);
					$(".opt-doencas :input[name=num_gestantes]").val("1");
					$(".opt-doencas :input[name=num_gestantes]").attr("min", '1');


				}
				else if ($valor == 'N') { // NÃO
					$('.opt-gestantes').addClass('d-none');
					$(".opt-gestantes :input").attr("disabled", true);
					$(".opt-doencas :input[name=num_gestantes]").val("0");
					$(".opt-doencas :input[name=num_gestantes]").attr("min", '0');

				}
			});
		}
		// IDOSOS
		if ($('input[name="sn_idosos"]').length) {
			$('input[name="sn_idosos"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-idosos').removeClass('d-none');
					$(".opt-idosos :input").attr("disabled", false);
					$(".opt-doencas :input[name=num_idosos]").val("1");
					$(".opt-doencas :input[name=num_idosos]").attr("min", '1');

				}
				else if ($valor == 'N') { // NÃO
					$('.opt-idosos').addClass('d-none');
					$(".opt-idosos :input").attr("disabled", true);
					$(".opt-doencas :input[name=num_idosos]").val("0");
					$(".opt-doencas :input[name=num_idosos]").attr("min", '0');

				}
			});
		}
		// RECEM-NASCIDOS
		if ($('input[name="sn_recem_nascidos"]').length) {
			$('input[name="sn_recem_nascidos"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-recem-nascidos').removeClass('d-none');
					$(".opt-recem-nascidos :input").attr("disabled", false);
					$(".opt-doencas :input[name=num_recem_nascidos]").val("1");
					$(".opt-doencas :input[name=num_recem_nascidos]").attr("min", '1');


				}
				else if ($valor == 'N') { // NÃO
					$('.opt-recem-nascidos').addClass('d-none');
					$(".opt-recem-nascidos :input").attr("disabled", true);
					$(".opt-doencas :input[name=num_recem_nascidos]").val("0");
					$(".opt-doencas :input[name=num_recem_nascidos]").attr("min", '0');


				}
			});
		}
		// PSF
		if ($('input[name="sn_psf"]').length) {
			$('input[name="sn_psf"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-psf').removeClass('d-none');
					$(".opt-psf :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-psf').addClass('d-none');
					$(".opt-psf :input").attr("disabled", true);
				}
			});
		}
		// AGENTE DE SAÚDE NA FAMILIA
		if ($('input[name="sn_agente_familia"]').length) {
			$('input[name="sn_agente_familia"]').on('click', function() {
				$valor = $(this).val();
				if ($valor == 'S') { // SIM
					$('.opt-agente-familia').removeClass('d-none');
					$(".opt-agente-familia :input").attr("disabled", false);
				}
				else if ($valor == 'N') { // NÃO
					$('.opt-agente-familia').addClass('d-none');
					$(".opt-agente-familia :input").attr("disabled", true);
				}
			});
		}
	}

});

function logout() {
	$("#logoutModal").modal();
	$("#btn-confirma").click(function() {
		$("#logoutModal").modal("hide");
		$('#logoutModal').on('hidden.bs.modal', function (e) {
			window.location.href = _systempath + 'usuarios/logout';
		});
	});
}

function excluirCadastro(link) {
	_id_cadastro = $(link).attr('data-id-cadastro');
}

function showModalMarcarContemplado(link){
	_id_familia = $(link).data('id_familia');
	$("#modalMarcarContemplado .id_familia").val(_id_familia);
}

function showModalDesmarcarContemplado(link){
	_id_familia = $(link).data('id_familia');
	$("#modalDesmarcarContemplado .id_familia").val(_id_familia);
}

function showOptionsAddCF() {
	$(".card-add-familiar").removeClass('d-none');
	$(".bar-btn-add-familiar").addClass('d-none');
}

function consulta($caminho) {
	$("#form_insert").attr('action', _systempath + $caminho).removeAttr('target');
}

function relatorio($caminho) {
	$("#form_insert").attr('action', _systempath + $caminho).attr('target', '_blank');
}

function nextTab(elem) {
	$(elem).next().tab('show');
}
function prevTab(elem) {
	$(elem).prev().tab('show');
}

function consultarTitular() {
	$cpf = $("#cpf").val();
	if ($cpf) {
		$("#labelLoading").removeClass('d-none');
	}
}

function consultarConjuge() {
	$cpf_conjuge = $("#cpf_cj").val();
	$cpf_titular = $("#cpf").val();
	$('.cj-error-msg').addClass('d-none');
	//console.log($cpf);
	if ($cpf_conjuge) {
		if ($cpf_conjuge != $cpf_titular) {
			$("#labelLoadingCj").removeClass('d-none');
			$.post(
				_systempath +'questionario/verificarCpfTitular',
				{ cpf : $cpf_conjuge },
				function(retorno) {
					if (retorno == '') {
						$(".opt-adicionar-conjuge").removeClass('d-none');
						$('.opt-adicionar-conjuge :input').attr('disabled', false);
						$(".opt-atividade-remunerada-cj :input").attr("disabled", true);
						$(".opt-deficiencia-cj :input").attr("disabled", true);
						$("#cpf_cj").attr('readonly', true);
					} else {
						$(".opt-adicionar-conjuge").addClass('d-none');
						$('.opt-adicionar-conjuge :input').attr('disabled', true);
						$('.cj-error-msg').removeClass('d-none');
					}
					$("#labelLoadingCj").addClass('d-none');
				}
			);
		} else {
			$(".opt-adicionar-conjuge").addClass('d-none');
			$('.opt-adicionar-conjuge :input').attr('disabled', true);
			$('.cj-error-msg').removeClass('d-none');
		}
	} else {
		$(".opt-adicionar-conjuge").addClass('d-none');
		$('.opt-adicionar-conjuge :input').attr('disabled', true);
		$("#cpf_cj").attr('value', '');
	}
}

function limparCamposCF() {
	$('#inc_id_cf').val('');
	$('#inc_nome_cf').val('');
	$('input[name="inc_sexo_cf_m"]').prop('checked', true);
	$('#inc_dt_nascimento_cf').val('');
	$('#inc_ce_grau_parentesco_cf').val('');
	$('#inc_ce_escolaridade_cf').val('');
	$('#inc_escola_cf').val('');

	$('#sn_atividade_remunerada_cf_n').prop("checked", true);
	$('.opt-atividade-remunerada-cf').addClass('d-none');
	$('.opt-atividade-remunerada-cf input').attr("disabled", true);

	$('#inc_ce_atividade_desenvolvida_cf').val('');
	$('#inc_ce_tipo_vinculo_cf').val('');
	$('#inc_tempo_atividade_anos_cf').val('');
	$('#inc_tempo_atividade_meses_cf').val('');
	$('#inc_renda_cf').val('');
	$('input[name="inc_sn_deficiencia_cf"]').prop('checked', false);

	$('#sn_deficiencia_cf_n').prop("checked", true);
	$('.opt-deficiencia-cf').addClass('d-none');
	$('.opt-deficiencia-cf input').attr("disabled", true);

	$('#inc_ce_deficiencia_cf').val('');
	$('#inc_cid_cf').val('');

	$('.card-add-familiar input').removeClass('is-invalid');
	$('.card-add-familiar .btn-add-cf').removeClass('d-none');
	$('.card-add-familiar .btn-alt-cf').addClass('d-none');
	$('.card-add-familiar .btn-cancelar-cf').addClass('d-none');
}

function validarCF() {
	$fieldsEmpty = 0;
	$('.card-add-familiar input').each(function() {
		$input = $(this);
		//console.log($input, $input.attr('id') +' '+ $input.val());
		if ($input.val().length == 0) {
			if ($input.attr('id') == 'inc_ce_atividade_desenvolvida_cf' || $input.attr('id') == 'inc_ce_tipo_vinculo_cf'  || 
				$input.attr('id') == 'inc_tempo_atividade_anos_cf' || $input.attr('id') == 'inc_tempo_atividade_meses_cf' || 
				$input.attr('id') == 'inc_renda_cf') {
				if ($('input[name="inc_sn_atividade_remunerada_cf"]:checked').val() == "S") {
					$input.addClass('is-invalid');
					$input.focus();
					$fieldsEmpty++;
					return false;
				}
			} else if ($input.attr('id') == 'inc_ce_deficiencia_cf' || $input.attr('id') == 'inc_cid_cf') {
				if ($('input[name="inc_sn_deficiencia_cf"]:checked').val() == "S") {
					$input.addClass('is-invalid');
					$input.focus();
					$fieldsEmpty++;
					return false;
				}
			} else {
				if ($input.attr('id') != 'inc_id_cf' && $input.attr('id') != 'inc_ce_grau_parentesco_cf') {
					$input.addClass('is-invalid');
					$input.focus();
					$fieldsEmpty++;
					return false;
				}
			}
		} else {
			$input.removeClass('is-invalid');
		}
	});
	if ($fieldsEmpty == '0') {
		return true;
	} else {
		return false;
	}
}

function adicionarCF() {
	if (validarCF()) {
		$nome						= $('#inc_nome_cf').val();
		$sexo						= $('input[name="inc_sexo_cf"]:checked').val();
		$dt_nascimento				= $('#inc_dt_nascimento_cf').val();
		$ce_grau_parentesco			= $('#inc_ce_grau_parentesco_cf').val();
		$grau_parentesco			= ($ce_grau_parentesco != '') ? $('#inc_ce_grau_parentesco_cf option:selected').html() : '';
		$ce_escolaridade			= $('#inc_ce_escolaridade_cf').val();
		$escolaridade				= ($ce_escolaridade != '') ? $('#inc_ce_escolaridade_cf option:selected').html() : '';
		$escola_bairro				= $('#inc_escola_cf').val();
		$sn_atividade_remunerada	= $('input[name="inc_sn_atividade_remunerada_cf"]:checked').val();
		$trabalha					= ($sn_atividade_remunerada == 'S') ? "Sim" : "Não";
		$ce_atividade_desenvolvida	= $('#inc_ce_atividade_desenvolvida_cf').val();
		$ce_tipo_vinculo			= $('#inc_ce_tipo_vinculo_cf').val();
		$tempo_atividade_anos		= $('#inc_tempo_atividade_anos_cf').val();
		$tempo_atividade_meses		= $('#inc_tempo_atividade_meses_cf').val();
		$renda						= $('#inc_renda_cf').val();
		$sn_deficiencia				= $('input[name="inc_sn_deficiencia_cf"]:checked').val();
		$possui_deficiencia			= ($sn_deficiencia == 'S') ? "Sim" : "Não";
		$ce_deficiencia				= $('#inc_ce_deficiencia_cf').val();
		$cid						= $('#inc_cid_cf').val();

		if (!$('table[name="table-componente-familiar"] tbody').length) {
			$('table[name="table-componente-familiar"]').append('<tbody></tbody>');
		}

		$numFamiliares = $('input[name="qtd_familiares"]').val();

		$classe = ($numFamiliares % 2 == '0') ? 'odd' : 'alt even';

		$linha	=	'<tr role="row" class="'+ $classe +' cf-'+ $numFamiliares +'">'+
						'<input type="hidden" name="id_cf[]" value="" id="id_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="nome_cf[]" value="'+ $nome +'" id="nome_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="sexo_cf[]" value="'+ $sexo +'" id="sexo_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="dt_nascimento_cf[]" value="'+ $dt_nascimento +'" id="dt_nascimento_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="ce_grau_parentesco_cf[]" value="'+ $ce_grau_parentesco +'" id="ce_grau_parentesco_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="ce_escolaridade_cf[]" value="'+ $ce_escolaridade +'" id="ce_escolaridade_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="escola_bairro_cf[]" value="'+ $escola_bairro +'" id="escola_bairro_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="sn_atividade_remunerada_cf[]" value="'+ $sn_atividade_remunerada +'" id="sn_atividade_remunerada_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="ce_atividade_desenvolvida_cf[]" value="'+ $ce_atividade_desenvolvida +'" id="ce_atividade_desenvolvida_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="ce_tipo_vinculo_cf[]" value="'+ $ce_tipo_vinculo +'" id="ce_tipo_vinculo_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="tempo_atividade_cf_anos[]" value="'+ $tempo_atividade_anos +'" id="tempo_atividade_cf_anos_'+ $numFamiliares +'">'+
						'<input type="hidden" name="tempo_atividade_cf_meses[]" value="'+ $tempo_atividade_meses +'" id="tempo_atividade_cf_meses_'+ $numFamiliares +'">'+
						'<input type="hidden" name="renda_cf[]" value="'+ $renda +'" id="renda_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="sn_deficiencia_cf[]" value="'+ $sn_deficiencia +'" id="sn_deficiencia_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="ce_deficiencia_cf[]" value="'+ $ce_deficiencia +'" id="ce_deficiencia_cf_'+ $numFamiliares +'">'+
						'<input type="hidden" name="cid_cf[]" value="'+ $cid +'" id="cid_cf_'+ $numFamiliares +'">'+
						'<td class="nome">'+ $nome.toUpperCase() +'</td>'+
						'<td class="idade">'+ idade($dt_nascimento) +'</td>'+
						'<td class="grau-parentesco">'+ $grau_parentesco +'</td>'+
						'<td class="escolaridade">'+ $escolaridade +'</td>'+
						'<td class="escola-bairro">'+ $escola_bairro.toUpperCase() +'</td>'+
						'<td class="trabalha">'+ $trabalha +'</td>'+
						'<td class="possui-deficiencia">'+ $possui_deficiencia +'</td>'+
						'<td>'+
							'<a class="btn btn-default btn-sm" href="javascript:;" onclick="alteracaoCf('+ $numFamiliares +')" data-toggle="tooltip" title="Editar"><i class="fa fa-pen-square"></i></a> '+
							'<a class="btn btn-default btn-sm" href="javascript:;" onclick="excluirCf(this)" data-toggle="tooltip" title="Excluir" data-id="'+ $numFamiliares +'" data-descricao="'+ $nome +'"><i class="fa fa-times"></i></a>'+
						'</td>'+
					'</tr>';

		$('table[name="table-componente-familiar"] tbody').append($linha);

		$('input[name="qtd_familiares"]').val(parseInt($numFamiliares, 10)+1);

		limparCamposCF();
		$('[data-toggle="tooltip"]').tooltip();
	}
}

function alteracaoCf(id_cf) {
	$nome						= $('#nome_cf_'+ id_cf).val();
	$sexo						= $('#sexo_cf_'+ id_cf).val();
	$dt_nascimento				= $('#dt_nascimento_cf_'+ id_cf).val();
	$ce_grau_parentesco			= $('#ce_grau_parentesco_cf_'+ id_cf).val();
	$ce_escolaridade			= $('#ce_escolaridade_cf_'+ id_cf).val();
	$escola_bairro				= $('#escola_bairro_cf_'+ id_cf).val();
	$sn_atividade_remunerada	= $('#sn_atividade_remunerada_cf_'+ id_cf).val();
	$ce_atividade_desenvolvida	= $('#ce_atividade_desenvolvida_cf_'+ id_cf).val();
	$ce_tipo_vinculo			= $('#ce_tipo_vinculo_cf_'+ id_cf).val();
	$tempo_atividade_anos		= $('#tempo_atividade_cf_anos_'+ id_cf).val();
	$tempo_atividade_meses		= $('#tempo_atividade_cf_meses_'+ id_cf).val();
	$renda						= $('#renda_cf_'+ id_cf).val();
	$sn_deficiencia				= $('#sn_deficiencia_cf_'+ id_cf).val();
	$ce_deficiencia				= $('#ce_deficiencia_cf_'+ id_cf).val();
	$cid						= $('#cid_cf_'+ id_cf).val();

	//console.log(id_cf, $nome, $sexo, $dt_nascimento, $ce_grau_parentesco, $ce_escolaridade, $escola_bairro, $sn_atividade_remunerada, $ce_atividade_desenvolvida, $ce_tipo_vinculo, $tempo_atividade, $renda, $sn_deficiencia, $ce_deficiencia, $cid);

	$('#inc_id_cf').val(id_cf);
	$('#inc_nome_cf').val($nome.toUpperCase());
	$('#inc_nome_cf').focus();
	$('input[name="inc_sexo_cf"]:checked').val();
	$('#inc_dt_nascimento_cf').val($dt_nascimento);
	$('#inc_ce_grau_parentesco_cf').val($ce_grau_parentesco);
	$('#inc_ce_escolaridade_cf').val($ce_escolaridade);
	$('#inc_escola_cf').val($escola_bairro.toUpperCase());

	if ($sn_atividade_remunerada == 'S') {
		$('#sn_atividade_remunerada_cf_s').prop("checked", true);
		$('.opt-atividade-remunerada-cf').removeClass('d-none');
		$('.opt-atividade-remunerada-cf input').attr("disabled", false);
	}
	else {
		$('#sn_atividade_remunerada_cf_n').prop("checked", true);
		$('.opt-atividade-remunerada-cf').addClass('d-none');
		$('.opt-atividade-remunerada-cf input').attr("disabled", true);
	}

	$('#inc_ce_atividade_desenvolvida_cf').val($ce_atividade_desenvolvida);
	$('#inc_ce_tipo_vinculo_cf').val($ce_tipo_vinculo);
	$('#inc_tempo_atividade_anos_cf').val($tempo_atividade_anos);
	$('#inc_tempo_atividade_meses_cf').val($tempo_atividade_meses);
	$('#inc_renda_cf').val($renda);
	$('input[name="inc_sn_deficiencia_cf"]:checked').val();

	if ($sn_deficiencia == 'S') {
		$('#sn_deficiencia_cf_s').prop("checked", true);
		$('.opt-deficiencia-cf').removeClass('d-none');
		$('.opt-deficiencia-cf input').attr("disabled", false);
	}
	else {
		$('#sn_deficiencia_cf_n').prop("checked", true);
		$('.opt-deficiencia-cf').addClass('d-none');
		$('.opt-deficiencia-cf input').attr("disabled", true);
	}

	$('#inc_ce_deficiencia_cf').val($ce_deficiencia);
	$('#inc_cid_cf').val($cid);

	$('.btn-add-cf').addClass('d-none');
	$('.btn-alt-cf').removeClass('d-none');
	$('.btn-cancelar-cf').removeClass('d-none');
}

function alterarCF() {
	$id_cf = $('#inc_id_cf').val();
	if ($id_cf != '' && validarCF()) {
		$nome = $('#inc_nome_cf').val();
		$('#nome_cf_'+ $id_cf).val($nome.toUpperCase());
		$('.cf-'+ $id_cf +' .nome').text($nome.toUpperCase());

		$sexo = $('input[name="inc_sexo_cf"]:checked').val();
		$('#sexo_cf_'+ $id_cf).val($sexo);

		$dt_nascimento = $('#inc_dt_nascimento_cf').val();
		$('#dt_nascimento_cf_'+ $id_cf).val($dt_nascimento);
		$('.cf-'+ $id_cf +' .idade').text(idade($dt_nascimento));

		$ce_grau_parentesco	= $('#inc_ce_grau_parentesco_cf').val();
		$grau_parentesco	= ($ce_grau_parentesco != '') ? $('#inc_ce_grau_parentesco_cf option:selected').html() : '';
		$('#ce_grau_parentesco_cf_'+ $id_cf).val($ce_grau_parentesco);
		$('.cf-'+ $id_cf +' .grau-parentesco').text($grau_parentesco);

		$ce_escolaridade	= $('#inc_ce_escolaridade_cf').val();
		$escolaridade		= ($ce_escolaridade != '') ? $('#inc_ce_escolaridade_cf option:selected').html() : '';
		$('#ce_escolaridade_cf_'+ $id_cf).val($ce_escolaridade);
		$('.cf-'+ $id_cf +' .escolaridade').text($escolaridade);

		$escola_bairro = $('#inc_escola_cf').val();
		$('#escola_bairro_cf_'+ $id_cf).val($escola_bairro.toUpperCase());
		$('.cf-'+ $id_cf +' .escola-bairro').text($escola_bairro.toUpperCase());

		$sn_atividade_remunerada = $('input[name="inc_sn_atividade_remunerada_cf"]:checked').val();
		$('#sn_atividade_remunerada_cf_'+ $id_cf).val($sn_atividade_remunerada);
		if ($sn_atividade_remunerada == 'S') {
			$('.cf-'+ $id_cf +' .trabalha').text("Sim");
			$ce_atividade_desenvolvida	= $('#inc_ce_atividade_desenvolvida_cf').val();
			$ce_tipo_vinculo			= $('#inc_ce_tipo_vinculo_cf').val();
			$tempo_atividade_anos		= $('#inc_tempo_atividade_anos_cf').val();
			$tempo_atividade_meses		= $('#inc_tempo_atividade_meses_cf').val();
			$renda						= $('#inc_renda_cf').val();
			$('#ce_atividade_desenvolvida_cf_'+ $id_cf).val($ce_atividade_desenvolvida);
			$('#ce_tipo_vinculo_cf_'+ $id_cf).val($ce_tipo_vinculo);
			$('#tempo_atividade_cf_anos_'+ $id_cf).val($tempo_atividade_anos);
			$('#tempo_atividade_cf_meses_'+ $id_cf).val($tempo_atividade_meses);
			$('#renda_cf_'+ $id_cf).val($renda);
		} else {
			$('.cf-'+ $id_cf +' .trabalha').text("Não");
			$('#ce_atividade_desenvolvida_cf_'+ $id_cf).val('');
			$('#ce_tipo_vinculo_cf_'+ $id_cf).val('');
			$('#tempo_atividade_cf_anos_'+ $id_cf).val('');
			$('#tempo_atividade_cf_meses_'+ $id_cf).val('');
			$('#renda_cf_'+ $id_cf).val('');
		}

		$sn_deficiencia = $('input[name="inc_sn_deficiencia_cf"]:checked').val();
		$('#sn_deficiencia_cf_'+ $id_cf).val($sn_deficiencia);
		if ($sn_deficiencia == 'S') {
			$('.cf-'+ $id_cf +' .possui-deficiencia').text("Sim");
			$ce_deficiencia	= $('#inc_ce_deficiencia_cf').val();
			$cid			= $('#inc_cid_cf').val();
			$('#ce_deficiencia_cf_'+ $id_cf).val($ce_deficiencia);
			$('#cid_cf_'+ $id_cf).val($cid);
		} else {
			$('.cf-'+ $id_cf +' .possui-deficiencia').text("Não");
			$('#ce_deficiencia_cf_'+ $id_cf).val('');
			$('#cid_cf_'+ $id_cf).val('');
		}

		limparCamposCF();
	}
}
/*function limparCt(){

}*/
function excluirCf(id_cf) {
	$descricao	=	$(id_cf).attr('data-descricao');
	$id			=	$(id_cf).attr('data-id');
	$voltar		=	$(id_cf).attr('data-voltar');
	$("#modalExcluirCF #span-registro").html($descricao);
	$("#modalExcluirCF #btn-excluir-cf").attr('onclick', "removerCf($id)");
	$("#modalExcluirCF").modal('show');
}

function removerCf(id_cf) {
	$('.cf-'+ id_cf).remove();
	$qtd_familiares = $('input[name="qtd_familiares"]').val();
	$('input[name="qtd_familiares"]').val($qtd_familiares-1);
	$("#modalExcluirCF").modal('hide');
}

function idade(dt_nascimento) {
	var data = new Date(dt_nascimento);
	var currentDate = new Date();
	var currentYear = currentDate.getFullYear();
	var birthdayThisYear = new Date(currentYear, data.getMonth(), data.getDate());
	var idade = currentYear - data.getFullYear();
	if(birthdayThisYear > currentDate) {
		idade--;
	}
	return idade;
}

function submitForm(form) {
	$dados = $(form).serialize();

	console.log($dados);
}

function submitForm1(link) {
	$form = $(link).attr('data-form');

	$($form+ " ");
	$($form).submit();
}


function verificaCPF(cpf){
	if($(cpf).val().length == 14){
		if (!isCpf($(cpf).val())) {
			$(cpf).css('border-color','red');
			$(cpf).val('');
			$("#cpf_cnpj_erro").html('CPF INVÁLIDO!');
		}
		else{
			$(cpf).css('border-color','');
			$("#cpf_cnpj_erro").html('');
		}
	}
}





/*function tamanho_criancas(){
	if($

		)

}*/

function tamanho_campo(t_campo){
	var campo = $(t_campo).val();

	console.log(t_campo)

}
/*function validaCPFCNPJ(cpf_cnpj){
			var $cpf_cnpj		=	$(cpf_cnpj).val();
			var $tipo_pessoa	=	$(cpf_cnpj).attr('data-tipo-pessoa');
			var $retorno		=	false;
			if ($tipo_pessoa == 'F') {
				if (!isCpf($cpf_cnpj)) {
					console.log('CPF: '+$cpf_cnpj);
					avisoShow('#cpf_cnpjErro','CPF INVÁLIDO!',2000);
					$(cpf_cnpj).val('');
				}
				else{
					$retorno	=	true;
				}
			}
			else if ($tipo_pessoa == 'J'){
				if (!isCnpj($cpf_cnpj)) {
					console.log('CNPJ: '+$cpf_cnpj);
					avisoShow('#cpf_cnpjErro','CNPJ INVÁLIDO!',2000);
					$(cpf_cnpj).val('');
				}
				else{
					$retorno	=	true;
				}
			}
			return $retorno;
		}*/