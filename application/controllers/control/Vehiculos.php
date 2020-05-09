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
			$this->session->set_flashdata("error","Debe escoger un Propietario");
			redirect(base_url() . "control/vehiculos/add/");
		}
		else{
			$data  = array(
				'id' => $res->id_usu, 
				'nombre' => $res->nombres_usu,
				'rol' => $res->id_rol,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}

	}

	public function edit($id)
	{
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id),
		);
	
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/edit", $data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{

		$idCategoria = $this->input->post("idCategoria");
		$nombre = $this->input->post("nombre_cat");
		$descripcion = $this->input->post("descripcion_cat");

		$categoriaactual = $this->Categorias_model->getCategoria($idCategoria);

		if ($nombre == $categoriaactual->nombre_cat) {
			$is_unique = "";
		} else {
			$is_unique = "|is_unique[categorias.nombre_cat]";
		}


		$this->form_validation->put->post("descripcion_cat");

		$categoriaactual = $this->Categorias_model->getCategoria($idCategoria);

		if ($nombre == $categoriaactual->nombre_cat) {
			$is_unique = "";
		} else {
			$is_unique = "|is_unique[categorias.nombre_cat]";
		}


		$this->form_validation->set_rules("nombre_cat", "Nombre", "required" . $is_unique);
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,
			);

			if ($this->Categorias_model->update($idCategoria, $data)) {
				redirect(base_url() . "mantenimiento/categorias");
			} else {
				$this->session->set_flashdata("error", "No se pudo actualizar la informacion");
				redirect(base_url() . "mantenimiento/categorias/edit/" . $idCategoria);
			}
		} else {
			$this->edit($idCategoria);
		}
	}

	public function view(){
		$idventa = $this->input->post("id");
        
		$data = array(
			"vehiculo" => $this->Vehiculos_model->getVehiculo($idventa),
		);
		$this->load->view("admin/vehiculos/view",$data);
	}
}
