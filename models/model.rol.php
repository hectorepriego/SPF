<?php
require_once("model.base.php");

class Rol extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

        public function select($value) {
        $this->getAll("id_rol");
        echo "<select name='id_rol' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un rol </option>";
        while ($row = $this->next()) {
            if ($row->id_rol==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_rol' {$sel}>$row->rol</option>";
        }
        echo "</select>";
    }
}

$rol = new Rol($db);
$rol->setView ("vw_roles");
$rol->setTable("roles");

// campos de la tabla
$rol->setKey  ("id_rol");
$rol->addField("rol");

$rol->newRecord();
?>