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
                        <form method="post" id="register_form">
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
                                    <a class="nav-link inactive_tab1" id="list_lenguage_details" style="border:1px solid #ccc">Idiomas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_family_details" style="border:1px solid #ccc">Familiares Directos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_trips_details" style="border:1px solid #ccc">Viajes al Extranjero</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_studies_details" style="border:1px solid #ccc">Estudios Realizados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_insurances_details" style="border:1px solid #ccc">Seguros</a>
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
                                                            <option value="GRAL DIV EP">GRAL DIV EP</option>
                                                            <option value="GRAL BRIG EP">GRAL BRIG EP</option>
                                                            <option value="CRL EP">CRL EP</option>
                                                            <option value="TTE CRL EP">TTE CRL EP</option>
                                                            <option value="MY EP">MY EP</option>
                                                            <option value="CAP EP">CAP EP</option>
                                                            <option value="TTE EP">TTE EP</option>
                                                            <option value="STTE EP">STTE EP</option>
                                                            <option value="ALFZ EP">ALFZ EP</option>
                                                            <option value="TCOJS EP">TCOJS EP</option>
                                                            <option value="TCOJ EP">TCOJ EP</option>
                                                            <option value="TCO1 EP">TCO1 EP</option>
                                                            <option value="TCO2 EP">TCO2 EP</option>
                                                            <option value="TCO3 EP">TCO3 EP</option>
                                                            <option value="SO1">SO1</option>
                                                            <option value="SO2">SO2</option>
                                                            <option value="SO3">SO3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="estado_civ">Arma:</label>
                                                        <select class="form-control form-control-lg" id="arma" name="arma" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="ARTILLERIA">ARTILLERIA</option>
                                                            <option value="CABALLERIA">CABALLERIA</option>
                                                            <option value="COMUNICACIONES">COMUNICACIONES</option>
                                                            <option value="INTELIGENCIA">INTELIGENCIA</option>
                                                            <option value="ADMINISTRACION PERSONAL">ADMINISTRACION PERSONAL</option>
                                                            <option value="MATERIAL DEFENSA">MATERIAL DEFENSA</option>
                                                            <option value="SERVICIO CIENCIA Y TECNOLOGIA DEL EJERCITO">SERVICIO CIENCIA Y TECNOLOGIA DEL EJERCITO</option>
                                                            <option value="SERVICIO JURIDICO">SERVICIO JURIDICO</option>
                                                            <option value="SANIDAD">SANIDAD</option>
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
                                                        <input type="text" class="form-control" id="religion" name="religion" style="text-transform: uppercase;" required>
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
                                            <div align="center">
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
                                                        <label for="">Operador:</label>
                                                        <input type="text" class="form-control" id="operador" name="operador" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="correo">Correo Electrónico:</label>
                                                        <input type="email" class="form-control" id="correo" name="correo" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center">
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
                                                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" max="2002-01-01" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="edad">Edad:</label>
                                                        <input type="number" class="form-control" id="edad" name="edad" style="text-transform: uppercase;" min="18" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="center">
                                                <button type="button" name="previous_btn_personal_born" id="previous_btn_personal_born" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_personal_born" id="btn_personal_born" class="btn btn-info btn-lg">Next</button>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="float: right">
                                        <button type="submit" class="btn btn-modal btn-success btn-flat">Guardar</button>
                                        <input type="hidden" class="form-control" id="auxiliar_viv" name="auxiliar_viv" style="text-transform: uppercase;" required>
                                        <input type="hidden" class="form-control" id="auxiliar_nac" name="auxiliar_nac" style="text-transform: uppercase;" required>
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