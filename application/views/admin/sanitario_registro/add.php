<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Datos de Valoración Sanitaria
            <small>Nuevo</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                    <div class="box-body">
                        <form action="<?php echo base_url(); ?>movimientos/ventas/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="">Lista de Personal:</label>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div>
                            </div>


                            <table id="tbventas" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Nombres y Apellidos</th>
                                        <th>Grado</th>
                                        <th>Unidad</th>
                                        <th>Sexo</th>
                                        <th>Grupo Sanguíneo</th>
                                        <th>Alergias</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div style="float: right">
            <button type="submit" class="btn btn-modal btn-success btn-flat">Guardar</button>
        </div>
    </div>
</div>
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
                <h4 class="modal-title">Lista de Personal</h4>
            </div>
            <div class="modal-body">
                <table id="example5" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>CIP</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($personals)):?>
                            <?php foreach($personals as $personal):?>
                                <tr>
                                    <td><?php echo $personal->dni;?></td>
                                    <td><?php echo $personal->cip;?></td>
                                    <td><?php echo $personal->nombres;?></td>
                                    <td><?php echo $personal->grado;?></td>
                                    
                                    <?php $datapersonal = $personal->id."*".$personal->dni."*".$personal->nombres." ".$personal->apellido_pat." ".$personal->apellido_mat."*".$personal->grado."*".$personal->sexo;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check22" value="<?php echo $datapersonal;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
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