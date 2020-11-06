<?php
    include '../asset/header.php';
    // incluimos la conexion a bd
    include '../conexion/conexionBD.php';
    $conexion = conexionBD();
 // validamos el dato enviado desde la vista
 if(isset($_POST['borrar'])){
    $idtareas = $_GET['idregistro'];

    // si no biene vacio el parametro titutlo entonces realizamos el insert
    $edit = $conexion->query("DELETE FROM tareas WHERE idtareas=".$idtareas);
    if($edit > 0){
        $_SESSION['mensaje'] = "El registro se ha borrado";
        $_SESSION['tipo'] = 'success';
        header("Location: ../index.php");
    }else{
        $_SESSION['mensaje'] = 'Error al borrar el registro :(';
        $_SESSION['tipo'] = 'danger';
    }
}
?>
<div class="container mt-3">
<div class="jumbotron">
  <h1 class="display-4">¿Esta seguro de borrar el registro?</h1>
  <p class="lead">Tenga en cuenta que al borrar un registro no se podrá a volver a recuperar nunca...</p>
  <hr class="my-4">
  <p>Si esta seguro presione en aceptar caso contrario en cancelar.</p>
    <form class="" method="POST" action="eliminar.php?idregistro=<?php echo $_GET['idregistro'];?>">

        <div class="form-group">
            <div class="text-center">
            <input type="hidden" name="borrar" value="borrar">
                <a  href="../index.php" class="btn btn btn-link"><i class="fa fa-arrow-left"></i> Cancelar</a>
                <button  type="submit" class="btn btn-danger"><i class="fa fa-trash" ></i> Si, Acepto </button>
            </div>
        </div>
    </form>
</div>
</div>
<?php
    include '../asset/footer.php';
?>