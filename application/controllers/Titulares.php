<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Titulares extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('titulares_model');
		$this->load->model('dados_bancarios_model');
		$this->load->model('relatorios_model');
	}

	public function index() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['titulares']		= $this->titulares_model->selecionar();
		$this->dados['conteudo']	= 'layouts/titulares_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function adicionar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['salvar']		= 'titulares/salvar';
		$this->dados['voltar']		= base_url('titulares');
		$this->dados['conteudo']	= 'layouts/titulares_adicionar_view';
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

			$insert = $this->titulares_model->salvar($dados);

			if ($insert['code'] == 0) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check"></i> Registro SALVO com sucesso.</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times"></i> Erro ao salvar registro!<br>Erro: '. $insert['code'] .'|'. $insert['message'] .'</div>'
				);
			}
		}
		redirect(base_url('titulares/adicionar'));
	}

	public function consultar() {
		
	}

	public function editar($idBanco) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nbanco',
								'banco'
							),
							$this->input->post());

			$update	= $this->titulares_model->update($dados, $idBanco);

			if ($update['code'] == 0) {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check"></i> Registro SALVO com sucesso.</div>'
				);
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times"></i> Erro ao SALVAR registro!<br>Erro: '. $update['code'] .'|'. $update['message'] .'</div>'
				);
			}
			redirect(base_url("titulares/editar/$idBanco"));
		}

		$this->dados['titulares']	=	$this->titulares_model->consultarById($idBanco);

		$this->dados['salvar']		= "titulares/editar/$idBanco";
		$this->dados['voltar']		= base_url('titulares');
		$this->dados['conteudo']	= 'layouts/titulares_editar_view';
		$this->load->view('layouts/layout_master',$this->dados);
	}

	public function excluir($idBanco) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['dados_bancarios'] = $this->dados_bancarios_model->existeRegistroWithBanco($idBanco);

		if (count($this->dados['dados_bancarios']) == 0) {
			$delete = $this->titulares_model->excluir($idBanco);

			if ($delete['code'] == 0) {
				$this->session->set_flashdata(
					'excluir',
					'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check"></i> Registro EXCLUÍDO com sucesso.</div>'
				);
			} else {
				$this->session->set_flashdata(
					'excluir',
					'<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times"></i> Erro ao EXCLUIR registro!<br>Erro: '. $delete['code'] .'|'. $delete['message'] .'</div>'
				);
			}
		} else {
			$this->session->set_flashdata(
				'excluir',
				'<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times"></i> Erro ao EXCLUIR banco! Não é possível excluir titulares vinculados aos dados bancários</div>'
			);
		}
		redirect(base_url('titulares'));
	}

	public function relatorio() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$ce_relatorio		= '1';
		$campos_relatorio	= $this->relatorios_model->consultaCamposByRelatorio($ce_relatorio);
		$dados_relatorio	= $this->titulares_model->selecionar_array();

		// IMPRIME O RELATÓRIO
		$this->my_print->report($campos_relatorio, $dados_relatorio, $filtro);
	}

}