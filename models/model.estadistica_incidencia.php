<?php
require_once("model.base.php");

class Estadistica_incidencia extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$ei = new Estadistica_incidencia($db);
$ei->setView ("vw_estadistica_incidencias");
$ei->setTable("incidencias");

$ei->setKey  ("id_incidencias");
?>