<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_mensual extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Lima');
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sanitario_mensual_model");
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'registros' => $this->Sanitario_mensual_model->getPersonals(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_mensual/list", $data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$data = array(
			'responsable' => $this->session->userdata("nombre"),
			'personals' => $this->Sanitario_mensual_model->getPersonalsmensual(),
		);


		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_mensual/add", $data);
		$this->load->view("layouts/footer");
	}

	public function store()
	{
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-0 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$dni = $this->input->post("dni");
		$pres_sis = $this->input->post("pres_sis");
		$pres_dia = $this->input->post("pres_dia");
		$pulso = $this->input->post("pulso");
		$valoracion = $this->input->post("valoracion");
		$medico = $this->input->post("medico");
		$peso = $this->input->post("peso");
		$imc = $this->input->post("imc");
		$perimetro = $this->input->post("perimetro");
		$clasi_imc = $this->input->post("clasi_imc");
		$clasi_peri = $this->input->post("clasi_peri");

		$data = array(
			'fecha' => $nuevafecha,
			'personal_id' => $dni,
			'pres_sis' => $pres_sis,
			'pres_dia' => $pres_dia,
			'pulso' => $pulso,
			'valoracion' => $valoracion,
			'medico' => $this->session->userdata("nombre"),
			'peso' => $peso,
			'perimetro' => $perimetro,
			'imc' => $imc,
			'clasi_imc' => $clasi_imc,
			'clasi_peri' => $clasi_peri,
			'estado' => "1",
		);
		$this->Sanitario_mensual_model->save($data);
		redirect(base_url() . "control/sanitario_mensual");
	}
	public function edit($id)
	{
		$data  = array(
			'sanitario' => $this->Sanitario_mensual_model->getRegistro($id),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_mensual/edit", $data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{

		$idRegistro = $this->input->post("idRegistro");
		$pres_sis = $this->input->post("pres_sis");
		$pres_dia = $this->input->post("pres_dia");
		$pulso = $this->input->post("pulso");
		$valoracion = $this->input->post("valoracion");
		$peso = $this->input->post("peso");
		$imc = $this->input->post("imc");
		$perimetro = $this->input->post("perimetro");
		$clasi_imc = $this->input->post("clasi_imc");
		$clasi_peri = $this->input->post("clasi_peri");

		$data = array(
			'pres_sis' => $pres_sis,
			'pres_dia' => $pres_dia,
			'pulso' => $pulso,
			'valoracion' => $valoracion,
			'peso' => $peso,
			'perimetro' => $perimetro,
			'imc' => $imc,
			'clasi_imc' => $clasi_imc,
			'clasi_peri' => $clasi_peri,
		);

		if ($this->Sanitario_mensual_model->update($idRegistro, $data)) {
			redirect(base_url() . "control/sanitario_mensual");
		} else {
			$this->session->set_flashdata("error", "No se pudo actualizar la información");
			redirect(base_url() . "control/sanitario_mensual/edit/" . $idRegistro);
		}
	}

	public function delete($id)
	{
		$data  = array(
			'estado' => "0",
		);
		$this->Sanitario_mensual_model->update($id, $data);
		redirect(base_url() . "control/sanitario_mensual");
	}
}
