<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

require_once("../models/model.articulo.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $articulo->values[] = $_POST["nombre_articulo"];
    $articulo->values[] = $_POST["inv_interno"];
    $articulo->values[] = $_POST["inv_externo"];
    $articulo->values[] = $_POST["num_serie"];
    $articulo->values[] = $_POST["modelo"];
    $articulo->values[] = $_POST["ip_address"];
    $articulo->values[] = $_POST["mac_address"];
    $articulo->values[] = $_POST["ubicacion"];
    $articulo->values[] = $_POST["id_marca"];
    $articulo->values[] = $_POST["id_estatu"];
    $articulo->values[] = $_POST["id_categoria"];
    $articulo->values[] = $_SESSION['usuario']->id_usuario;


    if ($tipo == 'nuevo') {
        //$db->debug();
        $articulo->insert();
        //die();
        header("location:../?page=user-articulo");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $articulo->update($id);
        //die();
        header("location:../?page=user-articulo");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $articulo->deleteOne($id);
        //die();
        header("location:../?page=user-articulo");
    }
}

?>