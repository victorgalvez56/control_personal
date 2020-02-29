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
                        <form action="<?php echo base_url(); ?>control/personal/storestep1" method="POST">
                            <section class="content">
                                <div class="box box-primary">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos Personales</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="imagen">Foto Personal:</label>
                                                                <span class="btn btn-default btn-file">
                                                                    Subir Foto <input type="file" name="imagen  ">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado">Grado:</label>
                                                                <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                                    <option>Seleccione</option>
                                                                    <option>Sub Oficial de Tercera</option>
                                                                    <option>Sub Oficial de Segunda</option>
                                                                    <option>Sub Oficial de Primera</option>
                                                                    <option>Técnico de Tercera</option>
                                                                    <option>Técnico de Segunda</option>
                                                                    <option>Técnico de Primera</option>
                                                                    <option>Técnico Jefe</option>
                                                                    <option>Técnico Jefe Supervisor</option>
                                                                    <option>Técnico Jefe Supervisor de Brigada</option>
                                                                    <option>Sub Teniente</option>
                                                                    <option>Sub teniente Caballería</option>
                                                                    <option>Capitán</option>
                                                                    <option>Mayor</option>
                                                                    <option>Comandante</option>
                                                                    <option>Coronel</option>
                                                                    <option>General de Brigada</option>
                                                                    <option>General de División</option>
                                                                    <option>General de Ejército</option>
                                                                </select>
                                                                <?php echo form_error("grado", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="estado_civ">Arma:</label>
                                                                <select class="form-control form-control-lg" id="estado_civ" name="estado_civ">
                                                                    <option>Seleccione</option>
                                                                    <option>Artillería</option>
                                                                    <option>Caballería</option>
                                                                    <option>Comunicaciones</option>
                                                                    <option>Inteligencia</option>
                                                                    <option>Administracion Personal</option>
                                                                    <option>Material Defensa</option>
                                                                    <option>Servicio Ciencia y Tecnología del Ejército</option>
                                                                    <option>Servicio Juriídico</option>
                                                                    <option>Sanidad</option>
                                                                </select>
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_pat">Apellido Paterno:</label>
                                                                <input type="text" class="form-control" id="apellido_pat" name="apellido_pat">
                                                                <?php echo form_error("apellido_pat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Apellido Materno:</label>
                                                                <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("apellido_mat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombres">Nombres:</label>
                                                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombres", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="estado_civ">Estado Civil:</label>
                                                                <select class="form-control form-control-lg" id="estado_civ" name="estado_civ">
                                                                    <option>Seleccione</option>
                                                                    <option>Soltero</option>
                                                                    <option>Casado</option>
                                                                    <option>Divorciado</option>
                                                                    <option>Cónyugue</option>
                                                                </select>
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="anios_serv">Años Servicio:</label>
                                                                <input type="number" class="form-control" id="anios_serv" name="anios_serv" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("anios_serv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="estado_civ">Grado de Instrucción:</label>
                                                                <select class="form-control form-control-lg" id="estado_civ" name="estado_civ">
                                                                    <option>Seleccione</option>
                                                                    <option>Primaria</option>
                                                                    <option>Secundaria</option>
                                                                    <option>Superior</option>
                                                                    <option>Técnico</option>
                                                                </select>
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="religion">Religión:</label>
                                                                <input type="text" class="form-control" id="religion" name="religion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("religion", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fec_ult_asc">Fecha Último Ascenso:</label>
                                                                <input type="date" class="form-control" id="fec_ult_asc" name="fec_ult_asc" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("fec_ult_asc", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Dirección Actual</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="departamento_viv">Departamento:</label>
                                                                <select class="form-control form-control-lg" id="departamento_viv" name="departamento_viv">
                                                                </select>
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Provincia:</label>
                                                                <select class="form-control form-control-lg" id="provin_viv" name="provin_viv">
                                                                </select>
                                                                <?php echo form_error("provin_viv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_viv">Distrito:</label>
                                                                <select class="form-control form-control-lg" id="distri_viv" name="distri_viv">
                                                                </select>
                                                                <?php echo form_error("distri_viv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="urbanizacion">Urbanización:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("urbanizacion", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="calle">Calle, Mz, Lote:</label>
                                                                <input type="text" class="form-control" id="calle" name="calle" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("calle", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Lugar y Fecha de Nacimiento</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="depart_nac">Departamento:</label>
                                                                <select class="form-control form-control-lg" id="depart_nac" name="depart_nac">
                                                                </select>
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="provin_nac">Provincia:</label>
                                                                <select class="form-control form-control-lg" id="provin_nac" name="provin_nac">
                                                                </select>
                                                                <?php echo form_error("provin_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="distri_nac">Distrito:</label>
                                                            <select class="form-control form-control-lg" id="distri_nac" name="distri_nac">
                                                            </select>
                                                            <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fecha_nac">Fecha:</label>
                                                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("fecha_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="edad">Edad:</label>
                                                                <input type="number" class="form-control" id="edad" name="edad" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("edad", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Documentos Personales</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="cip">CIP:</label>
                                                                <input type="number" class="form-control" id="cip" name="cip" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("cip", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="dni">DNI:</label>
                                                                <input type="number" class="form-control" id="dni" name="dni" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("dni", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="pasaporte">Pasaporte:</label>
                                                                <input type="number" class="form-control" id="pasaporte" name="pasaporte" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("pasaporte", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="brevete">Brevete:</label>
                                                                <input type="number" class="form-control" id="brevete" name="brevete" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("brevete", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div style="float: right">
                                                <button type="submit" class="btn btn-info btn-flat">Siguiente</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
<!-- /.content-wrapper -->