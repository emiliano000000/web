<?php
include "../Modelo/mdlLavador.php";

class CtrlLavadores {
    private $lavador;

    public function __construct() {
        $this->lavador = new Lavador();
    }

    public function IngresarLavador($datos) {
        $required_keys = [
            'apellido_paterno', 'apellido_materno', 'nombre', 'genero', 
            'direccion', 'correo', 'telefono', 'foto', 'rfc', 
            'codigo_postal', 'foto_ine1', 'foto_ine2', 'dias_servicio', 
            'horario', 'Apartamento'
        ];

        // Asegurarse de que todas las claves requeridas están presentes en los datos
        foreach ($required_keys as $key) {
            if (!isset($datos[$key])) {
                $datos[$key] = null;
            }
        }

        // Asignar id_lavador si está presente en los datos, si no, asignar null
        $id_lavador = isset($datos['id_lavador']) ? $datos['id_lavador'] : null;

        $this->lavador->inicializar(
            $id_lavador, $datos['apellido_paterno'], $datos['apellido_materno'], $datos['nombre'], 
            $datos['genero'], $datos['direccion'], $datos['correo'], $datos['telefono'], $datos['foto'], 
            $datos['rfc'], $datos['codigo_postal'], $datos['foto_ine1'], $datos['foto_ine2'], 
            $datos['dias_servicio'], $datos['horario'], $datos['Apartamento']
        );
        $this->lavador->IngresarLavador();
    }

    public function ListarLavadores() {
        return $this->lavador->ListarLavadores();
    }

    public function EliminarLavador($id_lavador) {
        $this->lavador->EliminarLavador($id_lavador);
    }

    public function ModificarLavador($id_lavador, $datos) {
        $required_keys = [
            'apellido_paterno', 'apellido_materno', 'nombre', 'genero', 
            'direccion', 'correo', 'telefono', 'foto', 'rfc', 
            'codigo_postal', 'foto_ine1', 'foto_ine2', 'dias_servicio', 
            'horario', 'Apartamento'
        ];

        // Asegurarse de que todas las claves requeridas están presentes en los datos
        foreach ($required_keys as $key) {
            if (!isset($datos[$key])) {
                $datos[$key] = null;
            }
        }

        // Asegurarse de que id_lavador está presente en los datos
        if (!isset($datos['id_lavador'])) {
            throw new Exception("ID de lavador no proporcionado.");
        }

        $this->lavador->inicializar(
            $datos['id_lavador'], $datos['apellido_paterno'], $datos['apellido_materno'], $datos['nombre'], 
            $datos['genero'], $datos['direccion'], $datos['correo'], $datos['telefono'], $datos['foto'], 
            $datos['rfc'], $datos['codigo_postal'], $datos['foto_ine1'], $datos['foto_ine2'], 
            $datos['dias_servicio'], $datos['horario'], $datos['Apartamento']
        );
        $this->lavador->ModificarLavador($datos['id_lavador']);
    }

    public function MostrarLavador($id_lavador) {
        return $this->lavador->MostrarLavador($id_lavador);
    }
}

// Crear instancia del controlador y manejar la solicitud
$ctrlLavadores = new CtrlLavadores();
$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$datos = $_REQUEST;

switch ($opcion) {
    case 1:
        $ctrlLavadores->IngresarLavador($datos);
        echo 'El lavador fue registrado exitosamente';
        break;
    case 2:
        $lavadores = $ctrlLavadores->ListarLavadores();
        // Aquí podrías redirigir a una vista que muestre los lavadores
        break;
    case 3:
        if (isset($datos['id_lavador'])) {
            $ctrlLavadores->EliminarLavador($datos['id_lavador']);
        } else {
            echo "ID de lavador no proporcionado.";
        }
        break;
    case 4:
        if (isset($datos['id_lavador'])) {
            $ctrlLavadores->ModificarLavador($datos['id_lavador'], $datos);
        } else {
            echo "ID de lavador no proporcionado.";
        }
        break;
    case 5:
        if (isset($datos['id_lavador'])) {
            $lavador = $ctrlLavadores->MostrarLavador($datos['id_lavador']);
            // Aquí podrías redirigir a una vista que muestre el lavador
        } else {
            echo "ID de lavador no proporcionado.";
        }
        break;
    default:
        echo "Opción no válida.";
        break;
}
?>
