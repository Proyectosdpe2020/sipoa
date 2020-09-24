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

	<div class="flex-container1">
<div><label style="font-weight: bold;" for="start">Dia 1:</label>
									     <input type="date" id="date1" name="trip-start" value="<?  echo $krr[0]."-".$krr[1]."-".$krr[2]; ?>" min="2020-01-01" max="2030-12-31"></div>
  <div><label style="font-weight: bold;" for="start">Dia 2:</label>
									     <input type="date" id="date2" name="trip-start" value="<? echo $krr2[0]."-".$krr2[1]."-".$krr2[2]; ?>" min="2020-01-01" max="2030-12-31"></div>
  <div><label style="font-weight: bold;" for="start">Dia 3:</label>
									     <input type="date" id="date3" name="trip-start" value="<? echo $krr3[0]."-".$krr3[1]."-".$krr3[2]; ?>" min="2020-01-01" max="2030-12-31"></div>

									     	<div><button class="styled" onclick="saveFechas()" type="button">Actualizar Días</button></div>
									     </div>