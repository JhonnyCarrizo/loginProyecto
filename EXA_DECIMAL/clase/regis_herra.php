<?php 
require_once('DB.php');
require_once('condicion.php');
class Herramienta{
    protected $tools;
    protected $serie;
    protected $marca;
    protected $estado;
    protected $cond;
    protected $id;

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
    public function setId($id){
        $this->id = $id;}


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
    public function getId() {
        return $this->id;}

    public function addCondId($condId) {
        $this->condId[] = $condId;
    }
    
    public static function findById($id) {
        $conn = DB::conectar();
        $sql = 'SELECT id, tools, serie, marca, estado FROM herramientas WHERE id=?';
        $stmt = $conn->prepare($sql);        
        $stmt->bind_param('i', $id);       
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        
        if ($data) {
            $data['condiciones'] = Condicion::getCondicionesByHerramientaId($id);
            return $data;
        }
        
        return null; 
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

    public function editar() {
        $conn = DB::conectar();
        $sql = 'SELECT id, tools FROM herramientas WHERE tools=? AND id!=?';
        $stmt = $conn->prepare($sql);
        $datos = [
            $this->tools, 
            $this->id, 
        ];
        $tiposDatos = 'ii';
        $stmt->bind_param( $tiposDatos, ...$datos);       
        $stmt->execute();
        if($stmt->num_rows === 0) {
            $stmt->close();
            $sql = "UPDATE herramientas SET tools=?, serie=?, marca=?, estado=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $datos = [
                $this->tools, 
                $this->serie, 
                $this->marca, 
                $this->estado, 
                $this->id,
            ];
            $tiposDatos = 'ssssi';
            $stmt->bind_param( $tiposDatos, ...$datos);       
            $stmt->execute();
            $stmt->close();
            $sql = "DELETE FROM cond_herra WHERE herramientaId=?";
            $stmt = $conn->prepare($sql);
            $tiposDatos = 'i';
            $stmt->bind_param( $tiposDatos, $this->id);       
            $stmt->execute();
            $stmt->close();
            for ($i = 0; $i < count($this->condId); $i++) {
                $sql = 'INSERT INTO cond_herra(condicionId, herramientaId)values(?,?)';
                $stmt = $conn->prepare($sql);
                $condId = $this->condId[$i];
                $tiposDatos = 'ii';
                $stmt->bind_param( $tiposDatos, $condId, $this->id );       
                $stmt->execute();
                $stmt->close();
            }     
        }
    }

    public static function buscarTodo() {
        $conn = DB::conectar();
        $sql = 'SELECT herramientas.id, tools, serie, marca, estado, condicion FROM herramientas INNER JOIN cond_herra ON herramientas.id = cond_herra.herramientaId INNER JOIN condiciones ON cond_herra.condicionId = condiciones.id';
        $busqueda = $conn->query($sql);
        return $busqueda;
}
 }

?>