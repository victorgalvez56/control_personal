
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Descuento
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
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>administrador/descuentos/update" method="POST">
                            <input type="hidden" name="iddescuento" value="<?php echo $descuento->id_desc;?>">
                            <div class="form-group">
                                <label for="motivo_desc">Motivo:</label>
                                <input type="text" class="form-control" id="motivo_desc" name="motivo_desc" value="<?php echo $descuento->motivo_desc?>">
                            </div>
                            <div class="form-group">
                                <label for="monto_desc">Monto:</label>
                                <input type="text" class="form-control" id="monto_desc" name="monto_desc" value="<?php echo $descuento->monto_desc?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
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
