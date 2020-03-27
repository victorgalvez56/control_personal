<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_mensual extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
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

	public function store(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-6 hour', strtotime($fecha)); // 6 hour en horario de verano
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
	public function view($id)
	{
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id),
		);
		$this->load->view("admin/categorias/view", $data);
	}
	public function delete($id)
	{
		$data  = array(
			'estado_cat' => "0",
		);
		$this->Categorias_model->update($id, $data);
		echo "mantenimiento/categorias";
	}
}