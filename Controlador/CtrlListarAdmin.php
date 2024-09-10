<?php
include '../Modelo/ListarAdministrador.php';

$administrador = new Administrador();

// Obtener la opción desde la solicitud
$opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : 2; // Default to 2 for listing

switch ($opcion) {
    case 1:
        // Agregar administrador (no implementado aquí)
        break;
    case 2:
        $administrador->listarAdministradores();
        break;
    case 3:
        $administrador->redireccionarEdicion($_REQUEST['id']);
        break;
    case 4:
        // Actualizar administrador
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nombre = $_POST['Nombre'];
            $a_paterno = $_POST['A_paterno'];
            $a_materno = $_POST['A_materno'];
            $correo = $_POST['correo'];
            $n_telefono = $_POST['N_telefono'];
            $direccion = $_POST['Direccion'];
            $password = $_POST['password'];

            $administrador->actualizarAdministrador($id, $nombre, $a_paterno, $a_materno, $correo, $n_telefono, $direccion, $password);
        }
        break;
    case 5:
        // Eliminar administrador
        $id = $_REQUEST['id'];
        $administrador->borrarAdministrador($id);
        break;
    default:
        die("Opción no válida.");
}
?>
