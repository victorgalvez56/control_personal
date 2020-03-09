<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanitario_registro extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Sanitario_registro_model");
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_registro/list", $data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$data = array(
			'registros' => $this->Sanitario_registro_model->getPersonals(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sanitario_registro/add", $data);
		$this->load->view("layouts/footer");
		echo json_encode($data);

	}


	public function store(){
		$fecha = date("d-m-Y H:i:s");
		$nuevafecha = strtotime('-6 hour', strtotime($fecha)); // 6 hour en horario de verano
		$nuevafecha = date('Y-m-d H:i:s', $nuevafecha);
		$dni = $this->input->post("dni");
		$sexo = $this->input->post("sexo");
		$grupo_sang = $this->input->post("grupo_sang");
		$alergias = $this->input->post("alergias");
		$data = array(
			'fecha' => $nuevafecha,
			'personal_id' => $dni,
			'sexo' => $sexo,
			'grupo_sang' => $grupo_sang,
			'alergias' => $alergias,
			'estado' => "1",
		);
		$datapersonal = array(
			'estado_registro' => "1",
		);


		$this->Sanitario_registro_model->save($data);
		$this->Personal_model->update($dni,$datapersonal);

		redirect(base_url()."control/sanitario_registro");


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
