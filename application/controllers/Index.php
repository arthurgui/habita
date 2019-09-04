<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->session->userdata('is_logged_in')) {
			$this->dados['conteudo'] = 'layouts/index_sistema_view';
		}
		else {
			redirect(base_url('usuarios/login'));
		}
		$this->load->view('layouts/layout_master', $this->dados);
	}
}