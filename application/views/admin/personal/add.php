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
                                                                <label for="grado">Grado:</label>
                                                                <input type="text" class="form-control" id="grado" name="grado_personal" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("grado", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="arma">Arma:</label>
                                                                <input type="text" class="form-control" id="arma" name="arma" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("arma", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_pat">Apellido Paterno:</label>
                                                                <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" value="<?php set_value("nombre_cat"); ?>">
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
                                                                <input type="text" class="form-control" id="estado_civ" name="estado_civ" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="anios_serv">Años Servicio:</label>
                                                                <input type="text" class="form-control" id="anios_serv" name="anios_serv" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("anios_serv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado_inst">Grado Instrucción:</label>
                                                                <input type="text" class="form-control" id="grado_inst" name="grado_inst" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("grado_inst", "<span class='help-block'>", "</span>"); ?>
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
                                                                <input type="text" class="form-control" id="fec_ult_asc" name="fec_ult_asc" value="<?php set_value("nombre_cat"); ?>">
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
                                                                <label for="depart_viv">Departamento:</label>
                                                                <input type="text" class="form-control" id="depart_viv" name="depart_viv" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("depart_viv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="provin_viv">Provincia:</label>
                                                                <input type="text" class="form-control" id="provin_viv" name="provin_viv" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("provin_viv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_viv">Distrito:</label>
                                                                <input type="text" class="form-control" id="distri_viv" name="distri_viv" value="<?php set_value("nombre_cat"); ?>">
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
                                                                <input type="text" class="form-control" id="depart_nac" name="depart_nac" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("depart_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="provin_nac">Provincia:</label>
                                                                <input type="text" class="form-control" id="provin_nac" name="provin_nac" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("provin_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_nac">Distrito:</label>
                                                                <input type="text" class="form-control" id="distri_nac" name="distri_nac" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("distri_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fecha_nac">Fecha:</label>
                                                                <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("fecha_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="edad">Edad:</label>
                                                                <input type="text" class="form-control" id="edad" name="edad" value="<?php set_value("nombre_cat"); ?>">
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
                                                                <input type="text" class="form-control" id="cip" name="cip" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("cip", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="dni">DNI:</label>
                                                                <input type="text" class="form-control" id="dni" name="dni" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("dni", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="pasaporte">Pasaporte:</label>
                                                                <input type="text" class="form-control" id="pasaporte" name="pasaporte" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("pasaporte", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="brevete">Brevete:</label>
                                                                <input type="text" class="form-control" id="brevete" name="brevete" value="<?php set_value("nombre_cat"); ?>">
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
                                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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