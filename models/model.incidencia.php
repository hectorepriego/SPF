<?php
require_once("model.base.php");

class Incidencia extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

public function getIncidencia(){
        $id = $_SESSION["usuario"]->id_usuario;
        $this->getWhere("id_usuario={$id}","id_incidencias");
    }
}

$incidencia = new Incidencia($db);
$incidencia->setView ("vw_incidencias");
$incidencia->setTable("incidencias");

$incidencia->setKey  ("id_incidencias");
$incidencia->addField("asunto");
$incidencia->addField("descripcion");
$incidencia->addField("solucion");
$incidencia->addField("id_usuario");
$incidencia->addField("id_departamento");
$incidencia->addField("fecha_hora");
$incidencia->newRecord();
?>