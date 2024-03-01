<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

require_once("../models/model.new_contraseña.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    $new_contra   = $_POST['contraseña1'];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $usuario->values[] = $_POST['contraseña1'];
    
    if ($tipo == 'nuevo') {
        //$db->debug();
        $usuario->insert();
        //die();
        header("location:../?page=user-password");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $db->execute("UPDATE usuarios SET contraseña=$new_contra WHERE id_usuario=?",array($_SESSION['usuario']->id_usuario));
        $usuario->update($id);
        //die();
        header("location:../?page=user-inicio");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $usuario->deleteOne($id);
        //die();
        header("location:../?page=user-password");
    }
}

?>