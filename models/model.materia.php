<?php
require_once("model.base.php");

class Materia extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function selectMaterias($value) {
        $this->getAll("ClaveMateria");
        echo "<select name='idmat' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdMateria==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdMateria' {$sel}>$row->ClaveMateria $row->Materia</option>";
        }
        echo "</select>";
    }
}

$materia = new Materia($db);
$materia->setView ("materias");
$materia->setTable("materias");

// campos de la tabla
$materia->setKey  ("IdMateria");
$materia->addField("ClaveMateria");
$materia->addField("Materia");

$materia->newRecord();
?>