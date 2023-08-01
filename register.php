<?php
include_once "model/db.php";

$varPlaca = $_POST["texPlaca"];
$varPropietario = $_POST["texPropietario"];
$varHora = $_POST["texHora"];
$varFecha = $_POST["texFecha"];
$varTipo = $_POST["texTipo"];
$VarAbono = $_POST["texAbono"];
$Varfechas = $_POST["texFechas"];
$Varnump = $_POST["texnum"];
$varfechaAbono = $_POST["texFechaBono"];

//prepare es para cuando vamos hacer un cambio
$consulta = $bd->prepare("INSERT INTO entrada3(idcedula,nombre,ahorro,rifa,fecha,numPrestamo,prestamo,fechaAbono,abono) VALUES(?,?,?,?,?,?,?,?,?);");//para extraer informacion se utiliza query
$resultado = $consulta->execute([$varPlaca,$varPropietario,$varHora,$varFecha,$Varfechas,$Varnump,$varTipo,$varfechaAbono,$VarAbono]);

if($resultado === TRUE){
    header("Location:index.php?mensaje=registrado");
}else{
    header("Location:index.php?mensaje=ERROR");
}
?>