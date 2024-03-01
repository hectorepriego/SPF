<?php

require_once("../models/model.marca.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $marca->values[] = $_POST["marca"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $marca->insert();
        //die();
        header("location:../?page=adm-marca");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $marca->update($id);
        //die();
        header("location:../?page=adm-marca");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $marca->deleteOne($id);
        //die();
        header("location:../?page=adm-marca");
    }
}

?>