<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registro Mensual
            <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($permisos->insert == 1) : ?>
                            <a href="<?php echo base_url(); ?>control/sanitario_mensual/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Registro Mensual</a>
                        <?php endif; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Dni</th>
                                    <th>Nombre</th>
                                    <th>Presión Sist.</th>
                                    <th>Presión Dias.</th>
                                    <th>Pulso</th>
                                    <th>Valoración</th>
                                    <th>Medico</th>
                                    <th>Per. Abdom.</th>
                                    <th>Imc</th>
                                    <th>Clas. Imc</th>
                                    <th>Clas. Per.</th>

                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($registros)) : ?>
                                    <?php foreach ($registros as $registro) : ?>
                                        <tr>
                                            <td><?php echo $registro->fecha; ?></td>
                                            <td><?php echo $registro->dni; ?></td>
                                            <td><?php echo $registro->nombres . " " . $registro->apellido_pat . " " . $registro->apellido_mat; ?></td>
                                            <td><?php echo $registro->pres_sis; ?></td>
                                            <td><?php echo $registro->pres_dia; ?></td>
                                            <td><?php echo $registro->pulso; ?></td>
                                            <td><?php echo $registro->valoracion; ?></td>
                                            <td><?php echo $registro->medico; ?></td>
                                            <td><?php echo $registro->perimetro; ?></td>
                                            <td><?php echo $registro->imc; ?></td>
                                            <td><?php echo $registro->clasi_imc; ?></td>
                                            <td><?php echo $registro->clasi_peri; ?></td>

                                            <td>
                                                <div class="btn-group">
                                                    <?php if ($permisos->update == 1) : ?>
                                                        <a href="<?php echo base_url() ?>control/sanitario_mensual/edit/<?php echo $registro->id; ?>" class="btn btn-default btn-xs btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif; ?>
                                                    <?php if ($permisos->delete == 1) : ?>
                                                        <a href="<?php echo base_url(); ?>control/sanitario_mensual/delete/<?php echo $registro->id; ?>" class="btn btn-default btn-xs btn btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informacion de la Categoria</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->