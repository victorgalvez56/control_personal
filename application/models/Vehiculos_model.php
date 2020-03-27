<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos_model extends CI_Model {

	public function getVehiculos(){
		$this->db->select("p.nombres,p.apellido_pat,v.*");
		$this->db->from("vehiculos v");
		$this->db->join("personal p", "v.personal_id = p.id");
		$this->db->where("v.estado", "1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("vehiculos",$data);
	}

	public function getVehiculo($id){
		$this->db->select("*");
		$this->db->from("vehiculos");
		$this->db->where("id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("id_cat",$id);
		return $this->db->update("categorias",$data);
	}
}
