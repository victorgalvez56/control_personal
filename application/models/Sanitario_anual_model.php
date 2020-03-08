<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitario_anual_model extends CI_Model {

	public function getPersonals(){
		$this->db->select("r.*,p.dni,p.nombres,p.apellido_pat,p.apellido_mat");
		$this->db->from("registro_sanitario r");
		$this->db->join("personal p","r.personal_id = p.id");	
		$this->db->where("r.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("registro_sanitario",$data);
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
		return $this->db->update("categorias",$data);
	}
	public function lastID(){
		return $this->db->insert_id();
	}
}
