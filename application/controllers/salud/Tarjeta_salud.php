<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarjeta_salud extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		date_default_timezone_set('America/Lima');
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sanitario_registro_model");
		$this->load->model("Sanitario_anual_model");
		$this->load->model("Sanitario_mensual_model");
		$this->load->model("Personal_model");

	}
	public function index()
	{
		$idUsuario = $this->session->userdata("dni");
		$data  = array(
			'permisos' => $this->permisos,
			'disablebutton' => $this->session->userdata("rol"),
			'personal' => $this->Personal_model->getPersonalforTarjet($idUsuario),
			'sanitario_registro' => $this->Sanitario_registro_model->getforTarjetaSalud($idUsuario),
			'sanitario_anual' => $this->Sanitario_anual_model->getforTarjetaSalud($idUsuario),
			'sanitario_mensual' => $this->Sanitario_mensual_model->getforTarjetaSalud($idUsuario),
		);
		$this->load->view("layouts/header");
		$this->load->view("admin/tarjeta/salud", $data);
		$this->load->view("layouts/footer");
	}
}
