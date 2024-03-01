<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}

require_once("../models/model.mis_resguardos.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    //print_r($_POST);
    //die();

    // guardar los datos del formulario en el modelo
    $detalle->values[] = $_POST["num_resguardo"];
    $detalle->values[] = $_POST['id_articulo'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $db->execute("UPDATE articulos SET id_estatu=7 WHERE id_articulo=?",array($_POST['id_articulo']));
        $detalle->insert();
        //die();
        header("location:../?page=adm-resguardo-detalle&idR=" . $_POST["num_resguardo"]);

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $detalle->update($id);
        //die();
        header("location:../?page=adm-resguardo-detalle&id=$row->id_resguardo");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $idart = $db->field("SELECT fk_articulo FROM resguardos_detalles WHERE id_resguardo_detalle=?",array($id));
        echo "**" . $idart;
        $db->execute("UPDATE articulos SET id_estatu=1 WHERE id_articulo=?",array($idart));
        
        $detalle->deleteOne($id);
        //  die();
        header("location:../?page=adm-resguardo-detalle&idR=" . $_POST["num_resguardo"]);
    }
}

?>