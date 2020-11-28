<?php 

include("db.php");
/*if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}*/
if(isset($_POST['save_article'])){
    $nombre = $_POST['nombre'];
    $coordenadas = $_POST['coordenadas'];
    $municipio = $_POST['municipio'];
    $categoria = $_POST['categoria'];
   

    
	$query = "INSERT INTO establecimiento (nombre, coordenadas, municipio, tipoEstablecimiento)
     VALUES ('$nombre','$coordenadas','$municipio','$categoria')";
    $result = mysqli_query($conn, $query);
    

    if(!$result){
        die("Falló la consulta");
    }

    $_SESSION['message'] = 'Se guardó el artículo';
    $_SESSION['message_type'] = 'success';
    header("Location: establecimiento.php");
    
}

?>