<?php


include "mycript.php";
// Como usar las funciones para encriptar y desencriptar.
$dato = "Esta es informaciÃ³n importante";
//Encripta informaciÃ³n:
$dato_encriptado = $encriptar($dato);
//Desencripta informaciÃ³n:
$dato_desencriptado = $desencriptar($dato_encriptado);
echo 'Dato encriptado: '. $dato_encriptado . '<br>';
echo 'Dato desencriptado: '. $dato_desencriptado . '<br>';
echo "IV generado: " . $getIV();


