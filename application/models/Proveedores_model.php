<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores_model extends CI_Model {

	public function getProveedores(){
		$this->db->where("estado_prov","1");
		$resultados = $this->db->get("proveedores");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("proveedores",$data);
	}
	public function getProveedor($id){
		$this->db->where("id_prov",$id);
		$resultado = $this->db->get("proveedores");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_prov",$id);
		return $this->db->update("proveedores",$data);
	}
}
