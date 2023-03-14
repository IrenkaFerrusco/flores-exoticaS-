<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		
		
		<title>Flores</title>
		<meta name="keywords" content="">
   		<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="icon" href="img/1.svg">
      <link rel="stylesheet" href="login.css">
    	<link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
      <link rel="canonical" href="http://informacion-de-plantas-exoticas.ml/"/>

	    <header class="navegacion">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark  fixed-top text-uppercase pt-4">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img class="logo" src="img/1.svg" alt="Reino floral">
            </a>
            <h1>Reino floral</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <section class="buttons">
              <a href="pags/mapa.html" class=" tres bi bi-geo-fill" data-bs-toggle="tooltip" title="Donde esncontrarlas"></a>
              <a href="pags/video.html" class="cuatro bi bi-youtube" data-bs-toggle="tooltip" title="Video"></a>
              <a href="formulario.html" class=" bi bi-card-text" data-bs-toggle="tooltip" title="Formulario"></a>
            </section>
          </header>
<div align="center">
  <form method="POST">
    <table>
      <tr>
        <td colsap="2" style="background-color:#800080;padding-bottom:10px; ;">
          <label>Iniciar sesión</label>
        </td>
      </tr>
      <tr>
        <td rowspan="6">
          <img src=./img/ico.png
        </td>
        <td>
          <label>Usuario</label>
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" name="txtusuario" placeholder="Ingresar usuario" required />
        </td>
      </tr>
      <tr>
        <td>
          <label>Contraseña</label>
        </td>
      </tr>
      <tr>
        <td>
          <input type="password" name="txtpassword" placeholder="Ingresar Contraseña" required />
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" name="btningresar" value="Ingresar">
        </td>
      </tr>



    </table>
  </form>
</div>
</div>
</nav>
</header>
</body>
</body>
</html>

<?php

session_start();
if(isset($_SESSION['nombredelusuario'])){
  header('location: pagina.php');
}
  if(isset($_POST['btningresar']))
  {
    $dbhost = "localhost";
    $dbuser= "root";
    $dbpass= "";
    $dbname="bdtest";

    $con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if (!$con) {
      die("No hay conexión: " .mysqli_connect_error());
    }

    $nombre=$_POST['txtusuario'];
    $pass=$_POST['txtpassword'];

    $query=mysqli_query($con, "Select * from login where usuaerio = '".$nombre."' and password = '".$pass."'");
    $nr=mysqli_num_rows($query);

    if(!isset($_SESSION['nombredelusuario']))
    {
    if($nr == 1) {
      $_SESSION['nombredelusuario']=$nombre;
      header("location: pagina.php");
    }
    else if($nr == 0) {
      echo "<script>alert('Usuario no existe');window.location= 'index.php'</script>";
    }

  }
}
?>