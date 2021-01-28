<?php
session_start();
    
    // sale de la sesion iniciada y redirecciona al login.php
    if(session_destroy()) {
        header("Location: login.php");
        die();
    }
?>