<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($servicio) ? 'Editar Servicio' : 'Agregar Nuevo Servicio' ?></title>
    <link rel="stylesheet" href="../Vista/css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>

<div class="custom-container">
    <h2 class="custom-title"><?= isset($servicio) ? 'Editar Servicio' : 'Agregar Nuevo Servicio' ?></h2>
    <form action="../Controlador/CtlrServicios.php?accion=<?= isset($servicio) ? 'actualizarServicio' : 'guardarServicio' ?>" method="post" class="custom-form">
        <?php if (isset($servicio)): ?>
            <input type="hidden" name="id_servicio" value="<?= htmlspecialchars($servicio['id_servicio']) ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?= isset($servicio) ? htmlspecialchars($servicio['direccion']) : '' ?>" class="custom-input" required>
        </div>

        <div class="form-group">
            <label for="referencias">Referencias:</label>
            <input type="text" id="referencias" name="referencias" value="<?= isset($servicio) ? htmlspecialchars($servicio['referencias']) : '' ?>" class="custom-input" required>
        </div>

        <div class="form-group">
    <label for="lavador">Selecciona el Lavador:</label>
    <select id="lavador" name="lavador" class="custom-input" required>
        <?php foreach ($lavadores as $lavador): ?>
            <option value="<?= htmlspecialchars($lavador['id_lavador']) ?>" <?= isset($servicio) && $servicio['id_lavador'] == $lavador['id_lavador'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($lavador['nombre']) ?> <?= htmlspecialchars($lavador['apellido_paterno']) ?> <?= htmlspecialchars($lavador['apellido_materno']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


        <div class="form-group">
    <label for="paquete">Selecciona el Paquete:</label>
    <select id="paquete" name="paquete[]" class="custom-input" required>
        <?php foreach ($paquetes as $paquete): ?>
            <option value="<?= htmlspecialchars($paquete['id_servicio']) ?>" <?= isset($servicio) && in_array($paquete['id_servicio'], explode(', ', $servicio['paquetes'])) ? 'selected' : '' ?>>
                <?= htmlspecialchars($paquete['nombre_servicio']) ?>
            </option>
        <?php endforeach; ?>
    </select>
        </div>

        <button type="submit" class="custom-submit"><?= isset($servicio) ? 'Actualizar Servicio' : 'Guardar Servicio' ?></button>
        <a href="../Controlador/CtlrServicios.php" class="custom-button">Cancelar</a>
    </form>
</div>

</body>
</html>
