<?php
include '../Modelo/ModeloAdmin.php';

$Administrador = new Administrador();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Administrador->inicializar(
        $_POST['Nombre'],
        $_POST['A_paterno'],
        $_POST['A_materno'],
        $_POST['correo'],
        $_POST['N_telefono'],
        $_POST['Direccion'],
        $_POST['password']
    );
    $Administrador->agregarAdministrador();
}
?>
