<?php

require_once("../models/model.ubicacion.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $ubicacion->values[] = $_POST["ubicacion"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $ubicacion->insert();
        //die();
        header("location:../?page=adm-ubicacion");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $ubicacion->update($id);
        //die();
        header("location:../?page=adm-ubicacion");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $ubicacion->deleteOne($id);
        //die();
        header("location:../?page=adm-ubicacion");
    }
}

?>