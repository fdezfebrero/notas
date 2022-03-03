<?php
include_once('Conexion.php');
include_once('nota.php');
class modeloNota extends nota{

    protected $nota;
    protected $usuario;
    protected $fecha;

    public function __construct($nota, $usuario, $fecha=null)
    {
        $IDNota= uniqid();
        $this->nota=$nota;
        $this->usuario=$usuario;
        $this->fecha=date("Y-m-d H:i:s");
        $this->IDNota=$IDNota;

    }
    
    public function gardar()
    {
        $conexion = new Conexion();
        try {
            $pdoStmt = $conexion->prepare('INSERT INTO notas(Nota, Usuario, IDNota, Date) VALUES (:nota, :usuario, :idnota, :data)');
            $pdoStmt->bindParam(':nota', $this->nota);
            $pdoStmt->bindParam(':usuario', $this->usuario);
            $pdoStmt->bindParam(':idnota', $this->IDNota);
            $pdoStmt->bindParam(':data', $this->fecha);
            $pdoStmt->execute();
        } catch (PDOException $e) {
            die("Houbo un erro coa inserción: " . $e->getMessage());
        }
        $conexion = null;
        return $this->IDNota;
    }

    public static function devolveTodas()
    {

        $conexion = new Conexion();
        try {
            $consulta = "select * from notas";
            $pdoStmt = $conexion->query($consulta);
        } catch (PDOException $e) {
            die("Houbo un erro en devolveTodos" . $e->getMessage());
        }
        return $pdoStmt;
    }

    public static function mostraPorID($id)
    {

        $conexion = new Conexion();
        try {
            $pdoStmt = $conexion->prepare("SELECT * from notas where IDNota like :idnota");
            $pdoStmt->bindParam(':idnota', $id);
            $pdoStmt -> execute();
        } catch (PDOException $e) {
            die("Houbo un erro en devolveTodos" . $e->getMessage());
        }
        return $pdoStmt;
    }



 

}
