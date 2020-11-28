<?php
    include("db.php");

   
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM establecimiento WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $articulo = $row['nombre'];
            $precio = $row['coordenadas'];
            $color = $row['municipio'];
            $talla = $row['tipoEstablecimiento'];
           
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id']; 
        $nombre = $_POST['nombre'];
        $coordenadas = $_POST['coordenadas'];
        $municipio = $_POST['municipio'];
        $tipoEstablecimiento = $_POST['categoria'];
      
        
        $query = "UPDATE establecimiento SET nombre = '$nombre', coordenadas = '$coordenadas', municipio = '$municipio',tipoEstablecimiento = '$tipoEstablecimiento' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea actualizada';
        $_SESSION['message_type'] = 'warning';
        header("Location: establecimiento.php");

    }

?>

<?php include("Includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_article.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $articulo; ?>" id="" class="form-control" placeholder="Actualizar">
                    </div>
                    <div class="form-group">
                        <input type="number" name="coordenadas" value="<?php echo $precio; ?>" class="form-control" placeholder="">
                    </div>
                    <?php

                    $query0 = "SELECT * FROM municipio";    
                    $query1 = "SELECT * FROM tipoEstablecimiento";    
                    $result0 = mysqli_query($conn, $query0);
                    $result1 = mysqli_query($conn, $query1);

                    ?>
                    <div class="form-group">
                    <select name='municipio' class="form-control" placeholder="Municipio">
                        <?php while($row = mysqli_fetch_array($result0)):; ?>
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
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("Includes/footer.php")?>