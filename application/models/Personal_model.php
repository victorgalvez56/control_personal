<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal_model extends CI_Model
{
	public function getPersonalsMilitar()
	{
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("tipo_personal","MILITAR");
		$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getPersonalsCivil()
	{
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("tipo_personal","CIVIL");
		$this->db->where("estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getPersonalTarjeta()
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

	public function getPersonalMilitar($id){
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getPersonalCivil($id){
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getPersonal($id){
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getPersonalforTarjet($id){
		$this->db->select("*");
		$this->db->from("personal");
		$this->db->where("dni",$id);
		$this->db->where("estado","1");
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function save($data)
	{
		return $this->db->insert("personal", $data);
	}


	public function getDetalleIdioma($id){
		$this->db->select("*");
		$this->db->from("detalle_idioma");
		$this->db->where("personal_id", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getDetalleFamiliar($id){
		$this->db->select("*");
		$this->db->from("detalle_familiar");
		$this->db->where("personal_id", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getDetalleViaje($id){
		$this->db->select("*");
		$this->db->from("detalle_viajes");
		$this->db->where("personal_id", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getDetalleSeguro($id){
		$this->db->select("*");
		$this->db->from("detalle_seguro");
		$this->db->where("personal_id", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getDetalleEstudios($id){
		$this->db->select("*");
		$this->db->from("detalle_estudios");
		$this->db->where("personal_id", $id);
		$resultados = $this->db->get();
		return $resultados->result();
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



	public function update_detalle_idioma($id,$data)
	{
		$this->db->where("id", $id);
		return $this->db->update("detalle_idioma", $data);
		$this->db->set("detalle_idioma", $data);
	}
	public function update_detalle_familiar($data)
	{
		$this->db->set("detalle_familiar", $data);
	}

	public function update_detalle_viaje($data)
	{
		$this->db->set("detalle_viajes", $data);
	}

	public function update_detalle_seguro($id,$data)
	{
		$this->db->where("id", $id);
		return $this->db->update("detalle_seguro", $data);
	}
    	public function update_detalle_curso($data)
	{
		$this->db->set("detalle_estudios", $data);
	}

	public function lastID()
	{
		return $this->db->insert_id();
	}
}
