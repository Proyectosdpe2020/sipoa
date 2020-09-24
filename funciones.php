<? 

function getAllUrs($conn){


		$query = " SELECT [idUr],[nombre] FROM [POA].[dbo].[ur] ORDER BY nombre ";
	
		$indice = 0;

			$stmt = sqlsrv_query($conn, $query);
				while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
				{
					$arreglo[$indice][0]=$row['idUr'];
					$arreglo[$indice][1]=$row['nombre'];
					$indice++;
				}
				if(isset($arreglo)){return $arreglo;}

}



function getDataEnviadosValid($conn, $idArea){


		$query = " SELECT [idAreaMesValida],[idArea],[ene],[feb],[mar],[abr],[may],[jun],[jul],[ago],[sep],[oct],[nov],[dic],[enviado],[idProyecto],[envValidacion],[idProNextYear],[envArchivo]
  FROM [POA].[dbo].[areaMesValida] WHERE idArea = $idArea ";
	
		$indice = 0;

			$stmt = sqlsrv_query($conn, $query);
				while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
				{
					$arreglo[$indice][0]=$row['idArea'];
					$arreglo[$indice][1]=$row['ene'];
					$arreglo[$indice][2]=$row['feb'];
					$arreglo[$indice][3]=$row['mar'];
					$arreglo[$indice][4]=$row['abr'];
					$arreglo[$indice][5]=$row['may'];
					$arreglo[$indice][6]=$row['jun'];
					$arreglo[$indice][7]=$row['jul'];
					$arreglo[$indice][8]=$row['ago'];
					$arreglo[$indice][9]=$row['sep'];
					$arreglo[$indice][10]=$row['oct'];
					$arreglo[$indice][11]=$row['nov'];
					$arreglo[$indice][12]=$row['dic'];
					$arreglo[$indice][13]=$row['enviado'];
					$arreglo[$indice][14]=$row['idProyecto'];
					$arreglo[$indice][15]=$row['envValidacion'];
					$arreglo[$indice][16]=$row['idProNextYear'];
					$arreglo[$indice][17]=$row['envArchivo'];
					$indice++;
				}
				if(isset($arreglo)){return $arreglo;}

}



function getTutDataArea($conn, $idArea){


		$query = " SELECT tu.nombre, tu.apellidoPaterno, tu.apellidoMaterno
FROM titularUnidad tu 
INNER JOIN titularUnidadArea tua ON tua.idTitularUnidad = tu.idTitularUnidad
WHERE tua.idArea =  $idArea ";
	
		$indice = 0;

			$stmt = sqlsrv_query($conn, $query);
				while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
				{
					$arreglo[$indice][0]=$row['nombre'];
					$arreglo[$indice][1]=$row['apellidoPaterno'];
					$arreglo[$indice][2]=$row['apellidoMaterno'];
					$indice++;
				}
				if(isset($arreglo)){return $arreglo;}

}


function getAreasUrDI($conn, $idUr){


		$query = " SELECT a.idArea,a.nombre,a.idFiscalia,f.nombre as fiscalia
FROM [POA].[dbo].[area] a
INNER JOIN fiscalia f ON f.idFiscalia = a.idFiscalia
WHERE idUr = $idUr AND status = 'DI'";
	
		$indice = 0;

			$stmt = sqlsrv_query($conn, $query);
				while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
				{
					$arreglo[$indice][0]=$row['idArea'];
					$arreglo[$indice][1]=$row['nombre'];
					$arreglo[$indice][2]=$row['idFiscalia'];
					$arreglo[$indice][3]=$row['fiscalia'];
					$indice++;
				}
				if(isset($arreglo)){return $arreglo;}

}


function getFechasSystem($conn){


		$query = "SELECT fecha1, fecha2, fecha3 FROM fechas";
	
		$indice = 0;

			$stmt = sqlsrv_query($conn, $query);
				while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
				{
					$arreglo[$indice][0]=$row['fecha1'];
					$arreglo[$indice][1]=$row['fecha2'];
					$arreglo[$indice][2]=$row['fecha3'];
					$indice++;
				}
				if(isset($arreglo)){return $arreglo;}

}


function getIPreal(){

	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
	$ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
	$ip = getenv("REMOTE_ADDR");
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
	$ip = $_SERVER['REMOTE_ADDR'];
	else
	$ip = "IP desconocida";
	return($ip);
}

function getDiaActual(){

	$diaActual = date("N");

	switch ($diaActual) {
		case '1':
		return "lunes";
		break;
		case '2':
		return "Martes";
		break;
		case '3':
		return "Miercoles";
		break;
		case '4':
		return "Jueves";
		break;
		case '5':
		return "Viernes";
		break;
		case '6':
		return "Sabado";
		break;
		case '7':
		return "Domingo";
		break;
	}
}


