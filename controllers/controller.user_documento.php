<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

require_once("../models/model.documento.php");



if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $documento->values[] = $_POST["folio"];
    $documento->values[] = $_POST['descripcion'];
    $documento->values[] = $_POST['fecha_doc'];
    $documento->values[] = $_POST['url'];
    $documento->values[] = $_POST['created_at'];
    $documento->values[] = $_POST['id_tipo_documento'];
    $documento->values[] = $_SESSION['usuario']->id_usuario;

    $url = $_POST['url'];
    $nombre=$_FILES['url']['name'];
    $guardado=$_FILES['url']['tmp_name'];

    $ubicacion = $_SERVER["DOCUMENT_ROOT"] . '/spf/resources/documentos/'. $_POST["folio"]. $_POST["id_tipo_documento"]. ".pdf";
    //echo $guardado . "<br>";
    //echo $ubicacion . "<br>";

    if(move_uploaded_file($guardado, $ubicacion )){
        echo "Archivo guardado con exito";
    }else{
        echo "Archivo no se pudo guardar";
    }

    if ($tipo == 'nuevo') {
        //$db->debug();
        $documento->insert();
        //die();
        header("location:../?page=user-documento");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $documento->update($id);
        //die();
        header("location:../?page=user-documento");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $documento->deleteOne($id);
        //die();
        header("location:../?page=user-documento");
    }
}

?>