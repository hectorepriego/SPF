<?php

require_once("../models/model.estatu.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $estatu->values[] = $_POST["estatu"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $estatu->insert();
        //die();
        header("location:../?page=adm-estatu");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $estatu->update($id);
        //die();
        header("location:../?page=adm-estatu");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $estatu->deleteOne($id);
        //die();
        header("location:../?page=adm-estatu");
    }
}

?>