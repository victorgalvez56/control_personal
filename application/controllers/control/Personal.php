<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'personals' => $this->Personal_model->getPersonals(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/list", $data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/add");
		$this->load->view("layouts/footer");
	}

	public function addstep2($data)
	{

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/addstep2");
		$this->load->view("layouts/footer");
	}
	public function storestep1()
	{
		$grado = $this->input->post("grado_personal");
		$arma = $this->input->post("arma");
		$apellido_pat = $this->input->post("apellido_pat");
		$apellido_mat = $this->input->post("apellido_mat");
		$nombres = $this->input->post("nombres");
		$estado_civ = $this->input->post("estado_civ");
		$anios_serv = $this->input->post("anios_serv");
		$grado_inst = $this->input->post("grado_inst");
		$religion = $this->input->post("religion");
		$fec_ult_asc = $this->input->post("fec_ult_asc");
		$provin_viv = $this->input->post("provin_viv");
		$distri_viv = $this->input->post("distri_viv");
		$urbanizacion = $this->input->post("urbanizacion");
		$calle = $this->input->post("calle");
		$depart_nac = $this->input->post("depart_nac");
		$provin_nac = $this->input->post("provin_nac");
		$distri_nac = $this->input->post("distri_nac");
		$edad = $this->input->post("edad");
		$cip = $this->input->post("cip");
		$dni = $this->input->post("dni");
		$pasaporte = $this->input->post("pasaporte");
		$brevete = $this->input->post("brevete");

		$this->form_validation->set_rules("nombre_cat", "Nombre", "required|is_unique[categorias.nombre_cat]");

		if ($this->form_validation->run()) {
			$data  = array(
				'grado' => $nombre,
				'descripcion_cat' => $descripcion,
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,
				'nombre_cat' => $nombre,
				'descripcion_cat' => $descripcion,



				'estado_cat' => "1"
			);
			$this->addstep2($data);
		}else{
			redirect(base_url()."control/personal/add");
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
