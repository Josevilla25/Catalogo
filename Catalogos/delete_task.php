<?php
    include("db.php");
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tipoEstablecimiento WHERE id = $id";
        $resultado = mysqli_query($conn,$query);
        if(!$resultado){
            $_SESSION['message'] = 'No se pudo eliminar';
            header("Location: categoria.php");
        }

        $_SESSION['message'] = 'Tarea Eliminada';
        $_SESSION['message_type'] = 'danger';
        //redirección
        header("Location: categoria.php");
    }
?>