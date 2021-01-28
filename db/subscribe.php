<html>
    <head>
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
include 'conexion.php';

// verifica si el metodo POST se activo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["mail"])||!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        ?>
        <script>
            alertify.set('notifier','position', 'top-left'); 
            
            alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">error de registro, EL CORREO INGRESADO ES INVALIDO! <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
            
        </script>
        <?php 

    }else{
        $subscribe=strtolower($_POST["mail"]);

        $nuevaconexion= new conectarDB ();

        $conexion= $nuevaconexion->conectar();
            // comparamos si existen empleados identicos en la base
        $consultamail= "SELECT * FROM subscribe WHERE mail='$subscribe'" ;

        $query=mysqli_query($conexion,$consultamail);
            // traemos la cantidad de filas que existen en la base con correos identicos al que queremos ingresar
        $numfilas = mysqli_num_rows($query);
             
            // var_dump($numfilas);
            // si el resultado el cero insertamos el nuevo empleado
        if($numfilas==0){
            $consulta= "INSERT INTO `subscribe` (`ID_subscribe`, `mail`) VALUES (NULL, '$subscribe'); " ;
            if (mysqli_query($conexion,$consulta)) {
                ?>
                <script>
                    alertify.set('notifier','position', 'top-left');
                    alertify.notify('REGISTRO EXITOSO.', 'custom', 2, function(){console.log('dismissed');});
                </script>
                <?php
                
            }else{
                ?>
                <script>
                    alertify.set('notifier','position', 'top-left'); 
                    
                    alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">error de registro, vuelva a intentar <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
                    
                </script>
                <?php 
                
            }
        }else{
            ?>
            <script>
                alertify.set('notifier','position', 'top-left'); 
                
                alertify.error('<p class="text-dark font-weight-bold" style="text-shadow:none;">usted ya se encuentra registrado <i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>');
                
            </script>
            <?php 
            
        }
    }
}
?>
</html>