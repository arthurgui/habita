<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Faixas_renda_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('faixas_renda', $dados);
		return $this->db->insert_id();
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('faixas_renda', $dados);
	}

	function consultarById($id) {
		$this->db->select(
						'*'
					)
				->from('faixas_renda')
				->where('id', $id);

		return $this->db->get()->row();
	}

	function consultarByDescricao($descricao) {
		$this->db->select(
						'*'
					)
				->from('faixas_renda')
				->where('descricao', $descricao);

		return $this->db->get()->row();
	}

	function consultar($filter) {
		$this->db->select(
						'*'
					)
				->from('faixas_renda')
				->where($filter);

		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('faixas_renda', array('id' => $id));
	}

	function selecionar($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						'*'
					)
				->from('faixas_renda');

		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}

	function selecionar_array($where=null, $limit=null, $orderBy=null) {
		$this->db->select(
						'*'
					)
				->from('faixas_renda');

		if ($where) {
			$this->db->where($where);
		}
		if ($orderBy) {
			$this->db->order_by($orderBy);
		}
		if ($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result_array();
	}

}