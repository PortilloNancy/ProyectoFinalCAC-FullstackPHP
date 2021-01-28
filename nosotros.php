<!DOCTYPE html>
<html>
    <head>
        <title>Nosotros</title>
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
            <h3 class="tituloPrincipal text-center phone1" style="font-size:4vw;">Sobre Nosotros</h3>
            <h3 class="tituloPrincipal text-center phone" style="font-size:11vw;">Sobre Nosotros</h3>
            <hr width=50%>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde inventore fugiat corrupti nostrum doloribus vel quaerat facilis, suscipit id cum natus explicabo quia eum soluta molestias dolore quisquam rem harum.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima quis voluptatibus impedit velit repellendus fugiat vitae sed commodi voluptates assumenda, fuga laudantium sit similique ab mollitia ad facere labore. A.
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In vitae quod veniam molestiae sint. Adipisci, nostrum deserunt dicta aspernatur iste facilis dolorem impedit sit laborum vitae quam consequuntur minus dolorum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. A, recusandae necessitatibus placeat omnis, quisquam at explicabo dolor ipsa cumque vel neque, eaque laboriosam magni enim? A aliquid commodi vitae ipsa?
            </p>
            <div class="d-flex justify-content-center">
            <div class="card-deck mb-5 mt-5">
                <div class="card anchoimgnosotros">
                    <img src="./img/foto1.jpg" class="card-img-top rounded-circle" alt="..." height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <p class="card-text"><small class="text-muted">Last updated 3 mins</small></p>
                    </div>
                </div>
                
                <div class="card anchoimgnosotros">
                    <img src="./img/foto2.jpg" class="card-img-top rounded-circle" alt="..." height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                <!--    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
                        <p class="card-text"><small class="text-muted">Last updated 3 mins</small></p>
                    </div>
                </div>
                <div class="card anchoimgnosotros">
                    <img src="./img/foto3.jpg" class="card-img-top rounded-circle" alt="..." height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->
                        <p class="card-text"><small class="text-muted">Last updated 3 mins</small></p>
                    </div>
                </div>
                <div class="card anchoimgnosotros">
                    <img src="./img/foto4.jpg" class="card-img-top rounded-circle" alt="..." height="200px">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                <!--    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->
                        <p class="card-text"><small class="text-muted">Last updated 3 mins</small></p>
                    </div>
                </div>
</div>
            </div>
            
        <?php include './components/footer.php';?>
        </div>
    </body>    
</html>