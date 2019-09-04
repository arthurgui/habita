<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Questionario_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('familias', $dados);
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('familias', $dados);
	}

	function consultar() {
		
	}

	function consultarById($id) {
		$this->db->select('*')
				->from('familias')
				->where('id', $id);
		return $this->db->get()->row();
	}

	function consultarByCpf($cpf) {
		$this->db->select(
						'*'
					)
				->from('familias')
				->where("cpf = '". $cpf ."' || cpf_cj = ". $cpf);
		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('familias', array('id' => $id));
	}

	function selecionar($where=null, $orderBy=null, $limit=null) {
		$this->db->select(
						'f.*'
					)
				->from('familias f');
		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		} else {
			$this->db->order_by('f.id ASC');
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}

	function selecionar_array($where=null, $orderBy=null, $limit=null) {
		$this->db->select(
						'f.*'
					)
				->from('familias f');
		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		} else {
			$this->db->order_by('f.id ASC');
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result_array();
	}

}