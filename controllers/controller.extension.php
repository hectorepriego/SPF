<?php

require_once("../models/model.extension.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $extension->values[] = $_POST["extension"];
    $extension->values[] = $_POST['id_departamento'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $extension->insert();
        //die();
        header("location:../?page=adm-extension");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $extension->update($id);
        //die();
        header("location:../?page=adm-extension");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $extension->deleteOne($id);
        //die();
        header("location:../?page=adm-extension");
    }
}

?>