<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Personal Militar
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
                            <a href="<?php echo base_url(); ?>control/personal_militar/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Personal Militar</a>
                        <?php endif; ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>CIP</th>
                                    <th>Nombre</th>
                                    <th>Grado</th>
                                    <th>Arma</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($personals)) : ?>
                                    <?php foreach ($personals as $personal) : ?>
                                        <tr>
                                            <td><?php echo $personal->dni ?></td>
                                            <td><?php echo $personal->cip ?></td>
                                            <td><?php echo $personal->nombres." ".$personal->apellido_pat." ".$personal->apellido_mat ?></td>
                                            <td><?php echo $personal->grado ?></td>
                                            <td><?php echo $personal->arma ?></td>
                                            <td><?php echo $personal->telefono ?></td>
                                            <td><?php echo $personal->correo?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-personal-militar" value="<?php echo $personal->id; ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                    <?php if ($permisos->update == 1) : ?>
                                                        <a href="<?php echo base_url() ?>control/personal_militar/edit/<?php echo $personal->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif; ?>
                                                    <?php if ($permisos->delete == 1) : ?>
                                                        <a href="<?php echo base_url(); ?>control/personal_militar/delete/<?php echo $personal->id; ?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
        <div class="modal-content" style="width:1000px;margin: 0;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -0%)">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Información del Personal</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>              
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->