<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link_men",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("id_men",$menu);
		$this->db->where("id_rol",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

}