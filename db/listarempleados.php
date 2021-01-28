<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
<body>
    <div class="row">
        <div class="col-lg-4 col-sm-10 mb-3">
            <div class="form-inline mt-3 border border-success rounded-pill justify-content-center">
                <input class="border-0 p-2 col-8" type="text" placeholder="Buscar empleado" aria-label="Search" id="myInput" autofocus>
                <div class="btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="col d-flex align-items-end mb-3 ml-3">
            <div class="justify-content-center">
                <a href="adminempleados.php" title="Actualizar"><img src="./img/actualizar.png"></a>
            </div>
        </div>
    </div>
    <table class="table table-responsive-sm table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">
                    NOMBRE 

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
                <th scope="col">APELLIDO
                    <div class="btn-group" role="group">

                            <!-- PENDIENTE SI TENGO TIEMPO INVESTIGAR : ORDENAR ASC Y DESC-->

                            <!-- <button id="btnGroupDropApellido" type="button" class="btn-outline-success dropdown-toggle ml-2 mb-2 rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="./img/orderby.png" width="20vw">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="#"><img src="./img/asc.png" width="20vw"> Asc</a>
                                <a class="dropdown-item" href="#"><img src="./img/desc.png" width="20vw"> Des</a>
                            </div> -->
                    </div>
                </th>
                <th scope="col">USUARIO
                </th>
            </thead>
            <tbody id="myTable">
            <?php
                include 'conexion.php';

                if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']!=='admin@admin.com' ){
                    header("location:login.php");
                    die();
                }

                $nuevaconexion= new conectarDB ();

                $conexion= $nuevaconexion->conectar();

                $consulta= "SELECT * FROM administrador_usuarios order by ID_empleados DESC";
                $query = mysqli_query($conexion,$consulta);

                
                while($filas = $listado = mysqli_fetch_array($query)){
                ?><!--aqui esta la ensalada 🥗 apertura de ciclo-->

                    <tr scope="row">

                        <td>  <?php   echo ucfirst($filas['nombre']); ?>    </td>
                        <td>  <?php   echo ucfirst($filas['apellido']); ?>    </td>
                        <td>  <?php   echo $filas['mail']; ?>    </td>
                        <!-- <td>    <?php//   echo $filas['password']; ?> </td> -->
                        <td><a href="eliminarempleado.php?id=<?php echo $filas['ID_empleados']; ?>" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        <td><a href="editarempleado.php?id=<?php echo $filas['ID_empleados']; ?>" title="Editar"><i class="fa fa-magic" aria-hidden="true"></i></a></td>
                    </tr>

                <?php 
                        
                }
                $conexion=null;

                ?> <!--cierre de ciclo while-->
            </tbody>
        </table>
     
    
</body>