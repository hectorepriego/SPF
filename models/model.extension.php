<?php
require_once("model.base.php");

class Extension extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

        public function select($value) {
        $this->getAll("id_extension");
        echo "<select name='id_extension' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona una extension </option>";
        while ($row = $this->next()) {
            if ($row->id_extension==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_extension' {$sel}>$row->extension, $row->departamento</option>";
        }
        echo "</select>";
    }

        /*public function select2($value) {
        $this->getAll("id_departamento");
        echo "<select name='id_extension' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona una extension </option>";
        while ($row = $this->next()) {
            if ($row->id_departamento==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_departamento' {$sel}>$row->extension;</option>";
        }
        echo "</select>";
    }*/

}

$extension = new Extension($db);
$extension->setView ("vw_extensiones");
$extension->setTable("extensiones");

$extension->setKey  ("id_extension");
$extension->addField("extension");
$extension->addField("id_departamento");


$extension->newRecord();
?>