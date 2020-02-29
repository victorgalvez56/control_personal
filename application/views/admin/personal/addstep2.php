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
                        <form action="<?php echo base_url();?>control/personal/storestep2" method="POST">
                            <section class="content">
                                <div class="box box-primary">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Caraterísticas Físicas</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_pat">Talla:</label>
                                                                <input type="text" class="form-control" id="apellido_pat" name="apellido_pat">
                                                                <?php echo form_error("apellido_pat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Peso:</label>
                                                                <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("apellido_mat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado">Grupo Sanguíneo:</label>
                                                                <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                                    <option>Seleccione</option>
                                                                    <option>O-</option>
                                                                    <option>O+</option>
                                                                    <option>A−</option>
                                                                    <option>A+</option>
                                                                    <option>B−</option>
                                                                    <option>B+</option>
                                                                    <option>AB−</option>
                                                                    <option>AB+</option>
                                                                </select>
                                                                <?php echo form_error("grado", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado">Sexo:</label>
                                                                <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                                    <option>Seleccione</option>
                                                                    <option>Masculino</option>
                                                                    <option>Femenino</option>
                                                                </select>
                                                                <?php echo form_error("grado", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Talla de Ropa</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="departamento_viv">Camisa/Blusa:</label>
                                                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombres", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Pantalón:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("urbanizacion", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_viv">Calzado:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("urbanizacion", "<span class='help-block'>", "</span>"); ?>
                                                                <?php echo form_error("distri_viv", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="urbanizacion">Prenda Cabeza:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("urbanizacion", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Remuneración</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="depart_nac">Banco:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("estado_civ", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="provin_nac">Número de Cuenta:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("provin_nac", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="distri_nac">Afiliación:</label>
                                                            <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                                <option>Seleccione</option>
                                                                <option>AFP</option>
                                                                <option>ONP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Idiomas que conoce</h3>
                                                </div>
                                                <button type="button" class="btn btn-success btn-check22"><span class="fa fa-check"></span></button>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <table id="tbventas" class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Idioma</th>
                                                                    <th>Habla</th>
                                                                    <th>Lee</th>
                                                                    <th>Escribe</th>
                                                                    <th>Adquirido</th>
                                                                    <th>Graduado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
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