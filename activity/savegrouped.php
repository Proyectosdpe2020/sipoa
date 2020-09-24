<?php
session_start();
include("../funciones.php");
include("../Conexiones/Conexion.php");

if (isset($_POST["idNuevaAct"])){ $idNuevaAct = $_POST["idNuevaAct"]; }
if (isset($_POST["mes"])){ $mes = $_POST["mes"]; }
if (isset($_POST["anio"])){ $anio = $_POST["anio"]; }
if (isset($_POST["obstexa"])){ $obstexa = $_POST["obstexa"]; }
if (isset($_POST["justGrup"])){ $justGrup = $_POST["justGrup"]; }
if (isset($_POST["propGrup"])){ $propGrup = $_POST["propGrup"]; }
if (isset($_POST["a"])){ $a = $_POST["a"]; }


if($a == 1){


    $queryTransaction = "  

                    BEGIN 
                    
                    BEGIN TRY 
                      BEGIN TRANSACTION

                          SET NOCOUNT ON


                            UPDATE nuevaActAdicionales SET justificacion = '$justGrup', propuesta = '$propGrup', observaciones = '$obstexa' WHERE idNuevaAct = $idNuevaAct AND mes = $mes AND anio = $anio

                          COMMIT
                    END TRY

                    BEGIN CATCH 
                          ROLLBACK TRANSACTION
                          RAISERROR('No se realizo la transaccion',16,1)
                    END CATCH

                    END

                  ";

                  //echo $queryTransaction;

}else{

    $queryTransaction = "  

                    BEGIN 
                    
                    BEGIN TRY 
                      BEGIN TRANSACTION

                          SET NOCOUNT ON


                            INSERT INTO nuevaActAdicionales (idNuevaAct,mes,anio,justificacion, propuesta, observaciones, idUsuario)

                            VALUES   ($idNuevaAct, $mes, $anio, '$justGrup', '$propGrup', '$obstexa', 1)

                          COMMIT
                    END TRY

                    BEGIN CATCH 
                          ROLLBACK TRANSACTION
                          RAISERROR('No se realizo la transaccion',16,1)
                    END CATCH

                    END

                  ";
                     //echo $queryTransaction;

}




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
