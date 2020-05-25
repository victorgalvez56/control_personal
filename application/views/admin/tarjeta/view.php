<style type="text/css">
	table {
		width: 100%;
		border: 1px solid #000;
		page-break-inside: avoid;
		background-color: transparent;

	}

	th {

		text-align: center;
		vertical-align: center;
		border: 1px solid #FDFEFE;
		border-spacing: 0;
		font-size: small;
		background-color: transparent;
	}

	td {

		text-align: center;

		vertical-align: center;
		border: 1px solid #FDFEFE;
		border-spacing: 0;
		font-size: x-small;
		background-color: transparent;
	}
</style>


<div class="card-footer text-muted">
<input type="hidden" id="dniBarcodeTarjeta" value="<?php echo $personals->dni?>" >
	<table>
		<thead>
			<tr width="40">
				<th colspan="2" rowspan="3">
					<pre>MINISTERIO DE DEFENSA
EJÉRCITO DEL PERÚ
CG-III DIV EJTO</pre>
				</th>

				<th width="120" rowspan="3" colspan="2" vertical-align: center>
					<pre>
<img height="30" width="20" src=https://4.bp.blogspot.com/-2-f2OaR77Bw/WMfG7feqALI/AAAAAAAArGU/hVX5fQw1LrYtw6Su6kKphan1XeCd-Dl-wCLcB/s1600/III%2BDIV%2BEJTO.jpg>III DIVISIÓN EJÉRCITO PERÚ<img height="30" width="20" src=https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Emblem_of_the_Peruvian_Army.svg/374px-Emblem_of_the_Peruvian_Army.svg.png></pre>
				</th>

			</tr>
			<tr>
			</tr>
			<tr>
			</tr>
			<tr>
				<th colspan="2"> </th>
				<td width="150" colspan="3">SUB DEPENDENCIA</td>
			</tr>
			<tr>
				<th colspan="2"></th>
				<th colspan="3">
					<p id="sub"></p>
					<select class="form-control form-control-lg" id="sub_dependencia" name="sub_dependencia" required>
						<option value="">SELECCIONE</option>
						<option>CO III DE</option>
						<option>JEM III DE</option>
						<option> INSPECTORIA III DE</option>
						<option> DEPER</option>
						<option> DEINTG</option>
						<option> DIEDOC</option>
						<option> DEPLAND</option>
						<option> DELOG</option>
						<option> DETEL</option>
						<option> DEBEN</option>
						<option> DAL</option>
						<option> DAE</option>
						<option> DID</option>
						<option> DEPIP</option>
						<option> DEGRE</option>
						<option> SERAP</option>
						<option> DETES</option>
						<option>SSST</option>
						<option>INGUAR</option>
						<option>POSTA MEDICA</option>
						<option>CECOM Y MICROONDAS</option>
					</select>
				</th>
			</tr>
			<tr>
				<th colspan="2"></th>
				<td colspan="3">.</td>
			</tr>
			<tr>
				<th rowspan="5" vertical-align: center><img height="80" width="70" src=https://4.bp.blogspot.com/-2-f2OaR77Bw/WMfG7feqALI/AAAAAAAArGU/hVX5fQw1LrYtw6Su6kKphan1XeCd-Dl-wCLcB/s1600/III%2BDIV%2BEJTO.jpg> </th> <th rowspan="5" vertical-align: center><img src="<?php echo base_url(); ?>/uploads/<?php echo $personals->imagen; ?>" style="width:200px;"></th>
				<td colspan="3">CATEGORIA</td>
			</tr>
			<tr>
				<th colspan="3">
					<p id="cat"></p>
					<select class="form-control form-control-lg" id="categoria_tarjeta" name="categoria_tarjeta" required>
						<option value="">SELECCIONE</option>
						<option>SECRETO</option>
						<option>SECRETO</option>
						<option>SECRETO</option>
						<option>SECRETO</option>
						<option>SECRETO</option>
					</select>
				</th>
			</tr>
			<tr>
				<td colspan="3">.</td>
			</tr>
			<tr>
				<td colspan="3">N° DE CARNET</td>
			</tr>
			<tr>
				<th colspan="3"><?php echo $personals->id ?></th>
			</tr>
			<tr>
				<td></td>
				<th></th>
				<td colspan="3">.</td>
			</tr>
			<tr>
				<td>GRADO:</td>
				<td>
					<?php echo $personals->grado ?>
				</td>
				<td colspan="3">N° DE SERIE</td>
			</tr>
			<tr>
				<td>APELLIDOS:</td>
				<td>
					<?php echo $personals->apellido_pat . " " . $personals->apellido_mat ?>

				</td>
				<th colspan="3"> S-<?php echo $personals->dni . "-" . $personals->grupo_sang ?></th>
			</tr>
			<tr>
				<td>NOMBRES:</td>
				<td>
					<?php echo $personals->nombres ?>

				</td>
				<td colspan="3">.</td>
			</tr>
			<tr>
				<td colspan="2">.</td>
				<td colspan="3"> FECHA QUE CADUCA</td>
			</tr>
			<tr>
				<td colspan="2">.</td>
				<th colspan="3">
					<input type="text" class="form-control" id="fecha_tarjeta">
					<p id="fec"></p>
				</th>
			</tr>
			<tr>
				<th colspan="2">.</th>
				<td colspan="3" rowspan="3"> <img id="barcode">
			</tr>
			<tr>
				<th></th>
				<td>FIRMA</td>
			</tr>
			<tr>
				<th></th>
				<td>..........................................</td>

			</tr>
		</thead>
	</table>

</div>
<script>
	$('#sub').hide();
	$('#cat').hide();

	$("#sub_dependencia").change(function() {
		var sub = $("#sub_dependencia").val();
		$('#sub_dependencia').hide();
		$('#sub').show();
		$("#sub").text(sub)

	});

	$("#categoria_tarjeta").change(function() {
		var cat = $("#categoria_tarjeta").val();
		$('#categoria_tarjeta').hide();
		$('#cat').show();
		$("#cat").text(cat)

	});

	$("#fecha_tarjeta").change(function() {
		var fec = $("#fecha_tarjeta").val();
		$('#fecha_tarjeta').hide();
		$('#fec').show();
		$("#fec").text(fec)
	});
	

</script>