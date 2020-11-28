<?php include("db.php")?>
<?php include("Includes/header.php")?>
<?php 
    /*if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }
    if($_SESSION['user_rol'] != '1'){
        header("Location: venta.php");
    }*/
    
    ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">

            <?php  if(isset($_SESSION['message'])) { ?>

            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php /*session_unset();*/ } ?>

            <div class="card card-body">

                <h1>Registro de Establecimientos</h1>

                <?php

                    $query = "SELECT * FROM municipio";    
                    $query1 = "SELECT * FROM tipoEstablecimiento";    
                    $result = mysqli_query($conn, $query);
                    $result1 = mysqli_query($conn, $query1);

                    ?>
                <form action="save_article.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre de establecimiento" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="number" name="coordenadas" class="form-control" placeholder="Coordenadas" >
                    </div>
                   
                    <div class="form-group">
                    <select name='municipio' class="form-control" placeholder="Municipio">
                        <?php while($row = mysqli_fetch_array($result)):; ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <select name='categoria' class="form-control" placeholder="Categoría">
                        <?php while($row = mysqli_fetch_array($result1)):; ?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                  
                    <input type="submit" value="Guardar Establecimiento" class="btn btn-success btn-block" name="save_article">

                </form>
            </div>
            


            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Establecimiento</th>
                            <th>Coordenadas</th>
                            <th>Municipio</th>
                            <th>Tipo</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query3 = "SELECT * FROM establecimiento";
                            $result_establecimiento = mysqli_query($conn, $query3);
                            while($row = mysqli_fetch_array($result_establecimiento)){?>
                            <tr>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['coordenadas']?></td>
                                <td><?php echo $row['municipio']?></td>
                                <td><?php echo $row['tipoEstablecimiento']?></td>
                               
                                <td>
                                    <a href="edit_article.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i></a>
                                    <a href="delete_article.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>


                            <?php }?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
<?php include("Includes/footer.php")?>