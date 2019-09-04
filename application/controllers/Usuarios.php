<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('usuarios_model');
		$this->load->model('cadastro_model');
		$this->load->model('relatorios_model');
	}

	public function index() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->session->userdata('perfil') != 'S') {
			$where['perfil !='] = 'S';
		}
		if ($this->session->userdata('perfil') != 'S' && $this->session->userdata('perfil') != 'A') {
			$where['id'] = $this->session->userdata('id_usuario');
		}

		$this->dados['usuarios']	= $this->usuarios_model->selecionar($where);
		$this->dados['conteudo']	= 'layouts/usuarios_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function adicionar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$this->dados['salvar']		= 'usuarios/salvar';
		$this->dados['voltar']		= base_url('usuarios');
		$this->dados['conteudo']	= 'layouts/usuarios_adicionar_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function salvar() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nome',
								'email',
								'perfil',
								'status',
								'login',
								'senha'
							),
							$this->input->post());

			$dados['senha'] = md5(trim($dados['senha']));

			$usuario = $this->usuarios_model->consultarByLogin($dados['login']);

			if (!$usuario) {
				$usuario = null;
				$usuario = $this->usuarios_model->consultarByEmail($dados['email']);

				if (!$usuario) {
					$insert = $this->usuarios_model->salvar($dados);

					if ($insert['code'] == 0) {
						$this->session->set_flashdata(
							'salvar',
							'<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<i class="fa fa-check"></i>&nbsp;Usuário SALVO com sucesso.
							</div>'
						);
					} else {
						$this->session->set_flashdata(
							'salvar',
							'<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<i class="fa fa-times"></i>&nbsp;Erro ao salvar usuário!<br>Erro: '. $insert['code'] .'|'. $insert['message'] .'
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
							<i class="fa fa-times"></i>&nbsp;Esse usuário já está cadastrado! Escolha outro email.
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
						<i class="fa fa-times"></i>&nbsp;Esse usuário já está cadastrado! Escolha outro Login.
					</div>'
				);
			}
		}
		redirect(base_url('usuarios/adicionar'));
	}

	public function consultar() {
		
	}

	public function editar($idUsuario) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nome',
								'email',
								'perfil',
								'status',
								'login'
							),
							$this->input->post());

			$usuario = $this->usuarios_model->consultarByLogin($dados['login']);

			if (!$usuario || $usuario->login == $this->input->post('login_old')) {
				$usuario = null;
				$usuario = $this->usuarios_model->consultarByEmail($dados['email']);

				if (!$usuario || $usuario->email == $this->input->post('email_old')) {
					$update	= $this->usuarios_model->update($dados, $idUsuario);

					if ($update['code'] == 0) {
						$this->session->set_flashdata(
							'salvar',
							'<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<i class="fa fa-check"></i>&nbsp;Registro SALVO com sucesso.
							</div>'
						);
					} else {
						$this->session->set_flashdata(
							'salvar',
							'<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<i class="fa fa-times"></i>&nbsp;Erro ao SALVAR registro!<br>Erro: '. $update['code'] .'|'. $update['message'] .'
							</div>'
						);
					}
				} else {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<i class="fa fa-times"></i>&nbsp;Esse usuário já está cadastrado! Escolha outro email.
							</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'salvar',
					'<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<i class="fa fa-times"></i>&nbsp;Esse usuário já está cadastrado! Escolha outro Login.
						</div>'
				);
			}
			redirect(base_url("usuarios/editar/$idUsuario"));
		}

		$this->dados['usuario']		= $this->usuarios_model->consultarById($idUsuario);

		$this->dados['salvar']		= "usuarios/editar/$idUsuario";
		$this->dados['voltar']		= base_url('usuarios');
		$this->dados['conteudo']	= 'layouts/usuarios_editar_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function perfil($idUsuario) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$dados	=	elements(
							array(
								'nome',
								'login'
							),
							$this->input->post());

			$login = $this->usuarios_model->consultarByLogin($dados['login']);

			if ($login->id == $idUsuario) {
				$update	= $this->usuarios_model->update($dados, $idUsuario);

				if ($update['code'] == 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check"></i>&nbsp;Perfil ATUALIZADO com sucesso.
						</div>'
					);
				} else {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Erro ao ATUALIZAR perfil!<br>Erro: '. $update['code'] .'|'. $update['message'] .'
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
						<i class="fa fa-times"></i>&nbsp;Login já cadastrado! Escolha outro e tente novamente.
					</div>'
				);
			}
			redirect(base_url("usuarios/perfil/$idUsuario"));
		}

		$this->dados['usuario']		= $this->usuarios_model->consultarById($idUsuario);

		$this->dados['salvar']		= "usuarios/perfil/$idUsuario";
		$this->dados['senha']		= "usuarios/alterar_senha/$idUsuario";
		$this->dados['conteudo']	= 'layouts/usuarios_perfil_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function recuperar_senha() {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post()) {
			$email		= trim($this->input->post('email'));
			$usuario	= $this->usuarios_model->consultarByEmail($email);
			if ($usuario) {
				$randSenha	= trim(RandomString(5));
				$novaSenha	= md5($randSenha);

				/* enviar email */
				$this->load->library('email');
				// $this->email->initialize($config);

				$this->email->from($this->dados['email_admin'], $this->dados['title']);	// Remetente
				$this->email->to($email);												// Destinatário
				$this->email->subject('Redefinição de senha');							// Assunto
				$this->email->message('Olá, '. $usuario->nome .".<br>Sua nova senha é: ". $randSenha .".<br>Utilize-a para acesso ao sistema de habitação.");	// Mensagem

				$enviar	=	$this->email->send();

				if ($enviar) {
					$dadosUsuario	= array('senha'	=>	$novaSenha);
					$salvarSenha	= $this->usuarios_model->update($dadosUsuario, $usuario->id);

					if ($salvarSenha['code'] == 0) {
						$this->session->set_flashdata(
							'msg',
							'<div class="alert alert-success text-center">
								Um email foi enviado contendo sua nova senha.!
							</div>'
						);
					}
				} else {
					$this->session->set_flashdata(
						'msg',
						'<div class="alert alert-danger text-center">
							Não foi possível enviar a mensagem. Contate o suporte!<br>Erro: '. $this->email->print_debugger() .'
						</div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-danger text-center">
						Não existe usuário cadastrado com esse email!
					</div>'
				);
			}
		}

		$this->dados['salvar']		=	'usuarios/recuperar_senha';
		$this->dados['voltar']		=	base_url('usuarios');
		$this->dados['conteudo']	=	'layouts/usuarios_recuperar_senha_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function alterar_senha($idUsuario) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		if ($this->input->post('senha')) {
			$dados	=	elements(
							array(
								'senha',
								'confirmar_senha'
							),
							$this->input->post());

			if ($dados['senha'] != '' && $dados['senha'] == $dados['confirmar_senha']) {
				$nova_senha['senha'] = md5(trim($dados['senha']));

				$update = $this->usuarios_model->update($nova_senha, $idUsuario);

				if ($update['code'] == 0) {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-check"></i>&nbsp;Senha ALTERADA com sucesso.
						</div>'
					);
				} else {
					$this->session->set_flashdata(
						'salvar',
						'<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<i class="fa fa-times"></i>&nbsp;Erro ao ALTERAR senha!<br>Erro: '.$update['code'].'|'.$update['message'].'
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
						<i class="fa fa-times"></i>&nbsp;Erro ao ALTERAR senha!<br>Verifique se os campos foram preenchidos corretamente!
					</div>'
				);
			}
			redirect(base_url("usuarios/alterar_senha/$idUsuario"));
		}

		$this->dados['usuario'] 	=	$this->usuarios_model->consultarById($idUsuario);

		$this->dados['salvar']		=	"usuarios/alterar_senha/$idUsuario";
		$this->dados['voltar']		=	base_url("usuarios/perfil/$idUsuario");
		$this->dados['conteudo']	=	'layouts/usuarios_alterar_senha_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function excluir($idUsuario) {
		$this->Seguranca();	//Se o Usuario nao estiver Logado sai do Sistema

		$delete = $this->usuarios_model->excluir($idUsuario);

		if ($delete['code'] == 0) {
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
					<i class="fa fa-times"></i>&nbsp;Erro ao EXCLUIR registro!<br>Erro: '. $delete['code'] .'|'. $delete['message'] .'
				</div>'
			);
		}
		redirect(base_url('usuarios'));
	}

	public function login() {
		if ($this->input->post()) {
			$login				= trim($this->input->post('login'));
			$senha				= md5(trim($this->input->post('senha')));
			$usuario			= $this->usuarios_model->login($login, $senha);
			$itens_menu			= $this->cadastro_model->selecionar();
			$itens_relatorios	= $this->relatorios_model->selecionarRelEmpresaDistinctByOpcaoMenu('1');

			if (count($usuario) === 1) {
				$session	=	array(
									'id_usuario'		=>	$usuario->id,
									'login'				=>	$usuario->login,
									'perfil'			=>	$usuario->perfil,
									'nome_perfil'		=>	$usuario->nome_perfil,
									'nome'				=>	$usuario->nome,
									'email'				=>	$usuario->email,
									'sn_ativo'			=>	$usuario->sn_ativo,
									'is_logged_in'		=>	TRUE,
									'itens_menu'		=>	$itens_menu,
									'itens_relatorios'	=>	$itens_relatorios
								);
				$this->session->set_userdata($session); //Gravar a session do usuario logado
				redirect(base_url());
			}
			else {
				$this->session->set_flashdata(
					'msg',
					'<div class="alert alert-danger text-center">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						Usuário e/ou senha inválido(s)
					</div>'
				);
			}
		}
		$this->dados['login']		=	base_url('usuarios/login');
		$this->dados['conteudo']	=	'layouts/login_view';
		$this->load->view('layouts/layout_master', $this->dados);
	}

	public function logout() {
		if($this->session->userdata('is_logged_in')) {
			$this->session->sess_destroy();
		}
		redirect(base_url());
	}

}
