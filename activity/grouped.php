<?php
session_start();
include("../funciones.php");
include("../Conexiones/Conexion.php");

if (isset($_POST["idNuevaAct"])){ $idNuevaAct = $_POST["idNuevaAct"]; }
if (isset($_POST["mes"])){ $mes = $_POST["mes"]; }
if (isset($_POST["anio"])){ $anio = $_POST["anio"]; }

$detDataGrouped = getDataGrouped($conn, $mes, $anio, $idNuevaAct);
$size = sizeof($detDataGrouped);
if($size > 0){	$a = 1; }else{$a = 0;}

?>

<div id="modalCapGrouped" class="modalCapGrouped">
				
					<div class="textAresGrouped">
								
								<div class="text1">
										<div class="obser">Observaciones</div>
										<div  class="te1"><textarea id="obstexa"><? if($a == 1){ echo $detDataGrouped[0][3]; } ?></textarea></div>
								</div>
								<div class="text2">
								 	<div class="just">Justificación</div>
										<div class="te2"><textarea id="justexa"><? if($a == 1){ echo $detDataGrouped[0][1]; } ?></textarea></div>
								</div>
								<div class="text3">
									<div class="propu">Propuesta</div>
										<div class="te3"><textarea id="proptexa"><? if($a == 1){ echo $detDataGrouped[0][2]; } ?></textarea></div>
								</div>

					</div>	

						<div class="tableGrouped">
							
							<table class="content-table2" role="table">
					  	<thead role="rowgroup">
					    <tr role="row">
					      <th role="columnheader">No</th>
					      <th role="columnheader">Actividad</th>
					      <th role="columnheader">Unidad</th>
					      <th role="columnheader">Fiscalia</th>
					      <th role="columnheader">Prog</th>
					      <th role="columnheader">Segu</th>
					      <th role="columnheader">Justificación</th>
					      <th role="columnheader">Propuesta</th>
					    </tr>
					  </thead>
					  <tbody role="rowgroup">
					  		<? 
					  					$data = getActividadsNewActividad($conn, $mes, $anio, $idNuevaAct);
					  					for( $i=0; $i<sizeof($data); $i++){					  									?>
					  														<tr role="row">
																  				<td><? echo $i+1; ?></td>
																  				<td><? echo  $data[$i][1]; ?></td>
																  				<td><? echo  $data[$i][2]; ?></td>
																  				<td><? echo  $data[$i][3]; ?></td>
																  				<td><? echo  $data[$i][7]; ?></td>
																  				<td><? echo  $data[$i][4]; ?></td>
																  				<td><? echo  $data[$i][5]; ?></td>
																  				<td><? echo  $data[$i][6]; ?></td>
																  		</tr>	<?
					  					}
					  		?>					  
					 </tbody>
					</table>
					</div>
	
</div>


	</div>
			<div class="mod-foot">
								<div class="btns-flex">	
									<button  id="botonCapJus" type="button" onclick="saveDataGrouped(<? echo $mes; ?>, <? echo $anio; ?>, <? echo $idNuevaAct; ?>, <? echo $a; ?>, <? echo $data[0][7]; ?>, <? echo $data[0][4]; ?>)"  class="btn"><span class=""></span> Guardar</button>
									<button type="button" class="btn" data-dismiss="modal" onclick="closeModal()">Cancelar</button>
								</div>	
			</div>

