<?php
include "../Modelo/mdlPaquetes.php"; // Incluye el modelo de paquetes

$paquete = new Paquete(); // Crea una instancia de la clase Paquete
$opcion = $_REQUEST['opcion']; // Obtiene la opción del request

switch ($opcion) {
    case 1:
        // Agregar un nuevo paquete
        $nombre_servicio = $_REQUEST['nombre_servicio'];
        $costo_servicio = $_REQUEST['costo_servicio'];
        $descripcion_servicio = $_REQUEST['descripcion_servicio'];
        $foto_servicio = $_FILES['foto_servicio']['tmp_name'];

        $paquete->inicializar($nombre_servicio, $costo_servicio, $descripcion_servicio, $foto_servicio);
        $paquete->IngresarPaquete();
        break;
    case 2:
        // Listar paquetes
        $paquete->ListarPaquetes();
        break;
    case 3:
        // Eliminar un paquete
        $id_servicio = $_REQUEST['id_servicio'];
        $paquete->EliminarPaquete($id_servicio);
        break;
    case 4:
        // Modificar un paquete
        $id_servicio = $_REQUEST['id_servicio'];
        $nombre_servicio = $_REQUEST['nombre_servicio'];
        $costo_servicio = $_REQUEST['costo_servicio'];
        $descripcion_servicio = $_REQUEST['descripcion_servicio'];
        $foto_servicio = $_FILES['foto_servicio']['tmp_name'];

        $paquete->inicializar($nombre_servicio, $costo_servicio, $descripcion_servicio, $foto_servicio);
        $paquete->ModificarPaquete($id_servicio);
        break;
    case 5:
        // Mostrar detalles de un paquete para modificar
        $id_servicio = $_REQUEST['id_servicio'];
        $paquete->MostrarPaquete($id_servicio);
        break;
}

$paquete->CerrarBD(); // Cierra la conexión a la base de datos
?>
