<?php
require_once("model.base.php");

class Categoria extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("id_categoria");
        echo "<select name='id_categoria' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona una categoria </option>";
        while ($row = $this->next()) {
            if ($row->id_categoria==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_categoria' {$sel}>$row->categoria</option>";
        }
        echo "</select>";
    }

    public function selectNull($value) {
        $this->getAll("id_categoria");
        echo "<select name='id_categoria' id='' class='js-example-theme-single' style='width: 100%' disabled>";
        while ($row = $this->next()) {
            if ($row->id_categoria==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_categoria' {$sel}>$row->categoria</option>";
        }
        echo "</select>";
    }
}

$categoria = new Categoria($db);
$categoria->setView ("vw_categorias");
$categoria->setTable("categorias");

$categoria->setKey  ("id_categoria");
$categoria->addField("categoria");

$categoria->newRecord();
?>