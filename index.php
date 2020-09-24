<?php
session_start();
include("validar_sesion.php");
include("funciones.php");
include("Conexiones/Conexion.php");
$anioActual = 2020;
$mesCheck = 5; /// MES QUE SE ESTA REVISANDO ACTUALMENTE PARA SUBIR JUSTIFICADAS Y PROPUESTAS 

$idUsuario = $_SESSION['useridPoa'];
$tipoUser  = $_SESSION['permisosPoa'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>SIPOA</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/navMod.css">
	<link rel="stylesheet" type="text/css" href="css/admon.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="//kit.fontawesome.com/49acbb17f5.js" crossorigin="anonymous"></script>

</head>
<body <? if($tipoUser == 2){ ?>onload="loadPage('activity','tableActivityMain.php')" <? } ?> > 
										
									<nav>
											<div class="topnav" id="myTopnav">
									  <a href="#home" class="active">S I P O A</a>
									  <a onclick="loadPage('activity','tableActivityMain.php')">Principal</a>
									  <a href="#contact">Seguimiento</a>
									 	
									 	<? if($tipoUser == 2){ ?> 
									  <a href="#contact">Agrupadas</a>
									  <div class="dropdown">
									    <button class="dropbtn">Consultas 
									      <i class="fa fa-caret-down"></i>
									    </button>
									    <div class="dropdown-content">
									      <a href="#">Anual</a>
									      <a href="#">Mensual</a>
									      <a href="#">Actividades</a>
									      <a href="#">Usuarios</a>
									      <a href="#">Calendarización</a>
									      <a href="#">Titulares</a>
									      <a href="#">Archivos Firmados</a>
									    </div>
									  </div> 
									  <div class="dropdown">
									    <button class="dropbtn">Administrativo 
									      <i class="fa fa-caret-down"></i>
									    </button>
									    <div class="dropdown-content">
									      <a href="#">Cambio de Titular</a>
									      <a onclick="loadPage('admon','actAreas.php')">Fechas, Activar/Desactivar Area</a>
									      <a href="#">Calendarización</a>
									    </div>
									  </div> 
									  <a href="#about">Faltantes</a> <? } ?>
									  
									  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>								  
								  	<a href="cerrar_sesion.php"><i style="color: #fff; font-size: 1.2rem;" class="fa fa-user-tie"></i> Cerrar Sesión</a>
								

									</div>
					</nav>				
		<main>
			<div  class="main-content">				
				<div class="content-1">
							
							<div id="content-main">
											


							</div>
					
				</div>						

			</div>			

		</main>

</body>
</html>


<!-- MODALS TO ENTER TO THE INFORMATION GROUPED -->
<div id="modalCap" class="modal">
	<div class="flex" id="flex">
		<div class="cont-modal">
			<div class="mod-head flex">
				<h4>Selección de Justificación y Propuesta de Actividad Agrupada</h4>
				<span class="close" id="close" onclick="closeModal()">&times</span>
			</div>
			<div class="mod-body">
				<div id="contModCap"></div>		
		
		</div>
	</div>

</div>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script language="JavaScript" type="text/javascript" src="js/sweetalert.min.js"></script>


