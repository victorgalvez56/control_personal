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
                                                                <label for="depart_nac">Propietario:</label>
                                                                <select name="personal" id="personal" class="form-control">
                                                                    <?php foreach ($personales as $personal) : ?>
                                                                        <option value="<?php echo $personal->id ?>"><?php echo $personal->nombres . " " . $personal->apellido_pat; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select> </div>
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
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Sede:</label>
                                                                <input type="text" class="form-control" id="sede" name="sede" style="text-transform: uppercase;" required>
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
<!--



<div class="modal modal-danger fade" id="modal_popup">
    <div class="modal-dialog modal-sm">
    <form action="<?php echo base_url(); ?>control/personal/storestep1" method="POST">
            <div class="modal-content">
                <div class="modal-header" style="height: 150px;">
                    <h4 style="margin-top: 50px;text-align: center;">Are you sure, do you delete user?</h4>
                    <input type="hidden" name="id" id="user_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">No</button>
                    <button type="submit" name="submit" class="btn btn-success">Yes</button>
                </div>

            </div>

        </form>

    </div>

</div>

-->