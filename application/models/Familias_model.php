<?php defined('BASEPATH') OR exit('Acesso direto de script não é permitido.');

class Familias_model extends CI_model {

	function salvar($dados) {
		$this->db->insert('familias', $dados);
		return $this->db->insert_id();
	}

	function update($dados, $id) {
		$this->db->where('id', $id)
				->update('familias', $dados);
	}

	function consultar() {
		
	}

	function consultarById($id) {
		$this->db->select(
						'f.*,
						YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(f.dt_nascimento))) AS idade,
						YEAR(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(f.dt_nascimento_cj))) AS idade_cj,
						CASE (f.sn_beneficios)
							WHEN "S" THEN "Sim"
							WHEN "N" THEN "Não"
						END AS possui_beneficios,
						(SELECT COUNT(*) FROM familiares WHERE ce_familia = f.id) num_familiares'
					)
				->from('familias f')
				->where('f.id', $id);
		return $this->db->get()->row();
	}

	function consultarByCpf($cpf) {
		$this->db->select('*')
				->from('familias')
				->where("cpf = '". $cpf ."' || cpf_cj = '". $cpf ."'");
		return $this->db->get()->row();
	}

	function consultarByCpfTitular($cpf) {
		$this->db->select('*')
				->from('familias')
				->where("cpf", $cpf);
		return $this->db->get()->row();
	}

	function excluir($id) {
		$this->db->delete('familias', array('id' => $id));
	}

	function selecionar($where=null, $orderBy=null, $limit=null) {
		$this->db->select(
						'f.*,
						CASE (f.sn_beneficios)
							WHEN "S" THEN "Sim"
							WHEN "N" THEN "Não"
						END AS possui_beneficios,
						CASE (f.sn_contemplado)
							WHEN "S" THEN "Sim"
							WHEN "N" THEN "Não"
						END AS contemplado,
						(SELECT COUNT(*) FROM familiares WHERE ce_familia = f.id) AS num_familiares'
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
						'f.*,
						CASE (f.sn_beneficios)
							WHEN "S" THEN "Sim"
							WHEN "N" THEN "Não"
						END AS possui_beneficios,
						(SELECT COUNT(*) FROM familiares WHERE ce_familia = f.id) num_familiares'
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