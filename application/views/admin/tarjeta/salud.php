<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>
        <?php echo $personal->nombres . " " . $personal->apellido_pat . " " . $personal->apellido_mat; ?>
        </h4>
    </section>
    <!-- Main content -->
    <section class="content">
    <input type="hidden" class="form-control" id="auxdisablebutton" value="<?php echo $disablebutton; ?>">
        <div class="box box-solid">
            <div class="box-body">
                <div class="tab-content" style="margin-top:16px;">
                    <div class="tab-pane active" id="datospersonales_details">
                        <div class="panel panel-default">
                            <input type="hidden" class="fecha_nacedit" name="fecha_nacedit" value="<?php echo $personal->fecha_nac; ?>">
                            <div class="panel-heading">Detalles Personales</div>
                            <div class="firstStep">
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <img src="<?php echo base_url(); ?>/uploads/<?php echo $personal->imagen; ?>" style="  width: 100%;height: auto;">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Nombres:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->nombres . " " . $personal->apellido_pat . " " . $personal->apellido_mat; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Dni:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->dni; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Grado:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->grado; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Arma:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->arma; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Edad:</label>
                                            <input type="text" class="form-control edad_anual" name="edad" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Peso:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->peso; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Talla:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->talla; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Sexo:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->sexo; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Grupo Sanguíneo:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->grupo_sang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Alergias:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_registro->alergias; ?>" disabled>
                                        </div>
                                    </div>
                                    <div align="center">
                                        <button type="button" name="btn_datospersonales_details" id="btn_datospersonales_details" class="btn btn-info btn-lg">Next</button>
                                    </div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="datosmensuales_details">
                        <div class="panel panel-default">
                            <div class="panel-heading">Control Presión Arterial</div>
                            <div class="secondStep">
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->fecha_registro; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Presión arterial diastólica:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->pres_dia; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Presión arterial sistólica:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->pres_sis; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Pulso:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->pulso; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Valoración:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->valoracion; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="datosanuales_details">
                        <div class="panel panel-default">
                            <div class="panel-heading">Control Perímetro Abdominal</div>
                            <div class="secondStep">
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Fecha:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->fecha_registro; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Peso:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->peso; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>IMC:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->imc; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Clasificación IMC:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->clasi_imc; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Perímetro Abdominal:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->perimetro; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-12">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Clasificación perímetro abdominal:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_mensual->clasi_peri; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Talla:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->talla; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Sexo:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->sexo; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Grupo Sanguíneo:</label>
                                            <input type="text" class="form-control" value="<?php echo $personal->grupo_sang; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Alergias:</label>
                                            <input type="text" class="form-control" value="<?php echo $sanitario_registro->alergias; ?>" disabled>
                                        </div>
                                    </div>
                                    <div align="center" id="hide_review">
                                        <button type="button" name="previous_btn_datospersonales_details" id="previous_btn_datospersonales_details" class="btn btn-default btn-lg">Previous</button>
                                    </div>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<script>

</script>