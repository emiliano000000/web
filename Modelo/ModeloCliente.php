<?php
class Cliente {
    private $nombre;
    private $A_paterno;
    private $A_materno;
    private $telefono;
    private $correo;
    private $codigo_postal;
    private $password;

    public function conectarBD() {
        $con = mysqli_connect("localhost", "root", "", "CarWash") or die("Problemas con la conexión a la base de datos");
        return $con;
    }

    public function inicializar($nombre, $A_paterno, $A_materno, $telefono, $correo, $codigo_postal, $password) {
        $this->nombre = $nombre;
        $this->A_paterno = $A_paterno;
        $this->A_materno = $A_materno;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->codigo_postal = $codigo_postal;
        $this->password = $password;
    }

    public function agregarCliente() {
        $con = $this->conectarBD();
        $stmt = $con->prepare("INSERT INTO Cliente (nombre, A_paterno, A_materno, telefono, correo, codigo_postal, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $this->nombre, $this->A_paterno, $this->A_materno, $this->telefono, $this->correo, $this->codigo_postal, $this->password);
        if ($stmt->execute()) {
            $message = "Cliente registrado exitosamente";
            header("Location: ../Vista/IndexUsuario.php?message=" . urlencode($message));
            exit;
        } else {
            die("Problemas en el insert: " . $stmt->error);
        }
    }
}
?>
