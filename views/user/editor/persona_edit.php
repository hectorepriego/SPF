<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['usuario']->id_rol<>3) {
    header('location:?page=login');
}
?>
<?php include $base_dir . "/models/model.persona.php";?>
<?php include $templates_header_edit ?>
    <body>
<?php include $templates_navbar_edit ?>
    <br>
    <div class="container">
        <div class="card">
            <div class="col-md-12">
                <div class="row">        
        <!--Inicio de la barra de componentes-->
            <!--Mitad de la barra lado izquierdo-->
            <div class="col-sm-1 col-md-1 col-lg-4 col-xl-7 card-header" align="left">
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-sm-8 col-md-8 col-lg-6 col-xl-4 card-header" align="right">
                 <form class="form-inline mt-3 mt-md-0" action="?page=edit-persona" method="post">
                        <input class="form-control form-control-sm   col-sm-8 mr-sm-3" type="text" placeholder="Buscar" aria-label="Buscar" value="<?=$person?>" name="Buscar">
                        <button class="btn btn-sm btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
            </div>
            <!--Mitad de la barra lado Derecho 1/2-->
            <div class="col-sm-3  col-md-3 col-lg-2 col-xl-1 card-header" align="left">
                <div class="form-group">
                     <a class="btn btn-sm btn-primary" href='?page=edit-persona-editar'>Nuevo</a>
                </div>
            </div>
    <!--Final de la barra de componentes-->
 <?php $person=$_POST["Buscar"]?> 
     
        <div align="center" class="card-body">
                <h3 align="center">Directorio de Personal</h3>    
            <main role="main" class="flex-shrink-0">
            
                
            <div class="card-body">
                      <!-- Example row of columns -->
                    <div class="row">
                         <?php
                           if($person){
                             $persona->getWhere("nombre_completo LIKE '%{$person}%' OR puesto LIKE '%{$person}%' OR departamento LIKE '%{$person}%' OR extension LIKE '%{$person}%'");
                             //echo "filtro";
                          }else{
                            $persona->getAll();
                        }
                        while($row = $persona->next()){

                        echo "<div class='col-sm-1 text-center col-lg-1 col-xl-1  text-right'><br>";
                        echo "</div>";
                        
                        echo "<div class='col-sm-3 text-center col-lg-3 col-xl-3  text-right'><br>";
                        echo ""; 
                        echo "<img src='resources/personal_img/{$row->nombre}{$row->apellido_paterno}{$row->apellido_materno}.jpg' class='rounded' width='150' height='150' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: 180x180'>";
                        echo "</div>";

                        echo "<div class='col-sm-7 col-lg-7 col-xl-7 text-left'><br>"; 
                        echo "<br><b>Nombre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $row->nombre_completo";
                        echo "<br><b>Puesto:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $row->puesto";
                        echo "<br><b>Departamento:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $row->departamento";
                        echo "<br><b>Extension:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $row->extension";
                        echo "<br>";
                        echo "</div>";

                        
                        echo "<div class='col-sm-1 col-lg-1 col-xl-1 text-left'>"; 
                        echo "<br><br>";
                            echo "<td>
                                    <a href='?page=edit-persona-editar&id=$row->id_persona'class='fas fa-edit fa-lg'></a>
                                </td><br><br>";

                            echo "<td>
                                    <a href='$row->id_persona' data-toggle='modal' data-target='#deleteModal ' class='linkborrar fas fa-trash-alt fa-lg'></a>
                                </td>";
                            echo "</tr>";
                        echo "</div>";
                        }
                        ?>             
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
        <br>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Persona</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/controller.persona.editor.php" method="post" id="form2">
                            <div class="form-group">
                                <h5 class="text-danger">¿Estas seguro de borrar esta Persona?</h5>
                                <input id="inpborrar" type="hidden" name="id">
                                <input type="hidden" name="tipo" value="borrar">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a>&nbsp</a>
                        <button type="submit" class="btn btn-danger" form="form2">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

        
<?php include $templates_footer_edit ?>
