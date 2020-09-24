<?php
session_start();
include("../validar_sesion.php");
include("../funciones.php");
include("../Conexiones/Conexion.php");
$anioActual = 2020;
$mesCheck = 5; /// MES QUE SE ESTA REVISANDO ACTUALMENTE PARA SUBIR JUSTIFICADAS Y PROPUESTAS 
?>

	<h1>Actividades Resumidas Finanzas FGE 2020</h1>
					<h2>DIRECCIÓN GENERAL DE TECNOLOGÍAS DE LA INFORMACIÓN, PLANEACIÓN Y ESTADÍSTICA</h2>
					<h3>Dirección de Planeación y Estadística</h3>

<table class="content-table" role="table">
					  <thead role="rowgroup">
					    <tr role="row">
					      <th role="columnheader">No</th>
					      <th role="columnheader">Actividad</th>
					      <th role="columnheader">Medida</th>
					      <th role="columnheader">Anual</th>
					      <th role="columnheader">Ene</th>
					      <th role="columnheader">Feb</th>
					      <th role="columnheader">Mar</th>
					      <th role="columnheader">Abr</th>
					      <th role="columnheader">May</th>
					      <th role="columnheader">Jun</th>
					      <th role="columnheader">Jul</th>
					      <th role="columnheader">Ago</th>
					      <th role="columnheader">Sep</th>
					      <th role="columnheader">Oct</th>
					      <th role="columnheader">Nov</th>
					      <th role="columnheader">Dic</th>
					      <th role="columnheader">Estatus</th>		
					    </tr>
					  </thead>
					  <tbody role="rowgroup">
					  	<? 
					  		$newAct = getNuevsActividadsAnio($conn, $anioActual);
					  		for( $i=0; $i<sizeof($newAct); $i++){

					  					$idNuevaAct = $newAct[$i][0];$nombre = $newAct[$i][1];$beneficiario = $newAct[$i][2];$cantidadBeneficiarios = $newAct[$i][3];$medida = $newAct[$i][4];$acumulado = $newAct[$i][5];
											$totan = countTotalActAgr($conn, $idNuevaAct);
									?>										
														<tr  role="row">
										      <td class="bold" role="cell"><? echo $i+1; ?></td>
										      <td class="nomAct" role="cell"><? echo $nombre; ?></td>
										      <td class="bold" role="cell"><? echo $medida; ?></td>
										      <td class="bckAnu" role="cell"><? echo $totan[0][0] ?></td>	
										      <? 
										      	for($n = 1; $n <= 12; $n++){
										      		$ueue = countTotalActAgrupsMes($conn, $idNuevaAct, $n); ?>
										      		<td role="cell"> <a data-toggle="modal" id="modalCaptura" onclick="openModal(<? echo $n; ?>, <? echo $anioActual; ?>, <? echo $idNuevaAct; ?>)"><? echo $ueue[0][0] ?></a></td><?
										      	}
										      	$detDataGrouped = getDataGrouped($conn, $mesCheck, $anioActual, $idNuevaAct);
										      	$size = sizeof($detDataGrouped);																	
										      ?>										      
										      <? if($size > 0){	?> <td role="cell"><i class="far fa-thumbs-up green"></i></td> <? }else{
										       ?> <td role="cell"><i class="far fa-times-circle red"></i></td> <? } ?>
										    </tr>										 
												<?		
					  		}
					  	 ?>					  
					  </tbody>
					</table>
