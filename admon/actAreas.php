<?php
session_start();
include("../validar_sesion.php");
include("../funciones.php");
include("../Conexiones/Conexion.php");
$anioActual = 2020;
$mesCheck = 5; /// MES QUE SE ESTA REVISANDO ACTUALMENTE PARA SUBIR JUSTIFICADAS Y PROPUESTAS 

$fechas = getFechasSystem($conn);
  
  $krr = explode('-', $fechas[0][0]->format('yy-m-d'));
  $krr2 = explode('-', $fechas[0][1]->format('yy-m-d'));
  $krr3 = explode('-', $fechas[0][2]->format('yy-m-d'));



?>
	<div class="row">
			
				<div class="col-xs-12 col-md-12">
						<h1>Activar Captura de Areas por UR FGE 2020</h1>
						<h2>DIRECCIÓN GENERAL DE TECNOLOGÍAS DE LA INFORMACIÓN, PLANEACIÓN Y ESTADÍSTICA</h2>
						<h3>Dirección de Planeación y Estadística</h3>
				</div>
			
		</div>

<div class="content-habilit">

		<div class="row">
				
					<div class="col-xs-12 col-md-12">	
									<label style="color: black; font-weight: bold;">Selecciona las 3 fechas que estaran disponibles para la captura actual del POA:</label><br><br>								
				</div>


		</div>
		<div id="content-fechas">

		<div class="flex-container1"> 

  <div><label style="font-weight: bold;" for="start">Dia 1:</label>
									     <input type="date" id="date1" name="trip-start" value="<?  echo $krr[0]."-".$krr[1]."-".$krr[2]; ?>" min="2020-01-01" max="2030-12-31"></div>
  <div><label style="font-weight: bold;" for="start">Dia 2:</label>
									     <input type="date" id="date2" name="trip-start" value="<? echo $krr2[0]."-".$krr2[1]."-".$krr2[2]; ?>" min="2020-01-01" max="2030-12-31"></div>
  <div><label style="font-weight: bold;" for="start">Dia 3:</label>
									     <input type="date" id="date3" name="trip-start" value="<? echo $krr3[0]."-".$krr3[1]."-".$krr3[2]; ?>" min="2020-01-01" max="2030-12-31"></div>
		<div><button class="styled" onclick="saveFechas()" type="button">Actualizar Días</button></div>


	</div>

	</div>	

</div>

<br>

<div class="content-habilit">

		<div class="row">
				
					<div class="col-xs-12 col-md-12">	
									<label style="color: black; font-weight: bold;">Selecciona la unidad responsable (UR) que desee para ver sus Areas:</label>

									<? $dataUrs = getAllUrs($conn); ?>

									<select onchange="loadDataurEnviados()" class="select-css" id="selIdur">
											<? 
														for ($f=0; $f < sizeof($dataUrs) ; $f++) { 
															?>
																		<option value="<? echo $dataUrs[$f][0]; ?>"  <? if($dataUrs[$f][0] == 13){ echo "selected";} ?>><? echo $dataUrs[$f][1]; ?></option>	
															<?
														}
											 ?>		
									</select>


				</div>


		</div><br>


		<div class="row">
			<div id="tableUrsPoadm">
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

					  				$dataAreasUr = getAreasUrDI($conn, 13);		

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
					</table></div>


		</div><br><br>



					<!-- FLEX CONTAINER -->

		<div class="flex-container">
  <div><label style="color: black; font-weight: bold; font-size: 14px !important;">Desactivar Mes (Se desactiva el mes para todas las unidades disponibles en captura)</label>
									<select style="color: black; font-weight: bold; text-align: center;" class="select-css" id="selecMonthdesActive">
												<option value="ene">Enero</option>					
												<option value="feb">Febrero</option>			
												<option value="mar">Marzo</option>	
												<option value="abr">Abril</option>																																	
												<option value="may">Mayo</option>
												<option value="jun">Junio</option>
												<option value="jul">Julio</option>
												<option value="ago">Agosto</option>
												<option value="sep">Setiembre</option>
												<option value="oct">Octubre</option>
												<option value="nov">Noviembre</option>
												<option value="dic">Diciembre</option>	
									</select>

									<div><button class="styled2" onclick="desactivaMesAll()" type="button">Actualizar</button></div>
							</div>
							<div><label style="color: black; font-weight: bold; font-size: 14px !important;">Activar Mes (Se activa el mes para todas las unidades disponibles en captura)</label>
									<select style="color: black; font-weight: bold; text-align: center;" class="select-css" id="selecMonthActive">
												<option value="ene">Enero</option>					
												<option value="feb">Febrero</option>			
												<option value="mar">Marzo</option>	
												<option value="abr">Abril</option>																																	
												<option value="may">Mayo</option>
												<option value="jun">Junio</option>
												<option value="jul">Julio</option>
												<option value="ago">Agosto</option>
												<option value="sep">Setiembre</option>
												<option value="oct">Octubre</option>
												<option value="nov">Noviembre</option>
												<option value="dic">Diciembre</option>		
									</select>

									<div><button class="styled2" onclick="activaMesAll()" type="button">Actualizar</button></div>

								</div>		
  
  <div><label style="color: black; font-weight: bold; font-size: 14px !important;">(Actualiza el enviado de todas las unidades a 0 para que puedan capturar)</label>
									<select style="color: black; font-weight: bold; text-align: center !important;" class="select-css" id="selUnidMp">
												<option value="">Todas las Unidades</option>				
									</select>

									<div><button class="styled2" onclick="desactivaEnviadoAll()" type="button">Actualizar</button></div>

								</div>

	</div>

		<!-- FIN FLEX CONTAINER -->



</div>







