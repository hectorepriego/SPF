<?php
require_once("model.base.php");

class Persona extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

        public function select($value) {
        $this->getAll("id_persona");
        echo "<select name='id_persona' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona una persona </option>";
        while ($row = $this->next()) {
            if ($row->id_persona==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_persona' {$sel}>$row->nombre_completo</option>";
        }
        echo "</select>";
    }



}

$persona = new Persona($db);
$persona->setView ("vw_personas");
$persona->setTable("personas");

$persona->setKey  ("id_persona");
$persona->addField("nombre");
$persona->addField("apellido_paterno");
$persona->addField("apellido_materno");
$persona->addField("id_puesto");
$persona->addField("id_departamento");
$persona->addField("id_extension");
$persona->addField("img");
$persona->newRecord();
?>