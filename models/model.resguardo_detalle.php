<?php
require_once("model.base.php");

class Detalle extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
    public function getResguardo(){
		        $id = $_SESSION["usuario"]->id_usuario;
		        $this->getWhere("id_usuario={$id}","id_resguardo");
		    }
    
}

$detalle = new Detalle($db);
$detalle->setView ("vw_resguardos_detalles");
$detalle->setTable("resguardos_detalles");

$detalle->setKey  ("id_resguardo_detalle");
$detalle->addField("fk_resguardo");
$detalle->addField("fk_articulo");
$detalle->newRecord();
?>