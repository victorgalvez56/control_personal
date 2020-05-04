<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal extends CI_Controller
{

	private $permisos;
	public function __construct()
	{
		date_default_timezone_set('America/Lima');
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
		$this->load->model("Personal_model");
	}
	public function index()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'personals' => $this->Personal_model->getPersonalMilitar(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/list", $data);
		$this->load->view("layouts/footer");
	}

	public function civil()
	{
		$data  = array(
			'permisos' => $this->permisos,
			'personals' => $this->Personal_model->getPersonalCivil(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/civil", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/add");
		$this->load->view("layouts/footer");
	}

	public function addCivil()
	{

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/personal/addcivil");
		$this->load->view("layouts/footer");
	}

	public function storeCivil()
	{
		$mi_imagen = 'upload';
		$config['upload_path'] = "uploads/";
		$config['file_name'] = "nombre_archivo";
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($mi_imagen)) {

			$data['uploadSuccess'] = $this->upload->data();
			$data = array("upload_data" => $this->upload->data());

			$grado = strtoupper($this->input->post("grado"));
			$arma = strtoupper($this->input->post("arma"));
			$apellido_pat = strtoupper($this->input->post("apellido_pat"));
			$apellido_mat = strtoupper($this->input->post("apellido_mat"));
			$nombres = strtoupper($this->input->post("nombres"));
			$estado_civ = strtoupper($this->input->post("estado_civ"));
			$a_servicio = strtoupper($this->input->post("a_servicio"));
			$grado_ins_per = strtoupper($this->input->post("grado_ins_per"));
			$religion = strtoupper($this->input->post("religion"));
			$fec_ult_asc = strtoupper($this->input->post("fec_ult_asc"));

			$depart_viv = strtoupper($this->input->post("depart_viv"));
			$provinc_viv = strtoupper($this->input->post("provin_viv"));
			$distrito_viv = strtoupper($this->input->post("distri_viv"));
			$urbaniz_viv = strtoupper($this->input->post("urbanizacion"));
			$calle_viv = strtoupper($this->input->post("calle"));

			$depart_nac = strtoupper($this->input->post("depart_nac"));
			$provinc_nac = strtoupper($this->input->post("provin_nac"));
			$distrito_nac = strtoupper($this->input->post("distri_nac"));
			$fecha_nac = $this->input->post("fecha_nacper");

			$cip = strtoupper($this->input->post("cip_per"));
			$dni = strtoupper($this->input->post("dni_per"));
			$pasaporte = strtoupper($this->input->post("pasaporte"));
			$brevete = strtoupper($this->input->post("brevete"));

			$talla = strtoupper($this->input->post("talla"));
			$peso = strtoupper($this->input->post("peso"));
			$grupo_sang = strtoupper($this->input->post("grupo_sang"));
			$sexo = strtoupper($this->input->post("sexo"));


			$camisa = strtoupper($this->input->post("camisa"));
			$pantalon = strtoupper($this->input->post("pantalon"));
			$calzado = strtoupper($this->input->post("calzado"));
			$cabeza = strtoupper($this->input->post("cabeza"));

			$banco = strtoupper($this->input->post("banco"));
			$nro_cuenta = strtoupper($this->input->post("nro_cuenta"));
			$afiliacion = strtoupper($this->input->post("afiliacion"));

			/* Temporal*/
			$telefono = strtoupper($this->input->post("telef_per"));
			$operador = strtoupper($this->input->post("operador"));
			$correo = strtoupper($this->input->post("correo"));

			$ididiomas = $this->input->post("ididiomas");
			$idioma = $this->input->post("idioma");
			$idioma_habla = $this->input->post("idioma_habla");
			$idioma_lee = $this->input->post("idioma_lee");
			$idioma_escribe = $this->input->post("idioma_escribe");
			$idioma_estudio = $this->input->post("idioma_estudio");
			$idioma_practica = $this->input->post("idioma_practica");
			
	
			$nombresfamiliar = $this->input->post("nombresfamiliar");
			$parentesco_fam = $this->input->post("parentesco");
			$edad_fam = $this->input->post("edad");
			$lugar_nac_fam = $this->input->post("lugar_nac");
			$fecha_nac_fam = $this->input->post("fecha_nac");
			$cip_fam = $this->input->post("cip");
			$dni_fam = $this->input->post("dni");
			$telef_fam = $this->input->post("telefono");
			$grup_sang_fam = $this->input->post("tipo_sangr");
			$grad_inst_fam = $this->input->post("grado_instr");
	

			$lugar = $this->input->post("lugar");
			$motivo = $this->input->post("motivo");
			$fecha_viaje = $this->input->post("fecha_viaje");

			$seguro = $this->input->post("seguro");
			$tipo_seguro = $this->input->post("tipo_seguro");


			$curso = $this->input->post("curso");
			$tipo_curso = $this->input->post("tipo_curso");


			$data  = array(
				'imagen' => $data['upload_data']['file_name'],
				'grado' => $grado,
				'arma' => $arma,
				'apellido_pat' => $apellido_pat,
				'apellido_mat' => $apellido_mat,
				'nombres' => $nombres,
				'estado_civ' => $estado_civ,
				'anios_serv' => $a_servicio,
				'grado_instruc' => $grado_ins_per,
				'religion' => $religion,
				'fec_ultimo_asc' => $fec_ult_asc,

				'telefono' => $telefono,
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

				'cip' => $cip,
				'dni' => $dni,
				'pasaporte' => $pasaporte,
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
				'tipo_personal' => 'CIVIL',

				'estado' => '1',
				'estado_registro' => '1',
			);

			if ($this->Personal_model->save($data)) {
				$idpersonal = $this->Personal_model->lastID();
				$this->save_detalle_familiar($idpersonal, $nombresfamiliar, $parentesco_fam, $edad_fam, $lugar_nac_fam, $fecha_nac_fam, $cip_fam, $dni_fam, $telef_fam, $grup_sang_fam, $grad_inst_fam);
				$this->save_detalle_idioma($idpersonal, $idioma, $idioma_habla, $idioma_lee, $idioma_escribe, $idioma_estudio, $idioma_practica);
				$this->save_detalle_viaje($idpersonal, $lugar, $motivo, $fecha_viaje);
				$this->save_detalle_seguro($idpersonal, $seguro, $tipo_seguro);
				$this->save_detalle_estudio($idpersonal, $curso, $tipo_curso);
				redirect(base_url() . "control/personal/civil");
			} else {
				redirect(base_url() . "control/personal/civil");
			}
		} else {
			$data['uploadError'] = $this->upload->display_errors();
			$mensaje = $this->upload->display_errors();
			echo $mensaje;
			return;
		}
	}





	public function store()
	{
		$mi_imagen = 'upload';
		$config['upload_path'] = "uploads/";
		$config['file_name'] = "nombre_archivo";
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$this->load->library('upload', $config);

		if ($this->upload->do_upload($mi_imagen)) {

			$data['uploadSuccess'] = $this->upload->data();
			$data = array("upload_data" => $this->upload->data());

			$grado = strtoupper($this->input->post("grado"));
			$arma = strtoupper($this->input->post("arma"));
			$apellido_pat = strtoupper($this->input->post("apellido_pat"));
			$apellido_mat = strtoupper($this->input->post("apellido_mat"));
			$nombres = strtoupper($this->input->post("nombres"));
			$estado_civ = strtoupper($this->input->post("estado_civ"));
			$a_servicio = strtoupper($this->input->post("a_servicio"));
			$grado_ins_per = strtoupper($this->input->post("grado_ins_per"));
			$religion = strtoupper($this->input->post("religion"));
			$fec_ult_asc = strtoupper($this->input->post("fec_ult_asc"));

			$depart_viv = strtoupper($this->input->post("depart_viv"));
			$provinc_viv = strtoupper($this->input->post("provin_viv"));
			$distrito_viv = strtoupper($this->input->post("distri_viv"));
			$urbaniz_viv = strtoupper($this->input->post("urbanizacion"));
			$calle_viv = strtoupper($this->input->post("calle"));

			$depart_nac = strtoupper($this->input->post("depart_nac"));
			$provinc_nac = strtoupper($this->input->post("provin_nac"));
			$distrito_nac = strtoupper($this->input->post("distri_nac"));
			$fecha_nac = $this->input->post("fecha_nacper");

			$cip = strtoupper($this->input->post("cip_per"));
			$dni = strtoupper($this->input->post("dni_per"));
			$pasaporte = strtoupper($this->input->post("pasaporte"));
			$brevete = strtoupper($this->input->post("brevete"));

			$talla = strtoupper($this->input->post("talla"));
			$peso = strtoupper($this->input->post("peso"));
			$grupo_sang = strtoupper($this->input->post("grupo_sang"));
			$sexo = strtoupper($this->input->post("sexo"));


			$camisa = strtoupper($this->input->post("camisa"));
			$pantalon = strtoupper($this->input->post("pantalon"));
			$calzado = strtoupper($this->input->post("calzado"));
			$cabeza = strtoupper($this->input->post("cabeza"));

			$banco = strtoupper($this->input->post("banco"));
			$nro_cuenta = strtoupper($this->input->post("nro_cuenta"));
			$afiliacion = strtoupper($this->input->post("afiliacion"));

			/* Temporal*/
			$telefono = strtoupper($this->input->post("telef_per"));
			$operador = strtoupper($this->input->post("operador"));
			$correo = strtoupper($this->input->post("correo"));

			$ididiomas = $this->input->post("ididiomas");
			$idioma = $this->input->post("idioma");
			$idioma_habla = $this->input->post("idioma_habla");
			$idioma_lee = $this->input->post("idioma_lee");
			$idioma_escribe = $this->input->post("idioma_escribe");
			$idioma_estudio = $this->input->post("idioma_estudio");
			$idioma_practica = $this->input->post("idioma_practica");
			
	
			$nombresfamiliar = $this->input->post("nombresfamiliar");
			$parentesco_fam = $this->input->post("parentesco");
			$edad_fam = $this->input->post("edad");
			$lugar_nac_fam = $this->input->post("lugar_nac");
			$fecha_nac_fam = $this->input->post("fecha_nac");
			$cip_fam = $this->input->post("cip");
			$dni_fam = $this->input->post("dni");
			$telef_fam = $this->input->post("telefono");
			$grup_sang_fam = $this->input->post("tipo_sangr");
			$grad_inst_fam = $this->input->post("grado_instr");
	

			$lugar = $this->input->post("lugar");
			$motivo = $this->input->post("motivo");
			$fecha_viaje = $this->input->post("fecha_viaje");

			$seguro = $this->input->post("seguro");
			$tipo_seguro = $this->input->post("tipo_seguro");


			$curso = $this->input->post("curso");
			$tipo_curso = $this->input->post("tipo_curso");


			$data  = array(
				'imagen' => $data['upload_data']['file_name'],
				'grado' => $grado,
				'arma' => $arma,
				'apellido_pat' => $apellido_pat,
				'apellido_mat' => $apellido_mat,
				'nombres' => $nombres,
				'estado_civ' => $estado_civ,
				'anios_serv' => $a_servicio,
				'grado_instruc' => $grado_ins_per,
				'religion' => $religion,
				'fec_ultimo_asc' => $fec_ult_asc,

				'telefono' => $telefono,
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

				'cip' => $cip,
				'dni' => $dni,
				'pasaporte' => $pasaporte,
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
				'afiliacion' => 'CIVIL',

				'estado' => '1',
				'estado_registro' => '1',
			);

			if ($this->Personal_model->save($data)) {
				$idpersonal = $this->Personal_model->lastID();
				$this->save_detalle_familiar($idpersonal, $nombresfamiliar, $parentesco_fam, $edad_fam, $lugar_nac_fam, $fecha_nac_fam, $cip_fam, $dni_fam, $telef_fam, $grup_sang_fam, $grad_inst_fam);
				$this->save_detalle_idioma($idpersonal, $idioma, $idioma_habla, $idioma_lee, $idioma_escribe, $idioma_estudio, $idioma_practica);
				$this->save_detalle_viaje($idpersonal, $lugar, $motivo, $fecha_viaje);
				$this->save_detalle_seguro($idpersonal, $seguro, $tipo_seguro);
				$this->save_detalle_estudio($idpersonal, $curso, $tipo_curso);
				redirect(base_url() . "control/personal");
			} else {
				redirect(base_url() . "control/sanitario_mensual");
			}
		} else {
			$data['uploadError'] = $this->upload->display_errors();
			$mensaje = $this->upload->display_errors();
			echo $mensaje;
			return;
		}
	}


	protected function save_detalle_seguro($idpersonal, $seguro, $tipo_seguro)
	{
		for ($i = 0; $i < count($seguro); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $idpersonal,
				'seguro' => strtoupper($seguro[$i]),
				'tipo_seguro' => strtoupper($tipo_seguro[$i]),
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
				'curso' => strtoupper($curso[$i]),
				'tipo_curso' => strtoupper($tipo_curso[$i]),
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

	protected function save_detalle_familiar($personal, $nombresfamiliar, $parentesco_fam, $edad_fam, $lugar_nac_fam, $fecha_nac_fam, $cip_fam, $dni_fam, $telef_fam, $grup_sang_fam, $grad_inst_fam)
	{

		for ($i = 0; $i < count($nombresfamiliar); $i++) {
			$data  = array(
				'id' => '',
				'personal_id' => $personal,
				'nombre_fam' => $nombresfamiliar[$i],
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



	public function view()
	{
		$idpersonal = $this->input->post("id");
		$data = array(
			"personals" => $this->Personal_model->getPersonal($idpersonal),
			"detalleFamiliar" => $this->Personal_model->getDetalleFamiliar($idpersonal),
			"detalleIdioma" => $this->Personal_model->getDetalleIdioma($idpersonal),
			"detalleViaje" => $this->Personal_model->getDetalleViaje($idpersonal),
			"detalleSeguro" => $this->Personal_model->getDetalleSeguro($idpersonal),
			"detalleEstudio" => $this->Personal_model->getDetalleEstudios($idpersonal),

		);
		$this->load->view("admin/personal/view", $data);
	}
}
