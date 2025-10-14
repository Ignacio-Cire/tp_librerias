<?php
require_once __DIR__ . "/Conector/BaseDatos.php";
class Auto
{
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;
    private $mensajeoperacion;

    public function __construct($patente="", $marca="", $modelo="", $dniDuenio=""){
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->dniDuenio = $dniDuenio;
    }

    // Getters y Setters
    public function getPatente(){ return $this->patente; }
    public function setPatente($patente){ $this->patente = $patente; }
    public function getMarca(){ return $this->marca; }
    public function setMarca($marca){ $this->marca = $marca; }
    public function getModelo(){ return $this->modelo; }
    public function setModelo($modelo){ $this->modelo = $modelo; }
    public function getDniDuenio(){ return $this->dniDuenio; }
    public function setDniDuenio($dniDuenio){ $this->dniDuenio = $dniDuenio; }
    public function getMensajeOperacion(){ return $this->mensajeoperacion; }
    public function setMensajeOperacion($mensaje){ $this->mensajeoperacion = $mensaje; }

    public function setear($patente, $marca, $modelo, $dniDuenio){
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDniDuenio($dniDuenio);
    }

    public function __toString(){
        return "Patente: ".$this->patente.", Marca: ".$this->marca.", Modelo: ".$this->modelo.", DNI DueÃ±o: ".$this->dniDuenio;
    }

    // CRUD
    public function obtener($patente){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente='".$patente."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql) > 0){
                $row = $base->Registro();
                $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                $resp = $this;
            }
        } else {
            $this->setMensajeOperacion("Auto->obtener: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio)
                VALUES ('".$this->getPatente()."','".$this->getMarca()."','".$this->getModelo()."','".$this->getDniDuenio()."')";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET Marca='".$this->getMarca()."', Modelo='".$this->getModelo()."',
                DniDuenio='".$this->getDniDuenio()."' WHERE Patente='".$this->getPatente()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente='".$this->getPatente()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public static function listar($condicion=""){
        $arreglo = [];
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto";
        if($condicion != "") $sql .= " WHERE ".$condicion;
        if($base->Iniciar()){
            $res = $base->Ejecutar($sql);
            if($res > 0){
                while($row = $base->Registro()){
                    $a = new Auto();
                    $a->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    $arreglo[] = $a;
                }
            }
        }
        return $arreglo;
    }
}
?>