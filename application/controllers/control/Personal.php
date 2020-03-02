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

	public function addstep2()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/addstep2");
		$this->load->view("layouts/footer");
	}
	public function storestep1()
	{
		$imagen = $this->input->post("imagen");
		$grado = $this->input->post("grado");
		$arma = $this->input->post("arma");
		$apellido_pat = $this->input->post("apellido_pat");
		$apellido_mat = $this->input->post("apellido_mat");
		$nombres = $this->input->post("nombres");
		$estado_civ = $this->input->post("estado_civ");
		$anios_serv = $this->input->post("anios_serv");
		$grado_instr = $this->input->post("grado_instr");
		$religion = $this->input->post("religion");
		$fec_ult_asc = $this->input->post("fec_ult_asc");
		$sexo = $this->input->post("sexo");

		$depart_viv = $this->input->post("provin_viv");
		$provinc_viv = $this->input->post("provin_viv");
		$distrito_viv = $this->input->post("distri_viv");
		$urbaniz_viv = $this->input->post("urbanizacion");
		$calle_viv = $this->input->post("calle");

		$depart_nac = $this->input->post("depart_nac");
		$provinc_nac = $this->input->post("provin_nac");
		$distrito_nac = $this->input->post("distri_nac");
		$fecha_nac = $this->input->post("distri_nac");
		$edad = $this->input->post("calle");

		$cip = $this->input->post("cip");
		$dni = $this->input->post("dni");
		$pasaporte = $this->input->post("pasaporte");
		$brevete = $this->input->post("brevete");
		
		$camisa = $this->input->post("camisa");
		$pantalon = $this->input->post("pantalon");
		$calzado = $this->input->post("calzado");
		$cabeza = $this->input->post("cabeza");

		$banco = $this->input->post("banco");
		$nro_cuenta = $this->input->post("nro_cuenta");
		$afiliacion = $this->input->post("afiliacion");

		$ididiomas = $this->input->post("ididiomas");
		$idioma = $this->input->post("idioma");
		$idioma_habla = $this->input->post("idioma_habla");
		$idioma_lee = $this->input->post("idioma_lee");
		$idioma_escribe = $this->input->post("idioma_escribe");
		$idioma_estudio = $this->input->post("idioma_estudio");
		$idioma_practica = $this->input->post("idioma_practica");

		$data  = array(
			'imagen' => $imagen,
			'grado' => $grado,
			'arma' => $arma,
			'apellido_pat' => $apellido_pat,
			'apellido_mat' => $apellido_mat,
			'nombres' => $nombres,
			'estado_civ' => $estado_civ,
			'anios_serv' => $anios_serv,
			'grado_instruc' => $grado_instr,
			'religion' => $religion,
			'fec_ultimo_asc' => $fec_ult_asc,
			'sexo' => $sexo,

			'depart_viv' => $depart_viv,
			'provinc_viv' => $provinc_viv,
			'distrito_viv' => $distrito_viv,
			'urbaniz_viv' => $urbaniz_viv,
			'calle_viv' => $calle_viv,

			'depart_nac' => $depart_nac,
			'provinc_nac' => $provinc_nac,
			'distrito_nac' => $distrito_nac,
			'fecha_nac' => $fecha_nac,
			'edad' => $edad,

			'cip' => $cip,
			'dni' => $dni,
			'pasaporte' => $pasaporte,
			'brevete' => $brevete,

			'talla_camisa' => $camisa,
			'talla_pantalon' => $pantalon,
			'talla_calzado' => $calzado,
			'talla_prenda' => $cabeza,

			'banco' => $banco,
			'nro_cuenta' => $nro_cuenta,
			'afiliacion' => $afiliacion,

			'estado' => '1',


		);
		$this->addstep2();

		if ($this->Personal_model->save($data)) {
			$idpersonal = $this->Personal_model->lastID();
			$this->save_detalle_idioma($idpersonal, $idioma, $idioma_habla, $idioma_lee, $idioma_escribe, $idioma_estudio, $idioma_practica);
			redirect(base_url() . "control/personal");
		} else {
			redirect(base_url() . "movimientos/ventas/add");
		}
	}

	protected function save_detalle_idioma($personal, $idioma, $idioma_habla, $idioma_lee, $idioma_escribe, $idioma_estudio, $idioma_practica)
	{
		for ($i = 0; $i < count($idioma); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $personal,
				'idioma' => $idioma[$i],
				'habla' => $idioma_habla[$i],
				'lee' => $idioma_lee[$i],
				'escribe' => $idioma_escribe[$i],
				'adquirido' => $idioma_estudio[$i],
				'graduado' => $idioma_practica[$i],
			);

			$this->Personal_model->save_detalle_idioma($data);
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
