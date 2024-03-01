<?php
require_once("model.base.php");

class Documento extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function getDocumento(){
        $id = $_SESSION["usuario"]->id_usuario;
        $this->getWhere("id_usuario={$id}","id_documento");
    }
  }

$documento = new Documento($db);
$documento->setView ("vw_documentos");
$documento->setTable("documentos");

$documento->setKey  ("id_documento");
$documento->addField("folio");
$documento->addField("descripcion");
$documento->addField("fecha_doc");
$documento->addField("url");
$documento->addField("created_at");
$documento->addField("id_tipo_documento");
$documento->addField("id_usuario");

$documento->newRecord();
?>