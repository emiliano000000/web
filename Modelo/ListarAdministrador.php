<?php
class Administrador {
    private $id;
    private $A_paterno;
    private $A_materno;
    private $correo;
    private $N_telefono;
    private $Direccion;
    private $password;
    private $Nombre;    


    // Conectar a la base de datos
    public function conectarBD() {
        $con = mysqli_connect("localhost", "root", "", "CarWash") or die("Problemas con la conexión a la base de datos");
        return $con;
    }

    // Inicializar los atributos
    public function inicializar($id, $Nombre, $A_paterno, $A_materno, $correo, $N_telefono, $Direccion, $password) {
        $this->id = $id;
        $this->Nombre = $Nombre;
        $this->A_paterno = $A_paterno;
        $this->A_materno = $A_materno;
        $this->correo = $correo;
        $this->N_telefono = $N_telefono;
        $this->Direccion = $Direccion;
        $this->password = $password;
    }

    // Listar todos los administradores
    public function listarAdministradores() {
        $con = $this->conectarBD();
        $sql = 'SELECT * FROM administrador';
        $registros = mysqli_query($con, $sql) or die(mysqli_error($con));

        echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Listado de Administradores</title>
        <link rel='stylesheet' type='text/css' href='../css/estilos.css'>
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
        <h1>Listado de Administradores</h1>
        <a href='../Vista/RegsitarAdmin.html' class='btn-register'>Registrar Nuevo Administrador</a>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Password</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>";

    while ($row = mysqli_fetch_array($registros)) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['Nombre']}</td>
        <td>{$row['A_paterno']}</td>
        <td>{$row['A_materno']}</td>
        <td>{$row['correo']}</td>
        <td>{$row['N_telefono']}</td>
        <td>{$row['Dirección']}</td>
        <td>{$row['password']}</td>
        <td class='table-actions'>
            <a href='../Vista/editarAdmin.php?id={$row['id']}' class='btn btn-edit'>Modificar</a> |
            <a href='../Controlador/CtrlListarAdmin.php?opcion=5&id={$row['id']}' class='btn btn-delete' onclick='return confirm(\"¿Estás seguro de que quieres eliminar este administrador?\");'>Eliminar</a>
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
        header("Location: ../Vista/editarAdmin.php?id=$id");
        exit;
    }

    // Actualizar un administrador
    public function actualizarAdministrador($id, $Nombre, $A_paterno, $A_materno, $correo, $N_telefono, $Direccion, $password) {
        $con = $this->conectarBD();
        $stmt = $con->prepare("UPDATE administrador SET Nombre = ?, A_paterno = ?, A_materno = ?, correo = ?, N_telefono = ?, Dirección = ?, password = ? WHERE id = ?");
        $stmt->bind_param("ssssissi", $Nombre, $A_paterno, $A_materno, $correo, $N_telefono, $Direccion, $password, $id);
        if ($stmt->execute()) {
            $message = "Administrador actualizado exitosamente";
            header("Location: ../Vista/ListarAdmin.php?message=" . urlencode($message));
            exit;
        } else {
            die("Problemas en el update: " . $stmt->error);
        }
    }

    // Borrar un administrador
    public function borrarAdministrador($id) {
        $con = $this->conectarBD();
        $stmt = $con->prepare("DELETE FROM administrador WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $message = "Administrador borrado exitosamente";
            header("Location: ../Vista/ListarAdmin.php?message=" . urlencode($message));
            exit;
        } else {
            die("Problemas en el delete: " . $stmt->error);
        }
    }
}
?>
