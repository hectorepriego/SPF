<?php
require_once("model.base.php");

class Departamento extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

        public function select($value) {
        $this->getAll("id_departamento");
        echo "<select name='id_departamento' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un departamento </option>";
        while ($row = $this->next()) {
            if ($row->id_departamento==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_departamento' {$sel}>$row->departamento</option>";
        }
        echo "</select>";
    }
}

$departamento = new Departamento($db);
$departamento->setView ("vw_departamentos");
$departamento->setTable("departamentos");

$departamento->setKey  ("id_departamento");
$departamento->addField("departamento");
$departamento->addField("vlan");

$departamento->newRecord();
?>