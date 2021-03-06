<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitario_anual_model extends CI_Model {

	public function getPersonals(){
		$this->db->select("p.*,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_anual r","r.personal_id = p.id");	
		$this->db->where("r.estado","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getPersonalsanual()
	{
		$this->db->where("estado", "1");
		$resultados = $this->db->get("personal");
		return $resultados->result();
	}
	public function save($data){
		return $this->db->insert("registro_anual",$data);
	}
	public function getRegistro($id){
		$this->db->select("p.dni,p.nombres,p.apellido_pat,p.apellido_mat,p.fecha_nac,p.talla,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_anual r","r.personal_id = p.id");	
		$this->db->where("r.id",$id);
		$resultado = $this->db->get("registro_anual");
		return $resultado->row();

	}
	public function save_detalle_idioma($data){
		$this->db->insert("detalle_idioma",$data);
	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("registro_anual",$data);
	}
	public function lastID(){
		return $this->db->insert_id();
	}

	public function getforTarjetaSalud($id){
		$this->db->select("MAX(r.fecha) as fecha,r.*");
		$this->db->from("personal p");
		$this->db->join("registro_anual r","p.id = r.personal_id");	
		$this->db->where("p.dni",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
}
