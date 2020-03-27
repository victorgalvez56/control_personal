<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                        <form action="<?php echo base_url(); ?>control/personal/store" method="POST">
                            <section class="content">
                                <div class="box box-primary">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-primary box-solid">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos Personales</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="imagen">Foto Personal:</label>
                                                                <span class="btn btn-default btn-file">
                                                                    Subir Foto <input type="file" name="imagen" required>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado">Grado:</label>
                                                                <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="GRAL DIV EP">GRAL DIV EP</option>
                                                                    <option value="GRAL BRIG EP">GRAL BRIG EP</option>
                                                                    <option value="CRL EP">CRL EP</option>
                                                                    <option value="TTE CRL EP">TTE CRL EP</option>
                                                                    <option value="MY EP">MY EP</option>
                                                                    <option value="CAP EP">CAP EP</option>
                                                                    <option value="TTE EP">TTE EP</option>
                                                                    <option value="STTE EP">STTE EP</option>
                                                                    <option value="ALFZ EP">ALFZ EP</option>
                                                                    <option value="TCOJS EP">TCOJS EP</option>
                                                                    <option value="TCOJ EP">TCOJ EP</option>
                                                                    <option value="TCO1 EP">TCO1 EP</option>
                                                                    <option value="TCO2 EP">TCO2 EP</option>
                                                                    <option value="TCO3 EP">TCO3 EP</option>
                                                                    <option value="SO1">SO1</option>
                                                                    <option value="SO2">SO2</option>
                                                                    <option value="SO3">SO3</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="estado_civ">Arma:</label>
                                                                <select class="form-control form-control-lg" id="arma" name="arma" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="ARTILLERIA">ARTILLERIA</option>
                                                                    <option value="CABALLERIA">CABALLERIA</option>
                                                                    <option value="COMUNICACIONES">COMUNICACIONES</option>
                                                                    <option value="INTELIGENCIA">INTELIGENCIA</option>
                                                                    <option value="ADMINISTRACION PERSONAL">ADMINISTRACION PERSONAL</option>
                                                                    <option value="MATERIAL DEFENSA">MATERIAL DEFENSA</option>
                                                                    <option value="SERVICIO CIENCIA Y TECNOLOGIA DEL EJERCITO">SERVICIO CIENCIA Y TECNOLOGIA DEL EJERCITO</option>
                                                                    <option value="SERVICIO JURIDICO">SERVICIO JURIDICO</option>
                                                                    <option value="SANIDAD">SANIDAD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_pat">Apellido Paterno:</label>
                                                                <input type="text" class="form-control" id="apellido_pat" name="apellido_pat" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="apellido_mat">Apellido Materno:</label>
                                                                <input type="text" class="form-control" id="apellido_mat" name="apellido_mat" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nombres">Nombres:</label>
                                                                <input type="text" class="form-control" id="nombres" name="nombres" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="estado_civ">Estado Civil:</label>
                                                                <select class="form-control form-control-lg" id="estado_civ" name="estado_civ" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="SOLTERO">SOLTERO</option>
                                                                    <option value="CASADO">CASADO</option>
                                                                    <option value="DIVORCIADO">DIVORCIADO</option>
                                                                    <option value="CONYUGUE">CONYUGUE</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="anios_serv">Años Servicio:</label>
                                                                <input type="number" class="form-control" id="anios_serv" name="anios_serv" style="text-transform: uppercase;" min="0" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado_instr">Grado de Instrucción:</label>
                                                                <select class="form-control form-control-lg" id="grado_instr" name="grado_instr" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="PRIMARIA">PRIMARIA</option>
                                                                    <option value="SECUNDARIA">SECUNDARIA</option>
                                                                    <option value="SUPERIOR">SUPERIOR</option>
                                                                    <option value="TECNICO">TECNICO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="religion">Religión:</label>
                                                                <input type="text" class="form-control" id="religion" name="religion" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fec_ult_asc">Fecha Último Ascenso:</label>
                                                                <input type="date" class="form-control" id="fec_ult_asc" name="fec_ult_asc" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Dirección Actual</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="departamento_viv">Departamento:</label>
                                                                <select class="form-control form-control-lg" id="departamento_viv" name="departamento_viv" required>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Provincia:</label>
                                                                <select class="form-control form-control-lg" id="provin_viv" name="provin_viv">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_viv">Distrito:</label>
                                                                <select class="form-control form-control-lg" id="distri_viv" name="distri_viv">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="urbanizacion">Urbanización:</label>
                                                                <input type="text" class="form-control" id="urbanizacion" name="urbanizacion" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="calle">Calle, Mz, Lote:</label>
                                                                <input type="text" class="form-control" id="calle" name="calle" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<div class="box-header with-border">
                                                    <h3 class="box-title">Teléfono</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="telefono">Número:</label>
                                                                <input type="number" class="form-control" id="numero" min="0" name="telefono" style="text-transform: uppercase;" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;"  required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Operador:</label>
                                                                <input type="text" class="form-control" id="operador" name="operador" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="correo">Correo Electrónico:</label>
                                                                <input type="email" class="form-control" id="correo" name="correo" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Lugar y Fecha de Nacimiento</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="depart_nac">Departamento:</label>
                                                                <select class="form-control form-control-lg" id="depart_nac" name="depart_nac">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="provin_nac">Provincia:</label>
                                                                <select class="form-control form-control-lg" id="provin_nac" name="provin_nac">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="distri_nac">Distrito:</label>
                                                            <select class="form-control form-control-lg" id="distri_nac" name="distri_nac">
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="fecha_nac">Fecha:</label>
                                                                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" max="2002-01-01" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="edad">Edad:</label>
                                                                <input type="number" class="form-control" id="edad" name="edad" style="text-transform: uppercase;" min="18" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Documentos Personales</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="cip">CIP:</label>
                                                                <input type="number" class="form-control" name="cip" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="dni">DNI:</label>
                                                                <input type="number" class="form-control" name="dni" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="pasaporte">Pasaporte:</label>
                                                                <input type="text" class="form-control" id="pasaporte" name="pasaporte" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="brevete">Brevete:</label>
                                                                <select class="form-control form-control-lg" id="brevete" name="brevete" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="A-I">A-I</option>
                                                                    <option value="A-II-A">A-II-A</option>
                                                                    <option value="A-II-B">A-II-B</option>
                                                                    <option value="A-III-A">A-III-A</option>
                                                                    <option value="A-III-B">A-III-B</option>
                                                                    <option value="A-III-C">A-III-C</option>
                                                                    <option value="A-IV-ESPECIAL">A-IV-ESPECIAL</option>
                                                                    <option value="B-I">B-I</option>
                                                                    <option value="B-II-A">B-II-A</option>
                                                                    <option value="B-II-B">B-II-B</option>
                                                                    <option value="B-II-C">B-II-C</option>
                                                                    <option value="B">B</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Características Físicas</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="talla">Talla(m.):</label>
                                                                <input type="text" class="form-control" name="talla"  required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="peso">Peso(kg.):</label>
                                                                <input type="text" class="form-control" name="peso" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grupo_sang">Grupo Sanguíneo:</label>
                                                                <select class="form-control form-control-lg" id="grupo_sang" name="grupo_sang" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="A+">A+</option>
                                                                    <option value="A-">A-</option>
                                                                    <option value="B+">B+</option>
                                                                    <option value="B-">B-</option>
                                                                    <option value="AB+">AB+</option>
                                                                    <option value="AB-">AB-</option>
                                                                    <option value="O+">O+</option>
                                                                    <option value="O-">O-</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="religion">Sexo:</label>
                                                                <select class="form-control form-control-lg" id="sexo" name="sexo" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="MASCULINO">MASCULINO</option>
                                                                    <option value="FEMENINO">FEMENINO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Talla de Ropa</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="grado">Camisa/Blusa:</label>
                                                                <select class="form-control form-control-lg" id="camisa" name="camisa" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="S">S</option>
                                                                    <option value="M">M</option>
                                                                    <option value="L">L</option>
                                                                    <option value="XL">XL</option>
                                                                    <option value="XLL">XLL</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Pantalón:</label>
                                                                <select class="form-control form-control-lg" id="pantalon" name="pantalon" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="30">30</option>
                                                                    <option value="32">32</option>
                                                                    <option value="34">34</option>
                                                                    <option value="36">36</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="distri_viv">Calzado:</label>
                                                                <select class="form-control form-control-lg" id="calzado" name="calzado" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                    <option value="41">41</option>
                                                                    <option value="42">43</option>
                                                                    <option value="43">43</option>
                                                                    <option value="44">44</option>
                                                                    <option value="45">45</option>
                                                                    <option value="46">46</option>
                                                                    <option value="47">47</option>
                                                                    <option value="48">48</option>
                                                                    <option value="49">49</option>
                                                                    <option value="50">50</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="urbanizacion">Prenda Cabeza:</label>
                                                                <select class="form-control form-control-lg" id="cabeza" name="cabeza" required>
                                                                    <option value="">SELECCIONE</option>
                                                                    <option value="52">52</option>
                                                                    <option value="53">53</option>
                                                                    <option value="54">54</option>
                                                                    <option value="55">55</option>
                                                                    <option value="56">56</option>
                                                                    <option value="57">57</option>
                                                                    <option value="58">58</option>
                                                                    <option value="59">59</option>
                                                                    <option value="60">60</option>
                                                                    <option value="61">61</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Remuneración</h3>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="depart_nac">Banco:</label>
                                                                <input type="text" class="form-control" id="banco" name="banco" style="text-transform: uppercase;" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="provin_nac">Número de Cuenta:</label>
                                                                <input type="number" class="form-control" id="nro_cuenta" name="nro_cuenta" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="distri_nac">Afiliación:</label>
                                                            <select class="form-control form-control-lg" id="afiliacion" name="afiliacion" required>
                                                                <option value="">Seleccione</option>
                                                                <option value="AFP">AFP</option>
                                                                <option value="ONP">ONP</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Idiomas que conoce</h3> <button type="button" class="btn btn-success btn-agregaridioma"><span class="fa fa-plus"></span></button>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <table id="tbidiomas" class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Idioma</th>
                                                                    <th>Habla</th>
                                                                    <th>Lee</th>
                                                                    <th>Adquirido</th>
                                                                    <th>Escribe</th>
                                                                    <th>Graduado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Datos Familiares Directos</h3> <button type="button" class="btn btn-success btn-agregarfamiliares"><span class="fa fa-plus"></span></button>
                                                </div>
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <table id="tbfamiliares1" class="table table-bordered   table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nombres</th>
                                                                    <th>Parentesco</th>
                                                                    <th>Edad</th>
                                                                    <th>Lugar Nac.</th>
                                                                    <th>Fecha Nac.</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                        <table id="tbfamiliares2" class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>CIP</th>
                                                                    <th>DNI</th>
                                                                    <th>Telef.</th>
                                                                    <th>Grupo Sang.</th>
                                                                    <th>Grado Instr.</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>                                                        
                                                    </div>
                                                </div>
                                                
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Viajes al Extranjero</h3> <button type="button" class="btn btn-success btn-viajesExtranjero"><span class="fa fa-plus"></span></button>
                                                </div>

                                                
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <table id="tbviajesExtranjero" class="table table-bordered   table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Lugar</th>
                                                                    <th>Motivo</th>
                                                                    <th>Fecha</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                                
                                                                        
                                                
                                                
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Estudios Realizados</h3><button type="button" class="btn btn-success btn-estudiosRealizados"><span class="fa fa-plus"></span></button>
                                                </div>
                                                
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <table id="tbestudiosRealizados" class="table table-bordered   table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Curso</th>
                                                                    <th>Tipo de Curso</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                                
                                                
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Cuenta con Seguro </h3><button type="button" class="btn btn-success btn-seguro"><span class="fa fa-plus"></span></button>
                                                </div>
                                                
                                                <div class="box-body">
                                                    <div class="col-md-12">
                                                        <table id="tbseguro" class="table table-bordered   table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Seguro</th>
                                                                    <th>Tipo de Seguro</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
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