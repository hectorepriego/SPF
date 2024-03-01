<?php

require_once("../models/model.departamento.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $departamento->values[] = $_POST["departamento"];
    $departamento->values[] = $_POST['vlan'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $departamento->insert();
        //die();
        header("location:../?page=adm-departamento");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $departamento->update($id);
        //die();
        header("location:../?page=adm-departamento");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $departamento->deleteOne($id);
        //die();
        header("location:../?page=adm-departamento");
    }
}

?>