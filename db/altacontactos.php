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

        <!-- reCaptchap -->
        <script src="https://www.google.com/recaptcha/api.js?render=clavedesitio"></script>

        <style>.ajs-message.ajs-custom { color: #31708f !important;  background-color: #d9edf7!important;  border-color: #31708f!important;}</style>
    </head>


<?php
    include 'conexion.php';

    $nombre=$apellido=$tel=$mail1=$mail=$pais_O=$provincia_O=$pais_D=$provincia_D="";
    $errormaildist="";
    
    // verifica si el metodo POST se activo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validaciones del form
        if (!filter_var(strtolower($_POST["mail1"]), FILTER_VALIDATE_EMAIL)) {
            $errormail1="Ingrese una direccion válida!";
        }else if(!filter_var(strtolower($_POST["mail2"]), FILTER_VALIDATE_EMAIL)){
            $errormail2="Ingrese una direccion válida!";
        }else if(strtolower($_POST["mail1"])!==strtolower($_POST["mail2"])){
            $errormaildist="<div class='alert alert-danger justify-content-center' role='alert'><span><center>Error: Los <b>Mails</b> deben ser <b>Iguales</b><i class='fa fa-exclamation-circle ml-3' aria-hidden='true'></i></center></span></div>";
        }else if(empty($_POST["nombre"])){
            $errornombre="ingrese un nombre";
        }else if(empty($_POST["apellido"])){
            $errorapellido="Ingrese el apellido";
        }else if(empty($_POST["telefono"])){
            $errortelefono1="Ingrese un telefono";
        }else if(!is_numeric($_POST["telefono"])){
            $errortelefono2="Ingrese un numero de telefono valido";
        }else{
            $mail1=strtolower($_POST["mail1"]);
            $nombre=strtolower($_POST["nombre"]);
            $apellido=strtolower($_POST["apellido"]);
            $tel=$_POST["telefono"];
            $pais_O=$_POST["pais_O"];
            $provincia_O=$_POST["provincia_O"];
            $pais_D=$_POST["pais_D"];
            $provincia_D=$_POST["provincia_D"];
        
            $nuevaconexion= new conectarDB ();

            $conexion= $nuevaconexion->conectar();

            $consulta= "INSERT INTO `contactos` (`ID_contactos`, `nombre`, `apellido`, `telefono`, `mail`, `pais_O`, `provincia_O`, `pais_D`, `provincia_D`) VALUES (NULL, '$nombre', '$apellido', $tel, '$mail1', '$pais_O', '$provincia_O', '$pais_D', '$provincia_D');" ;

            if (mysqli_query($conexion,$consulta)) {
                echo("-");
                ?>
                <script>
                    alertify.alert('<h1 class="bg-ligth tituloPrincipal text-center rounded p-4">Registro Exitoso<h1>', '<p class="text-center">En breve un asesor se pondra en contacto con usted</p>\n<p class="text-right"><b>Muchas Gracias.</b></p>', function(){ window.location="index.php";; });
                    //alertify.alert('<h1 class="bg-ligth tituloPrincipal text-center rounded p-4">Registro Exitoso<h1>', '<p class="text-center">En breve un asesor se pondra en contacto con usted</p>\n<p class="text-right"><b>Muchas Gracias.</b></p>');
                    // alertify.set('notifier','position', 'top-left');
                    
                    // alertify.notify('REGISTRO EXITOSO; En breve un asesor se pondra en contacto con usted\nMuchas Gracias.', 'custom', 2, function(){console.log('dismissed');});
                  
                </script>
                <?php
                
            } else {
                echo "Error: " . $consulta . "<br>" . mysqli_error($conexion);
            }
        
            // cierra la conexion a la base de datos
            $conexion=null;
        }
    }      
?>
    
</html>