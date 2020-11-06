<?php
    session_start();//creamos una sesión me servira para mostrar mensaje
    function conexionBD(){
        // Datos de servidor  
        $host = "localhost";
        $nombreBD = "crud_tareas";
        $usuario = "root";
        $pass = "";
        
        // Realizamos la conexion a nuestra bd
        $conexion = new mysqli($host, $usuario, $pass, $nombreBD);
        // Validamos que la conexion este correcta
        if($conexion->connect_error){
            die("Erro de conexion ".$conexion->connect_errno." ".$conexion->connect_error);
        }else{
            return $conexion;
        }
    }
?>