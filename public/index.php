<?php
declare(strict_types=1);

// Traigo la función cargar_estudiante() que lee mis datos del archivo estudiante.json
require_once __DIR__ . '/../lib/estudiante.php';

# Pongo la hora de Panamá para que date() no use la zona del servidor
date_default_timezone_set('America/Panama');

/*
 * Guardo mis datos en $est (nombre, apellido, cedula y github_user)
 * y preparo la fecha con el formato día/mes/año hora:minutos.
 */
$est = cargar_estudiante();
// Junto nombre y apellido en una sola variable para usarla en el h1
$nombreCompleto = $est['nombre'] . ' ' . $est['apellido'];
$fechaHoy = date('d/m/Y H:i');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- El título de la pestaña se arma con PHP usando mi apellido -->
    <title>Lab 8 - <?= htmlspecialchars($est['apellido']) ?></title>
</head>
<body>
    <?php
    // El encabezado principal muestra mi nombre y apellido sacados del JSON
    echo '<h1>' . htmlspecialchars($nombreCompleto) . '</h1>';
    ?>

    <?php # Aquí uso print en vez de echo para mostrar la versión de PHP ?>
    <p>Versión de PHP: <?php print PHP_VERSION; ?></p>

    <?php /* La fecha y hora ya quedó calculada arriba en $fechaHoy */ ?>
    <p>Fecha y hora actual: <?= $fechaHoy ?></p>

    <?php
    // Un párrafo extra para practicar mezclar texto fijo con variables
    echo "<p>Laboratorio #8 de Desarrollo Web, cédula {$est['cedula']}.</p>";
    # Fin del contenido generado con PHP
    ?>
</body>
</html>
