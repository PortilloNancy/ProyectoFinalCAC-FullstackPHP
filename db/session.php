<?php
session_start();
include 'conexion.php';

    $erroremail="";
    $empleado=$pass="";
    $empleadobase=$passbase="";
    $accesodenegado="";
    $conexion="";

        // verifica si el metodo POST se activo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // validacion empleado
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $erroremail="Ingrese una direccion válida!";
            ?>
            <script>
                alertify.set('notifier','position', 'top-left');
                alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">INGRESE UN MAIL VALIDO <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
            </script>
            <?php
        }else{
            $empleado=strtolower($_POST["email"]);
            $pass=$_POST["pass"];
            
        // conecta a la base y realizar la consulta
            $nuevaconexion= new conectarDB ();

            $consulta= "SELECT * FROM administrador_usuarios WHERE mail='$empleado'" ;
            
            $conexion =$nuevaconexion->conectar();
            
            $query = mysqli_query($conexion,$consulta);
            
            while ($filas=$listado=mysqli_fetch_array($query)){
                $empleadobase=$filas['mail'];
                $passbase=$filas['password'];
                $idbase=$filas['ID_empleados'];
                

            }
            
                // compara los datos de la base y los ingresados

            if($empleado===$empleadobase && password_verify($pass,$passbase)){
                if($empleado==='admin@admin.com'){
                    // establece la sesion iniciada
                    $_SESSION['login_user'] = $empleado;
                    $_SESSION['id_user'] = $idbase;
                // redirecciona a la pagina de administracion
                    // header("location: admin.php?id=$idbase");
                    header("location: admin.php");
                    die();
              
                }else{
                // establece la sesion iniciada
                    $_SESSION['login_user'] = $empleado;
                    $_SESSION['id_user'] = $idbase;
                // redirecciona a la pagina de administracion
                    header("location: empleado.php");
                    die();
               
                }
            }else {
                ?>
                    <script>
                        alertify.set('notifier','position', 'top-left');
                        alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">ERROR EN USUARIO O CONTRASEÑA <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
                        
                    </script>
                <?php
                $accesodenegado="<div class='alert alert-danger justify-content-center' role='alert'><span><center>Error en <b>Usuario</b> o <b>Contraseña</b><i class='fa fa-exclamation-circle ml-3' aria-hidden='true'></i></center></span></div>";
            }
        }
    }
    // cierra la conexion a la base de datos
    $query=null;

?>