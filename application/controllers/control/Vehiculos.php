<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehiculos extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Lima');
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Vehiculos_model");
		$this->load->model("Personal_model");
	}


	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'vehiculos' => $this->Vehiculos_model->getVehiculos(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/vehiculos/list", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{
		$data = array(
			"personales" => $this->Vehiculos_model->getPersonals()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/vehiculos/add", $data);
		$this->load->view("layouts/footer");
	}

	public function store()
	{
		$idpersonal = $this->input->post("idPersonalV");
		$placa = $this->input->post("placa");
		$vin = $this->input->post("vin");
		$serie = $this->input->post("serie");
		$motor = $this->input->post("motor");
		$color = $this->input->post("color");
		$marca = $this->input->post("marca");
		$modelo = $this->input->post("modelo");
		$placa_vig = $this->input->post("placa_vig");
		$placa_ant = $this->input->post("placa_ant");
		$anotaciones = $this->input->post("anotaciones");



		$data  = array(
			'personal_id' => $idpersonal,
			'n_placa' => $placa,
			'n_serie' => $serie,
			'n_vin' => $vin,
			'n_motor' => $motor,
			'n_color' => $color,
			'marca' => $marca,
			'modelo' => $modelo,
			'placa_vigente' => $placa_vig,
			'placa_anterior' => $placa_ant,
			'anotaciones' => $anotaciones,
			'sede' => 'AREQUIPA',
			'estado' => "1"
		);

		if (!$this->Vehiculos_model->save($data)) {
			$this->session->set_flashdata("error", "Debe escoger un Propietario");
			redirect(base_url() . "control/vehiculos/add/");
		} else {
			redirect(base_url() . "control/vehiculos/");
		}
	}

	public function edit($id)
	{
		$data  = array(
			'vehiculo' => $this->Vehiculos_model->getVehiculo($id),
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/vehiculos/edit", $data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{

		$idVehiculo = $this->input->post("idVehiculo");

		$placa = $this->input->post("placa");
		$vin = $this->input->post("vin");
		$serie = $this->input->post("serie");
		$motor = $this->input->post("motor");
		$color = $this->input->post("color");
		$marca = $this->input->post("marca");
		$modelo = $this->input->post("modelo");
		$placa_vig = $this->input->post("placa_vig");
		$placa_ant = $this->input->post("placa_ant");
		$anotaciones = $this->input->post("anotaciones");
		$data  = array(
			'n_placa' => $placa,
			'n_serie' => $serie,
			'n_vin' => $vin,
			'n_motor' => $motor,
			'n_color' => $color,
			'marca' => $marca,
			'modelo' => $modelo,
			'placa_vigente' => $placa_vig,
			'placa_anterior' => $placa_ant,
			'anotaciones' => $anotaciones,
		);
		if ($this->Vehiculos_model->update($idVehiculo, $data)) {
			
			redirect(base_url() . "control/vehiculos");
		} else {
			$this->session->set_flashdata("error", "No se pudo actualizar la información");
			redirect(base_url() . "control/vehiculos".$idVehiculo);

		}
	}

	public function view()
	{
		$idventa = $this->input->post("id");

		$data = array(
			"vehiculo" => $this->Vehiculos_model->getVehiculo($idventa),
		);
		$this->load->view("admin/vehiculos/view", $data);
	}



	public function delete($id)
	{
		$data = array(
			'estado' => '0',
		);
		if ($this->Vehiculos_model->update($id, $data)) {
			echo "control/vehiculos";
		} else {
			$this->session->set_flashdata("error", "No se pudo actualizar la informacion");
			redirect(base_url() . "control/vehiculos/add" . $id);
		}
	}
}
