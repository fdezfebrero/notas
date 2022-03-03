<?php

class nota{

    protected $nota;
    protected $usuario;
    protected $fecha;

    public function __construct($nota, $usuario, $fecha=null)
    {
        $this->nota=$nota;
        $this->usuario=$usuario;
        $this->fecha=$fecha;

    }

    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    public function getNota(){
        return $this->nota;
    }
    public function setNota($nota){
        $this->nota=$nota;
    }    
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }


}

?>