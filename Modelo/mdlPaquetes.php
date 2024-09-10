<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Vista/css/estilos.css">
</head>
<body>

<?php
class Paquete {
    private $nombre_servicio;
    private $costo_servicio;
    private $descripcion_servicio;
    private $foto_servicio;

    // Inicializa las propiedades del paquete
    public function inicializar($nombre_servicio, $costo_servicio, $descripcion_servicio, $foto_servicio) {
        $this->nombre_servicio = $nombre_servicio;
        $this->costo_servicio = $costo_servicio;
        $this->descripcion_servicio = $descripcion_servicio;
        $this->foto_servicio = $foto_servicio;
    }

    // Conecta a la base de datos
    private function ConectarBD() {
        $con = mysqli_connect("localhost", "root", "", "carwash");
        if (!$con) {
            die("Problemas con la conexión a la base de datos: " . mysqli_connect_error());
        }
        return $con;
    }

    // Inserta un nuevo paquete en la base de datos
    public function IngresarPaquete() {
        $con = $this->ConectarBD();
        $nombre = $this->nombre_servicio;
        $costo = $this->costo_servicio;
        $descrip = $this->descripcion_servicio;
        $foto = $this->foto_servicio;

        // Verifica si se subió una imagen
        if (!empty($foto)) {
            $foto = addslashes(file_get_contents($foto));
        } else {
            $foto = null;
        }

        // Inserta el paquete en la base de datos
        $sql = "INSERT INTO paquetes(nombre_servicio, costo_servicio, descripccion_servicio, foto_servicio) 
                VALUES ('$nombre', '$costo', '$descrip', '$foto')";

        if (mysqli_query($con, $sql)) {
            echo '<div class="custom-container custom-message">';
            echo "<center><h3 class='custom-message-heading'>El Servicio se almacenó correctamente</h3>";
            echo '<a href="../Vista/listarPaquetes.php" class="custom-button">Regresar</a></center>';
            echo '</div>';
        } else {
            die("Problemas en el insert: " . mysqli_error($con));
        }

        mysqli_close($con);
    }

    // Modifica un paquete existente en la base de datos
    public function ModificarPaquete($id_servicio) {
        $con = $this->ConectarBD();
        $nombre = $this->nombre_servicio;
        $costo = $this->costo_servicio;
        $descrip = $this->descripcion_servicio;
        $foto = $this->foto_servicio;

        // Verifica si se subió una nueva imagen
        if (!empty($foto)) {
            $foto = addslashes(file_get_contents($foto));
        }

        // Actualiza el paquete en la base de datos
        $sql = "UPDATE paquetes SET nombre_servicio='$nombre', costo_servicio='$costo', descripccion_servicio='$descrip', foto_servicio='$foto' 
                WHERE id_servicio='$id_servicio'";

        if (mysqli_query($con, $sql)) {
            echo '<div class="custom-container custom-message">';
            echo "<center><h3 class='custom-message-heading'>El Servicio se modificó correctamente</h3>";
            echo '<a href="../Vista/listarPaquetes.php" class="custom-button">Regresar</a></center>';
            echo '</div>';
        } else {
            die("Problemas en la actualización: " . mysqli_error($con));
        }

        mysqli_close($con);
    }

    // Lista todos los paquetes
    public function ListarPaquetes() {
        $con = $this->ConectarBD();
        $registros = mysqli_query($con, "SELECT * FROM paquetes") or die(mysqli_error($con));
        echo '<div class="custom-container custom-table-container">';
        echo '<table class="custom-table">';
        echo '<tr>
                <th>ID Servicio</th>
                <th>Nombre</th>
                <th>Costo</th>
                <th>Descripción</th>
                <th>Foto</th>
                <th>Acciones</th>
              </tr>';
        while ($reg = mysqli_fetch_array($registros)) {
            echo '<tr><td>'.$reg['id_servicio'].'</td>';
            echo '<td>'.$reg['nombre_servicio'].'</td>';
            echo '<td>'.$reg['costo_servicio'].'</td>';
            echo '<td>'.$reg['descripccion_servicio'].'</td>';
            echo '<td>'.'<img class="custom-image" src="data:image/jpg;base64,'.base64_encode($reg['foto_servicio']).'"/></td>';
            echo '<td>
                    <form action="../Controlador/CtrlPaquetes.php" method="post" style="display:inline;">
                        <input type="hidden" name="opcion" value="3">
                        <input type="hidden" name="id_servicio" value="'.$reg['id_servicio'].'">
                        <input type="submit" value="Eliminar" class="custom-button">
                    </form>
                    <form action="../Controlador/CtrlPaquetes.php" method="post" style="display:inline;">
                        <input type="hidden" name="opcion" value="5">
                        <input type="hidden" name="id_servicio" value="'.$reg['id_servicio'].'">
                        <input type="submit" value="Modificar" class="custom-button">
                    </form>
                  </td></tr>';
        }
        echo '</table></div>';

        mysqli_close($con);
    }

    // Muestra los detalles de un paquete para su modificación
    public function MostrarPaquete($id_servicio) {
        $con = $this->ConectarBD();
        $registros = mysqli_query($con, "SELECT * FROM paquetes WHERE id_servicio='$id_servicio'") or die(mysqli_error($con));
        $reg = mysqli_fetch_array($registros);        
        echo '<form action="../Controlador/CtrlPaquetes.php" method="post" enctype="multipart/form-data">
                <div class="custom-container custom-form-table-container">
                    <center><h2 class="custom-subtitle">Modificar Paquete</h2></center>
                    Nombre del Servicio: <br>
                    <input type="text" name="nombre_servicio" class="custom-input" value="'.$reg['nombre_servicio'].'" required><br>
                    Costo del Servicio: <br>
                    <input type="number" name="costo_servicio" class="custom-input" value="'.$reg['costo_servicio'].'" step="0.01" required><br>
                    Descripción del Servicio: <br>
                    <input type="text" name="descripcion_servicio" class="custom-input" value="'.$reg['descripccion_servicio'].'" required><br>
                    Foto: <br>
                    <input type="file" name="foto_servicio" class="custom-file"><br>
                    <input type="hidden" name="opcion" value="4">
                    <input type="hidden" name="id_servicio" value="'.$reg['id_servicio'].'">
                    <input type="submit" value="Guardar" class="custom-submit">
                </div>
              </form>';

        mysqli_close($con);
    }

    // Elimina un paquete de la base de datos
    public function EliminarPaquete($id_servicio) {
        $con = $this->ConectarBD();
        mysqli_query($con, "DELETE FROM paquetes WHERE id_servicio='$id_servicio'") or die(mysqli_error($con));

        // Mensaje de confirmación y botón para regresar
        echo '<div class="custom-container custom-message">';
        echo "<center><h3 class='custom-message-heading'>El Servicio se eliminó correctamente</h3>";
        echo '<a href="../Vista/listarPaquetes.php" class="custom-button">Regresar</a></center>';
        echo '</div>';

        mysqli_close($con);
    }

    // Cierra la conexión a la base de datos
    public function CerrarBD() {
        $con = $this->ConectarBD();
        mysqli_close($con);
    }
}
?>

</body>
</html>