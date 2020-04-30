<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>

  <strong>Copyright &copy;2020.</strong> All rights
  reserved.
</footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/template/jquery/jquery.min.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url(); ?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
<!-- Ubigeos -->
<script src="<?php echo base_url(); ?>assets/template/dist/js/ubigeos.js"></script>

<script>
  console.log('Prueba que carga bien el script')
  $(document).on("click", ".btn-print", function() {
    $("#modal-default .modal-body").print({
      title: "Información del Personal"
    });
  });

  $(document).on("click", ".btn-view-personal", function() {
    var base_url = "<?php echo base_url(); ?>";
    valor_id = $(this).val();
    console.log(valor_id)
    $.ajax({
      url: base_url + "control/personal/view",
      type: "POST",
      dataType: "html",
      data: {
        id: valor_id
      },
      success: function(data) {
        $("#modal-default .modal-body").html(data);
        $("#modal-venta .modal-body").html(data);
      }
    });
  });

  $(document).on("click", ".btn-check22", function() {
    $("#modal-default").modal("hide");
    data = $(this).val();
    if (data != '') {
      infoproducto = data.split("*");
      html = "<tr>";
      html += "<td><input type='hidden' name='dni' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
      html += "<td><input type='hidden' name='nombres'  value='" + infoproducto[2] + "'>" + infoproducto[2] + "</td>";
      html += "<td><input type='hidden' name='grado' value='" + infoproducto[3] + "'>" + infoproducto[3] + "</td>";
      html += "<td><input type='hidden' name='sexo' value='" + infoproducto[5] + "'>" + infoproducto[5] + "</td>";
      html += "<td><input type='hidden' name='grupo_sang' value='" + infoproducto[4] + "'>" + infoproducto[4] + "</td>";

      html += "<td><input class='form-control form-control' type='text' name='alergias' list='citynames'  style='text-transform: uppercase;' required><datalist id='citynames'>  <option value='NO'></datalist></td>";
      html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
      html += "</tr>";
      $("#tbventas tbody").append(html);
      $("#buttonsearch").prop("disabled", true);
      $("#btn-check22").val(null);
      $("#nombrePersonalV").val(infoproducto[2]);
      $("#idPersonalV").val(infoproducto[0]);

      console.log('ga')
      $("#idPersonal").val(infoproducto[0]);
    } else {
      alert("seleccione un personal...");
    }
  });

  $(document).on("click", ".btn-checkanual", function() {
    $("#modal-default").modal("hide");
    data = $(this).val();
    if (data != '') {
      infoproducto = data.split("*");
      html = "<tr>";
      html += "<td><input type='hidden' name='dni' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
      html += "<td><input type='hidden' name='nombres'  value='" + infoproducto[2] + "'>" + infoproducto[2] + "</td>";
      html += "<td><input class='form-control form-control' type='text' name='presion' list='citynames'  style='text-transform: uppercase;' required><datalist id='citynames'>  <option value='NO'></datalist></td>";
      html += "<td><input class='form-control form-control' type='text' name='medicacion' list='citynames'  style='text-transform: uppercase;' required><datalist id='citynames'>  <option value='NO'></datalist></td>";
      html += "<td><input type='number' class='form-control form-control' min='1' name='edad'></td>";
      html += "<td><input type='text' class='form-control form-control' min='1' name='talla'></td>";
      html += "<td><input type='text' class='form-control form-control' min='1' name='peso'></td>";
      html += "<td><input type='text' class='form-control form-control' min='1' name='perimetro'></td>";
      html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
      html += "</tr>";
      $("#tbventas tbody").append(html);
      $("#buttonsearch").prop("disabled", true);
      $("#btn-check22").val(null);
    } else {
      alert("seleccione un producto...");
    }
  });

  $(document).on("click", ".btn-checkmensual", function() {
    $("#modal-default").modal("hide");

    data = $(this).val();
    if (data != '') {
      responsable = $("#buttonsearch").val();
      infoproducto = data.split("*");
      $("input[name=sexo_rgm]").val(infoproducto[5]);
      html = "<tr>";
      html += "<td><input type='hidden' name='dni' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
      html += "<td><input type='hidden' name='nombres'  value='" + infoproducto[2] + "'>" + infoproducto[3] + "</td>";
      html += "<td><input type='number' min='0' class='form-control form-control' name='pres_sis' required></td>";
      html += "<td><input type='number' min='0' class='form-control form-control' name='pres_dia' required></td>";
      html += "<td><input type='number' min='0' class='form-control form-control' name='pulso' required></td>";
      html += "<td><input type='text' class='form-control form-control'  size='45' name='valoracion' readonly></td>";
      html += "<td><input type='hidden' name='medico'  value='" + responsable + "'>" + responsable + "</td>";
      html += "<td><input type='number' min='0' id='peso' class='form-control form-control' name='peso' required></td>";
      html += "<td><input type='text' class='form-control form-control' name='imc' readonly></td>";
      html += "<td><input type='text' class='form-control form-control' size='35' name='clasi_imc' readonly></td>";
      html += "<td><input type='number' min='0' class='form-control form-control' name='perimetro'  required></td>";
      html += "<td><input type='text' class='form-control form-control'size='30' name='clasi_peri'readonly></td>";
      html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
      html += "</tr>";
      $("#tbmensual tbody").append(html);
      $("#buttonsearch").prop("disabled", true);
      $("#btn-check22").val(null);
    } else {
      alert("seleccione un producto...");
    }
  });


  $(document).on("keyup", "input[name=peso]", function() {

    calcularImc();
  });

  function calcularImc() {
    peso = $("input[name=peso]").val();
    talla = $("input[name=nombres]").val();
    imc = peso / (talla * talla);
    var imcFix = imc.toFixed(2)
    $("input[name=imc]").val(imc.toFixed(2));
    if (imc < '18.5') {
      $("input[name=clasi_imc]").val('DELGADEZ');
    } else if (imc > '18.5' && imc < '25') {
      $("input[name=clasi_imc]").val('NORMAL');
    } else if (imc => '25' && imc < '30') {
      $("input[name=clasi_imc]").val('SOBREPESO');
    } else if (imc => '30') {
      $("input[name=clasi_imc]").val('OBESIDAD');
    }
  }

  $(document).on("keyup", "input[name=perimetro]", function() {

    calcularPerimetroAbd();
  });

  function calcularPerimetroAbd() {
    perimetro = $("input[name=perimetro]").val();
    sexo = $("input[name=sexo_rgm]").val();

    if (sexo = 'FEMENINO') {
      if (perimetro < 80) {
        $("input[name=clasi_peri]").val('BAJO');
      } else if (perimetro > 79 && perimetro < 88) {
        $("input[name=clasi_peri]").val('ALTO');
      } else if (perimetro > 87) {
        $("input[name=clasi_peri]").val('MUY ALTO');
      }
      if ($("input[name=perimetro]").val().length <= 0) {
        $("input[name=clasi_peri]").val('');
      }
    }
    if (sexo = 'MASCULINO') {
      if (perimetro < 94) {
        $("input[name=clasi_peri]").val('BAJO');
      } else if (perimetro > 93 && perimetro < 102) {
        $("input[name=clasi_peri]").val('ALTO');
      } else if (perimetro > 101) {
        $("input[name=clasi_peri]").val('MUY ALTO');
      }
      if ($("input[name=perimetro]").val().length <= 0) {
        $("input[name=clasi_peri]").val('');
      }
    }
  }

  $(document).on("keyup", "input[name=pres_sis]", function() {

    calcularValoracion();
  });
  $(document).on("keyup", "input[name=pres_dia]", function() {

    calcularValoracion();
  });

  function calcularValoracion() {
    sistolica = $("input[name=pres_sis]").val();
    diastolica = $("input[name=pres_dia]").val();

    if (sistolica < 120 & diastolica < 80) {
      $("input[name=valoracion]").val('NORMAL');
    } else if (sistolica > 119 & sistolica < 140 & diastolica < 91) {
      $("input[name=valoracion]").val('PRE-HIPERTENSION');
    } else if (sistolica > 139) {
      $("input[name=valoracion]").val('HIPERTENSION 1');
    }
    if ($("input[name=pres_sis]").val().length <= 0) {
      $("input[name=valoracion]").val('');
    }
  }


  $(document).on("click", ".btn-remove-producto", function() {
    $(this).closest("tr").remove();
    $("#buttonsearch").prop("disabled", false);
  });
  $('#example5').dataTable({
    "order": [],
    "columnDefs": [{
      "targets": 'no-sort',
      "orderable": false,
    }]
  });

  $(document).on('click', '.btn-modal', function() {

    var id = $(this).attr('uid');

    $('#user_id').val(id);

    $('#modal_popup').modal({
      backdrop: 'static',
      keyboard: true,
      show: true
    });
  });

  /* Jquery para departamento, provincia y distrito vivienda.*/
  $(document).ready(function() {
    var selectdep = $('#departamento_viv');
    selectdep.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      selectdep.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  });

  $("#departamento_viv").change(function() {
    var departamentoc = $("#departamento_viv").val();
    $.each(ubigeo.departamentos, function(i, item) {
      if (departamentoc == item.nombre_ubigeo) {
        var id_departamento = item.id_ubigeo
        inputProvinc(id_departamento)
      }
    });
  });

  function inputProvinc(id_departamento) {
    var provin_viv = $('#provin_viv');
    provin_viv.empty()
    var auxiliar_viv = $('#auxiliar_viv');
    auxiliar_viv.val(id_departamento)
    provin_viv.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.provincias[id_departamento], function(i, item) {
      provin_viv.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  }

  $("#provin_viv").change(function() {
    auxiliar_viv = $('#auxiliar_viv').val();
    var provin_viv = $('#provin_viv').val();
    var selectdistri = $('#distri_viv');
    selectdistri.empty()
    console.log(auxiliar_viv)
    $.each(ubigeo.provincias[auxiliar_viv], function(i, item) {
      if (provin_viv == item.nombre_ubigeo) {
        var id_provincia = item.id_ubigeo
        inputDistrit(id_provincia)
      }
    });
  });

  function inputDistrit(id_provincia) {
    var selectdistr = $('#distri_viv');
    selectdistr.empty()
    selectdistr.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.distritos[id_provincia], function(i, item) {
      selectdistr.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  }
  //-------------------------------------------------------------------------------------------------------------
  /* Jquery para departamento, provincia y distrito vivienda.*/
  $(document).ready(function() {
    var selectdep = $('#depart_nac');
    selectdep.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      selectdep.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  });

  $("#depart_nac").change(function() {
    var departamentoc = $("#depart_nac").val();
    $.each(ubigeo.departamentos, function(i, item) {
      if (departamentoc == item.nombre_ubigeo) {
        var id_departamento = item.id_ubigeo
        inputProvincNac(id_departamento)
      }
    });
  });

  function inputProvincNac(id_departamento) {
    var provin_nac = $('#provin_nac');
    provin_nac.empty()
    var auxiliar_nac = $('#auxiliar_nac');
    auxiliar_nac.val(id_departamento)
    provin_nac.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.provincias[id_departamento], function(i, item) {
      provin_nac.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  }

  $("#provin_nac").change(function() {
    auxiliar_nac = $('#auxiliar_nac').val();
    var provin_nac = $('#provin_nac').val();
    var selectdistri = $('#distri_nac');
    selectdistri.empty()
    $.each(ubigeo.provincias[auxiliar_nac], function(i, item) {
      if (provin_nac == item.nombre_ubigeo) {
        var id_provincia = item.id_ubigeo
        inputDistritNac(id_provincia)
      }
    });
  });

  function inputDistritNac(id_provincia) {
    var selectdistr = $('#distri_nac');
    selectdistr.empty()
    selectdistr.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.distritos[id_provincia], function(i, item) {
      selectdistr.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  }
  //-------------------------------------------------------------------------------------------------------------




  $(document).on("click", ".btn-agregaridioma", function() {
    html = "<tr>";
    html += "<td><input type='text' class='form-control' id='idioma' name='idioma[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><select class='form-control form-control' id='idioma_habla' name='idioma_habla[]' required><option value=''>Seleccione</option><option value='B'>B</option><option value='R'>R</option><option value'M'>M</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_lee' name='idioma_lee[]'><option value=''>Seleccione</option><option value='B'>B</option><option value='R'>R</option><option value'M'>M</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_escribe' name='idioma_escribe[]'><option value=''>Seleccione</option><option value='B'>B</option><option value='R'>R</option><option value'M'>M</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_estudio' name='idioma_estudio[]'><option value=''>Seleccione</option><option>ESTUDIO</option><option>PRACTICA</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_practica' name='idioma_practica[]'><option value=''>Seleccione</option><option value='SI'>SI</option><option value='NO'>NO</option></select></td>";
    html += "<td><button type='button' class='btn btn-danger btn-remove-idioma'><span class='fa fa-remove'></span></button></td>";
    html += "</tr>";
    $("#tbidiomas tbody").append(html);
    $("#btn-agregaridioma").val(null);
  });
  $(document).on("click", ".btn-remove-idioma", function() {
    $(this).closest("tr").remove();
  });


  $(document).on("click", ".btn-agregarfamiliares", function() {
    html = "<tr id='tableremove1'>";
    html += "<td><input type='text' class='form-control' id='idioma' name='nombresfamiliar[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='text' class='form-control' id='parentesco' name='parentesco[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='number' class='form-control' id='edad' name='edad[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='text' class='form-control' id='lugar_nac' name='lugar_nac[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='date' class='form-control' id='fecha_nac' name='fecha_nac[]' style='text-transform: uppercase;' required ></td>";
    html += "</tr>";
    $("#tbfamiliares1 tbody").append(html);
    $("#btn-agregarfamiliares").val(null);
  });

  $(document).on("click", ".btn-agregarfamiliares", function() {
    html = "<tr id='tableremove2'>";
    html += "<td><input type='number' class='form-control' id='cip' name='cip[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='number' class='form-control' id='dni' name='dni[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='number' class='form-control' id='telefono' name='telefono[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><select class='form-control form-control' id='tipo_sangr' name='tipo_sangr[]'><option value=''>Seleccione</option><option value='A+'>A+</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='B-'>B-</option><option value='AB+'>AB+</option><option value='AB-'>AB-</option><option value='O+'>O+</option><option value='O-'>O-</option></select></td>";
    html += "<td><select class='form-control form-control' id='grado_instr' name='grado_instr[]'><option value=''>Seleccione</option><option value='PRIMARIA'>PRIMARIA</option><option value='SECUNDARIA'>SECUNDARIA</option><option value='TECNICO'>TECNICO</option><option value='SUPERIOR'>SUPERIOR</option></select></td>";
    html += "<td><button type='button' class='btn btn-danger btn-remove-familiares'><span class='fa fa-remove'></span></button></td>";
    html += "</tr>";
    $("#tbfamiliares2 tbody").append(html);
    $("#btn-agregarfamiliares").val(null);
  });


  $(document).on("click", ".btn-remove-familiares", function() {
    document.getElementById("tableremove1").remove();
    document.getElementById("tableremove2").remove();

  });


  $(document).on("click", ".btn-viajesExtranjero", function() {
    html = "<tr>";
    html += "<td><input type='text' class='form-control' id='lugar' name='lugar[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='text' class='form-control' id='motivo' name='motivo[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><input type='date' class='form-control' id='fecha_viaje' name='fecha_viaje[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><button type='button' class='btn btn-danger btn-remove-viajesExtranjero'><span class='fa fa-remove'></span></button></td>";
    html += "</tr>";
    $("#tbviajesExtranjero tbody").append(html);
    $("#btn-agregarviajesExtranjero").val(null);
  });
  $(document).on("click", ".btn-remove-viajesExtranjero", function() {
    $(this).closest("tr").remove();
  });

  $(document).on("click", ".btn-estudiosRealizados", function() {
    html = "<tr>";
    html += "<td><input type='text' class='form-control' id='curso' name='curso[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><select class='form-control form-control' id='tipo_curso' name='tipo_curso[]'><option value=''>Seleccione</option><option value='MILITAR'>MILITAR</option><option value='EXTRACASTRENCE'>EXTRACASTRENCE</option></select></td>";
    html += "<td><button type='button' class='btn btn-danger btn-remove-estudiosRealizados'><span class='fa fa-remove'></span></button></td>";
    html += "</tr>";
    $("#tbestudiosRealizados tbody").append(html);
    $("#btn-estudiosRealizados").val(null);
  });
  $(document).on("click", ".btn-remove-estudiosRealizados", function() {
    $(this).closest("tr").remove();
  });

  $(document).on("click", ".btn-seguro", function() {
    html = "<tr>";
    html += "<td><input type='text' class='form-control' id='curso' name='seguro[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><select class='form-control form-control' id='tipo_seguro' name='tipo_seguro[]'><option value=''>Seleccione</option><option value='MILITAR'>MILITAR</option><option value='CIVIL'>CIVIL</option></select></td>";
    html += "<td><button type='button' class='btn btn-danger btn-remove-seguro'><span class='fa fa-remove'></span></button></td>";
    html += "</tr>";
    $("#tbseguro tbody").append(html);
    $("#btn-seguro").val(null);
  });
  $(document).on("click", ".btn-remove-seguro", function() {
    $(this).closest("tr").remove();
  });




  $(document).ready(function() {

    //------------------ PRIMER STEP REGISTRO PERSONAL --------------------------
    $('#btn_login_details').click(function() {

      var error_foto = '';
      var error_grado = '';
      var error_arma = '';
      var error_apelPaterno = '';
      var error_apelMaterno = '';
      var error_nombres = '';
      var error_estCivil = '';
      var error_anioServicio = '';
      var error_gradInst = '';
      var error_religion = '';
      var error_fecAsc = '';

      if ($.trim($('#grado').val()).length == 0) {
        error_grado = 'Seleccione Grado por favor \n';
        $('#grado').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione un Grado</p></div>");
      } else {
        error_grado = '';
        $('#grado').removeClass('has-error');
      }

      if ($.trim($('#arma').val()).length == 0) {
        error_arma = 'Seleccione Arma por favor \n';
        $('#arma').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione un Arma</p></div>");
      } else {
        error_arma = '';
        $('#arma').removeClass('has-error');
      }

      if ($.trim($('#apellido_pat').val()).length == 0) {
        error_apelPaterno = 'OK';
        $('#apellido_pat').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete Apellido Paterno</p></div>");
      } else {
        error_apelPaterno = '';
        $('#apellido_pat').removeClass('has-error');
      }

      if ($.trim($('#apellido_mat').val()).length == 0) {
        error_apelMaterno = 'OK';
        $('#apellido_mat').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete Apellido Materno</p></div>");
      } else {
        error_apelPaterno = '';
        $('#apellido_mat').removeClass('has-error');
      }

      if ($.trim($('#nombres').val()).length == 0) {
        error_nombres = 'OK';
        $('#nombres').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete Nombres</p></div>");
      } else {
        error_apelPaterno = '';
        $('#nombres').removeClass('has-error');
      }


      if ($.trim($('#estado_civ').val()).length == 0) {
        error_estCivil = 'OK';
        $('#estado_civ').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione Estado civil</p></div>");
      } else {
        error_estCivil = '';
        $('#estado_civ').removeClass('has-error');
      }


      if ($.trim($('#a_servicio').val()).length == 0) {
        error_estCivil = 'OK';
        $('#a_servicio').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete Años de Servicio</p></div>");
      } else {
        error_anioServicio = '';
        $('#a_servicio').removeClass('has-error');
      }


      if ($.trim($('#grado_ins_per').val()).length == 0) {
        error_gradInst = 'OK';
        $('#grado_ins_per').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione Grado de Instrucción</p></div>");
      } else {
        error_gradInst = '';
        $('#grado_ins_per').removeClass('has-error');
      }

      if ($.trim($('#religion').val()).length == 0) {
        error_religion = 'OK';
        $('#religion').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete la Religión</p></div>");
      } else {
        error_religion = '';
        $('#religion').removeClass('has-error');
      }

      if ($.trim($('#fec_ult_asc').val()).length == 0) {
        error_fecAsc = 'OK';
        $('#fec_ult_asc').addClass('has-error');
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoga la fecha del último ascenso</p></div>");
      } else {
        error_fecAsc = '';
        $('#fec_ult_asc').removeClass('has-error');
      }

      if (error_grado != '' || error_apelPaterno != '' || error_apelMaterno != '' ||
        error_arma != '' || error_nombres != '' || error_estCivil != '' || error_anioServicio != '' ||
        error_gradInst != '' || error_religion != '' || error_fecAsc != '') {
        return false;
      } else {
        $('#list_login_details').removeClass('active active_tab1');
        $('#list_login_details').removeAttr('href data-toggle');
        $('#login_details').removeClass('active');
        $('#list_login_details').addClass('inactive_tab1');
        $('#list_personal_details').removeClass('inactive_tab1');
        $('#list_personal_details').addClass('active_tab1 active');
        $('#list_personal_details').attr('href', '#personal_details');
        $('#list_personal_details').attr('data-toggle', 'tab');
        $('#personal_details').addClass('active in');
      }
    });

    $('#previous_btn_personal_details').click(function() {
      $('#list_personal_details').removeClass('active active_tab1');
      $('#list_personal_details').removeAttr('href data-toggle');
      $('#personal_details').removeClass('active in');
      $('#list_personal_details').addClass('inactive_tab1');
      $('#list_login_details').removeClass('inactive_tab1');
      $('#list_login_details').addClass('active_tab1 active');
      $('#list_login_details').attr('href', '#login_details');
      $('#list_login_details').attr('data-toggle', 'tab');
      $('#login_details').addClass('active in');
    });

    $('#btn_personal_details').click(function() {
      var error_departVivienda = '';
      var error_provinVivienda = '';
      var error_distriVivienda = '';
      var error_urbanizacion = '';
      var error_calle = '';

      if ($.trim($('#departamento_viv').val()).length == 0) {
        error_departVivienda = 'OK';
        $('#departamento_viv').addClass('has-error');
        $(".secondStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione el Departamento</p></div>");
      } else {
        error_departVivienda = '';
        $('#departamento_viv').removeClass('has-error');
      }

      if ($.trim($('#provin_viv').val()).length == 0) {
        error_provinVivienda = 'OK';
        $('#provin_viv').addClass('has-error');
        $(".secondStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione la Provincia</p></div>");
      } else {
        error_provinVivienda = '';
        $('#provin_viv').removeClass('has-error');
      }

      if ($.trim($('#distri_viv').val()).length == 0) {
        error_distriVivienda = 'OK';
        $('#distri_viv').addClass('has-error');
        $(".secondStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione el Distrito</p></div>");
      } else {
        error_distriVivienda = '';
        $('#distri_viv').removeClass('has-error');
      }

      if ($.trim($('#urbanizacion').val()).length == 0) {
        error_urbanizacion = 'OK';
        $('#urbanizacion').addClass('has-error');
        $(".secondStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete la Urbanizacion</p></div>");
      } else {
        error_urbanizacion = '';
        $('#urbanizacion').removeClass('has-error');
      }

      if ($.trim($('#calle').val()).length == 0) {
        error_calle = 'OK';
        $('#calle').addClass('has-error');
        $(".secondStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete la Calle/Mz.</p></div>");
      } else {
        error_calle = '';
        $('#calle').removeClass('has-error');
      }

      if (
        error_departVivienda != '' ||
        error_provinVivienda != '' ||
        error_distriVivienda != '' ||
        error_urbanizacion != '' ||
        error_calle != ''
      ) {
        return false;
      } else {
        $('#list_personal_details').removeClass('active active_tab1');
        $('#list_personal_details').removeAttr('href data-toggle');
        $('#personal_details').removeClass('active');
        $('#list_personal_details').addClass('inactive_tab1');
        $('#list_contact_details').removeClass('inactive_tab1');
        $('#list_contact_details').addClass('active_tab1 active');
        $('#list_contact_details').attr('href', '#contact_details');
        $('#list_contact_details').attr('data-toggle', 'tab');
        $('#contact_details').addClass('active in');
      }
    });

    $('#previous_btn_contact_details').click(function() {
      $('#list_contact_details').removeClass('active active_tab1');
      $('#list_contact_details').removeAttr('href data-toggle');
      $('#contact_details').removeClass('active in');
      $('#list_contact_details').addClass('inactive_tab1');
      $('#list_personal_details').removeClass('inactive_tab1');
      $('#list_personal_details').addClass('active_tab1 active');
      $('#list_personal_details').attr('href', '#personal_details');
      $('#list_personal_details').attr('data-toggle', 'tab');
      $('#personal_details').addClass('active in');
    });

    $('#btn_contact_details').click(function() {
      var error_telef_per = '';
      var error_operador = '';
      var error_correo = '';
 
      if ($.trim($('#telef_per').val()).length == 0) {
        error_telef_per = 'OK';
        $('#telef_per').addClass('has-error');
        $(".thirdStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Número telefónico</p></div>");
      } else {
        error_telef_per = '';
        $('#telef_per').removeClass('has-error');
      }

      if ($.trim($('#operador').val()).length == 0) {
        error_operador = 'OK';
        $('#operador').addClass('has-error');
        $(".thirdStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Operador</p></div>");
      } else {
        error_operador = '';
        $('#operador').removeClass('has-error');
      }

      if ($.trim($('#correo').val()).length == 0) {
        error_correo = 'OK';
        $('#correo').addClass('has-error');
        $(".thirdStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete un Correo Electrónico</p></div>");
      } else {
        error_correo = '';
        $('#correo').removeClass('has-error');
      }

      if (
        error_telef_per != '' ||
        error_operador != '' ||
        error_correo != ''
      ) {
        return false;
      } else {
        $('#list_born_details').removeClass('active active_tab1');
        $('#list_born_details').removeAttr('href data-toggle');
        $('#born_details').removeClass('active');
        $('#list_born_details').addClass('inactive_tab1');
        $('#list_contact_details').removeClass('inactive_tab1');
        $('#list_contact_details').addClass('active_tab1 active');
        $('#list_contact_details').attr('href', '#contact_details');
        $('#list_contact_details').attr('data-toggle', 'tab');
        $('#contact_details').addClass('active in');
      }
    });

  });
</script>
<style>
  .active_tab1 {
    background-color: #3c8dbc;
    color: #333;
    font-weight: 600;
  }

  .inactive_tab1 {
    background-color: #f5f5f5;
    color: #333;
    cursor: not-allowed;
  }

  .has-error {
    border-color: #cc0000;
    background-color: #ffff99;
  }
</style>
</body>

</html>