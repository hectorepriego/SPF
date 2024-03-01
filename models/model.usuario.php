<?php
require_once("model.base.php");

class Usuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
        public function select($value) {
        $this->getAll("id_usuario");
        echo "<select name='id_usuario' id='' class='form-control'>";
        echo "<option disabled selected> Selecciona un usuario </option>";
        while ($row = $this->next()) {
            if ($row->id_usuario==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->id_usuario' {$sel}>$row->nombre_completo</option>";
        }
        echo "</select>";
    }

}

$usuario = new Usuario($db);
$usuario->setView ("vw_usuarios");
$usuario->setTable("usuarios");

$usuario->setKey  ("id_usuario");
$usuario->addField("id_persona");
$usuario->addField("email");
$usuario->addField("contraseña");
$usuario->addField("id_rol");
$usuario->addField("created_at");

$usuario->newRecord();
?>