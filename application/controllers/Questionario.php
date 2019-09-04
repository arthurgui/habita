<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Questionario extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('familias_model');

		$this->load->model('familiares_model');
		$this->load->model('criterios_familias_model');
		$this->load->model('bairros_model');

		$this->load->model('faixas_renda_model');
	}

	public function index() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['consultar']	= 'questionario/adicionar';
		$this->dados['conteudo']	= 'layouts/familias_consultar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function adicionar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'cpf'
							),
							$this->input->post());

			$familia = $this->familias_model->consultarByCpf($dados['cpf']);

			//f($dados['cpf'])
			if ($familia) {
				if ($dados['cpf'] == $familia->cpf_cj) {
					$this->session->set_flashdata(
						'consultar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;CPF já cadastrado como Cônjuge de '. $familia->titular .'!
						</div>'
					);
				} else {
					$this->session->set_flashdata(
						'consultar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;CPF já cadastrado como Titular!
						</div>'
					);
				}
				redirect(base_url('questionario'));
			}
		}

		date_default_timezone_set('America/Recife');
		$this->dados['racas']					= $this->cadastro_model->selecionar_dados('racas', 'descricao');
		$this->dados['escolaridades']			= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['religioes']				= $this->cadastro_model->selecionar_dados('religioes', 'descricao');
		$this->dados['estados_civis']			= $this->cadastro_model->selecionar_dados('estados_civil', 'descricao');
		$this->dados['atividades']				= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
		$this->dados['tipos_vinculo']			= $this->cadastro_model->selecionar_dados('tipos_vinculo', 'descricao');
		$this->dados['deficiencias']			= $this->cadastro_model->selecionar_dados('tipos_deficiencia', 'descricao');
		$this->dados['bairros']					= $this->cadastro_model->selecionar_dados('bairros', 'descricao');
		$this->dados['graus_parentesco']		= $this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['faixas_renda']			= $this->cadastro_model->selecionar_dados('faixas_renda', 'id');
		$this->dados['formas_ocupacao']			= $this->cadastro_model->selecionar_dados('formas_ocupacao', 'descricao');
		$this->dados['tipos_uso_imovel']		= $this->cadastro_model->selecionar_dados('tipos_uso_imovel', 'descricao');
		$this->dados['tipos_construcao']		= $this->cadastro_model->selecionar_dados('tipos_construcao', 'descricao');
		$this->dados['tipos_abastecimentos']	= $this->cadastro_model->selecionar_dados('tipos_abastecimento_agua', 'descricao');
		$this->dados['destinos_lixo']			= $this->cadastro_model->selecionar_dados('destinos_lixo', 'descricao');
		$this->dados['criterios']				= $this->cadastro_model->selecionar_dados('criterios', 'descricao', array('ativo' => 'S'));
		$this->dados['motivos_cadastro']		= $this->cadastro_model->selecionar_dados('motivos_cadastro', 'descricao');
		$this->dados['origens_cadastro']		= $this->cadastro_model->selecionar_dados('origens_cadastro', 'descricao');
		$this->dados['programas_habitacionais']	= $this->cadastro_model->selecionar_dados('programas_habitacionais', 'descricao');
		//$this->dados['sexo']					= $this->cadastro_model->selecionar_dados('sexo', 'descricao');
		$this->dados['consultar']	= 'questionario';
		$this->dados['salvar']		= 'questionario/salvar';
		$this->dados['conteudo']	= 'layouts/familias_adicionar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function salvar() {


		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		//$data = date('Y-m-d Hi]:i:s'); //salvar a data atual

		if ($this->input->post()) {
			$familia	=	elements(
								array(
									'cpf',
									'titular',
									'dt_nascimento',
									'rg',
									'rg_org_emissor',
									'rg_uf',
									'sexo',
									'ce_raca',
									'ce_escolaridade',
									'ce_religiao',
									'ce_estado_civil',
									'telefone_res',
									'telefone_cel',
									'sn_chefe',
									'sn_atividade_remunerada',
									'ce_atividade_desenvolvida',
									'ce_tipo_vinculo',
									'tempo_atividade_anos',
									'tempo_atividade_meses',
									'renda',
									'sn_deficiencia',
									'ce_deficiencia',
									'cid',
									'sn_conjuge',
									'conjuge',
									'sexo_cj',
									'dt_nascimento_cj',
									'cpf_cj',
									'rg_cj',
									'rg_org_emissor_cj',
									'rg_uf_cj',
									'ce_raca_cj',
									'ce_escolaridade_cj',
									'ce_religiao_cj',
									'ce_estado_civil_cj',
									'telefone_cj_res',
									'telefone_cj_cel',
									'sn_chefe_cj',
									'sn_atividade_remunerada_cj',
									'ce_atividade_desenvolvida_cj',
									'ce_tipo_vinculo_cj',
									'tempo_atividade_cj_anos',
									'tempo_atividade_cj_meses',
									'renda_cj',
									'sn_deficiencia_cj',
									'ce_deficiencia_cj',
									'cid_cj',
									'endereco',
									'numero',
									'complemento',
									'ce_bairro',
									'cidade',
									'uf',
									'cep',
									'referencia',
									'ce_faixa_renda',
									'sn_beneficios',
									'bolsa_familia',
									'vlr_bolsa_familia',
									'auxilio_aluguel',
									'vlr_auxilio_aluguel',
									'bpc',
									'vlr_bpc',
									'peti',
									'vlr_peti',
									'outros_beneficios',
									'vlr_outros_beneficios',
									'descricao_outros_beneficios',
									'tempo_moradia_anos',
									'tempo_moradia_meses',
									'sn_paga_iptu',
									'vlr_aluguel',
									'ce_forma_ocupacao',
									'ce_tipo_uso_imovel',
									'ce_tipo_construcao',
									'sn_doenca',
									'num_pessoas_doenca',
									'doencas',
									'sn_gestantes',
									'num_gestantes',
									'sn_idosos',
									'num_idosos',
									'sn_recem_nascidos',
									'num_recem_nascidos',
									'sn_psf',
									'psf',
									'sn_agente_familia',
									'agente_familia',
									'sn_energia_eletrica',
									'sn_esgoto',
									'ce_tipo_abastecimento_agua',
									'ce_destino_lixo',
									'observacoes',
									'ce_motivo_cadastro',
									'ce_origem_cadastro',
									'ce_programa_habitacional'
								),			
								$this->input->post());
			
			//var_dump($familia['telefone_cj_res']);

			date_default_timezone_set('America/Recife');
			$familia['dt_cadastro']             = date('Y-m-d h:i:s');
			$familia['usuario_cadastro']        = $this->session->userdata('id_usuario');
			$familia['dt_ult_atualizacao']      = date('Y-m-d h:i:s');
			$familia['usuario_ult_atualizacao'] = $this->session->userdata('id_usuario');
			$familia['titular'] 				= mb_strtoupper($familia['titular'], 'UTF-8');
			$familia['rg_org_emissor'] 			= mb_strtoupper($familia['rg_org_emissor'], 'UTF-8');
			$familia['cid'] 					= mb_strtoupper($familia['cid'], 'UTF-8');
			$familia['conjuge'] 				= mb_strtoupper($familia['conjuge'], 'UTF-8');
			$familia['rg_org_emissor_cj']		= mb_strtoupper($familia['rg_org_emissor_cj'], 'UTF-8');
			$familia['cid_cj'] 					= mb_strtoupper($familia['cid_cj'], 'UTF-8');
			$familia['endereco'] 				= mb_strtoupper($familia['endereco'], 'UTF-8');
			$familia['numero'] 					= mb_strtoupper($familia['numero'], 'UTF-8');
			$familia['complemento'] 			= mb_strtoupper($familia['complemento'], 'UTF-8');
			$familia['cidade'] 					= mb_strtoupper($familia['cidade'], 'UTF-8');
			$familia['referencia'] 				= mb_strtoupper($familia['referencia'], 'UTF-8');
			$familia['descricao_outros_beneficios']= mb_strtoupper($familia['descricao_outros_beneficios'],'UTF-8');
			$familia['doencas'] 				= mb_strtoupper($familia['doencas'], 'UTF-8');
			$familia['psf'] 					= mb_strtoupper($familia['psf'], 'UTF-8');
			$familia['agente_familia'] 			= mb_strtoupper($familia['agente_familia'], 'UTF-8');
			$familia['observacoes'] 			= mb_strtoupper($familia['observacoes'], 'UTF-8');
			$familia['renda']					= converterNumeroToString($familia['renda']);
			$familia['renda_cj']				= converterNumeroToString($familia['renda_cj']);
			$familia['vlr_bolsa_familia']		= converterNumeroToString($familia['vlr_bolsa_familia']);
			$familia['vlr_auxilio_aluguel']		= converterNumeroToString($familia['vlr_auxilio_aluguel']);
			$familia['vlr_bpc']					= converterNumeroToString($familia['vlr_bpc']);
			$familia['vlr_peti']				= converterNumeroToString($familia['vlr_peti']);
			$familia['vlr_outros_beneficios']	= converterNumeroToString($familia['vlr_outros_beneficios']);
			$familia['vlr_aluguel']				= converterNumeroToString($familia['vlr_aluguel']);

		//	var_dump($familia['telefone_cj_res']); exit();

			$insert_familia = $this->familias_model->salvar($familia);

			if ($insert_familia) {
				$ce_familia		= $insert_familia;
				$qtdFamiliares	= $this->input->post('qtd_familiares');

				if ($qtdFamiliares > 0) {
					$dados	=	elements(
									array(
										'nome_cf',
										'sexo_cf',
										'dt_nascimento_cf',
										'ce_grau_parentesco_cf',
										'ce_escolaridade_cf',
										'escola_bairro_cf',
										'sn_atividade_remunerada_cf',
										'ce_atividade_desenvolvida_cf',
										'ce_tipo_vinculo_cf',
										'tempo_atividade_cf_anos',
										'tempo_atividade_cf_meses',
										'renda_cf',
										'sn_deficiencia_cf',
										'ce_deficiencia_cf',
										'cid_cf'
									),
									$this->input->post());

					for ($i=0; $i < $qtdFamiliares; $i++) { 

						$dados['nome_cf'][$i] 		   = mb_strtoupper($dados['nome_cf'][$i], 'UTF-8');
						$dados['escola_bairro_cf'][$i] = mb_strtoupper($dados['escola_bairro_cf'][$i],'UTF-8');
						$dados['cid_cf'][$i]		   = mb_strtoupper($dados['cid_cf'][$i],'UTF-8');
						$dados['renda_cf'][$i]		   = converterNumeroToString($dados['renda_cf'][$i]);

						$familiar	=	array(
											'nome'						=> $dados['nome_cf'][$i],
											'sexo'                      => $dados['sexo_cf'][$i],
											'dt_nascimento'				=> $dados['dt_nascimento_cf'][$i],
											'ce_grau_parentesco'		=> $dados['ce_grau_parentesco_cf'][$i],
											'ce_escolaridade'			=> $dados['ce_escolaridade_cf'][$i],
											'escola_bairro'				=> $dados['escola_bairro_cf'][$i],
											'sn_atividade_remunerada'	=> $dados['sn_atividade_remunerada_cf'][$i],
											'ce_atividade_desenvolvida'	=> $dados['ce_atividade_desenvolvida_cf'][$i],
											'ce_tipo_vinculo'			=> $dados['ce_tipo_vinculo_cf'][$i],
											'tempo_atividade_anos'		=> $dados['tempo_atividade_cf_anos'][$i],
											'tempo_atividade_meses'		=> $dados['tempo_atividade_cf_meses'][$i],
											'renda'						=> $dados['renda_cf'][$i],
											'sn_deficiencia'			=> $dados['sn_deficiencia_cf'][$i],
											'ce_deficiencia'			=> $dados['ce_deficiencia_cf'][$i],
											'cid'						=> $dados['cid_cf'][$i],
											'ce_familia'				=> $ce_familia
										);
						$familiares[] = $familiar;
					}
					//var_dump($familiares); exit();

					$insert_familiares = $this->familiares_model->salvarTodos($familiares);
				}

				if ($insert_familiares['code'] != 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Ocorreu um erro ao salvar os familiares!<br>Erro: '. $insert_familiares['code'] .'|'. $insert_familiares['message'] .'
						</div>'
					);
					$erro++;
				}

				$dados_criterios =	$this->input->post('ce_criterios');

				if ($dados_criterios) {
					foreach ($dados_criterios as $i => $ce_criterio) {
						$criterios[] =	array(
											'ce_criterio'	=> $ce_criterio,
											'ce_familia'	=> $ce_familia
										);
					}
					$insert_criterios = $this->criterios_familias_model->salvarTodos($criterios);
				}

				if ($insert_criterios['code'] != 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Ocorreu um erro ao salvar os critérios observados!<br>Erro: '. $insert_criterios['code'] .'|'. $insert_criterios['message'] .'
						</div>'
					);
					$erro++;
				}

				if ($erros == 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check"></i>&nbsp;Família SALVA com sucesso. Imprima o protocolo de confirmação do cadastro nº '. $ce_familia .':
							<a class="btn btn-default btn-sm" href='. base_url("questionario/imprimir_protocolo/$ce_familia") .' data-toggle="tooltip" title="Imprimir Protocolo de Confirmação" target="_blank"><i class="fas fa-print"></i></a>
						</div>'
					);
				}
				elseif ($erros > 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Ocorreu erro ao salvar os familiares e critérios observados!<br>Erro: '. $insert_criterios['code'] .'|'. $insert_criterios['message'] .'
						</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-times"></i>&nbsp;Erro ao salvar família!<br>Erro: '. $insert_familia['code'] .'|'. $insert_familia['message'] .'
					</div>'
				);
			}
		}

		
		
		redirect(base_url('questionario'));
	}

	public function familias() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'cpf',
								'titular',
								'conjuge',
							),
							$this->input->post());

			if ($dados['titular'] != '') {
				$filtro["f.titular LIKE "] = $dados['titular'] ."%";
			}

			if ($dados['conjuge'] != '') {
				$filtro["f.conjuge LIKE "] = $dados['conjuge'] ."%";
			}

			//$filtro["(f.titular LIKE '". $dados['titular'] ."%' OR f.conjuge LIKE '". $dados['conjuge'] ."%')"] = '';
			if ($dados['cpf'] != '') {
				$filtro["f.cpf = '". $dados['cpf'] ."' OR f.cpf_cj = '". $dados['cpf'] ."'"] = '';
			}

			$this->dados['filtro'] = true;
		}
		$this->dados['familias']	= $this->familias_model->selecionar($filtro);
		date_default_timezone_set('America/Recife');
		//echo $this->db->last_query();
		//var_dump($this->db->last_query()); exit();

		$this->dados['consultar']	= 'questionario/familias';
		$this->dados['conteudo']	= 'layouts/familias_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function editar($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema



		if ($this->input->post()) {
			$familia	=	elements(
								array(
									'cpf',
									'titular',
									'dt_nascimento',
									'rg',
									'rg_org_emissor',
									'rg_uf',
									'sexo',
									'ce_raca',
									'ce_escolaridade',
									'ce_religiao',
									'ce_estado_civil',
									'telefone_res',
									'telefone_cel',
									'sn_chefe',
									'sn_atividade_remunerada',
									'ce_atividade_desenvolvida',
									'ce_tipo_vinculo',
									'tempo_atividade_anos',
									'tempo_atividade_meses',
									'renda',
									'sn_deficiencia',
									'ce_deficiencia',
									'cid',
									'sn_conjuge',
									'conjuge',
									'sexo_cj',
									'dt_nascimento_cj',
									'cpf_cj',
									'rg_cj',
									'rg_org_emissor_cj',
									'rg_uf_cj',
									'ce_raca_cj',
									'ce_escolaridade_cj',
									'ce_religiao_cj',
									'ce_estado_civil_cj',
									'telefone_cj_res',
									'telefone_cj_cel',
									'sn_chefe_cj',
									'sn_atividade_remunerada_cj',
									'ce_atividade_desenvolvida_cj',
									'ce_tipo_vinculo_cj',
									'tempo_atividade_cj_anos',
									'tempo_atividade_cj_meses',
									'renda_cj',
									'endereco',
									'numero',
									'complemento',
									'ce_bairro',
									'cidade',
									'uf',
									'cep',
									'tempo_moradia_meses',
									'tempo_moradia_anos',
									'referencia',
									'ce_faixa_renda',
									'sn_beneficios',
									'bolsa_familia',
									'vlr_bolsa_familia',
									'auxilio_aluguel',
									'vlr_auxilio_aluguel',
									'bpc',
									'vlr_bpc',
									'peti',
									'vlr_peti',
									'outros_beneficios',
									'vlr_outros_beneficios',
									'descricao_outros_beneficios',
									'sn_paga_iptu',
									'vlr_aluguel',
									'ce_forma_ocupacao',
									'ce_tipo_uso_imovel',
									'ce_tipo_construcao',
									'sn_doenca',
									'num_pessoas_doenca',
									'doencas',
									'sn_gestantes',
									'num_gestantes',
									'sn_idosos',
									'num_idosos',
									'sn_recem_nascidos',
									'num_recem_nascidos',
									'sn_psf',
									'psf',
									'sn_agente_familia',
									'agente_familia',
									'sn_energia_eletrica',
									'sn_esgoto',
									'ce_tipo_abastecimento_agua',
									'ce_destino_lixo',
									'observacoes',
									'ce_motivo_cadastro',
									'ce_origem_cadastro',
									'ce_programa_habitacional'
								),
								$this->input->post());
			

			$familia['rg_org_emissor'] 			= mb_strtoupper($familia['rg_org_emissor'], 'UTF-8');
			$familia['cid'] 					= mb_strtoupper($familia['cid'], 'UTF-8');
			$familia['conjuge'] 				= mb_strtoupper($familia['conjuge'], 'UTF-8');
			$familia['rg_org_emissor_cj']		= mb_strtoupper($familia['rg_org_emissor_cj'], 'UTF-8');
			$familia['cid_cj'] 					= mb_strtoupper($familia['cid_cj'], 'UTF-8');
			$familia['endereco'] 				= mb_strtoupper($familia['endereco'], 'UTF-8');
			$familia['numero'] 					= mb_strtoupper($familia['numero'], 'UTF-8');
			$familia['complemento'] 			= mb_strtoupper($familia['complemento'], 'UTF-8');
			$familia['cidade'] 					= mb_strtoupper($familia['cidade'], 'UTF-8');
			$familia['referencia'] 				= mb_strtoupper($familia['referencia'], 'UTF-8');
			$familia['descricao_outros_beneficios']= mb_strtoupper($familia['descricao_outros_beneficios'],'UTF-8');
			$familia['doencas'] 				= mb_strtoupper($familia['doencas'], 'UTF-8');
			$familia['psf'] 					= mb_strtoupper($familia['psf'], 'UTF-8');
			$familia['agente_familia'] 			= mb_strtoupper($familia['agente_familia'], 'UTF-8');
			$familia['observacoes'] 			= mb_strtoupper($familia['observacoes'], 'UTF-8');
			$familia['renda']					= converterNumeroToString($familia['renda']);
			$familia['renda_cj']				= converterNumeroToString($familia['renda_cj']);
			$familia['vlr_bolsa_familia']		= converterNumeroToString($familia['vlr_bolsa_familia']);
			$familia['vlr_auxilio_aluguel']		= converterNumeroToString($familia['vlr_auxilio_aluguel']);
			$familia['vlr_bpc']					= converterNumeroToString($familia['vlr_bpc']);
			$familia['vlr_peti']				= converterNumeroToString($familia['vlr_peti']);
			$familia['vlr_outros_beneficios']	= converterNumeroToString($familia['vlr_outros_beneficios']);
			$familia['vlr_aluguel']				= converterNumeroToString($familia['vlr_aluguel']);

			date_default_timezone_set('America/Recife');
			$update_familia	= $this->familias_model->update($familia, $idFamilia);
			//var_dump($date_default_timezone_set); exit();

			if ($update_familia['code'] == 0) {

				$atuFamilia['dt_ult_atualizacao']      = date('Y-m-d h:i:s');
				$atuFamilia['usuario_ult_atualizacao'] = $this->session->userdata('id_usuario');
				$update_atuFamilia	= $this->familias_model->update($atuFamilia, $idFamilia);
			}	
			if ($update_familia['code'] == 0) {

				$dados_criterios =	$this->input->post('ce_criterios');

				$excluir_criterios_familia = $this->criterios_familias_model->excluirByFamilia($idFamilia);

				if ($dados_criterios) {
					foreach ($dados_criterios as $key => $ce_criterio) {
						$criterios[] =	array(
											'ce_criterio'	=> $ce_criterio,
											'ce_familia'	=> $idFamilia
										);
					}
					$insert_criterios = $this->criterios_familias_model->salvarTodos($criterios);
				}

				if ($insert_criterios['code'] == 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check"></i>&nbsp;Família alterada com sucesso.
						</div>'
					);
				} else {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Ocorreu um erro ao salvar os critérios observados!<br>Erro: '. $insert_criterios['code'] .'|'. $insert_criterios['message'] .'
						</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-times"></i>&nbsp;Erro ao Alterar família!<br>Erro: '. $update_familia['code'] .'|'. $update_familia['message'] .'
					</div>'
				);
			}
			redirect(base_url("questionario/editar/$idFamilia"));
		}

		date_default_timezone_set('America/Recife');
