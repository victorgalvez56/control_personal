<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>

  <strong>Copyright &copy; 2018-2019 <a href="https://www.facebook.com/victor.galvezc">Victor E. Gálvez</a>.</strong> All rights
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
<script>
  console.log('Prueba que carga bien el script')

  $id_depa = $("#input_depa").val();
  $id_prov = $('#input_prov').val();
  $id_dist = $('#input_dist').val();

  $(document).ready(function() {

    $.each(ubigeo.departamentos, function(i, item) {
      if ($id_depa == item.id_ubigeo) {
        $('#td_depa').html(item.nombre_ubigeo);
      }
    });
  });

  $(document).ready(function() {

    $.each(ubigeo.provincias[$id_depa], function(i, item) {
      if ($id_prov == item.id_ubigeo) {
        $('#td_prov').html(item.nombre_ubigeo);
      }
    });
  });

  $(document).ready(function() {

    $.each(ubigeo.distritos[$id_prov], function(i, item) {
      if ($id_dist == item.id_ubigeo) {
        $('#td_dist').html(item.nombre_ubigeo);
      }
    });
  });



  $(document).on("click", ".btn-view-personal", function() {
    valor_id = $(this).val();
    $.ajax({
      url: base_url + "control/personal/view",
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
      $("#buttonsearch").prop("disabled", true);
      $("#btn-check22").val(null);
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

      html = "<tr>";
      html += "<td><input type='hidden' name='dni' value='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
      html += "<td><input type='hidden' name='nombres'  value='" + infoproducto[2] + "'>" + infoproducto[3] + "</td>";
      html += "<td><input type='text' class='form-control form-control' name='pres_sis' '></td>";
      html += "<td><input type='text' class='form-control form-control' name='pres_dia' '></td>";
      html += "<td><input type='text' class='form-control form-control' name='pulso' '></td>";
      html += "<td><input type='text' class='form-control form-control' name='valoracion' readonly></td>";
      html += "<td><input type='hidden' name='medico'  value='" + responsable + "'>" + responsable + "</td>";
      html += "<td><input type='text' id='peso' class='form-control form-control' name='peso' ></td>";
      html += "<td><input type='text' class='form-control form-control' name='imc' readonly></td>";
      html += "<td><input type='text' class='form-control form-control' name='clasi_imc' readonly></td>";
      html += "<td><input type='text' class='form-control form-control' name='perimetro'></td>";
      html += "<td><input type='text' class='form-control form-control' name='clasi_peri'readonly></td>";
      html += "</tr>";
      $("#tbmensual tbody").append(html);
      $("#buttonsearch").prop("disabled", true);
      $("#btn-check22").val(null);
    } else {
      alert("seleccione un producto...");
    }
  });


  $(document).on("keyup", "#peso", function() {

    sumar();
  });

  function sumar() {
    peso = $("input[name=peso]").val();
    talla = $("input[name=nombres]").val();
    imc = peso * talla;
    $("input[name=imc]").val(imc.toFixed(2));

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



  $(document).ready(function() {
    var $selectdep = $('#departamento_viv');
    var $selectprov = $('#provin_viv');
    $selectdep.append('<option value=""> Seleccione</option>');
    $selectprov.append('<option value=""> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, itemdep) {
        $selectdep.append('<option value=' + itemdep.id_ubigeo + '>' + itemdep.nombre_ubigeo + '</option>');
      
        $("#departamento_viv option:selected").each(function() {
          $(this).val('gaaaaaa')
      })}
    );




    $("#departamento_viv").change(function() {
      var $selectdep = $('#departamento_viv');
      var str = "";
      $("#departamento_viv option:selected").each(function() {
        str += $(this).text();
        console.log($(this).text())
        var departamentoc = $("#departamento_viv").val();
        var $selectprov = $('#provin_viv');
        $selectprov.empty()
      });
    });
    $("#departamento_viv").change(function() {
      var departamentoc = $("#departamento_viv").val();
      var $selectprov = $('#provin_viv');
      $selectprov.append('<option> Seleccione</option>');
      $.each(ubigeo.provincias[departamentoc], function(i, item) {
        $selectprov.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });

    });

  });



  /*
    $(document).ready(function() {
      var $selectdep = $('#departamento_viv');
      $selectdep.append('<option value=""> Seleccione</option>');
      $.each(ubigeo.departamentos, function(i, item) {
        $selectdep.append('<option value=' + item.nombre_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });
    });
    $("#departamento_viv").change(function() {
      var $selectdep = $('#departamento_viv');
      var str = "";
      $("#departamento_viv option:selected").each(function() {
        str += $(this).text();

        console.log($(this).text())
        var departamentoc = $("#departamento_viv").val();
        var $selectprov = $('#provin_viv');
        $selectprov.empty()
      });
    });
    $("#departamento_viv").change(function() {
      var departamentoc = $("#departamento_viv").val();
      var $selectprov = $('#provin_viv');
      $selectprov.append('<option> Seleccione</option>');
      $.each(ubigeo.provincias[departamentoc], function(i, item) {
        $selectprov.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });

    });
    $("#provin_viv").change(function() {
      var provinciac = $("#provin_viv").val();
      var $selectdistr = $('#distri_viv');
      $selectdistr.empty()
      $selectdistr.append('<option> Seleccione</option>');
      $.each(ubigeo.distritos[provinciac], function(i, item) {
        $selectdistr.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
      });
    });
  */




  $(document).ready(function() {
    var $selectdep = $('#depart_nac');
    $selectdep.append('<option> Seleccione</option>');
    $.each(ubigeo.departamentos, function(i, item) {
      $selectdep.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  });
  $("#depart_nac").change(function() {
    var $selectdep = $('#depart_nac');
    var str = "";
    $("#depart_nac option:selected").each(function() {
      str += $(this).text();
      var departamentoc = $("#depart_nac").val();
      var $selectprov = $('#provin_nac');
      var $selectprov = $('#provin_nac');
      $selectprov.empty()
    });
  });
  $("#depart_nac").change(function() {
    var departamentoc = $("#depart_nac").val();
    var $selectprov = $('#provin_nac');
    $selectprov.append('<option> Seleccione</option>');
    $.each(ubigeo.provincias[departamentoc], function(i, item) {
      $selectprov.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });

  });
  $("#provin_nac").change(function() {
    var provinciac = $("#provin_nac").val();
    var $selectdistr = $('#distri_nac');
    $selectdistr.empty()
    $selectdistr.append('<option> Seleccione</option>');
    $.each(ubigeo.distritos[provinciac], function(i, item) {
      $selectdistr.append('<option value=' + item.id_ubigeo + '>' + item.nombre_ubigeo + '</option>');
    });
  });

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
    html += "<td><input type='text' class='form-control' id='idioma' name='nombres[]' style='text-transform: uppercase;' required ></td>";
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



  var ubigeo = {};
  ubigeo.departamentos = [{
    "id_ubigeo": "2534",
    "nombre_ubigeo": "Amazonas",
    "codigo_ubigeo": "01",
    "etiqueta_ubigeo": "Amazonas, Per\u00fa",
    "buscador_ubigeo": "amazonas per\u00fa",
    "numero_hijos_ubigeo": "7",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "2625",
    "nombre_ubigeo": "Ancash",
    "codigo_ubigeo": "02",
    "etiqueta_ubigeo": "Ancash, Per\u00fa",
    "buscador_ubigeo": "ancash per\u00fa",
    "numero_hijos_ubigeo": "20",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "2812",
    "nombre_ubigeo": "Apurimac",
    "codigo_ubigeo": "03",
    "etiqueta_ubigeo": "Apurimac, Per\u00fa",
    "buscador_ubigeo": "apurimac per\u00fa",
    "numero_hijos_ubigeo": "7",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "2900",
    "nombre_ubigeo": "Arequipa",
    "codigo_ubigeo": "04",
    "etiqueta_ubigeo": "Arequipa, Per\u00fa",
    "buscador_ubigeo": "arequipa per\u00fa",
    "numero_hijos_ubigeo": "8",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3020",
    "nombre_ubigeo": "Ayacucho",
    "codigo_ubigeo": "05",
    "etiqueta_ubigeo": "Ayacucho, Per\u00fa",
    "buscador_ubigeo": "ayacucho per\u00fa",
    "numero_hijos_ubigeo": "11",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3143",
    "nombre_ubigeo": "Cajamarca",
    "codigo_ubigeo": "06",
    "etiqueta_ubigeo": "Cajamarca, Per\u00fa",
    "buscador_ubigeo": "cajamarca per\u00fa",
    "numero_hijos_ubigeo": "13",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3292",
    "nombre_ubigeo": "Cusco",
    "codigo_ubigeo": "08",
    "etiqueta_ubigeo": "Cusco, Per\u00fa",
    "buscador_ubigeo": "cusco per\u00fa",
    "numero_hijos_ubigeo": "13",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3414",
    "nombre_ubigeo": "Huancavelica",
    "codigo_ubigeo": "09",
    "etiqueta_ubigeo": "Huancavelica, Per\u00fa",
    "buscador_ubigeo": "huancavelica per\u00fa",
    "numero_hijos_ubigeo": "7",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3518",
    "nombre_ubigeo": "Huanuco",
    "codigo_ubigeo": "10",
    "etiqueta_ubigeo": "Huanuco, Per\u00fa",
    "buscador_ubigeo": "huanuco per\u00fa",
    "numero_hijos_ubigeo": "11",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3606",
    "nombre_ubigeo": "Ica",
    "codigo_ubigeo": "11",
    "etiqueta_ubigeo": "Ica, Per\u00fa",
    "buscador_ubigeo": "ica per\u00fa",
    "numero_hijos_ubigeo": "5",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3655",
    "nombre_ubigeo": "Junin",
    "codigo_ubigeo": "12",
    "etiqueta_ubigeo": "Junin, Per\u00fa",
    "buscador_ubigeo": "junin per\u00fa",
    "numero_hijos_ubigeo": "9",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3788",
    "nombre_ubigeo": "La Libertad",
    "codigo_ubigeo": "13",
    "etiqueta_ubigeo": "La Libertad, Per\u00fa",
    "buscador_ubigeo": "la libertad per\u00fa",
    "numero_hijos_ubigeo": "12",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3884",
    "nombre_ubigeo": "Lambayeque",
    "codigo_ubigeo": "14",
    "etiqueta_ubigeo": "Lambayeque, Per\u00fa",
    "buscador_ubigeo": "lambayeque per\u00fa",
    "numero_hijos_ubigeo": "3",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "3926",
    "nombre_ubigeo": "Lima",
    "codigo_ubigeo": "15",
    "etiqueta_ubigeo": "Lima, Per\u00fa",
    "buscador_ubigeo": "lima per\u00fa",
    "numero_hijos_ubigeo": "10",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4108",
    "nombre_ubigeo": "Loreto",
    "codigo_ubigeo": "16",
    "etiqueta_ubigeo": "Loreto, Per\u00fa",
    "buscador_ubigeo": "loreto per\u00fa",
    "numero_hijos_ubigeo": "6",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4165",
    "nombre_ubigeo": "Madre de Dios",
    "codigo_ubigeo": "17",
    "etiqueta_ubigeo": "Madre de Dios, Per\u00fa",
    "buscador_ubigeo": "madre de dios per\u00fa",
    "numero_hijos_ubigeo": "3",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4180",
    "nombre_ubigeo": "Moquegua",
    "codigo_ubigeo": "18",
    "etiqueta_ubigeo": "Moquegua, Per\u00fa",
    "buscador_ubigeo": "moquegua per\u00fa",
    "numero_hijos_ubigeo": "3",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4204",
    "nombre_ubigeo": "Pasco",
    "codigo_ubigeo": "19",
    "etiqueta_ubigeo": "Pasco, Per\u00fa",
    "buscador_ubigeo": "pasco per\u00fa",
    "numero_hijos_ubigeo": "3",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4236",
    "nombre_ubigeo": "Piura",
    "codigo_ubigeo": "20",
    "etiqueta_ubigeo": "Piura, Per\u00fa",
    "buscador_ubigeo": "piura per\u00fa",
    "numero_hijos_ubigeo": "8",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4309",
    "nombre_ubigeo": "Puno",
    "codigo_ubigeo": "21",
    "etiqueta_ubigeo": "Puno, Per\u00fa",
    "buscador_ubigeo": "puno per\u00fa",
    "numero_hijos_ubigeo": "13",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4431",
    "nombre_ubigeo": "San Martin",
    "codigo_ubigeo": "22",
    "etiqueta_ubigeo": "San Martin, Per\u00fa",
    "buscador_ubigeo": "san martin per\u00fa",
    "numero_hijos_ubigeo": "10",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4519",
    "nombre_ubigeo": "Tacna",
    "codigo_ubigeo": "23",
    "etiqueta_ubigeo": "Tacna, Per\u00fa",
    "buscador_ubigeo": "tacna per\u00fa",
    "numero_hijos_ubigeo": "4",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4551",
    "nombre_ubigeo": "Tumbes",
    "codigo_ubigeo": "24",
    "etiqueta_ubigeo": "Tumbes, Per\u00fa",
    "buscador_ubigeo": "tumbes per\u00fa",
    "numero_hijos_ubigeo": "3",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }, {
    "id_ubigeo": "4567",
    "nombre_ubigeo": "Ucayali",
    "codigo_ubigeo": "25",
    "etiqueta_ubigeo": "Ucayali, Per\u00fa",
    "buscador_ubigeo": "ucayali per\u00fa",
    "numero_hijos_ubigeo": "4",
    "nivel_ubigeo": "1",
    "id_padre_ubigeo": "2533"
  }];
  ubigeo.provincias = {
    "2534": [{
      "id_ubigeo": "2557",
      "nombre_ubigeo": "Bagua",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bagua, Amazonas",
      "buscador_ubigeo": "bagua amazonas",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }, {
      "id_ubigeo": "2563",
      "nombre_ubigeo": "Bongara",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Bongara, Amazonas",
      "buscador_ubigeo": "bongara amazonas",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }, {
      "id_ubigeo": "2535",
      "nombre_ubigeo": "Chachapoyas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chachapoyas, Amazonas",
      "buscador_ubigeo": "chachapoyas amazonas",
      "numero_hijos_ubigeo": "21",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }, {
      "id_ubigeo": "2576",
      "nombre_ubigeo": "Condorcanqui",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Condorcanqui, Amazonas",
      "buscador_ubigeo": "condorcanqui amazonas",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }, {
      "id_ubigeo": "2580",
      "nombre_ubigeo": "Luya",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Luya, Amazonas",
      "buscador_ubigeo": "luya amazonas",
      "numero_hijos_ubigeo": "23",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }, {
      "id_ubigeo": "2604",
      "nombre_ubigeo": "Rodriguez de Mendoza",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Rodriguez de Mendoza, Amazonas",
      "buscador_ubigeo": "rodriguez de mendoza amazonas",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }, {
      "id_ubigeo": "2617",
      "nombre_ubigeo": "Utcubamba",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Utcubamba, Amazonas",
      "buscador_ubigeo": "utcubamba amazonas",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2534"
    }],
    "2625": [{
      "id_ubigeo": "2639",
      "nombre_ubigeo": "Aija",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aija, Ancash",
      "buscador_ubigeo": "aija ancash",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2645",
      "nombre_ubigeo": "Antonio Raymondi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Antonio Raymondi, Ancash",
      "buscador_ubigeo": "antonio raymondi ancash",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2652",
      "nombre_ubigeo": "Asuncion",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Asuncion, Ancash",
      "buscador_ubigeo": "asuncion ancash",
      "numero_hijos_ubigeo": "2",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2655",
      "nombre_ubigeo": "Bolognesi",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Bolognesi, Ancash",
      "buscador_ubigeo": "bolognesi ancash",
      "numero_hijos_ubigeo": "15",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2671",
      "nombre_ubigeo": "Carhuaz",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Carhuaz, Ancash",
      "buscador_ubigeo": "carhuaz ancash",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2683",
      "nombre_ubigeo": "Carlos Fermin Fitzcarrald",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Carlos Fermin Fitzcarrald, Ancash",
      "buscador_ubigeo": "carlos fermin fitzcarrald ancash",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2687",
      "nombre_ubigeo": "Casma",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Casma, Ancash",
      "buscador_ubigeo": "casma ancash",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2692",
      "nombre_ubigeo": "Corongo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Corongo, Ancash",
      "buscador_ubigeo": "corongo ancash",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2626",
      "nombre_ubigeo": "Huaraz",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huaraz, Ancash",
      "buscador_ubigeo": "huaraz ancash",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2700",
      "nombre_ubigeo": "Huari",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Huari, Ancash",
      "buscador_ubigeo": "huari ancash",
      "numero_hijos_ubigeo": "16",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2717",
      "nombre_ubigeo": "Huarmey",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Huarmey, Ancash",
      "buscador_ubigeo": "huarmey ancash",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2723",
      "nombre_ubigeo": "Huaylas",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Huaylas, Ancash",
      "buscador_ubigeo": "huaylas ancash",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2734",
      "nombre_ubigeo": "Mariscal Luzuriaga",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Mariscal Luzuriaga, Ancash",
      "buscador_ubigeo": "mariscal luzuriaga ancash",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2743",
      "nombre_ubigeo": "Ocros",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Ocros, Ancash",
      "buscador_ubigeo": "ocros ancash",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2754",
      "nombre_ubigeo": "Pallasca",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Pallasca, Ancash",
      "buscador_ubigeo": "pallasca ancash",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2766",
      "nombre_ubigeo": "Pomabamba",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Pomabamba, Ancash",
      "buscador_ubigeo": "pomabamba ancash",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2771",
      "nombre_ubigeo": "Recuay",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Recuay, Ancash",
      "buscador_ubigeo": "recuay ancash",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2782",
      "nombre_ubigeo": "Santa",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Santa, Ancash",
      "buscador_ubigeo": "santa ancash",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2792",
      "nombre_ubigeo": "Sihuas",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Sihuas, Ancash",
      "buscador_ubigeo": "sihuas ancash",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }, {
      "id_ubigeo": "2803",
      "nombre_ubigeo": "Yungay",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Yungay, Ancash",
      "buscador_ubigeo": "yungay ancash",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2625"
    }],
    "2812": [{
      "id_ubigeo": "2813",
      "nombre_ubigeo": "Abancay",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Abancay, Apurimac",
      "buscador_ubigeo": "abancay apurimac",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }, {
      "id_ubigeo": "2823",
      "nombre_ubigeo": "Andahuaylas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andahuaylas, Apurimac",
      "buscador_ubigeo": "andahuaylas apurimac",
      "numero_hijos_ubigeo": "19",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }, {
      "id_ubigeo": "2843",
      "nombre_ubigeo": "Antabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Antabamba, Apurimac",
      "buscador_ubigeo": "antabamba apurimac",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }, {
      "id_ubigeo": "2851",
      "nombre_ubigeo": "Aymaraes",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Aymaraes, Apurimac",
      "buscador_ubigeo": "aymaraes apurimac",
      "numero_hijos_ubigeo": "17",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }, {
      "id_ubigeo": "2876",
      "nombre_ubigeo": "Chincheros",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chincheros, Apurimac",
      "buscador_ubigeo": "chincheros apurimac",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }, {
      "id_ubigeo": "2869",
      "nombre_ubigeo": "Cotabambas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Cotabambas, Apurimac",
      "buscador_ubigeo": "cotabambas apurimac",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }, {
      "id_ubigeo": "2885",
      "nombre_ubigeo": "Grau",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Grau, Apurimac",
      "buscador_ubigeo": "grau apurimac",
      "numero_hijos_ubigeo": "14",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2812"
    }],
    "2900": [{
      "id_ubigeo": "2901",
      "nombre_ubigeo": "Arequipa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Arequipa, Arequipa, Arequipa",
      "buscador_ubigeo": "arequipa arequipa arequipa",
      "numero_hijos_ubigeo": "29",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "2931",
      "nombre_ubigeo": "Camana",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Camana, Arequipa",
      "buscador_ubigeo": "camana arequipa",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "2940",
      "nombre_ubigeo": "Caraveli",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Caraveli, Arequipa",
      "buscador_ubigeo": "caraveli arequipa",
      "numero_hijos_ubigeo": "13",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "2954",
      "nombre_ubigeo": "Castilla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Castilla, Arequipa",
      "buscador_ubigeo": "castilla arequipa",
      "numero_hijos_ubigeo": "16",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "2971",
      "nombre_ubigeo": "Caylloma",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Caylloma, Arequipa",
      "buscador_ubigeo": "caylloma arequipa",
      "numero_hijos_ubigeo": "20",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "2992",
      "nombre_ubigeo": "Condesuyos",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Condesuyos, Arequipa",
      "buscador_ubigeo": "condesuyos arequipa",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "3001",
      "nombre_ubigeo": "Islay",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Islay, Arequipa",
      "buscador_ubigeo": "islay arequipa",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }, {
      "id_ubigeo": "3008",
      "nombre_ubigeo": "La Union",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "La Union, Arequipa",
      "buscador_ubigeo": "la union arequipa",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "2900"
    }],
    "3020": [{
      "id_ubigeo": "3037",
      "nombre_ubigeo": "Cangallo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cangallo, Ayacucho",
      "buscador_ubigeo": "cangallo ayacucho",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3021",
      "nombre_ubigeo": "Huamanga",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huamanga, Ayacucho",
      "buscador_ubigeo": "huamanga ayacucho",
      "numero_hijos_ubigeo": "15",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3044",
      "nombre_ubigeo": "Huanca Sancos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huanca Sancos, Ayacucho",
      "buscador_ubigeo": "huanca sancos ayacucho",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3049",
      "nombre_ubigeo": "Huanta",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huanta, Ayacucho",
      "buscador_ubigeo": "huanta ayacucho",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3058",
      "nombre_ubigeo": "La Mar",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Mar, Ayacucho",
      "buscador_ubigeo": "la mar ayacucho",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3067",
      "nombre_ubigeo": "Lucanas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Lucanas, Ayacucho",
      "buscador_ubigeo": "lucanas ayacucho",
      "numero_hijos_ubigeo": "21",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3089",
      "nombre_ubigeo": "Parinacochas",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Parinacochas, Ayacucho",
      "buscador_ubigeo": "parinacochas ayacucho",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3098",
      "nombre_ubigeo": "Paucar del Sara Sara",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Paucar del Sara Sara, Ayacucho",
      "buscador_ubigeo": "paucar del sara sara ayacucho",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3109",
      "nombre_ubigeo": "Sucre",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sucre, Ayacucho",
      "buscador_ubigeo": "sucre ayacucho",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3121",
      "nombre_ubigeo": "Victor Fajardo",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Victor Fajardo, Ayacucho",
      "buscador_ubigeo": "victor fajardo ayacucho",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }, {
      "id_ubigeo": "3134",
      "nombre_ubigeo": "Vilcas Huaman",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Vilcas Huaman, Ayacucho",
      "buscador_ubigeo": "vilcas huaman ayacucho",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3020"
    }],
    "3143": [{
      "id_ubigeo": "3157",
      "nombre_ubigeo": "Cajabamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cajabamba, Cajamarca",
      "buscador_ubigeo": "cajabamba cajamarca",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3144",
      "nombre_ubigeo": "Cajamarca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cajamarca, Cajamarca, Cajamarca",
      "buscador_ubigeo": "cajamarca cajamarca cajamarca",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3162",
      "nombre_ubigeo": "Celendin",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Celendin, Cajamarca",
      "buscador_ubigeo": "celendin cajamarca",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3175",
      "nombre_ubigeo": "Chota",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chota, Cajamarca",
      "buscador_ubigeo": "chota cajamarca",
      "numero_hijos_ubigeo": "19",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3195",
      "nombre_ubigeo": "Contumaza",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Contumaza, Cajamarca",
      "buscador_ubigeo": "contumaza cajamarca",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3204",
      "nombre_ubigeo": "Cutervo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cutervo, Cajamarca",
      "buscador_ubigeo": "cutervo cajamarca",
      "numero_hijos_ubigeo": "15",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3220",
      "nombre_ubigeo": "Hualgayoc",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Hualgayoc, Cajamarca",
      "buscador_ubigeo": "hualgayoc cajamarca",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3224",
      "nombre_ubigeo": "Jaen",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Jaen, Cajamarca",
      "buscador_ubigeo": "jaen cajamarca",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3237",
      "nombre_ubigeo": "San Ignacio",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Ignacio, Cajamarca",
      "buscador_ubigeo": "san ignacio cajamarca",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3245",
      "nombre_ubigeo": "San Marcos",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Marcos, Cajamarca",
      "buscador_ubigeo": "san marcos cajamarca",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3253",
      "nombre_ubigeo": "San Miguel",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Miguel, Cajamarca",
      "buscador_ubigeo": "san miguel cajamarca",
      "numero_hijos_ubigeo": "13",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3267",
      "nombre_ubigeo": "San Pablo",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "San Pablo, Cajamarca",
      "buscador_ubigeo": "san pablo cajamarca",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }, {
      "id_ubigeo": "3272",
      "nombre_ubigeo": "Santa Cruz",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Santa Cruz, Cajamarca",
      "buscador_ubigeo": "santa cruz cajamarca",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3143"
    }],
    "3292": [{
      "id_ubigeo": "3302",
      "nombre_ubigeo": "Acomayo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acomayo, Cusco",
      "buscador_ubigeo": "acomayo cusco",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3310",
      "nombre_ubigeo": "Anta",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Anta, Cusco",
      "buscador_ubigeo": "anta cusco",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3320",
      "nombre_ubigeo": "Calca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Calca, Cusco",
      "buscador_ubigeo": "calca cusco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3329",
      "nombre_ubigeo": "Canas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Canas, Cusco",
      "buscador_ubigeo": "canas cusco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3338",
      "nombre_ubigeo": "Canchis",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Canchis, Cusco",
      "buscador_ubigeo": "canchis cusco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3347",
      "nombre_ubigeo": "Chumbivilcas",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Chumbivilcas, Cusco",
      "buscador_ubigeo": "chumbivilcas cusco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3293",
      "nombre_ubigeo": "Cusco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cusco, Cusco, Cusco",
      "buscador_ubigeo": "cusco cusco cusco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3356",
      "nombre_ubigeo": "Espinar",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Espinar, Cusco",
      "buscador_ubigeo": "espinar cusco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3365",
      "nombre_ubigeo": "La Convencion",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "La Convencion, Cusco",
      "buscador_ubigeo": "la convencion cusco",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3376",
      "nombre_ubigeo": "Paruro",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Paruro, Cusco",
      "buscador_ubigeo": "paruro cusco",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3386",
      "nombre_ubigeo": "Paucartambo",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Paucartambo, Cusco",
      "buscador_ubigeo": "paucartambo cusco",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3393",
      "nombre_ubigeo": "Quispicanchi",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Quispicanchi, Cusco",
      "buscador_ubigeo": "quispicanchi cusco",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }, {
      "id_ubigeo": "3406",
      "nombre_ubigeo": "Urubamba",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Urubamba, Cusco",
      "buscador_ubigeo": "urubamba cusco",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3292"
    }],
    "3414": [{
      "id_ubigeo": "3435",
      "nombre_ubigeo": "Acobamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acobamba, Huancavelica",
      "buscador_ubigeo": "acobamba huancavelica",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }, {
      "id_ubigeo": "3444",
      "nombre_ubigeo": "Angaraes",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Angaraes, Huancavelica",
      "buscador_ubigeo": "angaraes huancavelica",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }, {
      "id_ubigeo": "3457",
      "nombre_ubigeo": "Castrovirreyna",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Castrovirreyna, Huancavelica",
      "buscador_ubigeo": "castrovirreyna huancavelica",
      "numero_hijos_ubigeo": "13",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }, {
      "id_ubigeo": "3471",
      "nombre_ubigeo": "Churcampa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Churcampa, Huancavelica",
      "buscador_ubigeo": "churcampa huancavelica",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }, {
      "id_ubigeo": "3415",
      "nombre_ubigeo": "Huancavelica",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancavelica, Huancavelica, Huancavelica",
      "buscador_ubigeo": "huancavelica huancavelica huancavelica",
      "numero_hijos_ubigeo": "19",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }, {
      "id_ubigeo": "3482",
      "nombre_ubigeo": "Huaytara",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huaytara, Huancavelica",
      "buscador_ubigeo": "huaytara huancavelica",
      "numero_hijos_ubigeo": "16",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }, {
      "id_ubigeo": "3499",
      "nombre_ubigeo": "Tayacaja",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Tayacaja, Huancavelica",
      "buscador_ubigeo": "tayacaja huancavelica",
      "numero_hijos_ubigeo": "18",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3414"
    }],
    "3518": [{
      "id_ubigeo": "3531",
      "nombre_ubigeo": "Ambo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ambo, Huanuco",
      "buscador_ubigeo": "ambo huanuco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3540",
      "nombre_ubigeo": "Dos de Mayo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Dos de Mayo, Huanuco",
      "buscador_ubigeo": "dos de mayo huanuco",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3550",
      "nombre_ubigeo": "Huacaybamba",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huacaybamba, Huanuco",
      "buscador_ubigeo": "huacaybamba huanuco",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3555",
      "nombre_ubigeo": "Huamalies",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huamalies, Huanuco",
      "buscador_ubigeo": "huamalies huanuco",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3519",
      "nombre_ubigeo": "Huanuco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huanuco, Huanuco, Huanuco",
      "buscador_ubigeo": "huanuco huanuco huanuco",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3589",
      "nombre_ubigeo": "Lauricocha",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Lauricocha, Huanuco",
      "buscador_ubigeo": "lauricocha huanuco",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3567",
      "nombre_ubigeo": "Leoncio Prado",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Leoncio Prado, Huanuco",
      "buscador_ubigeo": "leoncio prado huanuco",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3574",
      "nombre_ubigeo": "Maraqon",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Maraqon, Huanuco",
      "buscador_ubigeo": "maraqon huanuco",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3578",
      "nombre_ubigeo": "Pachitea",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pachitea, Huanuco",
      "buscador_ubigeo": "pachitea huanuco",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3583",
      "nombre_ubigeo": "Puerto Inca",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Puerto Inca, Huanuco",
      "buscador_ubigeo": "puerto inca huanuco",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }, {
      "id_ubigeo": "3597",
      "nombre_ubigeo": "Yarowilca",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yarowilca, Huanuco",
      "buscador_ubigeo": "yarowilca huanuco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3518"
    }],
    "3606": [{
      "id_ubigeo": "3622",
      "nombre_ubigeo": "Chincha",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chincha, Ica",
      "buscador_ubigeo": "chincha ica",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3606"
    }, {
      "id_ubigeo": "3607",
      "nombre_ubigeo": "Ica",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ica, Ica, Ica",
      "buscador_ubigeo": "ica ica ica",
      "numero_hijos_ubigeo": "14",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3606"
    }, {
      "id_ubigeo": "3634",
      "nombre_ubigeo": "Nazca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Nazca, Ica",
      "buscador_ubigeo": "nazca ica",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3606"
    }, {
      "id_ubigeo": "3640",
      "nombre_ubigeo": "Palpa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Palpa, Ica",
      "buscador_ubigeo": "palpa ica",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3606"
    }, {
      "id_ubigeo": "3646",
      "nombre_ubigeo": "Pisco",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pisco, Ica",
      "buscador_ubigeo": "pisco ica",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3606"
    }],
    "3655": [{
      "id_ubigeo": "3701",
      "nombre_ubigeo": "Chanchamayo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chanchamayo, Junin",
      "buscador_ubigeo": "chanchamayo junin",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3778",
      "nombre_ubigeo": "Chupaca",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Chupaca, Junin",
      "buscador_ubigeo": "chupaca junin",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3685",
      "nombre_ubigeo": "Concepcion",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Concepcion, Junin",
      "buscador_ubigeo": "concepcion junin",
      "numero_hijos_ubigeo": "15",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3656",
      "nombre_ubigeo": "Huancayo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancayo, Junin",
      "buscador_ubigeo": "huancayo junin",
      "numero_hijos_ubigeo": "28",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3708",
      "nombre_ubigeo": "Jauja",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Jauja, Junin",
      "buscador_ubigeo": "jauja junin",
      "numero_hijos_ubigeo": "34",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3743",
      "nombre_ubigeo": "Junin",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Junin, Junin, Junin",
      "buscador_ubigeo": "junin junin junin",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3748",
      "nombre_ubigeo": "Satipo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Satipo, Junin",
      "buscador_ubigeo": "satipo junin",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3757",
      "nombre_ubigeo": "Tarma",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Tarma, Junin",
      "buscador_ubigeo": "tarma junin",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }, {
      "id_ubigeo": "3767",
      "nombre_ubigeo": "Yauli",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yauli, Junin",
      "buscador_ubigeo": "yauli junin",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3655"
    }],
    "3788": [{
      "id_ubigeo": "3801",
      "nombre_ubigeo": "Ascope",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ascope, La Libertad",
      "buscador_ubigeo": "ascope la libertad",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3810",
      "nombre_ubigeo": "Bolivar",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Bolivar, La Libertad",
      "buscador_ubigeo": "bolivar la libertad",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3817",
      "nombre_ubigeo": "Chepen",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chepen, La Libertad",
      "buscador_ubigeo": "chepen la libertad",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3875",
      "nombre_ubigeo": "Gran Chimu",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Gran Chimu, La Libertad",
      "buscador_ubigeo": "gran chimu la libertad",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3821",
      "nombre_ubigeo": "Julcan",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Julcan, La Libertad",
      "buscador_ubigeo": "julcan la libertad",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3826",
      "nombre_ubigeo": "Otuzco",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Otuzco, La Libertad",
      "buscador_ubigeo": "otuzco la libertad",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3837",
      "nombre_ubigeo": "Pacasmayo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pacasmayo, La Libertad",
      "buscador_ubigeo": "pacasmayo la libertad",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3843",
      "nombre_ubigeo": "Pataz",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pataz, La Libertad",
      "buscador_ubigeo": "pataz la libertad",
      "numero_hijos_ubigeo": "13",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3857",
      "nombre_ubigeo": "Sanchez Carrion",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sanchez Carrion, La Libertad",
      "buscador_ubigeo": "sanchez carrion la libertad",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3866",
      "nombre_ubigeo": "Santiago de Chuco",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santiago de Chuco, La Libertad",
      "buscador_ubigeo": "santiago de chuco la libertad",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3789",
      "nombre_ubigeo": "Trujillo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Trujillo, La Libertad",
      "buscador_ubigeo": "trujillo la libertad",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }, {
      "id_ubigeo": "3880",
      "nombre_ubigeo": "Viru",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Viru, La Libertad",
      "buscador_ubigeo": "viru la libertad",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3788"
    }],
    "3884": [{
      "id_ubigeo": "3885",
      "nombre_ubigeo": "Chiclayo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chiclayo, Lambayeque",
      "buscador_ubigeo": "chiclayo lambayeque",
      "numero_hijos_ubigeo": "20",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3884"
    }, {
      "id_ubigeo": "3906",
      "nombre_ubigeo": "Ferreqafe",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ferreqafe, Lambayeque",
      "buscador_ubigeo": "ferreqafe lambayeque",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3884"
    }, {
      "id_ubigeo": "3913",
      "nombre_ubigeo": "Lambayeque",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Lambayeque, Lambayeque, Lambayeque",
      "buscador_ubigeo": "lambayeque lambayeque lambayeque",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3884"
    }],
    "3926": [{
      "id_ubigeo": "3971",
      "nombre_ubigeo": "Barranca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Barranca, Lima",
      "buscador_ubigeo": "barranca lima",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "3977",
      "nombre_ubigeo": "Cajatambo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cajatambo, Lima",
      "buscador_ubigeo": "cajatambo lima",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "3285",
      "nombre_ubigeo": "Callao",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Callao, Callao, Lima",
      "buscador_ubigeo": "callao callao lima",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "3991",
      "nombre_ubigeo": "Ca\u00f1ete",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ca\u00f1ete, Lima",
      "buscador_ubigeo": "ca\u00f1ete lima",
      "numero_hijos_ubigeo": "16",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "3983",
      "nombre_ubigeo": "Canta",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Canta, Lima",
      "buscador_ubigeo": "canta lima",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "4008",
      "nombre_ubigeo": "Huaral",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huaral, Lima",
      "buscador_ubigeo": "huaral lima",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "4021",
      "nombre_ubigeo": "Huarochiri",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huarochiri, Lima",
      "buscador_ubigeo": "huarochiri lima",
      "numero_hijos_ubigeo": "32",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "4054",
      "nombre_ubigeo": "Huaura",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huaura, Lima",
      "buscador_ubigeo": "huaura lima",
      "numero_hijos_ubigeo": "12",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "3927",
      "nombre_ubigeo": "Lima",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Lima, Lima, Lima",
      "buscador_ubigeo": "lima lima lima",
      "numero_hijos_ubigeo": "43",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "4067",
      "nombre_ubigeo": "Oyon",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Oyon, Lima",
      "buscador_ubigeo": "oyon lima",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }, {
      "id_ubigeo": "4074",
      "nombre_ubigeo": "Yauyos",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Yauyos, Lima",
      "buscador_ubigeo": "yauyos lima",
      "numero_hijos_ubigeo": "33",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "3926"
    }],
    "4108": [{
      "id_ubigeo": "4123",
      "nombre_ubigeo": "Alto Amazonas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Amazonas, Loreto",
      "buscador_ubigeo": "alto amazonas loreto",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4108"
    }, {
      "id_ubigeo": "4135",
      "nombre_ubigeo": "Loreto",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Loreto, Loreto",
      "buscador_ubigeo": "loreto loreto",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4108"
    }, {
      "id_ubigeo": "4141",
      "nombre_ubigeo": "Mariscal Ramon Castilla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Mariscal Ramon Castilla, Loreto",
      "buscador_ubigeo": "mariscal ramon castilla loreto",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4108"
    }, {
      "id_ubigeo": "4109",
      "nombre_ubigeo": "Maynas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Maynas, Loreto",
      "buscador_ubigeo": "maynas loreto",
      "numero_hijos_ubigeo": "13",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4108"
    }, {
      "id_ubigeo": "4146",
      "nombre_ubigeo": "Requena",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Requena, Loreto",
      "buscador_ubigeo": "requena loreto",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4108"
    }, {
      "id_ubigeo": "4158",
      "nombre_ubigeo": "Ucayali",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ucayali, Loreto",
      "buscador_ubigeo": "ucayali loreto",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4108"
    }],
    "4165": [{
      "id_ubigeo": "4171",
      "nombre_ubigeo": "Manu",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Manu, Madre de Dios",
      "buscador_ubigeo": "manu madre de dios",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4165"
    }, {
      "id_ubigeo": "4176",
      "nombre_ubigeo": "Tahuamanu",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Tahuamanu, Madre de Dios",
      "buscador_ubigeo": "tahuamanu madre de dios",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4165"
    }, {
      "id_ubigeo": "4166",
      "nombre_ubigeo": "Tambopata",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tambopata, Madre de Dios",
      "buscador_ubigeo": "tambopata madre de dios",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4165"
    }],
    "4180": [{
      "id_ubigeo": "4188",
      "nombre_ubigeo": "General Sanchez Cerro",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "General Sanchez Cerro, Moquegua",
      "buscador_ubigeo": "general sanchez cerro moquegua",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4180"
    }, {
      "id_ubigeo": "4200",
      "nombre_ubigeo": "Ilo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ilo, Moquegua",
      "buscador_ubigeo": "ilo moquegua",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4180"
    }, {
      "id_ubigeo": "4181",
      "nombre_ubigeo": "Mariscal Nieto",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Mariscal Nieto, Moquegua",
      "buscador_ubigeo": "mariscal nieto moquegua",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4180"
    }],
    "4204": [{
      "id_ubigeo": "4219",
      "nombre_ubigeo": "Daniel Alcides Carrion",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Daniel Alcides Carrion, Pasco",
      "buscador_ubigeo": "daniel alcides carrion pasco",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4204"
    }, {
      "id_ubigeo": "4228",
      "nombre_ubigeo": "Oxapampa",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Oxapampa, Pasco",
      "buscador_ubigeo": "oxapampa pasco",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4204"
    }, {
      "id_ubigeo": "4205",
      "nombre_ubigeo": "Pasco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pasco, Pasco",
      "buscador_ubigeo": "pasco pasco",
      "numero_hijos_ubigeo": "13",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4204"
    }],
    "4236": [{
      "id_ubigeo": "4247",
      "nombre_ubigeo": "Ayabaca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ayabaca, Piura",
      "buscador_ubigeo": "ayabaca piura",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4258",
      "nombre_ubigeo": "Huancabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huancabamba, Piura",
      "buscador_ubigeo": "huancabamba piura",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4267",
      "nombre_ubigeo": "Morropon",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Morropon, Piura",
      "buscador_ubigeo": "morropon piura",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4278",
      "nombre_ubigeo": "Paita",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Paita, Piura",
      "buscador_ubigeo": "paita piura",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4237",
      "nombre_ubigeo": "Piura",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Piura, Piura, Piura",
      "buscador_ubigeo": "piura piura piura",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4302",
      "nombre_ubigeo": "Sechura",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Sechura, Piura",
      "buscador_ubigeo": "sechura piura",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4286",
      "nombre_ubigeo": "Sullana",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Sullana, Piura",
      "buscador_ubigeo": "sullana piura",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }, {
      "id_ubigeo": "4295",
      "nombre_ubigeo": "Talara",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Talara, Piura",
      "buscador_ubigeo": "talara piura",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4236"
    }],
    "4309": [{
      "id_ubigeo": "4326",
      "nombre_ubigeo": "Azangaro",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Azangaro, Puno",
      "buscador_ubigeo": "azangaro puno",
      "numero_hijos_ubigeo": "15",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4342",
      "nombre_ubigeo": "Carabaya",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Carabaya, Puno",
      "buscador_ubigeo": "carabaya puno",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4353",
      "nombre_ubigeo": "Chucuito",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chucuito, Puno",
      "buscador_ubigeo": "chucuito puno",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4361",
      "nombre_ubigeo": "El Collao",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "El Collao, Puno",
      "buscador_ubigeo": "el collao puno",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4367",
      "nombre_ubigeo": "Huancane",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huancane, Puno",
      "buscador_ubigeo": "huancane puno",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4376",
      "nombre_ubigeo": "Lampa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Lampa, Puno",
      "buscador_ubigeo": "lampa puno",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4387",
      "nombre_ubigeo": "Melgar",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Melgar, Puno",
      "buscador_ubigeo": "melgar puno",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4397",
      "nombre_ubigeo": "Moho",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Moho, Puno",
      "buscador_ubigeo": "moho puno",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4310",
      "nombre_ubigeo": "Puno",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Puno, Puno, Puno",
      "buscador_ubigeo": "puno puno puno",
      "numero_hijos_ubigeo": "15",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4402",
      "nombre_ubigeo": "San Antonio de Putina",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Antonio de Putina, Puno",
      "buscador_ubigeo": "san antonio de putina puno",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4408",
      "nombre_ubigeo": "San Roman",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Roman, Puno",
      "buscador_ubigeo": "san roman puno",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4413",
      "nombre_ubigeo": "Sandia",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Sandia, Puno",
      "buscador_ubigeo": "sandia puno",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }, {
      "id_ubigeo": "4423",
      "nombre_ubigeo": "Yunguyo",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Yunguyo, Puno",
      "buscador_ubigeo": "yunguyo puno",
      "numero_hijos_ubigeo": "7",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4309"
    }],
    "4431": [{
      "id_ubigeo": "4439",
      "nombre_ubigeo": "Bellavista",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bellavista, San Martin",
      "buscador_ubigeo": "bellavista san martin",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4446",
      "nombre_ubigeo": "El Dorado",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "El Dorado, San Martin",
      "buscador_ubigeo": "el dorado san martin",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4452",
      "nombre_ubigeo": "Huallaga",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huallaga, San Martin",
      "buscador_ubigeo": "huallaga san martin",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4459",
      "nombre_ubigeo": "Lamas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Lamas, San Martin",
      "buscador_ubigeo": "lamas san martin",
      "numero_hijos_ubigeo": "11",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4471",
      "nombre_ubigeo": "Mariscal Caceres",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Mariscal Caceres, San Martin",
      "buscador_ubigeo": "mariscal caceres san martin",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4432",
      "nombre_ubigeo": "Moyobamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Moyobamba, San Martin",
      "buscador_ubigeo": "moyobamba san martin",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4477",
      "nombre_ubigeo": "Picota",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Picota, San Martin",
      "buscador_ubigeo": "picota san martin",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4488",
      "nombre_ubigeo": "Rioja",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Rioja, San Martin",
      "buscador_ubigeo": "rioja san martin",
      "numero_hijos_ubigeo": "9",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4498",
      "nombre_ubigeo": "San Martin",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Martin, San Martin",
      "buscador_ubigeo": "san martin san martin",
      "numero_hijos_ubigeo": "14",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }, {
      "id_ubigeo": "4513",
      "nombre_ubigeo": "Tocache",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Tocache, San Martin",
      "buscador_ubigeo": "tocache san martin",
      "numero_hijos_ubigeo": "5",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4431"
    }],
    "4519": [{
      "id_ubigeo": "4531",
      "nombre_ubigeo": "Candarave",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Candarave, Tacna",
      "buscador_ubigeo": "candarave tacna",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4519"
    }, {
      "id_ubigeo": "4538",
      "nombre_ubigeo": "Jorge Basadre",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Jorge Basadre, Tacna",
      "buscador_ubigeo": "jorge basadre tacna",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4519"
    }, {
      "id_ubigeo": "4520",
      "nombre_ubigeo": "Tacna",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tacna, Tacna, Tacna",
      "buscador_ubigeo": "tacna tacna tacna",
      "numero_hijos_ubigeo": "10",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4519"
    }, {
      "id_ubigeo": "4542",
      "nombre_ubigeo": "Tarata",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Tarata, Tacna",
      "buscador_ubigeo": "tarata tacna",
      "numero_hijos_ubigeo": "8",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4519"
    }],
    "4551": [{
      "id_ubigeo": "4559",
      "nombre_ubigeo": "Contralmirante Villar",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Contralmirante Villar, Tumbes",
      "buscador_ubigeo": "contralmirante villar tumbes",
      "numero_hijos_ubigeo": "2",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4551"
    }, {
      "id_ubigeo": "4552",
      "nombre_ubigeo": "Tumbes",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tumbes, Tumbes, Tumbes",
      "buscador_ubigeo": "tumbes tumbes tumbes",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4551"
    }, {
      "id_ubigeo": "4562",
      "nombre_ubigeo": "Zarumilla",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Zarumilla, Tumbes",
      "buscador_ubigeo": "zarumilla tumbes",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4551"
    }],
    "4567": [{
      "id_ubigeo": "4575",
      "nombre_ubigeo": "Atalaya",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Atalaya, Ucayali",
      "buscador_ubigeo": "atalaya ucayali",
      "numero_hijos_ubigeo": "4",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4567"
    }, {
      "id_ubigeo": "4568",
      "nombre_ubigeo": "Coronel Portillo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Coronel Portillo, Ucayali",
      "buscador_ubigeo": "coronel portillo ucayali",
      "numero_hijos_ubigeo": "6",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4567"
    }, {
      "id_ubigeo": "4580",
      "nombre_ubigeo": "Padre Abad",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Padre Abad, Ucayali",
      "buscador_ubigeo": "padre abad ucayali",
      "numero_hijos_ubigeo": "3",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4567"
    }, {
      "id_ubigeo": "4584",
      "nombre_ubigeo": "Purus",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Purus, Ucayali",
      "buscador_ubigeo": "purus ucayali",
      "numero_hijos_ubigeo": "1",
      "nivel_ubigeo": "2",
      "id_padre_ubigeo": "4567"
    }]
  };
  ubigeo.distritos = {
    "2557": [{
      "id_ubigeo": "2559",
      "nombre_ubigeo": "Aramango",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aramango, Bagua",
      "buscador_ubigeo": "aramango bagua",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2557"
    }, {
      "id_ubigeo": "2560",
      "nombre_ubigeo": "Copallin",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Copallin, Bagua",
      "buscador_ubigeo": "copallin bagua",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2557"
    }, {
      "id_ubigeo": "2561",
      "nombre_ubigeo": "El Parco",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "El Parco, Bagua",
      "buscador_ubigeo": "el parco bagua",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2557"
    }, {
      "id_ubigeo": "2562",
      "nombre_ubigeo": "Imaza",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Imaza, Bagua",
      "buscador_ubigeo": "imaza bagua",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2557"
    }, {
      "id_ubigeo": "2558",
      "nombre_ubigeo": "La Peca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "La Peca, Bagua",
      "buscador_ubigeo": "la peca bagua",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2557"
    }],
    "2563": [{
      "id_ubigeo": "2567",
      "nombre_ubigeo": "Chisquilla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chisquilla, Bongara",
      "buscador_ubigeo": "chisquilla bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2568",
      "nombre_ubigeo": "Churuja",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Churuja, Bongara",
      "buscador_ubigeo": "churuja bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2565",
      "nombre_ubigeo": "Corosha",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Corosha, Bongara",
      "buscador_ubigeo": "corosha bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2566",
      "nombre_ubigeo": "Cuispes",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cuispes, Bongara",
      "buscador_ubigeo": "cuispes bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2569",
      "nombre_ubigeo": "Florida",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Florida, Bongara",
      "buscador_ubigeo": "florida bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2575",
      "nombre_ubigeo": "Jazan",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Jazan, Bongara",
      "buscador_ubigeo": "jazan bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2564",
      "nombre_ubigeo": "Jumbilla",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Jumbilla, Bongara",
      "buscador_ubigeo": "jumbilla bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2570",
      "nombre_ubigeo": "Recta",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Recta, Bongara",
      "buscador_ubigeo": "recta bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2571",
      "nombre_ubigeo": "San Carlos",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Carlos, Bongara",
      "buscador_ubigeo": "san carlos bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2572",
      "nombre_ubigeo": "Shipasbamba",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Shipasbamba, Bongara",
      "buscador_ubigeo": "shipasbamba bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2573",
      "nombre_ubigeo": "Valera",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Valera, Bongara",
      "buscador_ubigeo": "valera bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }, {
      "id_ubigeo": "2574",
      "nombre_ubigeo": "Yambrasbamba",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yambrasbamba, Bongara",
      "buscador_ubigeo": "yambrasbamba bongara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2563"
    }],
    "2535": [{
      "id_ubigeo": "2537",
      "nombre_ubigeo": "Asuncion",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Asuncion, Chachapoyas",
      "buscador_ubigeo": "asuncion chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2538",
      "nombre_ubigeo": "Balsas",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Balsas, Chachapoyas",
      "buscador_ubigeo": "balsas chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2536",
      "nombre_ubigeo": "Chachapoyas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chachapoyas, Chachapoyas",
      "buscador_ubigeo": "chachapoyas chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2539",
      "nombre_ubigeo": "Cheto",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cheto, Chachapoyas",
      "buscador_ubigeo": "cheto chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2540",
      "nombre_ubigeo": "Chiliquin",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chiliquin, Chachapoyas",
      "buscador_ubigeo": "chiliquin chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2541",
      "nombre_ubigeo": "Chuquibamba",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chuquibamba, Chachapoyas",
      "buscador_ubigeo": "chuquibamba chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2542",
      "nombre_ubigeo": "Granada",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Granada, Chachapoyas",
      "buscador_ubigeo": "granada chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2543",
      "nombre_ubigeo": "Huancas",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huancas, Chachapoyas",
      "buscador_ubigeo": "huancas chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2544",
      "nombre_ubigeo": "La Jalca",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "La Jalca, Chachapoyas",
      "buscador_ubigeo": "la jalca chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2545",
      "nombre_ubigeo": "Leimebamba",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Leimebamba, Chachapoyas",
      "buscador_ubigeo": "leimebamba chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2546",
      "nombre_ubigeo": "Levanto",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Levanto, Chachapoyas",
      "buscador_ubigeo": "levanto chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2547",
      "nombre_ubigeo": "Magdalena",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Magdalena, Chachapoyas",
      "buscador_ubigeo": "magdalena chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2548",
      "nombre_ubigeo": "Mariscal Castilla",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Mariscal Castilla, Chachapoyas",
      "buscador_ubigeo": "mariscal castilla chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2549",
      "nombre_ubigeo": "Molinopampa",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Molinopampa, Chachapoyas",
      "buscador_ubigeo": "molinopampa chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2550",
      "nombre_ubigeo": "Montevideo",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Montevideo, Chachapoyas",
      "buscador_ubigeo": "montevideo chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2551",
      "nombre_ubigeo": "Olleros",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Olleros, Chachapoyas",
      "buscador_ubigeo": "olleros chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2552",
      "nombre_ubigeo": "Quinjalca",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Quinjalca, Chachapoyas",
      "buscador_ubigeo": "quinjalca chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2553",
      "nombre_ubigeo": "San Francisco de Daguas",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "San Francisco de Daguas, Chachapoyas",
      "buscador_ubigeo": "san francisco de daguas chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2554",
      "nombre_ubigeo": "San Isidro de Maino",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "San Isidro de Maino, Chachapoyas",
      "buscador_ubigeo": "san isidro de maino chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2555",
      "nombre_ubigeo": "Soloco",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Soloco, Chachapoyas",
      "buscador_ubigeo": "soloco chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }, {
      "id_ubigeo": "2556",
      "nombre_ubigeo": "Sonche",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Sonche, Chachapoyas",
      "buscador_ubigeo": "sonche chachapoyas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2535"
    }],
    "2576": [{
      "id_ubigeo": "2578",
      "nombre_ubigeo": "El Cenepa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "El Cenepa, Condorcanqui",
      "buscador_ubigeo": "el cenepa condorcanqui",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2576"
    }, {
      "id_ubigeo": "2577",
      "nombre_ubigeo": "Nieva",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Nieva, Condorcanqui",
      "buscador_ubigeo": "nieva condorcanqui",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2576"
    }, {
      "id_ubigeo": "2579",
      "nombre_ubigeo": "Rio Santiago",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Rio Santiago, Condorcanqui",
      "buscador_ubigeo": "rio santiago condorcanqui",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2576"
    }],
    "2580": [{
      "id_ubigeo": "2582",
      "nombre_ubigeo": "Camporredondo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Camporredondo, Luya",
      "buscador_ubigeo": "camporredondo luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2583",
      "nombre_ubigeo": "Cocabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cocabamba, Luya",
      "buscador_ubigeo": "cocabamba luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2584",
      "nombre_ubigeo": "Colcamar",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Colcamar, Luya",
      "buscador_ubigeo": "colcamar luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2585",
      "nombre_ubigeo": "Conila",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Conila, Luya",
      "buscador_ubigeo": "conila luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2586",
      "nombre_ubigeo": "Inguilpata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Inguilpata, Luya",
      "buscador_ubigeo": "inguilpata luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2581",
      "nombre_ubigeo": "Lamud",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Lamud, Luya",
      "buscador_ubigeo": "lamud luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2587",
      "nombre_ubigeo": "Longuita",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Longuita, Luya",
      "buscador_ubigeo": "longuita luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2588",
      "nombre_ubigeo": "Lonya Chico",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Lonya Chico, Luya",
      "buscador_ubigeo": "lonya chico luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2589",
      "nombre_ubigeo": "Luya",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Luya, Luya",
      "buscador_ubigeo": "luya luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2590",
      "nombre_ubigeo": "Luya Viejo",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Luya Viejo, Luya",
      "buscador_ubigeo": "luya viejo luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2591",
      "nombre_ubigeo": "Maria",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Maria, Luya",
      "buscador_ubigeo": "maria luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2592",
      "nombre_ubigeo": "Ocalli",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Ocalli, Luya",
      "buscador_ubigeo": "ocalli luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2593",
      "nombre_ubigeo": "Ocumal",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Ocumal, Luya",
      "buscador_ubigeo": "ocumal luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2594",
      "nombre_ubigeo": "Pisuquia",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Pisuquia, Luya",
      "buscador_ubigeo": "pisuquia luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2595",
      "nombre_ubigeo": "Providencia",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Providencia, Luya",
      "buscador_ubigeo": "providencia luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2596",
      "nombre_ubigeo": "San Cristobal",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "San Cristobal, Luya",
      "buscador_ubigeo": "san cristobal luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2597",
      "nombre_ubigeo": "San Francisco del Yeso",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "San Francisco del Yeso, Luya",
      "buscador_ubigeo": "san francisco del yeso luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2598",
      "nombre_ubigeo": "San Jeronimo",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "San Jeronimo, Luya",
      "buscador_ubigeo": "san jeronimo luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2599",
      "nombre_ubigeo": "San Juan de Lopecancha",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "San Juan de Lopecancha, Luya",
      "buscador_ubigeo": "san juan de lopecancha luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2600",
      "nombre_ubigeo": "Santa Catalina",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Santa Catalina, Luya",
      "buscador_ubigeo": "santa catalina luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2601",
      "nombre_ubigeo": "Santo Tomas",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Santo Tomas, Luya",
      "buscador_ubigeo": "santo tomas luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2602",
      "nombre_ubigeo": "Tingo",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Tingo, Luya",
      "buscador_ubigeo": "tingo luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }, {
      "id_ubigeo": "2603",
      "nombre_ubigeo": "Trita",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "Trita, Luya",
      "buscador_ubigeo": "trita luya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2580"
    }],
    "2604": [{
      "id_ubigeo": "2606",
      "nombre_ubigeo": "Chirimoto",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chirimoto, Rodriguez de Mendoza",
      "buscador_ubigeo": "chirimoto rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2607",
      "nombre_ubigeo": "Cochamal",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cochamal, Rodriguez de Mendoza",
      "buscador_ubigeo": "cochamal rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2608",
      "nombre_ubigeo": "Huambo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huambo, Rodriguez de Mendoza",
      "buscador_ubigeo": "huambo rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2609",
      "nombre_ubigeo": "Limabamba",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Limabamba, Rodriguez de Mendoza",
      "buscador_ubigeo": "limabamba rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2610",
      "nombre_ubigeo": "Longar",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Longar, Rodriguez de Mendoza",
      "buscador_ubigeo": "longar rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2611",
      "nombre_ubigeo": "Mariscal Benavides",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Mariscal Benavides, Rodriguez de Mendoza",
      "buscador_ubigeo": "mariscal benavides rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2612",
      "nombre_ubigeo": "Milpuc",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Milpuc, Rodriguez de Mendoza",
      "buscador_ubigeo": "milpuc rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2613",
      "nombre_ubigeo": "Omia",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Omia, Rodriguez de Mendoza",
      "buscador_ubigeo": "omia rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2605",
      "nombre_ubigeo": "San Nicolas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Nicolas, Rodriguez de Mendoza",
      "buscador_ubigeo": "san nicolas rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2614",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santa Rosa, Rodriguez de Mendoza",
      "buscador_ubigeo": "santa rosa rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2615",
      "nombre_ubigeo": "Totora",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Totora, Rodriguez de Mendoza",
      "buscador_ubigeo": "totora rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }, {
      "id_ubigeo": "2616",
      "nombre_ubigeo": "Vista Alegre",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Vista Alegre, Rodriguez de Mendoza",
      "buscador_ubigeo": "vista alegre rodriguez de mendoza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2604"
    }],
    "2617": [{
      "id_ubigeo": "2618",
      "nombre_ubigeo": "Bagua Grande",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Bagua Grande, Utcubamba",
      "buscador_ubigeo": "bagua grande utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }, {
      "id_ubigeo": "2619",
      "nombre_ubigeo": "Cajaruro",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cajaruro, Utcubamba",
      "buscador_ubigeo": "cajaruro utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }, {
      "id_ubigeo": "2620",
      "nombre_ubigeo": "Cumba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cumba, Utcubamba",
      "buscador_ubigeo": "cumba utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }, {
      "id_ubigeo": "2621",
      "nombre_ubigeo": "El Milagro",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "El Milagro, Utcubamba",
      "buscador_ubigeo": "el milagro utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }, {
      "id_ubigeo": "2622",
      "nombre_ubigeo": "Jamalca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Jamalca, Utcubamba",
      "buscador_ubigeo": "jamalca utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }, {
      "id_ubigeo": "2623",
      "nombre_ubigeo": "Lonya Grande",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Lonya Grande, Utcubamba",
      "buscador_ubigeo": "lonya grande utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }, {
      "id_ubigeo": "2624",
      "nombre_ubigeo": "Yamon",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Yamon, Utcubamba",
      "buscador_ubigeo": "yamon utcubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2617"
    }],
    "2639": [{
      "id_ubigeo": "2640",
      "nombre_ubigeo": "Aija",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Aija, Aija",
      "buscador_ubigeo": "aija aija",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2639"
    }, {
      "id_ubigeo": "2641",
      "nombre_ubigeo": "Coris",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Coris, Aija",
      "buscador_ubigeo": "coris aija",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2639"
    }, {
      "id_ubigeo": "2642",
      "nombre_ubigeo": "Huacllan",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huacllan, Aija",
      "buscador_ubigeo": "huacllan aija",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2639"
    }, {
      "id_ubigeo": "2643",
      "nombre_ubigeo": "La Merced",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "La Merced, Aija",
      "buscador_ubigeo": "la merced aija",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2639"
    }, {
      "id_ubigeo": "2644",
      "nombre_ubigeo": "Succha",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Succha, Aija",
      "buscador_ubigeo": "succha aija",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2639"
    }],
    "2645": [{
      "id_ubigeo": "2647",
      "nombre_ubigeo": "Aczo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aczo, Antonio Raymondi",
      "buscador_ubigeo": "aczo antonio raymondi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2645"
    }, {
      "id_ubigeo": "2648",
      "nombre_ubigeo": "Chaccho",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chaccho, Antonio Raymondi",
      "buscador_ubigeo": "chaccho antonio raymondi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2645"
    }, {
      "id_ubigeo": "2649",
      "nombre_ubigeo": "Chingas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chingas, Antonio Raymondi",
      "buscador_ubigeo": "chingas antonio raymondi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2645"
    }, {
      "id_ubigeo": "2646",
      "nombre_ubigeo": "Llamellin",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Llamellin, Antonio Raymondi",
      "buscador_ubigeo": "llamellin antonio raymondi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2645"
    }, {
      "id_ubigeo": "2650",
      "nombre_ubigeo": "Mirgas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mirgas, Antonio Raymondi",
      "buscador_ubigeo": "mirgas antonio raymondi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2645"
    }, {
      "id_ubigeo": "2651",
      "nombre_ubigeo": "San Juan de Rontoy",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Juan de Rontoy, Antonio Raymondi",
      "buscador_ubigeo": "san juan de rontoy antonio raymondi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2645"
    }],
    "2652": [{
      "id_ubigeo": "2654",
      "nombre_ubigeo": "Acochaca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acochaca, Asuncion",
      "buscador_ubigeo": "acochaca asuncion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2652"
    }, {
      "id_ubigeo": "2653",
      "nombre_ubigeo": "Chacas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chacas, Asuncion",
      "buscador_ubigeo": "chacas asuncion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2652"
    }],
    "2655": [{
      "id_ubigeo": "2657",
      "nombre_ubigeo": "Abelardo Pardo Lezameta",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Abelardo Pardo Lezameta, Bolognesi",
      "buscador_ubigeo": "abelardo pardo lezameta bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2658",
      "nombre_ubigeo": "Antonio Raymondi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Antonio Raymondi, Bolognesi",
      "buscador_ubigeo": "antonio raymondi bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2659",
      "nombre_ubigeo": "Aquia",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Aquia, Bolognesi",
      "buscador_ubigeo": "aquia bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2660",
      "nombre_ubigeo": "Cajacay",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Cajacay, Bolognesi",
      "buscador_ubigeo": "cajacay bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2661",
      "nombre_ubigeo": "Canis",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Canis, Bolognesi",
      "buscador_ubigeo": "canis bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2656",
      "nombre_ubigeo": "Chiquian",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chiquian, Bolognesi",
      "buscador_ubigeo": "chiquian bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2662",
      "nombre_ubigeo": "Colquioc",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Colquioc, Bolognesi",
      "buscador_ubigeo": "colquioc bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2663",
      "nombre_ubigeo": "Huallanca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huallanca, Bolognesi",
      "buscador_ubigeo": "huallanca bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2664",
      "nombre_ubigeo": "Huasta",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huasta, Bolognesi",
      "buscador_ubigeo": "huasta bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2665",
      "nombre_ubigeo": "Huayllacayan",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Huayllacayan, Bolognesi",
      "buscador_ubigeo": "huayllacayan bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2666",
      "nombre_ubigeo": "La Primavera",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "La Primavera, Bolognesi",
      "buscador_ubigeo": "la primavera bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2667",
      "nombre_ubigeo": "Mangas",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Mangas, Bolognesi",
      "buscador_ubigeo": "mangas bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2668",
      "nombre_ubigeo": "Pacllon",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Pacllon, Bolognesi",
      "buscador_ubigeo": "pacllon bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2669",
      "nombre_ubigeo": "San Miguel de Corpanqui",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "San Miguel de Corpanqui, Bolognesi",
      "buscador_ubigeo": "san miguel de corpanqui bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }, {
      "id_ubigeo": "2670",
      "nombre_ubigeo": "Ticllos",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Ticllos, Bolognesi",
      "buscador_ubigeo": "ticllos bolognesi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2655"
    }],
    "2671": [{
      "id_ubigeo": "2673",
      "nombre_ubigeo": "Acopampa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acopampa, Carhuaz",
      "buscador_ubigeo": "acopampa carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2674",
      "nombre_ubigeo": "Amashca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Amashca, Carhuaz",
      "buscador_ubigeo": "amashca carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2675",
      "nombre_ubigeo": "Anta",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Anta, Carhuaz",
      "buscador_ubigeo": "anta carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2676",
      "nombre_ubigeo": "Ataquero",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ataquero, Carhuaz",
      "buscador_ubigeo": "ataquero carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2672",
      "nombre_ubigeo": "Carhuaz",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Carhuaz, Carhuaz",
      "buscador_ubigeo": "carhuaz carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2677",
      "nombre_ubigeo": "Marcara",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Marcara, Carhuaz",
      "buscador_ubigeo": "marcara carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2678",
      "nombre_ubigeo": "Pariahuanca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pariahuanca, Carhuaz",
      "buscador_ubigeo": "pariahuanca carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2679",
      "nombre_ubigeo": "San Miguel de Aco",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Miguel de Aco, Carhuaz",
      "buscador_ubigeo": "san miguel de aco carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2680",
      "nombre_ubigeo": "Shilla",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Shilla, Carhuaz",
      "buscador_ubigeo": "shilla carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2681",
      "nombre_ubigeo": "Tinco",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Tinco, Carhuaz",
      "buscador_ubigeo": "tinco carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }, {
      "id_ubigeo": "2682",
      "nombre_ubigeo": "Yungar",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yungar, Carhuaz",
      "buscador_ubigeo": "yungar carhuaz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2671"
    }],
    "2683": [{
      "id_ubigeo": "2684",
      "nombre_ubigeo": "San Luis",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Luis, Carlos Fermin Fitzcarrald",
      "buscador_ubigeo": "san luis carlos fermin fitzcarrald",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2683"
    }, {
      "id_ubigeo": "2685",
      "nombre_ubigeo": "San Nicolas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "San Nicolas, Carlos Fermin Fitzcarrald",
      "buscador_ubigeo": "san nicolas carlos fermin fitzcarrald",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2683"
    }, {
      "id_ubigeo": "2686",
      "nombre_ubigeo": "Yauya",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Yauya, Carlos Fermin Fitzcarrald",
      "buscador_ubigeo": "yauya carlos fermin fitzcarrald",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2683"
    }],
    "2687": [{
      "id_ubigeo": "2689",
      "nombre_ubigeo": "Buena Vista Alta",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Buena Vista Alta, Casma",
      "buscador_ubigeo": "buena vista alta casma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2687"
    }, {
      "id_ubigeo": "2688",
      "nombre_ubigeo": "Casma",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Casma, Casma",
      "buscador_ubigeo": "casma casma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2687"
    }, {
      "id_ubigeo": "2690",
      "nombre_ubigeo": "Comandante Noel",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Comandante Noel, Casma",
      "buscador_ubigeo": "comandante noel casma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2687"
    }, {
      "id_ubigeo": "2691",
      "nombre_ubigeo": "Yautan",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Yautan, Casma",
      "buscador_ubigeo": "yautan casma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2687"
    }],
    "2692": [{
      "id_ubigeo": "2694",
      "nombre_ubigeo": "Aco",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aco, Corongo",
      "buscador_ubigeo": "aco corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }, {
      "id_ubigeo": "2695",
      "nombre_ubigeo": "Bambas",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Bambas, Corongo",
      "buscador_ubigeo": "bambas corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }, {
      "id_ubigeo": "2693",
      "nombre_ubigeo": "Corongo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Corongo, Corongo",
      "buscador_ubigeo": "corongo corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }, {
      "id_ubigeo": "2696",
      "nombre_ubigeo": "Cusca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cusca, Corongo",
      "buscador_ubigeo": "cusca corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }, {
      "id_ubigeo": "2697",
      "nombre_ubigeo": "La Pampa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Pampa, Corongo",
      "buscador_ubigeo": "la pampa corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }, {
      "id_ubigeo": "2698",
      "nombre_ubigeo": "Yanac",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Yanac, Corongo",
      "buscador_ubigeo": "yanac corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }, {
      "id_ubigeo": "2699",
      "nombre_ubigeo": "Yupan",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Yupan, Corongo",
      "buscador_ubigeo": "yupan corongo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2692"
    }],
    "2626": [{
      "id_ubigeo": "2628",
      "nombre_ubigeo": "Cochabamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cochabamba, Huaraz",
      "buscador_ubigeo": "cochabamba huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2629",
      "nombre_ubigeo": "Colcabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Colcabamba, Huaraz",
      "buscador_ubigeo": "colcabamba huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2630",
      "nombre_ubigeo": "Huanchay",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huanchay, Huaraz",
      "buscador_ubigeo": "huanchay huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2627",
      "nombre_ubigeo": "Huaraz",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huaraz, Huaraz",
      "buscador_ubigeo": "huaraz huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2631",
      "nombre_ubigeo": "Independencia",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Independencia, Huaraz",
      "buscador_ubigeo": "independencia huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2632",
      "nombre_ubigeo": "Jangas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Jangas, Huaraz",
      "buscador_ubigeo": "jangas huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2633",
      "nombre_ubigeo": "La Libertad",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "La Libertad, Huaraz",
      "buscador_ubigeo": "la libertad huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2634",
      "nombre_ubigeo": "Olleros",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Olleros, Huaraz",
      "buscador_ubigeo": "olleros huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2635",
      "nombre_ubigeo": "Pampas",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Pampas, Huaraz",
      "buscador_ubigeo": "pampas huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2636",
      "nombre_ubigeo": "Pariacoto",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pariacoto, Huaraz",
      "buscador_ubigeo": "pariacoto huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2637",
      "nombre_ubigeo": "Pira",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Pira, Huaraz",
      "buscador_ubigeo": "pira huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }, {
      "id_ubigeo": "2638",
      "nombre_ubigeo": "Tarica",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Tarica, Huaraz",
      "buscador_ubigeo": "tarica huaraz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2626"
    }],
    "2700": [{
      "id_ubigeo": "2702",
      "nombre_ubigeo": "Anra",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anra, Huari",
      "buscador_ubigeo": "anra huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2703",
      "nombre_ubigeo": "Cajay",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cajay, Huari",
      "buscador_ubigeo": "cajay huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2704",
      "nombre_ubigeo": "Chavin de Huantar",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chavin de Huantar, Huari",
      "buscador_ubigeo": "chavin de huantar huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2705",
      "nombre_ubigeo": "Huacachi",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huacachi, Huari",
      "buscador_ubigeo": "huacachi huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2706",
      "nombre_ubigeo": "Huacchis",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huacchis, Huari",
      "buscador_ubigeo": "huacchis huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2707",
      "nombre_ubigeo": "Huachis",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huachis, Huari",
      "buscador_ubigeo": "huachis huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2708",
      "nombre_ubigeo": "Huantar",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huantar, Huari",
      "buscador_ubigeo": "huantar huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2701",
      "nombre_ubigeo": "Huari",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huari, Huari",
      "buscador_ubigeo": "huari huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2709",
      "nombre_ubigeo": "Masin",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Masin, Huari",
      "buscador_ubigeo": "masin huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2710",
      "nombre_ubigeo": "Paucas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Paucas, Huari",
      "buscador_ubigeo": "paucas huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2711",
      "nombre_ubigeo": "Ponto",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Ponto, Huari",
      "buscador_ubigeo": "ponto huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2712",
      "nombre_ubigeo": "Rahuapampa",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Rahuapampa, Huari",
      "buscador_ubigeo": "rahuapampa huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2713",
      "nombre_ubigeo": "Rapayan",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Rapayan, Huari",
      "buscador_ubigeo": "rapayan huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2714",
      "nombre_ubigeo": "San Marcos",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "San Marcos, Huari",
      "buscador_ubigeo": "san marcos huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2715",
      "nombre_ubigeo": "San Pedro de Chana",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "San Pedro de Chana, Huari",
      "buscador_ubigeo": "san pedro de chana huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }, {
      "id_ubigeo": "2716",
      "nombre_ubigeo": "Uco",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Uco, Huari",
      "buscador_ubigeo": "uco huari",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2700"
    }],
    "2717": [{
      "id_ubigeo": "2719",
      "nombre_ubigeo": "Cochapeti",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cochapeti, Huarmey",
      "buscador_ubigeo": "cochapeti huarmey",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2717"
    }, {
      "id_ubigeo": "2720",
      "nombre_ubigeo": "Culebras",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Culebras, Huarmey",
      "buscador_ubigeo": "culebras huarmey",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2717"
    }, {
      "id_ubigeo": "2718",
      "nombre_ubigeo": "Huarmey",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huarmey, Huarmey",
      "buscador_ubigeo": "huarmey huarmey",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2717"
    }, {
      "id_ubigeo": "2721",
      "nombre_ubigeo": "Huayan",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huayan, Huarmey",
      "buscador_ubigeo": "huayan huarmey",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2717"
    }, {
      "id_ubigeo": "2722",
      "nombre_ubigeo": "Malvas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Malvas, Huarmey",
      "buscador_ubigeo": "malvas huarmey",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2717"
    }],
    "2723": [{
      "id_ubigeo": "2724",
      "nombre_ubigeo": "Caraz",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Caraz, Huaylas",
      "buscador_ubigeo": "caraz huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2725",
      "nombre_ubigeo": "Huallanca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Huallanca, Huaylas",
      "buscador_ubigeo": "huallanca huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2726",
      "nombre_ubigeo": "Huata",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huata, Huaylas",
      "buscador_ubigeo": "huata huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2727",
      "nombre_ubigeo": "Huaylas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huaylas, Huaylas",
      "buscador_ubigeo": "huaylas huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2728",
      "nombre_ubigeo": "Mato",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mato, Huaylas",
      "buscador_ubigeo": "mato huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2729",
      "nombre_ubigeo": "Pamparomas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pamparomas, Huaylas",
      "buscador_ubigeo": "pamparomas huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2730",
      "nombre_ubigeo": "Pueblo Libre",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pueblo Libre, Huaylas",
      "buscador_ubigeo": "pueblo libre huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2731",
      "nombre_ubigeo": "Santa Cruz",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Santa Cruz, Huaylas",
      "buscador_ubigeo": "santa cruz huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2732",
      "nombre_ubigeo": "Santo Toribio",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Santo Toribio, Huaylas",
      "buscador_ubigeo": "santo toribio huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }, {
      "id_ubigeo": "2733",
      "nombre_ubigeo": "Yuracmarca",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Yuracmarca, Huaylas",
      "buscador_ubigeo": "yuracmarca huaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2723"
    }],
    "2734": [{
      "id_ubigeo": "2736",
      "nombre_ubigeo": "Casca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Casca, Mariscal Luzuriaga",
      "buscador_ubigeo": "casca mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2737",
      "nombre_ubigeo": "Eleazar Guzman Barron",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Eleazar Guzman Barron, Mariscal Luzuriaga",
      "buscador_ubigeo": "eleazar guzman barron mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2738",
      "nombre_ubigeo": "Fidel Olivas Escudero",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Fidel Olivas Escudero, Mariscal Luzuriaga",
      "buscador_ubigeo": "fidel olivas escudero mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2739",
      "nombre_ubigeo": "Llama",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Llama, Mariscal Luzuriaga",
      "buscador_ubigeo": "llama mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2740",
      "nombre_ubigeo": "Llumpa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Llumpa, Mariscal Luzuriaga",
      "buscador_ubigeo": "llumpa mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2741",
      "nombre_ubigeo": "Lucma",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Lucma, Mariscal Luzuriaga",
      "buscador_ubigeo": "lucma mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2742",
      "nombre_ubigeo": "Musga",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Musga, Mariscal Luzuriaga",
      "buscador_ubigeo": "musga mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }, {
      "id_ubigeo": "2735",
      "nombre_ubigeo": "Piscobamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Piscobamba, Mariscal Luzuriaga",
      "buscador_ubigeo": "piscobamba mariscal luzuriaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2734"
    }],
    "2743": [{
      "id_ubigeo": "2745",
      "nombre_ubigeo": "Acas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acas, Ocros",
      "buscador_ubigeo": "acas ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2746",
      "nombre_ubigeo": "Cajamarquilla",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cajamarquilla, Ocros",
      "buscador_ubigeo": "cajamarquilla ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2747",
      "nombre_ubigeo": "Carhuapampa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Carhuapampa, Ocros",
      "buscador_ubigeo": "carhuapampa ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2748",
      "nombre_ubigeo": "Cochas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Cochas, Ocros",
      "buscador_ubigeo": "cochas ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2749",
      "nombre_ubigeo": "Congas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Congas, Ocros",
      "buscador_ubigeo": "congas ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2750",
      "nombre_ubigeo": "Llipa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Llipa, Ocros",
      "buscador_ubigeo": "llipa ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2744",
      "nombre_ubigeo": "Ocros",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ocros, Ocros",
      "buscador_ubigeo": "ocros ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2751",
      "nombre_ubigeo": "San Cristobal de Rajan",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Cristobal de Rajan, Ocros",
      "buscador_ubigeo": "san cristobal de rajan ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2752",
      "nombre_ubigeo": "San Pedro",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Pedro, Ocros",
      "buscador_ubigeo": "san pedro ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }, {
      "id_ubigeo": "2753",
      "nombre_ubigeo": "Santiago de Chilcas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santiago de Chilcas, Ocros",
      "buscador_ubigeo": "santiago de chilcas ocros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2743"
    }],
    "2754": [{
      "id_ubigeo": "2756",
      "nombre_ubigeo": "Bolognesi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bolognesi, Pallasca",
      "buscador_ubigeo": "bolognesi pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2755",
      "nombre_ubigeo": "Cabana",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cabana, Pallasca",
      "buscador_ubigeo": "cabana pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2757",
      "nombre_ubigeo": "Conchucos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Conchucos, Pallasca",
      "buscador_ubigeo": "conchucos pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2758",
      "nombre_ubigeo": "Huacaschuque",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huacaschuque, Pallasca",
      "buscador_ubigeo": "huacaschuque pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2759",
      "nombre_ubigeo": "Huandoval",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huandoval, Pallasca",
      "buscador_ubigeo": "huandoval pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2760",
      "nombre_ubigeo": "Lacabamba",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Lacabamba, Pallasca",
      "buscador_ubigeo": "lacabamba pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2761",
      "nombre_ubigeo": "Llapo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Llapo, Pallasca",
      "buscador_ubigeo": "llapo pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2762",
      "nombre_ubigeo": "Pallasca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pallasca, Pallasca",
      "buscador_ubigeo": "pallasca pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2763",
      "nombre_ubigeo": "Pampas",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Pampas, Pallasca",
      "buscador_ubigeo": "pampas pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2764",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santa Rosa, Pallasca",
      "buscador_ubigeo": "santa rosa pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }, {
      "id_ubigeo": "2765",
      "nombre_ubigeo": "Tauca",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Tauca, Pallasca",
      "buscador_ubigeo": "tauca pallasca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2754"
    }],
    "2766": [{
      "id_ubigeo": "2768",
      "nombre_ubigeo": "Huayllan",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Huayllan, Pomabamba",
      "buscador_ubigeo": "huayllan pomabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2766"
    }, {
      "id_ubigeo": "2769",
      "nombre_ubigeo": "Parobamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Parobamba, Pomabamba",
      "buscador_ubigeo": "parobamba pomabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2766"
    }, {
      "id_ubigeo": "2767",
      "nombre_ubigeo": "Pomabamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pomabamba, Pomabamba",
      "buscador_ubigeo": "pomabamba pomabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2766"
    }, {
      "id_ubigeo": "2770",
      "nombre_ubigeo": "Quinuabamba",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Quinuabamba, Pomabamba",
      "buscador_ubigeo": "quinuabamba pomabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2766"
    }],
    "2771": [{
      "id_ubigeo": "2773",
      "nombre_ubigeo": "Catac",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Catac, Recuay",
      "buscador_ubigeo": "catac recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2774",
      "nombre_ubigeo": "Cotaparaco",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cotaparaco, Recuay",
      "buscador_ubigeo": "cotaparaco recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2775",
      "nombre_ubigeo": "Huayllapampa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huayllapampa, Recuay",
      "buscador_ubigeo": "huayllapampa recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2776",
      "nombre_ubigeo": "Llacllin",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Llacllin, Recuay",
      "buscador_ubigeo": "llacllin recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2777",
      "nombre_ubigeo": "Marca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Marca, Recuay",
      "buscador_ubigeo": "marca recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2778",
      "nombre_ubigeo": "Pampas Chico",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pampas Chico, Recuay",
      "buscador_ubigeo": "pampas chico recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2779",
      "nombre_ubigeo": "Pararin",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pararin, Recuay",
      "buscador_ubigeo": "pararin recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2772",
      "nombre_ubigeo": "Recuay",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Recuay, Recuay",
      "buscador_ubigeo": "recuay recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2780",
      "nombre_ubigeo": "Tapacocha",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Tapacocha, Recuay",
      "buscador_ubigeo": "tapacocha recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }, {
      "id_ubigeo": "2781",
      "nombre_ubigeo": "Ticapampa",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Ticapampa, Recuay",
      "buscador_ubigeo": "ticapampa recuay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2771"
    }],
    "2782": [{
      "id_ubigeo": "2784",
      "nombre_ubigeo": "Caceres del Peru",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Caceres del Peru, Santa",
      "buscador_ubigeo": "caceres del peru santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2783",
      "nombre_ubigeo": "Chimbote",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chimbote, Santa",
      "buscador_ubigeo": "chimbote santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2785",
      "nombre_ubigeo": "Coishco",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Coishco, Santa",
      "buscador_ubigeo": "coishco santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2786",
      "nombre_ubigeo": "Macate",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Macate, Santa",
      "buscador_ubigeo": "macate santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2787",
      "nombre_ubigeo": "Moro",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Moro, Santa",
      "buscador_ubigeo": "moro santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2788",
      "nombre_ubigeo": "Nepeqa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Nepeqa, Santa",
      "buscador_ubigeo": "nepeqa santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2791",
      "nombre_ubigeo": "Nuevo Chimbote",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Nuevo Chimbote, Santa",
      "buscador_ubigeo": "nuevo chimbote santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2789",
      "nombre_ubigeo": "Samanco",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Samanco, Santa",
      "buscador_ubigeo": "samanco santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }, {
      "id_ubigeo": "2790",
      "nombre_ubigeo": "Santa",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Santa, Santa",
      "buscador_ubigeo": "santa santa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2782"
    }],
    "2792": [{
      "id_ubigeo": "2794",
      "nombre_ubigeo": "Acobamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acobamba, Sihuas",
      "buscador_ubigeo": "acobamba sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2795",
      "nombre_ubigeo": "Alfonso Ugarte",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Alfonso Ugarte, Sihuas",
      "buscador_ubigeo": "alfonso ugarte sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2796",
      "nombre_ubigeo": "Cashapampa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cashapampa, Sihuas",
      "buscador_ubigeo": "cashapampa sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2797",
      "nombre_ubigeo": "Chingalpo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chingalpo, Sihuas",
      "buscador_ubigeo": "chingalpo sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2798",
      "nombre_ubigeo": "Huayllabamba",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huayllabamba, Sihuas",
      "buscador_ubigeo": "huayllabamba sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2799",
      "nombre_ubigeo": "Quiches",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Quiches, Sihuas",
      "buscador_ubigeo": "quiches sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2800",
      "nombre_ubigeo": "Ragash",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Ragash, Sihuas",
      "buscador_ubigeo": "ragash sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2801",
      "nombre_ubigeo": "San Juan",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Juan, Sihuas",
      "buscador_ubigeo": "san juan sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2802",
      "nombre_ubigeo": "Sicsibamba",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Sicsibamba, Sihuas",
      "buscador_ubigeo": "sicsibamba sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }, {
      "id_ubigeo": "2793",
      "nombre_ubigeo": "Sihuas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Sihuas, Sihuas",
      "buscador_ubigeo": "sihuas sihuas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2792"
    }],
    "2803": [{
      "id_ubigeo": "2805",
      "nombre_ubigeo": "Cascapara",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cascapara, Yungay",
      "buscador_ubigeo": "cascapara yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2806",
      "nombre_ubigeo": "Mancos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Mancos, Yungay",
      "buscador_ubigeo": "mancos yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2807",
      "nombre_ubigeo": "Matacoto",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Matacoto, Yungay",
      "buscador_ubigeo": "matacoto yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2808",
      "nombre_ubigeo": "Quillo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Quillo, Yungay",
      "buscador_ubigeo": "quillo yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2809",
      "nombre_ubigeo": "Ranrahirca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ranrahirca, Yungay",
      "buscador_ubigeo": "ranrahirca yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2810",
      "nombre_ubigeo": "Shupluy",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Shupluy, Yungay",
      "buscador_ubigeo": "shupluy yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2811",
      "nombre_ubigeo": "Yanama",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yanama, Yungay",
      "buscador_ubigeo": "yanama yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }, {
      "id_ubigeo": "2804",
      "nombre_ubigeo": "Yungay",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Yungay, Yungay",
      "buscador_ubigeo": "yungay yungay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2803"
    }],
    "2813": [{
      "id_ubigeo": "2814",
      "nombre_ubigeo": "Abancay",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Abancay, Abancay",
      "buscador_ubigeo": "abancay abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2815",
      "nombre_ubigeo": "Chacoche",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chacoche, Abancay",
      "buscador_ubigeo": "chacoche abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2816",
      "nombre_ubigeo": "Circa",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Circa, Abancay",
      "buscador_ubigeo": "circa abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2817",
      "nombre_ubigeo": "Curahuasi",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Curahuasi, Abancay",
      "buscador_ubigeo": "curahuasi abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2818",
      "nombre_ubigeo": "Huanipaca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huanipaca, Abancay",
      "buscador_ubigeo": "huanipaca abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2819",
      "nombre_ubigeo": "Lambrama",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Lambrama, Abancay",
      "buscador_ubigeo": "lambrama abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2820",
      "nombre_ubigeo": "Pichirhua",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pichirhua, Abancay",
      "buscador_ubigeo": "pichirhua abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2821",
      "nombre_ubigeo": "San Pedro de Cachora",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Pedro de Cachora, Abancay",
      "buscador_ubigeo": "san pedro de cachora abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }, {
      "id_ubigeo": "2822",
      "nombre_ubigeo": "Tamburco",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Tamburco, Abancay",
      "buscador_ubigeo": "tamburco abancay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2813"
    }],
    "2823": [{
      "id_ubigeo": "2824",
      "nombre_ubigeo": "Andahuaylas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Andahuaylas, Andahuaylas",
      "buscador_ubigeo": "andahuaylas andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2825",
      "nombre_ubigeo": "Andarapa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andarapa, Andahuaylas",
      "buscador_ubigeo": "andarapa andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2826",
      "nombre_ubigeo": "Chiara",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chiara, Andahuaylas",
      "buscador_ubigeo": "chiara andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2827",
      "nombre_ubigeo": "Huancarama",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huancarama, Andahuaylas",
      "buscador_ubigeo": "huancarama andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2828",
      "nombre_ubigeo": "Huancaray",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huancaray, Andahuaylas",
      "buscador_ubigeo": "huancaray andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2829",
      "nombre_ubigeo": "Huayana",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huayana, Andahuaylas",
      "buscador_ubigeo": "huayana andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2842",
      "nombre_ubigeo": "Kaquiabamba",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Kaquiabamba, Andahuaylas",
      "buscador_ubigeo": "kaquiabamba andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2830",
      "nombre_ubigeo": "Kishuara",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Kishuara, Andahuaylas",
      "buscador_ubigeo": "kishuara andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2831",
      "nombre_ubigeo": "Pacobamba",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pacobamba, Andahuaylas",
      "buscador_ubigeo": "pacobamba andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2832",
      "nombre_ubigeo": "Pacucha",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Pacucha, Andahuaylas",
      "buscador_ubigeo": "pacucha andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2833",
      "nombre_ubigeo": "Pampachiri",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pampachiri, Andahuaylas",
      "buscador_ubigeo": "pampachiri andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2834",
      "nombre_ubigeo": "Pomacocha",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Pomacocha, Andahuaylas",
      "buscador_ubigeo": "pomacocha andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2835",
      "nombre_ubigeo": "San Antonio de Cachi",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "San Antonio de Cachi, Andahuaylas",
      "buscador_ubigeo": "san antonio de cachi andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2836",
      "nombre_ubigeo": "San Jeronimo",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "San Jeronimo, Andahuaylas",
      "buscador_ubigeo": "san jeronimo andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2837",
      "nombre_ubigeo": "San Miguel de Chaccrampa",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "San Miguel de Chaccrampa, Andahuaylas",
      "buscador_ubigeo": "san miguel de chaccrampa andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2838",
      "nombre_ubigeo": "Santa Maria de Chicmo",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Santa Maria de Chicmo, Andahuaylas",
      "buscador_ubigeo": "santa maria de chicmo andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2839",
      "nombre_ubigeo": "Talavera",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Talavera, Andahuaylas",
      "buscador_ubigeo": "talavera andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2840",
      "nombre_ubigeo": "Tumay Huaraca",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Tumay Huaraca, Andahuaylas",
      "buscador_ubigeo": "tumay huaraca andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }, {
      "id_ubigeo": "2841",
      "nombre_ubigeo": "Turpo",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Turpo, Andahuaylas",
      "buscador_ubigeo": "turpo andahuaylas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2823"
    }],
    "2843": [{
      "id_ubigeo": "2844",
      "nombre_ubigeo": "Antabamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Antabamba, Antabamba",
      "buscador_ubigeo": "antabamba antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }, {
      "id_ubigeo": "2845",
      "nombre_ubigeo": "El Oro",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "El Oro, Antabamba",
      "buscador_ubigeo": "el oro antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }, {
      "id_ubigeo": "2846",
      "nombre_ubigeo": "Huaquirca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huaquirca, Antabamba",
      "buscador_ubigeo": "huaquirca antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }, {
      "id_ubigeo": "2847",
      "nombre_ubigeo": "Juan Espinoza Medrano",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Juan Espinoza Medrano, Antabamba",
      "buscador_ubigeo": "juan espinoza medrano antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }, {
      "id_ubigeo": "2848",
      "nombre_ubigeo": "Oropesa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Oropesa, Antabamba",
      "buscador_ubigeo": "oropesa antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }, {
      "id_ubigeo": "2849",
      "nombre_ubigeo": "Pachaconas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pachaconas, Antabamba",
      "buscador_ubigeo": "pachaconas antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }, {
      "id_ubigeo": "2850",
      "nombre_ubigeo": "Sabaino",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Sabaino, Antabamba",
      "buscador_ubigeo": "sabaino antabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2843"
    }],
    "2851": [{
      "id_ubigeo": "2853",
      "nombre_ubigeo": "Capaya",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Capaya, Aymaraes",
      "buscador_ubigeo": "capaya aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2854",
      "nombre_ubigeo": "Caraybamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Caraybamba, Aymaraes",
      "buscador_ubigeo": "caraybamba aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2852",
      "nombre_ubigeo": "Chalhuanca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chalhuanca, Aymaraes",
      "buscador_ubigeo": "chalhuanca aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2855",
      "nombre_ubigeo": "Chapimarca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chapimarca, Aymaraes",
      "buscador_ubigeo": "chapimarca aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2856",
      "nombre_ubigeo": "Colcabamba",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Colcabamba, Aymaraes",
      "buscador_ubigeo": "colcabamba aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2857",
      "nombre_ubigeo": "Cotaruse",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cotaruse, Aymaraes",
      "buscador_ubigeo": "cotaruse aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2858",
      "nombre_ubigeo": "Huayllo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huayllo, Aymaraes",
      "buscador_ubigeo": "huayllo aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2859",
      "nombre_ubigeo": "Justo Apu Sahuaraura",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Justo Apu Sahuaraura, Aymaraes",
      "buscador_ubigeo": "justo apu sahuaraura aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2860",
      "nombre_ubigeo": "Lucre",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Lucre, Aymaraes",
      "buscador_ubigeo": "lucre aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2861",
      "nombre_ubigeo": "Pocohuanca",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pocohuanca, Aymaraes",
      "buscador_ubigeo": "pocohuanca aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2862",
      "nombre_ubigeo": "San Juan de Chacqa",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Juan de Chacqa, Aymaraes",
      "buscador_ubigeo": "san juan de chacqa aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2863",
      "nombre_ubigeo": "Saqayca",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Saqayca, Aymaraes",
      "buscador_ubigeo": "saqayca aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2864",
      "nombre_ubigeo": "Soraya",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Soraya, Aymaraes",
      "buscador_ubigeo": "soraya aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2865",
      "nombre_ubigeo": "Tapairihua",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Tapairihua, Aymaraes",
      "buscador_ubigeo": "tapairihua aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2866",
      "nombre_ubigeo": "Tintay",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Tintay, Aymaraes",
      "buscador_ubigeo": "tintay aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2867",
      "nombre_ubigeo": "Toraya",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Toraya, Aymaraes",
      "buscador_ubigeo": "toraya aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }, {
      "id_ubigeo": "2868",
      "nombre_ubigeo": "Yanaca",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Yanaca, Aymaraes",
      "buscador_ubigeo": "yanaca aymaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2851"
    }],
    "2876": [{
      "id_ubigeo": "2878",
      "nombre_ubigeo": "Anco-Huallo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anco-Huallo, Chincheros",
      "buscador_ubigeo": "anco-huallo chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2877",
      "nombre_ubigeo": "Chincheros",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chincheros, Chincheros",
      "buscador_ubigeo": "chincheros chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2879",
      "nombre_ubigeo": "Cocharcas",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cocharcas, Chincheros",
      "buscador_ubigeo": "cocharcas chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2880",
      "nombre_ubigeo": "Huaccana",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huaccana, Chincheros",
      "buscador_ubigeo": "huaccana chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2881",
      "nombre_ubigeo": "Ocobamba",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ocobamba, Chincheros",
      "buscador_ubigeo": "ocobamba chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2882",
      "nombre_ubigeo": "Ongoy",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ongoy, Chincheros",
      "buscador_ubigeo": "ongoy chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2884",
      "nombre_ubigeo": "Ranracancha",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Ranracancha, Chincheros",
      "buscador_ubigeo": "ranracancha chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }, {
      "id_ubigeo": "2883",
      "nombre_ubigeo": "Uranmarca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Uranmarca, Chincheros",
      "buscador_ubigeo": "uranmarca chincheros",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2876"
    }],
    "2869": [{
      "id_ubigeo": "2875",
      "nombre_ubigeo": "Challhuahuacho",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Challhuahuacho, Cotabambas",
      "buscador_ubigeo": "challhuahuacho cotabambas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2869"
    }, {
      "id_ubigeo": "2871",
      "nombre_ubigeo": "Cotabambas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cotabambas, Cotabambas",
      "buscador_ubigeo": "cotabambas cotabambas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2869"
    }, {
      "id_ubigeo": "2872",
      "nombre_ubigeo": "Coyllurqui",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Coyllurqui, Cotabambas",
      "buscador_ubigeo": "coyllurqui cotabambas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2869"
    }, {
      "id_ubigeo": "2873",
      "nombre_ubigeo": "Haquira",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Haquira, Cotabambas",
      "buscador_ubigeo": "haquira cotabambas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2869"
    }, {
      "id_ubigeo": "2874",
      "nombre_ubigeo": "Mara",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mara, Cotabambas",
      "buscador_ubigeo": "mara cotabambas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2869"
    }, {
      "id_ubigeo": "2870",
      "nombre_ubigeo": "Tambobamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tambobamba, Cotabambas",
      "buscador_ubigeo": "tambobamba cotabambas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2869"
    }],
    "2885": [{
      "id_ubigeo": "2886",
      "nombre_ubigeo": "Chuquibambilla",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chuquibambilla, Grau",
      "buscador_ubigeo": "chuquibambilla grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2899",
      "nombre_ubigeo": "Curasco",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Curasco, Grau",
      "buscador_ubigeo": "curasco grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2887",
      "nombre_ubigeo": "Curpahuasi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Curpahuasi, Grau",
      "buscador_ubigeo": "curpahuasi grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2888",
      "nombre_ubigeo": "Gamarra",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Gamarra, Grau",
      "buscador_ubigeo": "gamarra grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2889",
      "nombre_ubigeo": "Huayllati",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huayllati, Grau",
      "buscador_ubigeo": "huayllati grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2890",
      "nombre_ubigeo": "Mamara",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mamara, Grau",
      "buscador_ubigeo": "mamara grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2891",
      "nombre_ubigeo": "Micaela Bastidas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Micaela Bastidas, Grau",
      "buscador_ubigeo": "micaela bastidas grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2892",
      "nombre_ubigeo": "Pataypampa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pataypampa, Grau",
      "buscador_ubigeo": "pataypampa grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2893",
      "nombre_ubigeo": "Progreso",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Progreso, Grau",
      "buscador_ubigeo": "progreso grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2894",
      "nombre_ubigeo": "San Antonio",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Antonio, Grau",
      "buscador_ubigeo": "san antonio grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2895",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santa Rosa, Grau",
      "buscador_ubigeo": "santa rosa grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2896",
      "nombre_ubigeo": "Turpay",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Turpay, Grau",
      "buscador_ubigeo": "turpay grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2897",
      "nombre_ubigeo": "Vilcabamba",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Vilcabamba, Grau",
      "buscador_ubigeo": "vilcabamba grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }, {
      "id_ubigeo": "2898",
      "nombre_ubigeo": "Virundo",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Virundo, Grau",
      "buscador_ubigeo": "virundo grau",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2885"
    }],
    "2901": [{
      "id_ubigeo": "2903",
      "nombre_ubigeo": "Alto Selva Alegre",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Selva Alegre, Arequipa",
      "buscador_ubigeo": "alto selva alegre arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2902",
      "nombre_ubigeo": "Arequipa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Arequipa, Arequipa",
      "buscador_ubigeo": "arequipa arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2904",
      "nombre_ubigeo": "Cayma",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cayma, Arequipa",
      "buscador_ubigeo": "cayma arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2905",
      "nombre_ubigeo": "Cerro Colorado",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cerro Colorado, Arequipa",
      "buscador_ubigeo": "cerro colorado arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2906",
      "nombre_ubigeo": "Characato",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Characato, Arequipa",
      "buscador_ubigeo": "characato arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2907",
      "nombre_ubigeo": "Chiguata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chiguata, Arequipa",
      "buscador_ubigeo": "chiguata arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2908",
      "nombre_ubigeo": "Jacobo Hunter",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Jacobo Hunter, Arequipa",
      "buscador_ubigeo": "jacobo hunter arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2930",
      "nombre_ubigeo": "Jose Luis Bustamante y Rivero",
      "codigo_ubigeo": "29",
      "etiqueta_ubigeo": "Jose Luis Bustamante y Rivero, Arequipa",
      "buscador_ubigeo": "jose luis bustamante y rivero arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2909",
      "nombre_ubigeo": "La Joya",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "La Joya, Arequipa",
      "buscador_ubigeo": "la joya arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2910",
      "nombre_ubigeo": "Mariano Melgar",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Mariano Melgar, Arequipa",
      "buscador_ubigeo": "mariano melgar arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2911",
      "nombre_ubigeo": "Miraflores",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Miraflores, Arequipa",
      "buscador_ubigeo": "miraflores arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2912",
      "nombre_ubigeo": "Mollebaya",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Mollebaya, Arequipa",
      "buscador_ubigeo": "mollebaya arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2913",
      "nombre_ubigeo": "Paucarpata",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Paucarpata, Arequipa",
      "buscador_ubigeo": "paucarpata arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2914",
      "nombre_ubigeo": "Pocsi",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Pocsi, Arequipa",
      "buscador_ubigeo": "pocsi arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2915",
      "nombre_ubigeo": "Polobaya",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Polobaya, Arequipa",
      "buscador_ubigeo": "polobaya arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2916",
      "nombre_ubigeo": "Quequeqa",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Quequeqa, Arequipa",
      "buscador_ubigeo": "quequeqa arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2917",
      "nombre_ubigeo": "Sabandia",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Sabandia, Arequipa",
      "buscador_ubigeo": "sabandia arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2918",
      "nombre_ubigeo": "Sachaca",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Sachaca, Arequipa",
      "buscador_ubigeo": "sachaca arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2919",
      "nombre_ubigeo": "San Juan de Siguas",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "San Juan de Siguas, Arequipa",
      "buscador_ubigeo": "san juan de siguas arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2920",
      "nombre_ubigeo": "San Juan de Tarucani",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "San Juan de Tarucani, Arequipa",
      "buscador_ubigeo": "san juan de tarucani arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2921",
      "nombre_ubigeo": "Santa Isabel de Siguas",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Santa Isabel de Siguas, Arequipa",
      "buscador_ubigeo": "santa isabel de siguas arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2922",
      "nombre_ubigeo": "Santa Rita de Siguas",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Santa Rita de Siguas, Arequipa",
      "buscador_ubigeo": "santa rita de siguas arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2923",
      "nombre_ubigeo": "Socabaya",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Socabaya, Arequipa",
      "buscador_ubigeo": "socabaya arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2924",
      "nombre_ubigeo": "Tiabaya",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "Tiabaya, Arequipa",
      "buscador_ubigeo": "tiabaya arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2925",
      "nombre_ubigeo": "Uchumayo",
      "codigo_ubigeo": "24",
      "etiqueta_ubigeo": "Uchumayo, Arequipa",
      "buscador_ubigeo": "uchumayo arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2926",
      "nombre_ubigeo": "Vitor",
      "codigo_ubigeo": "25",
      "etiqueta_ubigeo": "Vitor, Arequipa",
      "buscador_ubigeo": "vitor arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2927",
      "nombre_ubigeo": "Yanahuara",
      "codigo_ubigeo": "26",
      "etiqueta_ubigeo": "Yanahuara, Arequipa",
      "buscador_ubigeo": "yanahuara arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2928",
      "nombre_ubigeo": "Yarabamba",
      "codigo_ubigeo": "27",
      "etiqueta_ubigeo": "Yarabamba, Arequipa",
      "buscador_ubigeo": "yarabamba arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }, {
      "id_ubigeo": "2929",
      "nombre_ubigeo": "Yura",
      "codigo_ubigeo": "28",
      "etiqueta_ubigeo": "Yura, Arequipa",
      "buscador_ubigeo": "yura arequipa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2901"
    }],
    "2931": [{
      "id_ubigeo": "2932",
      "nombre_ubigeo": "Camana",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Camana, Camana",
      "buscador_ubigeo": "camana camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2933",
      "nombre_ubigeo": "Jose Maria Quimper",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Jose Maria Quimper, Camana",
      "buscador_ubigeo": "jose maria quimper camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2934",
      "nombre_ubigeo": "Mariano Nicolas Valcarcel",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Mariano Nicolas Valcarcel, Camana",
      "buscador_ubigeo": "mariano nicolas valcarcel camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2935",
      "nombre_ubigeo": "Mariscal Caceres",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Mariscal Caceres, Camana",
      "buscador_ubigeo": "mariscal caceres camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2936",
      "nombre_ubigeo": "Nicolas de Pierola",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Nicolas de Pierola, Camana",
      "buscador_ubigeo": "nicolas de pierola camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2937",
      "nombre_ubigeo": "Ocoqa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ocoqa, Camana",
      "buscador_ubigeo": "ocoqa camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2938",
      "nombre_ubigeo": "Quilca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Quilca, Camana",
      "buscador_ubigeo": "quilca camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }, {
      "id_ubigeo": "2939",
      "nombre_ubigeo": "Samuel Pastor",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Samuel Pastor, Camana",
      "buscador_ubigeo": "samuel pastor camana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2931"
    }],
    "2940": [{
      "id_ubigeo": "2942",
      "nombre_ubigeo": "Acari",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acari, Caraveli",
      "buscador_ubigeo": "acari caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2943",
      "nombre_ubigeo": "Atico",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Atico, Caraveli",
      "buscador_ubigeo": "atico caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2944",
      "nombre_ubigeo": "Atiquipa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Atiquipa, Caraveli",
      "buscador_ubigeo": "atiquipa caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2945",
      "nombre_ubigeo": "Bella Union",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Bella Union, Caraveli",
      "buscador_ubigeo": "bella union caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2946",
      "nombre_ubigeo": "Cahuacho",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cahuacho, Caraveli",
      "buscador_ubigeo": "cahuacho caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2941",
      "nombre_ubigeo": "Caraveli",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Caraveli, Caraveli",
      "buscador_ubigeo": "caraveli caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2947",
      "nombre_ubigeo": "Chala",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Chala, Caraveli",
      "buscador_ubigeo": "chala caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2948",
      "nombre_ubigeo": "Chaparra",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Chaparra, Caraveli",
      "buscador_ubigeo": "chaparra caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2949",
      "nombre_ubigeo": "Huanuhuanu",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huanuhuanu, Caraveli",
      "buscador_ubigeo": "huanuhuanu caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2950",
      "nombre_ubigeo": "Jaqui",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Jaqui, Caraveli",
      "buscador_ubigeo": "jaqui caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2951",
      "nombre_ubigeo": "Lomas",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Lomas, Caraveli",
      "buscador_ubigeo": "lomas caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2952",
      "nombre_ubigeo": "Quicacha",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Quicacha, Caraveli",
      "buscador_ubigeo": "quicacha caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }, {
      "id_ubigeo": "2953",
      "nombre_ubigeo": "Yauca",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Yauca, Caraveli",
      "buscador_ubigeo": "yauca caraveli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2940"
    }],
    "2954": [{
      "id_ubigeo": "2956",
      "nombre_ubigeo": "Andagua",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andagua, Castilla",
      "buscador_ubigeo": "andagua castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2955",
      "nombre_ubigeo": "Aplao",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Aplao, Castilla",
      "buscador_ubigeo": "aplao castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2957",
      "nombre_ubigeo": "Ayo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ayo, Castilla",
      "buscador_ubigeo": "ayo castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2958",
      "nombre_ubigeo": "Chachas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chachas, Castilla",
      "buscador_ubigeo": "chachas castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2959",
      "nombre_ubigeo": "Chilcaymarca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chilcaymarca, Castilla",
      "buscador_ubigeo": "chilcaymarca castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2960",
      "nombre_ubigeo": "Choco",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Choco, Castilla",
      "buscador_ubigeo": "choco castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2961",
      "nombre_ubigeo": "Huancarqui",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huancarqui, Castilla",
      "buscador_ubigeo": "huancarqui castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2962",
      "nombre_ubigeo": "Machaguay",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Machaguay, Castilla",
      "buscador_ubigeo": "machaguay castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2970",
      "nombre_ubigeo": "Majes",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Majes, Castilla",
      "buscador_ubigeo": "majes castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2963",
      "nombre_ubigeo": "Orcopampa",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Orcopampa, Castilla",
      "buscador_ubigeo": "orcopampa castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2964",
      "nombre_ubigeo": "Pampacolca",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pampacolca, Castilla",
      "buscador_ubigeo": "pampacolca castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2965",
      "nombre_ubigeo": "Tipan",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Tipan, Castilla",
      "buscador_ubigeo": "tipan castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2966",
      "nombre_ubigeo": "Uqon",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Uqon, Castilla",
      "buscador_ubigeo": "uqon castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2967",
      "nombre_ubigeo": "Uraca",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Uraca, Castilla",
      "buscador_ubigeo": "uraca castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2968",
      "nombre_ubigeo": "Viraco",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Viraco, Castilla",
      "buscador_ubigeo": "viraco castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }, {
      "id_ubigeo": "2969",
      "nombre_ubigeo": "Yanque",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Yanque, Castilla",
      "buscador_ubigeo": "yanque castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2954"
    }],
    "2971": [{
      "id_ubigeo": "2973",
      "nombre_ubigeo": "Achoma",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Achoma, Caylloma",
      "buscador_ubigeo": "achoma caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2974",
      "nombre_ubigeo": "Cabanaconde",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cabanaconde, Caylloma",
      "buscador_ubigeo": "cabanaconde caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2975",
      "nombre_ubigeo": "Callalli",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Callalli, Caylloma",
      "buscador_ubigeo": "callalli caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2976",
      "nombre_ubigeo": "Caylloma",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Caylloma, Caylloma",
      "buscador_ubigeo": "caylloma caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2972",
      "nombre_ubigeo": "Chivay",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chivay, Caylloma",
      "buscador_ubigeo": "chivay caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2977",
      "nombre_ubigeo": "Coporaque",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Coporaque, Caylloma",
      "buscador_ubigeo": "coporaque caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2978",
      "nombre_ubigeo": "Huambo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huambo, Caylloma",
      "buscador_ubigeo": "huambo caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2979",
      "nombre_ubigeo": "Huanca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huanca, Caylloma",
      "buscador_ubigeo": "huanca caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2980",
      "nombre_ubigeo": "Ichupampa",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Ichupampa, Caylloma",
      "buscador_ubigeo": "ichupampa caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2981",
      "nombre_ubigeo": "Lari",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Lari, Caylloma",
      "buscador_ubigeo": "lari caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2982",
      "nombre_ubigeo": "Lluta",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Lluta, Caylloma",
      "buscador_ubigeo": "lluta caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2983",
      "nombre_ubigeo": "Maca",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Maca, Caylloma",
      "buscador_ubigeo": "maca caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2984",
      "nombre_ubigeo": "Madrigal",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Madrigal, Caylloma",
      "buscador_ubigeo": "madrigal caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2991",
      "nombre_ubigeo": "Majes",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Majes, Caylloma",
      "buscador_ubigeo": "majes caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2985",
      "nombre_ubigeo": "San Antonio de Chuca",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "San Antonio de Chuca, Caylloma",
      "buscador_ubigeo": "san antonio de chuca caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2986",
      "nombre_ubigeo": "Sibayo",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Sibayo, Caylloma",
      "buscador_ubigeo": "sibayo caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2987",
      "nombre_ubigeo": "Tapay",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Tapay, Caylloma",
      "buscador_ubigeo": "tapay caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2988",
      "nombre_ubigeo": "Tisco",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Tisco, Caylloma",
      "buscador_ubigeo": "tisco caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2989",
      "nombre_ubigeo": "Tuti",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Tuti, Caylloma",
      "buscador_ubigeo": "tuti caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }, {
      "id_ubigeo": "2990",
      "nombre_ubigeo": "Yanque",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Yanque, Caylloma",
      "buscador_ubigeo": "yanque caylloma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2971"
    }],
    "2992": [{
      "id_ubigeo": "2994",
      "nombre_ubigeo": "Andaray",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andaray, Condesuyos",
      "buscador_ubigeo": "andaray condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "2995",
      "nombre_ubigeo": "Cayarani",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cayarani, Condesuyos",
      "buscador_ubigeo": "cayarani condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "2996",
      "nombre_ubigeo": "Chichas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chichas, Condesuyos",
      "buscador_ubigeo": "chichas condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "2993",
      "nombre_ubigeo": "Chuquibamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chuquibamba, Condesuyos",
      "buscador_ubigeo": "chuquibamba condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "2997",
      "nombre_ubigeo": "Iray",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Iray, Condesuyos",
      "buscador_ubigeo": "iray condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "2998",
      "nombre_ubigeo": "Rio Grande",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Rio Grande, Condesuyos",
      "buscador_ubigeo": "rio grande condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "2999",
      "nombre_ubigeo": "Salamanca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Salamanca, Condesuyos",
      "buscador_ubigeo": "salamanca condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }, {
      "id_ubigeo": "3000",
      "nombre_ubigeo": "Yanaquihua",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yanaquihua, Condesuyos",
      "buscador_ubigeo": "yanaquihua condesuyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "2992"
    }],
    "3001": [{
      "id_ubigeo": "3003",
      "nombre_ubigeo": "Cocachacra",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cocachacra, Islay",
      "buscador_ubigeo": "cocachacra islay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3001"
    }, {
      "id_ubigeo": "3004",
      "nombre_ubigeo": "Dean Valdivia",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Dean Valdivia, Islay",
      "buscador_ubigeo": "dean valdivia islay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3001"
    }, {
      "id_ubigeo": "3005",
      "nombre_ubigeo": "Islay",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Islay, Islay",
      "buscador_ubigeo": "islay islay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3001"
    }, {
      "id_ubigeo": "3006",
      "nombre_ubigeo": "Mejia",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mejia, Islay",
      "buscador_ubigeo": "mejia islay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3001"
    }, {
      "id_ubigeo": "3002",
      "nombre_ubigeo": "Mollendo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Mollendo, Islay",
      "buscador_ubigeo": "mollendo islay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3001"
    }, {
      "id_ubigeo": "3007",
      "nombre_ubigeo": "Punta de Bombon",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Punta de Bombon, Islay",
      "buscador_ubigeo": "punta de bombon islay",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3001"
    }],
    "3008": [{
      "id_ubigeo": "3010",
      "nombre_ubigeo": "Alca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alca, La Union",
      "buscador_ubigeo": "alca la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3011",
      "nombre_ubigeo": "Charcana",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Charcana, La Union",
      "buscador_ubigeo": "charcana la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3009",
      "nombre_ubigeo": "Cotahuasi",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cotahuasi, La Union",
      "buscador_ubigeo": "cotahuasi la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3012",
      "nombre_ubigeo": "Huaynacotas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huaynacotas, La Union",
      "buscador_ubigeo": "huaynacotas la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3013",
      "nombre_ubigeo": "Pampamarca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pampamarca, La Union",
      "buscador_ubigeo": "pampamarca la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3014",
      "nombre_ubigeo": "Puyca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Puyca, La Union",
      "buscador_ubigeo": "puyca la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3015",
      "nombre_ubigeo": "Quechualla",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Quechualla, La Union",
      "buscador_ubigeo": "quechualla la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3016",
      "nombre_ubigeo": "Sayla",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Sayla, La Union",
      "buscador_ubigeo": "sayla la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3017",
      "nombre_ubigeo": "Tauria",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Tauria, La Union",
      "buscador_ubigeo": "tauria la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3018",
      "nombre_ubigeo": "Tomepampa",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Tomepampa, La Union",
      "buscador_ubigeo": "tomepampa la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }, {
      "id_ubigeo": "3019",
      "nombre_ubigeo": "Toro",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Toro, La Union",
      "buscador_ubigeo": "toro la union",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3008"
    }],
    "3037": [{
      "id_ubigeo": "3038",
      "nombre_ubigeo": "Cangallo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cangallo, Cangallo",
      "buscador_ubigeo": "cangallo cangallo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3037"
    }, {
      "id_ubigeo": "3039",
      "nombre_ubigeo": "Chuschi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chuschi, Cangallo",
      "buscador_ubigeo": "chuschi cangallo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3037"
    }, {
      "id_ubigeo": "3040",
      "nombre_ubigeo": "Los Morochucos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Los Morochucos, Cangallo",
      "buscador_ubigeo": "los morochucos cangallo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3037"
    }, {
      "id_ubigeo": "3041",
      "nombre_ubigeo": "Maria Parado de Bellido",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Maria Parado de Bellido, Cangallo",
      "buscador_ubigeo": "maria parado de bellido cangallo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3037"
    }, {
      "id_ubigeo": "3042",
      "nombre_ubigeo": "Paras",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Paras, Cangallo",
      "buscador_ubigeo": "paras cangallo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3037"
    }, {
      "id_ubigeo": "3043",
      "nombre_ubigeo": "Totos",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Totos, Cangallo",
      "buscador_ubigeo": "totos cangallo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3037"
    }],
    "3021": [{
      "id_ubigeo": "3023",
      "nombre_ubigeo": "Acocro",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acocro, Huamanga",
      "buscador_ubigeo": "acocro huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3024",
      "nombre_ubigeo": "Acos Vinchos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Acos Vinchos, Huamanga",
      "buscador_ubigeo": "acos vinchos huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3022",
      "nombre_ubigeo": "Ayacucho",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ayacucho, Huamanga",
      "buscador_ubigeo": "ayacucho huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3025",
      "nombre_ubigeo": "Carmen Alto",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Carmen Alto, Huamanga",
      "buscador_ubigeo": "carmen alto huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3026",
      "nombre_ubigeo": "Chiara",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chiara, Huamanga",
      "buscador_ubigeo": "chiara huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3036",
      "nombre_ubigeo": "Jes\u00fas Nazareno",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Jes\u00fas Nazareno, Huamanga",
      "buscador_ubigeo": "jes\u00fas nazareno huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3027",
      "nombre_ubigeo": "Ocros",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ocros, Huamanga",
      "buscador_ubigeo": "ocros huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3028",
      "nombre_ubigeo": "Pacaycasa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pacaycasa, Huamanga",
      "buscador_ubigeo": "pacaycasa huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3029",
      "nombre_ubigeo": "Quinua",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Quinua, Huamanga",
      "buscador_ubigeo": "quinua huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3030",
      "nombre_ubigeo": "San Jose de Ticllas",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Jose de Ticllas, Huamanga",
      "buscador_ubigeo": "san jose de ticllas huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3031",
      "nombre_ubigeo": "San Juan Bautista",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Juan Bautista, Huamanga",
      "buscador_ubigeo": "san juan bautista huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3032",
      "nombre_ubigeo": "Santiago de Pischa",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Santiago de Pischa, Huamanga",
      "buscador_ubigeo": "santiago de pischa huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3033",
      "nombre_ubigeo": "Socos",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Socos, Huamanga",
      "buscador_ubigeo": "socos huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3034",
      "nombre_ubigeo": "Tambillo",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Tambillo, Huamanga",
      "buscador_ubigeo": "tambillo huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }, {
      "id_ubigeo": "3035",
      "nombre_ubigeo": "Vinchos",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Vinchos, Huamanga",
      "buscador_ubigeo": "vinchos huamanga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3021"
    }],
    "3044": [{
      "id_ubigeo": "3046",
      "nombre_ubigeo": "Carapo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Carapo, Huanca Sancos",
      "buscador_ubigeo": "carapo huanca sancos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3044"
    }, {
      "id_ubigeo": "3047",
      "nombre_ubigeo": "Sacsamarca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Sacsamarca, Huanca Sancos",
      "buscador_ubigeo": "sacsamarca huanca sancos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3044"
    }, {
      "id_ubigeo": "3045",
      "nombre_ubigeo": "Sancos",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Sancos, Huanca Sancos",
      "buscador_ubigeo": "sancos huanca sancos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3044"
    }, {
      "id_ubigeo": "3048",
      "nombre_ubigeo": "Santiago de Lucanamarca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Santiago de Lucanamarca, Huanca Sancos",
      "buscador_ubigeo": "santiago de lucanamarca huanca sancos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3044"
    }],
    "3049": [{
      "id_ubigeo": "3051",
      "nombre_ubigeo": "Ayahuanco",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ayahuanco, Huanta",
      "buscador_ubigeo": "ayahuanco huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3052",
      "nombre_ubigeo": "Huamanguilla",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huamanguilla, Huanta",
      "buscador_ubigeo": "huamanguilla huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3050",
      "nombre_ubigeo": "Huanta",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huanta, Huanta",
      "buscador_ubigeo": "huanta huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3053",
      "nombre_ubigeo": "Iguain",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Iguain, Huanta",
      "buscador_ubigeo": "iguain huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3057",
      "nombre_ubigeo": "Llochegua",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Llochegua, Huanta",
      "buscador_ubigeo": "llochegua huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3054",
      "nombre_ubigeo": "Luricocha",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Luricocha, Huanta",
      "buscador_ubigeo": "luricocha huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3055",
      "nombre_ubigeo": "Santillana",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Santillana, Huanta",
      "buscador_ubigeo": "santillana huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }, {
      "id_ubigeo": "3056",
      "nombre_ubigeo": "Sivia",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Sivia, Huanta",
      "buscador_ubigeo": "sivia huanta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3049"
    }],
    "3058": [{
      "id_ubigeo": "3060",
      "nombre_ubigeo": "Anco",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anco, La Mar",
      "buscador_ubigeo": "anco la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3061",
      "nombre_ubigeo": "Ayna",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ayna, La Mar",
      "buscador_ubigeo": "ayna la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3062",
      "nombre_ubigeo": "Chilcas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chilcas, La Mar",
      "buscador_ubigeo": "chilcas la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3063",
      "nombre_ubigeo": "Chungui",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chungui, La Mar",
      "buscador_ubigeo": "chungui la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3064",
      "nombre_ubigeo": "Luis Carranza",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Luis Carranza, La Mar",
      "buscador_ubigeo": "luis carranza la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3059",
      "nombre_ubigeo": "San Miguel",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Miguel, La Mar",
      "buscador_ubigeo": "san miguel la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3065",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Santa Rosa, La Mar",
      "buscador_ubigeo": "santa rosa la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }, {
      "id_ubigeo": "3066",
      "nombre_ubigeo": "Tambo",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Tambo, La Mar",
      "buscador_ubigeo": "tambo la mar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3058"
    }],
    "3067": [{
      "id_ubigeo": "3069",
      "nombre_ubigeo": "Aucara",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aucara, Lucanas",
      "buscador_ubigeo": "aucara lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3070",
      "nombre_ubigeo": "Cabana",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cabana, Lucanas",
      "buscador_ubigeo": "cabana lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3071",
      "nombre_ubigeo": "Carmen Salcedo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Carmen Salcedo, Lucanas",
      "buscador_ubigeo": "carmen salcedo lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3072",
      "nombre_ubigeo": "Chaviqa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chaviqa, Lucanas",
      "buscador_ubigeo": "chaviqa lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3073",
      "nombre_ubigeo": "Chipao",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chipao, Lucanas",
      "buscador_ubigeo": "chipao lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3074",
      "nombre_ubigeo": "Huac-Huas",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huac-Huas, Lucanas",
      "buscador_ubigeo": "huac-huas lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3075",
      "nombre_ubigeo": "Laramate",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Laramate, Lucanas",
      "buscador_ubigeo": "laramate lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3076",
      "nombre_ubigeo": "Leoncio Prado",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Leoncio Prado, Lucanas",
      "buscador_ubigeo": "leoncio prado lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3077",
      "nombre_ubigeo": "Llauta",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Llauta, Lucanas",
      "buscador_ubigeo": "llauta lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3078",
      "nombre_ubigeo": "Lucanas",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Lucanas, Lucanas",
      "buscador_ubigeo": "lucanas lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3079",
      "nombre_ubigeo": "Ocaqa",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Ocaqa, Lucanas",
      "buscador_ubigeo": "ocaqa lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3080",
      "nombre_ubigeo": "Otoca",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Otoca, Lucanas",
      "buscador_ubigeo": "otoca lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3068",
      "nombre_ubigeo": "Puquio",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Puquio, Lucanas",
      "buscador_ubigeo": "puquio lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3081",
      "nombre_ubigeo": "Saisa",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Saisa, Lucanas",
      "buscador_ubigeo": "saisa lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3082",
      "nombre_ubigeo": "San Cristobal",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "San Cristobal, Lucanas",
      "buscador_ubigeo": "san cristobal lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3083",
      "nombre_ubigeo": "San Juan",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "San Juan, Lucanas",
      "buscador_ubigeo": "san juan lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3084",
      "nombre_ubigeo": "San Pedro",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "San Pedro, Lucanas",
      "buscador_ubigeo": "san pedro lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3085",
      "nombre_ubigeo": "San Pedro de Palco",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "San Pedro de Palco, Lucanas",
      "buscador_ubigeo": "san pedro de palco lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3086",
      "nombre_ubigeo": "Sancos",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Sancos, Lucanas",
      "buscador_ubigeo": "sancos lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3087",
      "nombre_ubigeo": "Santa Ana de Huaycahuacho",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Santa Ana de Huaycahuacho, Lucanas",
      "buscador_ubigeo": "santa ana de huaycahuacho lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }, {
      "id_ubigeo": "3088",
      "nombre_ubigeo": "Santa Lucia",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Santa Lucia, Lucanas",
      "buscador_ubigeo": "santa lucia lucanas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3067"
    }],
    "3089": [{
      "id_ubigeo": "3091",
      "nombre_ubigeo": "Chumpi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chumpi, Parinacochas",
      "buscador_ubigeo": "chumpi parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3090",
      "nombre_ubigeo": "Coracora",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Coracora, Parinacochas",
      "buscador_ubigeo": "coracora parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3092",
      "nombre_ubigeo": "Coronel Castaqeda",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Coronel Castaqeda, Parinacochas",
      "buscador_ubigeo": "coronel castaqeda parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3093",
      "nombre_ubigeo": "Pacapausa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pacapausa, Parinacochas",
      "buscador_ubigeo": "pacapausa parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3094",
      "nombre_ubigeo": "Pullo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pullo, Parinacochas",
      "buscador_ubigeo": "pullo parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3095",
      "nombre_ubigeo": "Puyusca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Puyusca, Parinacochas",
      "buscador_ubigeo": "puyusca parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3096",
      "nombre_ubigeo": "San Francisco de Ravacayco",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Francisco de Ravacayco, Parinacochas",
      "buscador_ubigeo": "san francisco de ravacayco parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }, {
      "id_ubigeo": "3097",
      "nombre_ubigeo": "Upahuacho",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Upahuacho, Parinacochas",
      "buscador_ubigeo": "upahuacho parinacochas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3089"
    }],
    "3098": [{
      "id_ubigeo": "3100",
      "nombre_ubigeo": "Colta",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Colta, Paucar del Sara Sara",
      "buscador_ubigeo": "colta paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3101",
      "nombre_ubigeo": "Corculla",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Corculla, Paucar del Sara Sara",
      "buscador_ubigeo": "corculla paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3102",
      "nombre_ubigeo": "Lampa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Lampa, Paucar del Sara Sara",
      "buscador_ubigeo": "lampa paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3103",
      "nombre_ubigeo": "Marcabamba",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Marcabamba, Paucar del Sara Sara",
      "buscador_ubigeo": "marcabamba paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3104",
      "nombre_ubigeo": "Oyolo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Oyolo, Paucar del Sara Sara",
      "buscador_ubigeo": "oyolo paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3105",
      "nombre_ubigeo": "Pararca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pararca, Paucar del Sara Sara",
      "buscador_ubigeo": "pararca paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3099",
      "nombre_ubigeo": "Pausa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pausa, Paucar del Sara Sara",
      "buscador_ubigeo": "pausa paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3106",
      "nombre_ubigeo": "San Javier de Alpabamba",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Javier de Alpabamba, Paucar del Sara Sara",
      "buscador_ubigeo": "san javier de alpabamba paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3107",
      "nombre_ubigeo": "San Jose de Ushua",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Jose de Ushua, Paucar del Sara Sara",
      "buscador_ubigeo": "san jose de ushua paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }, {
      "id_ubigeo": "3108",
      "nombre_ubigeo": "Sara Sara",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Sara Sara, Paucar del Sara Sara",
      "buscador_ubigeo": "sara sara paucar del sara sara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3098"
    }],
    "3109": [{
      "id_ubigeo": "3111",
      "nombre_ubigeo": "Belen",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Belen, Sucre",
      "buscador_ubigeo": "belen sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3112",
      "nombre_ubigeo": "Chalcos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chalcos, Sucre",
      "buscador_ubigeo": "chalcos sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3113",
      "nombre_ubigeo": "Chilcayoc",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chilcayoc, Sucre",
      "buscador_ubigeo": "chilcayoc sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3114",
      "nombre_ubigeo": "Huacaqa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huacaqa, Sucre",
      "buscador_ubigeo": "huacaqa sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3115",
      "nombre_ubigeo": "Morcolla",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Morcolla, Sucre",
      "buscador_ubigeo": "morcolla sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3116",
      "nombre_ubigeo": "Paico",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Paico, Sucre",
      "buscador_ubigeo": "paico sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3110",
      "nombre_ubigeo": "Querobamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Querobamba, Sucre",
      "buscador_ubigeo": "querobamba sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3117",
      "nombre_ubigeo": "San Pedro de Larcay",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Pedro de Larcay, Sucre",
      "buscador_ubigeo": "san pedro de larcay sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3118",
      "nombre_ubigeo": "San Salvador de Quije",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Salvador de Quije, Sucre",
      "buscador_ubigeo": "san salvador de quije sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3119",
      "nombre_ubigeo": "Santiago de Paucaray",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santiago de Paucaray, Sucre",
      "buscador_ubigeo": "santiago de paucaray sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }, {
      "id_ubigeo": "3120",
      "nombre_ubigeo": "Soras",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Soras, Sucre",
      "buscador_ubigeo": "soras sucre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3109"
    }],
    "3121": [{
      "id_ubigeo": "3123",
      "nombre_ubigeo": "Alcamenca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alcamenca, Victor Fajardo",
      "buscador_ubigeo": "alcamenca victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3124",
      "nombre_ubigeo": "Apongo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Apongo, Victor Fajardo",
      "buscador_ubigeo": "apongo victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3125",
      "nombre_ubigeo": "Asquipata",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Asquipata, Victor Fajardo",
      "buscador_ubigeo": "asquipata victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3126",
      "nombre_ubigeo": "Canaria",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Canaria, Victor Fajardo",
      "buscador_ubigeo": "canaria victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3127",
      "nombre_ubigeo": "Cayara",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cayara, Victor Fajardo",
      "buscador_ubigeo": "cayara victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3128",
      "nombre_ubigeo": "Colca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Colca, Victor Fajardo",
      "buscador_ubigeo": "colca victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3129",
      "nombre_ubigeo": "Huamanquiquia",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huamanquiquia, Victor Fajardo",
      "buscador_ubigeo": "huamanquiquia victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3122",
      "nombre_ubigeo": "Huancapi",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancapi, Victor Fajardo",
      "buscador_ubigeo": "huancapi victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3130",
      "nombre_ubigeo": "Huancaraylla",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huancaraylla, Victor Fajardo",
      "buscador_ubigeo": "huancaraylla victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3131",
      "nombre_ubigeo": "Huaya",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Huaya, Victor Fajardo",
      "buscador_ubigeo": "huaya victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3132",
      "nombre_ubigeo": "Sarhua",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Sarhua, Victor Fajardo",
      "buscador_ubigeo": "sarhua victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }, {
      "id_ubigeo": "3133",
      "nombre_ubigeo": "Vilcanchos",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Vilcanchos, Victor Fajardo",
      "buscador_ubigeo": "vilcanchos victor fajardo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3121"
    }],
    "3134": [{
      "id_ubigeo": "3136",
      "nombre_ubigeo": "Accomarca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Accomarca, Vilcas Huaman",
      "buscador_ubigeo": "accomarca vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3137",
      "nombre_ubigeo": "Carhuanca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Carhuanca, Vilcas Huaman",
      "buscador_ubigeo": "carhuanca vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3138",
      "nombre_ubigeo": "Concepcion",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Concepcion, Vilcas Huaman",
      "buscador_ubigeo": "concepcion vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3139",
      "nombre_ubigeo": "Huambalpa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huambalpa, Vilcas Huaman",
      "buscador_ubigeo": "huambalpa vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3140",
      "nombre_ubigeo": "Independencia",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Independencia, Vilcas Huaman",
      "buscador_ubigeo": "independencia vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3141",
      "nombre_ubigeo": "Saurama",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Saurama, Vilcas Huaman",
      "buscador_ubigeo": "saurama vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3135",
      "nombre_ubigeo": "Vilcas Huaman",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Vilcas Huaman, Vilcas Huaman",
      "buscador_ubigeo": "vilcas huaman vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }, {
      "id_ubigeo": "3142",
      "nombre_ubigeo": "Vischongo",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Vischongo, Vilcas Huaman",
      "buscador_ubigeo": "vischongo vilcas huaman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3134"
    }],
    "3157": [{
      "id_ubigeo": "3159",
      "nombre_ubigeo": "Cachachi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cachachi, Cajabamba",
      "buscador_ubigeo": "cachachi cajabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3157"
    }, {
      "id_ubigeo": "3158",
      "nombre_ubigeo": "Cajabamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cajabamba, Cajabamba",
      "buscador_ubigeo": "cajabamba cajabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3157"
    }, {
      "id_ubigeo": "3160",
      "nombre_ubigeo": "Condebamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Condebamba, Cajabamba",
      "buscador_ubigeo": "condebamba cajabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3157"
    }, {
      "id_ubigeo": "3161",
      "nombre_ubigeo": "Sitacocha",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Sitacocha, Cajabamba",
      "buscador_ubigeo": "sitacocha cajabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3157"
    }],
    "3144": [{
      "id_ubigeo": "3146",
      "nombre_ubigeo": "Asuncion",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Asuncion, Cajamarca",
      "buscador_ubigeo": "asuncion cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3145",
      "nombre_ubigeo": "Cajamarca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cajamarca, Cajamarca",
      "buscador_ubigeo": "cajamarca cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3147",
      "nombre_ubigeo": "Chetilla",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chetilla, Cajamarca",
      "buscador_ubigeo": "chetilla cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3148",
      "nombre_ubigeo": "Cospan",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cospan, Cajamarca",
      "buscador_ubigeo": "cospan cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3149",
      "nombre_ubigeo": "Encaqada",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Encaqada, Cajamarca",
      "buscador_ubigeo": "encaqada cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3150",
      "nombre_ubigeo": "Jesus",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Jesus, Cajamarca",
      "buscador_ubigeo": "jesus cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3151",
      "nombre_ubigeo": "Llacanora",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Llacanora, Cajamarca",
      "buscador_ubigeo": "llacanora cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3152",
      "nombre_ubigeo": "Los Baqos del Inca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Los Baqos del Inca, Cajamarca",
      "buscador_ubigeo": "los baqos del inca cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3153",
      "nombre_ubigeo": "Magdalena",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Magdalena, Cajamarca",
      "buscador_ubigeo": "magdalena cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3154",
      "nombre_ubigeo": "Matara",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Matara, Cajamarca",
      "buscador_ubigeo": "matara cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3155",
      "nombre_ubigeo": "Namora",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Namora, Cajamarca",
      "buscador_ubigeo": "namora cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }, {
      "id_ubigeo": "3156",
      "nombre_ubigeo": "San Juan",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "San Juan, Cajamarca",
      "buscador_ubigeo": "san juan cajamarca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3144"
    }],
    "3162": [{
      "id_ubigeo": "3163",
      "nombre_ubigeo": "Celendin",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Celendin, Celendin",
      "buscador_ubigeo": "celendin celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3164",
      "nombre_ubigeo": "Chumuch",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chumuch, Celendin",
      "buscador_ubigeo": "chumuch celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3165",
      "nombre_ubigeo": "Cortegana",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cortegana, Celendin",
      "buscador_ubigeo": "cortegana celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3166",
      "nombre_ubigeo": "Huasmin",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huasmin, Celendin",
      "buscador_ubigeo": "huasmin celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3167",
      "nombre_ubigeo": "Jorge Chavez",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Jorge Chavez, Celendin",
      "buscador_ubigeo": "jorge chavez celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3168",
      "nombre_ubigeo": "Jose Galvez",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Jose Galvez, Celendin",
      "buscador_ubigeo": "jose galvez celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3174",
      "nombre_ubigeo": "La Libertad de Pallan",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "La Libertad de Pallan, Celendin",
      "buscador_ubigeo": "la libertad de pallan celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3169",
      "nombre_ubigeo": "Miguel Iglesias",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Miguel Iglesias, Celendin",
      "buscador_ubigeo": "miguel iglesias celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3170",
      "nombre_ubigeo": "Oxamarca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Oxamarca, Celendin",
      "buscador_ubigeo": "oxamarca celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3171",
      "nombre_ubigeo": "Sorochuco",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sorochuco, Celendin",
      "buscador_ubigeo": "sorochuco celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3172",
      "nombre_ubigeo": "Sucre",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Sucre, Celendin",
      "buscador_ubigeo": "sucre celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }, {
      "id_ubigeo": "3173",
      "nombre_ubigeo": "Utco",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Utco, Celendin",
      "buscador_ubigeo": "utco celendin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3162"
    }],
    "3175": [{
      "id_ubigeo": "3177",
      "nombre_ubigeo": "Anguia",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anguia, Chota",
      "buscador_ubigeo": "anguia chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3178",
      "nombre_ubigeo": "Chadin",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chadin, Chota",
      "buscador_ubigeo": "chadin chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3194",
      "nombre_ubigeo": "Chalamarca",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Chalamarca, Chota",
      "buscador_ubigeo": "chalamarca chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3179",
      "nombre_ubigeo": "Chiguirip",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chiguirip, Chota",
      "buscador_ubigeo": "chiguirip chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3180",
      "nombre_ubigeo": "Chimban",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chimban, Chota",
      "buscador_ubigeo": "chimban chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3181",
      "nombre_ubigeo": "Choropampa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Choropampa, Chota",
      "buscador_ubigeo": "choropampa chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3176",
      "nombre_ubigeo": "Chota",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chota, Chota",
      "buscador_ubigeo": "chota chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3182",
      "nombre_ubigeo": "Cochabamba",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Cochabamba, Chota",
      "buscador_ubigeo": "cochabamba chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3183",
      "nombre_ubigeo": "Conchan",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Conchan, Chota",
      "buscador_ubigeo": "conchan chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3184",
      "nombre_ubigeo": "Huambos",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huambos, Chota",
      "buscador_ubigeo": "huambos chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3185",
      "nombre_ubigeo": "Lajas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Lajas, Chota",
      "buscador_ubigeo": "lajas chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3186",
      "nombre_ubigeo": "Llama",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Llama, Chota",
      "buscador_ubigeo": "llama chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3187",
      "nombre_ubigeo": "Miracosta",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Miracosta, Chota",
      "buscador_ubigeo": "miracosta chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3188",
      "nombre_ubigeo": "Paccha",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Paccha, Chota",
      "buscador_ubigeo": "paccha chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3189",
      "nombre_ubigeo": "Pion",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Pion, Chota",
      "buscador_ubigeo": "pion chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3190",
      "nombre_ubigeo": "Querocoto",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Querocoto, Chota",
      "buscador_ubigeo": "querocoto chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3191",
      "nombre_ubigeo": "San Juan de Licupis",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "San Juan de Licupis, Chota",
      "buscador_ubigeo": "san juan de licupis chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3192",
      "nombre_ubigeo": "Tacabamba",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Tacabamba, Chota",
      "buscador_ubigeo": "tacabamba chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }, {
      "id_ubigeo": "3193",
      "nombre_ubigeo": "Tocmoche",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Tocmoche, Chota",
      "buscador_ubigeo": "tocmoche chota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3175"
    }],
    "3195": [{
      "id_ubigeo": "3197",
      "nombre_ubigeo": "Chilete",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chilete, Contumaza",
      "buscador_ubigeo": "chilete contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3196",
      "nombre_ubigeo": "Contumaza",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Contumaza, Contumaza",
      "buscador_ubigeo": "contumaza contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3198",
      "nombre_ubigeo": "Cupisnique",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cupisnique, Contumaza",
      "buscador_ubigeo": "cupisnique contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3199",
      "nombre_ubigeo": "Guzmango",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Guzmango, Contumaza",
      "buscador_ubigeo": "guzmango contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3200",
      "nombre_ubigeo": "San Benito",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Benito, Contumaza",
      "buscador_ubigeo": "san benito contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3201",
      "nombre_ubigeo": "Santa Cruz de Toled",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Santa Cruz de Toled, Contumaza",
      "buscador_ubigeo": "santa cruz de toled contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3202",
      "nombre_ubigeo": "Tantarica",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Tantarica, Contumaza",
      "buscador_ubigeo": "tantarica contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }, {
      "id_ubigeo": "3203",
      "nombre_ubigeo": "Yonan",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yonan, Contumaza",
      "buscador_ubigeo": "yonan contumaza",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3195"
    }],
    "3204": [{
      "id_ubigeo": "3206",
      "nombre_ubigeo": "Callayuc",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Callayuc, Cutervo",
      "buscador_ubigeo": "callayuc cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3207",
      "nombre_ubigeo": "Choros",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Choros, Cutervo",
      "buscador_ubigeo": "choros cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3208",
      "nombre_ubigeo": "Cujillo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cujillo, Cutervo",
      "buscador_ubigeo": "cujillo cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3205",
      "nombre_ubigeo": "Cutervo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cutervo, Cutervo",
      "buscador_ubigeo": "cutervo cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3209",
      "nombre_ubigeo": "La Ramada",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Ramada, Cutervo",
      "buscador_ubigeo": "la ramada cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3210",
      "nombre_ubigeo": "Pimpingos",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pimpingos, Cutervo",
      "buscador_ubigeo": "pimpingos cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3211",
      "nombre_ubigeo": "Querocotillo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Querocotillo, Cutervo",
      "buscador_ubigeo": "querocotillo cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3212",
      "nombre_ubigeo": "San Andres de Cutervo",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Andres de Cutervo, Cutervo",
      "buscador_ubigeo": "san andres de cutervo cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3213",
      "nombre_ubigeo": "San Juan de Cutervo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Juan de Cutervo, Cutervo",
      "buscador_ubigeo": "san juan de cutervo cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3214",
      "nombre_ubigeo": "San Luis de Lucma",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Luis de Lucma, Cutervo",
      "buscador_ubigeo": "san luis de lucma cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3215",
      "nombre_ubigeo": "Santa Cruz",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Santa Cruz, Cutervo",
      "buscador_ubigeo": "santa cruz cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3216",
      "nombre_ubigeo": "Santo Domingo de la Capilla",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Santo Domingo de la Capilla, Cutervo",
      "buscador_ubigeo": "santo domingo de la capilla cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3217",
      "nombre_ubigeo": "Santo Tomas",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Santo Tomas, Cutervo",
      "buscador_ubigeo": "santo tomas cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3218",
      "nombre_ubigeo": "Socota",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Socota, Cutervo",
      "buscador_ubigeo": "socota cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }, {
      "id_ubigeo": "3219",
      "nombre_ubigeo": "Toribio Casanova",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Toribio Casanova, Cutervo",
      "buscador_ubigeo": "toribio casanova cutervo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3204"
    }],
    "3220": [{
      "id_ubigeo": "3221",
      "nombre_ubigeo": "Bambamarca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Bambamarca, Hualgayoc",
      "buscador_ubigeo": "bambamarca hualgayoc",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3220"
    }, {
      "id_ubigeo": "3222",
      "nombre_ubigeo": "Chugur",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chugur, Hualgayoc",
      "buscador_ubigeo": "chugur hualgayoc",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3220"
    }, {
      "id_ubigeo": "3223",
      "nombre_ubigeo": "Hualgayoc",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Hualgayoc, Hualgayoc",
      "buscador_ubigeo": "hualgayoc hualgayoc",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3220"
    }],
    "3224": [{
      "id_ubigeo": "3226",
      "nombre_ubigeo": "Bellavista",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bellavista, Jaen",
      "buscador_ubigeo": "bellavista jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3227",
      "nombre_ubigeo": "Chontali",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chontali, Jaen",
      "buscador_ubigeo": "chontali jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3228",
      "nombre_ubigeo": "Colasay",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Colasay, Jaen",
      "buscador_ubigeo": "colasay jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3229",
      "nombre_ubigeo": "Huabal",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huabal, Jaen",
      "buscador_ubigeo": "huabal jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3225",
      "nombre_ubigeo": "Jaen",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Jaen, Jaen",
      "buscador_ubigeo": "jaen jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3230",
      "nombre_ubigeo": "Las Pirias",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Las Pirias, Jaen",
      "buscador_ubigeo": "las pirias jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3231",
      "nombre_ubigeo": "Pomahuaca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pomahuaca, Jaen",
      "buscador_ubigeo": "pomahuaca jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3232",
      "nombre_ubigeo": "Pucara",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pucara, Jaen",
      "buscador_ubigeo": "pucara jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3233",
      "nombre_ubigeo": "Sallique",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sallique, Jaen",
      "buscador_ubigeo": "sallique jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3234",
      "nombre_ubigeo": "San Felipe",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Felipe, Jaen",
      "buscador_ubigeo": "san felipe jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3235",
      "nombre_ubigeo": "San Jose del Alto",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Jose del Alto, Jaen",
      "buscador_ubigeo": "san jose del alto jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }, {
      "id_ubigeo": "3236",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Santa Rosa, Jaen",
      "buscador_ubigeo": "santa rosa jaen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3224"
    }],
    "3237": [{
      "id_ubigeo": "3239",
      "nombre_ubigeo": "Chirinos",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chirinos, San Ignacio",
      "buscador_ubigeo": "chirinos san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }, {
      "id_ubigeo": "3240",
      "nombre_ubigeo": "Huarango",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huarango, San Ignacio",
      "buscador_ubigeo": "huarango san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }, {
      "id_ubigeo": "3241",
      "nombre_ubigeo": "La Coipa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "La Coipa, San Ignacio",
      "buscador_ubigeo": "la coipa san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }, {
      "id_ubigeo": "3242",
      "nombre_ubigeo": "Namballe",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Namballe, San Ignacio",
      "buscador_ubigeo": "namballe san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }, {
      "id_ubigeo": "3238",
      "nombre_ubigeo": "San Ignacio",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Ignacio, San Ignacio",
      "buscador_ubigeo": "san ignacio san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }, {
      "id_ubigeo": "3243",
      "nombre_ubigeo": "San Jose de Lourdes",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Jose de Lourdes, San Ignacio",
      "buscador_ubigeo": "san jose de lourdes san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }, {
      "id_ubigeo": "3244",
      "nombre_ubigeo": "Tabaconas",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Tabaconas, San Ignacio",
      "buscador_ubigeo": "tabaconas san ignacio",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3237"
    }],
    "3245": [{
      "id_ubigeo": "3247",
      "nombre_ubigeo": "Chancay",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chancay, San Marcos",
      "buscador_ubigeo": "chancay san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }, {
      "id_ubigeo": "3248",
      "nombre_ubigeo": "Eduardo Villanueva",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Eduardo Villanueva, San Marcos",
      "buscador_ubigeo": "eduardo villanueva san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }, {
      "id_ubigeo": "3249",
      "nombre_ubigeo": "Gregorio Pita",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Gregorio Pita, San Marcos",
      "buscador_ubigeo": "gregorio pita san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }, {
      "id_ubigeo": "3250",
      "nombre_ubigeo": "Ichocan",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ichocan, San Marcos",
      "buscador_ubigeo": "ichocan san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }, {
      "id_ubigeo": "3251",
      "nombre_ubigeo": "Jose Manuel Quiroz",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Jose Manuel Quiroz, San Marcos",
      "buscador_ubigeo": "jose manuel quiroz san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }, {
      "id_ubigeo": "3252",
      "nombre_ubigeo": "Jose Sabogal",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Jose Sabogal, San Marcos",
      "buscador_ubigeo": "jose sabogal san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }, {
      "id_ubigeo": "3246",
      "nombre_ubigeo": "Pedro Galvez",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pedro Galvez, San Marcos",
      "buscador_ubigeo": "pedro galvez san marcos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3245"
    }],
    "3253": [{
      "id_ubigeo": "3255",
      "nombre_ubigeo": "Bolivar",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bolivar, San Miguel",
      "buscador_ubigeo": "bolivar san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3256",
      "nombre_ubigeo": "Calquis",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Calquis, San Miguel",
      "buscador_ubigeo": "calquis san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3257",
      "nombre_ubigeo": "Catilluc",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Catilluc, San Miguel",
      "buscador_ubigeo": "catilluc san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3258",
      "nombre_ubigeo": "El Prado",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "El Prado, San Miguel",
      "buscador_ubigeo": "el prado san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3259",
      "nombre_ubigeo": "La Florida",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "La Florida, San Miguel",
      "buscador_ubigeo": "la florida san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3260",
      "nombre_ubigeo": "Llapa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Llapa, San Miguel",
      "buscador_ubigeo": "llapa san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3261",
      "nombre_ubigeo": "Nanchoc",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Nanchoc, San Miguel",
      "buscador_ubigeo": "nanchoc san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3262",
      "nombre_ubigeo": "Niepos",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Niepos, San Miguel",
      "buscador_ubigeo": "niepos san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3263",
      "nombre_ubigeo": "San Gregorio",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Gregorio, San Miguel",
      "buscador_ubigeo": "san gregorio san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3254",
      "nombre_ubigeo": "San Miguel",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Miguel, San Miguel",
      "buscador_ubigeo": "san miguel san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3264",
      "nombre_ubigeo": "San Silvestre de Cochan",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Silvestre de Cochan, San Miguel",
      "buscador_ubigeo": "san silvestre de cochan san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3265",
      "nombre_ubigeo": "Tongod",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Tongod, San Miguel",
      "buscador_ubigeo": "tongod san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }, {
      "id_ubigeo": "3266",
      "nombre_ubigeo": "Union Agua Blanca",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Union Agua Blanca, San Miguel",
      "buscador_ubigeo": "union agua blanca san miguel",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3253"
    }],
    "3267": [{
      "id_ubigeo": "3269",
      "nombre_ubigeo": "San Bernardino",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "San Bernardino, San Pablo",
      "buscador_ubigeo": "san bernardino san pablo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3267"
    }, {
      "id_ubigeo": "3270",
      "nombre_ubigeo": "San Luis",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "San Luis, San Pablo",
      "buscador_ubigeo": "san luis san pablo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3267"
    }, {
      "id_ubigeo": "3268",
      "nombre_ubigeo": "San Pablo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Pablo, San Pablo",
      "buscador_ubigeo": "san pablo san pablo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3267"
    }, {
      "id_ubigeo": "3271",
      "nombre_ubigeo": "Tumbaden",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Tumbaden, San Pablo",
      "buscador_ubigeo": "tumbaden san pablo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3267"
    }],
    "3272": [{
      "id_ubigeo": "3274",
      "nombre_ubigeo": "Andabamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andabamba, Santa Cruz",
      "buscador_ubigeo": "andabamba santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3275",
      "nombre_ubigeo": "Catache",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Catache, Santa Cruz",
      "buscador_ubigeo": "catache santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3276",
      "nombre_ubigeo": "Chancaybaqos",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chancaybaqos, Santa Cruz",
      "buscador_ubigeo": "chancaybaqos santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3277",
      "nombre_ubigeo": "La Esperanza",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Esperanza, Santa Cruz",
      "buscador_ubigeo": "la esperanza santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3278",
      "nombre_ubigeo": "Ninabamba",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ninabamba, Santa Cruz",
      "buscador_ubigeo": "ninabamba santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3279",
      "nombre_ubigeo": "Pulan",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pulan, Santa Cruz",
      "buscador_ubigeo": "pulan santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3273",
      "nombre_ubigeo": "Santa Cruz",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Santa Cruz, Santa Cruz",
      "buscador_ubigeo": "santa cruz santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3280",
      "nombre_ubigeo": "Saucepampa",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Saucepampa, Santa Cruz",
      "buscador_ubigeo": "saucepampa santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3281",
      "nombre_ubigeo": "Sexi",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sexi, Santa Cruz",
      "buscador_ubigeo": "sexi santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3282",
      "nombre_ubigeo": "Uticyacu",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Uticyacu, Santa Cruz",
      "buscador_ubigeo": "uticyacu santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }, {
      "id_ubigeo": "3283",
      "nombre_ubigeo": "Yauyucan",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yauyucan, Santa Cruz",
      "buscador_ubigeo": "yauyucan santa cruz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3272"
    }],
    "3302": [{
      "id_ubigeo": "3303",
      "nombre_ubigeo": "Acomayo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Acomayo, Acomayo",
      "buscador_ubigeo": "acomayo acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }, {
      "id_ubigeo": "3304",
      "nombre_ubigeo": "Acopia",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acopia, Acomayo",
      "buscador_ubigeo": "acopia acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }, {
      "id_ubigeo": "3305",
      "nombre_ubigeo": "Acos",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Acos, Acomayo",
      "buscador_ubigeo": "acos acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }, {
      "id_ubigeo": "3306",
      "nombre_ubigeo": "Mosoc Llacta",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Mosoc Llacta, Acomayo",
      "buscador_ubigeo": "mosoc llacta acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }, {
      "id_ubigeo": "3307",
      "nombre_ubigeo": "Pomacanchi",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pomacanchi, Acomayo",
      "buscador_ubigeo": "pomacanchi acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }, {
      "id_ubigeo": "3308",
      "nombre_ubigeo": "Rondocan",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Rondocan, Acomayo",
      "buscador_ubigeo": "rondocan acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }, {
      "id_ubigeo": "3309",
      "nombre_ubigeo": "Sangarara",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Sangarara, Acomayo",
      "buscador_ubigeo": "sangarara acomayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3302"
    }],
    "3310": [{
      "id_ubigeo": "3312",
      "nombre_ubigeo": "Ancahuasi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ancahuasi, Anta",
      "buscador_ubigeo": "ancahuasi anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3311",
      "nombre_ubigeo": "Anta",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Anta, Anta",
      "buscador_ubigeo": "anta anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3313",
      "nombre_ubigeo": "Cachimayo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cachimayo, Anta",
      "buscador_ubigeo": "cachimayo anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3314",
      "nombre_ubigeo": "Chinchaypujio",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chinchaypujio, Anta",
      "buscador_ubigeo": "chinchaypujio anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3315",
      "nombre_ubigeo": "Huarocondo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huarocondo, Anta",
      "buscador_ubigeo": "huarocondo anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3316",
      "nombre_ubigeo": "Limatambo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Limatambo, Anta",
      "buscador_ubigeo": "limatambo anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3317",
      "nombre_ubigeo": "Mollepata",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Mollepata, Anta",
      "buscador_ubigeo": "mollepata anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3318",
      "nombre_ubigeo": "Pucyura",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pucyura, Anta",
      "buscador_ubigeo": "pucyura anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }, {
      "id_ubigeo": "3319",
      "nombre_ubigeo": "Zurite",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Zurite, Anta",
      "buscador_ubigeo": "zurite anta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3310"
    }],
    "3320": [{
      "id_ubigeo": "3321",
      "nombre_ubigeo": "Calca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Calca, Calca",
      "buscador_ubigeo": "calca calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3322",
      "nombre_ubigeo": "Coya",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Coya, Calca",
      "buscador_ubigeo": "coya calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3323",
      "nombre_ubigeo": "Lamay",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Lamay, Calca",
      "buscador_ubigeo": "lamay calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3324",
      "nombre_ubigeo": "Lares",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Lares, Calca",
      "buscador_ubigeo": "lares calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3325",
      "nombre_ubigeo": "Pisac",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pisac, Calca",
      "buscador_ubigeo": "pisac calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3326",
      "nombre_ubigeo": "San Salvador",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Salvador, Calca",
      "buscador_ubigeo": "san salvador calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3327",
      "nombre_ubigeo": "Taray",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Taray, Calca",
      "buscador_ubigeo": "taray calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }, {
      "id_ubigeo": "3328",
      "nombre_ubigeo": "Yanatile",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yanatile, Calca",
      "buscador_ubigeo": "yanatile calca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3320"
    }],
    "3329": [{
      "id_ubigeo": "3331",
      "nombre_ubigeo": "Checca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Checca, Canas",
      "buscador_ubigeo": "checca canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3332",
      "nombre_ubigeo": "Kunturkanki",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Kunturkanki, Canas",
      "buscador_ubigeo": "kunturkanki canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3333",
      "nombre_ubigeo": "Langui",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Langui, Canas",
      "buscador_ubigeo": "langui canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3334",
      "nombre_ubigeo": "Layo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Layo, Canas",
      "buscador_ubigeo": "layo canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3335",
      "nombre_ubigeo": "Pampamarca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pampamarca, Canas",
      "buscador_ubigeo": "pampamarca canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3336",
      "nombre_ubigeo": "Quehue",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Quehue, Canas",
      "buscador_ubigeo": "quehue canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3337",
      "nombre_ubigeo": "Tupac Amaru",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Tupac Amaru, Canas",
      "buscador_ubigeo": "tupac amaru canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }, {
      "id_ubigeo": "3330",
      "nombre_ubigeo": "Yanaoca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Yanaoca, Canas",
      "buscador_ubigeo": "yanaoca canas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3329"
    }],
    "3338": [{
      "id_ubigeo": "3340",
      "nombre_ubigeo": "Checacupe",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Checacupe, Canchis",
      "buscador_ubigeo": "checacupe canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3341",
      "nombre_ubigeo": "Combapata",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Combapata, Canchis",
      "buscador_ubigeo": "combapata canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3342",
      "nombre_ubigeo": "Marangani",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Marangani, Canchis",
      "buscador_ubigeo": "marangani canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3343",
      "nombre_ubigeo": "Pitumarca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pitumarca, Canchis",
      "buscador_ubigeo": "pitumarca canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3344",
      "nombre_ubigeo": "San Pablo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Pablo, Canchis",
      "buscador_ubigeo": "san pablo canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3345",
      "nombre_ubigeo": "San Pedro",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Pedro, Canchis",
      "buscador_ubigeo": "san pedro canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3339",
      "nombre_ubigeo": "Sicuani",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Sicuani, Canchis",
      "buscador_ubigeo": "sicuani canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }, {
      "id_ubigeo": "3346",
      "nombre_ubigeo": "Tinta",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Tinta, Canchis",
      "buscador_ubigeo": "tinta canchis",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3338"
    }],
    "3347": [{
      "id_ubigeo": "3349",
      "nombre_ubigeo": "Capacmarca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Capacmarca, Chumbivilcas",
      "buscador_ubigeo": "capacmarca chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3350",
      "nombre_ubigeo": "Chamaca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chamaca, Chumbivilcas",
      "buscador_ubigeo": "chamaca chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3351",
      "nombre_ubigeo": "Colquemarca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Colquemarca, Chumbivilcas",
      "buscador_ubigeo": "colquemarca chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3352",
      "nombre_ubigeo": "Livitaca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Livitaca, Chumbivilcas",
      "buscador_ubigeo": "livitaca chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3353",
      "nombre_ubigeo": "Llusco",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Llusco, Chumbivilcas",
      "buscador_ubigeo": "llusco chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3354",
      "nombre_ubigeo": "Quiqota",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Quiqota, Chumbivilcas",
      "buscador_ubigeo": "quiqota chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3348",
      "nombre_ubigeo": "Santo Tomas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Santo Tomas, Chumbivilcas",
      "buscador_ubigeo": "santo tomas chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }, {
      "id_ubigeo": "3355",
      "nombre_ubigeo": "Velille",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Velille, Chumbivilcas",
      "buscador_ubigeo": "velille chumbivilcas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3347"
    }],
    "3293": [{
      "id_ubigeo": "3295",
      "nombre_ubigeo": "Ccorca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ccorca, Cusco",
      "buscador_ubigeo": "ccorca cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3294",
      "nombre_ubigeo": "Cusco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cusco, Cusco",
      "buscador_ubigeo": "cusco cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3296",
      "nombre_ubigeo": "Poroy",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Poroy, Cusco",
      "buscador_ubigeo": "poroy cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3297",
      "nombre_ubigeo": "San Jeronimo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "San Jeronimo, Cusco",
      "buscador_ubigeo": "san jeronimo cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3298",
      "nombre_ubigeo": "San Sebastian",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Sebastian, Cusco",
      "buscador_ubigeo": "san sebastian cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3299",
      "nombre_ubigeo": "Santiago",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Santiago, Cusco",
      "buscador_ubigeo": "santiago cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3300",
      "nombre_ubigeo": "Saylla",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Saylla, Cusco",
      "buscador_ubigeo": "saylla cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }, {
      "id_ubigeo": "3301",
      "nombre_ubigeo": "Wanchaq",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Wanchaq, Cusco",
      "buscador_ubigeo": "wanchaq cusco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3293"
    }],
    "3356": [{
      "id_ubigeo": "3364",
      "nombre_ubigeo": "Alto Pichigua",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Alto Pichigua, Espinar",
      "buscador_ubigeo": "alto pichigua espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3358",
      "nombre_ubigeo": "Condoroma",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Condoroma, Espinar",
      "buscador_ubigeo": "condoroma espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3359",
      "nombre_ubigeo": "Coporaque",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Coporaque, Espinar",
      "buscador_ubigeo": "coporaque espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3357",
      "nombre_ubigeo": "Espinar",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Espinar, Espinar",
      "buscador_ubigeo": "espinar espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3360",
      "nombre_ubigeo": "Ocoruro",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ocoruro, Espinar",
      "buscador_ubigeo": "ocoruro espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3361",
      "nombre_ubigeo": "Pallpata",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pallpata, Espinar",
      "buscador_ubigeo": "pallpata espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3362",
      "nombre_ubigeo": "Pichigua",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pichigua, Espinar",
      "buscador_ubigeo": "pichigua espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }, {
      "id_ubigeo": "3363",
      "nombre_ubigeo": "Suyckutambo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Suyckutambo, Espinar",
      "buscador_ubigeo": "suyckutambo espinar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3356"
    }],
    "3365": [{
      "id_ubigeo": "3367",
      "nombre_ubigeo": "Echarate",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Echarate, La Convencion",
      "buscador_ubigeo": "echarate la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3368",
      "nombre_ubigeo": "Huayopata",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huayopata, La Convencion",
      "buscador_ubigeo": "huayopata la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3369",
      "nombre_ubigeo": "Maranura",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Maranura, La Convencion",
      "buscador_ubigeo": "maranura la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3370",
      "nombre_ubigeo": "Ocobamba",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ocobamba, La Convencion",
      "buscador_ubigeo": "ocobamba la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3375",
      "nombre_ubigeo": "Pichari",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pichari, La Convencion",
      "buscador_ubigeo": "pichari la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3371",
      "nombre_ubigeo": "Quellouno",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Quellouno, La Convencion",
      "buscador_ubigeo": "quellouno la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3372",
      "nombre_ubigeo": "Quimbiri",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Quimbiri, La Convencion",
      "buscador_ubigeo": "quimbiri la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3366",
      "nombre_ubigeo": "Santa Ana",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Santa Ana, La Convencion",
      "buscador_ubigeo": "santa ana la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3373",
      "nombre_ubigeo": "Santa Teresa",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Santa Teresa, La Convencion",
      "buscador_ubigeo": "santa teresa la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }, {
      "id_ubigeo": "3374",
      "nombre_ubigeo": "Vilcabamba",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Vilcabamba, La Convencion",
      "buscador_ubigeo": "vilcabamba la convencion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3365"
    }],
    "3376": [{
      "id_ubigeo": "3378",
      "nombre_ubigeo": "Accha",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Accha, Paruro",
      "buscador_ubigeo": "accha paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3379",
      "nombre_ubigeo": "Ccapi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ccapi, Paruro",
      "buscador_ubigeo": "ccapi paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3380",
      "nombre_ubigeo": "Colcha",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Colcha, Paruro",
      "buscador_ubigeo": "colcha paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3381",
      "nombre_ubigeo": "Huanoquite",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huanoquite, Paruro",
      "buscador_ubigeo": "huanoquite paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3382",
      "nombre_ubigeo": "Omacha",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Omacha, Paruro",
      "buscador_ubigeo": "omacha paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3383",
      "nombre_ubigeo": "Paccaritambo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Paccaritambo, Paruro",
      "buscador_ubigeo": "paccaritambo paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3377",
      "nombre_ubigeo": "Paruro",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Paruro, Paruro",
      "buscador_ubigeo": "paruro paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3384",
      "nombre_ubigeo": "Pillpinto",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pillpinto, Paruro",
      "buscador_ubigeo": "pillpinto paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }, {
      "id_ubigeo": "3385",
      "nombre_ubigeo": "Yaurisque",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Yaurisque, Paruro",
      "buscador_ubigeo": "yaurisque paruro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3376"
    }],
    "3386": [{
      "id_ubigeo": "3388",
      "nombre_ubigeo": "Caicay",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Caicay, Paucartambo",
      "buscador_ubigeo": "caicay paucartambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3386"
    }, {
      "id_ubigeo": "3389",
      "nombre_ubigeo": "Challabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Challabamba, Paucartambo",
      "buscador_ubigeo": "challabamba paucartambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3386"
    }, {
      "id_ubigeo": "3390",
      "nombre_ubigeo": "Colquepata",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Colquepata, Paucartambo",
      "buscador_ubigeo": "colquepata paucartambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3386"
    }, {
      "id_ubigeo": "3391",
      "nombre_ubigeo": "Huancarani",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huancarani, Paucartambo",
      "buscador_ubigeo": "huancarani paucartambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3386"
    }, {
      "id_ubigeo": "3392",
      "nombre_ubigeo": "Kosqipata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Kosqipata, Paucartambo",
      "buscador_ubigeo": "kosqipata paucartambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3386"
    }, {
      "id_ubigeo": "3387",
      "nombre_ubigeo": "Paucartambo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Paucartambo, Paucartambo",
      "buscador_ubigeo": "paucartambo paucartambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3386"
    }],
    "3393": [{
      "id_ubigeo": "3395",
      "nombre_ubigeo": "Andahuaylillas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andahuaylillas, Quispicanchi",
      "buscador_ubigeo": "andahuaylillas quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3396",
      "nombre_ubigeo": "Camanti",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Camanti, Quispicanchi",
      "buscador_ubigeo": "camanti quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3397",
      "nombre_ubigeo": "Ccarhuayo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ccarhuayo, Quispicanchi",
      "buscador_ubigeo": "ccarhuayo quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3398",
      "nombre_ubigeo": "Ccatca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ccatca, Quispicanchi",
      "buscador_ubigeo": "ccatca quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3399",
      "nombre_ubigeo": "Cusipata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cusipata, Quispicanchi",
      "buscador_ubigeo": "cusipata quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3400",
      "nombre_ubigeo": "Huaro",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huaro, Quispicanchi",
      "buscador_ubigeo": "huaro quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3401",
      "nombre_ubigeo": "Lucre",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Lucre, Quispicanchi",
      "buscador_ubigeo": "lucre quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3402",
      "nombre_ubigeo": "Marcapata",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Marcapata, Quispicanchi",
      "buscador_ubigeo": "marcapata quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3403",
      "nombre_ubigeo": "Ocongate",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Ocongate, Quispicanchi",
      "buscador_ubigeo": "ocongate quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3404",
      "nombre_ubigeo": "Oropesa",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Oropesa, Quispicanchi",
      "buscador_ubigeo": "oropesa quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3405",
      "nombre_ubigeo": "Quiquijana",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Quiquijana, Quispicanchi",
      "buscador_ubigeo": "quiquijana quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }, {
      "id_ubigeo": "3394",
      "nombre_ubigeo": "Urcos",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Urcos, Quispicanchi",
      "buscador_ubigeo": "urcos quispicanchi",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3393"
    }],
    "3406": [{
      "id_ubigeo": "3408",
      "nombre_ubigeo": "Chinchero",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chinchero, Urubamba",
      "buscador_ubigeo": "chinchero urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }, {
      "id_ubigeo": "3409",
      "nombre_ubigeo": "Huayllabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huayllabamba, Urubamba",
      "buscador_ubigeo": "huayllabamba urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }, {
      "id_ubigeo": "3410",
      "nombre_ubigeo": "Machupicchu",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Machupicchu, Urubamba",
      "buscador_ubigeo": "machupicchu urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }, {
      "id_ubigeo": "3411",
      "nombre_ubigeo": "Maras",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Maras, Urubamba",
      "buscador_ubigeo": "maras urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }, {
      "id_ubigeo": "3412",
      "nombre_ubigeo": "Ollantaytambo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ollantaytambo, Urubamba",
      "buscador_ubigeo": "ollantaytambo urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }, {
      "id_ubigeo": "3407",
      "nombre_ubigeo": "Urubamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Urubamba, Urubamba",
      "buscador_ubigeo": "urubamba urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }, {
      "id_ubigeo": "3413",
      "nombre_ubigeo": "Yucay",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Yucay, Urubamba",
      "buscador_ubigeo": "yucay urubamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3406"
    }],
    "3435": [{
      "id_ubigeo": "3436",
      "nombre_ubigeo": "Acobamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Acobamba, Acobamba",
      "buscador_ubigeo": "acobamba acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3437",
      "nombre_ubigeo": "Andabamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andabamba, Acobamba",
      "buscador_ubigeo": "andabamba acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3438",
      "nombre_ubigeo": "Anta",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Anta, Acobamba",
      "buscador_ubigeo": "anta acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3439",
      "nombre_ubigeo": "Caja",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Caja, Acobamba",
      "buscador_ubigeo": "caja acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3440",
      "nombre_ubigeo": "Marcas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Marcas, Acobamba",
      "buscador_ubigeo": "marcas acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3441",
      "nombre_ubigeo": "Paucara",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Paucara, Acobamba",
      "buscador_ubigeo": "paucara acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3442",
      "nombre_ubigeo": "Pomacocha",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pomacocha, Acobamba",
      "buscador_ubigeo": "pomacocha acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }, {
      "id_ubigeo": "3443",
      "nombre_ubigeo": "Rosario",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Rosario, Acobamba",
      "buscador_ubigeo": "rosario acobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3435"
    }],
    "3444": [{
      "id_ubigeo": "3446",
      "nombre_ubigeo": "Anchonga",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anchonga, Angaraes",
      "buscador_ubigeo": "anchonga angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3447",
      "nombre_ubigeo": "Callanmarca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Callanmarca, Angaraes",
      "buscador_ubigeo": "callanmarca angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3448",
      "nombre_ubigeo": "Ccochaccasa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ccochaccasa, Angaraes",
      "buscador_ubigeo": "ccochaccasa angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3449",
      "nombre_ubigeo": "Chincho",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chincho, Angaraes",
      "buscador_ubigeo": "chincho angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3450",
      "nombre_ubigeo": "Congalla",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Congalla, Angaraes",
      "buscador_ubigeo": "congalla angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3451",
      "nombre_ubigeo": "Huanca-Huanca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huanca-Huanca, Angaraes",
      "buscador_ubigeo": "huanca-huanca angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3452",
      "nombre_ubigeo": "Huayllay Grande",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huayllay Grande, Angaraes",
      "buscador_ubigeo": "huayllay grande angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3453",
      "nombre_ubigeo": "Julcamarca",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Julcamarca, Angaraes",
      "buscador_ubigeo": "julcamarca angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3445",
      "nombre_ubigeo": "Lircay",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Lircay, Angaraes",
      "buscador_ubigeo": "lircay angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3454",
      "nombre_ubigeo": "San Antonio de Antaparco",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Antonio de Antaparco, Angaraes",
      "buscador_ubigeo": "san antonio de antaparco angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3455",
      "nombre_ubigeo": "Santo Tomas de Pata",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Santo Tomas de Pata, Angaraes",
      "buscador_ubigeo": "santo tomas de pata angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }, {
      "id_ubigeo": "3456",
      "nombre_ubigeo": "Secclla",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Secclla, Angaraes",
      "buscador_ubigeo": "secclla angaraes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3444"
    }],
    "3457": [{
      "id_ubigeo": "3459",
      "nombre_ubigeo": "Arma",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Arma, Castrovirreyna",
      "buscador_ubigeo": "arma castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3460",
      "nombre_ubigeo": "Aurahua",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Aurahua, Castrovirreyna",
      "buscador_ubigeo": "aurahua castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3461",
      "nombre_ubigeo": "Capillas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Capillas, Castrovirreyna",
      "buscador_ubigeo": "capillas castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3458",
      "nombre_ubigeo": "Castrovirreyna",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Castrovirreyna, Castrovirreyna",
      "buscador_ubigeo": "castrovirreyna castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3462",
      "nombre_ubigeo": "Chupamarca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chupamarca, Castrovirreyna",
      "buscador_ubigeo": "chupamarca castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3463",
      "nombre_ubigeo": "Cocas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cocas, Castrovirreyna",
      "buscador_ubigeo": "cocas castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3464",
      "nombre_ubigeo": "Huachos",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huachos, Castrovirreyna",
      "buscador_ubigeo": "huachos castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3465",
      "nombre_ubigeo": "Huamatambo",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huamatambo, Castrovirreyna",
      "buscador_ubigeo": "huamatambo castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3466",
      "nombre_ubigeo": "Mollepampa",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Mollepampa, Castrovirreyna",
      "buscador_ubigeo": "mollepampa castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3467",
      "nombre_ubigeo": "San Juan",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Juan, Castrovirreyna",
      "buscador_ubigeo": "san juan castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3468",
      "nombre_ubigeo": "Santa Ana",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Santa Ana, Castrovirreyna",
      "buscador_ubigeo": "santa ana castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3469",
      "nombre_ubigeo": "Tantara",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Tantara, Castrovirreyna",
      "buscador_ubigeo": "tantara castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }, {
      "id_ubigeo": "3470",
      "nombre_ubigeo": "Ticrapo",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Ticrapo, Castrovirreyna",
      "buscador_ubigeo": "ticrapo castrovirreyna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3457"
    }],
    "3471": [{
      "id_ubigeo": "3473",
      "nombre_ubigeo": "Anco",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anco, Churcampa",
      "buscador_ubigeo": "anco churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3474",
      "nombre_ubigeo": "Chinchihuasi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chinchihuasi, Churcampa",
      "buscador_ubigeo": "chinchihuasi churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3472",
      "nombre_ubigeo": "Churcampa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Churcampa, Churcampa",
      "buscador_ubigeo": "churcampa churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3475",
      "nombre_ubigeo": "El Carmen",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "El Carmen, Churcampa",
      "buscador_ubigeo": "el carmen churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3476",
      "nombre_ubigeo": "La Merced",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Merced, Churcampa",
      "buscador_ubigeo": "la merced churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3477",
      "nombre_ubigeo": "Locroja",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Locroja, Churcampa",
      "buscador_ubigeo": "locroja churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3481",
      "nombre_ubigeo": "Pachamarca",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pachamarca, Churcampa",
      "buscador_ubigeo": "pachamarca churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3478",
      "nombre_ubigeo": "Paucarbamba",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Paucarbamba, Churcampa",
      "buscador_ubigeo": "paucarbamba churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3479",
      "nombre_ubigeo": "San Miguel de Mayocc",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Miguel de Mayocc, Churcampa",
      "buscador_ubigeo": "san miguel de mayocc churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }, {
      "id_ubigeo": "3480",
      "nombre_ubigeo": "San Pedro de Coris",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Pedro de Coris, Churcampa",
      "buscador_ubigeo": "san pedro de coris churcampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3471"
    }],
    "3415": [{
      "id_ubigeo": "3417",
      "nombre_ubigeo": "Acobambilla",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acobambilla, Huancavelica",
      "buscador_ubigeo": "acobambilla huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3418",
      "nombre_ubigeo": "Acoria",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Acoria, Huancavelica",
      "buscador_ubigeo": "acoria huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3433",
      "nombre_ubigeo": "Ascensi\u00f3n",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Ascensi\u00f3n, Huancavelica",
      "buscador_ubigeo": "ascensi\u00f3n huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3419",
      "nombre_ubigeo": "Conayca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Conayca, Huancavelica",
      "buscador_ubigeo": "conayca huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3420",
      "nombre_ubigeo": "Cuenca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Cuenca, Huancavelica",
      "buscador_ubigeo": "cuenca huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3421",
      "nombre_ubigeo": "Huachocolpa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huachocolpa, Huancavelica",
      "buscador_ubigeo": "huachocolpa huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3416",
      "nombre_ubigeo": "Huancavelica",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancavelica, Huancavelica",
      "buscador_ubigeo": "huancavelica huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3434",
      "nombre_ubigeo": "Huando",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Huando, Huancavelica",
      "buscador_ubigeo": "huando huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3422",
      "nombre_ubigeo": "Huayllahuara",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huayllahuara, Huancavelica",
      "buscador_ubigeo": "huayllahuara huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3423",
      "nombre_ubigeo": "Izcuchaca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Izcuchaca, Huancavelica",
      "buscador_ubigeo": "izcuchaca huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3424",
      "nombre_ubigeo": "Laria",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Laria, Huancavelica",
      "buscador_ubigeo": "laria huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3425",
      "nombre_ubigeo": "Manta",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Manta, Huancavelica",
      "buscador_ubigeo": "manta huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3426",
      "nombre_ubigeo": "Mariscal Caceres",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Mariscal Caceres, Huancavelica",
      "buscador_ubigeo": "mariscal caceres huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3427",
      "nombre_ubigeo": "Moya",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Moya, Huancavelica",
      "buscador_ubigeo": "moya huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3428",
      "nombre_ubigeo": "Nuevo Occoro",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Nuevo Occoro, Huancavelica",
      "buscador_ubigeo": "nuevo occoro huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3429",
      "nombre_ubigeo": "Palca",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Palca, Huancavelica",
      "buscador_ubigeo": "palca huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3430",
      "nombre_ubigeo": "Pilchaca",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Pilchaca, Huancavelica",
      "buscador_ubigeo": "pilchaca huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3431",
      "nombre_ubigeo": "Vilca",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Vilca, Huancavelica",
      "buscador_ubigeo": "vilca huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }, {
      "id_ubigeo": "3432",
      "nombre_ubigeo": "Yauli",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Yauli, Huancavelica",
      "buscador_ubigeo": "yauli huancavelica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3415"
    }],
    "3482": [{
      "id_ubigeo": "3484",
      "nombre_ubigeo": "Ayavi",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ayavi, Huaytara",
      "buscador_ubigeo": "ayavi huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3485",
      "nombre_ubigeo": "Cordova",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cordova, Huaytara",
      "buscador_ubigeo": "cordova huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3486",
      "nombre_ubigeo": "Huayacundo Arma",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huayacundo Arma, Huaytara",
      "buscador_ubigeo": "huayacundo arma huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3483",
      "nombre_ubigeo": "Huaytara",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huaytara, Huaytara",
      "buscador_ubigeo": "huaytara huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3487",
      "nombre_ubigeo": "Laramarca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Laramarca, Huaytara",
      "buscador_ubigeo": "laramarca huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3488",
      "nombre_ubigeo": "Ocoyo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ocoyo, Huaytara",
      "buscador_ubigeo": "ocoyo huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3489",
      "nombre_ubigeo": "Pilpichaca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pilpichaca, Huaytara",
      "buscador_ubigeo": "pilpichaca huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3490",
      "nombre_ubigeo": "Querco",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Querco, Huaytara",
      "buscador_ubigeo": "querco huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3491",
      "nombre_ubigeo": "Quito-Arma",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Quito-Arma, Huaytara",
      "buscador_ubigeo": "quito-arma huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3492",
      "nombre_ubigeo": "San Antonio de Cusicancha",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Antonio de Cusicancha, Huaytara",
      "buscador_ubigeo": "san antonio de cusicancha huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3493",
      "nombre_ubigeo": "San Francisco de Sangayaico",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Francisco de Sangayaico, Huaytara",
      "buscador_ubigeo": "san francisco de sangayaico huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3494",
      "nombre_ubigeo": "San Isidro",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "San Isidro, Huaytara",
      "buscador_ubigeo": "san isidro huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3495",
      "nombre_ubigeo": "Santiago de Chocorvos",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Santiago de Chocorvos, Huaytara",
      "buscador_ubigeo": "santiago de chocorvos huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3496",
      "nombre_ubigeo": "Santiago de Quirahuara",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Santiago de Quirahuara, Huaytara",
      "buscador_ubigeo": "santiago de quirahuara huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3497",
      "nombre_ubigeo": "Santo Domingo de Capillas",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Santo Domingo de Capillas, Huaytara",
      "buscador_ubigeo": "santo domingo de capillas huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }, {
      "id_ubigeo": "3498",
      "nombre_ubigeo": "Tambo",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Tambo, Huaytara",
      "buscador_ubigeo": "tambo huaytara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3482"
    }],
    "3499": [{
      "id_ubigeo": "3501",
      "nombre_ubigeo": "Acostambo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acostambo, Tayacaja",
      "buscador_ubigeo": "acostambo tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3502",
      "nombre_ubigeo": "Acraquia",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Acraquia, Tayacaja",
      "buscador_ubigeo": "acraquia tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3503",
      "nombre_ubigeo": "Ahuaycha",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ahuaycha, Tayacaja",
      "buscador_ubigeo": "ahuaycha tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3504",
      "nombre_ubigeo": "Colcabamba",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Colcabamba, Tayacaja",
      "buscador_ubigeo": "colcabamba tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3505",
      "nombre_ubigeo": "Daniel Hernandez",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Daniel Hernandez, Tayacaja",
      "buscador_ubigeo": "daniel hernandez tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3506",
      "nombre_ubigeo": "Huachocolpa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huachocolpa, Tayacaja",
      "buscador_ubigeo": "huachocolpa tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3507",
      "nombre_ubigeo": "Huando",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huando, Tayacaja",
      "buscador_ubigeo": "huando tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3508",
      "nombre_ubigeo": "Huaribamba",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huaribamba, Tayacaja",
      "buscador_ubigeo": "huaribamba tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3511",
      "nombre_ubigeo": "Pachamarca",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Pachamarca, Tayacaja",
      "buscador_ubigeo": "pachamarca tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3500",
      "nombre_ubigeo": "Pampas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pampas, Tayacaja",
      "buscador_ubigeo": "pampas tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3510",
      "nombre_ubigeo": "Pazos",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Pazos, Tayacaja",
      "buscador_ubigeo": "pazos tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3509",
      "nombre_ubigeo": "Qahuimpuquio",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Qahuimpuquio, Tayacaja",
      "buscador_ubigeo": "qahuimpuquio tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3512",
      "nombre_ubigeo": "Quishuar",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Quishuar, Tayacaja",
      "buscador_ubigeo": "quishuar tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3513",
      "nombre_ubigeo": "Salcabamba",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Salcabamba, Tayacaja",
      "buscador_ubigeo": "salcabamba tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3514",
      "nombre_ubigeo": "Salcahuasi",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Salcahuasi, Tayacaja",
      "buscador_ubigeo": "salcahuasi tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3515",
      "nombre_ubigeo": "San Marcos de Rocchac",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "San Marcos de Rocchac, Tayacaja",
      "buscador_ubigeo": "san marcos de rocchac tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3516",
      "nombre_ubigeo": "Surcubamba",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Surcubamba, Tayacaja",
      "buscador_ubigeo": "surcubamba tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }, {
      "id_ubigeo": "3517",
      "nombre_ubigeo": "Tintay Puncu",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Tintay Puncu, Tayacaja",
      "buscador_ubigeo": "tintay puncu tayacaja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3499"
    }],
    "3531": [{
      "id_ubigeo": "3532",
      "nombre_ubigeo": "Ambo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ambo, Ambo",
      "buscador_ubigeo": "ambo ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3533",
      "nombre_ubigeo": "Cayna",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cayna, Ambo",
      "buscador_ubigeo": "cayna ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3534",
      "nombre_ubigeo": "Colpas",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Colpas, Ambo",
      "buscador_ubigeo": "colpas ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3535",
      "nombre_ubigeo": "Conchamarca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Conchamarca, Ambo",
      "buscador_ubigeo": "conchamarca ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3536",
      "nombre_ubigeo": "Huacar",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huacar, Ambo",
      "buscador_ubigeo": "huacar ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3537",
      "nombre_ubigeo": "San Francisco",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Francisco, Ambo",
      "buscador_ubigeo": "san francisco ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3538",
      "nombre_ubigeo": "San Rafael",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Rafael, Ambo",
      "buscador_ubigeo": "san rafael ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }, {
      "id_ubigeo": "3539",
      "nombre_ubigeo": "Tomay Kichwa",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Tomay Kichwa, Ambo",
      "buscador_ubigeo": "tomay kichwa ambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3531"
    }],
    "3540": [{
      "id_ubigeo": "3542",
      "nombre_ubigeo": "Chuquis",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Chuquis, Dos de Mayo",
      "buscador_ubigeo": "chuquis dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3541",
      "nombre_ubigeo": "La Union",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "La Union, Dos de Mayo",
      "buscador_ubigeo": "la union dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3543",
      "nombre_ubigeo": "Marias",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Marias, Dos de Mayo",
      "buscador_ubigeo": "marias dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3544",
      "nombre_ubigeo": "Pachas",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Pachas, Dos de Mayo",
      "buscador_ubigeo": "pachas dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3545",
      "nombre_ubigeo": "Quivilla",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Quivilla, Dos de Mayo",
      "buscador_ubigeo": "quivilla dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3546",
      "nombre_ubigeo": "Ripan",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Ripan, Dos de Mayo",
      "buscador_ubigeo": "ripan dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3547",
      "nombre_ubigeo": "Shunqui",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Shunqui, Dos de Mayo",
      "buscador_ubigeo": "shunqui dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3548",
      "nombre_ubigeo": "Sillapata",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Sillapata, Dos de Mayo",
      "buscador_ubigeo": "sillapata dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }, {
      "id_ubigeo": "3549",
      "nombre_ubigeo": "Yanas",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "Yanas, Dos de Mayo",
      "buscador_ubigeo": "yanas dos de mayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3540"
    }],
    "3550": [{
      "id_ubigeo": "3552",
      "nombre_ubigeo": "Canchabamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Canchabamba, Huacaybamba",
      "buscador_ubigeo": "canchabamba huacaybamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3550"
    }, {
      "id_ubigeo": "3553",
      "nombre_ubigeo": "Cochabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cochabamba, Huacaybamba",
      "buscador_ubigeo": "cochabamba huacaybamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3550"
    }, {
      "id_ubigeo": "3551",
      "nombre_ubigeo": "Huacaybamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huacaybamba, Huacaybamba",
      "buscador_ubigeo": "huacaybamba huacaybamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3550"
    }, {
      "id_ubigeo": "3554",
      "nombre_ubigeo": "Pinra",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pinra, Huacaybamba",
      "buscador_ubigeo": "pinra huacaybamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3550"
    }],
    "3555": [{
      "id_ubigeo": "3557",
      "nombre_ubigeo": "Arancay",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Arancay, Huamalies",
      "buscador_ubigeo": "arancay huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3558",
      "nombre_ubigeo": "Chavin de Pariarca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chavin de Pariarca, Huamalies",
      "buscador_ubigeo": "chavin de pariarca huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3559",
      "nombre_ubigeo": "Jacas Grande",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Jacas Grande, Huamalies",
      "buscador_ubigeo": "jacas grande huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3560",
      "nombre_ubigeo": "Jircan",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Jircan, Huamalies",
      "buscador_ubigeo": "jircan huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3556",
      "nombre_ubigeo": "Llata",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Llata, Huamalies",
      "buscador_ubigeo": "llata huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3561",
      "nombre_ubigeo": "Miraflores",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Miraflores, Huamalies",
      "buscador_ubigeo": "miraflores huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3562",
      "nombre_ubigeo": "Monzon",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Monzon, Huamalies",
      "buscador_ubigeo": "monzon huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3563",
      "nombre_ubigeo": "Punchao",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Punchao, Huamalies",
      "buscador_ubigeo": "punchao huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3564",
      "nombre_ubigeo": "Puqos",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Puqos, Huamalies",
      "buscador_ubigeo": "puqos huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3565",
      "nombre_ubigeo": "Singa",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Singa, Huamalies",
      "buscador_ubigeo": "singa huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }, {
      "id_ubigeo": "3566",
      "nombre_ubigeo": "Tantamayo",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Tantamayo, Huamalies",
      "buscador_ubigeo": "tantamayo huamalies",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3555"
    }],
    "3519": [{
      "id_ubigeo": "3521",
      "nombre_ubigeo": "Amarilis",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Amarilis, Huanuco",
      "buscador_ubigeo": "amarilis huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3522",
      "nombre_ubigeo": "Chinchao",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chinchao, Huanuco",
      "buscador_ubigeo": "chinchao huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3523",
      "nombre_ubigeo": "Churubamba",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Churubamba, Huanuco",
      "buscador_ubigeo": "churubamba huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3520",
      "nombre_ubigeo": "Huanuco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huanuco, Huanuco",
      "buscador_ubigeo": "huanuco huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3524",
      "nombre_ubigeo": "Margos",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Margos, Huanuco",
      "buscador_ubigeo": "margos huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3530",
      "nombre_ubigeo": "Pillcomarca",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Pillcomarca, Huanuco",
      "buscador_ubigeo": "pillcomarca huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3525",
      "nombre_ubigeo": "Quisqui",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Quisqui, Huanuco",
      "buscador_ubigeo": "quisqui huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3526",
      "nombre_ubigeo": "San Francisco de Cayran",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Francisco de Cayran, Huanuco",
      "buscador_ubigeo": "san francisco de cayran huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3527",
      "nombre_ubigeo": "San Pedro de Chaulan",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Pedro de Chaulan, Huanuco",
      "buscador_ubigeo": "san pedro de chaulan huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3528",
      "nombre_ubigeo": "Santa Maria del Valle",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Santa Maria del Valle, Huanuco",
      "buscador_ubigeo": "santa maria del valle huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }, {
      "id_ubigeo": "3529",
      "nombre_ubigeo": "Yarumayo",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Yarumayo, Huanuco",
      "buscador_ubigeo": "yarumayo huanuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3519"
    }],
    "3589": [{
      "id_ubigeo": "3591",
      "nombre_ubigeo": "Baqos",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Baqos, Lauricocha",
      "buscador_ubigeo": "baqos lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }, {
      "id_ubigeo": "3590",
      "nombre_ubigeo": "Jesus",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Jesus, Lauricocha",
      "buscador_ubigeo": "jesus lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }, {
      "id_ubigeo": "3592",
      "nombre_ubigeo": "Jivia",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Jivia, Lauricocha",
      "buscador_ubigeo": "jivia lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }, {
      "id_ubigeo": "3593",
      "nombre_ubigeo": "Queropalca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Queropalca, Lauricocha",
      "buscador_ubigeo": "queropalca lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }, {
      "id_ubigeo": "3594",
      "nombre_ubigeo": "Rondos",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Rondos, Lauricocha",
      "buscador_ubigeo": "rondos lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }, {
      "id_ubigeo": "3595",
      "nombre_ubigeo": "San Francisco de Asis",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Francisco de Asis, Lauricocha",
      "buscador_ubigeo": "san francisco de asis lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }, {
      "id_ubigeo": "3596",
      "nombre_ubigeo": "San Miguel de Cauri",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Miguel de Cauri, Lauricocha",
      "buscador_ubigeo": "san miguel de cauri lauricocha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3589"
    }],
    "3567": [{
      "id_ubigeo": "3569",
      "nombre_ubigeo": "Daniel Alomias Robles",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Daniel Alomias Robles, Leoncio Prado",
      "buscador_ubigeo": "daniel alomias robles leoncio prado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3567"
    }, {
      "id_ubigeo": "3570",
      "nombre_ubigeo": "Hermilio Valdizan",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Hermilio Valdizan, Leoncio Prado",
      "buscador_ubigeo": "hermilio valdizan leoncio prado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3567"
    }, {
      "id_ubigeo": "3571",
      "nombre_ubigeo": "Jose Crespo y Castillo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Jose Crespo y Castillo, Leoncio Prado",
      "buscador_ubigeo": "jose crespo y castillo leoncio prado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3567"
    }, {
      "id_ubigeo": "3572",
      "nombre_ubigeo": "Luyando",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Luyando, Leoncio Prado",
      "buscador_ubigeo": "luyando leoncio prado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3567"
    }, {
      "id_ubigeo": "3573",
      "nombre_ubigeo": "Mariano Damaso Beraun",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Mariano Damaso Beraun, Leoncio Prado",
      "buscador_ubigeo": "mariano damaso beraun leoncio prado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3567"
    }, {
      "id_ubigeo": "3568",
      "nombre_ubigeo": "Rupa-Rupa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Rupa-Rupa, Leoncio Prado",
      "buscador_ubigeo": "rupa-rupa leoncio prado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3567"
    }],
    "3574": [{
      "id_ubigeo": "3576",
      "nombre_ubigeo": "Cholon",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cholon, Maraqon",
      "buscador_ubigeo": "cholon maraqon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3574"
    }, {
      "id_ubigeo": "3575",
      "nombre_ubigeo": "Huacrachuco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huacrachuco, Maraqon",
      "buscador_ubigeo": "huacrachuco maraqon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3574"
    }, {
      "id_ubigeo": "3577",
      "nombre_ubigeo": "San Buenaventura",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "San Buenaventura, Maraqon",
      "buscador_ubigeo": "san buenaventura maraqon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3574"
    }],
    "3578": [{
      "id_ubigeo": "3580",
      "nombre_ubigeo": "Chaglla",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chaglla, Pachitea",
      "buscador_ubigeo": "chaglla pachitea",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3578"
    }, {
      "id_ubigeo": "3581",
      "nombre_ubigeo": "Molino",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Molino, Pachitea",
      "buscador_ubigeo": "molino pachitea",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3578"
    }, {
      "id_ubigeo": "3579",
      "nombre_ubigeo": "Panao",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Panao, Pachitea",
      "buscador_ubigeo": "panao pachitea",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3578"
    }, {
      "id_ubigeo": "3582",
      "nombre_ubigeo": "Umari",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Umari, Pachitea",
      "buscador_ubigeo": "umari pachitea",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3578"
    }],
    "3583": [{
      "id_ubigeo": "3585",
      "nombre_ubigeo": "Codo del Pozuzo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Codo del Pozuzo, Puerto Inca",
      "buscador_ubigeo": "codo del pozuzo puerto inca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3583"
    }, {
      "id_ubigeo": "3586",
      "nombre_ubigeo": "Honoria",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Honoria, Puerto Inca",
      "buscador_ubigeo": "honoria puerto inca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3583"
    }, {
      "id_ubigeo": "3584",
      "nombre_ubigeo": "Puerto Inca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Puerto Inca, Puerto Inca",
      "buscador_ubigeo": "puerto inca puerto inca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3583"
    }, {
      "id_ubigeo": "3587",
      "nombre_ubigeo": "Tournavista",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Tournavista, Puerto Inca",
      "buscador_ubigeo": "tournavista puerto inca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3583"
    }, {
      "id_ubigeo": "3588",
      "nombre_ubigeo": "Yuyapichis",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Yuyapichis, Puerto Inca",
      "buscador_ubigeo": "yuyapichis puerto inca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3583"
    }],
    "3597": [{
      "id_ubigeo": "3599",
      "nombre_ubigeo": "Cahuac",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cahuac, Yarowilca",
      "buscador_ubigeo": "cahuac yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3600",
      "nombre_ubigeo": "Chacabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chacabamba, Yarowilca",
      "buscador_ubigeo": "chacabamba yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3598",
      "nombre_ubigeo": "Chavinillo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chavinillo, Yarowilca",
      "buscador_ubigeo": "chavinillo yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3605",
      "nombre_ubigeo": "Choras",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Choras, Yarowilca",
      "buscador_ubigeo": "choras yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3601",
      "nombre_ubigeo": "Chupan",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chupan, Yarowilca",
      "buscador_ubigeo": "chupan yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3602",
      "nombre_ubigeo": "Jacas Chico",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Jacas Chico, Yarowilca",
      "buscador_ubigeo": "jacas chico yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3603",
      "nombre_ubigeo": "Obas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Obas, Yarowilca",
      "buscador_ubigeo": "obas yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }, {
      "id_ubigeo": "3604",
      "nombre_ubigeo": "Pampamarca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pampamarca, Yarowilca",
      "buscador_ubigeo": "pampamarca yarowilca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3597"
    }],
    "3622": [{
      "id_ubigeo": "3624",
      "nombre_ubigeo": "Alto Laran",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Laran, Chincha",
      "buscador_ubigeo": "alto laran chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3625",
      "nombre_ubigeo": "Chavin",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chavin, Chincha",
      "buscador_ubigeo": "chavin chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3623",
      "nombre_ubigeo": "Chincha Alta",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chincha Alta, Chincha",
      "buscador_ubigeo": "chincha alta chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3626",
      "nombre_ubigeo": "Chincha Baja",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chincha Baja, Chincha",
      "buscador_ubigeo": "chincha baja chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3627",
      "nombre_ubigeo": "El Carmen",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "El Carmen, Chincha",
      "buscador_ubigeo": "el carmen chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3628",
      "nombre_ubigeo": "Grocio Prado",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Grocio Prado, Chincha",
      "buscador_ubigeo": "grocio prado chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3629",
      "nombre_ubigeo": "Pueblo Nuevo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pueblo Nuevo, Chincha",
      "buscador_ubigeo": "pueblo nuevo chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3630",
      "nombre_ubigeo": "San Juan de Yanac",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Juan de Yanac, Chincha",
      "buscador_ubigeo": "san juan de yanac chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3631",
      "nombre_ubigeo": "San Pedro de Huacarpana",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Pedro de Huacarpana, Chincha",
      "buscador_ubigeo": "san pedro de huacarpana chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3632",
      "nombre_ubigeo": "Sunampe",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Sunampe, Chincha",
      "buscador_ubigeo": "sunampe chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }, {
      "id_ubigeo": "3633",
      "nombre_ubigeo": "Tambo de Mora",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Tambo de Mora, Chincha",
      "buscador_ubigeo": "tambo de mora chincha",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3622"
    }],
    "3607": [{
      "id_ubigeo": "3608",
      "nombre_ubigeo": "Ica",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ica, Ica",
      "buscador_ubigeo": "ica ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3609",
      "nombre_ubigeo": "La Tinguiqa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "La Tinguiqa, Ica",
      "buscador_ubigeo": "la tinguiqa ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3610",
      "nombre_ubigeo": "Los Aquijes",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Los Aquijes, Ica",
      "buscador_ubigeo": "los aquijes ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3611",
      "nombre_ubigeo": "Ocucaje",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ocucaje, Ica",
      "buscador_ubigeo": "ocucaje ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3612",
      "nombre_ubigeo": "Pachacutec",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pachacutec, Ica",
      "buscador_ubigeo": "pachacutec ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3613",
      "nombre_ubigeo": "Parcona",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Parcona, Ica",
      "buscador_ubigeo": "parcona ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3614",
      "nombre_ubigeo": "Pueblo Nuevo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Pueblo Nuevo, Ica",
      "buscador_ubigeo": "pueblo nuevo ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3615",
      "nombre_ubigeo": "Salas",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Salas, Ica",
      "buscador_ubigeo": "salas ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3616",
      "nombre_ubigeo": "San Jose de los Molinos",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Jose de los Molinos, Ica",
      "buscador_ubigeo": "san jose de los molinos ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3617",
      "nombre_ubigeo": "San Juan Bautista",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "San Juan Bautista, Ica",
      "buscador_ubigeo": "san juan bautista ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3618",
      "nombre_ubigeo": "Santiago",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Santiago, Ica",
      "buscador_ubigeo": "santiago ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3619",
      "nombre_ubigeo": "Subtanjalla",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Subtanjalla, Ica",
      "buscador_ubigeo": "subtanjalla ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3620",
      "nombre_ubigeo": "Tate",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Tate, Ica",
      "buscador_ubigeo": "tate ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }, {
      "id_ubigeo": "3621",
      "nombre_ubigeo": "Yauca del Rosario  1\/",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Yauca del Rosario  1\/, Ica",
      "buscador_ubigeo": "yauca del rosario  1\/ ica",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3607"
    }],
    "3634": [{
      "id_ubigeo": "3636",
      "nombre_ubigeo": "Changuillo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Changuillo, Nazca",
      "buscador_ubigeo": "changuillo nazca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3634"
    }, {
      "id_ubigeo": "3637",
      "nombre_ubigeo": "El Ingenio",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "El Ingenio, Nazca",
      "buscador_ubigeo": "el ingenio nazca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3634"
    }, {
      "id_ubigeo": "3638",
      "nombre_ubigeo": "Marcona",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Marcona, Nazca",
      "buscador_ubigeo": "marcona nazca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3634"
    }, {
      "id_ubigeo": "3635",
      "nombre_ubigeo": "Nazca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Nazca, Nazca",
      "buscador_ubigeo": "nazca nazca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3634"
    }, {
      "id_ubigeo": "3639",
      "nombre_ubigeo": "Vista Alegre",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Vista Alegre, Nazca",
      "buscador_ubigeo": "vista alegre nazca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3634"
    }],
    "3640": [{
      "id_ubigeo": "3642",
      "nombre_ubigeo": "Llipata",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Llipata, Palpa",
      "buscador_ubigeo": "llipata palpa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3640"
    }, {
      "id_ubigeo": "3641",
      "nombre_ubigeo": "Palpa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Palpa, Palpa",
      "buscador_ubigeo": "palpa palpa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3640"
    }, {
      "id_ubigeo": "3643",
      "nombre_ubigeo": "Rio Grande",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Rio Grande, Palpa",
      "buscador_ubigeo": "rio grande palpa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3640"
    }, {
      "id_ubigeo": "3644",
      "nombre_ubigeo": "Santa Cruz",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Santa Cruz, Palpa",
      "buscador_ubigeo": "santa cruz palpa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3640"
    }, {
      "id_ubigeo": "3645",
      "nombre_ubigeo": "Tibillo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Tibillo, Palpa",
      "buscador_ubigeo": "tibillo palpa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3640"
    }],
    "3646": [{
      "id_ubigeo": "3648",
      "nombre_ubigeo": "Huancano",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Huancano, Pisco",
      "buscador_ubigeo": "huancano pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3649",
      "nombre_ubigeo": "Humay",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Humay, Pisco",
      "buscador_ubigeo": "humay pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3650",
      "nombre_ubigeo": "Independencia",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Independencia, Pisco",
      "buscador_ubigeo": "independencia pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3651",
      "nombre_ubigeo": "Paracas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Paracas, Pisco",
      "buscador_ubigeo": "paracas pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3647",
      "nombre_ubigeo": "Pisco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pisco, Pisco",
      "buscador_ubigeo": "pisco pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3652",
      "nombre_ubigeo": "San Andres",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Andres, Pisco",
      "buscador_ubigeo": "san andres pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3653",
      "nombre_ubigeo": "San Clemente",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Clemente, Pisco",
      "buscador_ubigeo": "san clemente pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }, {
      "id_ubigeo": "3654",
      "nombre_ubigeo": "Tupac Amaru Inca",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Tupac Amaru Inca, Pisco",
      "buscador_ubigeo": "tupac amaru inca pisco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3646"
    }],
    "3701": [{
      "id_ubigeo": "3702",
      "nombre_ubigeo": "Chanchamayo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chanchamayo, Chanchamayo",
      "buscador_ubigeo": "chanchamayo chanchamayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3701"
    }, {
      "id_ubigeo": "3703",
      "nombre_ubigeo": "Perene",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Perene, Chanchamayo",
      "buscador_ubigeo": "perene chanchamayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3701"
    }, {
      "id_ubigeo": "3704",
      "nombre_ubigeo": "Pichanaqui",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Pichanaqui, Chanchamayo",
      "buscador_ubigeo": "pichanaqui chanchamayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3701"
    }, {
      "id_ubigeo": "3705",
      "nombre_ubigeo": "San Luis de Shuaro",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "San Luis de Shuaro, Chanchamayo",
      "buscador_ubigeo": "san luis de shuaro chanchamayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3701"
    }, {
      "id_ubigeo": "3706",
      "nombre_ubigeo": "San Ramon",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Ramon, Chanchamayo",
      "buscador_ubigeo": "san ramon chanchamayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3701"
    }, {
      "id_ubigeo": "3707",
      "nombre_ubigeo": "Vitoc",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Vitoc, Chanchamayo",
      "buscador_ubigeo": "vitoc chanchamayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3701"
    }],
    "3778": [{
      "id_ubigeo": "3780",
      "nombre_ubigeo": "Ahuac",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ahuac, Chupaca",
      "buscador_ubigeo": "ahuac chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3781",
      "nombre_ubigeo": "Chongos Bajo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chongos Bajo, Chupaca",
      "buscador_ubigeo": "chongos bajo chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3779",
      "nombre_ubigeo": "Chupaca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chupaca, Chupaca",
      "buscador_ubigeo": "chupaca chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3782",
      "nombre_ubigeo": "Huachac",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huachac, Chupaca",
      "buscador_ubigeo": "huachac chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3783",
      "nombre_ubigeo": "Huamancaca Chico",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huamancaca Chico, Chupaca",
      "buscador_ubigeo": "huamancaca chico chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3784",
      "nombre_ubigeo": "San Juan de Iscos",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Juan de Iscos, Chupaca",
      "buscador_ubigeo": "san juan de iscos chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3785",
      "nombre_ubigeo": "San Juan de Jarpa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Juan de Jarpa, Chupaca",
      "buscador_ubigeo": "san juan de jarpa chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3786",
      "nombre_ubigeo": "Tres de Diciembre",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Tres de Diciembre, Chupaca",
      "buscador_ubigeo": "tres de diciembre chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }, {
      "id_ubigeo": "3787",
      "nombre_ubigeo": "Yanacancha",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Yanacancha, Chupaca",
      "buscador_ubigeo": "yanacancha chupaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3778"
    }],
    "3685": [{
      "id_ubigeo": "3687",
      "nombre_ubigeo": "Aco",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aco, Concepcion",
      "buscador_ubigeo": "aco concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3688",
      "nombre_ubigeo": "Andamarca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Andamarca, Concepcion",
      "buscador_ubigeo": "andamarca concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3689",
      "nombre_ubigeo": "Chambara",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chambara, Concepcion",
      "buscador_ubigeo": "chambara concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3690",
      "nombre_ubigeo": "Cochas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Cochas, Concepcion",
      "buscador_ubigeo": "cochas concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3691",
      "nombre_ubigeo": "Comas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Comas, Concepcion",
      "buscador_ubigeo": "comas concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3686",
      "nombre_ubigeo": "Concepcion",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Concepcion, Concepcion",
      "buscador_ubigeo": "concepcion concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3692",
      "nombre_ubigeo": "Heroinas Toledo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Heroinas Toledo, Concepcion",
      "buscador_ubigeo": "heroinas toledo concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3693",
      "nombre_ubigeo": "Manzanares",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Manzanares, Concepcion",
      "buscador_ubigeo": "manzanares concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3694",
      "nombre_ubigeo": "Mariscal Castilla",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Mariscal Castilla, Concepcion",
      "buscador_ubigeo": "mariscal castilla concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3695",
      "nombre_ubigeo": "Matahuasi",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Matahuasi, Concepcion",
      "buscador_ubigeo": "matahuasi concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3696",
      "nombre_ubigeo": "Mito",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Mito, Concepcion",
      "buscador_ubigeo": "mito concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3697",
      "nombre_ubigeo": "Nueve de Julio",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Nueve de Julio, Concepcion",
      "buscador_ubigeo": "nueve de julio concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3698",
      "nombre_ubigeo": "Orcotuna",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Orcotuna, Concepcion",
      "buscador_ubigeo": "orcotuna concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3699",
      "nombre_ubigeo": "San Jose de Quero",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "San Jose de Quero, Concepcion",
      "buscador_ubigeo": "san jose de quero concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }, {
      "id_ubigeo": "3700",
      "nombre_ubigeo": "Santa Rosa de Ocopa",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Santa Rosa de Ocopa, Concepcion",
      "buscador_ubigeo": "santa rosa de ocopa concepcion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3685"
    }],
    "3656": [{
      "id_ubigeo": "3658",
      "nombre_ubigeo": "Carhuacallanga",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Carhuacallanga, Huancayo",
      "buscador_ubigeo": "carhuacallanga huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3659",
      "nombre_ubigeo": "Chacapampa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chacapampa, Huancayo",
      "buscador_ubigeo": "chacapampa huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3660",
      "nombre_ubigeo": "Chicche",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chicche, Huancayo",
      "buscador_ubigeo": "chicche huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3661",
      "nombre_ubigeo": "Chilca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Chilca, Huancayo",
      "buscador_ubigeo": "chilca huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3662",
      "nombre_ubigeo": "Chongos Alto",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Chongos Alto, Huancayo",
      "buscador_ubigeo": "chongos alto huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3663",
      "nombre_ubigeo": "Chupuro",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Chupuro, Huancayo",
      "buscador_ubigeo": "chupuro huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3664",
      "nombre_ubigeo": "Colca",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Colca, Huancayo",
      "buscador_ubigeo": "colca huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3665",
      "nombre_ubigeo": "Cullhuas",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Cullhuas, Huancayo",
      "buscador_ubigeo": "cullhuas huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3666",
      "nombre_ubigeo": "El Tambo",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "El Tambo, Huancayo",
      "buscador_ubigeo": "el tambo huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3667",
      "nombre_ubigeo": "Huacrapuquio",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Huacrapuquio, Huancayo",
      "buscador_ubigeo": "huacrapuquio huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3668",
      "nombre_ubigeo": "Hualhuas",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Hualhuas, Huancayo",
      "buscador_ubigeo": "hualhuas huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3669",
      "nombre_ubigeo": "Huancan",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Huancan, Huancayo",
      "buscador_ubigeo": "huancan huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3657",
      "nombre_ubigeo": "Huancayo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancayo, Huancayo",
      "buscador_ubigeo": "huancayo huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3670",
      "nombre_ubigeo": "Huasicancha",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Huasicancha, Huancayo",
      "buscador_ubigeo": "huasicancha huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3671",
      "nombre_ubigeo": "Huayucachi",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Huayucachi, Huancayo",
      "buscador_ubigeo": "huayucachi huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3672",
      "nombre_ubigeo": "Ingenio",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Ingenio, Huancayo",
      "buscador_ubigeo": "ingenio huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3673",
      "nombre_ubigeo": "Pariahuanca",
      "codigo_ubigeo": "24",
      "etiqueta_ubigeo": "Pariahuanca, Huancayo",
      "buscador_ubigeo": "pariahuanca huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3674",
      "nombre_ubigeo": "Pilcomayo",
      "codigo_ubigeo": "25",
      "etiqueta_ubigeo": "Pilcomayo, Huancayo",
      "buscador_ubigeo": "pilcomayo huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3675",
      "nombre_ubigeo": "Pucara",
      "codigo_ubigeo": "26",
      "etiqueta_ubigeo": "Pucara, Huancayo",
      "buscador_ubigeo": "pucara huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3676",
      "nombre_ubigeo": "Quichuay",
      "codigo_ubigeo": "27",
      "etiqueta_ubigeo": "Quichuay, Huancayo",
      "buscador_ubigeo": "quichuay huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3677",
      "nombre_ubigeo": "Quilcas",
      "codigo_ubigeo": "28",
      "etiqueta_ubigeo": "Quilcas, Huancayo",
      "buscador_ubigeo": "quilcas huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3678",
      "nombre_ubigeo": "San Agustin",
      "codigo_ubigeo": "29",
      "etiqueta_ubigeo": "San Agustin, Huancayo",
      "buscador_ubigeo": "san agustin huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3679",
      "nombre_ubigeo": "San Jeronimo de Tunan",
      "codigo_ubigeo": "30",
      "etiqueta_ubigeo": "San Jeronimo de Tunan, Huancayo",
      "buscador_ubigeo": "san jeronimo de tunan huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3683",
      "nombre_ubigeo": "Santo Domingo de Acobamba",
      "codigo_ubigeo": "35",
      "etiqueta_ubigeo": "Santo Domingo de Acobamba, Huancayo",
      "buscador_ubigeo": "santo domingo de acobamba huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3681",
      "nombre_ubigeo": "Sapallanga",
      "codigo_ubigeo": "33",
      "etiqueta_ubigeo": "Sapallanga, Huancayo",
      "buscador_ubigeo": "sapallanga huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3680",
      "nombre_ubigeo": "Saqo",
      "codigo_ubigeo": "32",
      "etiqueta_ubigeo": "Saqo, Huancayo",
      "buscador_ubigeo": "saqo huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3682",
      "nombre_ubigeo": "Sicaya",
      "codigo_ubigeo": "34",
      "etiqueta_ubigeo": "Sicaya, Huancayo",
      "buscador_ubigeo": "sicaya huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }, {
      "id_ubigeo": "3684",
      "nombre_ubigeo": "Viques",
      "codigo_ubigeo": "36",
      "etiqueta_ubigeo": "Viques, Huancayo",
      "buscador_ubigeo": "viques huancayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3656"
    }],
    "3708": [{
      "id_ubigeo": "3710",
      "nombre_ubigeo": "Acolla",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acolla, Jauja",
      "buscador_ubigeo": "acolla jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3711",
      "nombre_ubigeo": "Apata",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Apata, Jauja",
      "buscador_ubigeo": "apata jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3712",
      "nombre_ubigeo": "Ataura",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ataura, Jauja",
      "buscador_ubigeo": "ataura jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3713",
      "nombre_ubigeo": "Canchayllo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Canchayllo, Jauja",
      "buscador_ubigeo": "canchayllo jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3714",
      "nombre_ubigeo": "Curicaca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Curicaca, Jauja",
      "buscador_ubigeo": "curicaca jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3715",
      "nombre_ubigeo": "El Mantaro",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "El Mantaro, Jauja",
      "buscador_ubigeo": "el mantaro jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3716",
      "nombre_ubigeo": "Huamali",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huamali, Jauja",
      "buscador_ubigeo": "huamali jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3717",
      "nombre_ubigeo": "Huaripampa",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huaripampa, Jauja",
      "buscador_ubigeo": "huaripampa jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3718",
      "nombre_ubigeo": "Huertas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Huertas, Jauja",
      "buscador_ubigeo": "huertas jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3719",
      "nombre_ubigeo": "Janjaillo",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Janjaillo, Jauja",
      "buscador_ubigeo": "janjaillo jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3709",
      "nombre_ubigeo": "Jauja",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Jauja, Jauja",
      "buscador_ubigeo": "jauja jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3720",
      "nombre_ubigeo": "Julcan",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Julcan, Jauja",
      "buscador_ubigeo": "julcan jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3721",
      "nombre_ubigeo": "Leonor Ordoqez",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Leonor Ordoqez, Jauja",
      "buscador_ubigeo": "leonor ordoqez jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3722",
      "nombre_ubigeo": "Llocllapampa",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Llocllapampa, Jauja",
      "buscador_ubigeo": "llocllapampa jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3723",
      "nombre_ubigeo": "Marco",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Marco, Jauja",
      "buscador_ubigeo": "marco jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3724",
      "nombre_ubigeo": "Masma",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Masma, Jauja",
      "buscador_ubigeo": "masma jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3725",
      "nombre_ubigeo": "Masma Chicche",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Masma Chicche, Jauja",
      "buscador_ubigeo": "masma chicche jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3726",
      "nombre_ubigeo": "Molinos",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Molinos, Jauja",
      "buscador_ubigeo": "molinos jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3727",
      "nombre_ubigeo": "Monobamba",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Monobamba, Jauja",
      "buscador_ubigeo": "monobamba jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3728",
      "nombre_ubigeo": "Muqui",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Muqui, Jauja",
      "buscador_ubigeo": "muqui jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3729",
      "nombre_ubigeo": "Muquiyauyo",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Muquiyauyo, Jauja",
      "buscador_ubigeo": "muquiyauyo jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3730",
      "nombre_ubigeo": "Paca",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Paca, Jauja",
      "buscador_ubigeo": "paca jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3731",
      "nombre_ubigeo": "Paccha",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "Paccha, Jauja",
      "buscador_ubigeo": "paccha jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3732",
      "nombre_ubigeo": "Pancan",
      "codigo_ubigeo": "24",
      "etiqueta_ubigeo": "Pancan, Jauja",
      "buscador_ubigeo": "pancan jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3733",
      "nombre_ubigeo": "Parco",
      "codigo_ubigeo": "25",
      "etiqueta_ubigeo": "Parco, Jauja",
      "buscador_ubigeo": "parco jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3734",
      "nombre_ubigeo": "Pomacancha",
      "codigo_ubigeo": "26",
      "etiqueta_ubigeo": "Pomacancha, Jauja",
      "buscador_ubigeo": "pomacancha jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3735",
      "nombre_ubigeo": "Ricran",
      "codigo_ubigeo": "27",
      "etiqueta_ubigeo": "Ricran, Jauja",
      "buscador_ubigeo": "ricran jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3736",
      "nombre_ubigeo": "San Lorenzo",
      "codigo_ubigeo": "28",
      "etiqueta_ubigeo": "San Lorenzo, Jauja",
      "buscador_ubigeo": "san lorenzo jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3737",
      "nombre_ubigeo": "San Pedro de Chunan",
      "codigo_ubigeo": "29",
      "etiqueta_ubigeo": "San Pedro de Chunan, Jauja",
      "buscador_ubigeo": "san pedro de chunan jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3738",
      "nombre_ubigeo": "Sausa",
      "codigo_ubigeo": "30",
      "etiqueta_ubigeo": "Sausa, Jauja",
      "buscador_ubigeo": "sausa jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3739",
      "nombre_ubigeo": "Sincos",
      "codigo_ubigeo": "31",
      "etiqueta_ubigeo": "Sincos, Jauja",
      "buscador_ubigeo": "sincos jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3740",
      "nombre_ubigeo": "Tunan Marca",
      "codigo_ubigeo": "32",
      "etiqueta_ubigeo": "Tunan Marca, Jauja",
      "buscador_ubigeo": "tunan marca jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3741",
      "nombre_ubigeo": "Yauli",
      "codigo_ubigeo": "33",
      "etiqueta_ubigeo": "Yauli, Jauja",
      "buscador_ubigeo": "yauli jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }, {
      "id_ubigeo": "3742",
      "nombre_ubigeo": "Yauyos",
      "codigo_ubigeo": "34",
      "etiqueta_ubigeo": "Yauyos, Jauja",
      "buscador_ubigeo": "yauyos jauja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3708"
    }],
    "3743": [{
      "id_ubigeo": "3745",
      "nombre_ubigeo": "Carhuamayo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Carhuamayo, Junin",
      "buscador_ubigeo": "carhuamayo junin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3743"
    }, {
      "id_ubigeo": "3744",
      "nombre_ubigeo": "Junin",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Junin, Junin",
      "buscador_ubigeo": "junin junin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3743"
    }, {
      "id_ubigeo": "3746",
      "nombre_ubigeo": "Ondores",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ondores, Junin",
      "buscador_ubigeo": "ondores junin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3743"
    }, {
      "id_ubigeo": "3747",
      "nombre_ubigeo": "Ulcumayo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ulcumayo, Junin",
      "buscador_ubigeo": "ulcumayo junin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3743"
    }],
    "3748": [{
      "id_ubigeo": "3750",
      "nombre_ubigeo": "Coviriali",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Coviriali, Satipo",
      "buscador_ubigeo": "coviriali satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3751",
      "nombre_ubigeo": "Llaylla",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Llaylla, Satipo",
      "buscador_ubigeo": "llaylla satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3752",
      "nombre_ubigeo": "Mazamari",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Mazamari, Satipo",
      "buscador_ubigeo": "mazamari satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3753",
      "nombre_ubigeo": "Pampa Hermosa",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pampa Hermosa, Satipo",
      "buscador_ubigeo": "pampa hermosa satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3754",
      "nombre_ubigeo": "Pangoa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pangoa, Satipo",
      "buscador_ubigeo": "pangoa satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3755",
      "nombre_ubigeo": "Rio Negro",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Rio Negro, Satipo",
      "buscador_ubigeo": "rio negro satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3756",
      "nombre_ubigeo": "Rio Tambo",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Rio Tambo, Satipo",
      "buscador_ubigeo": "rio tambo satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }, {
      "id_ubigeo": "3749",
      "nombre_ubigeo": "Satipo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Satipo, Satipo",
      "buscador_ubigeo": "satipo satipo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3748"
    }],
    "3757": [{
      "id_ubigeo": "3759",
      "nombre_ubigeo": "Acobamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acobamba, Tarma",
      "buscador_ubigeo": "acobamba tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3760",
      "nombre_ubigeo": "Huaricolca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huaricolca, Tarma",
      "buscador_ubigeo": "huaricolca tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3761",
      "nombre_ubigeo": "Huasahuasi",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huasahuasi, Tarma",
      "buscador_ubigeo": "huasahuasi tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3762",
      "nombre_ubigeo": "La Union",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Union, Tarma",
      "buscador_ubigeo": "la union tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3763",
      "nombre_ubigeo": "Palca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Palca, Tarma",
      "buscador_ubigeo": "palca tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3764",
      "nombre_ubigeo": "Palcamayo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Palcamayo, Tarma",
      "buscador_ubigeo": "palcamayo tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3765",
      "nombre_ubigeo": "San Pedro de Cajas",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Pedro de Cajas, Tarma",
      "buscador_ubigeo": "san pedro de cajas tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3766",
      "nombre_ubigeo": "Tapo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Tapo, Tarma",
      "buscador_ubigeo": "tapo tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }, {
      "id_ubigeo": "3758",
      "nombre_ubigeo": "Tarma",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tarma, Tarma",
      "buscador_ubigeo": "tarma tarma",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3757"
    }],
    "3767": [{
      "id_ubigeo": "3769",
      "nombre_ubigeo": "Chacapalpa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chacapalpa, Yauli",
      "buscador_ubigeo": "chacapalpa yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3770",
      "nombre_ubigeo": "Huay-Huay",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huay-Huay, Yauli",
      "buscador_ubigeo": "huay-huay yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3768",
      "nombre_ubigeo": "La Oroya",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "La Oroya, Yauli",
      "buscador_ubigeo": "la oroya yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3771",
      "nombre_ubigeo": "Marcapomacocha",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Marcapomacocha, Yauli",
      "buscador_ubigeo": "marcapomacocha yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3772",
      "nombre_ubigeo": "Morococha",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Morococha, Yauli",
      "buscador_ubigeo": "morococha yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3773",
      "nombre_ubigeo": "Paccha",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Paccha, Yauli",
      "buscador_ubigeo": "paccha yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3774",
      "nombre_ubigeo": "Santa Barbara de Carhuacayan",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Santa Barbara de Carhuacayan, Yauli",
      "buscador_ubigeo": "santa barbara de carhuacayan yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3775",
      "nombre_ubigeo": "Santa Rosa de Sacco",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Santa Rosa de Sacco, Yauli",
      "buscador_ubigeo": "santa rosa de sacco yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3776",
      "nombre_ubigeo": "Suitucancha",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Suitucancha, Yauli",
      "buscador_ubigeo": "suitucancha yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }, {
      "id_ubigeo": "3777",
      "nombre_ubigeo": "Yauli",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Yauli, Yauli",
      "buscador_ubigeo": "yauli yauli",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3767"
    }],
    "3801": [{
      "id_ubigeo": "3802",
      "nombre_ubigeo": "Ascope",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ascope, Ascope",
      "buscador_ubigeo": "ascope ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3809",
      "nombre_ubigeo": "Casa Grande",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Casa Grande, Ascope",
      "buscador_ubigeo": "casa grande ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3803",
      "nombre_ubigeo": "Chicama",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chicama, Ascope",
      "buscador_ubigeo": "chicama ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3804",
      "nombre_ubigeo": "Chocope",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chocope, Ascope",
      "buscador_ubigeo": "chocope ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3805",
      "nombre_ubigeo": "Magdalena de Cao",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Magdalena de Cao, Ascope",
      "buscador_ubigeo": "magdalena de cao ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3806",
      "nombre_ubigeo": "Paijan",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Paijan, Ascope",
      "buscador_ubigeo": "paijan ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3807",
      "nombre_ubigeo": "Razuri",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Razuri, Ascope",
      "buscador_ubigeo": "razuri ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }, {
      "id_ubigeo": "3808",
      "nombre_ubigeo": "Santiago de Cao",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Santiago de Cao, Ascope",
      "buscador_ubigeo": "santiago de cao ascope",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3801"
    }],
    "3810": [{
      "id_ubigeo": "3812",
      "nombre_ubigeo": "Bambamarca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bambamarca, Bolivar",
      "buscador_ubigeo": "bambamarca bolivar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3810"
    }, {
      "id_ubigeo": "3811",
      "nombre_ubigeo": "Bolivar",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Bolivar, Bolivar",
      "buscador_ubigeo": "bolivar bolivar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3810"
    }, {
      "id_ubigeo": "3813",
      "nombre_ubigeo": "Condormarca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Condormarca, Bolivar",
      "buscador_ubigeo": "condormarca bolivar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3810"
    }, {
      "id_ubigeo": "3814",
      "nombre_ubigeo": "Longotea",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Longotea, Bolivar",
      "buscador_ubigeo": "longotea bolivar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3810"
    }, {
      "id_ubigeo": "3815",
      "nombre_ubigeo": "Uchumarca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Uchumarca, Bolivar",
      "buscador_ubigeo": "uchumarca bolivar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3810"
    }, {
      "id_ubigeo": "3816",
      "nombre_ubigeo": "Ucuncha",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ucuncha, Bolivar",
      "buscador_ubigeo": "ucuncha bolivar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3810"
    }],
    "3817": [{
      "id_ubigeo": "3818",
      "nombre_ubigeo": "Chepen",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chepen, Chepen",
      "buscador_ubigeo": "chepen chepen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3817"
    }, {
      "id_ubigeo": "3819",
      "nombre_ubigeo": "Pacanga",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Pacanga, Chepen",
      "buscador_ubigeo": "pacanga chepen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3817"
    }, {
      "id_ubigeo": "3820",
      "nombre_ubigeo": "Pueblo Nuevo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Pueblo Nuevo, Chepen",
      "buscador_ubigeo": "pueblo nuevo chepen",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3817"
    }],
    "3875": [{
      "id_ubigeo": "3876",
      "nombre_ubigeo": "Cascas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cascas, Gran Chimu",
      "buscador_ubigeo": "cascas gran chimu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3875"
    }, {
      "id_ubigeo": "3877",
      "nombre_ubigeo": "Lucma",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Lucma, Gran Chimu",
      "buscador_ubigeo": "lucma gran chimu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3875"
    }, {
      "id_ubigeo": "3878",
      "nombre_ubigeo": "Marmot",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Marmot, Gran Chimu",
      "buscador_ubigeo": "marmot gran chimu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3875"
    }, {
      "id_ubigeo": "3879",
      "nombre_ubigeo": "Sayapullo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Sayapullo, Gran Chimu",
      "buscador_ubigeo": "sayapullo gran chimu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3875"
    }],
    "3821": [{
      "id_ubigeo": "3823",
      "nombre_ubigeo": "Calamarca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Calamarca, Julcan",
      "buscador_ubigeo": "calamarca julcan",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3821"
    }, {
      "id_ubigeo": "3824",
      "nombre_ubigeo": "Carabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Carabamba, Julcan",
      "buscador_ubigeo": "carabamba julcan",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3821"
    }, {
      "id_ubigeo": "3825",
      "nombre_ubigeo": "Huaso",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huaso, Julcan",
      "buscador_ubigeo": "huaso julcan",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3821"
    }, {
      "id_ubigeo": "3822",
      "nombre_ubigeo": "Julcan",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Julcan, Julcan",
      "buscador_ubigeo": "julcan julcan",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3821"
    }],
    "3826": [{
      "id_ubigeo": "3828",
      "nombre_ubigeo": "Agallpampa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Agallpampa, Otuzco",
      "buscador_ubigeo": "agallpampa otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3829",
      "nombre_ubigeo": "Charat",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Charat, Otuzco",
      "buscador_ubigeo": "charat otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3830",
      "nombre_ubigeo": "Huaranchal",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huaranchal, Otuzco",
      "buscador_ubigeo": "huaranchal otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3831",
      "nombre_ubigeo": "La Cuesta",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "La Cuesta, Otuzco",
      "buscador_ubigeo": "la cuesta otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3832",
      "nombre_ubigeo": "Mache",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Mache, Otuzco",
      "buscador_ubigeo": "mache otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3827",
      "nombre_ubigeo": "Otuzco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Otuzco, Otuzco",
      "buscador_ubigeo": "otuzco otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3833",
      "nombre_ubigeo": "Paranday",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Paranday, Otuzco",
      "buscador_ubigeo": "paranday otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3834",
      "nombre_ubigeo": "Salpo",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Salpo, Otuzco",
      "buscador_ubigeo": "salpo otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3835",
      "nombre_ubigeo": "Sinsicap",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Sinsicap, Otuzco",
      "buscador_ubigeo": "sinsicap otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }, {
      "id_ubigeo": "3836",
      "nombre_ubigeo": "Usquil",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Usquil, Otuzco",
      "buscador_ubigeo": "usquil otuzco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3826"
    }],
    "3837": [{
      "id_ubigeo": "3839",
      "nombre_ubigeo": "Guadalupe",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Guadalupe, Pacasmayo",
      "buscador_ubigeo": "guadalupe pacasmayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3837"
    }, {
      "id_ubigeo": "3840",
      "nombre_ubigeo": "Jequetepeque",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Jequetepeque, Pacasmayo",
      "buscador_ubigeo": "jequetepeque pacasmayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3837"
    }, {
      "id_ubigeo": "3841",
      "nombre_ubigeo": "Pacasmayo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pacasmayo, Pacasmayo",
      "buscador_ubigeo": "pacasmayo pacasmayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3837"
    }, {
      "id_ubigeo": "3842",
      "nombre_ubigeo": "San Jose",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Jose, Pacasmayo",
      "buscador_ubigeo": "san jose pacasmayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3837"
    }, {
      "id_ubigeo": "3838",
      "nombre_ubigeo": "San Pedro de Lloc",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Pedro de Lloc, Pacasmayo",
      "buscador_ubigeo": "san pedro de lloc pacasmayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3837"
    }],
    "3843": [{
      "id_ubigeo": "3845",
      "nombre_ubigeo": "Buldibuyo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Buldibuyo, Pataz",
      "buscador_ubigeo": "buldibuyo pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3846",
      "nombre_ubigeo": "Chillia",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chillia, Pataz",
      "buscador_ubigeo": "chillia pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3847",
      "nombre_ubigeo": "Huancaspata",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huancaspata, Pataz",
      "buscador_ubigeo": "huancaspata pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3848",
      "nombre_ubigeo": "Huaylillas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huaylillas, Pataz",
      "buscador_ubigeo": "huaylillas pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3849",
      "nombre_ubigeo": "Huayo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huayo, Pataz",
      "buscador_ubigeo": "huayo pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3850",
      "nombre_ubigeo": "Ongon",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Ongon, Pataz",
      "buscador_ubigeo": "ongon pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3851",
      "nombre_ubigeo": "Parcoy",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Parcoy, Pataz",
      "buscador_ubigeo": "parcoy pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3852",
      "nombre_ubigeo": "Pataz",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Pataz, Pataz",
      "buscador_ubigeo": "pataz pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3853",
      "nombre_ubigeo": "Pias",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Pias, Pataz",
      "buscador_ubigeo": "pias pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3854",
      "nombre_ubigeo": "Santiago de Challas",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Santiago de Challas, Pataz",
      "buscador_ubigeo": "santiago de challas pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3855",
      "nombre_ubigeo": "Taurija",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Taurija, Pataz",
      "buscador_ubigeo": "taurija pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3844",
      "nombre_ubigeo": "Tayabamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tayabamba, Pataz",
      "buscador_ubigeo": "tayabamba pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }, {
      "id_ubigeo": "3856",
      "nombre_ubigeo": "Urpay",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Urpay, Pataz",
      "buscador_ubigeo": "urpay pataz",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3843"
    }],
    "3857": [{
      "id_ubigeo": "3859",
      "nombre_ubigeo": "Chugay",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chugay, Sanchez Carrion",
      "buscador_ubigeo": "chugay sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3860",
      "nombre_ubigeo": "Cochorco",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cochorco, Sanchez Carrion",
      "buscador_ubigeo": "cochorco sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3861",
      "nombre_ubigeo": "Curgos",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Curgos, Sanchez Carrion",
      "buscador_ubigeo": "curgos sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3858",
      "nombre_ubigeo": "Huamachuco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huamachuco, Sanchez Carrion",
      "buscador_ubigeo": "huamachuco sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3862",
      "nombre_ubigeo": "Marcabal",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Marcabal, Sanchez Carrion",
      "buscador_ubigeo": "marcabal sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3863",
      "nombre_ubigeo": "Sanagoran",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Sanagoran, Sanchez Carrion",
      "buscador_ubigeo": "sanagoran sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3864",
      "nombre_ubigeo": "Sarin",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Sarin, Sanchez Carrion",
      "buscador_ubigeo": "sarin sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }, {
      "id_ubigeo": "3865",
      "nombre_ubigeo": "Sartimbamba",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Sartimbamba, Sanchez Carrion",
      "buscador_ubigeo": "sartimbamba sanchez carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3857"
    }],
    "3866": [{
      "id_ubigeo": "3868",
      "nombre_ubigeo": "Angasmarca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Angasmarca, Santiago de Chuco",
      "buscador_ubigeo": "angasmarca santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3869",
      "nombre_ubigeo": "Cachicadan",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cachicadan, Santiago de Chuco",
      "buscador_ubigeo": "cachicadan santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3870",
      "nombre_ubigeo": "Mollebamba",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Mollebamba, Santiago de Chuco",
      "buscador_ubigeo": "mollebamba santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3871",
      "nombre_ubigeo": "Mollepata",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mollepata, Santiago de Chuco",
      "buscador_ubigeo": "mollepata santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3872",
      "nombre_ubigeo": "Quiruvilca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Quiruvilca, Santiago de Chuco",
      "buscador_ubigeo": "quiruvilca santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3873",
      "nombre_ubigeo": "Santa Cruz de Chuca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Santa Cruz de Chuca, Santiago de Chuco",
      "buscador_ubigeo": "santa cruz de chuca santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3867",
      "nombre_ubigeo": "Santiago de Chuco",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Santiago de Chuco, Santiago de Chuco",
      "buscador_ubigeo": "santiago de chuco santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }, {
      "id_ubigeo": "3874",
      "nombre_ubigeo": "Sitabamba",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Sitabamba, Santiago de Chuco",
      "buscador_ubigeo": "sitabamba santiago de chuco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3866"
    }],
    "3789": [{
      "id_ubigeo": "3791",
      "nombre_ubigeo": "El Porvenir",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "El Porvenir, Trujillo",
      "buscador_ubigeo": "el porvenir trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3792",
      "nombre_ubigeo": "Florencia de Mora",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Florencia de Mora, Trujillo",
      "buscador_ubigeo": "florencia de mora trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3793",
      "nombre_ubigeo": "Huanchaco",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huanchaco, Trujillo",
      "buscador_ubigeo": "huanchaco trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3794",
      "nombre_ubigeo": "La Esperanza",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Esperanza, Trujillo",
      "buscador_ubigeo": "la esperanza trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3795",
      "nombre_ubigeo": "Laredo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Laredo, Trujillo",
      "buscador_ubigeo": "laredo trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3796",
      "nombre_ubigeo": "Moche",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Moche, Trujillo",
      "buscador_ubigeo": "moche trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3797",
      "nombre_ubigeo": "Poroto",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Poroto, Trujillo",
      "buscador_ubigeo": "poroto trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3798",
      "nombre_ubigeo": "Salaverry",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Salaverry, Trujillo",
      "buscador_ubigeo": "salaverry trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3799",
      "nombre_ubigeo": "Simbal",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Simbal, Trujillo",
      "buscador_ubigeo": "simbal trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3790",
      "nombre_ubigeo": "Trujillo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Trujillo, Trujillo",
      "buscador_ubigeo": "trujillo trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }, {
      "id_ubigeo": "3800",
      "nombre_ubigeo": "Victor Larco Herrera",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Victor Larco Herrera, Trujillo",
      "buscador_ubigeo": "victor larco herrera trujillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3789"
    }],
    "3880": [{
      "id_ubigeo": "3882",
      "nombre_ubigeo": "Chao",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chao, Viru",
      "buscador_ubigeo": "chao viru",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3880"
    }, {
      "id_ubigeo": "3883",
      "nombre_ubigeo": "Guadalupito",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Guadalupito, Viru",
      "buscador_ubigeo": "guadalupito viru",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3880"
    }, {
      "id_ubigeo": "3881",
      "nombre_ubigeo": "Viru",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Viru, Viru",
      "buscador_ubigeo": "viru viru",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3880"
    }],
    "3885": [{
      "id_ubigeo": "3901",
      "nombre_ubigeo": "Cayalt\u00ed",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Cayalt\u00ed, Chiclayo",
      "buscador_ubigeo": "cayalt\u00ed chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3886",
      "nombre_ubigeo": "Chiclayo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chiclayo, Chiclayo",
      "buscador_ubigeo": "chiclayo chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3887",
      "nombre_ubigeo": "Chongoyape",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chongoyape, Chiclayo",
      "buscador_ubigeo": "chongoyape chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3888",
      "nombre_ubigeo": "Eten",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Eten, Chiclayo",
      "buscador_ubigeo": "eten chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3889",
      "nombre_ubigeo": "Eten Puerto",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Eten Puerto, Chiclayo",
      "buscador_ubigeo": "eten puerto chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3890",
      "nombre_ubigeo": "Jose Leonardo Ortiz",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Jose Leonardo Ortiz, Chiclayo",
      "buscador_ubigeo": "jose leonardo ortiz chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3891",
      "nombre_ubigeo": "La Victoria",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "La Victoria, Chiclayo",
      "buscador_ubigeo": "la victoria chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3892",
      "nombre_ubigeo": "Lagunas",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Lagunas, Chiclayo",
      "buscador_ubigeo": "lagunas chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3893",
      "nombre_ubigeo": "Monsefu",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Monsefu, Chiclayo",
      "buscador_ubigeo": "monsefu chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3894",
      "nombre_ubigeo": "Nueva Arica",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Nueva Arica, Chiclayo",
      "buscador_ubigeo": "nueva arica chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3895",
      "nombre_ubigeo": "Oyotun",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Oyotun, Chiclayo",
      "buscador_ubigeo": "oyotun chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3902",
      "nombre_ubigeo": "Patapo",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Patapo, Chiclayo",
      "buscador_ubigeo": "patapo chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3896",
      "nombre_ubigeo": "Picsi",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Picsi, Chiclayo",
      "buscador_ubigeo": "picsi chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3897",
      "nombre_ubigeo": "Pimentel",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Pimentel, Chiclayo",
      "buscador_ubigeo": "pimentel chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3903",
      "nombre_ubigeo": "Pomalca",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Pomalca, Chiclayo",
      "buscador_ubigeo": "pomalca chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3904",
      "nombre_ubigeo": "Pucal\u00e1",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Pucal\u00e1, Chiclayo",
      "buscador_ubigeo": "pucal\u00e1 chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3898",
      "nombre_ubigeo": "Reque",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Reque, Chiclayo",
      "buscador_ubigeo": "reque chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3899",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Santa Rosa, Chiclayo",
      "buscador_ubigeo": "santa rosa chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3900",
      "nombre_ubigeo": "Saqa",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Saqa, Chiclayo",
      "buscador_ubigeo": "saqa chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }, {
      "id_ubigeo": "3905",
      "nombre_ubigeo": "Tum\u00e1n",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Tum\u00e1n, Chiclayo",
      "buscador_ubigeo": "tum\u00e1n chiclayo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3885"
    }],
    "3906": [{
      "id_ubigeo": "3908",
      "nombre_ubigeo": "Caqaris",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Caqaris, Ferreqafe",
      "buscador_ubigeo": "caqaris ferreqafe",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3906"
    }, {
      "id_ubigeo": "3907",
      "nombre_ubigeo": "Ferreqafe",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ferreqafe, Ferreqafe",
      "buscador_ubigeo": "ferreqafe ferreqafe",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3906"
    }, {
      "id_ubigeo": "3909",
      "nombre_ubigeo": "Incahuasi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Incahuasi, Ferreqafe",
      "buscador_ubigeo": "incahuasi ferreqafe",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3906"
    }, {
      "id_ubigeo": "3910",
      "nombre_ubigeo": "Manuel Antonio Mesones Muro",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Manuel Antonio Mesones Muro, Ferreqafe",
      "buscador_ubigeo": "manuel antonio mesones muro ferreqafe",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3906"
    }, {
      "id_ubigeo": "3911",
      "nombre_ubigeo": "Pitipo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pitipo, Ferreqafe",
      "buscador_ubigeo": "pitipo ferreqafe",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3906"
    }, {
      "id_ubigeo": "3912",
      "nombre_ubigeo": "Pueblo Nuevo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pueblo Nuevo, Ferreqafe",
      "buscador_ubigeo": "pueblo nuevo ferreqafe",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3906"
    }],
    "3913": [{
      "id_ubigeo": "3915",
      "nombre_ubigeo": "Chochope",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chochope, Lambayeque",
      "buscador_ubigeo": "chochope lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3916",
      "nombre_ubigeo": "Illimo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Illimo, Lambayeque",
      "buscador_ubigeo": "illimo lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3917",
      "nombre_ubigeo": "Jayanca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Jayanca, Lambayeque",
      "buscador_ubigeo": "jayanca lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3914",
      "nombre_ubigeo": "Lambayeque",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Lambayeque, Lambayeque",
      "buscador_ubigeo": "lambayeque lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3918",
      "nombre_ubigeo": "Mochumi",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Mochumi, Lambayeque",
      "buscador_ubigeo": "mochumi lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3919",
      "nombre_ubigeo": "Morrope",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Morrope, Lambayeque",
      "buscador_ubigeo": "morrope lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3920",
      "nombre_ubigeo": "Motupe",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Motupe, Lambayeque",
      "buscador_ubigeo": "motupe lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3921",
      "nombre_ubigeo": "Olmos",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Olmos, Lambayeque",
      "buscador_ubigeo": "olmos lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3922",
      "nombre_ubigeo": "Pacora",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Pacora, Lambayeque",
      "buscador_ubigeo": "pacora lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3923",
      "nombre_ubigeo": "Salas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Salas, Lambayeque",
      "buscador_ubigeo": "salas lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3924",
      "nombre_ubigeo": "San Jose",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Jose, Lambayeque",
      "buscador_ubigeo": "san jose lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }, {
      "id_ubigeo": "3925",
      "nombre_ubigeo": "Tucume",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Tucume, Lambayeque",
      "buscador_ubigeo": "tucume lambayeque",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3913"
    }],
    "3971": [{
      "id_ubigeo": "3972",
      "nombre_ubigeo": "Barranca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Barranca, Barranca",
      "buscador_ubigeo": "barranca barranca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3971"
    }, {
      "id_ubigeo": "3973",
      "nombre_ubigeo": "Paramonga",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Paramonga, Barranca",
      "buscador_ubigeo": "paramonga barranca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3971"
    }, {
      "id_ubigeo": "3974",
      "nombre_ubigeo": "Pativilca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Pativilca, Barranca",
      "buscador_ubigeo": "pativilca barranca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3971"
    }, {
      "id_ubigeo": "3975",
      "nombre_ubigeo": "Supe",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Supe, Barranca",
      "buscador_ubigeo": "supe barranca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3971"
    }, {
      "id_ubigeo": "3976",
      "nombre_ubigeo": "Supe Puerto",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Supe Puerto, Barranca",
      "buscador_ubigeo": "supe puerto barranca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3971"
    }],
    "3977": [{
      "id_ubigeo": "3978",
      "nombre_ubigeo": "Cajatambo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cajatambo, Cajatambo",
      "buscador_ubigeo": "cajatambo cajatambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3977"
    }, {
      "id_ubigeo": "3979",
      "nombre_ubigeo": "Copa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Copa, Cajatambo",
      "buscador_ubigeo": "copa cajatambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3977"
    }, {
      "id_ubigeo": "3980",
      "nombre_ubigeo": "Gorgor",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Gorgor, Cajatambo",
      "buscador_ubigeo": "gorgor cajatambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3977"
    }, {
      "id_ubigeo": "3981",
      "nombre_ubigeo": "Huancapon",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huancapon, Cajatambo",
      "buscador_ubigeo": "huancapon cajatambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3977"
    }, {
      "id_ubigeo": "3982",
      "nombre_ubigeo": "Manas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Manas, Cajatambo",
      "buscador_ubigeo": "manas cajatambo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3977"
    }],
    "3285": [{
      "id_ubigeo": "3287",
      "nombre_ubigeo": "Bellavista",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bellavista, Callao",
      "buscador_ubigeo": "bellavista callao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3285"
    }, {
      "id_ubigeo": "3286",
      "nombre_ubigeo": "Callao",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Callao, Callao",
      "buscador_ubigeo": "callao callao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3285"
    }, {
      "id_ubigeo": "3288",
      "nombre_ubigeo": "Carmen de la Legua Reynoso",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Carmen de la Legua Reynoso, Callao",
      "buscador_ubigeo": "carmen de la legua reynoso callao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3285"
    }, {
      "id_ubigeo": "3289",
      "nombre_ubigeo": "La Perla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "La Perla, Callao",
      "buscador_ubigeo": "la perla callao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3285"
    }, {
      "id_ubigeo": "3290",
      "nombre_ubigeo": "La Punta",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Punta, Callao",
      "buscador_ubigeo": "la punta callao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3285"
    }, {
      "id_ubigeo": "3291",
      "nombre_ubigeo": "Ventanilla",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ventanilla, Callao",
      "buscador_ubigeo": "ventanilla callao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3285"
    }],
    "3991": [{
      "id_ubigeo": "3993",
      "nombre_ubigeo": "Asia",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Asia, Caqete",
      "buscador_ubigeo": "asia caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3994",
      "nombre_ubigeo": "Calango",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Calango, Caqete",
      "buscador_ubigeo": "calango caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3995",
      "nombre_ubigeo": "Cerro Azul",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cerro Azul, Caqete",
      "buscador_ubigeo": "cerro azul caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3996",
      "nombre_ubigeo": "Chilca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chilca, Caqete",
      "buscador_ubigeo": "chilca caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3997",
      "nombre_ubigeo": "Coayllo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Coayllo, Caqete",
      "buscador_ubigeo": "coayllo caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3998",
      "nombre_ubigeo": "Imperial",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Imperial, Caqete",
      "buscador_ubigeo": "imperial caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3999",
      "nombre_ubigeo": "Lunahuana",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Lunahuana, Caqete",
      "buscador_ubigeo": "lunahuana caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4000",
      "nombre_ubigeo": "Mala",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Mala, Caqete",
      "buscador_ubigeo": "mala caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4001",
      "nombre_ubigeo": "Nuevo Imperial",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Nuevo Imperial, Caqete",
      "buscador_ubigeo": "nuevo imperial caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4002",
      "nombre_ubigeo": "Pacaran",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Pacaran, Caqete",
      "buscador_ubigeo": "pacaran caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4003",
      "nombre_ubigeo": "Quilmana",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Quilmana, Caqete",
      "buscador_ubigeo": "quilmana caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4004",
      "nombre_ubigeo": "San Antonio",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "San Antonio, Caqete",
      "buscador_ubigeo": "san antonio caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4005",
      "nombre_ubigeo": "San Luis",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "San Luis, Caqete",
      "buscador_ubigeo": "san luis caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "3992",
      "nombre_ubigeo": "San Vicente de Ca\u00f1ete",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Vicente de Ca\u00f1ete, Ca\u00f1ete",
      "buscador_ubigeo": "san vicente de ca\u00f1ete ca\u00f1ete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4006",
      "nombre_ubigeo": "Santa Cruz de Flores",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Santa Cruz de Flores, Caqete",
      "buscador_ubigeo": "santa cruz de flores caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }, {
      "id_ubigeo": "4007",
      "nombre_ubigeo": "Zuqiga",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Zuqiga, Caqete",
      "buscador_ubigeo": "zuqiga caqete",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3991"
    }],
    "3983": [{
      "id_ubigeo": "3985",
      "nombre_ubigeo": "Arahuay",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Arahuay, Canta",
      "buscador_ubigeo": "arahuay canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }, {
      "id_ubigeo": "3984",
      "nombre_ubigeo": "Canta",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Canta, Canta",
      "buscador_ubigeo": "canta canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }, {
      "id_ubigeo": "3986",
      "nombre_ubigeo": "Huamantanga",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huamantanga, Canta",
      "buscador_ubigeo": "huamantanga canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }, {
      "id_ubigeo": "3987",
      "nombre_ubigeo": "Huaros",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huaros, Canta",
      "buscador_ubigeo": "huaros canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }, {
      "id_ubigeo": "3988",
      "nombre_ubigeo": "Lachaqui",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Lachaqui, Canta",
      "buscador_ubigeo": "lachaqui canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }, {
      "id_ubigeo": "3989",
      "nombre_ubigeo": "San Buenaventura",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Buenaventura, Canta",
      "buscador_ubigeo": "san buenaventura canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }, {
      "id_ubigeo": "3990",
      "nombre_ubigeo": "Santa Rosa de Quives",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Santa Rosa de Quives, Canta",
      "buscador_ubigeo": "santa rosa de quives canta",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3983"
    }],
    "4008": [{
      "id_ubigeo": "4010",
      "nombre_ubigeo": "Atavillos Alto",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Atavillos Alto, Huaral",
      "buscador_ubigeo": "atavillos alto huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4011",
      "nombre_ubigeo": "Atavillos Bajo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Atavillos Bajo, Huaral",
      "buscador_ubigeo": "atavillos bajo huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4012",
      "nombre_ubigeo": "Aucallama",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Aucallama, Huaral",
      "buscador_ubigeo": "aucallama huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4013",
      "nombre_ubigeo": "Chancay",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chancay, Huaral",
      "buscador_ubigeo": "chancay huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4009",
      "nombre_ubigeo": "Huaral",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huaral, Huaral",
      "buscador_ubigeo": "huaral huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4014",
      "nombre_ubigeo": "Ihuari",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Ihuari, Huaral",
      "buscador_ubigeo": "ihuari huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4015",
      "nombre_ubigeo": "Lampian",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Lampian, Huaral",
      "buscador_ubigeo": "lampian huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4016",
      "nombre_ubigeo": "Pacaraos",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pacaraos, Huaral",
      "buscador_ubigeo": "pacaraos huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4017",
      "nombre_ubigeo": "San Miguel de Acos",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Miguel de Acos, Huaral",
      "buscador_ubigeo": "san miguel de acos huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4018",
      "nombre_ubigeo": "Santa Cruz de Andamarca",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santa Cruz de Andamarca, Huaral",
      "buscador_ubigeo": "santa cruz de andamarca huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4019",
      "nombre_ubigeo": "Sumbilca",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Sumbilca, Huaral",
      "buscador_ubigeo": "sumbilca huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }, {
      "id_ubigeo": "4020",
      "nombre_ubigeo": "Veintisiete de Noviembre",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Veintisiete de Noviembre, Huaral",
      "buscador_ubigeo": "veintisiete de noviembre huaral",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4008"
    }],
    "4021": [{
      "id_ubigeo": "4023",
      "nombre_ubigeo": "Antioquia",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Antioquia, Huarochiri",
      "buscador_ubigeo": "antioquia huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4024",
      "nombre_ubigeo": "Callahuanca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Callahuanca, Huarochiri",
      "buscador_ubigeo": "callahuanca huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4025",
      "nombre_ubigeo": "Carampoma",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Carampoma, Huarochiri",
      "buscador_ubigeo": "carampoma huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4026",
      "nombre_ubigeo": "Chicla",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chicla, Huarochiri",
      "buscador_ubigeo": "chicla huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4027",
      "nombre_ubigeo": "Cuenca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cuenca, Huarochiri",
      "buscador_ubigeo": "cuenca huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4028",
      "nombre_ubigeo": "Huachupampa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huachupampa, Huarochiri",
      "buscador_ubigeo": "huachupampa huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4029",
      "nombre_ubigeo": "Huanza",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huanza, Huarochiri",
      "buscador_ubigeo": "huanza huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4030",
      "nombre_ubigeo": "Huarochiri",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Huarochiri, Huarochiri",
      "buscador_ubigeo": "huarochiri huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4031",
      "nombre_ubigeo": "Lahuaytambo",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Lahuaytambo, Huarochiri",
      "buscador_ubigeo": "lahuaytambo huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4032",
      "nombre_ubigeo": "Langa",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Langa, Huarochiri",
      "buscador_ubigeo": "langa huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4033",
      "nombre_ubigeo": "Laraos",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Laraos, Huarochiri",
      "buscador_ubigeo": "laraos huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4034",
      "nombre_ubigeo": "Mariatana",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Mariatana, Huarochiri",
      "buscador_ubigeo": "mariatana huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4022",
      "nombre_ubigeo": "Matucana",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Matucana, Huarochiri",
      "buscador_ubigeo": "matucana huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4035",
      "nombre_ubigeo": "Ricardo Palma",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Ricardo Palma, Huarochiri",
      "buscador_ubigeo": "ricardo palma huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4036",
      "nombre_ubigeo": "San Andres de Tupicocha",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "San Andres de Tupicocha, Huarochiri",
      "buscador_ubigeo": "san andres de tupicocha huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4037",
      "nombre_ubigeo": "San Antonio",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "San Antonio, Huarochiri",
      "buscador_ubigeo": "san antonio huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4038",
      "nombre_ubigeo": "San Bartolome",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "San Bartolome, Huarochiri",
      "buscador_ubigeo": "san bartolome huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4039",
      "nombre_ubigeo": "San Damian",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "San Damian, Huarochiri",
      "buscador_ubigeo": "san damian huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4040",
      "nombre_ubigeo": "San Juan de Iris",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "San Juan de Iris, Huarochiri",
      "buscador_ubigeo": "san juan de iris huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4041",
      "nombre_ubigeo": "San Juan de Tantaranche",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "San Juan de Tantaranche, Huarochiri",
      "buscador_ubigeo": "san juan de tantaranche huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4042",
      "nombre_ubigeo": "San Lorenzo de Quinti",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "San Lorenzo de Quinti, Huarochiri",
      "buscador_ubigeo": "san lorenzo de quinti huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4043",
      "nombre_ubigeo": "San Mateo",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "San Mateo, Huarochiri",
      "buscador_ubigeo": "san mateo huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4044",
      "nombre_ubigeo": "San Mateo de Otao",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "San Mateo de Otao, Huarochiri",
      "buscador_ubigeo": "san mateo de otao huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4045",
      "nombre_ubigeo": "San Pedro de Casta",
      "codigo_ubigeo": "24",
      "etiqueta_ubigeo": "San Pedro de Casta, Huarochiri",
      "buscador_ubigeo": "san pedro de casta huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4046",
      "nombre_ubigeo": "San Pedro de Huancayre",
      "codigo_ubigeo": "25",
      "etiqueta_ubigeo": "San Pedro de Huancayre, Huarochiri",
      "buscador_ubigeo": "san pedro de huancayre huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4047",
      "nombre_ubigeo": "Sangallaya",
      "codigo_ubigeo": "26",
      "etiqueta_ubigeo": "Sangallaya, Huarochiri",
      "buscador_ubigeo": "sangallaya huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4048",
      "nombre_ubigeo": "Santa Cruz de Cocachacra",
      "codigo_ubigeo": "27",
      "etiqueta_ubigeo": "Santa Cruz de Cocachacra, Huarochiri",
      "buscador_ubigeo": "santa cruz de cocachacra huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4049",
      "nombre_ubigeo": "Santa Eulalia",
      "codigo_ubigeo": "28",
      "etiqueta_ubigeo": "Santa Eulalia, Huarochiri",
      "buscador_ubigeo": "santa eulalia huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4050",
      "nombre_ubigeo": "Santiago de Anchucaya",
      "codigo_ubigeo": "29",
      "etiqueta_ubigeo": "Santiago de Anchucaya, Huarochiri",
      "buscador_ubigeo": "santiago de anchucaya huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4051",
      "nombre_ubigeo": "Santiago de Tuna",
      "codigo_ubigeo": "30",
      "etiqueta_ubigeo": "Santiago de Tuna, Huarochiri",
      "buscador_ubigeo": "santiago de tuna huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4052",
      "nombre_ubigeo": "Santo Domingo de los Olleros",
      "codigo_ubigeo": "31",
      "etiqueta_ubigeo": "Santo Domingo de los Olleros, Huarochiri",
      "buscador_ubigeo": "santo domingo de los olleros huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }, {
      "id_ubigeo": "4053",
      "nombre_ubigeo": "Surco",
      "codigo_ubigeo": "32",
      "etiqueta_ubigeo": "Surco, Huarochiri",
      "buscador_ubigeo": "surco huarochiri",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4021"
    }],
    "4054": [{
      "id_ubigeo": "4056",
      "nombre_ubigeo": "Ambar",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ambar, Huaura",
      "buscador_ubigeo": "ambar huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4057",
      "nombre_ubigeo": "Caleta de Carquin",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Caleta de Carquin, Huaura",
      "buscador_ubigeo": "caleta de carquin huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4058",
      "nombre_ubigeo": "Checras",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Checras, Huaura",
      "buscador_ubigeo": "checras huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4055",
      "nombre_ubigeo": "Huacho",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huacho, Huaura",
      "buscador_ubigeo": "huacho huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4059",
      "nombre_ubigeo": "Hualmay",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Hualmay, Huaura",
      "buscador_ubigeo": "hualmay huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4060",
      "nombre_ubigeo": "Huaura",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Huaura, Huaura",
      "buscador_ubigeo": "huaura huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4061",
      "nombre_ubigeo": "Leoncio Prado",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Leoncio Prado, Huaura",
      "buscador_ubigeo": "leoncio prado huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4062",
      "nombre_ubigeo": "Paccho",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Paccho, Huaura",
      "buscador_ubigeo": "paccho huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4063",
      "nombre_ubigeo": "Santa Leonor",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Santa Leonor, Huaura",
      "buscador_ubigeo": "santa leonor huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4064",
      "nombre_ubigeo": "Santa Maria",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santa Maria, Huaura",
      "buscador_ubigeo": "santa maria huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4065",
      "nombre_ubigeo": "Sayan",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Sayan, Huaura",
      "buscador_ubigeo": "sayan huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }, {
      "id_ubigeo": "4066",
      "nombre_ubigeo": "Vegueta",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Vegueta, Huaura",
      "buscador_ubigeo": "vegueta huaura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4054"
    }],
    "3927": [{
      "id_ubigeo": "3929",
      "nombre_ubigeo": "Ancon",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ancon, Lima",
      "buscador_ubigeo": "ancon lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3930",
      "nombre_ubigeo": "Ate",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ate, Lima",
      "buscador_ubigeo": "ate lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3931",
      "nombre_ubigeo": "Barranco",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Barranco, Lima",
      "buscador_ubigeo": "barranco lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3932",
      "nombre_ubigeo": "Bre\u00f1a",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Bre\u00f1a, Lima",
      "buscador_ubigeo": "brena lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3933",
      "nombre_ubigeo": "Carabayllo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Carabayllo, Lima",
      "buscador_ubigeo": "carabayllo lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3928",
      "nombre_ubigeo": "Cercado de Lima",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Cercado de Lima, Lima",
      "buscador_ubigeo": "cercado de lima lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3934",
      "nombre_ubigeo": "Chaclacayo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Chaclacayo, Lima",
      "buscador_ubigeo": "chaclacayo lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3935",
      "nombre_ubigeo": "Chorrillos",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Chorrillos, Lima",
      "buscador_ubigeo": "chorrillos lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3936",
      "nombre_ubigeo": "Cieneguilla",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Cieneguilla, Lima",
      "buscador_ubigeo": "cieneguilla lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3937",
      "nombre_ubigeo": "Comas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Comas, Lima",
      "buscador_ubigeo": "comas lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3938",
      "nombre_ubigeo": "El Agustino",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "El Agustino, Lima",
      "buscador_ubigeo": "el agustino lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3939",
      "nombre_ubigeo": "Independencia",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Independencia, Lima",
      "buscador_ubigeo": "independencia lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3940",
      "nombre_ubigeo": "Jesus Maria",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Jesus Maria, Lima",
      "buscador_ubigeo": "jesus maria lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3941",
      "nombre_ubigeo": "La Molina",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "La Molina, Lima",
      "buscador_ubigeo": "la molina lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3942",
      "nombre_ubigeo": "La Victoria",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "La Victoria, Lima",
      "buscador_ubigeo": "la victoria lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3943",
      "nombre_ubigeo": "Lince",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Lince, Lima",
      "buscador_ubigeo": "lince lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3944",
      "nombre_ubigeo": "Los Olivos",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Los Olivos, Lima",
      "buscador_ubigeo": "los olivos lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3945",
      "nombre_ubigeo": "Lurigancho",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Lurigancho, Lima",
      "buscador_ubigeo": "lurigancho lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3946",
      "nombre_ubigeo": "Lurin",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Lurin, Lima",
      "buscador_ubigeo": "lurin lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3947",
      "nombre_ubigeo": "Magdalena del Mar",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Magdalena del Mar, Lima",
      "buscador_ubigeo": "magdalena del mar lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3949",
      "nombre_ubigeo": "Miraflores",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Miraflores, Lima",
      "buscador_ubigeo": "miraflores lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3950",
      "nombre_ubigeo": "Pachacamac",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "Pachacamac, Lima",
      "buscador_ubigeo": "pachacamac lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3951",
      "nombre_ubigeo": "Pucusana",
      "codigo_ubigeo": "24",
      "etiqueta_ubigeo": "Pucusana, Lima",
      "buscador_ubigeo": "pucusana lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3948",
      "nombre_ubigeo": "Pueblo Libre",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Pueblo Libre, Lima",
      "buscador_ubigeo": "pueblo libre lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3952",
      "nombre_ubigeo": "Puente Piedra",
      "codigo_ubigeo": "25",
      "etiqueta_ubigeo": "Puente Piedra, Lima",
      "buscador_ubigeo": "puente piedra lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3953",
      "nombre_ubigeo": "Punta Hermosa",
      "codigo_ubigeo": "26",
      "etiqueta_ubigeo": "Punta Hermosa, Lima",
      "buscador_ubigeo": "punta hermosa lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3954",
      "nombre_ubigeo": "Punta Negra",
      "codigo_ubigeo": "27",
      "etiqueta_ubigeo": "Punta Negra, Lima",
      "buscador_ubigeo": "punta negra lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3955",
      "nombre_ubigeo": "Rimac",
      "codigo_ubigeo": "28",
      "etiqueta_ubigeo": "Rimac, Lima",
      "buscador_ubigeo": "rimac lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3956",
      "nombre_ubigeo": "San Bartolo",
      "codigo_ubigeo": "29",
      "etiqueta_ubigeo": "San Bartolo, Lima",
      "buscador_ubigeo": "san bartolo lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3957",
      "nombre_ubigeo": "San Borja",
      "codigo_ubigeo": "30",
      "etiqueta_ubigeo": "San Borja, Lima",
      "buscador_ubigeo": "san borja lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3958",
      "nombre_ubigeo": "San Isidro",
      "codigo_ubigeo": "31",
      "etiqueta_ubigeo": "San Isidro, Lima",
      "buscador_ubigeo": "san isidro lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3959",
      "nombre_ubigeo": "San Juan de Lurigancho",
      "codigo_ubigeo": "32",
      "etiqueta_ubigeo": "San Juan de Lurigancho, Lima",
      "buscador_ubigeo": "san juan de lurigancho lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3960",
      "nombre_ubigeo": "San Juan de Miraflores",
      "codigo_ubigeo": "33",
      "etiqueta_ubigeo": "San Juan de Miraflores, Lima",
      "buscador_ubigeo": "san juan de miraflores lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3961",
      "nombre_ubigeo": "San Luis",
      "codigo_ubigeo": "34",
      "etiqueta_ubigeo": "San Luis, Lima",
      "buscador_ubigeo": "san luis lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3962",
      "nombre_ubigeo": "San Martin de Porres",
      "codigo_ubigeo": "35",
      "etiqueta_ubigeo": "San Martin de Porres, Lima",
      "buscador_ubigeo": "san martin de porres lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3963",
      "nombre_ubigeo": "San Miguel",
      "codigo_ubigeo": "36",
      "etiqueta_ubigeo": "San Miguel, Lima",
      "buscador_ubigeo": "san miguel lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3964",
      "nombre_ubigeo": "Santa Anita",
      "codigo_ubigeo": "37",
      "etiqueta_ubigeo": "Santa Anita, Lima",
      "buscador_ubigeo": "santa anita lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3965",
      "nombre_ubigeo": "Santa Maria del Mar",
      "codigo_ubigeo": "38",
      "etiqueta_ubigeo": "Santa Maria del Mar, Lima",
      "buscador_ubigeo": "santa maria del mar lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3966",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "39",
      "etiqueta_ubigeo": "Santa Rosa, Lima",
      "buscador_ubigeo": "santa rosa lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3967",
      "nombre_ubigeo": "Santiago de Surco",
      "codigo_ubigeo": "40",
      "etiqueta_ubigeo": "Santiago de Surco, Lima",
      "buscador_ubigeo": "santiago de surco lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3968",
      "nombre_ubigeo": "Surquillo",
      "codigo_ubigeo": "41",
      "etiqueta_ubigeo": "Surquillo, Lima",
      "buscador_ubigeo": "surquillo lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3969",
      "nombre_ubigeo": "Villa El Salvador",
      "codigo_ubigeo": "42",
      "etiqueta_ubigeo": "Villa El Salvador, Lima",
      "buscador_ubigeo": "villa el salvador lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }, {
      "id_ubigeo": "3970",
      "nombre_ubigeo": "Villa Maria del Triunfo",
      "codigo_ubigeo": "43",
      "etiqueta_ubigeo": "Villa Maria del Triunfo, Lima",
      "buscador_ubigeo": "villa maria del triunfo lima",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "3927"
    }],
    "4067": [{
      "id_ubigeo": "4069",
      "nombre_ubigeo": "Andajes",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Andajes, Oyon",
      "buscador_ubigeo": "andajes oyon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4067"
    }, {
      "id_ubigeo": "4070",
      "nombre_ubigeo": "Caujul",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Caujul, Oyon",
      "buscador_ubigeo": "caujul oyon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4067"
    }, {
      "id_ubigeo": "4071",
      "nombre_ubigeo": "Cochamarca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cochamarca, Oyon",
      "buscador_ubigeo": "cochamarca oyon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4067"
    }, {
      "id_ubigeo": "4072",
      "nombre_ubigeo": "Navan",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Navan, Oyon",
      "buscador_ubigeo": "navan oyon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4067"
    }, {
      "id_ubigeo": "4068",
      "nombre_ubigeo": "Oyon",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Oyon, Oyon",
      "buscador_ubigeo": "oyon oyon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4067"
    }, {
      "id_ubigeo": "4073",
      "nombre_ubigeo": "Pachangara",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pachangara, Oyon",
      "buscador_ubigeo": "pachangara oyon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4067"
    }],
    "4074": [{
      "id_ubigeo": "4076",
      "nombre_ubigeo": "Alis",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alis, Yauyos",
      "buscador_ubigeo": "alis yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4077",
      "nombre_ubigeo": "Ayauca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ayauca, Yauyos",
      "buscador_ubigeo": "ayauca yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4078",
      "nombre_ubigeo": "Ayaviri",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ayaviri, Yauyos",
      "buscador_ubigeo": "ayaviri yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4079",
      "nombre_ubigeo": "Azangaro",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Azangaro, Yauyos",
      "buscador_ubigeo": "azangaro yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4080",
      "nombre_ubigeo": "Cacra",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Cacra, Yauyos",
      "buscador_ubigeo": "cacra yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4081",
      "nombre_ubigeo": "Carania",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Carania, Yauyos",
      "buscador_ubigeo": "carania yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4082",
      "nombre_ubigeo": "Catahuasi",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Catahuasi, Yauyos",
      "buscador_ubigeo": "catahuasi yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4083",
      "nombre_ubigeo": "Chocos",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Chocos, Yauyos",
      "buscador_ubigeo": "chocos yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4084",
      "nombre_ubigeo": "Cochas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Cochas, Yauyos",
      "buscador_ubigeo": "cochas yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4085",
      "nombre_ubigeo": "Colonia",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Colonia, Yauyos",
      "buscador_ubigeo": "colonia yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4086",
      "nombre_ubigeo": "Hongos",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Hongos, Yauyos",
      "buscador_ubigeo": "hongos yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4087",
      "nombre_ubigeo": "Huampara",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Huampara, Yauyos",
      "buscador_ubigeo": "huampara yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4088",
      "nombre_ubigeo": "Huancaya",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Huancaya, Yauyos",
      "buscador_ubigeo": "huancaya yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4089",
      "nombre_ubigeo": "Huangascar",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Huangascar, Yauyos",
      "buscador_ubigeo": "huangascar yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4090",
      "nombre_ubigeo": "Huantan",
      "codigo_ubigeo": "16",
      "etiqueta_ubigeo": "Huantan, Yauyos",
      "buscador_ubigeo": "huantan yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4091",
      "nombre_ubigeo": "Huaqec",
      "codigo_ubigeo": "17",
      "etiqueta_ubigeo": "Huaqec, Yauyos",
      "buscador_ubigeo": "huaqec yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4092",
      "nombre_ubigeo": "Laraos",
      "codigo_ubigeo": "18",
      "etiqueta_ubigeo": "Laraos, Yauyos",
      "buscador_ubigeo": "laraos yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4093",
      "nombre_ubigeo": "Lincha",
      "codigo_ubigeo": "19",
      "etiqueta_ubigeo": "Lincha, Yauyos",
      "buscador_ubigeo": "lincha yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4094",
      "nombre_ubigeo": "Madean",
      "codigo_ubigeo": "20",
      "etiqueta_ubigeo": "Madean, Yauyos",
      "buscador_ubigeo": "madean yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4095",
      "nombre_ubigeo": "Miraflores",
      "codigo_ubigeo": "21",
      "etiqueta_ubigeo": "Miraflores, Yauyos",
      "buscador_ubigeo": "miraflores yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4096",
      "nombre_ubigeo": "Omas",
      "codigo_ubigeo": "22",
      "etiqueta_ubigeo": "Omas, Yauyos",
      "buscador_ubigeo": "omas yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4097",
      "nombre_ubigeo": "Putinza",
      "codigo_ubigeo": "23",
      "etiqueta_ubigeo": "Putinza, Yauyos",
      "buscador_ubigeo": "putinza yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4098",
      "nombre_ubigeo": "Quinches",
      "codigo_ubigeo": "24",
      "etiqueta_ubigeo": "Quinches, Yauyos",
      "buscador_ubigeo": "quinches yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4099",
      "nombre_ubigeo": "Quinocay",
      "codigo_ubigeo": "25",
      "etiqueta_ubigeo": "Quinocay, Yauyos",
      "buscador_ubigeo": "quinocay yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4100",
      "nombre_ubigeo": "San Joaquin",
      "codigo_ubigeo": "26",
      "etiqueta_ubigeo": "San Joaquin, Yauyos",
      "buscador_ubigeo": "san joaquin yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4101",
      "nombre_ubigeo": "San Pedro de Pilas",
      "codigo_ubigeo": "27",
      "etiqueta_ubigeo": "San Pedro de Pilas, Yauyos",
      "buscador_ubigeo": "san pedro de pilas yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4102",
      "nombre_ubigeo": "Tanta",
      "codigo_ubigeo": "28",
      "etiqueta_ubigeo": "Tanta, Yauyos",
      "buscador_ubigeo": "tanta yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4103",
      "nombre_ubigeo": "Tauripampa",
      "codigo_ubigeo": "29",
      "etiqueta_ubigeo": "Tauripampa, Yauyos",
      "buscador_ubigeo": "tauripampa yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4104",
      "nombre_ubigeo": "Tomas",
      "codigo_ubigeo": "30",
      "etiqueta_ubigeo": "Tomas, Yauyos",
      "buscador_ubigeo": "tomas yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4105",
      "nombre_ubigeo": "Tupe",
      "codigo_ubigeo": "31",
      "etiqueta_ubigeo": "Tupe, Yauyos",
      "buscador_ubigeo": "tupe yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4106",
      "nombre_ubigeo": "Viqac",
      "codigo_ubigeo": "32",
      "etiqueta_ubigeo": "Viqac, Yauyos",
      "buscador_ubigeo": "viqac yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4107",
      "nombre_ubigeo": "Vitis",
      "codigo_ubigeo": "33",
      "etiqueta_ubigeo": "Vitis, Yauyos",
      "buscador_ubigeo": "vitis yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }, {
      "id_ubigeo": "4075",
      "nombre_ubigeo": "Yauyos",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Yauyos, Yauyos",
      "buscador_ubigeo": "yauyos yauyos",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4074"
    }],
    "4123": [{
      "id_ubigeo": "4125",
      "nombre_ubigeo": "Balsapuerto",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Balsapuerto, Alto Amazonas",
      "buscador_ubigeo": "balsapuerto alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4126",
      "nombre_ubigeo": "Barranca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Barranca, Alto Amazonas",
      "buscador_ubigeo": "barranca alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4127",
      "nombre_ubigeo": "Cahuapanas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cahuapanas, Alto Amazonas",
      "buscador_ubigeo": "cahuapanas alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4128",
      "nombre_ubigeo": "Jeberos",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Jeberos, Alto Amazonas",
      "buscador_ubigeo": "jeberos alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4129",
      "nombre_ubigeo": "Lagunas",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Lagunas, Alto Amazonas",
      "buscador_ubigeo": "lagunas alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4130",
      "nombre_ubigeo": "Manseriche",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Manseriche, Alto Amazonas",
      "buscador_ubigeo": "manseriche alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4131",
      "nombre_ubigeo": "Morona",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Morona, Alto Amazonas",
      "buscador_ubigeo": "morona alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4132",
      "nombre_ubigeo": "Pastaza",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Pastaza, Alto Amazonas",
      "buscador_ubigeo": "pastaza alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4133",
      "nombre_ubigeo": "Santa Cruz",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Santa Cruz, Alto Amazonas",
      "buscador_ubigeo": "santa cruz alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4134",
      "nombre_ubigeo": "Teniente Cesar Lopez Rojas",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Teniente Cesar Lopez Rojas, Alto Amazonas",
      "buscador_ubigeo": "teniente cesar lopez rojas alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }, {
      "id_ubigeo": "4124",
      "nombre_ubigeo": "Yurimaguas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Yurimaguas, Alto Amazonas",
      "buscador_ubigeo": "yurimaguas alto amazonas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4123"
    }],
    "4135": [{
      "id_ubigeo": "4136",
      "nombre_ubigeo": "Nauta",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Nauta, Loreto",
      "buscador_ubigeo": "nauta loreto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4135"
    }, {
      "id_ubigeo": "4137",
      "nombre_ubigeo": "Parinari",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Parinari, Loreto",
      "buscador_ubigeo": "parinari loreto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4135"
    }, {
      "id_ubigeo": "4138",
      "nombre_ubigeo": "Tigre",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Tigre, Loreto",
      "buscador_ubigeo": "tigre loreto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4135"
    }, {
      "id_ubigeo": "4139",
      "nombre_ubigeo": "Trompeteros",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Trompeteros, Loreto",
      "buscador_ubigeo": "trompeteros loreto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4135"
    }, {
      "id_ubigeo": "4140",
      "nombre_ubigeo": "Urarinas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Urarinas, Loreto",
      "buscador_ubigeo": "urarinas loreto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4135"
    }],
    "4141": [{
      "id_ubigeo": "4143",
      "nombre_ubigeo": "Pebas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Pebas, Mariscal Ramon Castilla",
      "buscador_ubigeo": "pebas mariscal ramon castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4141"
    }, {
      "id_ubigeo": "4142",
      "nombre_ubigeo": "Ramon Castilla",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ramon Castilla, Mariscal Ramon Castilla",
      "buscador_ubigeo": "ramon castilla mariscal ramon castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4141"
    }, {
      "id_ubigeo": "4145",
      "nombre_ubigeo": "San Pablo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "San Pablo, Mariscal Ramon Castilla",
      "buscador_ubigeo": "san pablo mariscal ramon castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4141"
    }, {
      "id_ubigeo": "4144",
      "nombre_ubigeo": "Yavari",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Yavari, Mariscal Ramon Castilla",
      "buscador_ubigeo": "yavari mariscal ramon castilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4141"
    }],
    "4109": [{
      "id_ubigeo": "4111",
      "nombre_ubigeo": "Alto Nanay",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Nanay, Maynas",
      "buscador_ubigeo": "alto nanay maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4121",
      "nombre_ubigeo": "Bel\u00e9n",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Bel\u00e9n, Maynas",
      "buscador_ubigeo": "bel\u00e9n maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4112",
      "nombre_ubigeo": "Fernando Lores",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Fernando Lores, Maynas",
      "buscador_ubigeo": "fernando lores maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4113",
      "nombre_ubigeo": "Indiana",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Indiana, Maynas",
      "buscador_ubigeo": "indiana maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4110",
      "nombre_ubigeo": "Iquitos",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Iquitos, Maynas",
      "buscador_ubigeo": "iquitos maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4114",
      "nombre_ubigeo": "Las Amazonas",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Las Amazonas, Maynas",
      "buscador_ubigeo": "las amazonas maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4115",
      "nombre_ubigeo": "Mazan",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Mazan, Maynas",
      "buscador_ubigeo": "mazan maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4116",
      "nombre_ubigeo": "Napo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Napo, Maynas",
      "buscador_ubigeo": "napo maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4117",
      "nombre_ubigeo": "Punchana",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Punchana, Maynas",
      "buscador_ubigeo": "punchana maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4118",
      "nombre_ubigeo": "Putumayo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Putumayo, Maynas",
      "buscador_ubigeo": "putumayo maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4122",
      "nombre_ubigeo": "San Juan Bautista",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "San Juan Bautista, Maynas",
      "buscador_ubigeo": "san juan bautista maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4119",
      "nombre_ubigeo": "Torres Causana",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Torres Causana, Maynas",
      "buscador_ubigeo": "torres causana maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }, {
      "id_ubigeo": "4120",
      "nombre_ubigeo": "Yaquerana",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yaquerana, Maynas",
      "buscador_ubigeo": "yaquerana maynas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4109"
    }],
    "4146": [{
      "id_ubigeo": "4148",
      "nombre_ubigeo": "Alto Tapiche",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Tapiche, Requena",
      "buscador_ubigeo": "alto tapiche requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4149",
      "nombre_ubigeo": "Capelo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Capelo, Requena",
      "buscador_ubigeo": "capelo requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4150",
      "nombre_ubigeo": "Emilio San Martin",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Emilio San Martin, Requena",
      "buscador_ubigeo": "emilio san martin requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4156",
      "nombre_ubigeo": "Jenaro Herrera",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Jenaro Herrera, Requena",
      "buscador_ubigeo": "jenaro herrera requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4151",
      "nombre_ubigeo": "Maquia",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Maquia, Requena",
      "buscador_ubigeo": "maquia requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4152",
      "nombre_ubigeo": "Puinahua",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Puinahua, Requena",
      "buscador_ubigeo": "puinahua requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4147",
      "nombre_ubigeo": "Requena",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Requena, Requena",
      "buscador_ubigeo": "requena requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4153",
      "nombre_ubigeo": "Saquena",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Saquena, Requena",
      "buscador_ubigeo": "saquena requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4154",
      "nombre_ubigeo": "Soplin",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Soplin, Requena",
      "buscador_ubigeo": "soplin requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4155",
      "nombre_ubigeo": "Tapiche",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Tapiche, Requena",
      "buscador_ubigeo": "tapiche requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }, {
      "id_ubigeo": "4157",
      "nombre_ubigeo": "Yaquerana",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yaquerana, Requena",
      "buscador_ubigeo": "yaquerana requena",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4146"
    }],
    "4158": [{
      "id_ubigeo": "4159",
      "nombre_ubigeo": "Contamana",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Contamana, Ucayali",
      "buscador_ubigeo": "contamana ucayali",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4158"
    }, {
      "id_ubigeo": "4160",
      "nombre_ubigeo": "Inahuaya",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Inahuaya, Ucayali",
      "buscador_ubigeo": "inahuaya ucayali",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4158"
    }, {
      "id_ubigeo": "4161",
      "nombre_ubigeo": "Padre Marquez",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Padre Marquez, Ucayali",
      "buscador_ubigeo": "padre marquez ucayali",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4158"
    }, {
      "id_ubigeo": "4162",
      "nombre_ubigeo": "Pampa Hermosa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pampa Hermosa, Ucayali",
      "buscador_ubigeo": "pampa hermosa ucayali",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4158"
    }, {
      "id_ubigeo": "4163",
      "nombre_ubigeo": "Sarayacu",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Sarayacu, Ucayali",
      "buscador_ubigeo": "sarayacu ucayali",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4158"
    }, {
      "id_ubigeo": "4164",
      "nombre_ubigeo": "Vargas Guerra",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Vargas Guerra, Ucayali",
      "buscador_ubigeo": "vargas guerra ucayali",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4158"
    }],
    "4171": [{
      "id_ubigeo": "4173",
      "nombre_ubigeo": "Fitzcarrald",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Fitzcarrald, Manu",
      "buscador_ubigeo": "fitzcarrald manu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4171"
    }, {
      "id_ubigeo": "4175",
      "nombre_ubigeo": "Huepetuhe",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huepetuhe, Manu",
      "buscador_ubigeo": "huepetuhe manu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4171"
    }, {
      "id_ubigeo": "4174",
      "nombre_ubigeo": "Madre de Dios",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Madre de Dios, Manu",
      "buscador_ubigeo": "madre de dios manu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4171"
    }, {
      "id_ubigeo": "4172",
      "nombre_ubigeo": "Manu",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Manu, Manu",
      "buscador_ubigeo": "manu manu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4171"
    }],
    "4176": [{
      "id_ubigeo": "4178",
      "nombre_ubigeo": "Iberia",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Iberia, Tahuamanu",
      "buscador_ubigeo": "iberia tahuamanu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4176"
    }, {
      "id_ubigeo": "4177",
      "nombre_ubigeo": "Iqapari",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Iqapari, Tahuamanu",
      "buscador_ubigeo": "iqapari tahuamanu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4176"
    }, {
      "id_ubigeo": "4179",
      "nombre_ubigeo": "Tahuamanu",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Tahuamanu, Tahuamanu",
      "buscador_ubigeo": "tahuamanu tahuamanu",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4176"
    }],
    "4166": [{
      "id_ubigeo": "4168",
      "nombre_ubigeo": "Inambari",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Inambari, Tambopata",
      "buscador_ubigeo": "inambari tambopata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4166"
    }, {
      "id_ubigeo": "4170",
      "nombre_ubigeo": "Laberinto",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Laberinto, Tambopata",
      "buscador_ubigeo": "laberinto tambopata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4166"
    }, {
      "id_ubigeo": "4169",
      "nombre_ubigeo": "Las Piedras",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Las Piedras, Tambopata",
      "buscador_ubigeo": "las piedras tambopata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4166"
    }, {
      "id_ubigeo": "4167",
      "nombre_ubigeo": "Tambopata",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tambopata, Tambopata",
      "buscador_ubigeo": "tambopata tambopata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4166"
    }],
    "4188": [{
      "id_ubigeo": "4190",
      "nombre_ubigeo": "Chojata",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chojata, General Sanchez Cerro",
      "buscador_ubigeo": "chojata general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4191",
      "nombre_ubigeo": "Coalaque",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Coalaque, General Sanchez Cerro",
      "buscador_ubigeo": "coalaque general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4192",
      "nombre_ubigeo": "Ichuqa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ichuqa, General Sanchez Cerro",
      "buscador_ubigeo": "ichuqa general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4193",
      "nombre_ubigeo": "La Capilla",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Capilla, General Sanchez Cerro",
      "buscador_ubigeo": "la capilla general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4194",
      "nombre_ubigeo": "Lloque",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Lloque, General Sanchez Cerro",
      "buscador_ubigeo": "lloque general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4195",
      "nombre_ubigeo": "Matalaque",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Matalaque, General Sanchez Cerro",
      "buscador_ubigeo": "matalaque general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4189",
      "nombre_ubigeo": "Omate",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Omate, General Sanchez Cerro",
      "buscador_ubigeo": "omate general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4196",
      "nombre_ubigeo": "Puquina",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Puquina, General Sanchez Cerro",
      "buscador_ubigeo": "puquina general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4197",
      "nombre_ubigeo": "Quinistaquillas",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Quinistaquillas, General Sanchez Cerro",
      "buscador_ubigeo": "quinistaquillas general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4198",
      "nombre_ubigeo": "Ubinas",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Ubinas, General Sanchez Cerro",
      "buscador_ubigeo": "ubinas general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }, {
      "id_ubigeo": "4199",
      "nombre_ubigeo": "Yunga",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Yunga, General Sanchez Cerro",
      "buscador_ubigeo": "yunga general sanchez cerro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4188"
    }],
    "4200": [{
      "id_ubigeo": "4202",
      "nombre_ubigeo": "El Algarrobal",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "El Algarrobal, Ilo",
      "buscador_ubigeo": "el algarrobal ilo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4200"
    }, {
      "id_ubigeo": "4201",
      "nombre_ubigeo": "Ilo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ilo, Ilo",
      "buscador_ubigeo": "ilo ilo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4200"
    }, {
      "id_ubigeo": "4203",
      "nombre_ubigeo": "Pacocha",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Pacocha, Ilo",
      "buscador_ubigeo": "pacocha ilo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4200"
    }],
    "4181": [{
      "id_ubigeo": "4183",
      "nombre_ubigeo": "Carumas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Carumas, Mariscal Nieto",
      "buscador_ubigeo": "carumas mariscal nieto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4181"
    }, {
      "id_ubigeo": "4184",
      "nombre_ubigeo": "Cuchumbaya",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cuchumbaya, Mariscal Nieto",
      "buscador_ubigeo": "cuchumbaya mariscal nieto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4181"
    }, {
      "id_ubigeo": "4182",
      "nombre_ubigeo": "Moquegua",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Moquegua, Mariscal Nieto",
      "buscador_ubigeo": "moquegua mariscal nieto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4181"
    }, {
      "id_ubigeo": "4185",
      "nombre_ubigeo": "Samegua",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Samegua, Mariscal Nieto",
      "buscador_ubigeo": "samegua mariscal nieto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4181"
    }, {
      "id_ubigeo": "4186",
      "nombre_ubigeo": "San Cristobal",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Cristobal, Mariscal Nieto",
      "buscador_ubigeo": "san cristobal mariscal nieto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4181"
    }, {
      "id_ubigeo": "4187",
      "nombre_ubigeo": "Torata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Torata, Mariscal Nieto",
      "buscador_ubigeo": "torata mariscal nieto",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4181"
    }],
    "4219": [{
      "id_ubigeo": "4221",
      "nombre_ubigeo": "Chacayan",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chacayan, Daniel Alcides Carrion",
      "buscador_ubigeo": "chacayan daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4222",
      "nombre_ubigeo": "Goyllarisquizga",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Goyllarisquizga, Daniel Alcides Carrion",
      "buscador_ubigeo": "goyllarisquizga daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4223",
      "nombre_ubigeo": "Paucar",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Paucar, Daniel Alcides Carrion",
      "buscador_ubigeo": "paucar daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4224",
      "nombre_ubigeo": "San Pedro de Pillao",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Pedro de Pillao, Daniel Alcides Carrion",
      "buscador_ubigeo": "san pedro de pillao daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4225",
      "nombre_ubigeo": "Santa Ana de Tusi",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Santa Ana de Tusi, Daniel Alcides Carrion",
      "buscador_ubigeo": "santa ana de tusi daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4226",
      "nombre_ubigeo": "Tapuc",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Tapuc, Daniel Alcides Carrion",
      "buscador_ubigeo": "tapuc daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4227",
      "nombre_ubigeo": "Vilcabamba",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Vilcabamba, Daniel Alcides Carrion",
      "buscador_ubigeo": "vilcabamba daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }, {
      "id_ubigeo": "4220",
      "nombre_ubigeo": "Yanahuanca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Yanahuanca, Daniel Alcides Carrion",
      "buscador_ubigeo": "yanahuanca daniel alcides carrion",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4219"
    }],
    "4228": [{
      "id_ubigeo": "4230",
      "nombre_ubigeo": "Chontabamba",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chontabamba, Oxapampa",
      "buscador_ubigeo": "chontabamba oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }, {
      "id_ubigeo": "4231",
      "nombre_ubigeo": "Huancabamba",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huancabamba, Oxapampa",
      "buscador_ubigeo": "huancabamba oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }, {
      "id_ubigeo": "4229",
      "nombre_ubigeo": "Oxapampa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Oxapampa, Oxapampa",
      "buscador_ubigeo": "oxapampa oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }, {
      "id_ubigeo": "4232",
      "nombre_ubigeo": "Palcazu",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Palcazu, Oxapampa",
      "buscador_ubigeo": "palcazu oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }, {
      "id_ubigeo": "4233",
      "nombre_ubigeo": "Pozuzo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pozuzo, Oxapampa",
      "buscador_ubigeo": "pozuzo oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }, {
      "id_ubigeo": "4234",
      "nombre_ubigeo": "Puerto Bermudez",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Puerto Bermudez, Oxapampa",
      "buscador_ubigeo": "puerto bermudez oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }, {
      "id_ubigeo": "4235",
      "nombre_ubigeo": "Villa Rica",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Villa Rica, Oxapampa",
      "buscador_ubigeo": "villa rica oxapampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4228"
    }],
    "4205": [{
      "id_ubigeo": "4206",
      "nombre_ubigeo": "Chaupimarca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chaupimarca, Pasco",
      "buscador_ubigeo": "chaupimarca pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4207",
      "nombre_ubigeo": "Huachon",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Huachon, Pasco",
      "buscador_ubigeo": "huachon pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4208",
      "nombre_ubigeo": "Huariaca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huariaca, Pasco",
      "buscador_ubigeo": "huariaca pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4209",
      "nombre_ubigeo": "Huayllay",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huayllay, Pasco",
      "buscador_ubigeo": "huayllay pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4210",
      "nombre_ubigeo": "Ninacaca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ninacaca, Pasco",
      "buscador_ubigeo": "ninacaca pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4211",
      "nombre_ubigeo": "Pallanchacra",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pallanchacra, Pasco",
      "buscador_ubigeo": "pallanchacra pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4212",
      "nombre_ubigeo": "Paucartambo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Paucartambo, Pasco",
      "buscador_ubigeo": "paucartambo pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4213",
      "nombre_ubigeo": "San Fco.De Asis de Yarusyacan",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Fco.De Asis de Yarusyacan, Pasco",
      "buscador_ubigeo": "san fco.de asis de yarusyacan pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4214",
      "nombre_ubigeo": "Simon Bolivar",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Simon Bolivar, Pasco",
      "buscador_ubigeo": "simon bolivar pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4215",
      "nombre_ubigeo": "Ticlacayan",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Ticlacayan, Pasco",
      "buscador_ubigeo": "ticlacayan pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4216",
      "nombre_ubigeo": "Tinyahuarco",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Tinyahuarco, Pasco",
      "buscador_ubigeo": "tinyahuarco pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4217",
      "nombre_ubigeo": "Vicco",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Vicco, Pasco",
      "buscador_ubigeo": "vicco pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }, {
      "id_ubigeo": "4218",
      "nombre_ubigeo": "Yanacancha",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Yanacancha, Pasco",
      "buscador_ubigeo": "yanacancha pasco",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4205"
    }],
    "4247": [{
      "id_ubigeo": "4248",
      "nombre_ubigeo": "Ayabaca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ayabaca, Ayabaca",
      "buscador_ubigeo": "ayabaca ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4249",
      "nombre_ubigeo": "Frias",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Frias, Ayabaca",
      "buscador_ubigeo": "frias ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4250",
      "nombre_ubigeo": "Jilili",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Jilili, Ayabaca",
      "buscador_ubigeo": "jilili ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4251",
      "nombre_ubigeo": "Lagunas",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Lagunas, Ayabaca",
      "buscador_ubigeo": "lagunas ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4252",
      "nombre_ubigeo": "Montero",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Montero, Ayabaca",
      "buscador_ubigeo": "montero ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4253",
      "nombre_ubigeo": "Pacaipampa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pacaipampa, Ayabaca",
      "buscador_ubigeo": "pacaipampa ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4254",
      "nombre_ubigeo": "Paimas",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Paimas, Ayabaca",
      "buscador_ubigeo": "paimas ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4255",
      "nombre_ubigeo": "Sapillica",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Sapillica, Ayabaca",
      "buscador_ubigeo": "sapillica ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4256",
      "nombre_ubigeo": "Sicchez",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sicchez, Ayabaca",
      "buscador_ubigeo": "sicchez ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }, {
      "id_ubigeo": "4257",
      "nombre_ubigeo": "Suyo",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Suyo, Ayabaca",
      "buscador_ubigeo": "suyo ayabaca",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4247"
    }],
    "4258": [{
      "id_ubigeo": "4260",
      "nombre_ubigeo": "Canchaque",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Canchaque, Huancabamba",
      "buscador_ubigeo": "canchaque huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4261",
      "nombre_ubigeo": "El Carmen de la Frontera",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "El Carmen de la Frontera, Huancabamba",
      "buscador_ubigeo": "el carmen de la frontera huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4259",
      "nombre_ubigeo": "Huancabamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancabamba, Huancabamba",
      "buscador_ubigeo": "huancabamba huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4262",
      "nombre_ubigeo": "Huarmaca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huarmaca, Huancabamba",
      "buscador_ubigeo": "huarmaca huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4263",
      "nombre_ubigeo": "Lalaquiz",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Lalaquiz, Huancabamba",
      "buscador_ubigeo": "lalaquiz huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4264",
      "nombre_ubigeo": "San Miguel de El Faique",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Miguel de El Faique, Huancabamba",
      "buscador_ubigeo": "san miguel de el faique huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4265",
      "nombre_ubigeo": "Sondor",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Sondor, Huancabamba",
      "buscador_ubigeo": "sondor huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }, {
      "id_ubigeo": "4266",
      "nombre_ubigeo": "Sondorillo",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Sondorillo, Huancabamba",
      "buscador_ubigeo": "sondorillo huancabamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4258"
    }],
    "4267": [{
      "id_ubigeo": "4269",
      "nombre_ubigeo": "Buenos Aires",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Buenos Aires, Morropon",
      "buscador_ubigeo": "buenos aires morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4270",
      "nombre_ubigeo": "Chalaco",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Chalaco, Morropon",
      "buscador_ubigeo": "chalaco morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4268",
      "nombre_ubigeo": "Chulucanas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Chulucanas, Morropon",
      "buscador_ubigeo": "chulucanas morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4271",
      "nombre_ubigeo": "La Matanza",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "La Matanza, Morropon",
      "buscador_ubigeo": "la matanza morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4272",
      "nombre_ubigeo": "Morropon",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Morropon, Morropon",
      "buscador_ubigeo": "morropon morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4273",
      "nombre_ubigeo": "Salitral",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Salitral, Morropon",
      "buscador_ubigeo": "salitral morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4274",
      "nombre_ubigeo": "San Juan de Bigote",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Juan de Bigote, Morropon",
      "buscador_ubigeo": "san juan de bigote morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4275",
      "nombre_ubigeo": "Santa Catalina de Mossa",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Santa Catalina de Mossa, Morropon",
      "buscador_ubigeo": "santa catalina de mossa morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4276",
      "nombre_ubigeo": "Santo Domingo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Santo Domingo, Morropon",
      "buscador_ubigeo": "santo domingo morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }, {
      "id_ubigeo": "4277",
      "nombre_ubigeo": "Yamango",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Yamango, Morropon",
      "buscador_ubigeo": "yamango morropon",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4267"
    }],
    "4278": [{
      "id_ubigeo": "4280",
      "nombre_ubigeo": "Amotape",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Amotape, Paita",
      "buscador_ubigeo": "amotape paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }, {
      "id_ubigeo": "4281",
      "nombre_ubigeo": "Arenal",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Arenal, Paita",
      "buscador_ubigeo": "arenal paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }, {
      "id_ubigeo": "4282",
      "nombre_ubigeo": "Colan",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Colan, Paita",
      "buscador_ubigeo": "colan paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }, {
      "id_ubigeo": "4283",
      "nombre_ubigeo": "La Huaca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "La Huaca, Paita",
      "buscador_ubigeo": "la huaca paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }, {
      "id_ubigeo": "4279",
      "nombre_ubigeo": "Paita",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Paita, Paita",
      "buscador_ubigeo": "paita paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }, {
      "id_ubigeo": "4284",
      "nombre_ubigeo": "Tamarindo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Tamarindo, Paita",
      "buscador_ubigeo": "tamarindo paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }, {
      "id_ubigeo": "4285",
      "nombre_ubigeo": "Vichayal",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Vichayal, Paita",
      "buscador_ubigeo": "vichayal paita",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4278"
    }],
    "4237": [{
      "id_ubigeo": "4239",
      "nombre_ubigeo": "Castilla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Castilla, Piura",
      "buscador_ubigeo": "castilla piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4240",
      "nombre_ubigeo": "Catacaos",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Catacaos, Piura",
      "buscador_ubigeo": "catacaos piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4241",
      "nombre_ubigeo": "Cura Mori",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Cura Mori, Piura",
      "buscador_ubigeo": "cura mori piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4242",
      "nombre_ubigeo": "El Tallan",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "El Tallan, Piura",
      "buscador_ubigeo": "el tallan piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4243",
      "nombre_ubigeo": "La Arena",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "La Arena, Piura",
      "buscador_ubigeo": "la arena piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4244",
      "nombre_ubigeo": "La Union",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "La Union, Piura",
      "buscador_ubigeo": "la union piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4245",
      "nombre_ubigeo": "Las Lomas",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Las Lomas, Piura",
      "buscador_ubigeo": "las lomas piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4238",
      "nombre_ubigeo": "Piura",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Piura, Piura",
      "buscador_ubigeo": "piura piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }, {
      "id_ubigeo": "4246",
      "nombre_ubigeo": "Tambo Grande",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Tambo Grande, Piura",
      "buscador_ubigeo": "tambo grande piura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4237"
    }],
    "4302": [{
      "id_ubigeo": "4304",
      "nombre_ubigeo": "Bellavista de la Union",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bellavista de la Union, Sechura",
      "buscador_ubigeo": "bellavista de la union sechura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4302"
    }, {
      "id_ubigeo": "4305",
      "nombre_ubigeo": "Bernal",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Bernal, Sechura",
      "buscador_ubigeo": "bernal sechura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4302"
    }, {
      "id_ubigeo": "4306",
      "nombre_ubigeo": "Cristo Nos Valga",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cristo Nos Valga, Sechura",
      "buscador_ubigeo": "cristo nos valga sechura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4302"
    }, {
      "id_ubigeo": "4308",
      "nombre_ubigeo": "Rinconada Llicuar",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Rinconada Llicuar, Sechura",
      "buscador_ubigeo": "rinconada llicuar sechura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4302"
    }, {
      "id_ubigeo": "4303",
      "nombre_ubigeo": "Sechura",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Sechura, Sechura",
      "buscador_ubigeo": "sechura sechura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4302"
    }, {
      "id_ubigeo": "4307",
      "nombre_ubigeo": "Vice",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Vice, Sechura",
      "buscador_ubigeo": "vice sechura",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4302"
    }],
    "4286": [{
      "id_ubigeo": "4288",
      "nombre_ubigeo": "Bellavista",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Bellavista, Sullana",
      "buscador_ubigeo": "bellavista sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4289",
      "nombre_ubigeo": "Ignacio Escudero",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ignacio Escudero, Sullana",
      "buscador_ubigeo": "ignacio escudero sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4290",
      "nombre_ubigeo": "Lancones",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Lancones, Sullana",
      "buscador_ubigeo": "lancones sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4291",
      "nombre_ubigeo": "Marcavelica",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Marcavelica, Sullana",
      "buscador_ubigeo": "marcavelica sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4292",
      "nombre_ubigeo": "Miguel Checa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Miguel Checa, Sullana",
      "buscador_ubigeo": "miguel checa sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4293",
      "nombre_ubigeo": "Querecotillo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Querecotillo, Sullana",
      "buscador_ubigeo": "querecotillo sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4294",
      "nombre_ubigeo": "Salitral",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Salitral, Sullana",
      "buscador_ubigeo": "salitral sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }, {
      "id_ubigeo": "4287",
      "nombre_ubigeo": "Sullana",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Sullana, Sullana",
      "buscador_ubigeo": "sullana sullana",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4286"
    }],
    "4295": [{
      "id_ubigeo": "4297",
      "nombre_ubigeo": "El Alto",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "El Alto, Talara",
      "buscador_ubigeo": "el alto talara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4295"
    }, {
      "id_ubigeo": "4298",
      "nombre_ubigeo": "La Brea",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "La Brea, Talara",
      "buscador_ubigeo": "la brea talara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4295"
    }, {
      "id_ubigeo": "4299",
      "nombre_ubigeo": "Lobitos",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Lobitos, Talara",
      "buscador_ubigeo": "lobitos talara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4295"
    }, {
      "id_ubigeo": "4300",
      "nombre_ubigeo": "Los Organos",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Los Organos, Talara",
      "buscador_ubigeo": "los organos talara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4295"
    }, {
      "id_ubigeo": "4301",
      "nombre_ubigeo": "Mancora",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Mancora, Talara",
      "buscador_ubigeo": "mancora talara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4295"
    }, {
      "id_ubigeo": "4296",
      "nombre_ubigeo": "Pariqas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Pariqas, Talara",
      "buscador_ubigeo": "pariqas talara",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4295"
    }],
    "4326": [{
      "id_ubigeo": "4328",
      "nombre_ubigeo": "Achaya",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Achaya, Azangaro",
      "buscador_ubigeo": "achaya azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4329",
      "nombre_ubigeo": "Arapa",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Arapa, Azangaro",
      "buscador_ubigeo": "arapa azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4330",
      "nombre_ubigeo": "Asillo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Asillo, Azangaro",
      "buscador_ubigeo": "asillo azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4327",
      "nombre_ubigeo": "Azangaro",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Azangaro, Azangaro",
      "buscador_ubigeo": "azangaro azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4331",
      "nombre_ubigeo": "Caminaca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Caminaca, Azangaro",
      "buscador_ubigeo": "caminaca azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4332",
      "nombre_ubigeo": "Chupa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chupa, Azangaro",
      "buscador_ubigeo": "chupa azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4333",
      "nombre_ubigeo": "Jose Domingo Choquehuanca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Jose Domingo Choquehuanca, Azangaro",
      "buscador_ubigeo": "jose domingo choquehuanca azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4334",
      "nombre_ubigeo": "Muqani",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Muqani, Azangaro",
      "buscador_ubigeo": "muqani azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4335",
      "nombre_ubigeo": "Potoni",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Potoni, Azangaro",
      "buscador_ubigeo": "potoni azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4336",
      "nombre_ubigeo": "Saman",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Saman, Azangaro",
      "buscador_ubigeo": "saman azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4337",
      "nombre_ubigeo": "San Anton",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "San Anton, Azangaro",
      "buscador_ubigeo": "san anton azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4338",
      "nombre_ubigeo": "San Jose",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "San Jose, Azangaro",
      "buscador_ubigeo": "san jose azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4339",
      "nombre_ubigeo": "San Juan de Salinas",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "San Juan de Salinas, Azangaro",
      "buscador_ubigeo": "san juan de salinas azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4340",
      "nombre_ubigeo": "Santiago de Pupuja",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Santiago de Pupuja, Azangaro",
      "buscador_ubigeo": "santiago de pupuja azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }, {
      "id_ubigeo": "4341",
      "nombre_ubigeo": "Tirapata",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Tirapata, Azangaro",
      "buscador_ubigeo": "tirapata azangaro",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4326"
    }],
    "4342": [{
      "id_ubigeo": "4344",
      "nombre_ubigeo": "Ajoyani",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ajoyani, Carabaya",
      "buscador_ubigeo": "ajoyani carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4345",
      "nombre_ubigeo": "Ayapata",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ayapata, Carabaya",
      "buscador_ubigeo": "ayapata carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4346",
      "nombre_ubigeo": "Coasa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Coasa, Carabaya",
      "buscador_ubigeo": "coasa carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4347",
      "nombre_ubigeo": "Corani",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Corani, Carabaya",
      "buscador_ubigeo": "corani carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4348",
      "nombre_ubigeo": "Crucero",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Crucero, Carabaya",
      "buscador_ubigeo": "crucero carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4349",
      "nombre_ubigeo": "Ituata",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Ituata, Carabaya",
      "buscador_ubigeo": "ituata carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4343",
      "nombre_ubigeo": "Macusani",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Macusani, Carabaya",
      "buscador_ubigeo": "macusani carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4350",
      "nombre_ubigeo": "Ollachea",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Ollachea, Carabaya",
      "buscador_ubigeo": "ollachea carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4351",
      "nombre_ubigeo": "San Gaban",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "San Gaban, Carabaya",
      "buscador_ubigeo": "san gaban carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }, {
      "id_ubigeo": "4352",
      "nombre_ubigeo": "Usicayos",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Usicayos, Carabaya",
      "buscador_ubigeo": "usicayos carabaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4342"
    }],
    "4353": [{
      "id_ubigeo": "4355",
      "nombre_ubigeo": "Desaguadero",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Desaguadero, Chucuito",
      "buscador_ubigeo": "desaguadero chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }, {
      "id_ubigeo": "4356",
      "nombre_ubigeo": "Huacullani",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huacullani, Chucuito",
      "buscador_ubigeo": "huacullani chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }, {
      "id_ubigeo": "4354",
      "nombre_ubigeo": "Juli",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Juli, Chucuito",
      "buscador_ubigeo": "juli chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }, {
      "id_ubigeo": "4357",
      "nombre_ubigeo": "Kelluyo",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Kelluyo, Chucuito",
      "buscador_ubigeo": "kelluyo chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }, {
      "id_ubigeo": "4358",
      "nombre_ubigeo": "Pisacoma",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pisacoma, Chucuito",
      "buscador_ubigeo": "pisacoma chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }, {
      "id_ubigeo": "4359",
      "nombre_ubigeo": "Pomata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pomata, Chucuito",
      "buscador_ubigeo": "pomata chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }, {
      "id_ubigeo": "4360",
      "nombre_ubigeo": "Zepita",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Zepita, Chucuito",
      "buscador_ubigeo": "zepita chucuito",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4353"
    }],
    "4361": [{
      "id_ubigeo": "4363",
      "nombre_ubigeo": "Capazo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Capazo, El Collao",
      "buscador_ubigeo": "capazo el collao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4361"
    }, {
      "id_ubigeo": "4366",
      "nombre_ubigeo": "Conduriri",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Conduriri, El Collao",
      "buscador_ubigeo": "conduriri el collao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4361"
    }, {
      "id_ubigeo": "4362",
      "nombre_ubigeo": "Ilave",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ilave, El Collao",
      "buscador_ubigeo": "ilave el collao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4361"
    }, {
      "id_ubigeo": "4364",
      "nombre_ubigeo": "Pilcuyo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Pilcuyo, El Collao",
      "buscador_ubigeo": "pilcuyo el collao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4361"
    }, {
      "id_ubigeo": "4365",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Santa Rosa, El Collao",
      "buscador_ubigeo": "santa rosa el collao",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4361"
    }],
    "4367": [{
      "id_ubigeo": "4369",
      "nombre_ubigeo": "Cojata",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cojata, Huancane",
      "buscador_ubigeo": "cojata huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4368",
      "nombre_ubigeo": "Huancane",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Huancane, Huancane",
      "buscador_ubigeo": "huancane huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4370",
      "nombre_ubigeo": "Huatasani",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huatasani, Huancane",
      "buscador_ubigeo": "huatasani huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4371",
      "nombre_ubigeo": "Inchupalla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Inchupalla, Huancane",
      "buscador_ubigeo": "inchupalla huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4372",
      "nombre_ubigeo": "Pusi",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pusi, Huancane",
      "buscador_ubigeo": "pusi huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4373",
      "nombre_ubigeo": "Rosaspata",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Rosaspata, Huancane",
      "buscador_ubigeo": "rosaspata huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4374",
      "nombre_ubigeo": "Taraco",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Taraco, Huancane",
      "buscador_ubigeo": "taraco huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }, {
      "id_ubigeo": "4375",
      "nombre_ubigeo": "Vilque Chico",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Vilque Chico, Huancane",
      "buscador_ubigeo": "vilque chico huancane",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4367"
    }],
    "4376": [{
      "id_ubigeo": "4378",
      "nombre_ubigeo": "Cabanilla",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cabanilla, Lampa",
      "buscador_ubigeo": "cabanilla lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4379",
      "nombre_ubigeo": "Calapuja",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Calapuja, Lampa",
      "buscador_ubigeo": "calapuja lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4377",
      "nombre_ubigeo": "Lampa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Lampa, Lampa",
      "buscador_ubigeo": "lampa lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4380",
      "nombre_ubigeo": "Nicasio",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Nicasio, Lampa",
      "buscador_ubigeo": "nicasio lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4381",
      "nombre_ubigeo": "Ocuviri",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ocuviri, Lampa",
      "buscador_ubigeo": "ocuviri lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4382",
      "nombre_ubigeo": "Palca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Palca, Lampa",
      "buscador_ubigeo": "palca lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4383",
      "nombre_ubigeo": "Paratia",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Paratia, Lampa",
      "buscador_ubigeo": "paratia lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4384",
      "nombre_ubigeo": "Pucara",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pucara, Lampa",
      "buscador_ubigeo": "pucara lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4385",
      "nombre_ubigeo": "Santa Lucia",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Santa Lucia, Lampa",
      "buscador_ubigeo": "santa lucia lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }, {
      "id_ubigeo": "4386",
      "nombre_ubigeo": "Vilavila",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Vilavila, Lampa",
      "buscador_ubigeo": "vilavila lampa",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4376"
    }],
    "4387": [{
      "id_ubigeo": "4389",
      "nombre_ubigeo": "Antauta",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Antauta, Melgar",
      "buscador_ubigeo": "antauta melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4388",
      "nombre_ubigeo": "Ayaviri",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Ayaviri, Melgar",
      "buscador_ubigeo": "ayaviri melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4390",
      "nombre_ubigeo": "Cupi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cupi, Melgar",
      "buscador_ubigeo": "cupi melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4391",
      "nombre_ubigeo": "Llalli",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Llalli, Melgar",
      "buscador_ubigeo": "llalli melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4392",
      "nombre_ubigeo": "Macari",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Macari, Melgar",
      "buscador_ubigeo": "macari melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4393",
      "nombre_ubigeo": "Nuqoa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Nuqoa, Melgar",
      "buscador_ubigeo": "nuqoa melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4394",
      "nombre_ubigeo": "Orurillo",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Orurillo, Melgar",
      "buscador_ubigeo": "orurillo melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4395",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Santa Rosa, Melgar",
      "buscador_ubigeo": "santa rosa melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }, {
      "id_ubigeo": "4396",
      "nombre_ubigeo": "Umachiri",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Umachiri, Melgar",
      "buscador_ubigeo": "umachiri melgar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4387"
    }],
    "4397": [{
      "id_ubigeo": "4399",
      "nombre_ubigeo": "Conima",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Conima, Moho",
      "buscador_ubigeo": "conima moho",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4397"
    }, {
      "id_ubigeo": "4400",
      "nombre_ubigeo": "Huayrapata",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huayrapata, Moho",
      "buscador_ubigeo": "huayrapata moho",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4397"
    }, {
      "id_ubigeo": "4398",
      "nombre_ubigeo": "Moho",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Moho, Moho",
      "buscador_ubigeo": "moho moho",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4397"
    }, {
      "id_ubigeo": "4401",
      "nombre_ubigeo": "Tilali",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Tilali, Moho",
      "buscador_ubigeo": "tilali moho",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4397"
    }],
    "4310": [{
      "id_ubigeo": "4312",
      "nombre_ubigeo": "Acora",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Acora, Puno",
      "buscador_ubigeo": "acora puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4313",
      "nombre_ubigeo": "Amantani",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Amantani, Puno",
      "buscador_ubigeo": "amantani puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4314",
      "nombre_ubigeo": "Atuncolla",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Atuncolla, Puno",
      "buscador_ubigeo": "atuncolla puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4315",
      "nombre_ubigeo": "Capachica",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Capachica, Puno",
      "buscador_ubigeo": "capachica puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4316",
      "nombre_ubigeo": "Chucuito",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Chucuito, Puno",
      "buscador_ubigeo": "chucuito puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4317",
      "nombre_ubigeo": "Coata",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Coata, Puno",
      "buscador_ubigeo": "coata puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4318",
      "nombre_ubigeo": "Huata",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Huata, Puno",
      "buscador_ubigeo": "huata puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4319",
      "nombre_ubigeo": "Maqazo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Maqazo, Puno",
      "buscador_ubigeo": "maqazo puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4320",
      "nombre_ubigeo": "Paucarcolla",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Paucarcolla, Puno",
      "buscador_ubigeo": "paucarcolla puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4321",
      "nombre_ubigeo": "Pichacani",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Pichacani, Puno",
      "buscador_ubigeo": "pichacani puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4322",
      "nombre_ubigeo": "Plateria",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "Plateria, Puno",
      "buscador_ubigeo": "plateria puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4311",
      "nombre_ubigeo": "Puno",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Puno, Puno",
      "buscador_ubigeo": "puno puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4323",
      "nombre_ubigeo": "San Antonio",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "San Antonio, Puno",
      "buscador_ubigeo": "san antonio puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4324",
      "nombre_ubigeo": "Tiquillaca",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Tiquillaca, Puno",
      "buscador_ubigeo": "tiquillaca puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }, {
      "id_ubigeo": "4325",
      "nombre_ubigeo": "Vilque",
      "codigo_ubigeo": "15",
      "etiqueta_ubigeo": "Vilque, Puno",
      "buscador_ubigeo": "vilque puno",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4310"
    }],
    "4402": [{
      "id_ubigeo": "4404",
      "nombre_ubigeo": "Ananea",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ananea, San Antonio de Putina",
      "buscador_ubigeo": "ananea san antonio de putina",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4402"
    }, {
      "id_ubigeo": "4405",
      "nombre_ubigeo": "Pedro Vilca Apaza",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Pedro Vilca Apaza, San Antonio de Putina",
      "buscador_ubigeo": "pedro vilca apaza san antonio de putina",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4402"
    }, {
      "id_ubigeo": "4403",
      "nombre_ubigeo": "Putina",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Putina, San Antonio de Putina",
      "buscador_ubigeo": "putina san antonio de putina",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4402"
    }, {
      "id_ubigeo": "4406",
      "nombre_ubigeo": "Quilcapuncu",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Quilcapuncu, San Antonio de Putina",
      "buscador_ubigeo": "quilcapuncu san antonio de putina",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4402"
    }, {
      "id_ubigeo": "4407",
      "nombre_ubigeo": "Sina",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Sina, San Antonio de Putina",
      "buscador_ubigeo": "sina san antonio de putina",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4402"
    }],
    "4408": [{
      "id_ubigeo": "4410",
      "nombre_ubigeo": "Cabana",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cabana, San Roman",
      "buscador_ubigeo": "cabana san roman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4408"
    }, {
      "id_ubigeo": "4411",
      "nombre_ubigeo": "Cabanillas",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cabanillas, San Roman",
      "buscador_ubigeo": "cabanillas san roman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4408"
    }, {
      "id_ubigeo": "4412",
      "nombre_ubigeo": "Caracoto",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Caracoto, San Roman",
      "buscador_ubigeo": "caracoto san roman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4408"
    }, {
      "id_ubigeo": "4409",
      "nombre_ubigeo": "Juliaca",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Juliaca, San Roman",
      "buscador_ubigeo": "juliaca san roman",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4408"
    }],
    "4413": [{
      "id_ubigeo": "4422",
      "nombre_ubigeo": "Alto Inambari",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Alto Inambari, Sandia",
      "buscador_ubigeo": "alto inambari sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4415",
      "nombre_ubigeo": "Cuyocuyo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cuyocuyo, Sandia",
      "buscador_ubigeo": "cuyocuyo sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4416",
      "nombre_ubigeo": "Limbani",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Limbani, Sandia",
      "buscador_ubigeo": "limbani sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4417",
      "nombre_ubigeo": "Patambuco",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Patambuco, Sandia",
      "buscador_ubigeo": "patambuco sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4418",
      "nombre_ubigeo": "Phara",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Phara, Sandia",
      "buscador_ubigeo": "phara sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4419",
      "nombre_ubigeo": "Quiaca",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Quiaca, Sandia",
      "buscador_ubigeo": "quiaca sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4420",
      "nombre_ubigeo": "San Juan del Oro",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Juan del Oro, Sandia",
      "buscador_ubigeo": "san juan del oro sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4414",
      "nombre_ubigeo": "Sandia",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Sandia, Sandia",
      "buscador_ubigeo": "sandia sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }, {
      "id_ubigeo": "4421",
      "nombre_ubigeo": "Yanahuaya",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yanahuaya, Sandia",
      "buscador_ubigeo": "yanahuaya sandia",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4413"
    }],
    "4423": [{
      "id_ubigeo": "4425",
      "nombre_ubigeo": "Anapia",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Anapia, Yunguyo",
      "buscador_ubigeo": "anapia yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }, {
      "id_ubigeo": "4426",
      "nombre_ubigeo": "Copani",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Copani, Yunguyo",
      "buscador_ubigeo": "copani yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }, {
      "id_ubigeo": "4427",
      "nombre_ubigeo": "Cuturapi",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Cuturapi, Yunguyo",
      "buscador_ubigeo": "cuturapi yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }, {
      "id_ubigeo": "4428",
      "nombre_ubigeo": "Ollaraya",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Ollaraya, Yunguyo",
      "buscador_ubigeo": "ollaraya yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }, {
      "id_ubigeo": "4429",
      "nombre_ubigeo": "Tinicachi",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Tinicachi, Yunguyo",
      "buscador_ubigeo": "tinicachi yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }, {
      "id_ubigeo": "4430",
      "nombre_ubigeo": "Unicachi",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Unicachi, Yunguyo",
      "buscador_ubigeo": "unicachi yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }, {
      "id_ubigeo": "4424",
      "nombre_ubigeo": "Yunguyo",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Yunguyo, Yunguyo",
      "buscador_ubigeo": "yunguyo yunguyo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4423"
    }],
    "4439": [{
      "id_ubigeo": "4441",
      "nombre_ubigeo": "Alto Biavo",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Biavo, Bellavista",
      "buscador_ubigeo": "alto biavo bellavista",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4439"
    }, {
      "id_ubigeo": "4442",
      "nombre_ubigeo": "Bajo Biavo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Bajo Biavo, Bellavista",
      "buscador_ubigeo": "bajo biavo bellavista",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4439"
    }, {
      "id_ubigeo": "4440",
      "nombre_ubigeo": "Bellavista",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Bellavista, Bellavista",
      "buscador_ubigeo": "bellavista bellavista",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4439"
    }, {
      "id_ubigeo": "4443",
      "nombre_ubigeo": "Huallaga",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Huallaga, Bellavista",
      "buscador_ubigeo": "huallaga bellavista",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4439"
    }, {
      "id_ubigeo": "4444",
      "nombre_ubigeo": "San Pablo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Pablo, Bellavista",
      "buscador_ubigeo": "san pablo bellavista",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4439"
    }, {
      "id_ubigeo": "4445",
      "nombre_ubigeo": "San Rafael",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Rafael, Bellavista",
      "buscador_ubigeo": "san rafael bellavista",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4439"
    }],
    "4446": [{
      "id_ubigeo": "4448",
      "nombre_ubigeo": "Agua Blanca",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Agua Blanca, El Dorado",
      "buscador_ubigeo": "agua blanca el dorado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4446"
    }, {
      "id_ubigeo": "4447",
      "nombre_ubigeo": "San Jose de Sisa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "San Jose de Sisa, El Dorado",
      "buscador_ubigeo": "san jose de sisa el dorado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4446"
    }, {
      "id_ubigeo": "4449",
      "nombre_ubigeo": "San Martin",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "San Martin, El Dorado",
      "buscador_ubigeo": "san martin el dorado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4446"
    }, {
      "id_ubigeo": "4450",
      "nombre_ubigeo": "Santa Rosa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Santa Rosa, El Dorado",
      "buscador_ubigeo": "santa rosa el dorado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4446"
    }, {
      "id_ubigeo": "4451",
      "nombre_ubigeo": "Shatoja",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Shatoja, El Dorado",
      "buscador_ubigeo": "shatoja el dorado",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4446"
    }],
    "4452": [{
      "id_ubigeo": "4454",
      "nombre_ubigeo": "Alto Saposoa",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto Saposoa, Huallaga",
      "buscador_ubigeo": "alto saposoa huallaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4452"
    }, {
      "id_ubigeo": "4455",
      "nombre_ubigeo": "El Eslabon",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "El Eslabon, Huallaga",
      "buscador_ubigeo": "el eslabon huallaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4452"
    }, {
      "id_ubigeo": "4456",
      "nombre_ubigeo": "Piscoyacu",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Piscoyacu, Huallaga",
      "buscador_ubigeo": "piscoyacu huallaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4452"
    }, {
      "id_ubigeo": "4457",
      "nombre_ubigeo": "Sacanche",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Sacanche, Huallaga",
      "buscador_ubigeo": "sacanche huallaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4452"
    }, {
      "id_ubigeo": "4453",
      "nombre_ubigeo": "Saposoa",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Saposoa, Huallaga",
      "buscador_ubigeo": "saposoa huallaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4452"
    }, {
      "id_ubigeo": "4458",
      "nombre_ubigeo": "Tingo de Saposoa",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Tingo de Saposoa, Huallaga",
      "buscador_ubigeo": "tingo de saposoa huallaga",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4452"
    }],
    "4459": [{
      "id_ubigeo": "4461",
      "nombre_ubigeo": "Alonso de Alvarado",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alonso de Alvarado, Lamas",
      "buscador_ubigeo": "alonso de alvarado lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4462",
      "nombre_ubigeo": "Barranquita",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Barranquita, Lamas",
      "buscador_ubigeo": "barranquita lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4463",
      "nombre_ubigeo": "Caynarachi",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Caynarachi, Lamas",
      "buscador_ubigeo": "caynarachi lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4464",
      "nombre_ubigeo": "Cuqumbuqui",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Cuqumbuqui, Lamas",
      "buscador_ubigeo": "cuqumbuqui lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4460",
      "nombre_ubigeo": "Lamas",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Lamas, Lamas",
      "buscador_ubigeo": "lamas lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4465",
      "nombre_ubigeo": "Pinto Recodo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pinto Recodo, Lamas",
      "buscador_ubigeo": "pinto recodo lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4466",
      "nombre_ubigeo": "Rumisapa",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Rumisapa, Lamas",
      "buscador_ubigeo": "rumisapa lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4467",
      "nombre_ubigeo": "San Roque de Cumbaza",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "San Roque de Cumbaza, Lamas",
      "buscador_ubigeo": "san roque de cumbaza lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4468",
      "nombre_ubigeo": "Shanao",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Shanao, Lamas",
      "buscador_ubigeo": "shanao lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4469",
      "nombre_ubigeo": "Tabalosos",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Tabalosos, Lamas",
      "buscador_ubigeo": "tabalosos lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }, {
      "id_ubigeo": "4470",
      "nombre_ubigeo": "Zapatero",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Zapatero, Lamas",
      "buscador_ubigeo": "zapatero lamas",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4459"
    }],
    "4471": [{
      "id_ubigeo": "4473",
      "nombre_ubigeo": "Campanilla",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Campanilla, Mariscal Caceres",
      "buscador_ubigeo": "campanilla mariscal caceres",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4471"
    }, {
      "id_ubigeo": "4474",
      "nombre_ubigeo": "Huicungo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Huicungo, Mariscal Caceres",
      "buscador_ubigeo": "huicungo mariscal caceres",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4471"
    }, {
      "id_ubigeo": "4472",
      "nombre_ubigeo": "Juanjui",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Juanjui, Mariscal Caceres",
      "buscador_ubigeo": "juanjui mariscal caceres",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4471"
    }, {
      "id_ubigeo": "4475",
      "nombre_ubigeo": "Pachiza",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pachiza, Mariscal Caceres",
      "buscador_ubigeo": "pachiza mariscal caceres",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4471"
    }, {
      "id_ubigeo": "4476",
      "nombre_ubigeo": "Pajarillo",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pajarillo, Mariscal Caceres",
      "buscador_ubigeo": "pajarillo mariscal caceres",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4471"
    }],
    "4432": [{
      "id_ubigeo": "4434",
      "nombre_ubigeo": "Calzada",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Calzada, Moyobamba",
      "buscador_ubigeo": "calzada moyobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4432"
    }, {
      "id_ubigeo": "4435",
      "nombre_ubigeo": "Habana",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Habana, Moyobamba",
      "buscador_ubigeo": "habana moyobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4432"
    }, {
      "id_ubigeo": "4436",
      "nombre_ubigeo": "Jepelacio",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Jepelacio, Moyobamba",
      "buscador_ubigeo": "jepelacio moyobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4432"
    }, {
      "id_ubigeo": "4433",
      "nombre_ubigeo": "Moyobamba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Moyobamba, Moyobamba",
      "buscador_ubigeo": "moyobamba moyobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4432"
    }, {
      "id_ubigeo": "4437",
      "nombre_ubigeo": "Soritor",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Soritor, Moyobamba",
      "buscador_ubigeo": "soritor moyobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4432"
    }, {
      "id_ubigeo": "4438",
      "nombre_ubigeo": "Yantalo",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Yantalo, Moyobamba",
      "buscador_ubigeo": "yantalo moyobamba",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4432"
    }],
    "4477": [{
      "id_ubigeo": "4479",
      "nombre_ubigeo": "Buenos Aires",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Buenos Aires, Picota",
      "buscador_ubigeo": "buenos aires picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4480",
      "nombre_ubigeo": "Caspisapa",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Caspisapa, Picota",
      "buscador_ubigeo": "caspisapa picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4478",
      "nombre_ubigeo": "Picota",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Picota, Picota",
      "buscador_ubigeo": "picota picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4481",
      "nombre_ubigeo": "Pilluana",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pilluana, Picota",
      "buscador_ubigeo": "pilluana picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4482",
      "nombre_ubigeo": "Pucacaca",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pucacaca, Picota",
      "buscador_ubigeo": "pucacaca picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4483",
      "nombre_ubigeo": "San Cristobal",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Cristobal, Picota",
      "buscador_ubigeo": "san cristobal picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4484",
      "nombre_ubigeo": "San Hilarion",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Hilarion, Picota",
      "buscador_ubigeo": "san hilarion picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4485",
      "nombre_ubigeo": "Shamboyacu",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Shamboyacu, Picota",
      "buscador_ubigeo": "shamboyacu picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4486",
      "nombre_ubigeo": "Tingo de Ponasa",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Tingo de Ponasa, Picota",
      "buscador_ubigeo": "tingo de ponasa picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }, {
      "id_ubigeo": "4487",
      "nombre_ubigeo": "Tres Unidos",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Tres Unidos, Picota",
      "buscador_ubigeo": "tres unidos picota",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4477"
    }],
    "4488": [{
      "id_ubigeo": "4490",
      "nombre_ubigeo": "Awajun",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Awajun, Rioja",
      "buscador_ubigeo": "awajun rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4491",
      "nombre_ubigeo": "Elias Soplin Vargas",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Elias Soplin Vargas, Rioja",
      "buscador_ubigeo": "elias soplin vargas rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4492",
      "nombre_ubigeo": "Nueva Cajamarca",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Nueva Cajamarca, Rioja",
      "buscador_ubigeo": "nueva cajamarca rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4493",
      "nombre_ubigeo": "Pardo Miguel",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Pardo Miguel, Rioja",
      "buscador_ubigeo": "pardo miguel rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4494",
      "nombre_ubigeo": "Posic",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Posic, Rioja",
      "buscador_ubigeo": "posic rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4489",
      "nombre_ubigeo": "Rioja",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Rioja, Rioja",
      "buscador_ubigeo": "rioja rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4495",
      "nombre_ubigeo": "San Fernando",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "San Fernando, Rioja",
      "buscador_ubigeo": "san fernando rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4496",
      "nombre_ubigeo": "Yorongos",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Yorongos, Rioja",
      "buscador_ubigeo": "yorongos rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }, {
      "id_ubigeo": "4497",
      "nombre_ubigeo": "Yuracyacu",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Yuracyacu, Rioja",
      "buscador_ubigeo": "yuracyacu rioja",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4488"
    }],
    "4498": [{
      "id_ubigeo": "4500",
      "nombre_ubigeo": "Alberto Leveau",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alberto Leveau, San Martin",
      "buscador_ubigeo": "alberto leveau san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4501",
      "nombre_ubigeo": "Cacatachi",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Cacatachi, San Martin",
      "buscador_ubigeo": "cacatachi san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4502",
      "nombre_ubigeo": "Chazuta",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Chazuta, San Martin",
      "buscador_ubigeo": "chazuta san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4503",
      "nombre_ubigeo": "Chipurana",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Chipurana, San Martin",
      "buscador_ubigeo": "chipurana san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4504",
      "nombre_ubigeo": "El Porvenir",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "El Porvenir, San Martin",
      "buscador_ubigeo": "el porvenir san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4505",
      "nombre_ubigeo": "Huimbayoc",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Huimbayoc, San Martin",
      "buscador_ubigeo": "huimbayoc san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4506",
      "nombre_ubigeo": "Juan Guerra",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Juan Guerra, San Martin",
      "buscador_ubigeo": "juan guerra san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4507",
      "nombre_ubigeo": "La Banda de Shilcayo",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "La Banda de Shilcayo, San Martin",
      "buscador_ubigeo": "la banda de shilcayo san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4508",
      "nombre_ubigeo": "Morales",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Morales, San Martin",
      "buscador_ubigeo": "morales san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4509",
      "nombre_ubigeo": "Papaplaya",
      "codigo_ubigeo": "11",
      "etiqueta_ubigeo": "Papaplaya, San Martin",
      "buscador_ubigeo": "papaplaya san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4510",
      "nombre_ubigeo": "San Antonio",
      "codigo_ubigeo": "12",
      "etiqueta_ubigeo": "San Antonio, San Martin",
      "buscador_ubigeo": "san antonio san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4511",
      "nombre_ubigeo": "Sauce",
      "codigo_ubigeo": "13",
      "etiqueta_ubigeo": "Sauce, San Martin",
      "buscador_ubigeo": "sauce san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4512",
      "nombre_ubigeo": "Shapaja",
      "codigo_ubigeo": "14",
      "etiqueta_ubigeo": "Shapaja, San Martin",
      "buscador_ubigeo": "shapaja san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }, {
      "id_ubigeo": "4499",
      "nombre_ubigeo": "Tarapoto",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tarapoto, San Martin",
      "buscador_ubigeo": "tarapoto san martin",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4498"
    }],
    "4513": [{
      "id_ubigeo": "4515",
      "nombre_ubigeo": "Nuevo Progreso",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Nuevo Progreso, Tocache",
      "buscador_ubigeo": "nuevo progreso tocache",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4513"
    }, {
      "id_ubigeo": "4516",
      "nombre_ubigeo": "Polvora",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Polvora, Tocache",
      "buscador_ubigeo": "polvora tocache",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4513"
    }, {
      "id_ubigeo": "4517",
      "nombre_ubigeo": "Shunte",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Shunte, Tocache",
      "buscador_ubigeo": "shunte tocache",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4513"
    }, {
      "id_ubigeo": "4514",
      "nombre_ubigeo": "Tocache",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tocache, Tocache",
      "buscador_ubigeo": "tocache tocache",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4513"
    }, {
      "id_ubigeo": "4518",
      "nombre_ubigeo": "Uchiza",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Uchiza, Tocache",
      "buscador_ubigeo": "uchiza tocache",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4513"
    }],
    "4531": [{
      "id_ubigeo": "4533",
      "nombre_ubigeo": "Cairani",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Cairani, Candarave",
      "buscador_ubigeo": "cairani candarave",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4531"
    }, {
      "id_ubigeo": "4534",
      "nombre_ubigeo": "Camilaca",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Camilaca, Candarave",
      "buscador_ubigeo": "camilaca candarave",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4531"
    }, {
      "id_ubigeo": "4532",
      "nombre_ubigeo": "Candarave",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Candarave, Candarave",
      "buscador_ubigeo": "candarave candarave",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4531"
    }, {
      "id_ubigeo": "4535",
      "nombre_ubigeo": "Curibaya",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Curibaya, Candarave",
      "buscador_ubigeo": "curibaya candarave",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4531"
    }, {
      "id_ubigeo": "4536",
      "nombre_ubigeo": "Huanuara",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Huanuara, Candarave",
      "buscador_ubigeo": "huanuara candarave",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4531"
    }, {
      "id_ubigeo": "4537",
      "nombre_ubigeo": "Quilahuani",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Quilahuani, Candarave",
      "buscador_ubigeo": "quilahuani candarave",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4531"
    }],
    "4538": [{
      "id_ubigeo": "4540",
      "nombre_ubigeo": "Ilabaya",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Ilabaya, Jorge Basadre",
      "buscador_ubigeo": "ilabaya jorge basadre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4538"
    }, {
      "id_ubigeo": "4541",
      "nombre_ubigeo": "Ite",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Ite, Jorge Basadre",
      "buscador_ubigeo": "ite jorge basadre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4538"
    }, {
      "id_ubigeo": "4539",
      "nombre_ubigeo": "Locumba",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Locumba, Jorge Basadre",
      "buscador_ubigeo": "locumba jorge basadre",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4538"
    }],
    "4520": [{
      "id_ubigeo": "4522",
      "nombre_ubigeo": "Alto de la Alianza",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Alto de la Alianza, Tacna",
      "buscador_ubigeo": "alto de la alianza tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4523",
      "nombre_ubigeo": "Calana",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Calana, Tacna",
      "buscador_ubigeo": "calana tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4524",
      "nombre_ubigeo": "Ciudad Nueva",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Ciudad Nueva, Tacna",
      "buscador_ubigeo": "ciudad nueva tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4530",
      "nombre_ubigeo": "Cor Gregorio Albarrac\u00edn",
      "codigo_ubigeo": "10",
      "etiqueta_ubigeo": "Cor Gregorio Albarrac\u00edn, Tacna",
      "buscador_ubigeo": "cor gregorio albarrac\u00edn tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4525",
      "nombre_ubigeo": "Inclan",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Inclan, Tacna",
      "buscador_ubigeo": "inclan tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4526",
      "nombre_ubigeo": "Pachia",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Pachia, Tacna",
      "buscador_ubigeo": "pachia tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4527",
      "nombre_ubigeo": "Palca",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Palca, Tacna",
      "buscador_ubigeo": "palca tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4528",
      "nombre_ubigeo": "Pocollay",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Pocollay, Tacna",
      "buscador_ubigeo": "pocollay tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4529",
      "nombre_ubigeo": "Sama",
      "codigo_ubigeo": "09",
      "etiqueta_ubigeo": "Sama, Tacna",
      "buscador_ubigeo": "sama tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }, {
      "id_ubigeo": "4521",
      "nombre_ubigeo": "Tacna",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tacna, Tacna",
      "buscador_ubigeo": "tacna tacna",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4520"
    }],
    "4542": [{
      "id_ubigeo": "4544",
      "nombre_ubigeo": "Chucatamani",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Chucatamani, Tarata",
      "buscador_ubigeo": "chucatamani tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4545",
      "nombre_ubigeo": "Estique",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Estique, Tarata",
      "buscador_ubigeo": "estique tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4546",
      "nombre_ubigeo": "Estique-Pampa",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Estique-Pampa, Tarata",
      "buscador_ubigeo": "estique-pampa tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4547",
      "nombre_ubigeo": "Sitajara",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Sitajara, Tarata",
      "buscador_ubigeo": "sitajara tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4548",
      "nombre_ubigeo": "Susapaya",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Susapaya, Tarata",
      "buscador_ubigeo": "susapaya tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4543",
      "nombre_ubigeo": "Tarata",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tarata, Tarata",
      "buscador_ubigeo": "tarata tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4549",
      "nombre_ubigeo": "Tarucachi",
      "codigo_ubigeo": "07",
      "etiqueta_ubigeo": "Tarucachi, Tarata",
      "buscador_ubigeo": "tarucachi tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }, {
      "id_ubigeo": "4550",
      "nombre_ubigeo": "Ticaco",
      "codigo_ubigeo": "08",
      "etiqueta_ubigeo": "Ticaco, Tarata",
      "buscador_ubigeo": "ticaco tarata",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4542"
    }],
    "4559": [{
      "id_ubigeo": "4561",
      "nombre_ubigeo": "Casitas",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Casitas, Contralmirante Villar",
      "buscador_ubigeo": "casitas contralmirante villar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4559"
    }, {
      "id_ubigeo": "4560",
      "nombre_ubigeo": "Zorritos",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Zorritos, Contralmirante Villar",
      "buscador_ubigeo": "zorritos contralmirante villar",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4559"
    }],
    "4552": [{
      "id_ubigeo": "4554",
      "nombre_ubigeo": "Corrales",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Corrales, Tumbes",
      "buscador_ubigeo": "corrales tumbes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4552"
    }, {
      "id_ubigeo": "4555",
      "nombre_ubigeo": "La Cruz",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "La Cruz, Tumbes",
      "buscador_ubigeo": "la cruz tumbes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4552"
    }, {
      "id_ubigeo": "4556",
      "nombre_ubigeo": "Pampas de Hospital",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Pampas de Hospital, Tumbes",
      "buscador_ubigeo": "pampas de hospital tumbes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4552"
    }, {
      "id_ubigeo": "4557",
      "nombre_ubigeo": "San Jacinto",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "San Jacinto, Tumbes",
      "buscador_ubigeo": "san jacinto tumbes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4552"
    }, {
      "id_ubigeo": "4558",
      "nombre_ubigeo": "San Juan de la Virgen",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "San Juan de la Virgen, Tumbes",
      "buscador_ubigeo": "san juan de la virgen tumbes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4552"
    }, {
      "id_ubigeo": "4553",
      "nombre_ubigeo": "Tumbes",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Tumbes, Tumbes",
      "buscador_ubigeo": "tumbes tumbes",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4552"
    }],
    "4562": [{
      "id_ubigeo": "4564",
      "nombre_ubigeo": "Aguas Verdes",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Aguas Verdes, Zarumilla",
      "buscador_ubigeo": "aguas verdes zarumilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4562"
    }, {
      "id_ubigeo": "4565",
      "nombre_ubigeo": "Matapalo",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Matapalo, Zarumilla",
      "buscador_ubigeo": "matapalo zarumilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4562"
    }, {
      "id_ubigeo": "4566",
      "nombre_ubigeo": "Papayal",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Papayal, Zarumilla",
      "buscador_ubigeo": "papayal zarumilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4562"
    }, {
      "id_ubigeo": "4563",
      "nombre_ubigeo": "Zarumilla",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Zarumilla, Zarumilla",
      "buscador_ubigeo": "zarumilla zarumilla",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4562"
    }],
    "4575": [{
      "id_ubigeo": "4576",
      "nombre_ubigeo": "Raymondi",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Raymondi, Atalaya",
      "buscador_ubigeo": "raymondi atalaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4575"
    }, {
      "id_ubigeo": "4577",
      "nombre_ubigeo": "Sepahua",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Sepahua, Atalaya",
      "buscador_ubigeo": "sepahua atalaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4575"
    }, {
      "id_ubigeo": "4578",
      "nombre_ubigeo": "Tahuania",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Tahuania, Atalaya",
      "buscador_ubigeo": "tahuania atalaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4575"
    }, {
      "id_ubigeo": "4579",
      "nombre_ubigeo": "Yurua",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Yurua, Atalaya",
      "buscador_ubigeo": "yurua atalaya",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4575"
    }],
    "4568": [{
      "id_ubigeo": "4569",
      "nombre_ubigeo": "Calleria",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Calleria, Coronel Portillo",
      "buscador_ubigeo": "calleria coronel portillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4568"
    }, {
      "id_ubigeo": "4570",
      "nombre_ubigeo": "Campoverde",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Campoverde, Coronel Portillo",
      "buscador_ubigeo": "campoverde coronel portillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4568"
    }, {
      "id_ubigeo": "4571",
      "nombre_ubigeo": "Iparia",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Iparia, Coronel Portillo",
      "buscador_ubigeo": "iparia coronel portillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4568"
    }, {
      "id_ubigeo": "4572",
      "nombre_ubigeo": "Masisea",
      "codigo_ubigeo": "04",
      "etiqueta_ubigeo": "Masisea, Coronel Portillo",
      "buscador_ubigeo": "masisea coronel portillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4568"
    }, {
      "id_ubigeo": "4574",
      "nombre_ubigeo": "Nueva Requena",
      "codigo_ubigeo": "06",
      "etiqueta_ubigeo": "Nueva Requena, Coronel Portillo",
      "buscador_ubigeo": "nueva requena coronel portillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4568"
    }, {
      "id_ubigeo": "4573",
      "nombre_ubigeo": "Yarinacocha",
      "codigo_ubigeo": "05",
      "etiqueta_ubigeo": "Yarinacocha, Coronel Portillo",
      "buscador_ubigeo": "yarinacocha coronel portillo",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4568"
    }],
    "4580": [{
      "id_ubigeo": "4583",
      "nombre_ubigeo": "Curimana",
      "codigo_ubigeo": "03",
      "etiqueta_ubigeo": "Curimana, Padre Abad",
      "buscador_ubigeo": "curimana padre abad",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4580"
    }, {
      "id_ubigeo": "4582",
      "nombre_ubigeo": "Irazola",
      "codigo_ubigeo": "02",
      "etiqueta_ubigeo": "Irazola, Padre Abad",
      "buscador_ubigeo": "irazola padre abad",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4580"
    }, {
      "id_ubigeo": "4581",
      "nombre_ubigeo": "Padre Abad",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Padre Abad, Padre Abad",
      "buscador_ubigeo": "padre abad padre abad",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4580"
    }],
    "4584": [{
      "id_ubigeo": "4585",
      "nombre_ubigeo": "Purus",
      "codigo_ubigeo": "01",
      "etiqueta_ubigeo": "Purus, Purus",
      "buscador_ubigeo": "purus purus",
      "numero_hijos_ubigeo": "0",
      "nivel_ubigeo": "3",
      "id_padre_ubigeo": "4584"
    }]
  };
</script>
</body>

</html>