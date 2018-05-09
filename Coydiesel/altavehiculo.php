<html lang="en">
<head>
  <title>Coy Baez Diesel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body bg-light text-black>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="dashboard.html">Menu principal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-item nav-link active" href="dashboard.html">Inicio <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="altavehiculo.html">Alta y baja vehiculo</a>
                <a class="nav-item nav-link active" href="altausuario.html">Alta y baja usuario</a>
                <a class="nav-item nav-link active" href="mostrarvehiculo.php">Mostrar vehiculos</a>
                <a class="nav-item nav-link active" href="mostrarcliente.php">Mostrar usuarios</a>
              </div>
            </div>
        </nav>
<?php
include 'bd.php';
$datos=$_POST['car'];
$con= Conectarse();
$query= "INSERT INTO coches VALUES ('".$datos["matricula"]."','".$datos["marca"]."','".$datos["modelo"]."','".$datos["telefono"]."',
    '".$datos["color"]."','".$datos["observaciones"]."','".$datos["motivo"]."');";
$result = mysqli_query($con,$query);
if($result) {
echo "<strong>Se ingresaron los registros con éxito</strong>. <br/>";
} else {
echo "No se ingresaron los registros. <br/>";
}
?>
</body>
</html>