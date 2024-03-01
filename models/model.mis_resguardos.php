<?php
require_once("model.base.php");

class Mis_resguardos extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

		public function getMisresguardos(){
		        $id = $_SESSION["usuario"]->id_persona;
		        $this->getWhere("id_persona={$id}","id_persona");
		    }

}

$mis_resguardos = new Mis_resguardos($db);
$mis_resguardos->setView ("vw_mis_resguardos");
$mis_resguardos->setTable("vw_mis_resguardos");

$mis_resguardos->setKey  ("id_resguardo_detalle");

$mis_resguardos->newRecord();
?>