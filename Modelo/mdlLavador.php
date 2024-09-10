<?php
class Lavador {
    private $id_lavador;
    private $apellido_paterno;
    private $apellido_materno;
    private $nombre;
    private $genero;
    private $direccion;
    private $correo;
    private $telefono;
    private $foto;
    private $rfc;
    private $codigo_postal;
    private $foto_ine1;
    private $foto_ine2;
    private $dias_servicio;
    private $horario;
    private $Apartamento;
    private $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "carwash");
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function inicializar($id_lavador, $apellido_paterno, $apellido_materno, $nombre, $genero, $direccion, $correo, $telefono, $foto, $rfc, $codigo_postal, $foto_ine1, $foto_ine2, $dias_servicio, $horario, $Apartamento) {
        $this->id_lavador = $id_lavador;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->nombre = $nombre;
        $this->genero = $genero;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->foto = $foto;
        $this->rfc = $rfc;
        $this->codigo_postal = $codigo_postal;
        $this->foto_ine1 = $foto_ine1;
        $this->foto_ine2 = $foto_ine2;
        $this->dias_servicio = $dias_servicio;
        $this->horario = $horario;
        $this->Apartamento = $Apartamento;
    }

    // Método para ingresar un nuevo lavador
    public function IngresarLavador() {
        $stmt = $this->conn->prepare("INSERT INTO lavador (apellido_paterno, apellido_materno, nombre, genero, direccion, correo, telefono, foto, rfc, codigo_postal, foto_ine1, foto_ine2, dias_servicio, horario, Apartamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssss", $this->apellido_paterno, $this->apellido_materno, $this->nombre, $this->genero, $this->direccion, $this->correo, $this->telefono, $this->foto, $this->rfc, $this->codigo_postal, $this->foto_ine1, $this->foto_ine2, $this->dias_servicio, $this->horario, $this->Apartamento);
        $stmt->execute();
        $stmt->close();
    }

    // Método para listar todos los lavadores
    public function ListarLavadores() {
        $result = $this->conn->query("SELECT * FROM lavador");
        $lavadores = [];
        while ($row = $result->fetch_assoc()) {
            $lavadores[] = $row;
        }
        return $lavadores;
    }

    // Método para eliminar un lavador
    public function EliminarLavador($id_lavador) {
        $stmt = $this->conn->prepare("DELETE FROM lavador WHERE id_lavador = ?");
        $stmt->bind_param("i", $id_lavador);
        $stmt->execute();
        $stmt->close();
    }

    // Método para modificar un lavador
    public function ModificarLavador($id_lavador) {
        $stmt = $this->conn->prepare("UPDATE lavador SET apellido_paterno = ?, apellido_materno = ?, nombre = ?, genero = ?, direccion = ?, correo = ?, telefono = ?, foto = ?, rfc = ?, codigo_postal = ?, foto_ine1 = ?, foto_ine2 = ?, dias_servicio = ?, horario = ?, Apartamento = ? WHERE id_lavador = ?");
        $stmt->bind_param("ssssssssssssssi", $this->apellido_paterno, $this->apellido_materno, $this->nombre, $this->genero, $this->direccion, $this->correo, $this->telefono, $this->foto, $this->rfc, $this->codigo_postal, $this->foto_ine1, $this->foto_ine2, $this->dias_servicio, $this->horario, $this->Apartamento, $id_lavador);
        $stmt->execute();
        $stmt->close();
    }

    // Método para mostrar un lavador
    public function MostrarLavador($id_lavador) {
        $stmt = $this->conn->prepare("SELECT * FROM lavador WHERE id_lavador = ?");
        $stmt->bind_param("i", $id_lavador);
        $stmt->execute();
        $result = $stmt->get_result();
        $lavador = $result->fetch_assoc();
        $stmt->close();
        return $lavador;
    }
}
?>