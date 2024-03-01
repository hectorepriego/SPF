<?php

require_once("../models/model.puesto.php");
require_once("../models/model.departamento.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $puesto->values[] = $_POST["puesto"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $puesto->insert();
        //die();
        header("location:../?page=adm-puesto");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $puesto->update($id);
        //die();
        header("location:../?page=adm-puesto");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $puesto->deleteOne($id);
        //die();
        header("location:../?page=adm-puesto");
    }
}

?>