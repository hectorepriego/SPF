<?php
$base_dir = $_SERVER["DOCUMENT_ROOT"] . "/spf";
# ---------------------------------------------------
# Recursos
# ---------------------------------------------------
$recursos_dir = $base_dir . "/recursos";

#Bootstrap
$recursos_bs_css = "vendor/bootstrap/css/bootstrap.min.css";
$recursos_fon_css = "vendor/fontawesome/css/all.css";
$recursos_bs_js  = "vendor/bootstrap/js/bootstrap.min.js";
$recursos_bs_jq  = "vendor/bootstrap/js/jquery-3.3.1.slim.min.js";
$recursos_se_jq  = "vendor/bootstrap/js/jquery.min.js";
$recursos_pop_js  = "vendor/bootstrap/js/popper.min.js";
$recursos_aj_jq  = "vendor/bootstrap/js/funtions.js";
$recursos_s2_js =  "vendor/select2/select2.js";
$recursos_s2_css = "vendor/select2/select2.css";




# Templates
$templates_dir = $base_dir . "/views/template";

$templates_navbar = $base_dir . "/views/template/navbar.php";
$templates_header = $base_dir . "/views/template/header.php";
$templates_footer = $base_dir . "/views/template/footer.php";

$templates_navbar_adm = $base_dir . "/views/template/navbar_adm.php";
$templates_header_adm = $base_dir . "/views/template/header_adm.php";
$templates_footer_adm = $base_dir . "/views/template/footer_adm.php";

$templates_navbar_user = $base_dir . "/views/template/navbar_user.php";
$templates_header_user = $base_dir . "/views/template/header_user.php";
$templates_footer_user = $base_dir . "/views/template/footer_user.php";

$templates_navbar_edit = $base_dir . "/views/template/navbar_edit.php";
$templates_header_edit = $base_dir . "/views/template/header_edit.php";
$templates_footer_edit = $base_dir . "/views/template/footer_edit.php";