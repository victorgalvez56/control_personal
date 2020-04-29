<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_registro_model extends CI_Model
{
	public function getPersonalsforRegister()
	{
		$this->db->where("estado_registro","1");
		$this->db->where("estado","1");
		$resultados = $this->db->get("personal");
		return $resultados->result();
	}
	public function getPersonals()
	{
		$this->db->where("estado","1");
		$resultados = $this->db->get("personal");
		return $resultados->result();
	}
	public function getRegistros()
	{
		$this->db->select("r.*,p.nombres,p.apellido_pat,p.apellido_mat,,p.dni,p.sexo,p.grupo_sang");
		$this->db->from("personal p");
		$this->db->join("registro_sanitario r","p.id = r.personal_id");	
		$this->db->where("r.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getRegistro($id){
		$this->db->select("p.dni,p.nombres,p.apellido_pat,p.apellido_mat,p.grado,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_sanitario r","p.id = r.personal_id");	
		$this->db->where("r.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getRegistroby($id){
		$this->db->select("*");
		$this->db->from("registro_sanitario");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("registro_sanitario",$data);
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
