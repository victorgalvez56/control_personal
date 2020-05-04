<style type="text/css">
 
 table {
	width: 100%;
	border: 1px solid #000;
	 page-break-inside: avoid;
 }
 th, td {
 
	text-align: center;
	vertical-align: center;
	border: 1px solid #D7DBDD;
	border-spacing: 0;
	font-size: x-small
 }

</style>

<div class="row" >

 <table>
	 <tr>
		 <td vertical-align: left> <img height="50" width="50" src=https://4.bp.blogspot.com/-2-f2OaR77Bw/WMfG7feqALI/AAAAAAAArGU/hVX5fQw1LrYtw6Su6kKphan1XeCd-Dl-wCLcB/s1600/III%2BDIV%2BEJTO.jpg>   </td>
		 <td width="400"> <H4>III DIVISIÓN EJÉRCITO AREQUIPA </H4>
		 <br>"yayaya dgdgdsgdsgdsgdsgsdg"
		 </td>
		 <td>  <img height="50" width="50" src=https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Emblem_of_the_Peruvian_Army.svg/374px-Emblem_of_the_Peruvian_Army.svg.png></td>
	 </tr>
 </table>
<table>
 <thead>

	 <pre>DATOS PERSONALES</pre>
	 <tr> 
		 <th>Nombres y Apellidos</th>
		 <th>Grado</th>
		 <th>Arma</th>
		 <th>Estado Civil</th>
		 <th rowspan="6"> aqui va la foto
			 <div class="row" align="center">
				<img src="../uploads/<?php echo $personals->imagen; ?>" style="width:200px;">
			 </div>
		 </th>           
	 </tr>


	 <tr>
		 <td><?php echo $personals->nombres . " " . $personals->apellido_pat . " " . $personals->apellido_mat; ?></td>
		 <td><?php echo $personals->grado; ?></td>
		 <td><?php echo $personals->arma; ?></td>
		 <td><?php echo $personals->estado_civ; ?></td>
	 </tr>
	 
	 <tr>
		 <th>Años de Servicio</th>
		 <th>Grados de Instrucción</th>
		 <th>Religión</th>
		 <th>Último Ascenso</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->anios_serv . " AÑOS "; ?></td>
		 <td><?php echo $personals->grado_instruc; ?></td>
		 <td><?php echo $personals->religion; ?></td>
		 <td><?php echo $personals->fec_ultimo_asc; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>DIRECCIÓN ACTUAL </pre>

	 <tr>
		 <th>Departamento</th>
		 <th>Provincia</th>
		 <th>Distrito</th>
		 <th>Urbanización</th>
		 <th>Calle,Mz,Zona,Etc.</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->depart_viv; ?></td>
		 <td><?php echo $personals->provinc_viv; ?></td>
		 <td><?php echo $personals->distrito_viv; ?></td>
		 <td><?php echo $personals->urbaniz_viv; ?></td>
		 <td><?php echo $personals->calle_viv; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>CONTACTO</pre>
	 <tr>
		 <th>Teléfono</th>
		 <th>Operador</th>
		 <th>Contacto</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->telefono; ?></td>
		 <td><?php echo $personals->operador; ?></td>
		 <td><?php echo $personals->correo; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
   <pre>LUGAR Y FECHA DE NACIMIENTO</pre>
	 
	 <tr>
		 <th>Departamento</th>
		 <th>Provincia</th>
		 <th>Distrito</th>
		 <th>Fecha</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->depart_nac; ?></td>
		 <td><?php echo $personals->provinc_nac; ?></td>
		 <td><?php echo $personals->distrito_nac; ?></td>
		 <td><?php echo $personals->fecha_nac; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>DOCUMENTOS PERSONALES</pre>
	 <tr>
		 <th>CIP</th>
		 <th>DNI</th>
		 <th>Pasaporte</th>
		 <th>Brevete</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->cip; ?></td>
		 <td><?php echo $personals->dni; ?></td>
		 <td><?php echo $personals->pasaporte; ?></td>
		 <td><?php echo $personals->brevete; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>CARACTERÍSTICAS FÍSICAS</pre>
	 <tr>
		 <th>Talla(Mtr.)</th>
		 <th>Peso(Kg).</th>
		 <th>Grupo Sanguíneo</th>
		 <th>Sexo</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla; ?></td>
		 <td><?php echo $personals->peso; ?></td>
		 <td><?php echo $personals->grupo_sang; ?></td>
		 <td><?php echo $personals->sexo; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>TALLA DE ROPA</pre>
	 <tr>
		 <th>Camisa/Blusa</th>
		 <th>Pantalón</th>
		 <th>Calzado</th>
		 <th>Prenda Cabeza</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla_camisa; ?></td>
		 <td><?php echo $personals->talla_pantalon; ?></td>
		 <td><?php echo $personals->talla_calzado; ?></td>
		 <td><?php echo $personals->talla_prenda; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>REMUNERACIÓN</pre>
	 <tr>
		 <th>Banco</th>
		 <th>N° Cuenta</th>
		 <th>Afiliación</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->banco; ?></td>
		 <td><?php echo $personals->nro_cuenta; ?></td>
		 <td><?php echo $personals->afiliacion; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>DATOS FAMILIRARES DIRECTOS</pre>
	 <tr>
		 <th>Apellidos y Nombres</th>
		 <th>Parentesco</th>
		 <th>Edad</th>
		 <th>Fecha Nacimiento</th>
		 <th>Lugar Nacimiento</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla_camisa; ?></td>
		 <td><?php echo $personals->talla_pantalon; ?></td>
		 <td><?php echo $personals->talla_calzado; ?></td>
		 <td><?php echo $personals->talla_prenda; ?></td>
		 <td><?php echo $personals->talla_prenda; ?></td>
	 </tr>
	 
	 <tr>
		 <th>CIP</th>
		 <th>DNI</th>
		 <th>Teléfono</th>
		 <th>Grupo Sanguíneo</th>
		 <th>Grado Instrucción</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla_camisa; ?></td>
		 <td><?php echo $personals->talla_pantalon; ?></td>
		 <td><?php echo $personals->talla_calzado; ?></td>
		 <td><?php echo $personals->talla_prenda; ?></td>
		 <td><?php echo $personals->talla_prenda; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>IDIOMAS QUE CONOCE</pre>
	 <tr>
		 <th>Idioma</th>
		 <th>Habla</th>
		 <th>Lee</th>
		 <th>Escribe</th>
		 <th>Adquirido</th>
		 <th>Graduado</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->banco; ?></td>
		 <td><?php echo $personals->nro_cuenta; ?></td>
		 <td><?php echo $personals->afiliacion; ?></td>
			<td><?php echo $personals->afiliacion; ?></td>
			<td><?php echo $personals->afiliacion; ?></td>
		 <td><?php echo $personals->afiliacion; ?></td>
	 </tr>
	 
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>VIAJES AL EXTRANJERO</pre>
	 <tr>
		 <th>Lugar</th>
		 <th>Motivo</th>
		 <th>Año</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla; ?></td>
		 <td><?php echo $personals->peso; ?></td>
		 <td><?php echo $personals->grupo_sang; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>ESTUDIOS REALIZADOS</pre>
	 <tr>
		 <th>Cursos Militares</th>
		 <th>Cursos Extracastrences</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla; ?></td>
		 <td><?php echo $personals->peso; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
<br>
<table>
 <thead>
	 <pre>CUENTA CON SEGURO</pre>
	 <tr>
		 <th>Seguros Militares</th>
		 <th>Seguros Civiles</th>
	 </tr>

	 <tr>
		 <td><?php echo $personals->talla; ?></td>
		 <td><?php echo $personals->peso; ?></td>
	 </tr>
 </thead>
 <tbody>
</table>
</div>