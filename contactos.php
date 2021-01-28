<!DOCTYPE html>
<html>
    <head>
        <title>Contacto</title>
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
                    include './db/altacontactos.php';
            ?>
            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Contactanos</h3>
            <h3 class="tituloPrincipal text-center phone" style="font-size:11vw;">Contactanos</h3>
            <hr width=50%>
            <div class="alert alert-info" role="alert">
            <p class="text-center">Ingresa tus datos en el formulario y un asesor se pondra en contacto con vos para ofrecerte el paquete que mas se adapte avos y tu familia.</p>
            </div>
            <hr width=50%>
            <div class="d-flex justify-content-center">
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
                <form class="col-md-8 col-xs-12 bg-light p-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Apellido</label>
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Telefono</label>
                            <input type="text" class="form-control" placeholder="telefono" name="telefono" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="mail" class="form-control" id="inputAddress" placeholder="ejemplo: xxx@xxx" name="mail1" required>
                        <span class="text-danger"><small><?php echo $errormaildist; ?></small></span>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Reingrese Email</label>
                        <input type="mail" class="form-control" id="inputAddress2" placeholder="ejemplo: xxx@xxx" name="mail2" required>
                        <span class="text-danger"><small><?php echo $errormaildist; ?></small></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Pais Origen</label>
                            <select id="inputState" class="form-control" name="pais_O">
                                <option selected>Argentina</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Provincia Origen</label>
                            <select id="inputState" class="form-control" name="provincia_O">
                                <option selected>Buenos Aires</option>
                                <option>Cordoba</option>
                                <option>Santa Fe</option>
                                <option>Formosa</option>
                                <option>Tucuman</option>
                                <option>Misiones</option>
                                <option>Santa Cruz</option>
                                <option>Salta</option>
                                <option>Jujuy</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState">Pais Destino</label>
                            <select id="inputState" class="form-control" name="pais_D">
                                <option selected>Argentina</option>
                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Provincia destino</label>
                            <select id="inputState" class="form-control" name="provincia_D">
                                <option selected>Buenos Aires</option>
                                <option>Cordoba</option>
                                <option>Santa Fe</option>
                                <option>Formosa</option>
                                <option>Tucuman</option>
                                <option>Misiones</option>
                                <option>Santa Cruz</option>
                                <option>Salta</option>
                                <option>Jujuy</option>
                            </select>
                        </div>
                    </div>

                    <!-- implementare lueo con mas tiempo -->

                    <!-- <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            <small>Quiero recibir informacion de nuevos destinos y promociones.</small>
                        </label>
                        </div>
                    </div> -->
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg mb-5">Enviar</button>
                    </div>
                </form>
            </div>
        <?php include './components/footer.php';?>
        </div>
    </body>    
</html>