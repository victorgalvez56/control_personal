<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registro Sanitario
            <small>Editar</small>
        </h1>
    </section>
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
                        <form action="<?php echo base_url(); ?>control/sanitario_registro/update" method="POST">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Grado</th>
                                        <th>Sexo</th>
                                        <th>Grupo Sanguíneo</th>
                                        <th>Alergias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" value="<?php echo $sanitario->id; ?>" name="idRegistro">
                                    <tr>
                                        <th><input type="text" class="form-control" id="dni" name="dni" value="<?php echo $sanitario->dni ?>" readonly></th>
                                        <th><input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $sanitario->nombres . " " . $sanitario->apellido_pat . " " . $sanitario->apellido_mat ?>" readonly>
                                        <th><input type="text" class="form-control" id="grado" name="grado" value="<?php echo $sanitario->grado ?>" readonly>
                                        <th><input type="text" class="form-control" id="sexo" name="sexo" value="<?php echo $sanitario->sexo ?>" readonly>
                                        <th><input type="text" class="form-control" id="grupo_sang" name="grupo_sang" value="<?php echo $sanitario->grupo_sang ?>" readonly>
                                        <th><input class='form-control form-control' type='text' name='alergias' list='citynames' value="<?php echo $sanitario->alergias ?>" style='text-transform: uppercase;' required><datalist id='citynames'><option value='NO'></datalist></th>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
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
<!-- /.content-wrapper -->