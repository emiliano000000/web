<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Vista/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>

    <div class="custom-container">
        <h2 class="custom-title">Lista de Servicios</h2>
        <a href="../Controlador/CtlrServicios.php?accion=mostrarFormulario" class="custom-button">Agregar Nuevo Servicio</a>
        <div class="custom-table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>ID Servicio</th>
                        <th>Dirección</th>
                        <th>Referencias</th>
                        <th>Nombre Lavador</th>
                        <th>Paquete</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($servicios)): ?>
                        <?php foreach ($servicios as $servicio): ?>
                            <tr>
                                <td><?= htmlspecialchars($servicio['id_servicio']) ?></td>
                                <td><?= htmlspecialchars($servicio['direccion']) ?></td>
                                <td><?= htmlspecialchars($servicio['referencias']) ?></td>
                                <td><?= htmlspecialchars($servicio['nombre_lavador']) ?></td>
                                <td><?= htmlspecialchars($servicio['nombre_servicio']) ?></td>
                                <td>
                                    <a href="../Controlador/CtlrServicios.php?accion=editarServicio&id=<?= htmlspecialchars($servicio['id_servicio']) ?>" class="custom-button">Editar</a>
                                    <a href="../Controlador/CtlrServicios.php?accion=eliminarServicio&id=<?= htmlspecialchars($servicio['id_servicio']) ?>" class="custom-button" onclick="return confirm('¿Estás seguro de que quieres eliminar este servicio?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No hay servicios disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
