<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include '../resources/class/class.connection.php';
    include $base_dir . "/models/model.mis_resguardos.php";
    include $base_dir . "/models/model.persona.php";
    $id = $_GET['id'];
    $mis_resguardos->getOne($id);
?>

    
    <?php include $templates_header_adm ?>
    <body>
    <?php include $templates_navbar_adm ?>
    <br>

       <?php
    $idP= $_POST["id_persona"];
             ?> 

                        <div class="row">
                        <div class="container">
                          <div class="row">
                            <div class="col-6">
                        <form  action="?page=adm-mis_resguardos" method="post"> 
                        <input type="hidden" class="form-control" name="idP" value="<?=$idP?>">
                          
                                <div class="form-group" align="left">
                                    <label>Persona</label><br>
                                <?php
                                $persona->select($usuario->data->id_persona);
                                ?>
                                <input type="hidden" name="idP" value="<?= $id ?>">
                              
                            <?php

                                if($id) {//esto esta mal  seria  if($id!=NULL) asi
                                    echo "<input type='hidden' name='tipo' value='actualizar'>";
                                } else {
                                    echo "<input type='hidden' name='tipo' value='nuevo'>";
                                }
                            ?>  
                                </div>
                                
                            </div>

                            <div class="col-6">
                                <div class="form-group" align="left">
                                    <br>
                                    <input type="submit" class="btn btn-sm btn-success" value="Buscar">
                                </div>    
                            </div>
                            </form>
                          </div>
                        </div>
                    </div>
          

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12" align="left">
                <div class="card">
                    <div class="card-header">
                        <style>
                            label
                                   {
                                    font-size: 2.2vh;
                                    }
                        </style>

                        <div class="container">
                          <div class="row">

                            <div class="col-1">
                                 <div class="form-group" align="left">
                                   
                                </div>     
                            </div>

                            <div class="col-10">
                                <div class="form-group" align="left">
                                     <h5 style="text-align:center">Mis Resguardos</h5>
                                </div>    
                            </div>
                            
                            <div class="col-1">
                                <div class="form-group" align="right">
                                
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="container">
                          <div class="row">
                            <div class="col-6">
                                <div class="form-group" align="left">
                                </div>    
                            </div>
                          </div>
                        </div>
                    </div>
          
        
   

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <div class="card-body">
                    <table class= "table table table-sm table table-bordered" id="myTable">
                        <style>
                            table td{
                                text-align: center;
                                font-size: 2.0vh;
                            }   
                            table, tr, th {
                                text-align: center;
                                font-size: 2.4vh;
                            }    
                        </style>
                            <thead>
                                <tr bgcolor="#9D2449"> 
                                <th style="color:white;">Articulo</th>
                                <th style="color:white;">Inv.Interno</th>
                                <th style="color:white;">Inv Externo</th>
                                <th style="color:white;">Marca</th>
                                <th style="color:white;">Modelo</th>
                                
                                </tr>
                            </thead>
                            <tbody id="Searcharticulos">
                                 <?php
                                   if($idP){
                                     $mis_resguardos->getWhere("id_persona=$idP");
                                     //echo "filtro";
                                  }else{
                                    $mis_resguardos->getMisresguardos();
                                 }

                                    while($row = $mis_resguardos->next()){
                                    echo "<tr>";
                                    echo "<td>$row->nombre_articulo</td>";
                                    echo "<td>$row->inv_interno</td>";
                                    echo "<td>$row->inv_externo</td>";
                                    echo "<td>$row->marca</td>";
                                    echo "<td>$row->modelo</td>";
                                }
                                ?>
                            </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>



<?php include $templates_footer_adm ?>

<script> 
$(document). ready(function(){
    $('.js-example-theme-single').select2({
        theme: "classic"
    });

});
</script>