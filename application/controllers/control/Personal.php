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
	public function store()
	{


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

		$talla = $this->input->post("talla");
		$peso = $this->input->post("peso");
		$grupo_sang = $this->input->post("grupo_sang");
		$sexo = $this->input->post("sexo");


		$camisa = $this->input->post("camisa");
		$pantalon = $this->input->post("pantalon");
		$calzado = $this->input->post("calzado");
		$cabeza = $this->input->post("cabeza");

		$banco = $this->input->post("banco");
		$nro_cuenta = $this->input->post("nro_cuenta");
		$afiliacion = $this->input->post("afiliacion");

		/* Temporal*/
		$telefono = $this->input->post("telefono");
		$operador = $this->input->post("operador");
		$correo = $this->input->post("correo");

		$ididiomas = $this->input->post("ididiomas");
		$idioma = $this->input->post("idioma");
		$idioma_habla = $this->input->post("idioma_habla");
		$idioma_lee = $this->input->post("idioma_lee");
		$idioma_escribe = $this->input->post("idioma_escribe");
		$idioma_estudio = $this->input->post("idioma_estudio");
		$idioma_practica = $this->input->post("idioma_practica");
		/*

		$nombre_fam = $this->input->post("nombre_fam");
		$parentesco_fam = $this->input->post("parentesco_fam");
		$edad_fam = $this->input->post("edad_fam");
		$lugar_nac_fam = $this->input->post("lugar_nac_fam");
		$fecha_nac_fam = $this->input->post("fecha_nac_fam");
		$cip_fam = $this->input->post("cip_fam");
		$dni_fam = $this->input->post("dni_fam");
		$telef_fam = $this->input->post("telef_fam");
		$grup_sang_fam = $this->input->post("grup_sang_fam");
		$grad_inst_fam = $this->input->post("grad_inst_fam");

*/
		$lugar = $this->input->post("lugar");
		$motivo = $this->input->post("motivo");
		$fecha_viaje = $this->input->post("fecha_viaje");

		$seguro = $this->input->post("seguro");
		$tipo_seguro = $this->input->post("tipo_seguro");


		$curso = $this->input->post("curso");
		$tipo_curso = $this->input->post("tipo_curso");


		$data  = array(
			'grado' => $grado,
			'arma' => $arma,
			'apellido_pat' => $apellido_pat,
			'apellido_mat' => $apellido_mat,
			'nombres' => 'NOMBRE...',
			'estado_civ' => $estado_civ,
			'anios_serv' => $anios_serv,
			'grado_instruc' => 'PRIMARIA',
			'religion' => $religion,
			'fec_ultimo_asc' => $fec_ult_asc,

			'telefono' => '958560996',
			'operador' => $operador,
			'correo' => $correo,

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

			'cip' => '115955050',
			'dni' => '77127600',
			'pasaporte' => 'ASDASD111',
			'brevete' => $brevete,


			'talla' => $talla,
			'peso' => $peso,
			'grupo_sang' => $grupo_sang,
			'sexo' => $sexo,


			'talla_camisa' => $camisa,
			'talla_pantalon' => $pantalon,
			'talla_calzado' => $calzado,
			'talla_prenda' => $cabeza,

			'banco' => $banco,
			'nro_cuenta' => $nro_cuenta,
			'afiliacion' => $afiliacion,

			'estado' => '1',


		);

		if ($this->Personal_model->save($data)) {
			$idpersonal = $this->Personal_model->lastID();
			//$this->save_detalle_familiar($idpersonal, $nombre_fam, $parentesco_fam, $edad_fam, $lugar_nac_fam, $fecha_nac_fam, $cip_fam, $dni_fam, $telef_fam, $grup_sang_fam, $grad_inst_fam);
			$this->save_detalle_idioma($idpersonal, $idioma, $idioma_habla, $idioma_lee, $idioma_escribe, $idioma_estudio, $idioma_practica);
			$this->save_detalle_viaje($idpersonal, $lugar, $motivo, $fecha_viaje);


			$this->save_detalle_seguro($idpersonal, $seguro, $tipo_seguro);
			$this->save_detalle_estudio($idpersonal, $curso, $tipo_curso);


			redirect(base_url() . "control/personal");
		} else {
			echo "no funcionòs";
		}
	}


	protected function save_detalle_seguro($idpersonal, $seguro, $tipo_seguro)
	{
		for ($i = 0; $i < count($seguro); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $idpersonal,
				'seguro' => $seguro[$i],
				'tipo_seguro' => $tipo_seguro[$i],
				'estado' => '1',

			);
			$this->Personal_model->save_detalle_seguro($data);
		}
	}

	protected function save_detalle_estudio($idpersonal, $curso, $tipo_curso)
	{
		for ($i = 0; $i < count($curso); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $idpersonal,
				'curso' => $curso[$i],
				'tipo_curso' => $tipo_curso[$i],
				'estado' => '1',

			);
			$this->Personal_model->save_detalle_curso($data);
		}
	}

	protected function save_detalle_viaje($idpersonal, $lugar, $motivo, $fecha_viaje)
	{
		for ($i = 0; $i < count($lugar); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $idpersonal,
				'lugar' => $lugar[$i],
				'motivo' => $motivo[$i],
				'fecha' => $fecha_viaje[$i],
				'estado' => '1',

			);
			$this->Personal_model->save_detalle_viaje($data);
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

	protected function save_detalle_familiar($personal, $nombre_fam, $parentesco_fam, $edad_fam, $lugar_nac_fam, $fecha_nac_fam, $cip_fam, $dni_fam, $telef_fam, $grup_sang_fam, $grad_inst_fam)
	{

		for ($i = 0; $i < count($nombre_fam); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $personal,
				'nombre_fam' => $nombre_fam[$i],
				'parentesco_fam' => $parentesco_fam[$i],
				'edad_fam' => $edad_fam[$i],
				'lugar_nac_fam' => $lugar_nac_fam[$i],
				'fecha_nac_fam' => $fecha_nac_fam[$i],
				'cip_fam' => $cip_fam[$i],
				'dni_fam' => $dni_fam[$i],
				'telef_fam' => $telef_fam[$i],
				'grup_sang_fam' => $grup_sang_fam[$i],
				'grad_inst_fam' => $grad_inst_fam[$i],
			);

			$this->Personal_model->save_detalle_familiar($data);
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
	public function delete($id)
	{
		$data  = array(
			'estado_cat' => "0",
		);
		$this->Categorias_model->update($id, $data);
		echo "mantenimiento/categorias";
	}
    
    
    
    	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"personals" => $this->Personal_model->getPersonals(),
		);
		$this->load->view("admin/personal/view",$data);
	}
    
}
