<?php
if(!isset($_GET["idcedula"])){//si no exite placa q mande error
    header("Locantion:index.php?mensaje=error");
    exit();
}

include"model/db.php";
$varPlca = $_GET["idcedula"];
$consulta = $bd ->prepare("DELETE FROM entrada3 WHERE idcedula = ?;");// es para especificar q voy a ingresar algo ? = pero aun no se especifica q 
//Me ejecuta la consulta
$resultado = $consulta->execute([$varPlca]);

if($resultado ===  TRUE){
    header("Location: index.php?mensaje=eliminado");
}else{
    header("Location: index.php?mensaje=error");    
}

?>