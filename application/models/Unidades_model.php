<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades_model extends CI_Model {

	public function getUnidades(){
		$this->db->where("estado","1");
		$resultados = $this->db->get("unidades");
		return $resultados->result();
	}

	public function getDepartamentos(){
		$this->db->select("ub.nombre_ubigeo,u.nombre");
		$this->db->from("ubigeo ub");
		$this->db->join("unidades u","u.departamento = ub.id_ubigeo");		
		$this->db->where("u.provincia","ub.id_ubigeo");
		$resultados = $this->db->get();
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("unidades",$data);
	}
	public function getProveedor($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("unidades");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("unidades",$data);
	}
}
