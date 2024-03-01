<?php
require_once("model.base.php");

class Articulo extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

        public function getArticulo(){
        $id = $_SESSION["usuario"]->id_usuario;
        $this->getWhere("id_usuario={$id}","id_articulo");
    }

       public function select($value) {
        $id = $_SESSION["usuario"]->id_usuario;
        $this->getWhere("id_usuario={$id}","id_articulo");
        echo "<select name='id_articulo' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un articulo </option>";
        while ($row = $this->next()) {
            if ($row->id_articulo==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_articulo' {$sel}>$row->nombre_ar</option>";
        }   
        echo "</select>";
    }

     public function select2($value,$estatu) {
        $id = $_SESSION["usuario"]->id_usuario;
        $this->getWhere("id_usuario={$id}","id_articulo");
        echo "<select name='id_articulo' id='' class='js-example-theme-single' style='width: 100%'>";
        echo "<option disabled selected> Selecciona un articulo </option>";
        while ($row = $this->next()) {
            if ($row->id_estatu!=$estatu){
            if ($row->id_articulo==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_articulo' {$sel}>$row->nombre_ar</option>";
        }  
    } 
        echo "</select>";
    }
}


$articulo = new Articulo($db);
$articulo->setView ("vw_articulos");
$articulo->setTable("articulos");

$articulo->setKey  ("id_articulo");
$articulo->addField("nombre_articulo");
$articulo->addField("inv_interno");
$articulo->addField("inv_externo");
$articulo->addField("num_serie");
$articulo->addField("modelo");
$articulo->addField("ip_address");
$articulo->addField("mac_address");
$articulo->addField("ubicacion");
$articulo->addField("id_marca");
$articulo->addField("id_estatu");
$articulo->addField("id_categoria");
$articulo->addField("id_usuario");

$articulo->newRecord();
?>