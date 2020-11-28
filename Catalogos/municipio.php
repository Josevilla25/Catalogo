<?php 
include("db.php");
include("Includes/header.php");?>

<?php 

/*if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }*/?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                
               
            </div>

            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Municipio</th>
                            <th>Departamento</th>
                            <th>Poblacion</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query = "SELECT * FROM municipio";
                        $result_tasks = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['municipio'] ?></td>
                                <td><?php echo $row['departemento'] ?></td>
                                <td><?php echo $row['poblacion'] ?></td>
                               
                                <td>
                                    <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i></a>
                                   
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


<?php include("Includes/footer.php");?>


<?php
    if(isset($_POST['save_venta'])){
        $factura = $_POST['factura'];
        //$total = $_POST['cantidad'];
        $cliente = $_POST['cliente'];
        $query = "INSERT INTO ventas (factura, cliente ) VALUES ('$factura', '$cliente')";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            die("Fallo la consulta");
        }

    }
?>