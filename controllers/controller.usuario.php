<?php

require_once("../models/model.usuario.php");
require_once("../models/model.persona.php");
require_once("../models/model.rol.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $usuario->values[] = $_POST['id_persona'];
    $usuario->values[] = $_POST['email'];
    $usuario->values[] = $_POST['contraseña'];
    $usuario->values[] = $_POST['id_rol'];
    $usuario->values[] = $_POST['created_at'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $usuario->insert();
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $usuario->update($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $usuario->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }
}

?>