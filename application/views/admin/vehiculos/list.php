<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vehículos
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
                            <a href="<?php echo base_url(); ?>control/vehiculos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Vehículo</a>
                        <?php endif; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Propietario</th>
                                    <th>N° Placa</th>
                                    <th>N° Serie</th>
                                    <th>N° Motor</th>
                                    <th>Vin</th>
                                    <th>Color</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($vehiculos)) : ?>
                                    <?php foreach ($vehiculos as $vehiculo) : ?>
                                        <tr>
                                            <td><?php echo $vehiculo->nombres . " " . $vehiculo->apellido_pat; ?></td>
                                            <td><?php echo $vehiculo->n_placa; ?></td>
                                            <td><?php echo $vehiculo->n_serie; ?></td>
                                            <td><?php echo $vehiculo->n_motor; ?></td>
                                            <td><?php echo $vehiculo->n_vin; ?></td>
                                            <td><?php echo $vehiculo->n_color; ?></td>
                                            <td><?php echo $vehiculo->marca; ?></td>
                                            <td><?php echo $vehiculo->modelo; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-vehiculo" value="<?php echo $vehiculo->id; ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                    <?php if ($permisos->update == 1) : ?>
                                                        <a href="<?php echo base_url() ?>control/vehiculos/edit/<?php echo $vehiculo->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif; ?>
                                                    <?php if ($permisos->delete == 1) : ?>
                                                        <a href="<?php echo base_url(); ?>control/vehiculos/delete/<?php echo $vehiculo->id; ?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
                <h4 class="modal-title">Informacion del Vehículo</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-print-vehiculo"><span class="fa fa-print"> </span>Imprimir</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->