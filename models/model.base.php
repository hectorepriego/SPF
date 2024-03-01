<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/spf/resources/class/class.connection.php");

class Model {
    public    $db;
    private   $view;
    private   $table;
    private   $key;
    public    $data;
    //public    $ultimo_id;  
    protected $afields=array();
    public    $values =array();

    public function __construct($db) {
        $this->db   = $db;
    }

    public function newRecord(){
        $this->getOne(0);
    }

    public function setView ($v) {$this->view =$v;}
    public function setTable($t) {$this->table=$t;}

    public function setKey  ($k) {$this->key  =$k;}
    public function addField($f) {
        $this->afields[]  =$f . "=?";
    }

    public function get($sql,$values){
        $this->data=$this->db->record($sql,$values);
    } 

    public function getOne($id){
        $this->data=$this->db->record("SELECT * FROM {$this->view} WHERE {$this->key}=?",array($id));
    }

    public function getPass($id){
        $this->data=$this->db->record("SELECT contraseña FROM usuarios WHERE {$this->key}=?",array($id));
    }

    public function getUltimo(){
        
       $this->data=$this->db->record("SELECT MAX(id_resguardo) AS ultimo FROM resguardos");
    }

    /*public function getSQL(){
        
       $this->data=$this->db->record("SELECT * FROM {$this->view}");
       $sentencia = $this->conn->prepare($this->data);
       $sentencia->execute();


       $resultado= $sentencia->fetchAll();
       var_dump($resultado);

    }*/

    public function getAll($order=""){
        if($order) $ord =" ORDER BY {$order}"; else $ord="";
        $this->data=$this->db->recordSet("SELECT * FROM {$this->view} {$ord}");
    }

    public function getAllPaginate($order="", $limite = 6, $pagina = 1){
        if($order) $ord =" ORDER BY {$order}"; else $ord="";
        if($limite) $limite =" LIMIT {$limite}"; else $limite="";
        if($pagina) {
            $offset = ($pagina-1) * $limite;
            $pagina =" OFFSET {$offset}"; 
        }
        else { 
            $pagina=""; 
        }

        $this->data=$this->db->recordSet("SELECT * FROM {$this->view} {$ord} {$limite} {$pagina}");
    }

    public function getWhere($condition,$order=""){
        if($order) $ord =" ORDER BY {$order}"; else $ord="";
        $this->data=$this->db->recordSet("SELECT * FROM {$this->view} WHERE {$condition} {$ord}");
    }

    public function next(){

        return $this->db->next($this->data);
    }

    public function insert() {
        $fields = implode(",",$this->afields);
        $sql = "INSERT INTO  {$this->table} SET {$fields}";
        $this->db->execute($sql,$this->values);
    }

    public function update($id) {
        $fields = implode(",",$this->afields);
        $sql = "UPDATE {$this->table} SET {$fields} WHERE {$this->key}={$id}";
        $this->db->execute($sql,$this->values);
    }

    public function deleteOne($id){
        $this->db->execute("DELETE FROM {$this->table} WHERE {$this->key}=?",array($id));
    }

    public function deleteWhere($condition){
        $this->db->execute("DELETE FROM {$this->table} WHERE {$condition}");
    }


}

?>