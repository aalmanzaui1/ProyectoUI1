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
<body>
<?php
    $con=false;
    $link;
    $host="localhost";
    $puerto = "3306"; 
    $usuario = "ui1";
    $pass = "almanza";
    $baseDeDatos ="administracion";
function Conectarse() 
    {
        global $host, $puerto, $con, $link, $baseDeDatos, $usuario, $pass;
        $link= mysqli_connect ($host.":".$puerto, $usuario, $pass, $baseDeDatos);
        if (!$link){
                include 'errorconexion.html';
            } else{
                return $link;
            }
    }
?>
    <script> $('#errorconexion').modal('show');</script>
</body>
</html>