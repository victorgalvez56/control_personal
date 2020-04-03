<div class="row" align="center">
	<img src="../uploads/<?php echo $personals->imagen; ?>" style="width:200px;"></img>
</div>
<div class="row">
	<h3>Datos personales</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Grado</th>
				<th>Arma</th>
				<th>Estado Civil</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->nombres . " " . $personals->apellido_pat . " " . $personals->apellido_mat; ?></td>
				<td><?php echo $personals->grado; ?></td>
				<td><?php echo $personals->arma; ?></td>
				<td><?php echo $personals->estado_civ; ?></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Años de Servicio</th>
				<th>Grados de Instrucción</th>
				<th>Religión</th>
				<th>Último Ascenso</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->anios_serv . " AÑOS "; ?></td>
				<td><?php echo $personals->grado_instruc; ?></td>
				<td><?php echo $personals->religion; ?></td>
				<td><?php echo $personals->fec_ultimo_asc; ?></td>
			</tr>
		</tbody>
	</table>
	<h3>Dirección Actual</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Departamento</th>
				<th>Provincia</th>
				<th>Distrito</th>
				<th>Urbanización</th>
				<th>Calle,Mz,Zona,Etc.</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->depart_viv; ?></td>
				<td><?php echo $personals->provinc_viv; ?></td>
				<td><?php echo $personals->distrito_viv; ?></td>
				<td><?php echo $personals->urbaniz_viv; ?></td>
				<td><?php echo $personals->calle_viv; ?></td>
			</tr>
		</tbody>
	</table>
	<h3>Contacto</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Teléfono</th>
				<th>Operador</th>
				<th>Contacto</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->telefono; ?></td>
				<td><?php echo $personals->operador; ?></td>
				<td><?php echo $personals->correo; ?></td>
			</tr>
		</tbody>
	</table>
	<h3>Lugar y Fecha de Nacimiento</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Departamento</th>
				<th>Provincia</th>
				<th>Distrito</th>
				<th>Fecha</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->depart_nac; ?></td>
				<td><?php echo $personals->provinc_nac; ?></td>
				<td><?php echo $personals->distrito_nac; ?></td>
				<td><?php echo $personals->fecha_nac; ?></td>
			</tr>
		</tbody>
	</table>
	<h3>Documentos Personales</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Cip</th>
				<th>Dni</th>
				<th>Pasaporte</th>
				<th>Brevete</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->cip; ?></td>
				<td><?php echo $personals->dni; ?></td>
				<td><?php echo $personals->pasaporte; ?></td>
				<td><?php echo $personals->brevete; ?></td>
			</tr>
		</tbody>
	</table>
	<br><br><br>
	<h3>Características Físicas</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Talla(Mtr.)</th>
				<th>Peso(Kg).</th>
				<th>Grupo Sanguíneo</th>
				<th>Sexo</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->talla; ?></td>
				<td><?php echo $personals->peso; ?></td>
				<td><?php echo $personals->grupo_sang; ?></td>
				<td><?php echo $personals->sexo; ?></td>
			</tr>
		</tbody>
	</table>
	<h3>Talla de Ropa</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Camisa/Blusa</th>
				<th>Pantalón</th>
				<th>Calzado</th>
				<th>Prenda Cabeza</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->talla_camisa; ?></td>
				<td><?php echo $personals->talla_pantalon; ?></td>
				<td><?php echo $personals->talla_calzado; ?></td>
				<td><?php echo $personals->talla_prenda; ?></td>
			</tr>
		</tbody>
	</table>
	<h3>Remuneración</h3>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Banco</th>
				<th>N° Cuenta</th>
				<th>Afiliación</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $personals->banco; ?></td>
				<td><?php echo $personals->nro_cuenta; ?></td>
				<td><?php echo $personals->afiliacion; ?></td>
			</tr>
		</tbody>
	</table>
</div>