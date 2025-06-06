<?php
session_start();
include_once('../session_helper.php');
verificarSesion("Supervisor");
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html>

<head>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <title>Supervisor</title>
    <style>
        html {
            background: linear-gradient(to bottom, white, 70%, #FADBD8);
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            margin-bottom: 43%;
            font-family: Arial, sans-serif;
        }

        th {
            text-align: center;
        }

        td {
            text-align: center;
        }

        .custom-button {
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            font-size: 50px;
            border: none;
            width: 295px;
            height: 50px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            position: absolute;
            top: 70%;
            left: 7%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button2 {
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            font-size: 50px;
            text-align: center;
            border: none;
            width: 295px;
            height: 50px;
            border-radius: 5px;
            text-decoration: none;
            position: absolute;
            top: 70%;
            left: 38%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button2:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .custom-button3 {
            padding: 10px 20px;
            text-align: center;
            background-color: red;
            color: #fff;
            font-size: 30px;
            border: none;
            width: 300px;
            height: 30px;
            border-radius: 5px;
            text-decoration: none;
            position: absolute;
            top: 71%;
            left: 69%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button3:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .prestamos-button {
            padding: 10px 20px;
            text-align: center;
            background-color: red;
            color: #fff;
            font-size: 50px;
            border: none;
            width: 300px;
            height: 51px;
            border-radius: 5px;
            text-decoration: none;
            position: absolute;
            top: 70%;
            left: 69%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .prestamos-button:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title1 {
            margin-left: 120px;
        }

        .title2 {
            margin-left: 220px;
        }

        .logout-button {
            background-color: #D62828;
            color: #fff;
            font-size: small;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            position: absolute;
            top: 10px;
            left: 88%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logout-button:hover {
            background-color: #943126;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tabla2 {
            position: absolute;
            top: 14%;
            left: 45%;
        }

        .tabla1 {
            position: absolute;
            top: 14%;
            left: 1%;
        }

        .panel-box-admin {
            width: 100%;
            height: 75px;
            position: absolute;
            top: 0%;
            left: 0%;
            background-color: red;
            border-bottom: #943126 10px solid;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            top: 20px;
            color: white;
        }

        .imginv {
            position: absolute;
            top: 30%;
            left: 10%;
        }

        .imginv:hover {
            width: 20px;
            height: 20px;
            position: absolute;
        }

        .imgesp {
            position: absolute;
            top: 38%;
            left: 40%;
        }

        .imgesp:hover {
            width: 30px;
            height: 30px;
            position: absolute;
        }

        .imgpet {
            position: absolute;
            top: 27%;
            left: 66.5%;
        }

        .imgpet:hover {
            
        }
    </style>
</head>

<body>
    <div class="panel-box-admin">
        <div class="container">
            <h2>Bienvenido <?php echo htmlspecialchars($nombre); ?></h2>
        </div>
    </div>
    <a href="../cerrar_sesion.php" class="logout-button">Cerrar Sesión</a>


    <br>
    <br>
    <br>

    <a class="imginv"><img src='imagenes/inventario.PNG' /></a>
    <a class="imgesp"><img src='imagenes/espacio1.jpg' /></a>
    <a class="imgpet"><img src='imagenes/peticiones.png' /></a>


    <a class="custom-button" href="inventario.php">INVENTARIO</a>
    <a class="custom-button2" href="espacios.php">ESPACIOS</a>
    <a class="prestamos-button" href="prestamos_insumos.php">PRESTAMOS</a>
</body>

</html>