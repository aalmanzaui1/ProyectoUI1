<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
?>
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
    //$login=false;
    $con=false;
    $datos=$_POST["usuario"];
    $link;
    $host="localhost";
    $puerto = "3306"; 
    $usuario = "ui1";
    $pass = "almanza";
    $baseDeDatos ="administracion";
    //$tabla = "personas";
    ComprobacionInicial();
    
    //FUNCION PARA COMPROBAR LA CONEXION A LA BASE DE DATOS Y LA CONEXION DE LOS USUARIOS
    function ComprobacionInicial()
    {
        global $datos,$usuario,$pass, $link;
        $seguir=Conectarse($usuario,$pass);
        if($seguir){
            ComprobarUsuario($datos["nombre"],$datos["contrasenia"]);
        }
    }
    
    //FUNCION PARA COMPROBAR LA CONEXION A LA BASE DE DATOS
    function Conectarse($aux1,$aux2) 
    {
        global $host, $puerto, $con, $link, $baseDeDatos;
        $link= mysqli_connect ($host.":".$puerto, $aux1, $aux2, $baseDeDatos);
        if ($link){
            /*if (!mysqli_select_db($baseDeDatos)) {
                include 'errorconexion.html';
                } else {
                $_SESSION["conexion"]=$link;
                $con=true;
                }*/
                $con=true;
                //print_r($link);
            }else{ 
                include 'errorconexion.html';
                $con=false;
            }
            return $con;
    }
    
    //FUNCION PARA COMPORBAR LA EXISTENCIA DEL USUARIO EN LA TABLA ADM
    function ComprobarUsuario($aux1,$aux2)
    {
        global $link;
        $_SESSION["con"]=$link;
        $query= "SELECT usuario,pass FROM administracion.adm WHERE usuario='".$aux1."'";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_array(mysqli_query($link,$query));
        if (!$result) {die('Consulta no válida: ' . mysql_error());}
        if($aux1==$row["usuario"] && $aux2==$row["pass"])
        {
            include 'dashboard.html';
            mysqli_close($link);
        }else
            {
                include 'errorusuario.html';
                mysqli_close($link);
            }
    }
 ?>
    <script> $('#errorconexion').modal('show');</script>
    <script> $('#errorusuario').modal('show');</script>
</body>
</html>