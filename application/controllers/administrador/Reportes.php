<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sanitario_registro_model");

	}	

	public function index(){
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("buscar")) {
			//$cajas = $this->Cajas_model->getCajasbyDate($fechainicio,$fechafin);
		}
		else{
			$registros = $this->Sanitario_registro_model->getRegistros();
		}
		$data = array(
			'permisos' => $this->permisos,
			"registros" => $registros,
			"fechainicio" => $fechainicio,
			"fechafin" => $fechafin,
		);


		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/reportes/list",$data);
        $this->load->view("layouts/footer");
	}
}