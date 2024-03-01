<?php
require_once("model.base.php");

class Estadistica_categoria extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

}

$ec = new Estadistica_categoria($db);
$ec->setView ("vw_estadistica_categorias");
$ec->setTable("articulos");

$ec->setKey  ("id_articulos");   
?>