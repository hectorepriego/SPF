<?php
$email = $_POST['email'];
$pass  = $_POST['pass'];


include '../resources/class/class.connection.php';
include '../models/model.usuario.php';

try {
    session_start();
    $db->debug();

    $sql = "SELECT * FROM vw_usuarios WHERE email=? and contraseña=?";

    $usuario->get($sql,array($email,$pass));

    if ($usuario->data->email==$email) {

        $_SESSION['usuario'] = $usuario->data;

        switch ($usuario->data->id_rol) {
             case 1:
                header("location:../?page=adm-inicio");
                break;
            case 2:
                header("location:../?page=user-inicio");
                break;
            case 3:
                header("location:../?page=edit-inicio");
                break;

        }
    } else {
        $_SESSION['error'] = true;
        header('location:../?page=inicio');
    }

} catch (Exception $e) {

}
