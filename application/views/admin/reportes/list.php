
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Reportes
        <small>Cajas</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="<?php echo current_url();?>" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">Área:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="fechainicio" value="<?php echo !empty($fechainicio) ? $fechainicio:'';?>">
                            </div>
                            <label for="" class="col-md-1 control-label">Mes:</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fechafin" value="<?php  echo !empty($fechafin) ? $fechafin:'';?>">
                            </div>
                            <div class="col-md-4">
                                <!--<input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <a href="<?php echo base_url(); ?>reportes/cajas" class="btn btn-danger">Restablecer</a>-->
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="xreporteCaja" class="table table-bordered table-hover">
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
                                                <button type="button" class="btn btn-info" value="<?php echo $registro->id; ?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>

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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información del Personal</h4>
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
