<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

require_once("../models/model.resguardo.php");
require_once("../models/model.resguardo_detalle.php");



if ($_POST) {

    $id   = $_POST["id"];
    $idR = $_POST['idR'];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $resguardo->values[] = $_POST["num_resguardo"];
    $resguardo->values[] = $_POST['id_persona'];
    $resguardo->values[] = $_SESSION['usuario']->nombre_completo;
    $resguardo->values[] = $_SESSION['usuario']->id_usuario;




    if ($tipo == 'nuevo') {
        //$db->debug();
        $resguardo->insert();
        //die();
        header("location:../?page=user-resguardo-detalle&idR=" . $_POST["idR"]);

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $resguardo->update($id);
        //die();
        header("location:../?page=user-resguardo");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $resguardo->deleteOne($id);
        //die();
        header("location:../?page=user-resguardo");
    }
}

?>