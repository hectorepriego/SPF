<?php

require_once("../models/model.categoria.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $categoria->values[] = $_POST["categoria"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $categoria->insert();
        //die();
        header("location:../?page=adm-categoria");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $categoria->update($id);
        //die();
        header("location:../?page=adm-categoria");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $categoria->deleteOne($id);
        //die();
        header("location:../?page=adm-categoria");
    }
}

?>