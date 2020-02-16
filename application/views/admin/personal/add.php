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
                        <form action="<?php echo base_url(); ?>mantenimiento/categorias/store" method="POST">
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
                                                                <label for="nombre">Grado:</label>
                                                                <input type="text" class="form-control" id="grado" name="grado_personal" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("grado_personal", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Arma:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Apellido Paterno:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Apellido Materno:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Nombres:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Estado Civil:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Años Servicio:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Grado Instrucción:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Religión:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Fecha Último Ascenso:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
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
                                                                <label for="nombre">Departamento:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Provincia:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Distrito:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Urbanización:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Calle, Mz, Lote:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
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
                                                                <label for="nombre">Departamento:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Provincia:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Distrito:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Fecha:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Edad:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
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
                                                                <label for="nombre">CIP:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">DNI:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Pasaporte:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Brevete:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Características Físicas</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Talla:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Peso:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Grupo Sanguíneo:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Sexo:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Talla Ropa</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Talla Camisa:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Talla Pantalón:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Talla Calzado:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Talla Prenda:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre_cat" value="<?php set_value("nombre_cat"); ?>">
                                                                <?php echo form_error("nombre_cat", "<span class='help-block'>", "</span>"); ?>
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