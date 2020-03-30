<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Vehículo
            <small>Nuevo</small>
        </h1>
    </section>
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
                        <form action="<?php echo base_url(); ?>control/vehiculos/store" method="POST">
                            <section class="content">
                                <div class="box box-primary">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos Vehiculares</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Lista de Personal:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-primary" id="buttonsearch" type="button" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span> Buscar</button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="placa" name="placa" style="text-transform: uppercase;" disabled>
                                                                </div><!-- /input-group -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Placa:</label>
                                                                <input type="text" class="form-control" id="placa" name="placa" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Serie:</label>
                                                                <input type="text" class="form-control" id="serie" name="serie" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Vin:</label>
                                                                <input type="text" class="form-control" id="vin" name="vin" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Motor:</label>
                                                                <input type="text" class="form-control" id="motor" name="motor" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Color:</label>
                                                                <input type="text" class="form-control" id="color" name="color" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Marca:</label>
                                                                <input type="text" class="form-control" id="marca" name="marca" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Modelo:</label>
                                                                <input type="text" class="form-control" id="modelo" name="modelo" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Placa Vigente:</label>
                                                                <input type="text" class="form-control" id="placa_vig" name="placa_vig" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Placa Anterior:</label>
                                                                <input type="text" class="form-control" id="placa_ant" name="placa_ant" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Anotaciones:</label>
                                                                <input type="text" class="form-control" id="anotaciones" name="anotaciones" style="text-transform: uppercase;" required>
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
                                                <button type="submit" class="btn btn-modal btn-success btn-flat">Guardar</button>
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
                        <?php if (!empty($personals)) : ?>
                            <?php foreach ($personals as $personal) : ?>
                                <tr>
                                    <td><?php echo $personal->dni; ?></td>
                                    <td><?php echo $personal->cip; ?></td>
                                    <td><?php echo $personal->nombres; ?></td>
                                    <td><?php echo $personal->grado; ?></td>

                                    <?php $datapersonal = $personal->id . "*" . $personal->dni . "*" . $personal->nombres . " " . $personal->apellido_pat . " " . $personal->apellido_mat . "*" . $personal->grado . "*" . $personal->grupo_sang . "*" . $personal->sexo; ?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check22" value="<?php echo $datapersonal; ?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
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