<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Personal Militar
            <small>Editar</small>
        </h1>
    </section>
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

                        <form action="<?php echo base_url(); ?>control/personal_militar/update" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $personal_militar->id; ?>" id="idPersonal" name="idPersonal">
                        <div class="tab-content" style="margin-top:16px;">
                                <div class="tab-pane active" id="login_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalles Personales</div>
                                        <div class="firstStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="imagen">Foto Personal:</label>
                                                        <span class="btn btn-default btn-file">
                                                            Subir Foto <input type="file" name="upload" id="fichero">
                                                        </span>
                                                        <img id="imgenPerfil" src="<?php echo base_url(); ?>/uploads/<?php echo $personal_militar->imagen; ?>" style="width:150px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grado">Grado:</label>
                                                        <select class="form-control form-control-lg" id="grado" name="grado" required>
                                                            <option value="<?php echo $personal_militar->grado; ?>" selected><?php echo $personal_militar->grado; ?></option>
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
                                                            <option value="<?php echo $personal_militar->arma; ?>" selected><?php echo $personal_militar->arma; ?></option>
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
                                                        <input type="text" value="<?php echo $personal_militar->apellido_pat; ?>" class="form-control" id="apellido_pat" name="apellido_pat" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="apellido_mat">Apellido Materno:</label>
                                                        <input type="text" value="<?php echo $personal_militar->apellido_mat; ?>" class="form-control" id="apellido_mat" name="apellido_mat" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="nombres">Nombres:</label>
                                                        <input type="text" value="<?php echo $personal_militar->nombres; ?>" class="form-control" id="nombres" name="nombres" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="estado_civ">Estado Civil:</label>
                                                        <select class="form-control form-control-lg" id="estado_civ" name="estado_civ" required>
                                                            <option value="<?php echo $personal_militar->estado_civ; ?>" selected><?php echo $personal_militar->estado_civ; ?></option>
                                                            <option value="SOLTERO">SOLTERO</option>
                                                            <option value="CASADO">CASADO</option>
                                                            <option value="DIVORCIADO">DIVORCIADO</option>
                                                            <option value="CONYUGUE">CONYUGUE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="a_servicio">Años Servicio:</label>
                                                        <input value="<?php echo $personal_militar->anios_serv; ?>" type="number" class="form-control" id="a_servicio" name="a_servicio" style="text-transform: uppercase;" min="0" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grado_instr">Grado de Instrucción:</label>
                                                        <select class="form-control form-control-lg" id="grado_ins_per" name="grado_ins_per" required>
                                                            <option value="<?php echo $personal_militar->grado_instruc; ?>" selected><?php echo $personal_militar->grado_instruc; ?></option>
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
                                                        <select class="form-control form-control-lg" id="religion" name="religion" required>
                                                            <option value="<?php echo $personal_militar->religion; ?>" selected><?php echo $personal_militar->religion; ?></option>
                                                            <option value="NO TIENE">NO TIENE</option>
                                                            <option value="CATOLICA">CATÓLICA</option>
                                                            <option value="CRISTIANISMO">CRISTIANISMO</option>
                                                            <option value="EVANGELICO">EVANGELICO</option>
                                                            <option value="MORMONISMO">MORMONISMO</option>
                                                            <option value="OTRA">OTRA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="fec_ult_asc">Último Ascenso:</label>
                                                        <input type="date" value="<?php echo $personal_militar->fec_ultimo_asc; ?>" class="form-control" id="fec_ult_asc" name="fec_ult_asc" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="personal_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Dirección</div>
                                        <div class="secondStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="departamento_viv">Departamento:</label>
                                                        <select class="form-control form-control-lg" id="departamento_viv" name="depart_viv" required>
                                                            <option value="<?php echo $personal_militar->depart_viv; ?>" selected><?php echo $personal_militar->depart_viv; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Provincia:</label>
                                                        <select class="form-control form-control-lg" id="provin_viv" name="provin_viv" required>
                                                            <option value="<?php echo $personal_militar->provinc_viv; ?>" selected><?php echo $personal_militar->provinc_viv; ?></option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="distri_viv">Distrito:</label>
                                                        <select class="form-control form-control-lg" id="distri_viv" name="distri_viv" required>
                                                            <option value="<?php echo $personal_militar->distrito_viv; ?>" selected><?php echo $personal_militar->distrito_viv; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="urbanizacion">Urbanización:</label>
                                                        <input value="<?php echo $personal_militar->urbaniz_viv; ?>" type="text" class="form-control" id="urbanizacion" name="urbanizacion" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="calle">Calle, Mz, Lote:</label>
                                                        <input type="text" value="<?php echo $personal_militar->calle_viv; ?>" class="form-control" id="calle" name="calle" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="contact_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Contacto</div>
                                        <div class="thirdStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="telefono">Número:</label>
                                                        <input type="number" value="<?php echo $personal_militar->telefono; ?>" class="form-control" id="telef_per" min="0" name="telef_per" style="text-transform: uppercase;" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="operador">Operador:</label>
                                                        <select class="form-control form-control-lg" id="operador" name="operador" required>
                                                            <option value="">SELECCIONE</option>
                                                            <option value="<?php echo $personal_militar->operador; ?>" selected><?php echo $personal_militar->operador; ?></option>
                                                            <option value="ENTEL">ENTEL</option>
                                                            <option value="BITEL">BITEL</option>
                                                            <option value="CLARO">CLARO</option>
                                                            <option value="MOVISTAR">MOVISTAR</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="correo">Correo Electrónico:</label>
                                                        <input type="email" value="<?php echo $personal_militar->correo; ?>" class="form-control" id="correo" name="correo" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="born_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Nacimiento</div>
                                        <div class="fourthStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="depart_nac">Departamento:</label>
                                                        <select class="form-control form-control-lg" id="depart_nac" name="depart_nac" required>
                                                            <option value="<?php echo $personal_militar->depart_nac; ?>" selected><?php echo $personal_militar->depart_nac; ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="provin_nac">Provincia:</label>
                                                        <select class="form-control form-control-lg" id="provin_nac" name="provin_nac" required>
                                                            <option value="<?php echo $personal_militar->provinc_nac; ?>" selected><?php echo $personal_militar->provinc_nac; ?></option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="distri_nac">Distrito:</label>
                                                    <select class="form-control form-control-lg" id="distri_nac" name="distri_nac" required>
                                                        <option value="<?php echo $personal_militar->distrito_nac; ?>" selected><?php echo $personal_militar->distrito_nac; ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="fecha_nac">Fecha:</label>
                                                        <input type="date" value="<?php echo $personal_militar->fecha_nac; ?>" class="form-control" id="fecha_nac" name="fecha_nacper" style="text-transform: uppercase;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="edad">Edad:</label>
                                                        <input type="number" class="form-control edad_nac" id="edad_nac" name="edad_nac" style="text-transform: uppercase;" readonly required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="documents_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Documentos</div>
                                        <div class="fivethStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="cip">CIP:</label>
                                                        <input type="number" value="<?php echo $personal_militar->cip; ?>" min="0" class="form-control" id="cip_per" name="cip_per" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="dni">DNI:</label>
                                                        <input type="number" value="<?php echo $personal_militar->dni; ?>" min="0" class="form-control" id="dni_per" name="dni_per" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="pasaporte">Pasaporte:</label>
                                                        <input class="form-control form-control" type="text" value="<?php echo $personal_militar->pasaporte; ?>" id="pasaporte" name="pasaporte" list="citynames" style="text-transform: uppercase;" required><datalist id="citynames">
                                                            <option value="NO">
                                                        </datalist> </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="brevete">Brevete:</label>
                                                        <select class="form-control form-control-lg" id="brevete" name="brevete" required>
                                                            <option value="<?php echo $personal_militar->brevete; ?>" selected><?php echo $personal_militar->brevete; ?></option>
                                                            <option value="NO TIENE">NO TIENE</option>
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
                                    </div>
                                </div>
                                <div class="tab-pane active" id="caracters_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Características</div>
                                        <div class="sixStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="talla">Talla(m.):</label>
                                                        <input type="number" value="<?php echo $personal_militar->talla; ?>" step="0.01" min="0" class="form-control" id="talla" name="talla" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="peso">Peso(kg.):</label>
                                                        <input type="number" value="<?php echo $personal_militar->peso; ?>" step="0.01" min="0" class="form-control" id="peso" name="peso" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grupo_sang">Grupo Sanguíneo:</label>
                                                        <select class="form-control form-control-lg" id="grupo_sang" name="grupo_sang" required>
                                                            <option value="<?php echo $personal_militar->grupo_sang; ?>" selected><?php echo $personal_militar->grupo_sang; ?></option>
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
                                                            <option value="<?php echo $personal_militar->sexo; ?>" selected><?php echo $personal_militar->sexo; ?></option>
                                                            <option value="MASCULINO">MASCULINO</option>
                                                            <option value="FEMENINO">FEMENINO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane active" id="clothes_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Talla de ropa</div>
                                        <div class="sevenStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="grado">Camisa/Blusa:</label>
                                                        <select class="form-control form-control-lg" id="camisa" name="camisa" required>
                                                            <option value="<?php echo $personal_militar->talla_camisa; ?>" selected><?php echo $personal_militar->talla_camisa; ?></option>
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
                                                            <option value="<?php echo $personal_militar->talla_pantalon; ?>" selected><?php echo $personal_militar->talla_pantalon; ?></option>
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
                                                            <option value="<?php echo $personal_militar->talla_calzado; ?>" selected><?php echo $personal_militar->talla_calzado; ?></option>
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
                                                            <option value="<?php echo $personal_militar->talla_prenda; ?>" selected><?php echo $personal_militar->talla_prenda; ?></option>
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
                                    </div>
                                </div>
                                <div class="tab-pane active" id="remuneration_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Remuneración</div>
                                        <div class="eightStep">
                                        </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="banco">BANCO:</label>
                                                        <input class="form-control form-control" type="text" value="<?php echo $personal_militar->banco; ?>" id="banco" name="banco" list="bancos" style="text-transform: uppercase;" required><datalist id="bancos">
                                                            <option value="BANCO DE CREDITO DEL PERU"></option>
                                                            <option value="BANCO DE LA NACION"></option>
                                                            <option value="BANCO INTERBANK"></option>
                                                            <option value="BANCO SCOTIABANK"></option>
                                                            <option value="BBVA CONTINENTAL"></option>
                                                            <option value="BANCO PICHINCHA"></option>
                                                            <option value="BANCO DEL COMERCIO"></option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="Numero Cuenta">Número de Cuenta:</label>
                                                        <input type="number" value="<?php echo $personal_militar->nro_cuenta; ?>" class="form-control" id="nro_cuenta" name="nro_cuenta" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="distri_nac">Afiliación:</label>
                                                    <select class="form-control form-control-lg" id="afiliacion" name="afiliacion" required>
                                                        <option value="<?php echo $personal_militar->afiliacion; ?>" selected><?php echo $personal_militar->afiliacion; ?></option>
                                                        <option value="AFP">AFP</option>
                                                        <option value="ONP">ONP</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="langtripssttudies_details">
                                    <div class="nineStep">
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Idiomas <button type="button" class="btn btn-success btn-agregaridioma"><span class="fa fa-plus"></span></button></div>

                                        <div class="panel-body">
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
                                                        <?php foreach ($detalleIdioma as $idioma) : ?>
                                                            <tr>
                                                                <td><input type="text" value="<?php echo $idioma->idioma; ?>" class="form-control" id="idioma" name="idioma[]" style="text-transform: uppercase;" required></td>
                                                                <td><select class="form-control form-control" id="idioma_habla" name="idioma_habla[]" required>
                                                                        <option value="<?php echo $idioma->idioma; ?>" selected><?php echo $idioma->habla; ?></option>
                                                                        <option value="B">B</option>
                                                                        <option value="R">R</option>
                                                                        <option value="M">M</option>
                                                                    </select></td>
                                                                <td><select class="form-control form-control" id="idioma_lee" name="idioma_lee[]" required>
                                                                        <option value="<?php echo $idioma->lee; ?>" selected><?php echo $idioma->lee; ?></option>
                                                                        <option value="B">B</option>
                                                                        <option value="R">R</option>
                                                                        <option value="M">M</option>
                                                                    </select></td>
                                                                <td><select class="form-control form-control" id="idioma_escribe" name="idioma_escribe[]" required>
                                                                        <option value="<?php echo $idioma->escribe; ?>" selected><?php echo $idioma->escribe; ?></option>
                                                                        <option value="B">B</option>
                                                                        <option value="R">R</option>
                                                                        <option value="M">M</option>
                                                                    </select></td>
                                                                <td><select class="form-control form-control" id="idioma_estudio" name="idioma_estudio[]" required>
                                                                        <option value="<?php echo $idioma->adquirido; ?>" selected><?php echo $idioma->adquirido; ?></option>
                                                                        <option>ESTUDIO</option>
                                                                        <option>PRACTICA</option>
                                                                    </select></td>
                                                                <td><select class="form-control form-control" id="idioma_practica" name="idioma_practica[]" required>
                                                                        <option value="<?php echo $idioma->graduado; ?>" selected><?php echo $idioma->graduado; ?></option>
                                                                        <option value="SI">SI</option>
                                                                        <option value="NO">NO</option>
                                                                    </select></td>
                                                                <td><button type="button" class="btn btn-danger btn-remove-idioma"><span class="fa fa-remove"></span></button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br />
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Viajes al extranjero <button type="button" class="btn btn-success btn-viajesExtranjero"><span class="fa fa-plus"></span></button></div>
                                        <div class="panel-body">
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
                                                        <?php foreach ($detalleViaje as $viaje) : ?>
                                                            <tr>

                                                                <td><input type="text" value="<?php echo $viaje->lugar; ?>" class="form-control" id="lugar" name="lugar[]" style="text-transform: uppercase;" required></td>
                                                                <td><input type="text" value="<?php echo $viaje->motivo; ?>" class="form-control" id="motivo" name="motivo[]" style="text-transform: uppercase;" required></td>
                                                                <td><input type="date" value="<?php echo $viaje->fecha; ?>" class="form-control" id="fecha_viaje" name="fecha_viaje[]" style="text-transform: uppercase;" required></td>
                                                                <td><button type="button" class="btn btn-danger btn-remove-viajesExtranjero"><span class="fa fa-remove"></span></button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Estudios <button type="button" class="btn btn-success btn-estudiosRealizados"><span class="fa fa-plus"></span></button></div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbestudiosRealizados" class="table table-bordered   table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Curso</th>
                                                            <th>Tipo de Curso</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($detalleEstudio as $estudio) : ?>
                                                            <tr>
                                                                <td><input type="text" value="<?php echo $estudio->curso; ?>" class="form-control" id="curso" name="curso[]" style="text-transform: uppercase;" required></td>
                                                                <td><select class="form-control form-control" id="tipo_curso" name="tipo_curso[]">
                                                                        <option value="<?php echo $estudio->tipo_curso; ?>" selected><?php echo $estudio->tipo_curso; ?></option>
                                                                        <option value="MILITAR">MILITAR</option>
                                                                        <option value="EXTRACASTRENCE">EXTRACASTRENCE</option>
                                                                    </select></td>
                                                                <td><button type="button" class="btn btn-danger btn-remove-estudiosRealizados"><span class="fa fa-remove"></span></button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane active" id="securfam_details">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle Familiares <button type="button" class="btn btn-success btn-agregarfamiliares"><span class="fa fa-plus"></span></button></div>
                                        <div class="tenStep">
                                        </div>
                                        <div class="panel-body">
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
                                                        <?php foreach ($detalleFamiliar as $familiar) : ?>
                                                            <tr id="tableremove1">
                                                                <td><input type="text" value="<?php echo $familiar->nombre_fam; ?>" class="form-control" id="idioma" name="nombresfamiliar[]" style="text-transform: uppercase;" required></td>
                                                                <td><select class="form-control form-control" id="parentesco" name="parentesco[]" required>
                                                                        <option value="<?php echo $familiar->parentesco_fam; ?>" selected><?php echo $familiar->parentesco_fam; ?></option>
                                                                        <option value="PADRE">PADRE</option>
                                                                        <option value="MADRE">MADRE</option>
                                                                        <option value="CONYUGE">CONYUGE</option>
                                                                        <option value="HIJO">HIJO</option>
                                                                        <option value="HIJA">HIJA</option>
                                                                    </select></td>
                                                                <td><input type="number" value="<?php echo $familiar->edad_fam; ?>" class="form-control" min="0" id="edad" name="edad[]" style="text-transform: uppercase;" required></td>
                                                                <td><select class="form-control form-control lugar_nac" id="lugar_nac" name="lugar_nac[]" required>
                                                                        <option value="<?php echo $familiar->lugar_nac_fam; ?>" selected><?php echo $familiar->lugar_nac_fam; ?></option>
                                                                    </select></td>
                                                                <td><input type="date" value="<?php echo $familiar->fecha_nac_fam; ?>" class="form-control" id="fecha_nac" name="fecha_nac[]" style="text-transform: uppercase;" required></td>
                                                            </tr>
                                                        <?php endforeach; ?>
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
                                                        <?php foreach ($detalleFamiliar as $familiar) : ?>
                                                            <tr id="tableremove2">
                                                                <td><input type="number" value="<?php echo $familiar->cip_fam; ?>" class="form-control" min="0" id="cip" name="cip[]" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" style="text-transform: uppercase;" required></td>
                                                                <td><input type="number" value="<?php echo $familiar->dni_fam; ?>" class="form-control" min="0" id="dni" name="dni[]" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==8) return false;" style="text-transform: uppercase;" required></td>
                                                                <td><input type="number" value="<?php echo $familiar->telef_fam; ?>" class="form-control" id="telefono" name="telefono[]" style="text-transform: uppercase;" required></td>
                                                                <td><select class="form-control form-control" id="tipo_sangr" name="tipo_sangr[]">
                                                                        <option value="<?php echo $familiar->grup_sang_fam; ?>" selected><?php echo $familiar->grup_sang_fam; ?></option>
                                                                        <option value="A+">A+</option>
                                                                        <option value="A-">A-</option>
                                                                        <option value="B+">B+</option>
                                                                        <option value="B-">B-</option>
                                                                        <option value="AB+">AB+</option>
                                                                        <option value="AB-">AB-</option>
                                                                        <option value="O+">O+</option>
                                                                        <option value="O-">O-</option>
                                                                    </select></td>
                                                                <td><select class="form-control form-control" id="grado_instr" name="grado_instr[]">
                                                                        <option value="<?php echo $familiar->grad_inst_fam; ?>" selected><?php echo $familiar->grad_inst_fam; ?></option>
                                                                        <option value="PRIMARIA">PRIMARIA</option>
                                                                        <option value="SECUNDARIA">SECUNDARIA</option>
                                                                        <option value="TECNICO">TECNICO</option>
                                                                        <option value="SUPERIOR">SUPERIOR</option>
                                                                    </select></td>
                                                                <td><button type="button" class="btn btn-danger btn-remove-familiares"><span class="fa fa-remove"></span></button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Detalle de Seguros <button type="button" class="btn btn-success btn-seguro"><span class="fa fa-plus"></span></button> </div>
                                        <div class="panel-body">
                                            <div class="col-md-12">
                                                <table id="tbseguro" class="table table-bordered   table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Seguro</th>
                                                            <th>Tipo de Seguro</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($detalleSeguro as $seguro) : ?>
                                                            <tr>
                                                                <td><input type='text' value="<?php echo $seguro->seguro; ?>" class='form-control' id='curso' name='seguro[]' style='text-transform: uppercase;' required></td>
                                                                <td><select class='form-control form-control' id='tipo_seguro' name='tipo_seguro[]'>
                                                                        <option value="<?php echo $seguro->tipo_seguro; ?>" selected><?php echo $seguro->tipo_seguro; ?></option>
                                                                        <option value='MILITAR'>MILITAR</option>
                                                                        <option value='CIVIL'>CIVIL</option>
                                                                    </select></td>
                                                                <td><button type='button' class='btn btn-danger btn-remove-seguro'><span class='fa fa-remove'></span></button></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div align="center">
                                                <button type="submit" name="btn_personal_securfam" id="btn_personal_securfam" class="btn btn-info btn-lg">Guardar</button>
                                                <input type="hidden" class="form-control" id="aux_depart_viv" name="aux_depart_viv" style="text-transform: uppercase;">
                                                <input type="hidden" class="form-control" id="aux_provin_viv" name="aux_provin_viv" style="text-transform: uppercase;">
                                                <input type="hidden" class="form-control" id="aux_distri_viv" name="aux_distri_viv" style="text-transform: uppercase;">
                                                <input type="hidden" class="form-control" id="aux_depart_nac" name="aux_depart_viv" style="text-transform: uppercase;">
                                                <input type="hidden" class="form-control" id="aux_provin_nac" name="aux_provin_viv" style="text-transform: uppercase;">
                                                <input type="hidden" class="form-control" id="aux_distri_nac" name="aux_distri_viv" style="text-transform: uppercase;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
</div>