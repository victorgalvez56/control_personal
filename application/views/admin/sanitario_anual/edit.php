<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Evaluación Anual
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
                        <input type="hidden" class="fecha_nacedit" value="<?php echo $sanitario->fecha_nac; ?>">
                        <form action="<?php echo base_url(); ?>control/sanitario_anual/update" method="POST">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Sufre de presión arterial</th>
                                        <th>Toma medicación para presión alta</th>
                                        <th>Edad</th>
                                        <th>Talla(mtrs.)</th>
                                        <th>Peso(kg.)</th>
                                        <th>Perímetro abdominal(cm.)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" value="<?php echo $sanitario->id; ?>" name="idRegistro">
                                    <tr>
                                        <td><input type="hidden" name="dni" value="<?php echo $sanitario->dni; ?>"><?php echo $sanitario->dni; ?></td>
                                        <td><input type="hidden"  name="nombres" value="<?php echo $sanitario->talla; ?>"><?php echo $sanitario->nombres." ".$sanitario->apellido_pat." ".$sanitario->apellido_mat; ?></td>
                                        <td><input class="form-control form-control" value="<?php echo $sanitario->presion; ?>" type="text" name="presion" list="citynames" style="text-transform: uppercase;" required><datalist id="citynames">
                                                <option value="NO">
                                            </datalist></td>
                                        <td><input class="form-control form-control" value="<?php echo $sanitario->medicina; ?>" type="text" name="medicacion" list="citynames" style="text-transform: uppercase;" required><datalist id="citynames">
                                                <option value="NO">
                                            </datalist></td>
                                        <td><input type="text" class="form-control form-control edad_anual" min="1" name="edad" readonly></td>
                                        <td><input type="number" step = "0.01"  class="form-control form-control" value="<?php echo $sanitario->talla; ?>"  min="1" name="talla"></td>
                                        <td><input type="number"  step = "0.01" class="form-control form-control" value="<?php echo $sanitario->peso; ?>"  min="1" name="peso"></td>
                                        <td><input type="number"  step = "0.01" class="form-control form-control" value="<?php echo $sanitario->peri_abdominal; ?>"  min="1" name="perimetro"></td>
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