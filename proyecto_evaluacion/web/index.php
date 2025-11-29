<?php
$host = "bd"; // Asegúrate de que este nombre coincida con el nombre del servicio db en docker-compose
$user = "root";
$pass = "1234";
$dbname = "evaluacion_nube";

$conexion = new mysqli($host, $user, $pass, $dbname);

if ($conexion->connect_error) {
    $mensaje_bd = "❌ Error: " . $conexion->connect_error;
    $conexion_ok = false;
} else {
    $mensaje_bd = "✅ Conexión Exitosa";
    $conexion_ok = true;
}

$logs = [];
if ($conexion_ok) {
    $sql = "SELECT hora, actividad, estado, imagen FROM log";
    $resultado = $conexion->query($sql);
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $logs[] = $fila;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación Nube</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background-color: #f4f4f4; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #333; color: white; }
        
        /* Estilo para las imágenes */
        .img-log {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <h1>Log de Actividades</h1>
    <p>Estado BD: <strong><?= $mensaje_bd ?></strong></p>
    <table>
        <tr>
            <th>Hora</th>
            <th>Actividad</th>
            <th>Estado</th>
            <th>Imagen</th>
        </tr>

        <?php if (!empty($logs)): ?>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?= $log['hora'] ?></td>
                    <td><?= $log['actividad'] ?></td>
                    <td><?= $log['estado'] ?></td>
                    <td>
                        <img src="<?= $log['imagen'] ?>" class="img-log" alt="Evidencia">
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="4">No hay datos</td></tr>
        <?php endif; ?>
    </table>

</body>
</html>