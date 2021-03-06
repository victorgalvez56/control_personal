<style type="text/css">
    table {
        width: 100%;
        border: 1px solid #000;
        page-break-inside: avoid;
        background-color: transparent;

    }

    th,
    td {
        text-align: left;
        vertical-align: center;
        border: 1px solid #FDFEFE;
        border-spacing: 0;
        font-size: xx-small;
        background-color: transparent;
    }

    .centrarImg {
        text-align: center;
    }
</style>
<input type="hidden" id="dniBarcodevehiculos" value="<?php echo $vehiculo->dni ?>">
<div class="card-footer text-muted">
    <table>
        <thead>
            <tr width="50">
                <th colspan="2" rowspan="3">
                    <pre>     TARJETA VEHICULAR MILITAR
 EJÉRCITO DEL PERÚ
  CG-III DIV EJTO</pre>
                </th>
                <th width="120" rowspan="3" colspan="3" vertical-align: center>
                    <pre>
<img height="40" width="30" src=https://4.bp.blogspot.com/-2-f2OaR77Bw/WMfG7feqALI/AAAAAAAArGU/hVX5fQw1LrYtw6Su6kKphan1XeCd-Dl-wCLcB/s1600/III%2BDIV%2BEJTO.jpg>III DIVISIÓN EJÉRCITO PERÚ<img height="40" width="30" src=https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Emblem_of_the_Peruvian_Army.svg/374px-Emblem_of_the_Peruvian_Army.svg.png></pre>
                </th>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
            <tr>
                <th colspan="2"> </th>
                <th> </th>
                <th>N° PLACA: </th>
                <td width="150" colspan="2"><?php echo $vehiculo->n_placa ?></td>

            </tr>
            <tr>
                <th colspan="2"></th>
                <th> </th>
                <th>N° SERIE: </th>
                <td colspan="2"><?php echo $vehiculo->n_serie ?></td>
            </tr>
            <tr>
                <th colspan="2"></th>
                <th> </th>
                <th>N° VIN : </th>
                <td colspan="2"><?php echo $vehiculo->n_vin ?></td>

            </tr>
            <tr>
                <th width="150" rowspan="5" vertical-align: center><img height="80" width="70" src=https://4.bp.blogspot.com/-2-f2OaR77Bw/WMfG7feqALI/AAAAAAAArGU/hVX5fQw1LrYtw6Su6kKphan1XeCd-Dl-wCLcB/s1600/III%2BDIV%2BEJTO.jpg> </th> <th width="150" rowspan="5" vertical-align: center><img src="<?php echo base_url(); ?>/uploads/<?php echo $vehiculo->imagen; ?>" style="width:100px;"></th>
                <th> </th>
                <th>N° MOTOR: </th>
                <td colspan="2"><?php echo $vehiculo->n_motor ?></td>
            </tr>
            <tr>
                <th width="50"> </th>
                <th>MODELO: </th>
                <td colspan="2"><?php echo $vehiculo->modelo ?></td>
            </tr>

            <tr>
                <th> </th>
                <th>COLOR: </th>
                <td colspan="2"><?php echo $vehiculo->n_color ?></td>
            </tr>


            <tr>
                <th> </th>
                <th>MARCA:</th>
                <td colspan="2"><?php echo $vehiculo->marca ?></td>

            </tr>
            <tr>
                <th> </th>
                <th>PLACA VIG.:</th>
                <td colspan="2"><?php echo $vehiculo->placa_vigente ?></td>

            </tr>
            <tr>
                <td></td>
                <th></th>
                <th></th>
                <th>PLACA ANT.: </th>
                <td colspan="2"><?php echo $vehiculo->placa_anterior ?></td>
            </tr>

            <tr>

                <th>GRADO :</th>
                <td> <?php echo $vehiculo->grado ?></td>
                <th> </th>
                <th>ANOTAC.</th>
                <td colspan="2"><?php echo $vehiculo->anotaciones ?></td>
            </tr>
            <tr>
                <th>APELLIDOS :</th>
                <td> <?php echo $vehiculo->apellido_pat . " " . $vehiculo->apellido_mat ?></td>
                <th> </th>
                <th>SEDE</th>
                <td colspan="2"><?php echo $vehiculo->sede ?></td>
            </tr>
            <tr>
                <th>NOMBRES :</th>
                <td> <?php echo $vehiculo->nombres ?></td>
                <th> </th>
                <th>FECHA CAD.: </th>
                <td colspan="2"><input type="text" id="fecha_tarjeta">
                    <p id="fec"></p>
                </td>
            </tr>
            <tr>
                <th colspan="2"><br></th>
                <td colspan="3"></td>
            </tr>
            <tr>
                <th colspan="2"><br></th>
                <td colspan="3" rowspan="3" class="centrarImg"> <img class="centrarImg" id="barcode"></td>
            </tr>
            <tr>
                <th></th>
                <th>FIRMA</th>

            </tr>
            <tr>
                <th></th>
                <th>..........................................</th>
            </tr>
        </thead>
    </table>


</div>


<script>
    $("#fecha_tarjeta").change(function() {
        var fec = $("#fecha_tarjeta").val();
        $('#fecha_tarjeta').hide();
        $('#fec').show();
        $("#fec").text(fec)
    });
</script>