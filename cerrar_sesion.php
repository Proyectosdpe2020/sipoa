
<?php 
session_start();
//$_SESSION = array();
session_destroy();

unset($_SESSION['yainiciesipoa']);	

header("Location:login.php");
?>

	
	
	