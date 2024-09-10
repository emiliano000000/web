<?php
include "../Controlador/CtrlLavadores.php";
$ctrlLavadores = new CtrlLavadores();
$id_lavador = $_GET['id'];
$lavador = $ctrlLavadores->MostrarLavador($id_lavador);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Lavador</title>
</head>
<body>
    <h1>Editar Lavador</h1>
    <form action="../Controlador/CtrlLavadores.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="opcion" value="4">
        <input type="hidden" name="id_lavador" value="<>">
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" name="apellido_paterno" value="<?php echo htmlspecialchars($lavador['apellido_paterno']); ?>" required><br>
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" name="apellido_materno" value="<?php echo htmlspecialchars($lavador['apellido_materno']); ?>" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($lavador['nombre']); ?>" required><br>
        <label for="genero">Género:</label>
        <select name="genero" required>
            <option value="Masculino" <?php if ($lavador['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Femenino" <?php if ($lavador['genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
        </select><br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?php echo htmlspecialchars($lavador['direccion']); ?>" required><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($lavador['correo']); ?>" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($lavador['telefono']); ?>" required><br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/*"><br>
        <label for="rfc">RFC:</label>
        <input type="text" name="rfc" value="<?php echo htmlspecialchars($lavador['rfc']); ?>" required><br>
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" name="codigo_postal" value="<?php echo htmlspecialchars($lavador['codigo_postal']); ?>" required><br>
        <label for="foto_ine1">Foto INE1:</label>
        <input type="file" name="foto_ine1" accept="image/*"><br>
        <label for="foto_ine2">Foto INE2:</label>
        <input type="file" name="foto_ine2" accept="image/*"><br>
        <label for="dias_servicio">Días de Servicio:</label>
        <textarea name="dias_servicio"><?php echo htmlspecialchars($lavador['dias_servicio']); ?></textarea><br>
        <label for="horario">Horario:</label>
        <input type="text" name="horario" value="<?php echo htmlspecialchars($lavador['horario']); ?>" required><br>
        <label for="Apartamento">Apartamento:</label>
        <input type="text" name="Apartamento" value="<?php echo htmlspecialchars($lavador['Apartamento']); ?>" required><br>
        <button type="submit">Guardar Cambios</button>
    </form>
    <a href="listarLavadores.php">Cancelar</a>
</body>
</html>