<?php
class ModeloServicios {
    private $conexion;

    public function inicializar($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerTodosLosServicios() {
        $sql = "SELECT s.id_servicio, s.direccion, s.referencias, CONCAT(l.nombre, ' ', l.apellido_paterno, ' ', l.apellido_materno) AS nombre_lavador, p.nombre_servicio
                FROM servicio s
                JOIN lavador l ON s.id_lavador = l.id_lavador
                JOIN paquetes p ON FIND_IN_SET(p.id_servicio, s.paquetes) > 0";
        $resultado = $this->conexion->query($sql);
        
        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new mysqli_sql_exception("Error en la consulta: " . $this->conexion->error);
        }
    }

    public function obtenerServicio($id_servicio) {
        $sql = "SELECT s.id_servicio, s.direccion, s.referencias, s.id_lavador,
                       GROUP_CONCAT(p.id_servicio SEPARATOR ', ') AS paquetes
                FROM servicio s
                LEFT JOIN paquetes p ON FIND_IN_SET(p.id_servicio, s.paquetes) > 0
                WHERE s.id_servicio = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id_servicio);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado) {
            return $resultado->fetch_assoc();
        } else {
            throw new mysqli_sql_exception("Error en la consulta: " . $this->conexion->error);
        }
    }

    public function insertarServicio($direccion, $paquetes, $referencias, $id_lavador) {
        $sql = "INSERT INTO servicio (direccion, paquetes, referencias, id_lavador) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $paquetes = implode(', ', $paquetes);
        $stmt->bind_param('sssi', $direccion, $paquetes, $referencias, $id_lavador);
        $stmt->execute();

        if ($stmt->error) {
            throw new mysqli_sql_exception("Error al insertar el servicio: " . $stmt->error);
        }
    }

    public function actualizarServicio($id_servicio, $direccion, $paquetes, $referencias, $id_lavador) {
        $sql = "UPDATE servicio SET direccion = ?, paquetes = ?, referencias = ?, id_lavador = ? WHERE id_servicio = ?";
        $stmt = $this->conexion->prepare($sql);
        $paquetes = implode(', ', $paquetes);
        $stmt->bind_param('sssii', $direccion, $paquetes, $referencias, $id_lavador, $id_servicio);
        $stmt->execute();

        if ($stmt->error) {
            throw new mysqli_sql_exception("Error al actualizar el servicio: " . $stmt->error);
        }
    }

    public function eliminarServicio($id_servicio) {
        $sql = "DELETE FROM servicio WHERE id_servicio = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param('i', $id_servicio);
        $stmt->execute();

        if ($stmt->error) {
            throw new mysqli_sql_exception("Error al eliminar el servicio: " . $stmt->error);
        }
    }

    public function obtenerTodosLosPaquetes() {
        $sql = "SELECT id_servicio, nombre_servicio FROM paquetes";
        $resultado = $this->conexion->query($sql);

        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new mysqli_sql_exception("Error en la consulta: " . $this->conexion->error);
        }
    }

    public function obtenerTodosLosLavadores() {
        $sql = "SELECT id_lavador, nombre, apellido_paterno, apellido_materno FROM lavador";
        $resultado = $this->conexion->query($sql);
    
        if ($resultado) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            throw new mysqli_sql_exception("Error en la consulta: " . $this->conexion->error);
        }
    }
}
?>
