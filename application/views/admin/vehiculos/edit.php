<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vehiculo
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

                        <form action="<?php echo base_url(); ?>control/vehiculos/update" method="POST">
                        <input type="text" value="<?php echo $vehiculo->id; ?>" name="idVehiculo">

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
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Lista de Personal:</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-primary" id="buttonsearch" type="button" data-toggle="modal" data-target="#modal-default" disabled><span class="fa fa-search"></span> Buscar</button>
                                                                    </span>
                                                                    <input type="text" class="form-control" value="<?php echo $vehiculo->nombres." ".$vehiculo->apellido_pat." ".$vehiculo->apellido_mat;?>" style="text-transform: uppercase;" disabled >
                                                                </div><!-- /input-group -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Placa:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->n_placa;?>" id="placa" name="placa" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Serie:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->n_serie;?>" id="serie" name="serie" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Vin:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->n_vin;?>" id="vin" name="vin" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Motor:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->n_motor;?>" id="motor" name="motor" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Color:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->n_color;?>" id="color" name="color" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Marca:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->marca;?>" id="marca" name="marca" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Modelo:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->modelo;?>" id="modelo" name="modelo" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Placa Vigente:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->placa_vigente;?>" id="placa_vig" name="placa_vig" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Placa Anterior:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->placa_anterior;?>" id="placa_ant" name="placa_ant" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Anotaciones:</label>
                                                                <input type="text" class="form-control" value="<?php echo $vehiculo->anotaciones;?>" id="anotaciones" name="anotaciones" style="text-transform: uppercase;" required>
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
<!-- /.content-wrapper -->