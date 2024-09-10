<?php
class Administrador {
    private $Nombre;
    private $A_paterno;
    private $A_materno;
    private $correo;
    private $N_telefono;
    private $Direccion;
    private $password;

    // Conectar a la base de datos
    public function conectarBD() {
        $con = mysqli_connect("localhost", "root", "", "CarWash") or die("Problemas con la conexión a la base de datos");
        return $con;
    }

    // Inicializar los atributos
    public function inicializar($Nombre, $A_paterno, $A_materno, $correo, $N_telefono, $Direccion, $password) {
        $this->Nombre = $Nombre;
        $this->A_paterno = $A_paterno;
        $this->A_materno = $A_materno;
        $this->correo = $correo;
        $this->N_telefono = $N_telefono;
        $this->Direccion = $Direccion;
        $this->password = $password;
    }

    // Agregar un nuevo administrador
    public function agregarAdministrador() {
        $con = $this->conectarBD();

        $stmt = $con->prepare("INSERT INTO administrador (Nombre, A_paterno, A_materno, correo, N_telefono, Dirección, password) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Bind de parámetros
        $stmt->bind_param("sssssss", $this->Nombre, $this->A_paterno, $this->A_materno, $this->correo, $this->N_telefono, $this->Direccion, $this->password);

        if ($stmt->execute()) {
            $message = "Administrador registrado exitosamente";
            header("Location: ../Vista/indexAdmin.php?message=" . urlencode($message));
            exit;
        } else {
            die("Problemas en el insert: " . $stmt->error);
        }
    }
}
?>
