<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Evaluación Mensual
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
                        <input type='hidden' name='sexo_rgm' value="<?php echo $sanitario->sexo; ?>">
                        <form action="<?php echo base_url(); ?>control/sanitario_mensual/update" method="POST">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Nombres</th>
                                        <th>P. Sistólica</th>
                                        <th>P. Diastólica</th>
                                        <th>Pulso</th>
                                        <th>Valoración</th>
                                        <th>Médico Turno</th>
                                        <th>Peso</th>
                                        <th>IMC</th>
                                        <th>Clas. IMC</th>
                                        <th>Perím.Abdom.</th>
                                        <th>Clas. Per. Abdom.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" value="<?php echo $sanitario->id; ?>" name="idRegistro">
                                    <tr>
                                        <td><input type="hidden" name="dni"><?php echo $sanitario->dni; ?></td>
                                        <td><input type="hidden"  name="nombres" value="<?php echo $sanitario->talla; ?>"><?php echo $sanitario->nombres." ".$sanitario->apellido_pat." ".$sanitario->apellido_mat; ?></td>
                                        <td><input type="number" min="0" class="form-control form-control" name="pres_sis" value="<?php echo $sanitario->pres_sis; ?>" required></td>
                                        <td><input type="number" min="0" class="form-control form-control" name="pres_dia" value="<?php echo $sanitario->pres_dia; ?>" required></td>
                                        <td><input type="number" min="0" class="form-control form-control" name="pulso" value="<?php echo $sanitario->pulso; ?>" required></td>
                                        <td><input type="text" class="form-control form-control" size="45" name="valoracion" value="<?php echo $sanitario->valoracion; ?>" readonly></td>
                                        <td><input type="hidden" name="medico" > <?php echo $sanitario->medico; ?></td>
                                        <td><input type="number" min="0" id="peso" class="form-control form-control" name="peso" value="<?php echo $sanitario->peso; ?>" required></td>
                                        <td><input type="text" class="form-control form-control" name="imc"  value="<?php echo $sanitario->imc; ?>" readonly></td>
                                        <td><input type="text" class="form-control form-control" size="35" name="clasi_imc" value="<?php echo $sanitario->clasi_imc; ?>" readonly></td>
                                        <td><input type="number" min="0" class="form-control form-control" name="perimetro" value="<?php echo $sanitario->perimetro; ?>" required></td>
                                        <td><input type="text" class="form-control form-control" size="30" name="clasi_peri"  value="<?php echo $sanitario->clasi_peri; ?>" readonly></td>
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