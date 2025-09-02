<?php

$accion   = $_REQUEST['accion'];

if($accion=='adjuntos'){

if (isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
	$file =      pathinfo($archivo['name'], PATHINFO_FILENAME); 
	$time = time();
    $nombre = "{$file}_$time.$extension";
    if (move_uploaded_file($archivo['tmp_name'], "archivos_subidos/$nombre")) {
        echo $nombre;
    } else {
        echo 0;
    }
}

}



?>
