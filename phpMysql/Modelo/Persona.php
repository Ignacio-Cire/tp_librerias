<?php
require_once __DIR__ . "/Conector/BaseDatos.php";
class Persona
{
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeoperacion;

    public function __construct($nroDni="", $apellido="", $nombre="", $fechaNac="", $telefono="", $domicilio="")
    {
        $this->nroDni = $nroDni;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->fechaNac = $fechaNac;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

    // Getters y Setters
    public function getNroDni(){ return $this->nroDni; }
    public function setNroDni($nroDni){ $this->nroDni = $nroDni; }
    public function getApellido(){ return $this->apellido; }
    public function setApellido($apellido){ $this->apellido = $apellido; }
    public function getNombre(){ return $this->nombre; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function getFechaNac(){ return $this->fechaNac; }
    public function setFechaNac($fechaNac){ $this->fechaNac = $fechaNac; }
    public function getTelefono(){ return $this->telefono; }
    public function setTelefono($telefono){ $this->telefono = $telefono; }
    public function getDomicilio(){ return $this->domicilio; }
    public function setDomicilio($domicilio){ $this->domicilio = $domicilio; }
    public function getMensajeOperacion(){ return $this->mensajeoperacion; }
    public function setMensajeOperacion($mensaje){ $this->mensajeoperacion = $mensaje; }

    // Setear todos los atributos
    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio){
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }

    public function __toString(){
        return "DNI: ".$this->nroDni.", Apellido: ".$this->apellido.", Nombre: ".$this->nombre.", Fecha Nac: ".$this->fechaNac.", Tel: ".$this->telefono.", Domicilio: ".$this->domicilio;
    }

    // CRUD

    public function obtener($nroDni){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni='".$nroDni."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql) > 0){
                $row = $base->Registro();
                $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                $resp = $this;
            }
        } else {
            $this->setMensajeOperacion("Persona->obtener: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona (NroDni, Apellido, Nombre, FechaNac, Telefono, Domicilio)
                VALUES ('".$this->getNroDni()."','".$this->getApellido()."','".$this->getNombre()."','".$this->getFechaNac()."','".$this->getTelefono()."','".$this->getDomicilio()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona SET Apellido='".$this->getApellido()."', Nombre='".$this->getNombre()."',
                FechaNac='".$this->getFechaNac()."', Telefono='".$this->getTelefono()."', Domicilio='".$this->getDomicilio()."'
                WHERE NroDni='".$this->getNroDni()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni='".$this->getNroDni()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($condicion=""){
        $arreglo = [];
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona";
        if($condicion != "") $sql .= " WHERE ".$condicion;
        if($base->Iniciar()){
            $res = $base->Ejecutar($sql);
            if($res > 0){
                while($row = $base->Registro()){
                    $p = new Persona();
                    // El campo en la BD es 'fechaNac' (minúscula la f)
                    $p->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    $arreglo[] = $p;
                }
            }
        }
        return $arreglo;
    }
}
?>
