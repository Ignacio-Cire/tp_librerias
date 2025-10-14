<?php
require_once __DIR__ . "/../Modelo/Persona.php";

class controlPersona
{
    public function getFormData($request)
    {
        $data = [
            'dni'     => isset($request['dni']) ? trim($request['dni']) : null,
            'apellido'   => isset($request['apellido']) ? trim($request['apellido']) : null,
            'nombre'     => isset($request['nombre']) ? trim($request['nombre']) : null,
            'fechaNac'   => isset($request['fechaNac']) ? trim($request['fechaNac']) : null,
            'telefono'   => isset($request['telefono']) ? trim($request['telefono']) : null,
            'domicilio'  => isset($request['domicilio']) ? trim($request['domicilio']) : null,
        ];
        return $data;
    }
    public function listar($condicion = ""): array
    {
        $resultado = Persona::listar($condicion);
        return $resultado;
    }

    public function buscar($nroDni)
    {
        $resultado = null;
        $persona = new Persona($nroDni);
        if ($persona->obtener($nroDni)) {
            $resultado = $persona;
        }
        return $resultado;
    }

    public function crear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
    {
        $resultado = false;
        // Evitar duplicados por clave primaria
        $existente = $this->buscar($nroDni);
        if (!$existente) {
            $persona = new Persona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            if ($persona->insertar()) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function modificar($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio)
{
    $resultado = false;
    $persona = new Persona($nroDni);
    if ($persona->obtener($nroDni)) {
        if ($persona->getNroDni() == $nroDni) {
            $persona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            if ($persona->modificar()) {
                $resultado = true;
            }
        }
    }
    return $resultado;
}

    public function eliminar($nroDni)
    {
        $resultado = false;
        $persona = new Persona($nroDni);
        if ($persona->obtener($nroDni)) {
            $resultado = $persona->eliminar();
        }
        return $resultado;
    }
}
?>