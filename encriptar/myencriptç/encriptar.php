<?php

//$method = 'aes-256-cbc';
//$clave  = 'Una cadena, muy, sssssssssssss muy lNNNNNNNNN JJJJJJJarga para mejorar la encriptacion';
//$iv = base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length($method)-4));


 function desencriptar($valor,$method,$clave,$iv){
     
    
    return  openssl_decrypt($valor, $method, $clave, false, $iv);
    
 } 
 

 /**
  * Metodo que encripta informacion
  */
 
  function encriptar($valor,$method,$clave,$iv){
    
    
    
    return  openssl_encrypt($valor, $method, $clave, false, $iv);
   
 } 
 
