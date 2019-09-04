<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Usuarios_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('usuarios', $dados);
		return $this->db->insert_id();
	}

	function update($dados, $id) {
		$this->db->where('id', $id);
		$this->db->update('usuarios', $dados);
	}

	function consultar() {
		
	}

	function consultarById($id) {
		$this->db->select(
						'*,
						CASE (perfil)
							WHEN "S" THEN "Super"
							WHEN "A" THEN "Administrador"
							WHEN "C" THEN "Consulta"
							WHEN "O" THEN "Operador"
						END AS nome_perfil,
						CASE (status)
							WHEN "A" THEN "Ativo"
							WHEN "C" THEN "Inativo"
						END AS nome_status'
					)
				->from('usuarios')
				->where('id', $id);
		return $this->db->get()->row();
	}

	function consultarByEmail($email) {
		$this->db->select(
						'*,
						CASE (perfil)
							WHEN "S" THEN "Super"
							WHEN "A" THEN "Administrador"
							WHEN "C" THEN "Consulta"
							WHEN "O" THEN "Operador"
						END AS nome_perfil,
						CASE (status)
							WHEN "A" THEN "Ativo"
							WHEN "C" THEN "Inativo"
						END AS nome_status'
					)
				->from('usuarios')
				->where('email', $email);
		return $this->db->get()->row();
	}

	function consultarByLogin($login) {
		$this->db->select(
						'*,
						CASE (perfil)
							WHEN "S" THEN "Super"
							WHEN "A" THEN "Administrador"
							WHEN "C" THEN "Consulta"
							WHEN "O" THEN "Operador"
						END AS nome_perfil,
						CASE (status)
							WHEN "A" THEN "Ativo"
							WHEN "C" THEN "Inativo"
						END AS nome_status'
					)
				->from('usuarios')
				->where('login', $login);
		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('usuarios', array('id' => $id));
	}

	function selecionar($where=null) {
		$this->db->select(
						'*,
						CASE (perfil)
							WHEN "S" THEN "Super"
							WHEN "A" THEN "Administrador"
							WHEN "C" THEN "Consulta"
							WHEN "O" THEN "Operador"
						END AS nome_perfil,
						CASE (status)
							WHEN "A" THEN "Ativo"
							WHEN "C" THEN "Inativo"
						END AS nome_status'
					)
					->from('usuarios');
		if ($where) {
			$this->db->where($where);
		}
		$this->db->order_by('nome ASC');

		return $this->db->get()->result();
	}

	function selecionar_array($where=null) {
		$this->db->select(
						'*,
						CASE (perfil)
							WHEN "S" THEN "Super"
							WHEN "A" THEN "Administrador"
							WHEN "C" THEN "Consulta"
							WHEN "O" THEN "Operador"
						END AS nome_perfil,
						CASE (status)
							WHEN "A" THEN "Ativo"
							WHEN "C" THEN "Inativo"
						END AS nome_status'
					)
					->from('usuarios');
		if ($where) {
			$this->db->where($where);
		}
		$this->db->order_by('nome ASC');

		return $this->db->get()->result_array();
	}

	function login($login, $senha) {
		$this->db->select(
						'*,
						CASE (perfil)
							WHEN "S" THEN "Super"
							WHEN "A" THEN "Administrador"
							WHEN "C" THEN "Consulta"
							WHEN "O" THEN "Operador"
						END AS nome_perfil,
						CASE (status)
							WHEN "A" THEN "Ativo"
							WHEN "C" THEN "Inativo"
						END AS nome_status'
					)
					->from('usuarios')
					->where('login', $login)
					->where('senha', $senha);
		return $this->db->get()->row();
	}
}