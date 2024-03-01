<?php

require_once("../models/model.usuario.php");

    // guardar los datos del formulario en el modelo
    $usuario->values[] = $_POST['contraseña1'];
        $usuario->update($id);
        //die();
        header("location:../?page=adm-password");
?>