<html>
    <head>
        <link rel="stylesheet" href="../css/style.css">
            <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

        <!-- 
            RTL version
        -->
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
 //include 'conexion.php';

    if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']!=='admin@admin.com' ){
        header("location:login.php");
        die();
    }

    // password aleatorio
    $passrandom="";

    function random_password(){  
        $longitud = 8; // longitud del password  
        $pass = substr(md5(rand()),0,$longitud);  
        return($pass); // devuelve el password   
    }  
    $passrandom=random_password();
    // echo 'hola'.$passrandom;
    

    $errornuevoempleado=$errornuevoempleado1=$errorempleadodist="";
    $errornombre=$errorapellido=$erroremailduplicado="";
    $nuevoempleado=$nombre=$apellido=$nuevopassrandom="";

    
    // verifica si el metodo POST se activo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validacion empleado
        if (!filter_var($_POST["nuevoempleado"], FILTER_VALIDATE_EMAIL)) {
            $errornuevoempleado="Ingrese una direccion válida!";
        }else if(!filter_var($_POST["nuevoempleado1"], FILTER_VALIDATE_EMAIL)){
            $errornuevoempleado1="Ingrese una direccion válida!";
        }else if($_POST["nuevoempleado"]!==$_POST["nuevoempleado1"]){
            $errorempleadodist="Los mails deben ser iguales";
        }else{
            $nuevoempleado=strtolower($_POST["nuevoempleado"]);  
        }
        if(empty($_POST["nombre"])){
            $errornombre="ingrese un nombre";
        }else if(empty($_POST["apellido"])){
            $errorapellido="Ingrese el apellido";
        }else{
            $nombre=strtolower($_POST["nombre"]);
            $apellido=strtolower($_POST["apellido"]);
            $nuevopassrandom=$_POST["nuevopassrandom"];
            $hash= password_hash($nuevopassrandom, PASSWORD_DEFAULT,['cost'=>10]);
            // echo $nombre.$apellido.$nuevopassrandom;

            $nuevaconexion= new conectarDB ();

            $conexion= $nuevaconexion->conectar();
            // comparamos si existen empleados identicos en la base
            $consultamail= "SELECT * FROM administrador_usuarios WHERE mail='$nuevoempleado'" ;

            $query=mysqli_query($conexion,$consultamail);
            // traemos la cantidad de filas que existen en la base con correos identicos al que queremos ingresar
            $numfilas = mysqli_num_rows($query);
             
            // var_dump($numfilas);
            // si el resultado el cero insertamos el nuevo empleado
            if($numfilas==0){

                $consulta= "INSERT INTO `administrador_usuarios` (`ID_empleados`, `nombre`, `apellido`, `mail`, `password`) VALUES (NULL, '$nombre', '$apellido', '$nuevoempleado', '$hash');" ;

                if (mysqli_query($conexion,$consulta)) {
                    echo("-");
                    ?>
                    <script>
                   
                        alertify.set('notifier','position', 'top-left');
                        //.ajs-message.ajs-custom { color: #31708f;  background-color: #d9edf7;  border-color: #31708f; }
                        var duration = 5;
                        alertify.notify('REGISTRO EXITOSO.', 'custom', 2, function(){console.log('dismissed');});
                        var msg = alertify.message('<p class="alert alert-success p-3">Enviando Correo en: <b>'+ duration +' segundos.</b></p>', 5, function(){ clearInterval(interval);});
                        var interval = setInterval(function(){
                            msg.setContent('<p class="alert alert-success p-3"><i class="fa fa-envelope" aria-hidden="true"></i>Enviando correo: <b>'+(--duration)+' segundos.</b></p>');
                        },1000);
                    </script>
                    <?php
                    // ACA DEBERIA ENVIAR UN MAIL CON LOS DATOS DE empleado Y CONTASEÑA
                    // PENDIENTE SI TENGO TIEMPO INVESTIGAR

                    

                    // Enviarlo
                    $to = $nuevoempleado; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                    $email_subject = "Se ha dado de alta como empleado en TURISMO CLUB";
                    $email_body = "A continuacion se encuentra su usuario y contraseña:\n\n"."Aquí están los detalles::\n\nUsuario: $nuevoempleado\n\ncontraseña: $nuevopassrandom\n\nRecomendacion:\nCambie su contraseña cuando inicie sesion por primera vez\n\nBienvenido!!!!\n\nhttps://portillonancy.com/ProyectoFinalCAC2/login.php";
                    $headers = "From: noreply@turismoclub.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                    // $headers .= "Reply-To: $email_address";   
                    mail($to,$email_subject,$email_body,$headers);

                    

                    
                } else {
                    echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
                }
            //si no se debe escoger un nuevo empleado
            }else{
                echo("-");
                    ?>
                    <script>
                        alertify.set('notifier','position', 'top-left'); 
                        alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">EL USUARIO INGRESADO YA EXISTE <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
                    </script>
                    <?php    
            }
            
             // cierra la conexion a la base de datos
             $conexion=null;

         }

    }

   
        
?>
    <div class="d-flex justify-content-center">
        <form class="col-md-8 col-xs-12 bg-light p-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" autofocus required>
                    <span class="text-danger"><small><?php echo $errornombre; ?></small></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                    <span class="text-danger"><small><?php echo $errorapellido; ?></small></span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Email</label>
                <input type="mail" class="form-control" id="inputAddress" placeholder="ejemplo: xxx@admin.com" name="nuevoempleado" required>
                <span class="text-danger"><small><?php echo $errornuevoempleado; ?></small></span>
                <span class="text-danger"><small><?php echo $errorempleadodist; ?></small></span>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Reingrese Email</label>
                <input type="mail" class="form-control" id="inputAddress2" placeholder="ejemplo: xxx@admin.com" name="nuevoempleado1" required>
                <span class="text-danger"><small><?php echo $errornuevoempleado1; ?></small></span>
                <span class="text-danger"><small><?php echo $errorempleadodist; ?></small></span>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Generar Password</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Password" value="<?php echo $passrandom?>" name="nuevopassrandom">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-random" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg mb-5">Enviar</button>
            </div>
        </form>
    </div>
</html>