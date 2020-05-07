<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link_men",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}
	public function years(){
		$this->db->select("YEAR(fecha_registro) as year");
		$this->db->from("registro_mensual");
		$this->db->group_by("year");
		$this->db->order_by("year","desc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("id_men",$menu);
		$this->db->where("id_rol",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function rowCountPM(){
		$this->db->select("COUNT(id) as countpm");
		$this->db->where("estado","1");
		$this->db->where("tipo_personal","MILITAR");
		$resultados = $this->db->get("personal");
		return $resultados->row();
	}
	public function rowCountPC(){
		$this->db->select("COUNT(id) as countpc");
		$this->db->where("estado","1");
		$this->db->where("tipo_personal","CIVIL");
		$resultados = $this->db->get("personal");
		return $resultados->row();
	}

	public function registrosImcSobrepeso($year){
		$this->db->select("MONTH(fecha_registro) as mes, COUNT(clasi_imc) as cantidad, clasi_imc");
		$this->db->from("registro_mensual");
		$this->db->where("fecha_registro>=",$year."-01-01 00:00:00");
		$this->db->where("fecha_registro<=",$year."-12-31 00:00:00");
		$this->db->where("clasi_imc","SOBREPESO");
		$this->db->group_by("mes");
		$this->db->order_by("mes","asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function registrosImcNormal($year){
		$this->db->select("MONTH(fecha_registro) as mes, COUNT(clasi_imc) as cantidad, clasi_imc");
		$this->db->from("registro_mensual");
		$this->db->where("fecha_registro>=",$year."-01-01 00:00:00");
		$this->db->where("fecha_registro<=",$year."-12-31 00:00:00");
		$this->db->where("clasi_imc","NORMAL");
		$this->db->group_by("mes");
		$this->db->order_by("mes","asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function registrosImcDelgadez($year){
		$this->db->select("MONTH(fecha_registro) as mes, COUNT(clasi_imc) as cantidad, clasi_imc");
		$this->db->from("registro_mensual");
		$this->db->where("fecha_registro>=",$year."-01-01 00:00:00");
		$this->db->where("fecha_registro<=",$year."-12-31 00:00:00");
		$this->db->where("clasi_imc","DELGADEZ");
		$this->db->group_by("mes");
		$this->db->order_by("mes","asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

}