<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitario_mensual_model extends CI_Model {

	public function getPersonals(){
		$this->db->select("p.*,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_mensual r","r.personal_id = p.id");	
		$this->db->where("r.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getPersonalsmensual()
	{
		$this->db->where("estado", "1");
		$resultados = $this->db->get("personal");
		return $resultados->result();
	}
	public function save($data){
		return $this->db->insert("registro_mensual",$data);
	}
	public function getRegistro($id){
		$this->db->select("p.dni,p.nombres,p.apellido_pat,p.apellido_mat,p.sexo,p.talla,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_mensual r","r.personal_id = p.id");	
		$this->db->where("r.id",$id);
		$resultado = $this->db->get("registro_mensual");
		return $resultado->row();

	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("registro_mensual",$data);
	}
	public function lastID(){
		return $this->db->insert_id();
	}
}
