<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.2
  </div>

  <strong>Copyright Vanessa Vargas Gutierrez - Teléfono: 970 510 581 &copy;2020 .</strong> All rights
  reserved.
</footer>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
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
<script src="<?php echo base_url(); ?>assets/template/dist/js/ubigeos.js"></script>

<script>
  console.log('Prueba que carga bien el script')

  $(document).on("keyup", 'input[type="text"]', function() {
    if (!/^[ /ña-z0-9]*$/i.test(this.value)) {
      this.value = this.value.replace(/[^ /ña-z0-9]+/ig, "");
    }
  })


  $(document).on("click", ".btn-print", function() {
    $("#modal-default .modal-body").print({
      title: "Información del Personal"
    });
  });

  $(document).on("click", ".btn-view-personal-militar", function() {
    var base_url = "<?php echo base_url(); ?>";
    valor_id = $(this).val();
    console.log(valor_id)
    $.ajax({
      url: base_url + "control/personal_militar/view",
      type: "POST",
      dataType: "html",
      data: {
        id: valor_id
      },
      success: function(data) {
        $("#modal-default .modal-body").html(data);
      }
    });
  });


  $(document).on("click", ".btn-view-personal-civil", function() {
    var base_url = "<?php echo base_url(); ?>";
    valor_id = $(this).val();
    console.log(valor_id)
    $.ajax({
      url: base_url + "control/personal_civil/view",
      type: "POST",
      dataType: "html",
      data: {
        id: valor_id
      },
      success: function(data) {
        $("#modal-default .modal-body").html(data);
      }
    });
  });

  $(document).on("click", ".btn-view-tarjeta", function() {
    var base_url = "<?php echo base_url(); ?>";
    valor_id = $(this).val();
    console.log(valor_id)
    $.ajax({
      url: base_url + "control/tarjeta_identidad/view",
      type: "POST",
      dataType: "html",
      data: {
        id: valor_id
      },
      success: function(data) {
        $("#modal-default .modal-body").html(data);
      }
    });
  });


  $(document).on("click", ".btn-print-vehiculo", function() {
    $("#modal-default .modal-body").print({
      title: "Información del Vehículo"
    });
  });
  $(document).on("click", ".btn-view-vehiculo", function() {
    var base_url = "<?php echo base_url(); ?>";
    valor_id = $(this).val();
    console.log(valor_id)
    $.ajax({
      url: base_url + "control/vehiculos/view",
      type: "POST",
      dataType: "html",
      data: {
        id: valor_id
      },
      success: function(data) {
        $("#modal-default .modal-body").html(data);
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
      //$("#buttonsearch").prop("disabled", true);
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
      $("input[name=fecha_nacedit]").val(infoproducto[6]);

      var hoy = new Date();
      var nac = infoproducto[6];
      var cumpleanos = new Date(nac);
      var edad = hoy.getFullYear() - cumpleanos.getFullYear();
      var m = hoy.getMonth() - cumpleanos.getMonth();

      if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
      }

      html = "<tr>";
      html += "<td><input type='hidden' name='dni' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
      html += "<td><input type='hidden' name='nombres'  value='" + infoproducto[2] + "'>" + infoproducto[2] + "</td>";
      html += "<td><input class='form-control form-control' type='text' name='presion' list='citynames'  style='text-transform: uppercase;' required><datalist id='citynames'>  <option value='NO'></datalist></td>";
      html += "<td><input class='form-control form-control' type='text' name='medicacion' list='citynames'  style='text-transform: uppercase;' required><datalist id='citynames'>  <option value='NO'></datalist></td>";
      html += "<td><input type='number' class='form-control form-control edad_anual' min='1' name='edad' readonly value='" + edad + "'></td>";
      html += "<td><input type='number'  step = '0.01'  class='form-control form-control' min='1' name='talla' required></td>";
      html += "<td><input type='number'  step = '0.01' class='form-control form-control' min='1' name='peso' required></td>";
      html += "<td><input type='number'  step = '0.01' class='form-control form-control' min='1' name='perimetro' required></td>";
      html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
      html += "</tr>";
      $("#tbventas tbody").append(html);
      //$("#buttonsearch").prop("disabled", true);
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
    } else {
      alert("seleccione un producto...");
    }
  });


  $(document).on("keyup", "input[name=peso]", function() {
    calcularImc();
  });
  $(document).on("change", "input[name=peso]", function() {

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
  $(document).on("onchange", "input[name=perimetro]", function() {

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
  $(document).on("change", "input[name=pres_sis]", function() {

    calcularValoracion();
  });

  function calcularValoracion() {
    sistolica = $("input[name=pres_sis]").val();
    diastolica = $("input[name=pres_dia]").val();

    if (sistolica < 120) {
      $("input[name=valoracion]").val('NORMAL');
      $("input[name=pres_dia]").attr({
        "max": 79,
        "min": 0
      });
    } else if (sistolica > 119 & sistolica < 140) {
      $("input[name=valoracion]").val('PRE-HIPERTENSIÓN');
      $("input[name=pres_dia]").attr({
        "max": 89,
        "min": 0
      });
    } else if (sistolica > 139 & sistolica < 160) {
      $("input[name=valoracion]").val('HIPERTENSIÓN 1');
      $("input[name=pres_dia]").attr({
        "max": 99,
        "min": 90
      });
    } else if (sistolica > 159 & sistolica < 180) {
      $("input[name=valoracion]").val('HIPERTENSIÓN 2');
      $("input[name=pres_dia]").attr({
        "max": 110,
        "min": 100
      });
    } else if (sistolica > 179) {
      $("input[name=valoracion]").val('CRISIS DE HIPERTENSIÓN');
      $("input[name=pres_dia]").attr({
        "min": 220,
        "max": 700
      });
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



  $(document).on("click", ".btn-agregaridioma", function() {
    html = "<tr>";
    html += "<td><input type='text' class='form-control' id='idioma' name='idioma[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><select class='form-control form-control' id='idioma_habla' name='idioma_habla[]' required><option value=''>Seleccione</option><option value='B'>B</option><option value='R'>R</option><option value'M'>M</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_lee' name='idioma_lee[]' required ><option value=''>Seleccione</option><option value='B'>B</option><option value='R'>R</option><option value='M'>M</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_escribe' name='idioma_escribe[]' required><option value=''>Seleccione</option><option value='B'>B</option><option value='R'>R</option><option value='M'>M</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_estudio' name='idioma_estudio[]' required><option value=''>Seleccione</option><option>ESTUDIO</option><option>PRACTICA</option></select></td>";
    html += "<td><select class='form-control form-control' id='idioma_practica' name='idioma_practica[]' required ><option value=''>Seleccione</option><option value='SI'>SI</option><option value='NO'>NO</option></select></td>";
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
    html += "<td><select class='form-control form-control' id='parentesco' name='parentesco[]' required><option value=''>Seleccione</option><option value='PADRE'>PADRE</option><option value='MADRE'>MADRE</option><option value='CONYUGE'>CONYUGE</option><option value='HIJO'>HIJO</option><option value='HIJA'>HIJA</option></select></td>";
    html += "<td><input type='number' class='form-control' min='0' id='edad' name='edad[]' style='text-transform: uppercase;' required ></td>";
    html += "<td><select class='form-control form-control lugar_nac' id='lugar_nac' name='lugar_nac[]' required></select></td>";
    html += "<td><input type='date' class='form-control' id='fecha_nac' name='fecha_nac[]' style='text-transform: uppercase;' required ></td>";
    html += "</tr>";
    $("#tbfamiliares1 tbody").append(html);
    $("#btn-agregarfamiliares").val(null);

    var lugar_nac = $('.lugar_nac');
    lugar_nac.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      lugar_nac.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });


  });
  var lugar_nac = $('.lugar_nac');
    lugar_nac.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      lugar_nac.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
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

    //------------------ PRIMER STEP DATOS PERSONALES --------------------------
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



    //------------------ SEGUNDO STEP DIRECCIÓN ACTUAL --------------------------

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


    //------------------ TERCER STEP CONTACTO --------------------------


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
        $('#list_contact_details').removeClass('active active_tab1');
        $('#list_contact_details').removeAttr('href data-toggle');
        $('#contact_details').removeClass('active');
        $('#list_contact_details').addClass('inactive_tab1');
        $('#list_born_details').removeClass('inactive_tab1');
        $('#list_born_details').addClass('active_tab1 active');
        $('#list_born_details').attr('href', '#born_details');
        $('#list_born_details').attr('data-toggle', 'tab');
        $('#born_details').addClass('active in');

      }
    });

    //------------------ CUARTO STEP LUGAR Y FECHA NACIMIENTO --------------------------

    $("#fecha_nac").change(function() {
      var hoy = new Date();
      var nac = $("#fecha_nac").val();
      var cumpleanos = new Date(nac);
      var edad = hoy.getFullYear() - cumpleanos.getFullYear();
      var m = hoy.getMonth() - cumpleanos.getMonth();

      if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
      }
      $(".edad_nac").val(edad)
    });

    $(document).ready(function() {

      var hoy = new Date();
      var nac = $(".fecha_nacedit").val();
      var cumpleanos = new Date(nac);
      var edad = hoy.getFullYear() - cumpleanos.getFullYear();
      var m = hoy.getMonth() - cumpleanos.getMonth();

      if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
      }
      $(".edad_anual").val(edad)
    });


    $('#btn_personal_born').click(function() {
      var error_departnacimiento = '';
      var error_provicnacimiento = '';
      var error_distrinacimiento = '';
      var error_fechanacimiento = '';
      var error_edadnacimiento = '';

      if ($.trim($('#depart_nac').val()).length == 0) {
        error_departnacimiento = 'OK';
        $('#depart_nac').addClass('has-error');
        $(".fourthStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione un Departamento</p></div>");
      } else {
        error_departnacimiento = '';
        $('#depart_nac').removeClass('has-error');
      }

      if ($.trim($('#provin_nac').val()).length == 0) {
        error_provicnacimiento = 'OK';
        $('#provin_nac').addClass('has-error');
        $(".fourthStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione una Provincia</p></div>");
      } else {
        error_provicnacimiento = '';
        $('#provin_nac').removeClass('has-error');
      }

      if ($.trim($('#distri_nac').val()).length == 0) {
        error_distrinacimiento = 'OK';
        $('#distri_nac').addClass('has-error');
        $(".fourthStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Seleccione un Distrito</p></div>");
      } else {
        error_distrinacimiento = '';
        $('#distri_nac').removeClass('has-error');
      }
      if ($.trim($('#fecha_nac').val()).length == 0) {
        error_fechanacimiento = 'OK';
        $('#fecha_nac').addClass('has-error');
        $(".fourthStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete una fecha</p></div>");
      } else {
        error_fechanacimiento = '';
        $('#fecha_nac').removeClass('has-error');
      }
      if ($('#edad_nac').val() <= 17) {
        error_edadnacimiento = 'OK';
        $('#edad_nac').addClass('has-error');
        $(".fourthStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Se tiene que ser mayor de edad</p></div>");
      } else {
        error_edadnacimiento = '';
        $('#edad_nac').removeClass('has-error');
      }

      if (
        error_departnacimiento != '' ||
        error_provicnacimiento != '' ||
        error_distrinacimiento != '' ||
        error_fechanacimiento != '' ||
        error_edadnacimiento != ''
      ) {
        return false;
      } else {

        $('#list_born_details').removeClass('active active_tab1');
        $('#list_born_details').removeAttr('href data-toggle');
        $('#born_details').removeClass('active');
        $('#list_born_details').addClass('inactive_tab1');
        $('#list_documents_details').removeClass('inactive_tab1');
        $('#list_documents_details').addClass('active_tab1 active');
        $('#list_documents_details').attr('href', '#born_details');
        $('#list_documents_details').attr('data-toggle', 'tab');
        $('#documents_details').addClass('active in');
      }
    });


    //------------------ 5TO STEP LUGAR Y DOCUMENTOS --------------------------


    $('#btn_personal_documents').click(function() {
      var error_cip = '';
      var error_dni = '';
      var error_pasaporte = '';
      var error_brevete = '';

      if ($.trim($('#cip_per').val()).length == 0) {
        error_cip = 'OK';
        $('#cip_per').addClass('has-error');
        $(".fivethStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Cip</p></div>");
      } else {
        error_cip = '';
        $('#cip_per').removeClass('has-error');
      }

      if ($.trim($('#dni_per').val()).length == 0) {
        error_dni = 'OK';
        $('#dni_per').addClass('has-error');
        $(".fivethStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Dni</p></div>");
      } else {
        error_dni = '';
        $('#dni_per').removeClass('has-error');
      }

      if ($.trim($('#pasaporte').val()).length == 0) {
        error_pasaporte = 'OK';
        $('#pasaporte').addClass('has-error');
        $(".fivethStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Pasaporte</p></div>");
      } else {
        error_pasaporte = '';
        $('#pasaporte').removeClass('has-error');
      }
      if ($.trim($('#brevete').val()).length == 0) {
        error_brevete = 'OK';
        $('#brevete').addClass('has-error');
        $(".fivethStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete uel Brevete</p></div>");
      } else {
        error_brevete = '';
        $('#brevete').removeClass('has-error');
      }

      if (
        error_cip != '' ||
        error_dni != '' ||
        error_pasaporte != '' ||
        error_brevete != ''
      ) {
        return false;
      } else {
        $('#list_documents_details').removeClass('active active_tab1');
        $('#list_documents_details').removeAttr('href data-toggle');
        $('#documents_details').removeClass('active');
        $('#list_documents_details').addClass('inactive_tab1');
        $('#list_caracters_details').removeClass('inactive_tab1');
        $('#list_caracters_details').addClass('active_tab1 active');
        $('#list_caracters_details').attr('href', '#caracters_detailss');
        $('#list_caracters_details').attr('data-toggle', 'tab');
        $('#caracters_details').addClass('active in');
      }
    });


    //------------------ 6TO STEP LUGAR Y DOCUMENTOS --------------------------


    $('#btn_personal_caracters').click(function() {
      var error_talla = '';
      var error_peso = '';
      var error_grupoSang = '';
      var error_sexo = '';

      if ($.trim($('#talla').val()).length == 0) {
        error_talla = 'OK';
        $('#talla').addClass('has-error');
        $(".sixStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete la Talla</p></div>");
      } else {
        error_talla = '';
        $('#talla').removeClass('has-error');
      }

      if ($.trim($('#peso').val()).length == 0) {
        error_peso = 'OK';
        $('#peso').addClass('has-error');
        $(".sixStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Peso</p></div>");
      } else {
        error_peso = '';
        $('#peso').removeClass('has-error');
      }

      if ($.trim($('#grupo_sang').val()).length == 0) {
        error_grupoSang = 'OK';
        $('#grupo_sang').addClass('has-error');
        $(".sixStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el Grupo Sanguíneo</p></div>");
      } else {
        error_pasaporte = '';
        $('#grupo_sang').removeClass('has-error');
      }
      if ($.trim($('#sexo').val()).length == 0) {
        error_sexo = 'OK';
        $('#sexo').addClass('has-error');
        $(".sixStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete uel Brevete</p></div>");
      } else {
        error_sexo = '';
        $('#sexo').removeClass('has-error');
      }

      if (
        error_talla != '' ||
        error_peso != '' ||
        error_grupoSang != '' ||
        error_sexo != ''
      ) {
        return false;
      } else {
        $('#list_caracters_details').removeClass('active active_tab1');
        $('#list_caracters_details').removeAttr('href data-toggle');
        $('#caracters_details').removeClass('active');
        $('#list_caracters_details').addClass('inactive_tab1');
        $('#list_clothes_details').removeClass('inactive_tab1');
        $('#list_clothes_details').addClass('active_tab1 active');
        $('#list_clothes_details').attr('href', '#clothes_details');
        $('#list_clothes_details').attr('data-toggle', 'tab');
        $('#clothes_details').addClass('active in');
      }
    });

    //------------------ 7TO STEP LUGAR Y DOCUMENTOS --------------------------


    $('#btn_personal_clothes').click(function() {
      var error_camisa = '';
      var error_pantalon = '';
      var error_calzado = '';
      var error_cabeza = '';
      if ($.trim($('#camisa').val()).length == 0) {
        error_camisa = 'OK';
        $('#camisa').addClass('has-error');
        $(".sevenStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja talla de Camisa</p></div>");
      } else {
        error_camisa = '';
        $('#camisa').removeClass('has-error');
      }

      if ($.trim($('#pantalon').val()).length == 0) {
        error_pantalon = 'OK';
        $('#pantalon').addClass('has-error');
        $(".sevenStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja talla de Pantalón</p></div>");
      } else {
        error_pantalon = '';
        $('#pantalon').removeClass('has-error');
      }

      if ($.trim($('#calzado').val()).length == 0) {
        error_calzado = 'OK';
        $('#calzado').addClass('has-error');
        $(".sevenStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja talla del Calzado</p></div>");
      } else {
        error_calzado = '';
        $('#calzado').removeClass('has-error');
      }
      if ($.trim($('#cabeza').val()).length == 0) {
        error_cabeza = 'OK';
        $('#cabeza').addClass('has-error');
        $(".sevenStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja talla para prenda de Cabeza</p></div>");
      } else {
        error_cabeza = '';
        $('#cabeza').removeClass('has-error');
      }

      if (
        error_camisa != '' ||
        error_pantalon != '' ||
        error_calzado != '' ||
        error_cabeza != ''
      ) {
        console.log('ga')

        return false;
      } else {
        console.log('ga2')

        $('#list_clothes_details').removeClass('active active_tab1');
        $('#list_clothes_details').removeAttr('href data-toggle');
        $('#clothes_details').removeClass('active');
        $('#list_clothes_details').addClass('inactive_tab1');
        $('#list_remuneration_details').removeClass('inactive_tab1');
        $('#list_remuneration_details').addClass('active_tab1 active');
        $('#list_remuneration_details').attr('href', '#remuneration_detailss');
        $('#list_remuneration_details').attr('data-toggle', 'tab');
        $('#remuneration_details').addClass('active in');
      }
    });

    //------------------ 8TO STEP LUGAR Y DOCUMENTOS --------------------------


    $('#btn_personal_remuneration').click(function() {
      var error_banco = '';
      var error_nroCuenta = '';
      var error_afiliacion = '';

      if ($.trim($('#banco').val()).length == 0) {
        error_banco = 'OK';
        $('#banco').addClass('has-error');
        $(".eightStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Banco</p></div>");
      } else {
        error_banco = '';
        $('#banco').removeClass('has-error');
      }

      if ($.trim($('#nro_cuenta').val()).length == 0) {
        error_nroCuenta = 'OK';
        $('#nro_cuenta').addClass('has-error');
        $(".eightStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el N° de cuenta</p></div>");
      } else {
        error_nroCuenta = '';
        $('#nro_cuenta').removeClass('has-error');
      }

      if ($.trim($('#afiliacion').val()).length == 0) {
        error_afiliacion = 'OK';
        $('#afiliacion').addClass('has-error');
        $(".eightStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja la afiliación</p></div>");
      } else {
        error_afiliacion = '';
        $('#afiliacion').removeClass('has-error');
      }

      if (
        error_banco != '' ||
        error_nroCuenta != '' ||
        error_afiliacion != ''
      ) {
        return false;
      } else {
        $('#list_remuneration_details').removeClass('active active_tab1');
        $('#list_remuneration_details').removeAttr('href data-toggle');
        $('#remuneration_details').removeClass('active');
        $('#list_remuneration_details').addClass('inactive_tab1');
        $('#list_langtripssttudies_details').removeClass('inactive_tab1');
        $('#list_langtripssttudies_details').addClass('active_tab1 active');
        $('#list_langtripssttudies_details').attr('href', '#langtripssttudies_details');
        $('#list_langtripssttudies_details').attr('data-toggle', 'tab');
        $('#langtripssttudies_details').addClass('active in');
      }
    });

    //------------------ 10MO STEP LUGAR Y DOCUMENTOS --------------------------


    $('#btn_personal_langtripssttudies').click(function() {
      var error_idioma = '';
      var error_idiomaHabla = '';
      var error_idiomaLee = '';
      var error_idiomaEscribe = '';
      var error_idiomaEstudio = '';
      var error_idiomaPractica = '';

      var error_lugar = '';
      var error_motivo = '';
      var error_fecha_viaje = '';

      var error_tipo_curso = '';
      var error_curso = '';

      if (document.getElementById("tbidiomas").rows.length > 1) {

        $("input[id=idioma]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idioma = 'OK';
            $("input[id=idioma]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Idioma</p></div>");
          } else {
            error_idioma = '';
            $('input[id=idioma]').removeClass('has-error');
          }
        });

        $("select[id=idioma_habla]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idiomaHabla = 'OK';
            $("select[id=idioma_habla]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el nivel del Habla</p></div>");
          } else {
            error_idiomaHabla = '';
            $('select[id=idioma_habla]').removeClass('has-error');
          }
        });

        $("select[id=idioma_lee]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idiomaLee = 'OK';
            $("select[id=idioma_lee]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el nivel de Lectura</p></div>");
          } else {
            error_idiomaLee = '';
            $('select[id=idioma_lee]').removeClass('has-error');
          }
        });

        $("select[id=idioma_escribe]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idiomaEscribe = 'OK';
            $("select[id=idioma_escribe]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el nivel del Adquirido</p></div>");
          } else {
            error_idiomaEscribe = '';
            $('select[id=idioma_escribe]').removeClass('has-error');
          }
        });

        $("select[id=idioma_estudio]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idiomaEstudio = 'OK';
            $("select[id=idioma_estudio]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el nivel de Escritura</p></div>");
          } else {
            error_idiomaEstudio = '';
            $('select[id=idioma_estudio]').removeClass('has-error');
          }
        });

        $("select[id=idioma_practica]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idiomaPractica = 'OK';
            $("select[id=idioma_practica]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el nivel de Graduado</p></div>");
          } else {
            error_idiomaPractica = '';
            $('select[id=idioma_practica]').removeClass('has-error');
          }
        });
      }



      if (document.getElementById("tbviajesExtranjero").rows.length > 1) {
        $("input[id=lugar]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_lugar = 'OK';
            $("input[id=lugar]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Lugar</p></div>");
          } else {
            error_lugar = '';
            $('input[id=lugar]').removeClass('has-error');
          }
        });
        $("input[id=motivo]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_motivo = 'OK';
            $("input[id=motivo]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Motivo</p></div>");
          } else {
            error_motivo = '';
            $('input[id=motivo]').removeClass('has-error');
          }
        });

        $("input[id=fecha_viaje]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_idiomaHabla = 'OK';
            $("input[id=fecha_viaje]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete la Fecha</p></div>");
          } else {
            error_idiomaHabla = '';
            $('input[id=fecha_viaje]').removeClass('has-error');
          }
        });
      }

      if (document.getElementById("tbestudiosRealizados").rows.length > 1) {
        $("input[id=curso]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_curso = 'OK';
            $("input[id=curso]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Complete el Curso</p></div>");
          } else {
            error_curso = '';
            $('input[id=curso]').removeClass('has-error');
          }
        });

        $("select[id=tipo_curso]").each(function() {
          var $this = $(this);
          if ($this.val() == '') {
            error_tipo_curso = 'OK';
            $("select[id=tipo_curso]").addClass('has-error');
            $(".nineStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>Escoja el tipo de curso</p></div>");
          } else {
            error_tipo_curso = '';
            $('select[id=tipo_curso]').removeClass('has-error');
          }
        });
      }


      if (document.getElementById("tbidiomas").rows.length > 1 && document.getElementById("tbviajesExtranjero").rows.length > 1 && document.getElementById("tbestudiosRealizados").rows.length > 1) {

        if (
          error_idioma != '' ||
          error_idiomaHabla != '' ||
          error_idiomaLee != '' ||
          error_idiomaEscribe != '' ||
          error_idiomaEstudio != '' ||
          error_idiomaPractica != '' ||
          error_lugar != '' ||
          error_motivo != '' ||
          error_fecha_viaje != '' ||
          error_curso != '' ||
          error_tipo_curso != ''
        ) {
          return false;
        } else {
          $('#list_langtripssttudies_details').removeClass('active active_tab1');
          $('#list_langtripssttudies_details').removeAttr('href data-toggle');
          $('#langtripssttudies_details').removeClass('active');
          $('#list_langtripssttudies_details').addClass('inactive_tab1');
          $('#list_securfam_details').removeClass('inactive_tab1');
          $('#list_securfam_details').addClass('active_tab1 active');
          $('#list_securfam_details').attr('href', '#securfam_details');
          $('#list_securfam_details').attr('data-toggle', 'tab');
          $('#securfam_details').addClass('active in');
        }
      } else {

        if (document.getElementById("tbidiomas").rows.length > 1) {
          if (
            error_idioma != '' ||
            error_idiomaHabla != '' ||
            error_idiomaLee != '' ||
            error_idiomaEscribe != '' ||
            error_idiomaEstudio != '' ||
            error_idiomaPractica != ''

          ) {
            return false;
          } else {
            $('#list_langtripssttudies_details').removeClass('active active_tab1');
            $('#list_langtripssttudies_details').removeAttr('href data-toggle');
            $('#langtripssttudies_details').removeClass('active');
            $('#list_langtripssttudies_details').addClass('inactive_tab1');
            $('#list_securfam_details').removeClass('inactive_tab1');
            $('#list_securfam_details').addClass('active_tab1 active');
            $('#list_securfam_details').attr('href', '#securfam_details');
            $('#list_securfam_details').attr('data-toggle', 'tab');
            $('#securfam_details').addClass('active in');
          }
        }
        if (document.getElementById("tbviajesExtranjero").rows.length > 1) {
          if (
            error_lugar != '' ||
            error_motivo != '' ||
            error_fecha_viaje != ''
          ) {
            return false;
          } else {
            $('#list_langtripssttudies_details').removeClass('active active_tab1');
            $('#list_langtripssttudies_details').removeAttr('href data-toggle');
            $('#langtripssttudies_details').removeClass('active');
            $('#list_langtripssttudies_details').addClass('inactive_tab1');
            $('#list_securfam_details').removeClass('inactive_tab1');
            $('#list_securfam_details').addClass('active_tab1 active');
            $('#list_securfam_details').attr('href', '#securfam_details');
            $('#list_securfam_details').attr('data-toggle', 'tab');
            $('#securfam_details').addClass('active in');
          }
        }
        if (document.getElementById("tbestudiosRealizados").rows.length > 1) {
          if (
            error_curso != '' ||
            error_tipo_curso != ''
          ) {
            return false;
          } else {
            $('#list_langtripssttudies_details').removeClass('active active_tab1');
            $('#list_langtripssttudies_details').removeAttr('href data-toggle');
            $('#langtripssttudies_details').removeClass('active');
            $('#list_langtripssttudies_details').addClass('inactive_tab1');
            $('#list_securfam_details').removeClass('inactive_tab1');
            $('#list_securfam_details').addClass('active_tab1 active');
            $('#list_securfam_details').attr('href', '#securfam_details');
            $('#list_securfam_details').attr('data-toggle', 'tab');
            $('#securfam_details').addClass('active in');
          }
        }

      }
    });



    //1
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
    //2
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

    $('#previous_btn_personal_born').click(function() {
      $('#list_born_details').removeClass('active active_tab1');
      $('#list_born_details').removeAttr('href data-toggle');
      $('#born_details').removeClass('active in');
      $('#list_born_details').addClass('inactive_tab1');

      $('#list_contact_details').removeClass('inactive_tab1');
      $('#list_contact_details').addClass('active_tab1 active');
      $('#list_contact_details').attr('href', '#contact_details');
      $('#list_contact_details').attr('data-toggle', 'tab');
      $('#contact_details').addClass('active in');
    });
    $('#previous_btn_personal_documents').click(function() {
      $('#list_documents_details').removeClass('active active_tab1');
      $('#list_documents_details').removeAttr('href data-toggle');
      $('#documents_details').removeClass('active in');
      $('#list_documents_details').addClass('inactive_tab1');

      $('#list_born_details').removeClass('inactive_tab1');
      $('#list_born_details').addClass('active_tab1 active');
      $('#list_born_details').attr('href', '#born_details');
      $('#list_born_details').attr('data-toggle', 'tab');
      $('#born_details').addClass('active in');
    });


    $('#previous_btn_personal_caracters').click(function() {
      $('#list_caracters_details').removeClass('active active_tab1');
      $('#list_caracters_details').removeAttr('href data-toggle');
      $('#caracters_details').removeClass('active in');
      $('#list_caracters_details').addClass('inactive_tab1');
      $('#list_documents_details').removeClass('inactive_tab1');
      $('#list_documents_details').addClass('active_tab1 active');
      $('#list_documents_details').attr('href', '#documents_details');
      $('#list_documents_details').attr('data-toggle', 'tab');
      $('#documents_details').addClass('active in');

    });

    $('#previous_btn_personal_clothes').click(function() {
      $('#list_clothes_details').removeClass('active active_tab1');
      $('#list_clothes_details').removeAttr('href data-toggle');
      $('#clothes_details').removeClass('active in');
      $('#list_clothes_details').addClass('inactive_tab1');
      $('#list_caracters_details').removeClass('inactive_tab1');
      $('#list_caracters_details').addClass('active_tab1 active');
      $('#list_caracters_details').attr('href', '#caracters_details');
      $('#list_caracters_details').attr('data-toggle', 'tab');
      $('#caracters_details').addClass('active in');

    });
    $('#previous_btn_personal_remuneration').click(function() {
      $('#list_remuneration_details').removeClass('active active_tab1');
      $('#list_remuneration_details').removeAttr('href data-toggle');
      $('#remuneration_details').removeClass('active in');
      $('#list_remuneration_details').addClass('inactive_tab1');
      $('#list_clothes_details').removeClass('inactive_tab1');
      $('#list_clothes_details').addClass('active_tab1 active');
      $('#list_clothes_details').attr('href', '#clothes_details');
      $('#list_clothes_details').attr('data-toggle', 'tab');
      $('#clothes_details').addClass('active in');

    });


    $('#previous_btn_personal_langtripssttudies').click(function() {
      $('#list_langtripssttudies_details').removeClass('active active_tab1');
      $('#list_langtripssttudies_details').removeAttr('href data-toggle');
      $('#langtripssttudies_details').removeClass('active in');
      $('#list_langtripssttudies_details').addClass('inactive_tab1');
      $('#list_remuneration_details').removeClass('inactive_tab1');
      $('#list_remuneration_details').addClass('active_tab1 active');
      $('#list_remuneration_details').attr('href', '#remuneration_details');
      $('#list_remuneration_details').attr('data-toggle', 'tab');
      $('#remuneration_details').addClass('active in');
    });

    $('#previous_btn_personal_securfam').click(function() {
      $('#list_securfam_details').removeClass('active active_tab1');
      $('#list_securfam_details').removeAttr('href data-toggle');
      $('#securfam_details').removeClass('active in');
      $('#list_securfam_details').addClass('inactive_tab1');
      $('#list_langtripssttudies_details').removeClass('inactive_tab1');
      $('#list_langtripssttudies_details').addClass('active_tab1 active');
      $('#list_langtripssttudies_details').attr('href', '#langtripssttudies_details');
      $('#list_langtripssttudies_details').attr('data-toggle', 'tab');
      $('#langtripssttudies_details').addClass('active in');
    });


    $('#review').click(function() {
      $('#login_details').addClass('active in');
      $('#personal_details').addClass('active in');
      $('#contact_details').addClass('active in');
      $('#born_details').addClass('active in');
      $('#documents_details').addClass('active in');
      $('#caracters_details').addClass('active in');
      $('#clothes_details').addClass('active in');
      $('#remuneration_details').addClass('active in');
      $('#langtripssttudies_details').addClass('active in');
      $('#langtripssttudies_details').addClass('active in');
      $("#btn_personal_securfam").prop("disabled", false);

      $("#btn_login_details").hide();
      $("#previous_btn_personal_details").hide();
      $("#btn_personal_details").hide();

      $("#previous_btn_contact_details").hide();
      $("#btn_contact_details").hide();

      $("#previous_btn_personal_born").hide();
      $("#btn_personal_born").hide();

      $("#previous_btn_personal_documents").hide();
      $("#btn_personal_documents").hide();

      $("#previous_btn_personal_caracters").hide();
      $("#btn_personal_caracters").hide();


      $("#previous_btn_personal_clothes").hide();
      $("#btn_personal_clothes").hide();

      $("#previous_btn_personal_remuneration").hide();
      $("#btn_personal_remuneration").hide();

      $("#previous_btn_personal_langtripssttudies").hide();
      $("#btn_personal_langtripssttudies").hide();
      $("#previous_btn_personal_securfam").hide();


    });




  });

  function datagrafico(base_url, year) {
    namesMonth = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
    var mesessobrepeso = new Array();
    var cantSobrepeso = new Array();

    var mesesnormal = new Array();
    var cantNormal = new Array();

    var mesesdelgadez = new Array();
    var cantDelgadez = new Array();

    var mesesobesidad = new Array();
    var cantObesidad = new Array();
    $.ajax({
      url: base_url + "dashboard/getDataSobrepeso",
      type: "POST",
      data: {
        year: year
      },
      dataType: "json",
      success: function(data) {

        $.each(data, function(key, value) {
          mesessobrepeso.push(namesMonth[value.mes - 1]);
          valor = Number(value.cantidad);
          cantSobrepeso.push(valor);
        });
      }
    });
    $.ajax({
      url: base_url + "dashboard/getDataNormal",
      type: "POST",
      data: {
        year: year
      },
      dataType: "json",
      success: function(data) {

        $.each(data, function(key, value) {
          mesesnormal.push(namesMonth[value.mes - 1]);
          valor = Number(value.cantidad);
          cantNormal.push(valor);
        });
        //graficar(namesMonth, cantSobrepeso,cantNormal,cantDelgadez, year);
      }
    });

    $.ajax({
      url: base_url + "dashboard/getDataDelgadez",
      type: "POST",
      data: {
        year: year
      },
      dataType: "json",
      success: function(data) {

        $.each(data, function(key, value) {
          mesesobesidad.push(namesMonth[value.mes - 1]);
          valor = Number(value.cantidad);
          cantDelgadez.push(valor);
        });
      }
    });

    $.ajax({
      url: base_url + "dashboard/getDataObesidad",
      type: "POST",
      data: {
        year: year
      },
      dataType: "json",
      success: function(data) {

        $.each(data, function(key, value) {
          mesesnormal.push(namesMonth[value.mes - 1]);
          valor = Number(value.cantidad);
          cantObesidad.push(valor);
        });
        graficar(namesMonth, cantSobrepeso,cantNormal,cantDelgadez,cantObesidad, year);
      }
    });



  }

  function graficar(meses, cantSobrepeso,cantNormal,cantDelgadez,cantObesidad, year) {
    Highcharts.chart('grafico', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Monto acumulado por las ventas de los meses'
      },
      subtitle: {
        text: 'Año:' + year
      },
      xAxis: {
        categories: meses,
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Monto Acumulado (soles)'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
          '<td style="padding:0"><b>{point.y:.2f} soles</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        },
        series: {
          dataLabels: {
            enabled: true,
            formatter: function() {
              return Highcharts.numberFormat(this.y, 2)
            }

          }
        }
      },
      series: [{
        name: 'Sobre-Peso',
        data: cantSobrepeso

      },
      {
        name: 'Normal',
        data: cantNormal

      },
      {
        name: 'Delgadez',
        data: cantDelgadez

      },
      {
        name: 'Obesidad',
        data: cantObesidad

      }
      
      ]
    });
  }


  $(document).ready(function() {

    var base_url = "<?php echo base_url(); ?>";
    var year = (new Date).getFullYear();
    datagrafico(base_url, year);
    $("#year").on("change", function() {
      yearselect = $(this).val();
      datagrafico(base_url, yearselect);
    });
    $(".btn-remove").on("click", function(e) {
      e.preventDefault();
      var ruta = $(this).attr("href");
      //alert(ruta);
      $.ajax({
        url: ruta,
        type: "POST",
        success: function(resp) {
          //http://localhost/ventas_ci/mantenimiento/productos
          window.location.href = base_url + resp;
        }
      });
    });
  });


  $(document).ready(function() {

    var extensionesValidas = ".png, .gif, .jpeg, .jpg";
    var pesoPermitido = 1024;

    // Cuando cambie #fichero
    $("#fichero").change(function() {

      $('#img').attr('src', '');

      if (validarExtension(this)) {

        if (validarPeso(this)) {
          verImagen(this);
        }
      }
    });

    // Validacion de extensiones permitidas

    function validarExtension(datos) {

      var ruta = datos.value;
      var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
      var extensionValida = extensionesValidas.indexOf(extension);

      if (extensionValida < 0) {
        $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>La extensión no es válida,use una imagen. Su fichero tiene de extensión:" + extension + "</p></div>");
        return false;
      } else {
        return true;
      }
    }

    // Validacion de peso del fichero en kbs

    function validarPeso(datos) {

      if (datos.files && datos.files[0]) {

        var pesoFichero = datos.files[0].size / 1024;

        if (pesoFichero > pesoPermitido) {
          $(".firstStep").append("<div class='alert alert-danger alert-dismissible'> <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><p><i class='icon fa fa-ban'></i>El peso maximo permitido del fichero es:" + pesoPermitido + " KBs Su fichero tiene: " + pesoFichero + " KBs</p></div>");

          $('#firstStep').text('El peso maximo permitido del fichero es: ' + pesoPermitido + ' KBs Su fichero tiene: ' + pesoFichero + ' KBs');
          return false;
        } else {
          return true;
        }
      }
    }

    // Vista preliminar de la imagen.
    function verImagen(datos) {

      if (datos.files && datos.files[0]) {

        var reader = new FileReader();
        reader.onload = function(e) {
          $('#imgenPerfil').attr('src', e.target.result);
        };

        reader.readAsDataURL(datos.files[0]);
      }
    }
  });


  /* Jquery para departamento, provincia y distrito vivienda.*/
  $(document).ready(function() {
    var selectdep = $('#departamento_viv');
    var selectpro = $('#provin_viv');
    var selectdis = $('#distri_viv');
    selectdep.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      selectdep.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
    $("#departamento_viv").change(function() {
      $('#aux_depart_viv').val($("#departamento_viv option:selected").text())
      selectpro.empty();
      selectpro.append('<option value=""> Seleccione</option>');
      $.each(ubigeo.provincias[selectdep.val()], function(i, item) {
        selectpro.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });
    });
    $("#provin_viv").change(function() {
      $('#aux_provin_viv').val($("#provin_viv option:selected").text())
      selectdis.empty();
      selectdis.append('<option value=""> Seleccione</option>');
      $.each(ubigeo.distritos[selectpro.val()], function(i, item) {
        selectdis.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });
    });
    $("#distri_viv").change(function() {
      $('#aux_distri_viv').val($("#distri_viv option:selected").text())
    });
    //-------------------------------------------------------------------------------------------------------------
    /* Jquery para departamento, provincia y distrito vivienda.*/
    var selectdepnac = $('#depart_nac');
    var selectpronac = $('#provin_nac');
    var selectdisnac = $('#distri_nac');
    selectdepnac.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      selectdepnac.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
    $("#depart_nac").change(function() {
      $('#aux_depart_nac').val($("#depart_nac option:selected").text())
      selectpronac.empty();
      selectpronac.append('<option value=""> Seleccione</option>');
      $.each(ubigeo.provincias[selectdepnac.val()], function(i, item) {
        selectpronac.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });
    });
    $("#provin_nac").change(function() {
      $('#aux_provin_nac').val($("#provin_nac option:selected").text())
      selectdisnac.empty();
      selectdisnac.append('<option value=""> Seleccione</option>');
      $.each(ubigeo.distritos[selectpronac.val()], function(i, item) {
        selectdisnac.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });
    });
    $("#distri_nac").change(function() {
      $('#aux_distri_nac').val($("#distri_nac option:selected").text())
    });
  });

  //-------------------------------------------------------------------------------------------------------------
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