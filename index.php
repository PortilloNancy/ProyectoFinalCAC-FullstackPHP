<!DOCTYPE html>
<html>
    <head>
        <title>Inicio</title>
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
        <!-- reCaptchap -->
        <script src="https://www.google.com/recaptcha/api.js?render=6LfdzxAaAAAAAMUf-D9pXxcT-TsKfZyWoMe0stUT"></script>
        <script src="./js/funcionconfirm.js"></script>
        <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LfdzxAaAAAAAMUf-D9pXxcT-TsKfZyWoMe0stUT', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
        </script>

    </head>
    <body onload="TiempoActividad()">
        <div class="container">
            
            <?php include './components/nav.php';
            include './db/subscribe.php';
            ?>
            <div class="phone1">
                <h1 class="tituloPrincipal" style="font-size:9vw;"><img src="./img/logo.png" width=20%>Turismo club</h1>
            </div>
            <div class="phone">
                <h1 class="tituloPrincipal" style="font-size:11vw;"><img src="./img/logo.png" width=20%>Turismo club</h1>
            </div>
            <hr width=50%>
            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Bienvenidos</h3>
            <h3 class="tituloPrincipal text-center phone" style="font-size:8vw;">Bienvenidos</h3>
            <hr width=50%>
            <p class="text-center">Servicios excusivos <b>ALL INCLUSIVE</b></p>
            <?php include './components/header.php';?>
            <hr width=50%>
            <h3 class="tituloPrincipal text-center phone1" style="font-size:5vw;">Promos Especiales</h3>
            <h3 class="tituloPrincipal text-center phone" style="font-size:8vw;">Promos Especiales</h3>
            <hr width=50%>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-4">
                    <div class="card">
                        <img src="./img/Calafate.jpg" class="card-img-top alturacardprincipal" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <input class= "btn btn-success btn-lg" type="submit" onClick="location.href='./contactos.php'" name="submit" value="LO QUIERO!">
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="./img/bariloche.jpg" class="card-img-top alturacardprincipal" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <input class= "btn btn-success btn-lg" type="submit" onClick="location.href='./contactos.php'" name="submit" value="LO QUIERO!">
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="./img/Jujuy.jpg" class="card-img-top alturacardprincipal" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <input class= "btn btn-success btn-lg" type="submit" onClick="location.href='./contactos.php'" name="submit" value="LO QUIERO!">
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card">
                        <img src="./img/sanLuis.jpg" class="card-img-top alturacardprincipal" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                        <input class= "btn btn-success btn-lg" type="submit" onClick="location.href='./contactos.php'" name="submit" value="LO QUIERO!">
                    </div>
                </div>
            </div>
            <hr width=50%>
            <h3 class="tituloPrincipal text-center phone1" style="font-size:5vw;">subscribe</h3>
            <h3 class="tituloPrincipal text-center phone" style="font-size:8vw;">subscribe</h3>
            <hr width=50%>
            <div class="bg-info p-4 mb-3" id="subscribe">
                <p>Ingrese su correo electronico para recibir las ultimas promociones y novedades</p>
                <?php // Check if form was submitted:
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

                        // Build POST request:
                        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                        $recaptcha_secret = '6LfdzxAaAAAAAJp1qRNgPy5sQCoXOFvYEXkZbeJc';
                        $recaptcha_response = $_POST['recaptcha_response'];

                        // Make and decode POST request:
                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                        $recaptcha = json_decode($recaptcha);

                        // Take action based on the score returned:
                        if ($recaptcha->score >= 0.5) {
                            // echo $recaptcha->score;
                            // echo 'Verified - send email';
                        } else {
                            // echo $recaptcha->score;
                            // echo 'Not verified - show form error';
                        }

                    } 
                ?>
                <form class="form-inline d-flex justify-content-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mx-sm-3 mb-2"> 
                        <input class="form-control-lg" type="email" placeholder="xxx@xxx" name="mail" required>
                        
                        <button class="btn btn-primary btn-lg border border-dark" type="submit">subscribeme</button>

                        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    </div>  
                </form>
            </div>
            <?php include './components/footer.php';?>
            <script> alertify.alert().set({'startMaximized':true, 'message':'<h1 class="text-center"><img src="./img/codoacodo.png" width="150vw"><b>Trabajo Practico Final CODO A CODO:</b></h1><br>'+
            '<div class="d-flex justify-content-center"><div class="col-lg-5 col-sm-12 bg-warning p-3 rounded"><p>Como parte de proyecto final decidi hacer una pagina para una empresa de turismo ALL INCLUSIVE.<p><br>'+
            '<p>Cuenta con 4 secciones:<br><ul><li>CONTACTO</li><li>NOSOTROS</li><li>SERVICIOS</li><li>ADMIN</li></ul> aparte del INDEX PRINCIPAL. Cuenta tambien con la posibilidad de subscribirse en el caso de querer recibir promociones futuras'+
            ' solo ingresando su correo electronico o solicitando un asesor para consultas mas personalizadas en la seccion de contacto completando un formulario.</p>'+
            '<p>En la seccion ADMIN permite ser administrada por un gerente y un sin fin de empleados.<p>'+
            ' El gerente es el administrador general el cual atravez de un login puede administrar empleados (altas, bajas y ediciones), administrar los subscriptores (bajas) y los contactos (bajas y ediciones).'+
            'Cada empleado al ser dado de alta recibe en su correo un usuario (debe ser su correo electronico) y una contraseña (generada por un <i>random</i> la cual puede cambiar cuando quiera desde su usuario) para poder logearse y administrar los subscriptores (bajas) y los contactos(bajas y ediciones) asi '+
            'poder complir con su labor de contactarse con los futuros clientes.</p>'+
            '<p>Esta fue una breve explicacion de las funcionalidades de la pagina</p><br><p>Para poder probarlas ingrese como administrador principal, (el usuario y contraseña seran enviados por mail al profesor) '+
            'desde alli puede ver todas las funciones y loguearse como empleado. Al loguearse a su casilla de mail le llegara el usuario y clave para ingresar como empleado para que pueda ver luego como funcionaria desde el usuario empleado.</p><br>'+
            '<p>Ahora pasando a la parte tecnica fue diseñada casi en su totalidad con <b>PHP + bootstrap</b> y un poco de <b>JAVASCRIPT + JQUERY</b> para las funcionalidades dinamicas.<p/><br>'+
            '<p>Creo que tengo mucho mas para agregarle para que sea super funcional que con el tiempo ire implemantado.</p><br>'+
            '<p>Espero alcanzar las expectativas del practico final y agradecer la posibilidad de haber sido parte de este curso ya que aprendi mucho y me siento muy feliz de haber participado!</p><br>'+
            '<p><b>MUCHAS GRACIAS</b></p><br><br><br><p class="text-success bg-light font-weight-bold text-center p-1"><i class="fa fa-arrow-left" aria-hidden="true"></i>    PRESIONAR <i>OK</i> PARA CONTINUAR</p><div><div>'}).show(); </script>
        </div>
    </body>    
</html>


