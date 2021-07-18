<?php 
$host = 'localhost';
$name_bd = 'diplomas-con-php';
$usuario_db = 'root';
$contrasena_db = '';
try{
    // 1 conexion con PDO
    $base=new PDO("mysql:host=$host; dbname=$name_bd", "$usuario_db", "$contrasena_db");//RESPETAR LOS ESPACIOS DESDUES DE LAS COMAS
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//SetAttribute lleva dos T
    $base->exec("SET CHARACTER SET UTF8");

    }catch(PDOException $e){
        #devuelve el error
        die ('Error'.$e->getMessage());
    
    }

 ?>