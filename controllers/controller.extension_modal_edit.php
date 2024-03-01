<?php

require_once("../models/model.extension.php");

    // guardar los datos del formulario en el modelo
    $extension->values[] = $_POST["extension"];
    $extension->values[] = $_POST["id_departamento"];
        $extension->insert();
        //die();
        header("location:../?page=edit-persona-editar");


?>