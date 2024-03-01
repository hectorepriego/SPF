<?php
include "directorios.php";
include 'resources/class/class.connection.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR);

if (isset($_GET["page"])) {
    switch ($_GET['page']) {

        # pagina principal
        case 'inicio':
            include 'views/home/inicio.php';
            break;

        # Editor
        case 'edit-inicio':
            include 'views/user/editor/inicio-edit.php';
            break;
        case 'edit-persona':
            include 'views/user/editor/persona_edit.php';
            break;
        case 'edit-persona-editar':
            include 'views/user/editor/persona_editar_edit.php';
            break;

        # Usuarios
        case 'user-inicio':
            include 'views/user/usuario/inicio-usuario.php';
            break;
        case 'user-incidencia':
            include 'views/user/usuario/incidencia_user.php';
            break;            
        case 'user-incidencia-editar':
            include 'views/user/usuario/incidencia_editar_user.php';
            break;
        case 'user-incidencia-ver':
            include 'views/user/usuario/incidencia_ver_user.php';
            break;
        case 'user-documento':
            include 'views/user/usuario/documento_user.php';
            break;
        case 'user-documento-editar':
            include 'views/user/usuario/documento_editar_user.php';
            break;
        case 'user-articulo':
            include 'views/user/usuario/articulo_user.php';
            break;
        case 'user-articulo-editar':
            include 'views/user/usuario/articulo_editar_user.php';
            break;
        case 'user-articulo-ver':
            include 'views/user/usuario/articulo_ver_user.php';
            break;
        case 'user-resguardo':
            include 'views/user/usuario/resguardo_user.php';
            break;
        case 'user-resguardo-editar':
            include 'views/user/usuario/resguardo_editar_user.php';
            break;
        case 'user-resguardo-asignado':
            include 'views/user/usuario/resguardo_asignado_user.php';
            break;
        case 'user-resguardo-detalle':
            include 'views/user/usuario/resguardo_detalle_user.php';
            break;
        case 'user-mis_resguardos':
            include 'views/user/usuario/mis_resguardos_user.php';
            break;
        case 'user-pdf-articulos':
            include 'views/user/usuario/user_pdf_articulos.php';
            break;
            
        # administrador
        case 'adm-inicio':
            include 'views/user/administrador/inicio.php';
            break;
        case 'adm-persona':
            include 'views/user/administrador/persona.php';
            break;
        case 'adm-persona-editar':
            include 'views/user/administrador/persona_editar.php';
            break;
        case 'adm-usuario':
            include 'views/user/administrador/usuario.php';
            break;
        case 'adm-usuario-editar':
            include 'views/user/administrador/usuario_editar.php';
            break;
        case 'adm-puesto':
            include 'views/user/administrador/puesto.php';
            break;
        case 'adm-puesto-editar':
            include 'views/user/administrador/puesto_editar.php';
            break;
        case 'adm-departamento':
            include 'views/user/administrador/departamento.php';
            break;
        case 'adm-departamento-editar':
            include 'views/user/administrador/departamento_editar.php';
            break;
        case 'adm-extension':
            include 'views/user/administrador/extension.php';
            break;
        case 'adm-extension-editar':
            include 'views/user/administrador/extension_editar.php';
            break;
        case 'adm-categoria':
            include 'views/user/administrador/categoria.php';
            break;
        case 'adm-categoria-editar':
            include 'views/user/administrador/categoria_editar.php';
            break;
        case 'adm-marca':
            include 'views/user/administrador/marca.php';
            break;
        case 'adm-marca-editar':
            include 'views/user/administrador/marca_editar.php';
            break;
        case 'adm-estatu':
            include 'views/user/administrador/estatu.php';
            break;
        case 'adm-estatu-editar':
            include 'views/user/administrador/estatu_editar.php';
            break;
        case 'adm-articulo':
            include 'views/user/administrador/articulo.php';
            break;
        case 'adm-articulo-editar':
            include 'views/user/administrador/articulo_editar.php';
            break;
        case 'adm-articulo-ver':
            include 'views/user/administrador/articulo_ver.php';
            break;
        case 'adm-resguardo':
            include 'views/user/administrador/resguardo.php';
            break;
        case 'adm-resguardo-asignado':
            include 'views/user/administrador/resguardo_asignado.php';
            break;
        case 'adm-resguardo-editar':
            include 'views/user/administrador/resguardo_editar.php';
            break;
        case 'adm-resguardo-detalle':
            include 'views/user/administrador/resguardo_detalle.php';
            break;
        case 'adm-mis_resguardos':
            include 'views/user/administrador/mis_resguardos.php';
            break;
        case 'adm-documento':
            include 'views/user/administrador/documento.php';
            break;
        case 'adm-documento-editar':
            include 'views/user/administrador/documento_editar.php';
            break;
        case 'adm-incidencia':
            include 'views/user/administrador/incidencia.php';
            break;
        case 'adm-incidencia-ver':
            include 'views/user/administrador/incidencia_ver.php';
            break;
        case 'adm-incidencia-editar':
            include 'views/user/administrador/incidencia_editar.php';
            break;
        case 'open-xls-incidencia':
            include 'views/user/administrador/incidenciaxsl.php';
            break;
        case 'open-pdf-articulos':
            include 'views/user/administrador/pdf_articulos.php';
            break;
        case 'open-pdf-incidencia':
            include 'views/user/administrador/pdf_incidencia.php';
            break;
        case 'open-pdf-detalle_resguardo':
            include 'views/user/administrador/pdf_detalle_resguardo.php';
            break;

    }
} else {
    include 'views/home/inicio.php';
}
