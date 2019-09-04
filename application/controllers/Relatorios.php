<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Relatorios extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('relatorios_model');
		$this->load->model('cadastro_model');
	}

	/* Empresas */
	public function index() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['relatorios']		=	$this->relatorios_model->selecionar();
		$this->dados['form_relatorios']	=	'relatorios/gerarRelatorio';
		$this->dados['conteudo']		=	'layouts/relatorios_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	// Inscrição
	/* Relatórios da Empresa */
	public function relatorios($opcao_menu='geral') {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['opcaoMenu']		=	$opcaoMenu;
		$this->dados['relatorios']		=	$this->relatorios_model->selecionarRelEmpresaByIdEmpresa('1', $opcaoMenu);

		$this->dados['form_relatorios']	=	'relatorios/imprimir';
		$this->dados['conteudo']		=	'layouts/relatorios_gerar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function cadastrar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['relatorios']			=	$this->relatorios_model->selecionar();
		$this->dados['relatorios_empresas']	=	$this->relatorios_model->selecionarRelEmpresaByIdEmpresa('1');
		$this->dados['last_query']			=	$this->db->last_query();
		$this->dados['ce_empresa']			=	'1';

		$this->dados['form_relatorios']		=	'relatorios/cadastrar';
		$this->dados['conteudo']			=	'layouts/relatorios_cadastrar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function adicionar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$config	=	elements(
							array(
								'nome_relatorio',
								'logomarca',
								'orientacao',
								'tam_papel',
								'fonte_titulo',
								'tam_fonte_titulo',
								'fonte_detalhe',
								'tam_fonte_detalhe',
								'fonte_rodape',
								'tam_fonte_rodape',
								'campo_agrupamento',
								'tipo_campo_agrupamento',
								'titulo_agrupamento'
							),
							$this->input->post());

			$config['titulo_relatorio'] = $this->input->post('titulo_relatorio_config');

			//var_dump($config); exit();

			$insert_config = $this->relatorios_model->salvar($config);

			if ($insert_config != null) {
				$dados	=	elements(
								array(
									'ce_empresa',
									'titulo_relatorio',
									'opcao_menu',
									'sn_filtro',
									'sql',
									'groupby',
									'ordenacao'
								),
								$this->input->post());

				$dados['ce_relatorio'] = $insert_config;

				$insert = $this->relatorios_model->salvarRelEmpresa($dados);

				if ($insert) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-success" role="alert">Registro <strong>Cadastrado</strong> com Sucesso</div>'
					);
				} else {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">Não foi possível efetuar o cadastro!</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">Não foi possível salvar as configurações do relatório! Erro: '. $insert_config['code'] .'|'. $insert_config['message'] .'</div>'
				);
			}
			redirect(base_url('relatorios/adicionar'));
		}

		$this->dados['relatorios']			=	$this->relatorios_model->selecionar();
		//$this->dados['relatorios_empresas']	=	$this->relatorios_model->selecionarRelEmpresaByIdEmpresa('1');
		$this->dados['ce_empresa']			=	'1';

		$this->dados['form_relatorios']		=	'relatorios/adicionar';
		$this->dados['voltar']				=	base_url('relatorios/cadastrar');
		$this->dados['conteudo']			=	'layouts/relatorios_adicionar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function editar($idRelEmpresa) {
		$this->Seguranca();//Se o Usuario nao estiver Logeado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'ce_empresa',
								'titulo_relatorio',
								'sql',
								'groupby',
								'ordenacao',
								'opcao_menu',
								'sn_filtro'
							),
							$this->input->post());
			$update = $this->relatorios_model->editarRelEmpresa($dados, $idRelEmpresa);

			if ($update) {
				$this->session->set_flashdata(
					'edicao',
					'<div class="alert alert-success" role="alert">Registro <strong>Alterado</strong> com Sucesso</div>'
				);
			} else {
				$this->session->set_flashdata(
					'edicao',
					'<div class="alert alert-danger" role="alert">Não foi possível efetuar a alteração!</div>'
				);
			}
			redirect(base_url("relatorios/editar/$idRelEmpresa"));
		}

		$this->dados['relatorios']			=	$this->relatorios_model->selecionar();
		$this->dados['relatorio_empresa']	=	$this->relatorios_model->consultarRelEmpresaById($idRelEmpresa);
		$this->dados['ce_empresa']			=	'1';

		$this->dados['salvar']		=	"relatorios/editar/$idRelEmpresa";
		$this->dados['voltar']		=	base_url('relatorios/cadastrar');
		$this->dados['conteudo']	=	'layouts/relatorios_editar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function excluir($idRelEmpresa) {
		$this->Seguranca();//Se o Usuario nao estiver Logeado sai do Sistema

		$relEmpresa	= $this->relatorios_model->consultarRelEmpresaById($idRelEmpresa);

		if ($relEmpresa) {
			$excluir_relEmpresa = $this->relatorios_model->excluirRelEmpresa($idRelEmpresa); // Exclui o relatório da Empresa

			if ($excluir_relEmpresa) {
				$excluir_relatorio = $this->relatorios_model->excluir($relEmpresa->ce_relatorio); // Exclui as configurações do relatório

				if ($excluir_relatorio) {
					$campos_relatorios = $this->relatorios_model->selecionarCamposRelatorioByIdRelatorio($relEmpresa->ce_relatorio);

					if (count($campos_relatorios) > 1) { // Exclui os campos
						$excluir_campos = $this->relatorios_model->excluirCamposRelatorioByIdRelatorio($relEmpresa->ce_relatorio);

						if ($excluir_campos) {
							$this->session->set_flashdata(
								'excluir',
								'<div class="alert alert-success" role="alert">Registro <strong>Excluido</strong> com Sucesso</div>'
							);
						} else {
							$this->session->set_flashdata(
								'excluir',
								'<div class="alert alert-danger" role="alert">Não foi possível efetuar a exclusão dos campos do relatório!</div>'
							);
						}
					} else {
						$this->session->set_flashdata(
							'excluir',
							'<div class="alert alert-success" role="alert">Registro <strong>Excluido</strong> com Sucesso</div>'
						);
					}
				} else {
					$this->session->set_flashdata(
						'excluir',
						'<div class="alert alert-danger" role="alert">Não foi possível efetuar a exclusão das configurações do relatório!</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'excluir',
					'<div class="alert alert-danger" role="alert">Não foi possível efetuar a exclusão!</div>'
				);
			}
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert">Não foi possível efetuar a exclusão! Relatório não encontrado</div>'
			);
		}
		redirect("relatorios/cadastrar");
	}

	public function configuracoes($idRelatorio) {	
		$this->Seguranca();//Se o Usuario nao estiver Logeado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nome_relatorio',
								'titulo_relatorio',
								'logomarca',
								'orientacao',
								'tam_papel',
								'titulo_agrupamento',
								'campo_agrupamento',
								'fonte_rodape',
								'fonte_detalhe',
								'fonte_titulo',
								'tam_fonte_rodape',
								'tam_fonte_detalhe',
								'tam_fonte_titulo',
								'tipo_campo_agrupamento'
							),
							$this->input->post());

			$insert	= $this->relatorios_model->salvar($dados);

			if ($insert) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">Configurações <strong>SALVAS</strong> com Sucesso</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">Não foi possível salvar as configurações!</div>'
				);
			}
			redirect(base_url('relatorios/configuracoes'));
		}

		$this->dados['relatorio']	=	$this->relatorios_model->consultarById($idRelatorio);

		$this->dados['salvar']		=	'relatorios/configuracoes';
		$this->dados['voltar']		=	base_url('relatorios/cadastrar');
		$this->dados['conteudo']	=	'layouts/relatorios_config_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function campos($idRelatorio) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['relatorio']			=	$this->relatorios_model->consultarRelEmpresaById($idRelatorio);
		$this->dados['campos_relatorios']	=	$this->relatorios_model->selecionarCamposRelatorioByIdRelatorio($idRelatorio);
		//var_dump($this->dados['relatorio']); exit();
		$this->dados['voltar']				=	base_url('relatorios/cadastrar');
		$this->dados['conteudo']			=	'layouts/relatorios_campos_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function adicionar_campo($idRelatorio) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'ce_relatorio',
								'cabecalho',
								'tipo',
								'origem',
								'nome',
								'calculo',
								'posx',
								'ordem',
								'tamanho',
								'alinhamento',
								'pode_repetir'
							),
							$this->input->post());

			$insert = $this->relatorios_model->salvarCampoRelatorio($dados);

			if ($insert) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">Registro <strong>CADASTRADO</strong> com Sucesso</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">Não foi possível efetuar o cadastro!</div>'
				);
			}
			redirect(base_url("relatorios/adicionar_campo/$idRelatorio"));
		}

		$this->dados['ce_relatorio']	=	$idRelatorio;

		$this->dados['form_relatorios']	=	"relatorios/adicionar_campo/$idRelatorio";
		$this->dados['voltar']			=	base_url("relatorios/campos/$idRelatorio");
		$this->dados['conteudo']		=	'layouts/relatorios_campos_adicionar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function editar_campo($idCampo) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'ce_relatorio',
								'cabecalho',
								'tipo',
								'origem',
								'nome',
								'calculo',
								'posx',
								'ordem',
								'tamanho',
								'alinhamento',
								'pode_repetir'
							),
							$this->input->post());

			$update = $this->relatorios_model->editarCampoRelatorio($dados, $idCampo);

			if ($update) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">Registro <strong>ALTERADO</strong> com Sucesso</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">Não foi possível efetuar a alteração!</div>'
				);
			}
			redirect(base_url("relatorios/editar_campo/$idCampo"));
		}

		$this->dados['campo_relatorio']	=	$this->relatorios_model->consultarCamposRelatorioById($idCampo);
		//$this->dados['relatorio']		=	$this->relatorios_model->consultarRelEmpresaById($this->dados['campo_relatorio']->ce_relatorio);

		$this->dados['form_relatorios']	=	"relatorios/editar_campo/$idCampo";
		$this->dados['voltar']			=	base_url("relatorios/campos/". $this->dados['campo_relatorio']->ce_relatorio);
		$this->dados['conteudo']		=	'layouts/relatorios_campos_editar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function excluir_campo($idRelatorio, $idCampo) {
		$this->Seguranca();//Se o Usuario nao estiver Logeado sai do Sistema

		$excluir = $this->relatorios_model->excluirCampoRelatorio($idCampo);

		if ($excluir) {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-success" role="alert">Registro <strong>Excluido</strong> com Sucesso</div>'
			);
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert">Não foi possível efetuar a exclusão!</div>'
			);
		}
		redirect("relatorios/campos/$idRelatorio");
	}

	public function gerar($opcaoMenu) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['opcaoMenu']		=	$opcaoMenu;
		$this->dados['relatorios']		=	$this->relatorios_model->selecionarRelEmpresaByIdEmpresa('1', $opcaoMenu);

		$this->dados['bairros']				=	$this->cadastro_model->selecionar_dados('bairros', 'descricao');
		$this->dados['graus_parentesco']	=	$this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['faixas_renda']		=	$this->cadastro_model->selecionar_dados('faixas_renda', 'id');
		$this->dados['motivos_cadastro']	=	$this->cadastro_model->selecionar_dados('motivos_cadastro', 'descricao');
		$this->dados['origens_cadastro']	=	$this->cadastro_model->selecionar_dados('origens_cadastro', 'descricao');
		$this->dados['formas_ocupacao']	    =	$this->cadastro_model->selecionar_dados('formas_ocupacao', 'descricao');
		$this->dados['tipo_uso_imovel']	    =	$this->cadastro_model->selecionar_dados('tipo_uso_imovel', 'descricao');

		$this->dados['form_relatorios']	=	'relatorios/imprimir';
		$this->dados['conteudo']		=	'layouts/relatorios_gerar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function geral() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['relatorios']			=	$this->relatorios_model->selecionarRelEmpresaByIdEmpresa('1', 'geral');

		$this->dados['bairros']				=	$this->cadastro_model->selecionar_dados('bairros', 'descricao');
		$this->dados['graus_parentesco']	=	$this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['faixas_renda']		=	$this->cadastro_model->selecionar_dados('faixas_renda', 'id');
		$this->dados['motivos_cadastro']	=	$this->cadastro_model->selecionar_dados('motivos_cadastro', 'descricao');
		$this->dados['origens_cadastro']	=	$this->cadastro_model->selecionar_dados('origens_cadastro', 'descricao');
		$this->dados['formas_ocupacao']	    =	$this->cadastro_model->selecionar_dados('formas_ocupacao', 'descricao');
		$this->dados['tipos_uso_imovel']	=	$this->cadastro_model->selecionar_dados('tipos_uso_imovel', 'descricao');
		$this->dados['tipos_construcao']	=	$this->cadastro_model->selecionar_dados('tipos_construcao', 'descricao');


		$this->dados['form_relatorios']	=	'relatorios/imprimir';
		$this->dados['conteudo']		=	'layouts/relatorios_geral_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function imprimir() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados 	=	elements(
							array(
								'relatorio',
								'ce_bairro',
								'ce_faixa_renda',
								'sn_beneficios',
								'sn_psf',
								'titular',
								'cpf',
								'conjuge',
								'cpf_cj',
								'ce_motivo_cadastro',
								'ce_origem_cadastro',
								'ce_forma_ocupacao',
								'ce_tipo_uso_imovel',
								'ce_tipo_construcao'
							),
							$this->input->post());

			$relEmpresa		=	$this->relatorios_model->consultarRelEmpresaById($dados['relatorio']);

			$sql_relatorio	=	stripslashes($relEmpresa->sql);

			if ($relEmpresa->sn_filtro == "S") {
				$where			= ' WHERE';
				$sql_relatorio .= $where;

				/*// DATA DE VENCIMENTO
				if (($dados['dt_vencimento_inicio'] != '') && ($dados['dt_vencimento_fim'] != '')) {
					$sql_relatorio .= " AND (d.dt_vencimento BETWEEN '". $dados['dt_vencimento_inicio'] ."' AND '". $dados['dt_vencimento_fim'] ."')";
				}
				elseif (($dados['dt_vencimento_inicio'] != '') && ($dados['dt_vencimento_fim'] == '')) {
					$sql_relatorio .= " AND (d.dt_vencimento >= '". $dados['dt_vencimento_inicio'] ."')";
				}
				elseif (($dados['dt_vencimento_inicio'] == '') && ($dados['dt_vencimento_fim'] != '')) {
					$sql_relatorio .= " AND (d.dt_vencimento <= '". $dados['dt_vencimento_fim'] ."')";
				}*/

				// BAIRRO
				if ($dados['ce_bairro'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? "" : " ";
					$sql_relatorio .= "f.ce_bairro = '". $dados['ce_bairro'] ."'";
				}

				// FAIXA DE RENDA
				if ($dados['ce_faixa_renda'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_faixa_renda = '". $dados['ce_faixa_renda'] ."'";
				}

				// POSSUI BENEFICIOS
				if ($dados['sn_beneficios'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.sn_beneficios = '". $dados['sn_beneficios'] ."'";
				}

				// POSSUI PSF
				if ($dados['sn_psf'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.sn_psf = '". $dados['sn_psf'] ."'";
				}

				// NOME DO TITULAR
				if ($dados['titular'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.titular LIKE '%". $dados['titular'] ."%'";
				}
				// CPF DO TITULAR
				if ($dados['cpf'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.cpf = '". $dados['cpf'] ."'";
				}

				// NOME DO CONJUGE
				if ($dados['conjuge'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.conjuge LIKE '%". $dados['conjuge'] ."%'";
				}
				// CPF DO TITULAR
				if ($dados['cpf_cj'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.cpf_cj = '". $dados['cpf_cj'] ."'";
				}

				// MOTIVO CADASTRO
				if ($dados['ce_motivo_cadastro'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_motivo_cadastro = '". $dados['ce_motivo_cadastro'] ."'";
				}

				// ORIGEM CADASTRO
				if ($dados['ce_origem_cadastro'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_origem_cadastro = '". $dados['ce_origem_cadastro'] ."'";
				}

				// FORMA DE OCUPAÇÃO
				if ($dados['ce_forma_ocupacao'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_forma_ocupacao = '". $dados['ce_forma_ocupacao'] ."'";
				}

				// Tipo uso do imovel	
				if ($dados['ce_tipos_uso_imovel'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_tipos_uso_imovel = '". $dados['ce_tipos_uso_imovel'] ."'";
				}

				// tipo_construcao
				if ($dados['ce_tipo_construcao'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_tipo_construcao = '". $dados['ce_tipo_construcao'] ."'";
				}

				// USUÁRIO
				if ($dados['ce_usuario'] != '') {
					$sql_relatorio .= (!endsWith($sql_relatorio, $where)) ? " AND " : " ";
					$sql_relatorio .= "f.ce_usuario = '". $dados['ce_usuario'] ."'";
				}
			}

			if ($relEmpresa->groupby != "") {
				$sql_relatorio = stripslashes($sql_relatorio ." GROUP BY ". $relEmpresa->groupby);
			}
			if ($relEmpresa->ordenacao != "") {
				$sql_relatorio = stripslashes($sql_relatorio ." ORDER BY ". $relEmpresa->ordenacao /*." LIMIT 1000"*/);
			}

			$consulta			= $this->relatorios_model->executaQuery($sql_relatorio);
			$campos_relatorio	= $this->relatorios_model->consultaCamposByRelatorio($relEmpresa->ce_relatorio);

			//var_dump($sql_relatorio, $consulta, $campos_relatorio);
			$this->my_print->report($campos_relatorio, $consulta, $desc_relatorio);
		}
	}

	public function copiarRelatorio() {
		$retorno = '';
		if ($this->input->post()) {
			$idRelatorio		=	$this->input->post('idRelatorio');
			$tituloRelatorio	=	$this->input->post('tituloRelatorio');

			// Pegando os dados do relatório
			$relatorio 			=	$this->relatorios_model->consultarById($idRelatorio);
			$relatorio_empresa	=	$this->relatorios_model->consultarRelEmpresaByIdRel($idRelatorio);

			// Removendo o id, já que na tabela o mesmo é 'AUTO_INCREMENT'
			$dados	=	array(
							'nome_relatorio'			=>	$tituloRelatorio,
							'titulo_relatorio'			=>	$relatorio->titulo_relatorio ." (Cópia)",
							'logomarca'					=>	$relatorio->logomarca,
							'orientacao'				=>	$relatorio->orientacao,
							'tam_papel'					=>	$relatorio->tam_papel,
							'titulo_agrupamento'		=>	$relatorio->titulo_agrupamento,
							'campo_agrupamento'			=>	$relatorio->campo_agrupamento,
							'fonte_rodape'				=>	$relatorio->fonte_rodape,
							'fonte_detalhe'				=>	$relatorio->fonte_detalhe,
							'fonte_titulo'				=>	$relatorio->fonte_titulo,
							'tam_fonte_rodape'			=>	$relatorio->tam_fonte_rodape,
							'tam_fonte_detalhe'			=>	$relatorio->tam_fonte_detalhe,
							'tam_fonte_titulo'			=>	$relatorio->tam_fonte_titulo,
							'tipo_campo_agrupamento'	=>	$relatorio->tipo_campo_agrupamento,
							'espacamento_entre_linhas'	=>	$relatorio->espacamento_entre_linhas
						);

			// Salvando (duplicando) as configurações do relatório
			$insert_relatorio = $this->relatorios_model->salvar($dados);

			if ($insert_relatorio) {
				$idNovoRelatorio	=	$this->db->insert_id();

				// Removendo o id, já que na tabela o mesmo é 'AUTO_INCREMENT'
				$dados_relEmpresa	=	array(
											'ce_empresa'		=> $relatorio_empresa->ce_empresa,
											'opcao_menu'		=> $relatorio_empresa->opcao_menu,
											'titulo_relatorio'	=> $relatorio_empresa->titulo_relatorio ." (Cópia)",
											'ce_relatorio'		=> $idNovoRelatorio,
											'sql'				=> $relatorio_empresa->sql,
											'ordenacao'			=> $relatorio_empresa->ordenacao,
											'sn_filtro'			=> $relatorio_empresa->sn_filtro,
											'groupby'			=> $relatorio_empresa->groupby
										);

				// Salvando (duplicando) o relatório da empresa
				$insert_relEmpresa = $this->relatorios_model->salvarRelEmpresa($dados_relEmpresa);

				if ($insert_relEmpresa) {
					$this->session->set_flashdata(
						'excluir',
						'<div class="alert alert-success" role="alert">Relatório <strong>Duplicado</strong> com Sucesso</div>'
					);

					// pegando os dados dos campos do relatório duplicado
					$campos_relatorio = $this->relatorios_model->selecionarCamposRelatorioByIdRelatorio($idRelatorio);
					if (count($campos_relatorio) > 0) {
						foreach ($campos_relatorio as $campo) {
							$dados_campo	=	array(
													'ce_relatorio'	=>	$idNovoRelatorio,
													'cabecalho'		=>	$campo->cabecalho,
													'nome'			=>	$campo->nome,
													'tipo'			=>	$campo->tipo,
													'origem'		=>	$campo->origem,
													'calculo'		=>	$campo->calculo,
													'posx'			=>	$campo->posx,
													'ordem'			=>	$campo->ordem,
													'tamanho'		=>	$campo->tamanho,
													'alinhamento'	=>	$campo->alinhamento,
													'pode_repetir'	=>	$campo->pode_repetir
												);
							$campos[] = $dados_campo;
						}
						$insert_campos = $this->relatorios_model->salvarCamposRelatorio($campos);
					}
				} else {
					$this->session->set_flashdata(
						'excluir',
						'<div class="alert alert-danger" role="alert">Não foi possível efetuar a duplicação da tabela de relatórios da empresa!</div>'
					);
				}
			}
			else {
				$this->session->set_flashdata(
					'excluir',
					'<div class="alert alert-danger" role="alert">Não foi possível efetuar a duplicação do relatório!</div>'
				);
			}
			$retorno = '1';
		}
		echo $retorno;
	}

}