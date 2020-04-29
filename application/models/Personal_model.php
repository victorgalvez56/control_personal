<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal_model extends CI_Model
{
	public function getPersonals()
	{
		$this->db->select("*");
		$this->db->from("personal");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getPersonalsregistro()
	{
		$this->db->select("p.*,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_sanitario r","r.personal_id = p.id");	
		$this->db->where("p.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function save($data)
	{
		return $this->db->insert("personal", $data);
	}
	public function getPersonal($id){
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save_detalle_idioma($data)
	{
		$this->db->insert("detalle_idioma", $data);
	}
	public function save_detalle_familiar($data)
	{
		$this->db->insert("detalle_familiar", $data);
	}

	public function save_detalle_viaje($data)
	{
		$this->db->insert("detalle_viajes", $data);
	}

	public function save_detalle_seguro($data)
	{
		$this->db->insert("detalle_seguro", $data);
	}
    	public function save_detalle_curso($data)
	{
		$this->db->insert("detalle_estudios", $data);
	}
	
	public function update($id, $data)
	{
		$this->db->where("id", $id);
		return $this->db->update("personal", $data);
	}
	public function lastID()
	{
		return $this->db->insert_id();
	}
}
