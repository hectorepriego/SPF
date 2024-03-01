<?php
require_once("model.base.php");

class Ubicacion extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("id_ubicacion");
        echo "<select name='id_ubicacion' id='' class='js-example-theme-single' style='width: 100%'>";
        while ($row = $this->next()) {
            if ($row->id_ubicacion==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_ubicacion' {$sel}>$row->ubicacion</option>";
        }
        echo "</select>";
    }

    public function selectNull($value) {
        $this->getAll("id_ubicacion");
        echo "<select name='id_ubicacion' id='' class='js-example-theme-single' style='width: 100%' disabled>";
        while ($row = $this->next()) {
            if ($row->id_ubicacion==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_ubicacion' {$sel}>$row->ubicacion</option>";
        }
        echo "</select>";
    }


}

$ubicacion = new Ubicacion($db);
$ubicacion->setView ("ubicaciones");
$ubicacion->setTable("ubicaciones");

$ubicacion->setKey  ("id_ubicacion");
$ubicacion->addField("ubicacion");

$ubicacion->newRecord();
?>