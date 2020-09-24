<?php
session_start();
include("../validar_sesion.php");
include("../funciones.php");
include("../Conexiones/Conexion.php");
$anioActual = 2020;
$mesCheck = 5; /// MES QUE SE ESTA REVISANDO ACTUALMENTE PARA SUBIR JUSTIFICADAS Y PROPUESTAS 

if (isset($_POST["date1"])){ $date1 = $_POST["date1"]; }	
if (isset($_POST["date2"])){ $date2 = $_POST["date2"]; }	
if (isset($_POST["date3"])){ $date3 = $_POST["date3"]; }	


  $queryTransaction = "  

                    BEGIN                     
                    BEGIN TRY 
                      BEGIN TRANSACTION
                          SET NOCOUNT ON

                                          UPDATE fechas SET fecha1 = '$date1', fecha2 = '$date2', fecha3 = '$date3' 

                              COMMIT
                    END TRY
                    BEGIN CATCH 
                          ROLLBACK TRANSACTION
                          RAISERROR('No se realizo la transaccion',16,1)
                    END CATCH
                    END
                  ";

                  //echo $queryTransaction;

 $result = sqlsrv_query($conn,$queryTransaction, array(), array( "Scrollable" => 'static' ));

               $arreglo[0] = "NO";
                  $arreglo[1] = "SI";
                  

                  if ($result) {

                    echo json_encode(array('first'=>$arreglo[1]));

                  }else{
                    echo json_encode(array('first'=>$arreglo[0]));
                    
                  }                   


?>


