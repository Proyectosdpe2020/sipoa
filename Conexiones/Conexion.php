<?php



	$serverName = "172.16.2.27";
	//$connectionInfo = array( "Database"=>"michoacan-pg-prod", "CharacterSet" => "UTF-8");

	$connectionInfo = array( "Database"=>"POA", "UID"=>"SYSPOAADMIN", "PWD"=>"SYS12345POA","CharacterSet" => "UTF-8");
	//$connectionInfo1 = array( "Database"=>"PRUEBA", "UID"=>"", "PWD"=>"","CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if ($conn) {
		//echo "Conexión establecida.<br />";
		} else {
		var_dump ( "No se Puede Conectar con la Base de POA.<br/>");
		die(print_r(sqlsrv_errors(), true));
	}

?>
