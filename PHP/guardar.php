<?php
 // incluimos la conexion a bd
 include '../conexion/conexionBD.php';
 $conexion = conexionBD();
 // validamos el dato enviado desde la vista
 if(isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    // si no biene vacio el parametro titutlo entonces realizamos el insert
    $save = $conexion->query("INSERT INTO tareas(titulo, descripcion) VALUES('".$titulo."','".$descripcion."')");
    if($save > 0){

        $_SESSION['mensaje'] = "Guardado exitosamente";
        $_SESSION['tipo'] = 'success';
        header("Location: ../index.php");
    }else{
        $_SESSION['mensaje'] = 'Error al guardar :(';
        $_SESSION['tipo'] = 'danger';
    }
 }
?>