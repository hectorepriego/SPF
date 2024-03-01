<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php
    include '../resources/class/class.connection.php';
    include $base_dir . "/models/model.mis_resguardos.php";
    $id = $_GET['id'];
    $mis_resguardos->getOne($id);
?>

    
    <?php include $templates_header_user ?>
    <body>
    <?php include $templates_navbar_user ?>
    <br>

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
                                $mis_resguardos->getMisresguardos();
                                while ($row = $mis_resguardos->next()) {
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



<?php include $templates_footer_user ?>
