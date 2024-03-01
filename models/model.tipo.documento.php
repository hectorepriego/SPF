<?php
require_once("model.base.php");

class Tipodocumento extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

          public function select($value) {
        $this->getAll("id_tipo_documento");
        echo "<select name='id_tipo_documento' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un tipo documento </option>";
        while ($row = $this->next()) {
            if ($row->id_tipo_documento==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_tipo_documento' {$sel}>$row->tipo_documento</option>";
        }
        echo "</select>";
    }
}

$tipodocumento = new Tipodocumento($db);
$tipodocumento->setView ("tipos_documentos");
$tipodocumento->setTable("tipos_documentos");

$tipodocumento->setKey  ("id_tipo_documento");
$tipodocumento->addField("tipo_documento");

$tipodocumento->newRecord();
?>