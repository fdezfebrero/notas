<?php
//conexion.php
class Conexion extends PDO
{
    private $host = "db5006113262.hosting-data.io";
    private $db = "dbs5116354";
    private $user = "dbu2880362";
    private $pass = "Santorio5.";
    private $dsn;
    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        try {
            parent::__construct($this->dsn, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexión: mensaxe: " . $e->getMessage());
        }
    }
}
