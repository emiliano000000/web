<!DOCTYPE html>
<html>
<head>
    <title>Agregar Lavador</title>
</head>
<body>
    <h1>Agregar Lavador</h1>
    <form action="../Controlador/CtrlLavadores.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="opcion" value="1">
        <label for="apellido_paterno">Apellido Paterno:</label>
        <input type="text" name="apellido_paterno" required><br>
        <label for="apellido_materno">Apellido Materno:</label>
        <input type="text" name="apellido_materno" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label for="genero">Género:</label>
        <select name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select><br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required><br>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required><br>
        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/*"><br>
        <label for="rfc">RFC:</label>
        <input type="text" name="rfc" required><br>
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" name="codigo_postal" required><br>
        <label for="foto_ine1">Foto INE1:</label>
        <input type="file" name="foto_ine1" accept="image/*"><br>
        <label for="foto_ine2">Foto INE2:</label>
        <input type="file" name="foto_ine2" accept="image/*"><br>
        <label for="dias_servicio">Días de Servicio:</label>
        <textarea name="dias_servicio"></textarea><br>
        <label for="horario">Horario:</label>
        <input type="text" name="horario" required><br>
        <label for="Apartamento">Apartamento:</label>
        <input type="text" name="Apartamento" required><br>
        <button type="submit">Agregar Lavador</button>
    </form>
    <a href="listarLavadores.php">Cancelar</a>
</body>
</html>