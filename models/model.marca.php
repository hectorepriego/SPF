<?php
require_once("model.base.php");

class Marca extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("id_marca");
        echo "<select name='id_marca' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona una marca </option>";
        while ($row = $this->next()) {
            if ($row->id_marca==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_marca' {$sel}>$row->marca</option>";
        }
        echo "</select>";
    }

    public function selectNull($value) {
        $this->getAll("id_marca");
        echo "<select name='id_marca' id='' class='js-example-theme-single' style='width: 100%' disabled>";
        while ($row = $this->next()) {
            if ($row->id_marca==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_marca' {$sel}>$row->marca</option>";
        }
        echo "</select>";
    }

}

$marca = new Marca($db);
$marca->setView ("vw_marcas");
$marca->setTable("marcas");

$marca->setKey  ("id_marca");
$marca->addField("marca");

$marca->newRecord();
?>