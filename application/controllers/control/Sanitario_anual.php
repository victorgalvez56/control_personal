<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_anual extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Lima');
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sanitario_registro_model");
		$this->load->model("Sanitario_anual_model");
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'registros' => $this->Sanitario_anual_model->getPersonals(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_anual/list", $data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$data = array(
			'personals' => $this->Sanitario_anual_model->getPersonalsanual(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_anual/add", $data);
		$this->load->view("layouts/footer");
	}


	public function store(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-0 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$dni = $this->input->post("dni");
		$presion = $this->input->post("presion");
		$medicacion = $this->input->post("medicacion");
		$edad = $this->input->post("edad");
		$talla = $this->input->post("talla");
		$peso = $this->input->post("peso");
		$perimetro = $this->input->post("perimetro");
		$data = array(
			'fecha' => $nuevafecha,
			'personal_id' => $dni,
			'presion' => $presion,
			'medicina' => $medicacion,
			'edad' => $edad,
			'talla' => $talla,
			'peso' => $peso,
			'peri_abdominal' => $perimetro,
			'estado' => "1",
		);
		$this->Sanitario_anual_model->save($data);
		redirect(base_url()."control/sanitario_anual");
	}
	public function edit($id)
	{
		$data  = array(
			'sanitario' => $this->Sanitario_anual_model->getRegistro($id),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_anual/edit", $data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{

		$idRegistro = $this->input->post("idRegistro");
		$presion = $this->input->post("presion");
		$medicacion = $this->input->post("medicacion");
		$edad = $this->input->post("edad");
		$talla = $this->input->post("talla");
		$peso = $this->input->post("peso");
		$perimetro = $this->input->post("perimetro");

		$data = array(
			'presion' => $presion,
			'medicina' => $medicacion,
			'edad' => $edad,
			'talla' => $talla,
			'peso' => $peso,
			'peri_abdominal' => $perimetro,
		);

		if ($this->Sanitario_anual_model->update($idRegistro, $data)) {
			redirect(base_url() . "control/sanitario_anual");
		} else {
			$this->session->set_flashdata("error", "No se pudo actualizar la información");
			redirect(base_url() . "control/sanitario_anual/edit/" . $idRegistro);
		}
	}

	public function delete($id)
	{
		$data  = array(
			'estado' => "0",
		);
		$this->Sanitario_anual_model->update($id, $data);
		redirect(base_url() . "control/sanitario_anual");
	}
}
