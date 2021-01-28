<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin empleados</title>
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
        <script src="./js/funcionconfirm.js"></script>
    </head>
   

    <?php  
    
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

    <body onload="TiempoActividad()">
        <div class="container">
            <?php include './components/nav.php'; ?>
            <?php include './components/menu.php'; ?>
           
            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Administrador de empleados</h3>
            <p class="tituloPrincipal text-center phone1 text-success" style="font-size:2vw;"><?php echo $ustedes;  ?></p>
            <h3 class="tituloPrincipal text-center phone" style="font-size:11vw;">Administrador de empleados:</h3>
            <p class="tituloPrincipal text-center phone text-success" style="font-size:6vw;"><?php echo $ustedes;  ?></p>
            <hr width=50%>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="home" aria-selected="true">Listar empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#home" role="tab" aria-controls="contact" aria-selected="false">Alta empleados</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab"><?php include './db/listarempleados.php';?></div>
                <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab"><?php include './db/altaempleados.php';?></div>
                
            </div>
            <?php include './components/footer.php';?>
        </div>
    </body>    
</html>

  