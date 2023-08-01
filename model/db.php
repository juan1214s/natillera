<?php
 $password = "";
 $user = "root";
 $name_bd = "parqueadero";

 try{
    $bd = new PDO("mysql:host=localhost; dbname=".$name_bd,$user,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES UTF8"));
 }
 catch(Exception $e){
    echo"problema en la conexión:".$e->getMessage();

 }

?>