<?php
require_once("model.base.php");

class Usuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
}

$usuario = new Usuario($db);
$usuario->setView ("usuarios");
$usuario->setTable("usuarios");

$usuario->setKey  ("id_usuario");
$usuario->addField("id_persona");
$usuario->addField("email");
$usuario->addField("contraseña");
$usuario->addField("id_rol");
$usuario->newRecord();
?>