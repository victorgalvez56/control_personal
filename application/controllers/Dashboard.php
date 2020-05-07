<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	public function index()
	{
		$data = array(
			'years' => $this->Backend_model->years(),
			"cantPersonalMilitar" => $this->Backend_model->rowCountPM(),
			"cantPersonalCivil" => $this->Backend_model->rowCountPC(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");
	}
	public function getData(){
		$year = $this->input->post("year");
		$resultadoSobrepeso = $this->Backend_model->registrosImcSobrepeso($year);
		$resultadoNormal = $this->Backend_model->registrosImcNormal($year);
		$resultadoDelgadez = $this->Backend_model->registrosImcDelgadez($year);
		echo json_encode(array_merge($resultadoSobrepeso,$resultadoNormal, $resultadoDelgadez ));
	
	}

}
