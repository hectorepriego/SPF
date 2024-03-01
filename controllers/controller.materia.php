<?php

require_once("../models/model.materia.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $materia->values[] = $_POST["clave"];
    $materia->values[] = $_POST["materia"];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $materia->insert();
        //die();
        header("location:../?page=adm-materia");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $materia->update($id);
        //die();
        header("location:../?page=adm-materia");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $materia->deleteOne($id);
        //die();
        header("location:../?page=adm-materia");
    }
}

?>