<?php
include './db/session.php';
   // verifica si hay sesiones iniciadas si no redirecciona a login.php
    if(!isset($_SESSION['login_user'])|| $_SESSION['login_user']!=='admin@admin.com' ){
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
        <title>Admin</title>
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
        <script src="./js/funcionconfirm.js"></script>

    </head>
   
    <body onload="TiempoActividad()">
        <div class="container">

            <?php include './components/nav.php';?>

            <div class="row">
                <div class="col">

                    <?php include './components/menu.php' ?>

                </div>
                <div class="col">
                    <div class="text-right">
                        <a class="btn btn-outline-secondary m-3" href="./password.php"><img src="./img/key.png">Cambiar</a>
                    </div>
                </div>
            </div>

            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Usted Inicio Sesion como: </h3>
            <p class="tituloPrincipal text-center phone1 text-success" style="font-size:2vw;"><?php echo $ustedes;  ?></p>
            <h3 class="tituloPrincipal text-center phone" style="font-size:11vw;">Usted Inicio Sesion como: </h3>
            <p class="tituloPrincipal text-center phone text-success" style="font-size:6vw;"><?php echo $ustedes;  ?></p>
            <hr width=50%>
            
            <?php include './components/header.php'?>
            <?php include './components/footer.php';?>
            
        </div>

    </body>
   
</html>