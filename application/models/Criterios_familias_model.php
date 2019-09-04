<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Criterios_familias_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('criterios_familias', $dados);
	}

	function salvarTodos($dados) {
		$this->db->insert_batch('criterios_familias', $dados);
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('criterios_familias', $dados);
	}

	function consultarById($id) {
		$this->db->select(
						'c.*'
					)
				->from('criterios_familias c')
				->where('c.id', $id);

		return $this->db->get()->row();
	}

	function consultarByFilter($filter) {
		$this->db->select(
						'c.*'
					)
				->from('criterios_familias c')
				->where($filter);

		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('criterios_familias', array('id' => $id));
	}

	function excluirByFamilia($idFamilia) {
		$this->db->delete('criterios_familias', array('ce_familia' => $idFamilia));
	}

	function selecionarByFamilia($idFamilia) {
		$this->db->select('*')
				->from('criterios_familias')
				->where('ce_familia', $idFamilia);
		return $this->db->get()->result();
	}

	function selecionar($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						'c.*'
					)
				->from('criterios_familias c');

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
				->from('criterios_familias c');

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