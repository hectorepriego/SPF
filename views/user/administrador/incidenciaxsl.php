<?php include $base_dir . "/models/model.incidencia.php";

header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=Cobranzas.xls');
header('Pragma: no-cache');
header('Expires: 0 ');



?>
<br>

<div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    
                    <div class="card-body">
                        <h5>Listado de incidencias</h5>
                        <table class="table table-striped table table-sm" id="myTable">

                            <thead>
                            <tr>
                                <th>Asunto</th>
                                <th>Descripcion</th>
                                <th>Solucion</th>
                                <th>Usuario</th>
                                <th>Departamento</th>
                                <th>Fecha y Hora</th> 
                                  

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $incidencia->getAll();
                            while ($row = $incidencia->next()) {
                                echo "<tr>";
                                echo "<td>$row->asunto</td>";
                                echo "<td>$row->descripcion</td>";
                                echo "<td>$row->solucion</td>";
                                echo "<td>$row->nombre_completo</td>";
                                echo "<td>$row->departamento</td>";
                                echo "<td>$row->fecha_hora</td>";
                        
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>     
    </div>
