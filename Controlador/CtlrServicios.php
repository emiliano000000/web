<?php
require_once '../Modelo/modeloServicios.php';

// Configuración de la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'carwash';
$db = new mysqli($hostname, $username, $password, $database);

// Verificar conexión
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

// Inicializar el modelo
$modeloServicios = new ModeloServicios();
$modeloServicios->inicializar($db);

// Obtener la acción solicitada
$accion = $_GET['accion'] ?? '';

try {
    switch ($accion) {
        case 'mostrarFormulario':
            $paquetes = $modeloServicios->obtenerTodosLosPaquetes();
            $lavadores = $modeloServicios->obtenerTodosLosLavadores();
            include '../Vista/formularioServicios.php';
            break;

        case 'guardarServicio':
            $direccion = $_POST['direccion'];
            $paquetes = $_POST['paquete'];
            $referencias = $_POST['referencias'];
            $id_lavador = $_POST['lavador'];
            $modeloServicios->insertarServicio($direccion, $paquetes, $referencias, $id_lavador);
            header('Location: ../Controlador/CtlrServicios.php');
            exit(); // Asegura que el script se detenga después de la redirección

        case 'editarServicio':
            $id_servicio = $_GET['id'];
            $servicio = $modeloServicios->obtenerServicio($id_servicio);
            $paquetes = $modeloServicios->obtenerTodosLosPaquetes();
            $lavadores = $modeloServicios->obtenerTodosLosLavadores();
            include '../Vista/formularioServicios.php';
            break;

        case 'actualizarServicio':
            $id_servicio = $_POST['id_servicio'];
            $direccion = $_POST['direccion'];
            $paquetes = $_POST['paquete'];
            $referencias = $_POST['referencias'];
            $id_lavador = $_POST['lavador'];
            $modeloServicios->actualizarServicio($id_servicio, $direccion, $paquetes, $referencias, $id_lavador);
            header('Location: ../Controlador/CtlrServicios.php');
            exit(); // Asegura que el script se detenga después de la redirección

        case 'eliminarServicio':
            $id_servicio = $_GET['id'];
            $modeloServicios->eliminarServicio($id_servicio);
            header('Location: ../Controlador/CtlrServicios.php');
            exit(); // Asegura que el script se detenga después de la redirección

        default:
            $servicios = $modeloServicios->obtenerTodosLosServicios();
            include '../Vista/listaServiciosAdmin.php';
            break;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
