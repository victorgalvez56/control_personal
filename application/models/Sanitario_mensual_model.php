<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitario_mensual_model extends CI_Model {

	public function getPersonals(){
		$this->db->select("p.*,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_anual r","r.personal_id = p.id");	
		$this->db->where("p.estado","1");
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
		return $this->db->insert("registro_anual",$data);
	}
	public function getCategoria($id){
		$this->db->where("id_cat",$id);
		$resultado = $this->db->get("categorias");
		return $resultado->row();

	}
	public function save_detalle_idioma($data){
		$this->db->insert("detalle_idioma",$data);
	}
	public function update($id,$data){
		$this->db->where("id_cat",$id);
		return $this->db->update("personal",$data);
	}
	public function lastID(){
		return $this->db->insert_id();
	}
}