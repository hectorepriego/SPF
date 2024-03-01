<?php

require_once("../models/model.ubicacion.php");

    // guardar los datos del formulario en el modelo
    $ubicacion->values[] = $_POST["ubicacion"];
        $ubicacion->insert();
        //die();
        header("location:../?page=adm-articulo-editar");
?>