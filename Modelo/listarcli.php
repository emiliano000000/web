<?php
class Cliente {
    private $id;
    private $nombre;
    private $a_paterno;
    private $a_materno;
    private $telefono;
    private $correo;
    private $codigo_postal;
    private $password;

    // Conectar a la base de datos
    public function conectarBD() {
        $con = mysqli_connect("localhost", "root", "", "CarWash") or die("Problemas con la conexión a la base de datos");
        return $con;
    }

    // Inicializar los atributos
    public function inicializar($id, $nombre, $a_paterno, $a_materno, $telefono, $correo, $codigo_postal, $password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->a_paterno = $a_paterno;
        $this->a_materno = $a_materno;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->codigo_postal = $codigo_postal;
        $this->password = $password;
    }

    // Listar todos los clientes
    public function listarClientes() {
        $con = $this->conectarBD();
        $sql = 'SELECT * FROM cliente';
        $registros = mysqli_query($con, $sql) or die(mysqli_error($con));

        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Listado de Clientes</title>
            <link rel='stylesheet' type='text/css' href='../Vista/css/estilos.css'>
            <style>
                .btn-register {
                    display: inline-block;
                    padding: 10px 20px;
                    font-size: 16px;
                    color: white;
                    background-color: #007bff;
                    border: none;
                    border-radius: 4px;
                    text-align: center;
                    text-decoration: none;
                    margin: 20px 0; /* Añadir margen superior e inferior */
                }
                .btn-register:hover {
                    background-color: #0056b3;
            </style>
        </head>
        <body>
        <div class='container'>
            <a href='../Vista/formularioRegistrar.html' class='btn btn-register'>Registrar Nuevo Cliente</a>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Código Postal</th>
                    <th>Password</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>";
    
        while ($row = mysqli_fetch_array($registros)) {
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['nombre']}</td>
            <td>{$row['A_paterno']}</td>
            <td>{$row['A_materno']}</td>
            <td>{$row['telefono']}</td>
            <td>{$row['correo']}</td>
            <td>{$row['codigo_postal']}</td>
            <td>{$row['password']}</td>
            <td class='table-actions'>
                <a href='../Vista/editarCliente.php?id={$row['id']}' class='btn btn-edit'>Modificar</a> |
                <a href='../Controlador/CtrlListar.php?opcion=5&id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este cliente?\");'>Eliminar</a>
            </td>
            </tr>";
        }
    
        echo "</tbody></table>
        </div>
        </body>
        </html>";
    }
    // Redirigir a la página de edición
    public function redireccionarEdicion($id) {
        header("Location: ../Vista/editarCliente.php?id=$id");
        exit;
    }

    // Actualizar un cliente
    public function actualizarCliente($id, $nombre, $a_paterno, $a_materno, $telefono, $correo, $codigo_postal, $password) {
        $con = $this->conectarBD();
        $stmt = $con->prepare("UPDATE cliente SET nombre = ?, A_paterno = ?, A_materno = ?, telefono = ?, correo = ?, codigo_postal = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssssisi", $nombre, $a_paterno, $a_materno, $telefono, $correo, $codigo_postal, $password, $id);
        if ($stmt->execute()) {
            $message = "Cliente actualizado exitosamente";
            header("Location: ../Vista/listarCli.php?message=" . urlencode($message));
            exit;
        } else {
            die("Problemas en el update: " . $stmt->error);
        }
    }

    // Borrar un cliente
    public function borrarCliente($id) {
        $con = $this->conectarBD();
        $stmt = $con->prepare("DELETE FROM cliente WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $message = "Cliente borrado exitosamente";
            header("Location: ../Vista/listarCli.php?message=" . urlencode($message));
            exit;
        } else {
            die("Problemas en el delete: " . $stmt->error);
        }
    }
}
?>
