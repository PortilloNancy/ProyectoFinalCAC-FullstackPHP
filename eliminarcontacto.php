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
    <body>
        
        <div class="text-center 100vh" style="margin-top:25%;">
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </body>
    <?php
 
//  include 'eliminarempleado.php';

    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
        die();
    }else{
        $ustedes=$_SESSION['login_user'];
       
    }
    
   
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        $id= $_GET['id'];
        
        $nuevaconexion= new conectarDB ();

        $conexion =$nuevaconexion->conectar();

        $consulta="DELETE FROM `contactos` WHERE `contactos`.`ID_contactos` = '$id'" ;
        
        $query = mysqli_query($conexion,$consulta);
        echo("-");
        ?>
        <script>
        
            alertify.set('notifier','position', 'top-left');
           
            var duration = 5;
            alertify.notify('REGISTRO ELIMINADO.', 'custom', 2, function(){console.log('dismissed');});
            var msg = alertify.message('<p class="alert alert-success p-3">VOLVIENDO EN: <b>'+ duration +' segundos.</b></p>', 5, function(){ clearInterval(interval);});
            var interval = setInterval(function(){
                msg.setContent('<p class="alert alert-success p-3">VOLVIENDO EN: <b>'+(--duration)+' segundos.</b></p>');
            },1000);
        </script>
        <?php
        header("refresh:3;url=listarcontactos.php");
        die();
    }
    // cierra la conexion a la base de datos
    $query=null;
?>
    
    
</html>
