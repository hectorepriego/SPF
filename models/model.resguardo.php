<?php
require_once("model.base.php");

class Resguardo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

		public function getResguardo(){
		        $id = $_SESSION["usuario"]->id_usuario;
		        $this->getWhere("id_usuario={$id}","id_resguardo");
		    }

}

$resguardo = new Resguardo($db);
$resguardo->setView ("vw_resguardos");
$resguardo->setTable("resguardos");

$resguardo->setKey  ("id_resguardo");
$resguardo->addField("num_resguardo");
$resguardo->addField("id_persona");
$resguardo->addField("otorgante");
$resguardo->addField("id_usuario");


$resguardo->newRecord();
?>