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
                                    <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Contact Details</a>
                                </li>
                            </ul>
                            <div class="tab-content" style="margin-top:16px;">
                                <div class="tab-pane active" id="login_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalles Personales</div>
                                        <ol>
                                        </ol>
                                        <span id="error_email" class="text-danger"></span>
                                        <span id="error_grado" class="text-danger"></span>
                                        <span id="error_arma" class="text-danger"></span>
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
                                        <div class="panel-heading">Fill Personal Details</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>Enter First Name</label>
                                                <input type="text" name="first_name" id="first_name" class="form-control" />
                                                <span id="error_first_name" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Last Name</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control" />
                                                <span id="error_last_name" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="male" checked> Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" value="female"> Female
                                                </label>
                                            </div>
                                            <br />
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
                                        <div class="panel-heading">Fill Contact Details</div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label>Enter Address</label>
                                                <textarea name="address" id="address" class="form-control"></textarea>
                                                <span id="error_address" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Mobile No.</label>
                                                <input type="text" name="mobile_no" id="mobile_no" class="form-control" />
                                                <span id="error_mobile_no" class="text-danger"></span>
                                            </div>
                                            <br />
                                            <div align="center">
                                                <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                                                <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
                                            </div>
                                            <br />
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