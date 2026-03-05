<?php
require_once('DB.php');
class Condicion {
    protected $condicion;
    public function __construct($condicion) {
        $this->condicion = $condicion;
    }
    public function setCondicion($condicion) 
    {$this->condicion = $condicion;}
    public function getCondicion()
    {return $this->condicion;}
    public function guardar() {
        $conn = DB::conectar();
        $sql = 'INSERT INTO condiciones(condicion)values(?)';
        $stmt = $conn->prepare($sql);
        $datos = [
            $this->condicion, 
        ];
        $tiposDatos = 's';
        $stmt->bind_param( $tiposDatos, $datos);                                                                                                                                                                                                                                                                                                                                                                                                                                 
    }
    public static function buscarTodo() {
         $conn = DB::conectar();
         $sql = 'SELECT id, condicion FROM condiciones';
         $busqueda = $conn->query($sql);
         return $busqueda;
    }

}
?>