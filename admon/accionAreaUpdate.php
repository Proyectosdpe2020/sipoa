<?php
session_start();
include("../validar_sesion.php");
include("../funciones.php");
include("../Conexiones/Conexion.php");

if (isset($_POST["estatus"])){ $estatus = $_POST["estatus"]; }  
if (isset($_POST["campo"])){ $campo = $_POST["campo"]; }  
if (isset($_POST["idArea"])){ $idArea = $_POST["idArea"]; }  


if ($estatus == 0) {  $query = "UPDATE areaMesValida SET $campo = 1 WHERE idArea = $idArea ";  }
if ($estatus == 1) {  $query = "UPDATE areaMesValida SET $campo = 0 WHERE idArea = $idArea";   }


  $queryTransaction = "  

                    BEGIN                     
                    BEGIN TRY 
                      BEGIN TRANSACTION
                          SET NOCOUNT ON

                                          $query

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


