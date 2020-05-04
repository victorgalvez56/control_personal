<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($this->session->flashdata("error")) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url(); ?>control/personal/storeCivil" method="POST" enctype="multipart/form-data">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Datos Personales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Dirección Actual</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contacto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_born_details" style="border:1px solid #ccc">Lugar y Fecha de Nacimiento</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_documents_details" style="border:1px solid #ccc">Documentos Personales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_caracters_details" style="border:1px solid #ccc">Características Físicas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_clothes_details" style="border:1px solid #ccc">Talla de Ropa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_remuneration_details" style="border:1px solid #ccc">Remuneración</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_langtripssttudies_details" style="border:1px solid #ccc">Idiomas, Viajes y Estudios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_securfam_details" style="border:1px solid #ccc">Familiares y Seguros</a>
                                </li>
                            </ul>
                            <div class="tab-content" style="margin-top:16px;">
                                <div class="tab-pane active" id="login_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalles Personales</div>
                                        <div class="firstStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="imagen">Foto Personal:</label>
                                                        <span class="btn btn-default btn-file">
                                                            Subir Foto <input type="file" name="upload" required>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grado">Grado:</label>
                                                        <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="CSAE">CSAE</option>
                                                            <option value="CSPC">CSPC</option>
                                                            <option value="CSPF">CSPF</option>
                                                            <option value="CSTA">CSTA</option>
                                                            <option value="CSTF">CSTF</option>
                                                            <option value="DC23">DC23</option>
                                                            <option value="F-3">F-3</option>
                                                            <option value="I-30">I-30</option>
                                                            <option value="II-30">II-30</option>
                                                            <option value="OPS-V">OPS-V</option>
                                                            <option value="OPS-VI">OPS-VI</option>
                                                            <option value="OPS-VII">OPS-VII</option>
                                                            <option value="OPS-V">OPS-V</option>
                                                            <option value="PS-VI">PS-VI</option>
                                                            <option value="SAA">SAA</option>
                                                            <option value="SAD">SAD</option>
                                                            <option value="SAF">SAF</option>
                                                            <option value="SCDTE">SCDTE</option>
                                                            <option value="SPA">SPA</option>
                                                            <option value="SPC">SPC</option>
                                                            <option value="SPD">SPD</option>
                                                            <option value="SPF">SPF</option>
                                                            <option value="SPS5">SPS5</option>
                                                            <option value="STA">STA</option>
                                                            <option value="STB">STB</option>
                                                            <option value="STC">STC</option>
                                                            <option value="STD">STD</option>
                                                            <option value="STE">STE</option>
                                                            <option value="STF">STF</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="estado_civ">Cargo:</label>
                                                        <select class="form-control form-control-lg" id="arma" name="arma" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="ARTESANO">ARTESANO</option>
                                                            <option value="ASIS ANAL PAD">ASIS ANAL PAD</option>
                                                            <option value="ASIST ADMTVO">ASIST ADMTVO</option>
                                                            <option value="ASIST SER SAL">ASIST SER SAL</option>
                                                            <option value="ASIST SOCIAL">ASIST SOCIAL</option>
                                                            <option value="AUX FORM NIÑO">AUX FORM NIÑO</option>
                                                            <option value="AUX NUTRICION">AUX NUTRICION</option>
                                                            <option value="AUX SIST ADMT">AUX SIST ADMT</option>
                                                            <option value="AUXILIAR CAP. Y DIFUSION">AUXILIAR CAP. Y DIFUSION</option>
                                                            <option value="CAPELLAN">CAPELLAN</option>
                                                            <option value="CHOFER">CHOFER</option>
                                                            <option value="CONTADOR">CONTADOR</option>
                                                            <option value="DIBUJANTE">DIBUJANTE</option>
                                                            <option value="DOCENTE">DOCENTE</option>
                                                            <option value="ECONOMISTA">ECONOMISTA</option>
                                                            <option value="ELECTRICISTA">ELECTRICISTA</option>
                                                            <option value="ENFERMERA">ENFERMERA</option>
                                                            <option value="ESPEC EDUCAC">ESPEC EDUCAC</option>
                                                            <option value="MECANICO">MECANICO</option>
                                                            <option value="OFICINISTA">OFICINISTA</option>
                                                            <option value="OPERADOR PAD">OPERADOR PAD</option>
                                                            <option value="PERIODISTA">PERIODISTA</option>
                                                            <option value="SECRETAR TCA">SECRETAR TCA</option>
                                                            <option value="PSICOLOGO">PSICOLOGO</option>
                                                            <option value="SOCIOLOGO">SOCIOLOGO</option>
                                                            <option value="SUP CONS SERV">SUP CONS SERV</option>
                                                            <option value="TCO ABASTOS">TCO ABASTOS</option>
                                                            <option value="TCO CONTABIL">TCO CONTABIL</option>
                                                            <option value="TCO ADMTVO">TCO ADMTVO</option>
                                                            <option value="TCO AGROPECUA">TCO AGROPECUA</option>
                                                            <option value="TCO ECONOMIA">TCO ECONOMIA</option>
                                                            <option value="TCO EN CAP. Y DIFUSION">TCO EN CAP. Y DIFUSION</option>
                                                            <option value="TCO INSPECT">TCO INSPECT</option>>
                                                            <option value="TOPOGRAFO">TOPOGRAFO</option>
                                                            <option value="TRAB SERV">TRAB SERV</option>
                                                            <option value="TRANSCRIP PAD">TRANSCRIP PAD</option>
                                                            <option value="ABOGADO">ABOGADO</option>
                                                            <option value="DOCTOR">DOCTOR</option>
                                                            <option value="DISEÑADOR GRAFICO">DISEÑADOR GRAFICO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="apellido_pat">Apellido Paterno:</label>
                                                        <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="apellido_mat">Apellido Materno:</label>
                                                        <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="nombres">Nombres:</label>
                                                        <input type="text" class="form-control" id="nombres" name="nombres" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="estado_civ">Estado Civil:</label>
                                                        <select class="form-control form-control-lg" id="estado_civ" name="estado_civ" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="SOLTERO">SOLTERO</option>
                                                            <option value="CASADO">CASADO</option>
                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                            <option value="CONYUGUE">CONYUGUE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="a_servicio">Años Servicio:</label>
                                                        <input type="number" class="form-control" id="a_servicio" name="a_servicio" style="text-transform: uppercase;" min="0" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grado_instr">Grado de Instrucción:</label>
                                                        <select class="form-control form-control-lg" id="grado_ins_per" name="grado_ins_per" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="PRIMARIA">PRIMARIA</option>
                                                            <option value="SECUNDARIA">SECUNDARIA</option>
                                                            <option value="SUPERIOR">SUPERIOR</option>
                                                            <option value="TECNICO">TECNICO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="religion">Religión:</label>
                                                        <select class="form-control form-control-lg" id="religion" name="religion" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="NO TIENE">NO TIENE</option>
                                                            <option value="CATOLICA">CATÓLICA</option>
                                                            <option value="CRISTIANISMO">CRISTIANISMO</option>
                                                            <option value="EVANGELICO">EVANGELICO</option>
                                                            <option value="MORMONISMO">MORMONISMO</option>
                                                            <option value="OTRA">OTRA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="fec_ult_asc">Último Ascenso:</label>
                                                        <input type="date" class="form-control" id="fec_ult_asc" name="fec_ult_asc" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div align="center">
                                                <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="personal_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Dirección</div>
                                        <div class="secondStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="departamento_viv">Departamento:</label>
                                                        <select class="form-control form-control-lg" id="departamento_viv" name="depart_viv" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Provincia:</label>
                                                        <select class="form-control form-control-lg" id="provin_viv" name="provin_viv" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="distri_viv">Distrito:</label>
                                                        <select class="form-control form-control-lg" id="distri_viv" name="distri_viv" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="urbanizacion">Urbanización:</label>
                                                        <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="calle">Calle, Mz, Lote:</label>
                                                        <input type="text" class="form-control" id="calle" name="calle" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Contacto</div>
                                        <div class="thirdStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="telefono">Número:</label>
                                                        <input type="number" class="form-control" id="telef_per" min="0" name="telef_per" style="text-transform: uppercase;" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="operador">Operador:</label>
                                                        <select class="form-control form-control-lg" id="operador" name="operador" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="ENTEL">ENTEL</option>
                                                            <option value="BITEL">BITEL</option>
                                                            <option value="CLARO">CLARO</option>
                                                            <option value="MOVISTAR">MOVISTAR</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="correo">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" id="correo" name="correo" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="born_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Nacimiento</div>
                                        <div class="fourthStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="depart_nac">Departamento:</label>
                                                        <select class="form-control form-control-lg" id="depart_nac" name="depart_nac" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="provin_nac">Provincia:</label>
                                                        <select class="form-control form-control-lg" id="provin_nac" name="provin_nac" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="distri_nac">Distrito:</label>
                                                    <select class="form-control form-control-lg" id="distri_nac" name="distri_nac" required>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="fecha_nac">Fecha:</label>
                                                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nacper" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="edad">Edad:</label>
                                                        <input type="number" class="form-control edad_nac" id="edad_nac" name="edad_nac" style="text-transform: uppercase;" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_personal_born" id="previous_btn_personal_born" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_born" id="btn_personal_born" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="documents_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Documentos</div>
                                        <div class="fivethStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="cip">CIP:</label>
                                                        <input type="number" min="0" class="form-control" id="cip_per" name="cip_per" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="dni">DNI:</label>
                                                        <input type="number" min="0" class="form-control" id="dni_per" name="dni_per" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="pasaporte">Pasaporte:</label>
                                                        <input class='form-control form-control' type='text' id="pasaporte" name='pasaporte' list='citynames' style='text-transform: uppercase;' required><datalist id='citynames'>
                                                            <option value='NO'>
                                                        </datalist> </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="brevete">Brevete:</label>
                                                        <select class="form-control form-control-lg" id="brevete" name="brevete" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="NO TIENE">NO TIENE</option>
                                                            <option value="A-I">A-I</option>
                                                            <option value="A-II-A">A-II-A</option>
                                                            <option value="A-II-B">A-II-B</option>
                                                            <option value="A-III-A">A-III-A</option>
                                                            <option value="A-III-B">A-III-B</option>
                                                            <option value="A-III-C">A-III-C</option>
                                                            <option value="A-IV-ESPECIAL">A-IV-ESPECIAL</option>
                                                            <option value="B-I">B-I</option>
                                                            <option value="B-II-A">B-II-A</option>
                                                            <option value="B-II-B">B-II-B</option>
                                                            <option value="B-II-C">B-II-C</option>
                                                            <option value="B">B</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_personal_documents" id="previous_btn_personal_documents" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_documents" id="btn_personal_documents" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="caracters_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Características</div>
                                        <div class="sixStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="talla">Talla(m.):</label>
                                                        <input type="number" step="0.01" min="0" class="form-control" id="talla" name="talla" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="peso">Peso(kg.):</label>
                                                        <input type="number" step="0.01" min="0" class="form-control" id="peso" name="peso" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grupo_sang">Grupo Sanguíneo:</label>
                                                        <select class="form-control form-control-lg" id="grupo_sang" name="grupo_sang" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="religion">Sexo:</label>
                                                        <select class="form-control form-control-lg" id="sexo" name="sexo" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="MASCULINO">MASCULINO</option>
                                                            <option value="FEMENINO">FEMENINO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_personal_caracters" id="previous_btn_personal_caracters" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_caracters" id="btn_personal_caracters" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="clothes_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Talla de ropa</div>
                                        <div class="sevenStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grado">Camisa/Blusa:</label>
                                                        <select class="form-control form-control-lg" id="camisa" name="camisa" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                            <option value="L">L</option>
                                                            <option value="XL">XL</option>
                                                            <option value="XLL">XLL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Pantalón:</label>
                                                        <select class="form-control form-control-lg" id="pantalon" name="pantalon" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="30">30</option>
                                                            <option value="32">32</option>
                                                            <option value="34">34</option>
                                                            <option value="36">36</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="distri_viv">Calzado:</label>
                                                        <select class="form-control form-control-lg" id="calzado" name="calzado" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="35">35</option>
                                                            <option value="36">36</option>
                                                            <option value="37">37</option>
                                                            <option value="38">38</option>
                                                            <option value="39">39</option>
                                                            <option value="40">40</option>
                                                            <option value="41">41</option>
                                                            <option value="42">43</option>
                                                            <option value="43">43</option>
                                                            <option value="44">44</option>
                                                            <option value="45">45</option>
                                                            <option value="46">46</option>
                                                            <option value="47">47</option>
                                                            <option value="48">48</option>
                                                            <option value="49">49</option>
                                                            <option value="50">50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="urbanizacion">Prenda Cabeza:</label>
                                                        <select class="form-control form-control-lg" id="cabeza" name="cabeza" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="52">52</option>
                                                            <option value="53">53</option>
                                                            <option value="54">54</option>
                                                            <option value="55">55</option>
                                                            <option value="56">56</option>
                                                            <option value="57">57</option>
                                                            <option value="58">58</option>
                                                            <option value="59">59</option>
                                                            <option value="60">60</option>
                                                            <option value="61">61</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_personal_clothes" id="previous_btn_personal_clothes" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_clothes" id="btn_personal_clothes" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="remuneration_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Remuneración</div>
                                        <div class="eightStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="banco">BANCO:</label>
                                                        <input class="form-control form-control" type='text' id="banco" name="banco" list='bancos' style='text-transform: uppercase;' required><datalist id='bancos'>
                                                            <option value="BANCO DE CREDITO DEL PERU"></option>
                                                            <option value="BANCO DE LA NACION"></option>
                                                            <option value="BANCO INTERBANK"></option>
                                                            <option value="BANCO SCOTIABANK"></option>
                                                            <option value="BBVA CONTINENTAL"></option>
                                                            <option value="BANCO PICHINCHA"></option>
                                                            <option value="BANCO DEL COMERCIO"></option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Numero Cuenta">Número de Cuenta:</label>
                                                        <input type="number" class="form-control" id="nro_cuenta" name="nro_cuenta" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="distri_nac">Afiliación:</label>
                                                    <select class="form-control form-control-lg" id="afiliacion" name="afiliacion" required>
                                                        <option value="">Seleccione</option>
                                                        <option value="AFP">AFP</option>
                                                        <option value="ONP">ONP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div align="center" id="hide_review">
                                                <button type="button" name="previous_btn_personal_remuneration" id="previous_btn_personal_remuneration" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_remuneration" id="btn_personal_remuneration" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="langtripssttudies_details">
                                    <div class="nineStep">
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Idiomas <button type="button" class="btn btn-success btn-agregaridioma"><span class="fa fa-plus"></span></button></div>

                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbidiomas" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Idioma</th>
                                                            <th>Habla</th>
                                                            <th>Lee</th>
                                                            <th>Adquirido</th>
                                                            <th>Escribe</th>
                                                            <th>Graduado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Viajes al extranjero <button type="button" class="btn btn-success btn-viajesExtranjero"><span class="fa fa-plus"></span></button></div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbviajesExtranjero" class="table table-bordered   table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Lugar</th>
                                                            <th>Motivo</th>
                                                            <th>Fecha</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Estudios <button type="button" class="btn btn-success btn-estudiosRealizados"><span class="fa fa-plus"></span></button></div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbestudiosRealizados" class="table table-bordered   table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Curso</th>
                                                            <th>Tipo de Curso</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div align="center">
                                                <button type="button" name="previous_btn_personal_langtripssttudies" id="previous_btn_personal_langtripssttudies" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_langtripssttudies" id="btn_personal_langtripssttudies" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="securfam_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Familiares <button type="button" class="btn btn-success btn-agregarfamiliares"><span class="fa fa-plus"></span></button></div>
                                        <div class="tenStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbfamiliares1" class="table table-bordered   table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombres</th>
                                                            <th>Parentesco</th>
                                                            <th>Edad</th>
                                                            <th>Lugar Nac.</th>
                                                            <th>Fecha Nac.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                                <table id="tbfamiliares2" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>CIP</th>
                                                            <th>DNI</th>
                                                            <th>Telef.</th>
                                                            <th>Grupo Sang.</th>
                                                            <th>Grado Instr.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Seguros <button type="button" class="btn btn-success btn-seguro"><span class="fa fa-plus"></span></button> </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbseguro" class="table table-bordered   table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Seguro</th>
                                                            <th>Tipo de Seguro</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div align="center">
                                                <button type="button" name="previous_btn_personal_securfam" id="previous_btn_personal_securfam" class="btn btn-default btn-lg">Previous</button>
                                                <button type="submit" name="review" id="review" class="btn btn-info btn-lg">Revisar</button>
                                                <button type="submit" name="btn_personal_securfam" id="btn_personal_securfam" class="btn btn-info btn-lg" disabled>Guardar</button>
                                                <input type="hidden" class="form-control" id="auxiliar_viv" name="auxiliar_viv" style="text-transform: uppercase;" required>
                                                <input type="hidden" class="form-control" id="auxiliar_nac" name="auxiliar_nac" style="text-transform: uppercase;" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!--



<div class="modal modal-danger fade" id="modal_popup">
    <div class="modal-dialog modal-sm">
    <form action="<?php echo base_url(); ?>control/personal/storestep1" method="POST">
            <div class="modal-content">
                <div class="modal-header" style="height: 150px;">
                    <h4 style="margin-top: 50px;text-align: center;">Are you sure, do you delete user?</h4>
                    <input type="hidden" name="id" id="user_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">No</button>
                    <button type="submit" name="submit" class="btn btn-success">Yes</button>
                </div>

            </div>

        </form>

    </div>

</div>

-->