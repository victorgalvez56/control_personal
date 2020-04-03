<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unidades extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Lima');
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Unidades_model");
	}


	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'unidades' => $this->Unidades_model->getUnidades(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/unidades/list", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/unidades/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		$nombre = $this->input->post("nombre");
		$departamento = $this->input->post("depart_unidad");
		$provincia = $this->input->post("provincia");
		$distrito = $this->input->post("distrito");

		$data  = array(
			'nombre' => $nombre, 
			'departamento' => $departamento,
			'provincia' => $provincia,
			'distrito' => $distrito,
			'estado' => "1"
		);

		if ($this->Unidades_model->save($data)) {
			redirect(base_url()."control/unidades");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."control/unidades/add");
		}
	}

	public function edit($id){
		$data  = array(
			'unidad' => $this->Unidades_model->getUnidad($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/unidades/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idUnidad = $this->input->post("idUnidad");
		$nombre = $this->input->post("nombre");
		$departamento = $this->input->post("departamento");
		$provincia = $this->input->post("provincia");		
		$distrito = $this->input->post("distrito");
		$data = array(
			'nombre' => $nombre, 
			'departamento' => $departamento,
			'provincia' => $provincia,
			'distrito' => $distrito,
		);

		if ($this->Unidades_model->update($idUnidad,$data)) {
			redirect(base_url()."control/unidades");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."control/unidades/edit/".$idUnidad);
		}
	}

	public function view($id){
		$data  = array(
			'unidad' => $this->Unidades_model->getUnidad($id), 
		);
		$this->load->view("admin/unidades/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Unidades_model->update($id,$data);
		echo "control/unidades";
	}
}
