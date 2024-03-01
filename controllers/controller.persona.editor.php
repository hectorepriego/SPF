<?php

require_once("../models/model.persona.php");
require_once("../models/model.puesto.php");
require_once("../models/model.departamento.php");
require_once("../models/model.extension.php");


if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

   // guardar los datos del formulario en el modelo
    $persona->values[] = $_POST["nombre"];
    $persona->values[] = $_POST["apellido_paterno"];
    $persona->values[] = $_POST["apellido_materno"];
    $persona->values[] = $_POST["id_puesto"];
    $persona->values[] = $_POST["id_departamento"];
    $persona->values[] = $_POST["id_extension"];
    $persona->values[] = $_POST['img']; 

    $img = $_POST['img'];
    $nombre=$_FILES['img']['name'];
    $guardado=$_FILES['img']['tmp_name'];

     $ubicacion = $_SERVER["DOCUMENT_ROOT"] . '/spf/resources/personal_img/'. $_POST["nombre"]. $_POST["apellido_paterno"]. $_POST["apellido_materno"]. ".jpg";
    //echo $guardado . "<br>";
    //echo $ubicacion . "<br>";

    if(move_uploaded_file($guardado, $ubicacion )){
        echo "Archivo guardado con exito";
    }else{
        echo "Archivo no se pudo guardar";
    } 

    if ($tipo == 'nuevo') {
        //$db->debug();
        $persona->insert();
        //die();
        header("location:../?page=edit-persona");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $persona->update($id);
        //die();
        header("location:../?page=edit-persona");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $persona->deleteOne($id);
        //die();
        header("location:../?page=edit-persona");
    }
}


?>