
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Registro Sanitario
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
                        <?php if ($permisos->insert==1):?>
                        <a href="<?php echo base_url();?>control/sanitario_registro/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Registro</a>
                        <?php endif;?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Dni</th>
                                    <th>Nombre</th>
                                    <th>Sexo</th>
                                    <th>Grupo Sanguíneo</th>
                                    <th>Alergias</th>
                                    <th>Fecha</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($registros)):?>
                                    <?php foreach($registros as $registro):?>
                                        <tr>
                                            <td><?php echo $registro->dni;?></td>
                                            <td><?php echo $registro->nombres." ".$registro->apellido_pat." ".$registro->apellido_mat;?></td>
                                            <td><?php echo $registro->sexo;?></td>
                                            <td><?php echo $registro->grupo_sang;?></td>
                                            <td><?php echo $registro->alergias;?></td>
                                            <td><?php echo $registro->fecha;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php if($permisos->update == 1):?>
                                                    <a href="<?php echo base_url()?>control/sanitario_registro/edit/<?php echo $registro->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <?php endif;?>
                                                    <?php if($permisos->delete == 1):?>
                                                    <a href="<?php echo base_url();?>control/sanitario_registro/delete/<?php echo $registro->id; ?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                    <?php endif;?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
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

