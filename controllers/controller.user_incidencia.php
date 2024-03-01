<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

require_once("../models/model.incidencia.php");
require_once("../models/model.usuario.php");
require_once("../models/model.departamento.php");




if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $incidencia->values[] = $_POST["asunto"];
    $incidencia->values[] = $_POST['descripcion'];
    $incidencia->values[] = $_POST['solucion'];
    $incidencia->values[] = $_SESSION['usuario']->id_usuario;
    $incidencia->values[] = $_POST['id_departamento'];
    $incidencia->values[] = $_POST['fecha_hora'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $incidencia->insert();
        //die();
        header("location:../?page=user-incidencia");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $incidencia->update($id);
        //die();
        header("location:../?page=user-incidencia");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $incidencia->deleteOne($id);
        //die();
        header("location:../?page=user-incidencia");
    }
}

?>