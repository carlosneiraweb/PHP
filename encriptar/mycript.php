<?php
//https://www.php.net/manual/es/book.openssl.php
////cipher => El cifrado
//openssl_cipher_iv_length => Devuelve la longitud del cipher
//openssl_random_pseudo_bytes => Genera una cadena de bytes pseudo-aleatoria con los 
                //bytes determinados en lenght (25dgtt9)
//IV => Vector de inicialización.Secuencia de valores en buffer
                //Array de una dimensión

//$url = "http://sjssjjdd.whieihehihid.hoihoiwfohwoi.wwwww";
//$en =  base64_encode($url);
//$de = base64_decode($url);
//echo $de;



$clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
//Metodo de encriptaciÃ³n
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
 /*
 Encripta el contenido de la variable, enviada como parametro.
  */
 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };
 /*
 Desencripta el texto recibido
 */
 $desencriptar = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 };
 /*
 Genera un valor para IV
 */
 $getIV = function () use ($method) {
     return base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)));
 };















/*



$clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
//Metodo de encriptaciÃ³n
$method = 'aes-256-cbc';

 $getIV = function () use ($method) {
     
     return openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
 };

$iv = $getIV();
//var_dump(bin2hex($iv));

 $encriptar = function ($valor) use ($method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
 };

 $desencriptar = function ($valor) use ($method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 };
*/ 