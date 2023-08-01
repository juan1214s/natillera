<?php
print_r($_POST);
if(!isset($_POST["idcedula"])){
    header("Location:index.php?mensaje=error");
}

include "model/db.php";
$varPlaca = $_POST["txtPlaca"];
$varpropietario = $_POST["txtPropietario"];
$varhoraEntrada = $_POST["txthoraEntrada"];
$varfecha = $_POST["txtfecha"];
$varfechas = $_POST["txtfechas"];
$varnumprestamo = $_POST["txtnum"];
$varTip_Vehiculo = $_POST["txtTip_Vehiculo"];
$varfachasAbonos = $_POST['txtfechaAbono'];
$VarAbonos = $_POST["txtAbono"];



$consulta = $bd->prepare("UPDATE entrada3 SET nombre=?,ahorro=?,rifa=?,fecha=?,numPrestamo=?,prestamo=?,fechaAbono=?,abono=? WHERE idcedula=?;");

$resultado = $consulta->execute([$varpropietario,$varhoraEntrada,$varfecha,$varfechas,$varnumprestamo,$varTip_Vehiculo,$varfachasAbonos,$VarAbonos,$varPlaca]);

if($resultado === TRUE){
    header("Location: index.php?mensaje=editado");
}else{
    header("Location : index.php?mensaje=error");
    exit();
}
?>