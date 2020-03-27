<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Unidad
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
                        <form action="<?php echo base_url(); ?>control/unidades/store" method="POST">
                            <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary box-solid">
                                        
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombre">Nombre:</label>
                                                                <input type="text" class="form-control" id="nombre" name="nombre" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="departamento_viv">Departamento:</label>
                                                                <select class="form-control form-control-lg" id="departamento_viv" name="depart_unidad" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Provincia:</label>
                                                                <select class="form-control form-control-lg" id="provin_viv" name="provin_unidad">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_viv">Distrito:</label>
                                                                <select class="form-control form-control-lg" id="distri_viv" name="distri_unidad">
                                                                </select>
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