function getNuevsActividadsAnio($conn, $anio){

	$query = "SELECT        nuevaAct.idNuevaAct, nuevaAct.nombre, beneficiario.nombre AS beneficiario, 													nuevaAct.cantidadBeneficiarios, medida.nombre AS medida, nuevaAct.acumulado, proyecto.anio
	FROM            nuevaAct INNER JOIN
	beneficiario ON nuevaAct.idBeneficiario = beneficiario.idBeneficiario INNER JOIN
	medida ON nuevaAct.idMedida = medida.idMedida INNER JOIN
	proyecto ON nuevaAct.idProyecto = proyecto.idProyecto
	WHERE  (proyecto.anio = $anio) AND (finanz2020 = 1)  ORDER BY nuevaAct.ordenFin2020 ASC";





	$indice = 0;
	$stmt = sqlsrv_query($conn, $query);
	while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
	{
		$arreglo[$indice][0]=$row['idNuevaAct'];
		$arreglo[$indice][1]=$row['nombre'];
		$arreglo[$indice][2]=$row['beneficiario'];
		$arreglo[$indice][3]=$row['cantidadBeneficiarios'];
		$arreglo[$indice][4]=$row['medida'];
		$arreglo[$indice][5]=$row['acumulado'];

		$indice++;
	}
	if(isset($arreglo)){return $arreglo;}
}

function getSumActiContenidas($conn, $nuevaAct, $mes, $anio){

	$query = "SELECT    SUM(seguimiento.cantidad) as total
	FROM            nuevaActActividad INNER JOIN
	nuevaAct ON nuevaActActividad.idNuevaAct = nuevaAct.idNuevaAct INNER JOIN
	actividad ON nuevaActActividad.idActividad = actividad.idActividad INNER JOIN
	seguimiento ON actividad.idActividad = seguimiento.idActividad
	WHERE        (nuevaAct.idNuevaAct = $nuevaAct) AND (seguimiento.mes = $mes) AND (seguimiento.anio = $anio)";

	$indice = 0;

	$stmt = sqlsrv_query($conn, $query);
	while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
	{

		$arreglo[$indice][0]=$row['total'];
		$indice++;
	}
	if(isset($arreglo)){return $arreglo;}
}



function countTotalActAgrupsMes($conn, $nuevaAct, $mes){

	$query = "   SELECT sum(cantidad) as total FROM nuevaActActividad INNER JOIN seguimiento s ON s.idActividad = nuevaActActividad.idActividad WHERE idNuevaAct = $nuevaAct AND mes = $mes";

	$indice = 0;

	$stmt = sqlsrv_query($conn, $query);
	while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
	{	
		
		if( is_null($row['total'] )){ $row['total'] = "--"; }
		$arreglo[$indice][0]=$row['total'];
		$indice++;
	}
	if(isset($arreglo)){return $arreglo;}
}

function countTotalActAgr($conn, $nuevaAct){

	$query = "SELECT sum(cantidad) as total FROM nuevaActActividad INNER JOIN seguimiento s ON s.idActividad = nuevaActActividad.idActividad WHERE idNuevaAct = $nuevaAct";

	$indice = 0;

	$stmt = sqlsrv_query($conn, $query);
	while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
	{

		$arreglo[$indice][0]=$row['total'];
		$indice++;
	}
	if(isset($arreglo)){return $arreglo;}
}


function getActividadsNewActividad($conn, $mes, $anio, $newActividad){


	$query = "SELECT naa.idActividad, a.nombre as 'actividad', ar.nombre  as 'unidad', f.nombre as 'fiscalia', se.cantidad,cal.cantidad as 'cale', se.justificacion, se.propuesta FROM nuevaActActividad naa 
INNER JOIN actividad a ON a.idActividad = naa.idActividad  
INNER JOIN area ar ON ar.idArea = a.idArea
INNER JOIN fiscalia f ON f.idFiscalia = ar.idFiscalia
INNER JOIN seguimiento se ON se.idActividad = a.idActividad
INNER JOIN calendarizacion cal ON cal.idActividad = a.idActividad
WHERE naa.idNuevaAct = $newActividad	AND se.anio = $anio AND se.mes = $mes AND cal.mes = $mes";






	$indice = 0;
	$stmt = sqlsrv_query($conn, $query);
	while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
	{
		$arreglo[$indice][0]=$row['idActividad'];
		$arreglo[$indice][1]=$row['actividad'];
		$arreglo[$indice][2]=$row['unidad'];
		$arreglo[$indice][3]=$row['fiscalia'];
		$arreglo[$indice][4]=$row['cantidad'];
		$arreglo[$indice][5]=$row['justificacion'];
		$arreglo[$indice][6]=$row['propuesta'];
		$arreglo[$indice][7]=$row['cale'];

		$indice++;
	}
	if(isset($arreglo)){return $arreglo;}

}

function getDataGrouped($conn, $mes, $anio,  $nuevaAct){

	$query = "SELECT idNuevaAct, justificacion, propuesta, observaciones FROM nuevaActAdicionales WHERE idNuevaAct = $nuevaAct AND mes = $mes AND anio = $anio";



	$indice = 0;

	$stmt = sqlsrv_query($conn, $query);
	while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC ))
	{

		$arreglo[$indice][0]=$row['idNuevaAct'];
		$arreglo[$indice][1]=$row['justificacion'];
		$arreglo[$indice][2]=$row['propuesta'];
		$arreglo[$indice][3]=$row['observaciones'];
		$indice++;
	}
	if(isset($arreglo)){return $arreglo;}
}




?>