<?php
    include '../asset/header.php';
    // incluimos la conexion a bd
    include '../conexion/conexionBD.php';
    $conexion = conexionBD();
    // recibimos el metodo get
    if(isset($_GET['idregistro'])){
        $id = $_GET['idregistro'];
        $datosObtenids = mysqli_query($conexion, "SELECT * FROM tareas WHERE idtareas =".$id);
        $items = mysqli_fetch_assoc($datosObtenids);
    }
 // validamos el dato enviado desde la vista
 if(isset($_POST['actualizar'])){
    $idtareas = $_GET['idregistro'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    // si no biene vacio el parametro titutlo entonces realizamos el insert
    $edit = $conexion->query("UPDATE tareas SET titulo='$titulo', descripcion='$descripcion' WHERE idtareas=".$idtareas);
    if($edit > 0){
        $_SESSION['mensaje'] = "Actualizo exitosamente";
        $_SESSION['tipo'] = 'success';
        header("Location: ../index.php");
    }else{
        $_SESSION['mensaje'] = 'Error al actualizar :(';
        $_SESSION['tipo'] = 'danger';
    }
}
?>
<div class="container">
<form class="form-horizontal mt-2" method="POST" action="editar.php?idregistro=<?php echo $_GET['idregistro'];?>">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h3>EDITAR TAREA</h3>
                        </div>
                    </div>
                </div>
                    <input type="hidden" name="actualizar" value="actualizar">
                    <div class="form-group">                       
                            <label for="titulo">Titulo</label>
                            <input name="titulo" id="titulo" type="text" class="form-control" value="<?php echo $items['titulo']?>">                       
                    </div>
                    <div class="form-group">                      
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control">
                                <?php echo $items['descripcion']?>
                            </textarea>                         
                       
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <a  href="../index.php" class="btn btn btn-link"><i class="fa fa-arrow-left"></i> Cancelar</a>
                            <button  type="submit" class="btn btn-success"><i class="fa fa-pencil" ></i> Actualizar </button>
                        </div>
                    </div>
                </form>
</div>
<?php
    include '../asset/footer.php';
?>