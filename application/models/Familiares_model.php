<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Familiares_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('familiares', $dados);
	}

	function salvarTodos($dados) {
		$this->db->insert_batch('familiares', $dados);
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('familiares', $dados);
	}

	function consultar() {
		
	}

	function consultarById($id) {
		$this->db->select(
						'*'
					)
				->from('familiares')
				->where('id', $id);
		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('familiares', array('id' => $id));
	}

	function excluirByFamilia($idFamilia) {
		$this->db->delete('familiares', array('ce_familia' => $idFamilia));
	}

	function selecionarByFamilia($idFamilia) {
		$this->db->select(
						"f.*,
						YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(f.dt_nascimento))) AS idade,
						(CASE (f.sn_atividade_remunerada)
							WHEN 'S' THEN 'Sim'
							WHEN 'N' THEN 'Não'
						END) AS trabalha,
						(CASE (f.sn_deficiencia)
							WHEN 'S' THEN 'Sim'
							WHEN 'N' THEN 'Não'
						END) AS deficiencia,
						g.descricao AS grau_parentesco,
						e.descricao AS escolaridade"
					)
				->from('familiares f')
				->where('f.ce_familia', $idFamilia)
				->join('graus_parentesco g', 'f.ce_grau_parentesco = g.id', 'INNER')
				->join('escolaridades e', 'f.ce_escolaridade = e.id', 'INNER');
		return $this->db->get()->result();
	}

	function selecionar($where=null, $orderBy=null, $limit=null) {
		$this->db->select(
						'f.*'
					)
				->from('familiares f');

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
				->from('familiares f');

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