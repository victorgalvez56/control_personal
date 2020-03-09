<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_registro_model extends CI_Model
{
	public function getPersonals()
	{
		$this->db->select("r.*,p.dni,p.nombres,p.apellido_pat,p.apellido_mat");
		$this->db->from("registro_sanitario r");
		$this->db->join("personal p", "r.personal_id = p.id");
		$this->db->where("r.estado", "1");
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function getPersonalsregistro()
	{
		$this->db->where("estado","1");
		$resultados = $this->db->get("personal");
		return $resultados->result();
	}

	public function save($data)
	{
		return $this->db->insert("registro_sanitario", $data);
	}
	public function lastID()
	{
		return $this->db->insert_id();
	}
}
