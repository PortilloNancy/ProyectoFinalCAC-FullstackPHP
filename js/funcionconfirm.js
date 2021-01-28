
function confirmacion(){
    var respuesta= confirm('Esta seguro que desea ELIMINAR el registro?');

    if(respuesta){
        return true;
    }else{
        return false;
    }
}

function editar(){
    var respuesta= confirm('Esta segur0 que desea EDITAR el registro?');

    if(respuesta){
        return true;
    }else{
        return false;
    }
}

function TiempoActividad(){
    setTimeout("DestruirSesion()", 60000);
}

function DestruirSesion(){
    location.href = "logout.php";
}
