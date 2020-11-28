<?php
    include("db.php");
   /* if(!isset($_SESSION['user_id'])){
        header("Location: login.php");
    }*/
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tipoEstablecimiento WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $title = $row['tipoEstablecimiento'];
           
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id']; 
        $title = $_POST['title'];
        
        
        $query = "UPDATE tipoEstablecimiento SET tipoEstablecimiento = '$title' WHERE id = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea actualizada';
        $_SESSION['message_type'] = 'warning';
        header("Location: categoria.php");

    }

?>

<?php include("Includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" id="" class="form-control" placeholder="Actualizar">
                    </div>
                 
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("Includes/footer.php")?>