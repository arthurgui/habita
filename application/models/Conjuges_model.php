<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Conjuges_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('conjuges', $dados);
		return $this->db->insert_id();
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('conjuges', $dados);
	}

	function consultarById($id) {
		$this->db->select(
						'c.*'
					)
				->from('conjuges c')
				->where('c.id', $id);

		return $this->db->get()->row();
	}

	function consultarByCpf($cpf) {
		$this->db->select(
						'c.*'
					)
				->from('conjuges c')
				->where('c.cpf', $cpf);

		return $this->db->get()->row();
	}

	function consultarByFilter($filter) {
		$this->db->select(
						'c.*'
					)
				->from('conjuges c')
				->where($filter);

		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('conjuges', array('id' => $id));
	}

	function selecionar($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						'c.*'
					)
				->from('conjuges c');

		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		} else {
			$this->db->order_by('c.nome ASC');
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}

	function selecionar_array($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						'c.*'
					)
				->from('conjuges c');

		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		} else {
			$this->db->order_by('c.nome ASC');
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result_array();
	}

}