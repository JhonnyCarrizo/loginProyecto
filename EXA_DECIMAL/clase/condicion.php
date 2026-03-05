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
    public static function getCondicionesByHerramientaId($herramientaId) {
        $conn = DB::conectar();
        $sql = 'SELECT condicionId, herramientaId, condicion FROM condiciones INNER JOIN cond_herra ON condiciones.id=cond_herra.condicionId INNER JOIN herramientas ON cond_herra.herramientaId=herramientas.id WHERE herramientas.id = ?';
        $stmt = $conn->prepare($sql);
        $tiposDatos = 'i';
        $stmt->bind_param( $tiposDatos, $herramientaId);  
        $stmt->execute();
        $result = $stmt->get_result();
        $condiciones = [];
        while ($data = $result->fetch_array()) {
            $condiciones[] = $data;
        }
        return $condiciones;
    }

    public static function buscarTodo() {
         $conn = DB::conectar();
         $sql = 'SELECT id, condicion FROM condiciones';
         $busqueda = $conn->query($sql);
         return $busqueda;
    }

}
?>