<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarjeta_identidad extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		date_default_timezone_set('America/Lima');
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'personals' => $this->Personal_model->getPersonalTarjeta(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tarjeta/list", $data);
		$this->load->view("layouts/footer");
	}


	public function view()
	{
		$idpersonal = $this->input->post("id");
		$data = array(
			"personals" => $this->Personal_model->getPersonal($idpersonal),
		);
		$this->load->view("admin/tarjeta/view", $data);
	}
}
