<?php
require_once("model.base.php");

class Estatu extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("id_estatu");
        echo "<select name='id_estatu' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un estatus </option>";
        while ($row = $this->next()) {
            if ($row->id_estatu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_estatu' {$sel}>$row->estatus</option>";
        }
        echo "</select>";
    }

    public function selectNull($value) {
        $this->getAll("id_estatu");
        echo "<select name='id_estatu' id='' class='js-example-theme-single' style='width: 100%' disabled>";
        while ($row = $this->next()) {
            if ($row->id_estatu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_estatu' {$sel}>$row->estatus</option>";
        }
        echo "</select>";
    }

}

$estatu = new Estatu($db);
$estatu->setView ("estatus");
$estatu->setTable("estatus");

$estatu->setKey  ("id_estatu");
$estatu->addField("estatus");

$estatu->newRecord();
?>