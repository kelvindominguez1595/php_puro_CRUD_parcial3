<?php
    include 'asset/header.php';
    include 'conexion/conexionBD.php';
?>
    <!-- Contenedor  -->
    <div class="container">
        <!-- Columna de 12 -->
        <div class="row">
        <div class="col mt-4">
                <?php  
                if(isset($_SESSION['mensaje'])){            
                ?>
            <div class="alert alert-<?php echo $_SESSION['tipo']?> alert-dismissible fade show" role="alert">
                <strong>
                <?php if( $_SESSION['tipo'] == 'success'){ ?>
                    Exitos!!!
                <?php }else{ ?>
                    Oooh! Algo a pasado
                <?php } ?>    
                </strong> 
                <?php echo $_SESSION['mensaje']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                }
            ?>
        </div>
        </div>
        <div class="row">
        <!-- Columna 1 -->
            <div class="col-12 col-sm-12 col-md-4 col-l-4 col-xl-4">
                <form class="form-horizontal mt-2" method="post" action="PHP/guardar.php">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h3>TAREA</h3>
                        </div>
                    </div>
                </div>
                    <div class="form-group">                       
                            <label for="titulo">Titulo</label>
                            <input name="titulo" id="titulo" type="text" class="form-control">                       
                    </div>
                    <div class="form-group">                      
                            <label for="descripcion">Descripción</label>
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>                         
                       
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- Columna 2 -->
            <div class="col-12 col-sm-12 col-md-8 col-l-8 col-xl-8">
                <div class="row mt-3">
                        <div class="col-12">
                            <div class="text-center">
                                <h3>MOSTRAR TAREAS</h3>
                            </div>
                        </div>
                    </div>
                <div class="table-responsive mt-3">
                <table class="table " id="table_id"> 
                <thead>
                <tr>
                <th>#</th>
                <th>Título cls</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php include 'PHP/mostrar.php';?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <?php
        include 'asset/footer.php';
    ?>