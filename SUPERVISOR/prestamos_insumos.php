    <?php
    $title = "PRÉSTAMOS";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Mostrar alertas si existen
    if (isset($_SESSION['alert_type']) && isset($_SESSION['alert_message'])) {
        $alertType = $_SESSION['alert_type'];
        $alertMessage = $_SESSION['alert_message'];

        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '{$alertType}',
                    title: " . ($alertType == 'success' ? "'¡Éxito!'" : "'¡Error!'") . ",
                    text: '{$alertMessage}',
                    confirmButtonColor: '#ff0000'
                });
            });
        </script>
        ";

        // Limpiar las variables de sesión
        unset($_SESSION['alert_type']);
        unset($_SESSION['alert_message']);
    }

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <!-- SweetAlert2 CSS -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <!-- SweetAlert2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                font-family: Arial, sans-serif;
            }

            .export-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #D62828;
                color: #FFF;
                text-decoration: none;
                border-radius: 5px;
                font-size: 16px;
                position: absolute;
                top: 1.5%;
                left: 5%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .export-button:hover {
                background-color: #943126;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .custom-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #D62828;
                color: #FFF;
                text-decoration: none;
                border-radius: 5px;
                font-size: 16px;
                position: absolute;
                top: 1.5%;
                left: 85%;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .custom-button:hover {
                background-color: #943126;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            th {
                text-align: center;
            }

            tr {
                text-align: center;
            }

            .tabla1 {
                position: absolute;
                top: 25%;
                left: 5%;
                padding: 10px;
                width: 1200px;
                height: 400px;
            }

            table {
                font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                font-size: 14px;
                border-radius: 10px;
                padding: 10px;
                box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
                background-color: white;
            }

            th {
                font-size: 13px;
                font-weight: normal;
                padding: 8px;
                color: #FCFCFC;
                font-weight: bold;
                border-radius: 5px;
                box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            }

            td {
                padding: 8px;
                background: white;
                color: black;
                border-radius: 5px;
                background-color: white;
                box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
            }

            tr:hover td {
                background: #f5f5f5;
            }

            .title1 {
                font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
                color: white;
            }

            .panel-box-admin {
                width: 100%;
                height: 50px;
                position: absolute;
                padding-bottom: 8px;
                top: 0%;
                left: 0%;
                background-color: red;
                border-bottom: #943126 10px solid;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .encabezado {
                background-color: red;
            }

            .pagination {
                text-align: center;
                position: absolute;
                top: 90%;
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

            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #fefefe;
                margin: 3% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 50%;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                animation: fadeIn 0.4s;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
                cursor: pointer;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            form label {
                display: block;
                margin-top: 10px;
            }

            form input,
            form select {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            form button {
                background-color: #ff0000;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
                margin-left: 40%;
            }

            form button:hover {
                background-color: #D62828;
            }

            button {
                background-color: #ff0000;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .dropdown-nav {
                position: absolute;
                top: 1%;
                left: 2%;
                z-index: 1000;
            }

            .dropbtn {
                background-color: #ff0000;
                color: white;
                padding: 12px 20px;
                font-size: 16px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .dropbtn:hover,
            .dropbtn:focus {
                background-color: #D62828;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                left: 0;
                background-color: #fff;
                min-width: 220px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                border-radius: 5px;
                overflow: hidden;
            }

            .dropdown-content a {
                color: #333;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                transition: background 0.2s;
            }

            .dropdown-content a:hover {
                background-color: #f1f1f1;
                color: #ff0000;
            }

            .dropdown-nav:hover .dropdown-content {
                display: block;
            }
        </style>
    </head>

    <body>
        <div class="dropdown-nav">
            <button class="dropbtn">&#9776;</button>
            <div class="dropdown-content">
                <a href="inventario.php"><i class="fa-solid fa-boxes-stacked"></i> Inventario</a>
                <a href="espacios.php"><i class="fa-solid fa-building"></i> Espacios</a>
                <a target="_blank" href="exportar_prestamos.php"><i class="fa-solid fa-file-export"></i> Informe de Préstamos</a>
                <a href="supervisor.php"><i class="fa-solid fa-house"></i> Volver al inicio</a>
                <a href="../cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
            </div>
        </div>
        <!-- Modal para editar préstamos de insumos -->
        <div id="editModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="modal.style.display='none';">&times;</span>
                <h2 style="text-align: center;">Devolucion del Préstamo</h2>
                <form id="editForm" method="POST" action="actualizar_prestamo.php">
                    <input type="hidden" name="id_prestamo" id="id_prestamo">

                    <!-- Tabla de inventario relacionado -->
                    <h3>Insumos del Inventario Relacionados</h3>
                    <div style="max-height: 200px; overflow-y: auto;">
                        <table style="width: 100%;">
                            <thead>
                                <tr style="background:red; color: white;">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Prestado a</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="inventario-tabla">
                                <!-- La tabla se llenará dinámicamente -->
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <h3>¿Los equipos devueltos son los mismos que estan relacionados con este préstamo?</h3>
                    <button type="submit">Si</button>
                    <button style="position: relative; right: 250px;" type="button" onclick="document.getElementById('editModal').style.display = 'none';">No</button>
                </form>
            </div>
        </div>

        <!-- Modal para Editar Préstamo de Espacios -->
        <div id="editEspaciosModal" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('editEspaciosModal').style.display='none';">&times;</span>
                <h2 style="text-align: center;">Préstamo de Espacios</h2>
                <form id="editEspaciosForm" method="POST" action="actualizar_prestamo_espacios.php">
                    <input type="hidden" name="id_prestamo_espacio" id="id_prestamo_espacio">
                    <input type="hidden" name="espacio" id="espacio">
                    <h3>¿El encargado trajo los implementos prestados con el espacio y el espacio ya ha sido desocupado?</h3>
                    <br>
                    <button type="submit">Si</button>
                    <button style="position: relative; right: 250px;" type="button" onclick="document.getElementById('editEspaciosModal').style.display = 'none';">No</button>
                </form>
            </div>
        </div>

        <!-- Formulario para seleccionar la tabla -->
        <form method="GET" action="prestamos_insumos.php" style="text-align: center;POSITION: absolute;TOP: 12%;LEFT: 45%;">
            <label for="tabla">Selecciona la tabla:</label>
            <select name="tabla" id="tabla" onchange="this.form.submit()">
                <option value="prestamos_insumos" <?php echo (isset($_GET['tabla']) && $_GET['tabla'] === 'prestamos_insumos') ? 'selected' : ''; ?>>Prestamos Insumos</option>
                <option value="prestamos_espacios" <?php echo (isset($_GET['tabla']) && $_GET['tabla'] === 'prestamos_espacios') ? 'selected' : ''; ?>>Prestamos Espacios</option>
            </select>
        </form>

        <script>
            // Obtener elementos del DOM
            const modal = document.getElementById("editModal");
            const closeModal = document.querySelector(".close");
            const editForm = document.getElementById("editForm");

            // Función para abrir el modal con los datos del registro
            function openModal(id_prestamo, insumo, nombre_persona_prestamo, estado, dia_prestamo, hora_prestamo) {
                document.getElementById("id_prestamo").value = id_prestamo;

                // Cargar datos del inventario relacionados con este préstamo
                cargarInventario(id_prestamo);

                modal.style.display = "block";
            }

            // Función para cargar los datos del inventario mediante AJAX
            function cargarInventario(id_prestamo) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_inventory.php?id_prestamo=' + id_prestamo, true);

                xhr.onload = function() {
                    if (this.status === 200) {
                        document.getElementById('inventario-tabla').innerHTML = this.responseText;
                    } else {
                        document.getElementById('inventario-tabla').innerHTML = '<tr><td colspan="4">Error al cargar datos del inventario</td></tr>';
                    }
                };

                xhr.onerror = function() {
                    document.getElementById('inventario-tabla').innerHTML = '<tr><td colspan="4">Error de conexión</td></tr>';
                };

                xhr.send();
            }

            // Función para abrir el modal de edición de préstamos de espacios
            function openEspaciosModal(id_prestamo_espacio, espacio) {
                document.getElementById("id_prestamo_espacio").value = id_prestamo_espacio;
                document.getElementById("espacio").value = espacio;
                document.getElementById("editEspaciosModal").style.display = "block";
            }

            // Cerrar el modal
            closeModal.onclick = function() {
                modal.style.display = "none";
            };

            // Cerrar el modal si se hace clic fuera de él
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        </script>
        <?php
        $conexion = new mysqli("localhost", "root", "", "basededatos");

        // Verifica la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Determinar la tabla seleccionada
        $tablaSeleccionada = isset($_GET['tabla']) ? $_GET['tabla'] : 'prestamos_insumos';

        // Configuración de paginación
        $registrosPorPagina = 5;
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
        $offset = ($paginaActual - 1) * $registrosPorPagina;

        // Consulta SQL con filtro según el estado
        if ($tablaSeleccionada === 'prestamos_insumos') {
            $sql = "SELECT * FROM prestamos_insumos WHERE estado = 'Prestado' LIMIT $offset, $registrosPorPagina";
        } elseif ($tablaSeleccionada === 'prestamos_espacios') {
            $sql = "SELECT * FROM prestamos_espacios WHERE estado = 'Reservado' LIMIT $offset, $registrosPorPagina";
        }

        $resultado = $conexion->query($sql);

        // Consulta SQL para obtener el número total de registros
        $totalRegistros = $conexion->query("SELECT COUNT(*) as total FROM $tablaSeleccionada")->fetch_assoc()['total'];
        $numTotalPaginas = ceil($totalRegistros / $registrosPorPagina);


        echo "<div class='panel-box-admin'>";
        echo "<h2 class='title1' align='center'>$title</h2>";
        echo "</div>";

        echo "<div class='tabla1'>";
        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr class='encabezado'>";

            // Encabezados dinámicos según la tabla seleccionada
            if ($tablaSeleccionada === 'prestamos_insumos') {
                echo "
                <th style='width:150px;'>Insumo</th>
                <th style='width:250px;'>Nombre del Encargado</th>
                <th style='width:100px;'>Estado</th>
                <th style='width:150px;'>Fecha del Aprobado</th>
                <th style='width:100px;'>Hora de Salida</th>
                <th style='width:150px;'>Hora de Devolución</th>
                <th style='width:100px;'>Acciones</th>
            ";
            } else if ($tablaSeleccionada === 'prestamos_espacios') {
                echo "
                <th style='width:150px;'>Espacio</th>
                <th style='width:200px;'>Nombre de la Persona</th>
                <th style='width:100px;'>Estado</th>
                <th style='width:150px;'>Fecha del Prestamo</th>
                <th style='width:150px;'>Fecha </th>
                <th style='width:100px;'>Hora de Entrega</th>
                <th style='width:100px;'>Hora de Regreso</th>
                <th style='width:100px;'>Acciones</th>
            ";
            }
            echo "</tr>";
            // Mostrar los registros en la tabla seleccionada

            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                if ($tablaSeleccionada === 'prestamos_insumos') {
                    echo "
                    <td>" . $fila['insumo'] . "</td>
                    <td>" . $fila['nombre_persona_prestamo'] . "</td>
                    <td>" . $fila['estado'] . "</td>
                    <td>" . date("d/m/Y h:i A", strtotime($fila['dia_prestamo'])) . "</td>
                    <td>" . date("g:i A", strtotime($fila['desde'])) . "</td>
                    <td>" . date("g:i A", strtotime($fila['hasta'])) . "</td>
                    <td>
                    <button onclick=\"openModal(
                        '{$fila['id_prestamo']}',
                        '{$fila['insumo']}',
                        '{$fila['nombre_persona_prestamo']}',
                        '{$fila['estado']}',
                        '{$fila['dia_prestamo']}'
                    )\">Devolver</button>
                </td>
                ";
                } elseif ($tablaSeleccionada === 'prestamos_espacios') {
                    echo "
                    <td>" . $fila['espacio'] . "</td>
                    <td>" . $fila['nom_persona'] . "</td>
                    <td>" . $fila['estado'] . "</td>
                    <td>" . $fila['dia_prestamo'] . "</td>
                    <td>" . $fila['fecha_entrega'] . "</td>
                    <td>" . date("g:i A", strtotime($fila['desde'])) . "</td>
                    <td>" . date("g:i A", strtotime($fila['hasta'])) . "</td>
                    <td>
                    <button onclick=\"openEspaciosModal(
                        '{$fila['id_prestamo_espacio']}',
                        '{$fila['espacio']}'
                    )\">Devolver</button>
                </td>
                ";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // Display a specific message based on the selected table
            if ($tablaSeleccionada === 'prestamos_insumos') {
                echo "<div style='text-align: center; padding: 20px; background-color: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>";
                echo "<h3>No hay préstamos de insumos para devolver.</h3>";
                echo "</div>";
            } elseif ($tablaSeleccionada === 'prestamos_espacios') {
                echo "<div style='text-align: center; padding: 20px; background-color: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>";
                echo "<h3>No hay préstamos de espacios para devolver.</h3>";
                echo "</div>";
            }
        }

        echo "</div>";


        $conexion->close();
        ?>

        <div class="pagination">
            <?php
            for ($i = 1; $i <= $numTotalPaginas; $i++) {
                $claseActiva = ($i == $paginaActual) ? "active" : "";
                echo "<a class='$claseActiva' href='prestamos_insumos.php?pagina=$i'>$i</a>";
            }
            ?>
        </div>
        <br>
        
    </body>

    </html>