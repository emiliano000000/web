<?php
include '../Modelo/ModeloCliente.php';

$cliente = new Cliente();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente->inicializar($_POST['nombre'], $_POST['A_paterno'], $_POST['A_materno'], $_POST['telefono'], $_POST['correo'], $_POST['cp'], $_POST['contrasena'], $_POST['Nombres']);
    $cliente->agregarCliente();
}
?>
