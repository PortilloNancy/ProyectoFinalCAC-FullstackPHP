<?php 
session_start();
include './db/conexion.php';
 
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
        <!-- cdn bootstarap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

        <!-- JavaScript -->
        <script src="./js/funcionconfirm.js"></script>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

        <!-- RTL version-->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
        <style>.ajs-message.ajs-custom { color: #31708f !important;  background-color: #d9edf7!important;  border-color: #31708f!important;}</style>
    </head>
    <?php
 
//  include 'eliminarempleado.php';

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
    
    $nombre="xxxxx";
    $apellido="xxxxx";
    $tel="xxxx-xxxx";
    $mail="xxxx@xxxx.com";
    $mail1="xxxx@xxxx.com";
    
    
   
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id= $_GET['id'];
        echo $id;
        $nuevaconexion= new conectarDB ();

        $consulta= "SELECT * FROM contactos WHERE ID_contactos='$id'" ;
                
        $conexion =$nuevaconexion->conectar();
                
        $query = mysqli_query($conexion,$consulta);
                
        while ($filas=$listado=mysqli_fetch_array($query)){
            $nombre=$filas['nombre'];
            $apellido=$filas['apellido'];
            $tel=$filas['telefono'];
            $mail=$filas['mail'];
            $pais_O=$filas['pais_O'];
            $provincia_O=$filas['provincia_O'];
            $pais_D=$filas['pais_D'];
            $provincia_D=$filas['provincia_D'];
            
            
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $tel=$_POST['telefono'];
        $mail=$_POST['mail'];
        $pais_O=$_POST['pais_O'];
        $provincia_O=$_POST['provincia_O'];
        $pais_D=$_POST['pais_D'];
        $provincia_D=$_POST['provincia_D'];
        
        
        $nombreedit=strtolower($_POST['nombreedit']);
        $apellidoedit=strtolower($_POST['apellidoedit']);
        $teledit=$_POST['telefonoedit'];
        $mailedit=strtolower($_POST['mailedit']);
        $pais_Oedit=$_POST['pais_Oedit'];
        $provincia_Oedit=$_POST['provincia_Oedit'];
        $pais_Dedit=$_POST['pais_Dedit'];
        $provincia_Dedit=$_POST['provincia_Dedit'];
        
        if (!filter_var($mailedit, FILTER_VALIDATE_EMAIL)) {
            echo("-");
            ?>
            <script>
                 
                alertify.set('notifier','position', 'top-left');
                alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">DEBE INGRESAR UN MAIL VALIDO <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
            </script>
            <?php
        }else{
            $nuevaconexion= new conectarDB ();
    
            $conexion =$nuevaconexion->conectar();

            $consulta1="UPDATE `contactos` SET `nombre` = '$nombreedit', `apellido` = '$apellidoedit', `telefono` = $teledit, `mail` = '$mailedit', `pais_O` = '$pais_Oedit', `provincia_O` = '$provincia_Oedit', `pais_D` = '$pais_Dedit', `provincia_D` = '$provincia_Dedit' WHERE `contactos`.`ID_contactos` = $id; ";

            $query = mysqli_query($conexion,$consulta1);
            echo("-");
            ?>
            <script>
            
                alertify.set('notifier','position', 'top-left');
                //.ajs-message.ajs-custom { color: #31708f;  background-color: #d9edf7;  border-color: #31708f; }
                var duration = 5;
                alertify.notify('REGISTRO EDITADO CON EXITO.', 'custom', 2, function(){console.log('dismissed');});
                var msg = alertify.message('<p class="alert alert-success p-3">VOLVIENDO EN:<b>'+ duration +' segundos</b>.</p>', 5, function(){ clearInterval(interval);});
                var interval = setInterval(function(){
                    msg.setContent('<p class="alert alert-success p-3 ">VOLVIENDO EN:<b> '+(--duration)+' segundos.</b></p>');
                },1000);
            </script>
                    
            <?php
            header("refresh:5;url=listarcontactos.php");
            ?>
            <div class="text-center 100vh" style="margin-top:25%;">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <?php
            die();
        }

    }
    // cierra la conexion a la base de datos
    $query=null;
?>

    <body onload="TiempoActividad()">
        <div class="container">
            <?php include './components/nav.php';?>
            <?php include './components/menu.php';?>
            
            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Administrar Contactos</h3>
            <p class="tituloPrincipal text-center phone1 text-success" style="font-size:2vw;"><?php echo $ustedes;  ?></p>
            <h3 class="tituloPrincipal text-center phone" style="font-size:11vw;">Administrar Contactos</h3>
            <p class="tituloPrincipal text-center phone text-success" style="font-size:6vw;"><?php echo $ustedes;  ?></p>
            <hr width=50%>

                <!--FORM ----------------------------------------------- -->
            <div class="d-flex justify-content-center">
                <form class="col-md-8 col-xs-12 bg-light p-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombreedit" value="<?php echo ucfirst($nombre)?>" required autofocus>
                            <!-- esto me sirve para comprar los nombres -->
                            <input type="text" class="form-control font-weight-bold" placeholder="Nombre" name="nombre" value="<?php echo $nombre?>" hidden>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Apellido</label>
                            <input type="text" class="form-control" placeholder="Apellido" name="apellidoedit" value="<?php echo ucfirst($apellido)?>" required>
                            <!-- esto me sirve para comprar los apellidos -->
                            <input type="text" class="form-control font-weight-bold" placeholder="apellido" name="apellido" value="<?php echo $apellido?>" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Telefono</label>
                            <input type="text" class="form-control" placeholder="telefono" name="telefonoedit" value="<?php echo $tel?>" required>
                            <!-- esto me sirve para comprar telefono -->
                            <input type="text" class="form-control font-weight-bold" placeholder="telefono" name="telefono" value="<?php echo $tel?>" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="mail" class="form-control" id="inputAddress" placeholder="ejemplo: xxx@xxx" name="mailedit" value="<?php echo ucfirst($mail)?>" required>
                        <!-- esto me sirve para comprar los mails -->
                        <input type="text" class="form-control font-weight-bold" placeholder="mail" name="mail" value="<?php echo $mail?>" hidden>
                        <!-- <span class="text-danger"><small><?php //echo $errormaildist; ?></small></span> -->
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Pais Origen</label>
                            <select id="inputState" class="form-control" name="pais_Oedit" value="<?php echo ucfirst($pais_O)?>">
                                <option>Argentina</option>
                                <option selected><?php echo ucfirst($pais_D)?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Provincia Origen</label>
                            <select id="inputState" class="form-control" name="provincia_Oedit">
                                <option>Buenos Aires</option>
                                <option>Cordoba</option>
                                <option>Santa Fe</option>
                                <option>Formosa</option>
                                <option>Tucuman</option>
                                <option>Misiones</option>
                                <option>Santa Cruz</option>
                                <option>Salta</option>
                                <option>Jujuy</option>
                                <option selected><?php echo ucfirst($provincia_O)?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Pais Destino</label>
                            <select id="inputState" class="form-control" name="pais_Dedit">
                                <option>Argentina</option>
                                <option selected><?php echo ucfirst($pais_D)?></option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Provincia destino</label>
                            <select id="inputState" class="form-control" name="provincia_Dedit">
                                <option>Buenos Aires</option>
                                <option>Cordoba</option>
                                <option>Santa Fe</option>
                                <option>Formosa</option>
                                <option>Tucuman</option>
                                <option>Misiones</option>
                                <option>Santa Cruz</option>
                                <option>Salta</option>
                                <option>Jujuy</option>
                                <option selected><?php echo ucfirst($provincia_D)?></option>
                            </select>
                        </div>
                    </div>
                    <!-- hidden -->
                    <div class="form-row" hidden>
                        <div class="form-group col-md-6">
                            <label for="inputState">Pais Origen</label>
                            <select id="inputState" class="form-control" name="pais_O" value="<?php echo ucfirst($pais_O)?>">
                                <option>Argentina</option>
                                <option selected><?php echo ucfirst($pais_D)?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Provincia Origen</label>
                            <select id="inputState" class="form-control" name="provincia_O">
                                <option>Buenos Aires</option>
                                <option>Cordoba</option>
                                <option>Santa Fe</option>
                                <option>Formosa</option>
                                <option>Tucuman</option>
                                <option>Misiones</option>
                                <option>Santa Cruz</option>
                                <option>Salta</option>
                                <option>Jujuy</option>
                                <option selected><?php echo ucfirst($provincia_O)?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row" hidden>
                        <div class="form-group col-md-6">
                            <label for="inputState">Pais Destino</label>
                            <select id="inputState" class="form-control" name="pais_D">
                                <option>Argentina</option>
                                <option selected><?php echo ucfirst($pais_D)?></option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Provincia destino</label>
                            <select id="inputState" class="form-control" name="provincia_D">
                                <option>Buenos Aires</option>
                                <option>Cordoba</option>
                                <option>Santa Fe</option>
                                <option>Formosa</option>
                                <option>Tucuman</option>
                                <option>Misiones</option>
                                <option>Santa Cruz</option>
                                <option>Salta</option>
                                <option>Jujuy</option>
                                <option selected><?php echo ucfirst($provincia_D)?></option>
                            </select>
                        </div>
                    </div>
                    <!-- hidden -->
                    
                    <input type="text" class="form-control font-weight-bold" id="id"  name="id" value="<?php echo $id ?>" hidden>
                    
                    <div class="d-flex justify-content-start">
                    
                        <a href="eliminarcontacto.php?id=<?php echo $id ?>" class="btn btn-danger mr-3 btn-lg mb-5 mt-4" onclick="return confirmacion();">Eliminar</a>
                        <button type="submit" class="btn btn-success mr-3 btn-lg mb-5 mt-4" onclick="return editar();">Editar</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="listarcontactos.php" class="btn btn-primary ml-3 btn-lg mb-5">Volver</a>
                    </div>
                </form>

            </div>

                <!-- ---------------------------------------------------------------------->
            <?php include './components/footer.php';?>
             
        </div>
    </body>    
</html>
