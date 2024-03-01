<?php
require_once("model.base.php");

class Puesto extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

        public function select($value) {
        $this->getAll("id_puesto");
        echo "<select name='id_puesto' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un puesto </option>";
        while ($row = $this->next()) {
            if ($row->id_puesto==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_puesto' {$sel}>$row->puesto</option>";
        }
        echo "</select>";
    }



}

$puesto = new Puesto($db);
$puesto->setView ("puestos");
$puesto->setTable("puestos");

$puesto->setKey  ("id_puesto");
$puesto->addField("puesto");

$puesto->newRecord();
?>