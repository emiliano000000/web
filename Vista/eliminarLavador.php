<?php
include "../Controlador/CtrlLavadores.php";
$ctrlLavadores = new CtrlLavadores();
$id_lavador = $_GET['id'];
$ctrlLavadores->EliminarLavador($id_lavador);
header("Location: listarLavadores.php");
?>