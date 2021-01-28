

<?php
session_start();
include './db/conexion.php';

//    verifica si hay sesiones iniciadas si no redirecciona a login.php
    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
        die();
    }else{
        $ustedes=$_SESSION['login_user'];
        if($ustedes!=='admin@admin.com'){
            $disabled=true;
            $tabindex='-1';
            $href='#';
            $null='disabled';
            $inicio='empleado.php';
        }else{
            $disabled=false;
            $tabindex='0';
            $href='./adminempleados.php';
            $inicio='admin.php';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin contactos</title>
        <link rel="icon" type="image/x-icon" href="./img/favicon.svg" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
        <link rel="stylesheet" href="./css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">   
        <!-- cdn bootstarap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./js/funcionconfirm.js"></script>
        <script>
        // esto lo aprendi buscando info en W3SCHOLS https://www.w3schools.com/jquery/jquery_filters.asp para filtar sin tener que entrar de nuevo a la base
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script>
    </head>
   
   <body onload="TiempoActividad()">
        <div class="container">

            <?php include './components/nav.php';?>
            <?php include './components/menu.php'; ?>
            
            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Contactos</h3>
            <p class="tituloPrincipal text-center phone1 text-success" style="font-size:2vw;"><?php echo $ustedes;  ?></p>
            <h3 class="tituloPrincipal text-center phone" style="font-size:11vw;">Contactos</h3>
            <p class="tituloPrincipal text-center phone text-success" style="font-size:6vw;"><?php echo $ustedes;  ?></p>
            <hr width=50%>
            <div class="row">
                <div class="col-lg-4 col-sm-10 mb-3">
                    <div class="form-inline mt-3 border border-success rounded-pill justify-content-center">
                        <input class="border-0 p-2 col-8" type="text" placeholder="Buscar subscriptor" aria-label="Search" id="myInput" autofocus>
                        <div class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></div>
                    </div>
                </div>
                <div class="col d-flex align-items-end mb-3 ml-3">
                    <div class="justify-content-center">
                        <a href="listarcontactos.php" title="Actualizar"><img src="./img/actualizar.png"></a>
                    </div>
                </div>
            </div>
            <table class="table table-responsive-sm table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">
                            Contactos

                            <!-- PENDIENT SI TENGO TIEMPO INVESTIGAR : ORDENAR ASC Y DESC-->

                            <!-- <div class="btn-group" role="group">
                                <button id="btnGroupDropNombre" type="button" class="btn-outline-success dropdown-toggle ml-2 mb-2 rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="./img/orderby.png" width="20vw">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <button class="dropdown-item"><img src="./img/asc.png" width="20vw"> Asc</button>
                                    <a class="dropdown-item" href="#"><img src="./img/desc.png" width="20vw"> Des</a>
                                </div>
                            </div> -->
                        </th>   
                    </tr>
                </thead>
                <tbody id="myTable">
                <?php
                    

                    $nuevaconexion= new conectarDB ();

                    $conexion= $nuevaconexion->conectar();

                    $consulta= "SELECT * FROM contactos order by ID_contactos DESC";
                    $query = mysqli_query($conexion,$consulta);

                    
                    while($filas = $listado = mysqli_fetch_array($query)){
                ?><!--aqui esta la ensalada 🥗 apertura de ciclo-->

                    <tr scope="row">

                        <td>  <?php   echo ucfirst($filas['nombre']); ?>    </td>
                        <td>  <?php   echo ucfirst($filas['apellido']); ?>    </td>
                        <td>  <?php   echo ucfirst($filas['mail']); ?>    </td>
                        <td><a href="admincontacto.php?id=<?php echo $filas['ID_contactos']; ?>" title="Ver Contacto">ver <i class="fa fa-plus" aria-hidden="true"></i></a></td>
                        
                        
                    </tr>

                    <?php 
                            
                    }
                        $conexion=null;

                    ?> <!--cierre de ciclo while-->
                </tbody>
            </table>
    
            <?php include './components/footer.php';?>
            
        </div> 
   </body>
   
</html>