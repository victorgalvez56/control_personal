<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_registro extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Lima');
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sanitario_registro_model");
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
            'registros' => $this->Sanitario_registro_model->getRegistros(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_registro/list", $data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$data = array(
			'personals' => $this->Sanitario_registro_model->getPersonalsforRegister(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_registro/add", $data);
		$this->load->view("layouts/footer");

	}


	public function store(){
		$idPersonal= $this->input->post("idPersonal");
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-0 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$dni = $this->input->post("dni");
		$sexo = $this->input->post("sexo");
		$grupo_sang = $this->input->post("grupo_sang");
		$alergias = $this->input->post("alergias");
		$data = array(
			'fecha' => $nuevafecha,
			'personal_id' => $dni,
			'alergias' => $alergias,
			'estado' => "1",
		);
		$datapersonal = array(
			'estado_registro' => "0",
		);


		$this->Sanitario_registro_model->save($data);
		$this->Personal_model->update($idPersonal,$datapersonal);
		redirect(base_url()."control/sanitario_registro");


	}

	public function edit($id)
	{
		$data  = array(
			'sanitario' => $this->Sanitario_registro_model->getRegistro($id),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_registro/edit", $data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{

		$idRegistro = $this->input->post("idRegistro");
		$alergias = $this->input->post("alergias");
		$registroactual = $this->Sanitario_registro_model->getRegistro($idRegistro);
			$data = array(
				'alergias' => $alergias,
			);

			if ($this->Sanitario_registro_model->update($idRegistro, $data)) {
				redirect(base_url() . "control/sanitario_registro");
			} else {
				$this->session->set_flashdata("error", "No se pudo actualizar la información");
				redirect(base_url() . "control/sanitario_registro/edit/" . $idRegistro);
			}

	}

	public function delete($id)
	{	

		$data  = array(
			'estado' => "0",
		);
		$updatepersona  = array(
			'estado_registro' => "1"
		);
		$registro = $this->Sanitario_registro_model->getRegistroby($id);
		$this->Sanitario_registro_model->update($id, $data);
		$this->Personal_model->update($registro->personal_id, $updatepersona);
		redirect(base_url() . "control/sanitario_registro");
	}
}
