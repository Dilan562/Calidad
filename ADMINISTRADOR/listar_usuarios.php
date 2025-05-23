<!DOCTYPE html>
<html>

<head>

    <title>Lista de Usuarios</title>

    <style>
        html {
            background: linear-gradient(white, 60%, #FADBD8);
            height: 100%;
        }

        h2 {
            text-align: center;
            padding: 10px;
            background: red;
            color: white;
            font-weight: bold;
            width: 260px;
            height: 30px;
            border-radius: 5px;
            margin-left: 40%;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        body {

            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            margin-left: 40%;
        }

        .pdf-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #E07A5F;
            color: #FFF;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5%;
            margin-left: 45%;
        }

        .pdf-button:hover {
            background-color: #D62828;
            margin-left: 45%;
        }

        th {
            text-align: center;
        }

        tr {
            text-align: center;
        }

        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 16px;
            margin-left: 10%;
            margin-top: 2%;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th {
            font-size: 13px;
            font-weight: normal;
            padding: 8px;
            background: red;
            font-weight: bold;
            border-radius: 5px;
            color: white;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td {
            padding: 8px;
            background: white;
            color: black;
            border-radius: 5px;
            border-color: white;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        tr:hover td {
            background: #d0dafd;
            color: black;
        }

        caption {
            padding: 0.3em;
            color: #fff;
            background: #000;
        }

        .formulario {
            margin-left: 40%;
        }

        .btno {
            margin-left: 40%;
        }

        h3 {
            margin-left: 40%;
        }

        .regresar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0074D9;
            color: #FFF;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            position: absolute;
            top: 90%;
            left: 80%;
        }

        .regresar:hover {
            background-color: #0056b3;
            margin-left: 45%;
        }


        .custom-button {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            position: absolute;
            top: 2%;
            left: 85%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button:hover {
            margin-right: 0;
            /* Elimina el margen derecho del último botón */
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button2 {
            padding: 10px 20px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            position: absolute;
            top: 90%;
            left: 45%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .custom-button2:hover {
            background-color: #D62828;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pagination {
            text-align: center;
            position: absolute;
            top: 80%;
            left: 45%;
        }

        .pagination a {
            display: inline-flexbox;
            padding: 5px 10px;
            margin-left: 1%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-decoration: none;
            color: #000;
        }

        .pagination a.active {
            background-color: #ff0000;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h2>Lista de Usuarios</h2>

    <?php
    $conexion = new mysqli("localhost", "root", "", "basededatos");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    $registrosPorPagina = 6;
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

    // Consulta SQL con LIMIT para obtener registros de la página actual
    $offset = ($paginaActual - 1) * $registrosPorPagina;
    $sql = "SELECT * FROM usuarios LIMIT $offset, $registrosPorPagina";
    $resultado = $conexion->query($sql);

    // Consulta SQL para obtener el número total de registros
    $totalRegistros = $conexion->query("SELECT COUNT(*) as total FROM usuarios")->fetch_assoc()['total'];

    // Calcular el número total de páginas
    $numTotalPaginas = ceil($totalRegistros / $registrosPorPagina);


    if ($resultado->num_rows > 0) {

        echo "<table >";
        echo "<th style=width:50px;>ID</th>
                <th style=width:250px;>Nombre de la persona</th>
                <th style=width:150px;>Nombre de Usuario</th>
                <th style=width:250px;>Contraseña</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th></tr>";
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            echo "<td>" . $fila['nombre_usuario'] . "</td>";
            echo "<td>" . $fila['contrasena'] . "</td>";
            echo "<td>" . $fila['rol'] . "</td>";
            echo "<td>" . ($fila['estado'] == 1 ? 'Activo' : 'Inactivo') . "</td>";
            echo "<td><a href='editar_listado.php?id=" . $fila['id'] . "&estado=" . $fila['estado'] . "&nombre_usuario=" . $fila['nombre_usuario'] . "&nombre=" . $fila['nombre'] . "&rol=" . $fila['rol'] . "'><img src='imagenes/editar.png' /></a><h>--</h><a href='eliminar_usuario.php?id=" . $fila['id'] . "'><img src='imagenes/eliminar.png' /></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay usuarios en la base de datos.";
    }


    ?>
    <!-- Crear los enlaces de paginación -->

    <div class="pagination">
        <?php
        for ($i = 1; $i <= $numTotalPaginas; $i++) {
            $claseActiva = ($i == $paginaActual) ? "active" : "";
            echo "<a class='$claseActiva' href='listar_usuarios.php?pagina=$i'>$i</a>";
        }
        ?>
    </div>
    <br>
    <div class="button-container">
        <a class="custom-button" target="_blank" href='exportar.php'">Exportar a PDF</a> 
    <a class =" custom-button2" href='admin_panel.php?nombre=Administrador'">Volver al Panel</a>
</div>
    
</body>
</html>