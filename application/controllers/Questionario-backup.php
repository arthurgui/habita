<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Questionario extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('familias_model');

		$this->load->model('familiares_model');
		$this->load->model('criterios_familias_model');
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

		$this->dados['racas']					= $this->cadastro_model->selecionar_dados('racas', 'descricao');
		$this->dados['escolaridades']			= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['religioes']				= $this->cadastro_model->selecionar_dados('religioes', 'descricao');
		$this->dados['estados_civis']			= $this->cadastro_model->selecionar_dados('estados_civil', 'descricao');
		$this->dados['atividades']				= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
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

		$this->dados['consultar']	= 'questionario';
		$this->dados['salvar']		= 'questionario/salvar';
		$this->dados['conteudo']	= 'layouts/familias_adicionar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function salvar() {
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
									'tempo_atividade',
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
									'telefone_cj',
									'sn_chefe_cj',
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
									'bpc',
									'vlr_bpc',
									'peti',
									'vlr_peti',
									'outros_beneficios',
									'vlr_outros_beneficios',
									'descricao_outros_beneficios',
									'tempo_moradia',
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
									'sn_energia_eletrica',
									'sn_esgoto',
									'ce_tipo_abastecimento_agua',
									'ce_destino_lixo',
									'observacoes'
								),
								$this->input->post());

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
										'tipo_vinculo_cf',
										'tempo_atividade_cf',
										'renda_cf',
										'sn_deficiencia_cf',
										'ce_deficiencia_cf',
										'cid_cf'
									),
									$this->input->post());

					for ($i=0; $i < $qtdFamiliares; $i++) { 
						$familiar	=	array(
											'nome'						=> $dados['nome_cf'][$i],
											'dt_nascimento'				=> $dados['dt_nascimento_cf'][$i],
											'ce_grau_parentesco'		=> $dados['ce_grau_parentesco_cf'][$i],
											'ce_escolaridade'			=> $dados['ce_escolaridade_cf'][$i],
											'escola_bairro'				=> $dados['escola_bairro_cf'][$i],
											'sn_atividade_remunerada'	=> $dados['sn_atividade_remunerada_cf'][$i],
											'ce_atividade_desenvolvida'	=> $dados['ce_atividade_desenvolvida_cf'][$i],
											'tipo_vinculo'				=> $dados['tipo_vinculo_cf'][$i],
											'tempo_atividade'			=> $dados['tempo_atividade_cf'][$i],
											'renda'						=> number_format($dados['renda_cf'][$i], 2, ',', '.'),
											'sn_deficiencia'			=> $dados['sn_deficiencia_cf'][$i],
											'ce_deficiencia'			=> $dados['ce_deficiencia_cf'][$i],
											'cid'						=> $dados['cid_cf'][$i],
											'ce_familia'				=> $ce_familia
										);
						$familiares[] = $familiar;
					}

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

				foreach ($dados_criterios as $i => $ce_criterio) {
					$criterios[] =	array(
										'ce_criterio'	=> $ce_criterio,
										'ce_familia'	=> $ce_familia
									);
				}

				$insert_criterios = $this->criterios_familias_model->salvarTodos($criterios);

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
							<i class="fa fa-check"></i>&nbsp;Família SALVA com sucesso.
						</div>'
					);
				}
				elseif ($erros > 1) {
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

			$filtro	=	array(
							'f.titular LIKE' => $dados['titular'] .'%',
						);
			if ($dados['conjuge'] != '') {
				$filtro['f.conjuge LIKE'] = $dados['conjuge'] .'%';
			}

			$this->dados['filtro'] = true;
		}

		$this->dados['familias']	= $this->familias_model->selecionar($filtro);

		$this->dados['consultar']	= 'questionario/familias';
		$this->dados['conteudo']	= 'layouts/familias_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function editar($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
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
								'tempo_atividade',
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
								'telefone_cj',
								'sn_chefe_cj',
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
								'bpc',
								'vlr_bpc',
								'peti',
								'vlr_peti',
								'outros_beneficios',
								'vlr_outros_beneficios',
								'descricao_outros_beneficios',
								'tempo_moradia',
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
								'sn_energia_eletrica',
								'sn_esgoto',
								'ce_tipo_abastecimento_agua',
								'ce_destino_lixo',
								'observacoes',
							),
							$this->input->post());

			$update_familia	= $this->familias_model->update($dados, $idFamilia);

			if ($update_familia['code'] == 0) {
				$qtdFamiliares	= $this->input->post('qtd_familiares');
/*
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
										'tipo_vinculo_cf',
										'tempo_atividade_cf',
										'renda_cf',
										'sn_deficiencia_cf',
										'ce_deficiencia_cf',
										'cid_cf'
									),
									$this->input->post());

					for ($i=0; $i < $qtdFamiliares; $i++) { 
						$familiar	=	array(
											'id'						=> $dados['id_cf'][$i],
											'nome'						=> $dados['nome_cf'][$i],
											'dt_nascimento'				=> $dados['dt_nascimento_cf'][$i],
											'ce_grau_parentesco'		=> $dados['ce_grau_parentesco_cf'][$i],
											'ce_escolaridade'			=> $dados['ce_escolaridade_cf'][$i],
											'escola_bairro'				=> $dados['escola_bairro_cf'][$i],
											'sn_atividade_remunerada'	=> $dados['sn_atividade_remunerada_cf'][$i],
											'ce_atividade_desenvolvida'	=> $dados['ce_atividade_desenvolvida_cf'][$i],
											'tipo_vinculo'				=> $dados['tipo_vinculo_cf'][$i],
											'tempo_atividade'			=> $dados['tempo_atividade_cf'][$i],
											'renda'						=> number_format($dados['renda_cf'][$i], 2, ',', '.'),
											'sn_deficiencia'			=> $dados['sn_deficiencia_cf'][$i],
											'ce_deficiencia'			=> $dados['ce_deficiencia_cf'][$i],
											'cid'						=> $dados['cid_cf'][$i],
											'ce_familia'				=> $idFamilia
										);
						$familiares[] = $familiar;
					}

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
*/

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
						<i class="fa fa-times"></i>&nbsp;Erro ao Alterar família!<br>Erro: '. $update_familia['code'] .'|'. $update_familia['message'] .'
					</div>'
				);
			}
			redirect(base_url("questionario/editar/$idFamilia"));
		}

		$this->dados['familia']					= $this->familias_model->consultarById($idFamilia);
		$this->dados['familiares']				= $this->familiares_model->selecionarByFamilia($idFamilia);

		$this->dados['racas']					= $this->cadastro_model->selecionar_dados('racas', 'descricao');
		$this->dados['escolaridades']			= $this->cadastro_model->selecionar_dados('escolaridades', 'descricao');
		$this->dados['religioes']				= $this->cadastro_model->selecionar_dados('religioes', 'descricao');
		$this->dados['estados_civis']			= $this->cadastro_model->selecionar_dados('estados_civil', 'descricao');
		$this->dados['atividades']				= $this->cadastro_model->selecionar_dados('atividades_desenvolvidas', 'descricao');
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

		$this->dados['salvar']		= "questionario/editar/$idBanco";
		$this->dados['voltar']		= base_url('questionario');
		$this->dados['conteudo']	= 'layouts/familias_editar_view';
		$this->load->view('layouts/layout_sistema', $this->dados);
	}

	public function excluir($idFamilia) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$delete = $this->familias_model->excluir($idFamilia);

		if ($delete['code'] == 0) {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-check"></i> Registro EXCLUÍDO com sucesso.
				</div>'
			);
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-times"></i> Erro ao EXCLUIR registro!<br>Erro: '. $delete['code'] .'|'. $delete['message'] .'
				</div>'
			);
		}
		redirect(base_url('questionario'));
	}

	public function relatorio() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$ce_relatorio		= '1';
		$campos_relatorio	= $this->relatorios_model->consultaCamposByRelatorio($ce_relatorio);
		$dados_relatorio	= $this->gestao_model->selecionar_array();

		// IMPRIME O RELATÓRIO
		$this->my_print->report($campos_relatorio, $dados_relatorio, $filtro);
	}

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

}