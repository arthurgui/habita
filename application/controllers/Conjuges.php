<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Conjuges extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('conjuges_model');
		$this->load->model('relatorios_model');
	}

	public function index() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['conjuges']	= $this->conjuges_model->selecionar();
		$this->dados['conteudo']	= 'layouts/conjuges_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function adicionar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['salvar']		= 'conjuges/salvar';
		$this->dados['voltar']		= base_url('conjuges');
		$this->dados['conteudo']	= 'layouts/conjuges_adicionar_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function salvar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nbanco',
								'banco'
							),
							$this->input->post());

			$insert = $this->conjuges_model->salvar($dados);

			if ($insert['code'] == 0) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-check"></i> Registro SALVO com sucesso.
					</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-times"></i> Erro ao salvar registro!<br>Erro: '. $insert['code'] .'|'. $insert['message'] .'
					</div>'
				);
			}
		}
		redirect(base_url('conjuges/adicionar'));
	}

	public function editar($idConjuge) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nbanco',
								'banco'
							),
							$this->input->post());

			$update	= $this->conjuges_model->update($dados, $idConjuge);

			if ($update['code'] == 0) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-check"></i> Registro SALVO com sucesso.
					</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<i class="fa fa-times"></i> Erro ao SALVAR registro!<br>Erro: '. $update['code'] .'|'. $update['message'] .'
					</div>'
				);
			}
			redirect(base_url("conjuges/editar/$idConjuge"));
		}

		$this->dados['conjuges']	=	$this->conjuges_model->consultarById($idConjuge);

		$this->dados['salvar']		= "conjuges/editar/$idConjuge";
		$this->dados['voltar']		= base_url('conjuges');
		$this->dados['conteudo']	= 'layouts/conjuges_editar_view';
		$this->load->view('layouts/layout_master',$this->dados);
	}

	public function excluir($idConjuge) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$delete = $this->conjuges_model->excluir($idConjuge);

		if ($delete['code'] == 0) {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<i class="fa fa-check"></i> Registro EXCLUÍDO com sucesso.
				</div>'
			);
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<i class="fa fa-times"></i> Erro ao EXCLUIR registro!<br>Erro: '. $delete['code'] .'|'. $delete['message'] .'
				</div>'
			);
		}
		redirect(base_url('conjuges'));
	}

	public function relatorio() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$ce_relatorio		= '1';
		$campos_relatorio	= $this->relatorios_model->consultaCamposByRelatorio($ce_relatorio);
		$dados_relatorio	= $this->conjuges_model->selecionar_array();

		// IMPRIME O RELATÓRIO
		$this->my_print->report($campos_relatorio, $dados_relatorio, $filtro);
	}

	/*
	 * JAVASCRIPT
	 */
	public function consultar() {
		$retorno = '';
		$cpf = $this->input->post('cpf');
		
		$conjuge = $this->conjuges_model->consultarByCpf($cpf);
		if ($conjuge) {
			$retorno =	$conjuge->id ."|".
						$conjuge->nome ."|".
						$conjuge->sexo ."|".
						$conjuge->dt_nascimento ."|".
						$conjuge->rg ."|".
						$conjuge->rg_org_emissor ."|".
						$conjuge->rg_uf ."|".
						$conjuge->ce_raca ."|".
						$conjuge->ce_escolaridade ."|".
						$conjuge->ce_religiao ."|".
						$conjuge->ce_estado_civil ."|".
						$conjuge->telefone_res ."|".
						$conjuge->telefone_cel ."|".
						$conjuge->sn_chefe ."|".
						$conjuge->sn_atividade_remunerada ."|".
						$conjuge->ce_atividade_desenvolvida ."|".
						$conjuge->tempo_atividade ."|".
						$conjuge->renda ."|".
						$conjuge->sn_deficiencia ."|".
						$conjuge->ce_deficiencia ."|".
						$conjuge->cid ."|";
		}
		echo $retorno;
	}

}