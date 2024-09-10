<?php
include '../Modelo/listarcli.php';

$cliente = new Cliente();

// Obtener la opción desde la solicitud
$opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : 2; // Default to 2 for listing

switch ($opcion) {
    case 1:
        // Agregar cliente (no implementado aquí)
        break;
    case 2:
        $cliente->listarClientes();
        break;
    case 3:
        if (isset($_REQUEST['id'])) {
            $cliente->redireccionarEdicion($_REQUEST['id']);
        } else {
            echo "ID no proporcionado para redirigir a la edición.";
        }
        break;
    case 4:
        if (isset($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['a_paterno'], $_REQUEST['a_materno'], $_REQUEST['telefono'], $_REQUEST['correo'], $_REQUEST['codigo_postal'], $_REQUEST['password'])) {
            $cliente->actualizarCliente($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['a_paterno'], $_REQUEST['a_materno'], $_REQUEST['telefono'], $_REQUEST['correo'], $_REQUEST['codigo_postal'], $_REQUEST['password']);
        } else {
            echo "Datos incompletos para actualizar el cliente.";
        }
        break;
    case 5:
        if (isset($_REQUEST['id'])) {
            $cliente->borrarCliente($_REQUEST['id']);
        } else {
            echo "ID no proporcionado para borrar el cliente.";
        }
        break;
    default:
        echo "Opción no válida.";
}
?>
