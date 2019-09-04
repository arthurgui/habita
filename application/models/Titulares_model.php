<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Titulares_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('titulares', $dados);
		return $this->db->insert_id();
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('titulares', $dados);
	}

	function consultarById($id) {
		$this->db->select(
						't.*'
					)
				->from('titulares t')
				->where('t.id', $id);

		return $this->db->get()->row();
	}

	function consultarByCpf($cpf) {
		$this->db->select(
						't.*'
					)
				->from('titulares t')
				->where('t.cpf', $cpf);

		return $this->db->get()->row();
	}

	function consultarByFilter($filter) {
		$this->db->select(
						't.*'
					)
				->from('titulares t')
				->where($filter);

		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('titulares', array('id' => $id));
	}

	function selecionar($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						't.*'
					)
				->from('titulares t');

		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		} else {
			$this->db->order_by('t.nome ASC');
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}

	function selecionar_array($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						't.*'
					)
				->from('titulares t');

		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		} else {
			$this->db->order_by('t.nome ASC');
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result_array();
	}

}