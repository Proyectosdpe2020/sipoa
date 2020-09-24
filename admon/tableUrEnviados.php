<?php
session_start();
include("../validar_sesion.php");
include("../funciones.php");
include("../Conexiones/Conexion.php");

if (isset($_POST["idUr"])){ $idUr = $_POST["idUr"]; }	
	
?>
<table class="content-table tbl-unidsMod" role="table">
					  <thead role="rowgroup">
					    <tr role="row">
					      <th role="columnheader">No</th>
					      <th role="columnheader">Unidad Responsable</th>
					      <th role="columnheader">Titular</th>
					      <th role="columnheader">Fiscalía</th>
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
					      <th role="columnheader">Enviado</th>	
					      <th role="columnheader">Enviado Archivo</th>			
					    </tr>
					  </thead>
					  <tbody role="rowgroup">
					  	
					  		<? 

					  				$dataAreasUr = getAreasUrDI($conn, $idUr);		

					  				for ($i=0; $i < sizeof($dataAreasUr) ; $i++) { 
					  								
					  								$idar = $dataAreasUr[$i][0];
					  								$dataTit = getTutDataArea($conn, $dataAreasUr[$i][0]);
					  								$datVEvi = getDataEnviadosValid($conn, $dataAreasUr[$i][0]);
					  							?>

					  						<tr>
					  							
					  							<td> <? echo "00".$i+1; ?> </td>
					  							<td style="font-weight: bold;"> <? echo $dataAreasUr[$i][1]; ?> </td>
					  							<td> <? echo $dataTit[0][0]." ".$dataTit[0][1]." ".$dataTit[0][2]; ?> </td>
					  							<td style="font-weight: bold;"> <? echo $dataAreasUr[$i][3]; ?> </td>
					  							


					  							<td> <? if($datVEvi[0][1] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'ene', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][1] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'ene', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][2] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'feb', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][2] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'feb', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][3] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'mar', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][3] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'mar', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][4] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'abr', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][4] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'abr', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][5] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'may', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][5] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'may', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][6] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'jun', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][6] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'jun', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][7] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'jul', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][7] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'jul', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][8] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'ago', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][8] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'ago', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][9] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'sep', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][9] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'sep', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][10] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'oct', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][10] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'oct', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][11] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'nov', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][11] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'nov', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>
					  							<td> <? if($datVEvi[0][12] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'dic', <? echo $idar; ?>)" style="color: #152F4A ;" class="fas fa-lock"></i> <? }else{ if($datVEvi[0][12] == 1){?> <i onclick="habilitrDeshabltrCampo(1 , 'dic', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-unlock-alt"></i> <?} } ?> </td>

					  							<td> <? if($datVEvi[0][13] == 0){ ?> <i onclick="habilitrDeshabltrCampo(0 , 'enviado', <? echo $idar; ?>)" style="color: #c09f77 ;" class="fas fa-sad-tear"></i> <? }else{ if($datVEvi[0][13] == 1){?> 
					  								<i style="color: #152F4A; " onclick="habilitrDeshabltrCampo(1 , 'enviado', <? echo $idar; ?>)" class="fas fa-user-check"></i> <?} } ?> </td>	

					  						
					  							<td> <? if($datVEvi[0][17] == 0){ ?> <i class="far fa-folder-open"></i> <? }else{ if($datVEvi[0][17] == 1){?> <i class="fas fa-folder"></i> <?} } ?> </td>	



					  				</tr>

					  							<?

					  				}

					  		 ?>



								  			


					  </tbody>
					</table>