//		var_dump($familia['dt_cadastro']); exit();

			//var_dump($date_default_timezone_set); exit();


		$this->dados['familia']		= $this->familias_model->consultarById($idFamilia);
		$this->dados['familiares']	= $this->familiares_model->selecionarByFamilia($idFamilia);

		foreach ($this->dados['familiares'] as $key => $familiar) {
			$this->dados['renda_familiares'] += $familiar->renda;
		}

		$criterios_familias			= $this->criterios_familias_model->selecionarByFamilia($idFamilia);
		foreach ($criterios_familias as $key => $criterio) {
			$this->dados['criterios_familia'][]	= $criterio->ce_criterio;
		}

		$this->dados['racas']					= $this->cadastro_model->selecionar_dados('racas', 'descricao');
		$this->dados['escolaridades']			= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['religioes']				= $this->cadastro_model->selecionar_dados('religioes', 'descricao');
		$this->dados['estados_civis']			= $this->cadastro_model->selecionar_dados('estados_civil', 'descricao');
		$this->dados['atividades']				= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
		$this->dados['tipos_vinculo']			= $this->cadastro_model->selecionar_dados('tipos_vinculo', 'descricao');
		$this->dados['deficiencias']			= $this->cadastro_model->selecionar_dados('tipos_deficiencia', 'descricao');
		$this->dados['bairros']					= $this->cadastro_model->selecionar_dados('bairros', 'descricao');
		$this->dados['graus_parentesco']		= $this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['faixas_renda']			= $this->cadastro_model->selecionar_dados('faixas_renda', 'id');
		$this->dados['formas_ocupacao']			= $this->cadastro_model->selecionar_dados('formas_ocupacao', 'descricao');
		$this->dados['tipos_uso_imovel']		= $this->cadastro_model->selecionar_dados('tipos_uso_imovel', 'descricao');
		$this->dados['tipos_construcao']		= $this->cadastro_model->selecionar_dados('tipos_construcao', 'descricao');
		$this->dados['tipos_abastecimentos']	= $this->cadastro_model->selecionar_dados('tipos_abastecimento_agua', 'descricao');
		$this->dados['destinos_lixo']			= $this->cadastro_model->selecionar_dados('destinos_lixo', 'descricao');
		$this->dados['criterios']				= $this->cadastro_model->selecionar_dados('criterios', 'descricao');
		$this->dados['motivos_cadastro']		= $this->cadastro_model->selecionar_dados('motivos_cadastro', 'descricao');
		$this->dados['origens_cadastro']		= $this->cadastro_model->selecionar_dados('origens_cadastro', 'descricao');
		$this->dados['programas_habitacionais']	= $this->cadastro_model->selecionar_dados('programas_habitacionais', 'descricao');
		//$this->dados['sexo']					= $this->cadastro_model->selecionar_dados('sexo', 'descricao');

		$this->dados['salvar']		= "questionario/editar/$idFamilia";
		$this->dados['voltar']		= base_url('questionario/familias');
		$this->dados['conteudo']	= 'layouts/familias_editar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function excluir($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$delete = $this->familias_model->excluir($idFamilia);

		if ($delete['code'] == 0) {
			$delete_familiares = $this->familiares_model->excluirByFamilia($idFamilia);

			if ($delete_familiares['code'] == 0) {
				$delete_criterios_familias = $this->criterios_familias_model->excluirByFamilia($idFamilia);

				if ($delete_criterios_familias['code'] == 0) {
					$this->session->set_flashdata(
						'excluir',
						'<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check"></i>&nbsp;Registro EXCLUÍDO com sucesso.
						</div>'
					);
				} else {
					$this->session->set_flashdata(
						'excluir',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Erro ao EXCLUIR os critérios!<br>Erro: '. $delete_criterios_familias['code'] .'|'. $delete_criterios_familias['message'] .'
						</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'excluir',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-times"></i>&nbsp;Erro ao EXCLUIR os familiares!<br>Erro: '. $delete_familiares['code'] .'|'. $delete_familiares['message'] .'
					</div>'
				);
			}
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-times"></i>&nbsp;Erro ao EXCLUIR Família!<br>Erro: '. $delete['code'] .'|'. $delete['message'] .'
				</div>'
			);
		}
		redirect(base_url('questionario'));
	}

	public function familiares($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['familiares']	= $this->familiares_model->selecionarByFamilia($idFamilia);
		$this->dados['familia']		= $this->familias_model->consultarById($idFamilia);

		$this->dados['consultar']	= 'questionario/familiares';
		$this->dados['voltar']		= base_url("questionario/familias");
		$this->dados['conteudo']	= 'layouts/familiares_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function adicionar_familiar($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nome',
								'sexo',
								'dt_nascimento',
								'ce_grau_parentesco',
								'ce_escolaridade',
								'escola_bairro',
								'sn_atividade_remunerada',
								'ce_atividade_desenvolvida',
								'ce_tipo_vinculo',
								'tempo_atividade_anos',
								'tempo_atividade_meses',
								'tempo_atividade_cj_anos',
								'tempo_atividade_cj_meses',
								'renda',
								'sn_deficiencia',
								'ce_deficiencia',
								'cid'
							),
							$this->input->post());

			$dados['ce_familia']    = $idFamilia;
			$dados['nome'] 			= mb_strtoupper($dados['nome'], 'UTF-8');
			$dados['escola_bairro']	= mb_strtoupper($dados['escola_bairro'], 'UTF-8');
			$dados['cid'] 			= mb_strtoupper($dados['cid'], 'UTF-8');
			$dados['renda']			= converterNumeroToString($dados['renda']);

			$insert = $this->familiares_model->salvar($dados);

			if ($insert['code'] == 0) {

				$atuFamilia['dt_ult_atualizacao']      = date('Y-m-d h:i:s');
				$atuFamilia['usuario_ult_atualizacao'] = $this->session->userdata('id_usuario');
				$update_atuFamilia	= $this->familias_model->update($atuFamilia, $idFamilia);

				$this->session->set_flashdata(
					'consultar',
					'<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check"></i>&nbsp;Componente familiar cadastrado com sucesso!
					</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-times"></i>&nbsp;Erro ao salvar componente familiar!<br>Erro: '. $insert['code'] .'|'. $insert['message'] .'
					</div>'
				);
			}
			redirect(base_url("questionario/adicionar_familiar/$idFamilia"));
		}

		$this->dados['escolaridades']		= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['atividades']			= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
		$this->dados['deficiencias']		= $this->cadastro_model->selecionar_dados('tipos_deficiencia', 'descricao');
		$this->dados['graus_parentesco']	= $this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['tipos_vinculo']		= $this->cadastro_model->selecionar_dados('tipos_vinculo', 'descricao');

		$this->dados['salvar']		= "questionario/adicionar_familiar/$idFamilia";
		$this->dados['voltar']		= base_url("questionario/familiares/$idFamilia");
		$this->dados['conteudo']	= 'layouts/familiares_adicionar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function editar_familiar($idFamilia, $idFamiliar) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nome',
								'sexo',
								'dt_nascimento',
								'ce_grau_parentesco',
								'ce_escolaridade',
								'escola_bairro',
								'sn_atividade_remunerada',
								'ce_atividade_desenvolvida',
								'ce_tipo_vinculo',
								'tempo_atividade_anos',
								'tempo_atividade_meses',
								'renda',
								'sn_deficiencia',
								'ce_deficiencia',
								'cid'
							),
							$this->input->post());

			$dados['nome'] 			= mb_strtoupper($dados['nome'], 'UTF-8');
			$dados['escola_bairro']	= mb_strtoupper($dados['escola_bairro'], 'UTF-8');
			$dados['cid'] 			= mb_strtoupper($dados['cid'], 'UTF-8');
			$dados['renda']			= converterNumeroToString($dados['renda']);


			$update = $this->familiares_model->update($dados, $idFamiliar);

			if ($update['code'] == 0) {

				$atuFamilia['dt_ult_atualizacao']      = date('Y-m-d h:i:s');
				$atuFamilia['usuario_ult_atualizacao'] = $this->session->userdata('id_usuario');
				$update_atuFamilia	= $this->familias_model->update($atuFamilia, $idFamilia);

				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check"></i>&nbsp;Componente familiar alterado com sucesso!
					</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-times"></i>&nbsp;Erro ao alterar componente familiar!<br>Erro: '. $insert['code'] .'|'. $insert['message'] .'
					</div>'
				);
			}
			redirect(base_url("questionario/editar_familiar/$idFamilia/$idFamiliar"));
		}

		$this->dados['escolaridades']		= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['atividades']			= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
		$this->dados['deficiencias']		= $this->cadastro_model->selecionar_dados('tipos_deficiencia', 'descricao');
		$this->dados['graus_parentesco']	= $this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['tipos_vinculo']		= $this->cadastro_model->selecionar_dados('tipos_vinculo', 'descricao');
		$this->dados['usuario_ult_atualizacao']		=	$this->session->userdata('id_usuario');

		$this->dados['familiar']	= $this->familiares_model->consultarById($idFamiliar);

		$this->dados['salvar']		= "questionario/editar_familiar/$idFamilia/$idFamiliar";
		$this->dados['voltar']		= base_url("questionario/familiares/$idFamilia");
		$this->dados['conteudo']	= 'layouts/familiares_editar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function excluir_familiar($idFamilia, $idFamiliar) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$delete = $this->familiares_model->excluir($idFamiliar);

		if ($delete['code'] == 0) {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-check"></i>&nbsp;Componente familiar EXCLUÍDO com sucesso.
				</div>'
			);
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-times"></i>&nbsp;Erro ao EXCLUIR componente familiar!<br>Erro: '. $delete['code'] .'|'. $delete['message'] .'
				</div>'
			);
		}
		redirect(base_url('questionario'));
	}

	public function imprimir_ficha($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['familia']		= $this->familias_model->consultarById($idFamilia);
		$this->dados['familiares']	= $this->familiares_model->selecionarByFamilia($idFamilia);
		//$this->dados['logo_pmc']	= 'logo_pmc.png';

		$criterios_familias			= $this->criterios_familias_model->selecionarByFamilia($idFamilia);
		foreach ($criterios_familias as $key => $criterio) {
			$this->dados['criterios_familia'][]	= $criterio->ce_criterio;
		}

		$this->dados['racas']					= $this->cadastro_model->selecionar_dados('racas', 'descricao');
		$this->dados['escolaridades']			= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['religioes']				= $this->cadastro_model->selecionar_dados('religioes', 'descricao');
		$this->dados['estados_civis']			= $this->cadastro_model->selecionar_dados('estados_civil', 'descricao');
		$this->dados['atividades']				= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
		$this->dados['tipos_vinculo']			= $this->cadastro_model->selecionar_dados('tipos_vinculo', 'descricao');
		$this->dados['deficiencias']			= $this->cadastro_model->selecionar_dados('tipos_deficiencia', 'descricao');
		$this->dados['bairros']					= $this->cadastro_model->selecionar_dados('bairros', 'descricao');
		$this->dados['graus_parentesco']		= $this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');
		$this->dados['faixas_renda']			= $this->cadastro_model->selecionar_dados('faixas_renda', 'id');
		$this->dados['formas_ocupacao']			= $this->cadastro_model->selecionar_dados('formas_ocupacao', 'descricao');
		$this->dados['tipos_uso_imovel']		= $this->cadastro_model->selecionar_dados('tipos_uso_imovel', 'descricao');
		$this->dados['tipos_construcao']		= $this->cadastro_model->selecionar_dados('tipos_construcao', 'descricao');
		$this->dados['tipos_abastecimentos']	= $this->cadastro_model->selecionar_dados('tipos_abastecimento_agua', 'descricao');
		$this->dados['destinos_lixo']			= $this->cadastro_model->selecionar_dados('destinos_lixo', 'descricao');
		$this->dados['criterios']				= $this->cadastro_model->selecionar_dados('criterios', 'descricao');
		$this->dados['motivos_cadastro']		= $this->cadastro_model->selecionar_dados('motivos_cadastro', 'descricao');
		$this->dados['origens_cadastro']		= $this->cadastro_model->selecionar_dados('origens_cadastro', 'descricao');
		$this->dados['programas_habitacionais']	= $this->cadastro_model->selecionar_dados('programas_habitacionais', 'descricao');

		$renda_cf = 0.00;
		foreach ($this->dados['familiares'] as $key => $familiar) {
			$renda_cf += $familiar->renda;
		}

		$renda = $this->dados['familia']->renda + $this->dados['familia']->renda_cj + $renda_cf;

		if (count($this->dados['faixas_renda']) > 0) {
			foreach ($this->dados['faixas_renda'] as $key => $faixa) {
				if ($renda >= $faixa->limite_inferior && $renda < $faixa->limite_superior) {
					$this->dados['ce_faixa_renda'] = $faixa->id;
					break;
				}
			}
		}
		//var_dump($this->dados['familia']->renda, $this->dados['familia']->renda_cj, $renda_cf, $renda, $this->dados['ce_faixa_renda']); exit();

		$this->load->view('layouts/ficha_view', $this->dados);
	}

	public function imprimir_protocolo($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['familia']				= $this->familias_model->consultarById($idFamilia);
		$this->dados['familiares']			= $this->familiares_model->selecionarByFamilia($idFamilia);
		$this->dados['graus_parentesco']	= $this->cadastro_model->selecionar_dados('graus_parentesco', 'descricao');

		$this->load->view('layouts/protocolo_view', $this->dados);
	}

	public function relatorio() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$ce_relatorio		= '1';
		$campos_relatorio	= $this->relatorios_model->consultaCamposByRelatorio($ce_relatorio);
		$dados_relatorio	= $this->gestao_model->selecionar_array();

		// IMPRIME O RELATÓRIO
		$this->my_print->report($campos_relatorio, $dados_relatorio, $filtro);
	}

	//$data = date('Y-m-d H:i:s'); //salvar a data atual

	/*
	 * JAVASCRIPT
	 */
	public function verificarCpf() {
		$retorno = '';
		$cpf = $this->input->post('cpf');
		
		$familia = $this->familias_model->consultarByCpf($cpf);
		if ($familia) {
			$retorno = $familia->cpf;
		}
		echo $retorno;
	}
	public function verificarCpfTitular() {
		$retorno = '';
		$cpf = $this->input->post('cpf');
		
		$familia = $this->familias_model->consultarByCpfTitular($cpf);
		if ($familia) {
			$retorno = $familia->cpf;
		}
		echo $retorno;
	}
	public function consultarBairro() {
		$retorno	= '0';
		$descBairro	= $this->input->post('bairro');

		$bairro = $this->bairros_model->consultarByDescricao($descBairro);
		if ($bairro) {
			$retorno = $bairro->id;
		}
		echo $retorno;
	}
	public function selecionarFaixaRenda() {
		$retorno	= '';
		$renda		= $this->input->post('renda');

		$faixasRenda = $this->faixas_renda_model->selecionar();

		if (count($faixasRenda) > 0) {
			foreach ($faixasRenda as $key => $faixa) {
				if ($renda >= $faixa->limite_inferior && $renda < $faixa->limite_superior) {
					$retorno = $faixa->id;
					break;
				}
			}
		}
		echo $retorno;
	}

	public function marcarContemplado() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$familia	=	elements(
								array(
									'dt_contemplado'
								),
								$this->input->post());

			$idFamilia = $this->input->post('id_familia');
			
			$familia['sn_contemplado'] = 'S';
			$familia['usuario_contemplado'] = $this->session->userdata('id_usuario');

			//var_dump($familia); exit();

			$update_familia	= $this->familias_model->update($familia, $idFamilia);

			if ($update_familia['code'] == 0) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-check"></i>&nbsp;Data salva com sucesso.
					</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<i class="fa fa-times"></i>&nbsp;Erro ao alterar a dada do conteplado<br>Erro: '. $update_familia['code'] .'|'. $update_familia['message'] .'
					</div>'
				);
			}
			redirect(base_url("questionario/familias/$idFamilia"));
		}
	}
}