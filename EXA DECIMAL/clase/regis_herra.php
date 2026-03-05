<?php 
require_once('DB.php');
require_once('condicion.php');
class Herramienta{
    protected $tools;
    protected $serie;
    protected $marca;
    protected $estado;
    protected $cond;

    public function __construct() {
        $this->cond = [];
    }
    public function setTools($tools){
        $this->tools=$tools;
    }
    public function setSerie($serie){
        $this->serie=$serie;
    }
    public function setMarca($marca){
        $this->marca=$marca;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }

    public function getTools(){
        return $this->tools;
    }
    public function getSerie(){
        return $this->serie;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function addCondId($condId) {
        $this->condId[] = $condId;
    }

     public function guardar() {
         $conn = DB::conectar();
         $sql = 'INSERT INTO herramientas(tools,serie,marca,estado)values(?,?,?,?)';
         $stmt = $conn->prepare($sql);
         $datos = [
             $this->tools, 
             $this->serie, 
             $this->marca, 
             $this->estado,
         ];
         $tiposDatos = 'ssss';
         $stmt->bind_param( $tiposDatos, ...$datos);       
         $stmt->execute();
         $herramientaId = $conn->insert_id;   
         for ($i = 0; $i < count($this->condId); $i++) {
             $sql = 'SELECT id, condicion FROM condiciones WHERE id=?';
             $stmt = $conn->prepare($sql);
             $condId = $this->condId[$i];
             $tiposDatos = 's';
             $datos = [
                 $condId
             ];
             $stmt->bind_param( $tiposDatos, ...$datos );       
             $stmt->execute();


             $busquedaCond =  $stmt->get_result();
             $condData = $busquedaCond->fetch_array();
             $condId = $condData['id'];
             $sql = 'INSERT INTO cond_herra (condicionId, herramientaId)VALUES(?,?)';
             $stmt = $conn->prepare($sql);
             $datos = [
                  $condId,
                  $herramientaId,
             ];
             $tiposDatos = 'ii';
             $stmt->bind_param( $tiposDatos, ...$datos);       
             $stmt->execute();
         }                                                                                                                                                                                                                                                                                                                                                                                                                     
     }

     public static function buscarTodo() {
         $conn = DB::conectar();
         $sql = 'SELECT tools, serie, marca, estado, condicion FROM herramientas INNER JOIN cond_herra ON herramientas.id = cond_herra.herramientaId INNER JOIN condiciones ON cond_herra.condicionId = condiciones.id';
         $busqueda = $conn->query($sql);
         return $busqueda;
     }
 }

?>