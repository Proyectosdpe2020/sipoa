
<?php
	session_start();

	include ('Conexiones/Conexion.php');
	include("funciones.php");


	$usuario=$_POST['usuario'];
	$password=$_POST['contrasena'];


	$_SESSION['yainiciesipoa']="NO";
	$band=false;


	$sql = "select * from  Usuario where Usuario='$usuario' and Contrasena='$password' and status =	'VI'";

	$stmt = sqlsrv_query( $conn, $sql );

	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
	{
		//echo $row['usuario'].", ".$row['contrasena']."<br />";
		$_SESSION['contrasenaPoa']=$row['contrasena'];
		$_SESSION['namepoa']=$row['nombre'].' '.$row['paterno'].' '.$row['materno'];
		$_SESSION['namecPoa']=$row['nombre'];
		$_SESSION['permisosPoa']=$row['idTipoUsuario'];
		$_SESSION['useridPoa']=$row['idUsuario'];


		$idUser = $row['idUsuario'];
		$nickName = $row['usuario'];
		$nombreCompleto = $row['nombre'].' '.$row['paterno'].' '.$row['materno'];

		$band=true;
	}

	if($band)
	{
		$_SESSION['yainiciesipoa']="SI";

		// Insert is created to ensure user enter to the system

		$ipReal = getIPreal();
		$actualDay = getDiaActual();
		$query = "  INSERT INTO controlAcceso (idUsuario, nombreCompleto, userNick,fechaIngreso, diaIngreso, ipAcceso) VALUES ($idUser,'$nombreCompleto', '$nickName',GETDATE(),'$actualDay','$ipReal')  ";
		$result = sqlsrv_query($conn,$query);

		header("Location: index.php");
	}
	else
	{

		$_SESSION['yainiciesipoa']="NO";
		//header("Location: login.php?errorusuario=Usuario o Contraseña Incorrecta");
	}

	$idUsuario = $_SESSION['useridPoa'];
	$usarioAreas = getAreasUsu($conn, $idUsuario);

	for( $i=0; $i<sizeof($usarioAreas); $i++)
									{

										$idArea = $usarioAreas[$i][0];
										$nombreArea = $usarioAreas[$i][1];
										$idFiscalia = $usarioAreas[$i][2];
										$idUsu = $usarioAreas[$i][3];
									}

		$idUrarray = getUrdeUsuario($conn, $idUsuario);
		$idUr = $idUrarray[0][0];


    $titularArea = getTitular($conn, $idArea);
		$titularUR = getTitularUrID($conn, $idUr);


    $nombre = $titularArea[0][0];
    $apellidoPaterno = $titularArea[0][1];
	$apellidoMaterno = $titularArea[0][2];

	$nombreUR = $titularUR[0][1];
	$apellidoPaternoUR = $titularUR[0][2];
$apellidoMaternoUR = $titularUR[0][3];




	$_SESSION['nombretitular'] = $nombre.' '.$apellidoPaterno.' '.$apellidoMaterno;
	$_SESSION['nombretitularUR'] = $nombreUR.' '.$apellidoPaternoUR.' '.$apellidoMaternoUR;
	$_SESSION['apePaternotitular'] = $apellidoPaterno;
	$_SESSION['apeMaternotitular'] = $apellidoMaterno;

	exit();

?>
