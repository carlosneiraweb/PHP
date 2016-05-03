<?php

/**
 * @author Carlos Neira Sanchez
 * @mail arj.123@hotmail.es
 * @date 19-nov-2015
 * @telefono ""
 * @nameAndExt index.php
 */

$var = 'mundo';

echo 'castellón $var'.'<br>';
echo "hola \t $var.<br>";
echo "Bienvenidos a estos {$var}s".'<br><br>';
echo "Declarar un string con un array.".'<br>';
$miArray['age'] = 34;
echo "MI edad es: ${miArray['age']}".'<br><br>';
echo 'Declaración de variable con operador ternario:'.'<br>';
$num = 20;
echo $miString = ($num > 10) ? 'Gran Número' : 'pequeño número';
#Delimitadores

//heredoc
echo '<br>';
echo '<h3>Delimitador Heredoc, se sustituyen variables. </h3>'.'<br>';
$religion = 'cristiana';

$miString = <<< END_TEXT
         I am $religion,  he cries. \r This happend in 1982.\t Do you remember___? 
END_TEXT;
echo "<pre>$miString</pre>";
echo '--------------'.'<br>';
//nowdoc
echo 'Delimitador nowdoc, no se sustituyen el valor de la variable.'.'<br>';
$comida = 'arroz';
$miComidaFavorita = <<< 'END_TEXT'
        "Mi comida favorita es: " $comida. /v
        ¿Cual es la tuya?."
END_TEXT;
echo "<pre>$miComidaFavorita</pre>".'<br>';
echo '***************************************.<br>';


//PHP trata los string como arrays
echo '<br>';
echo '<h3>PHP trata los string como arrays </h3>'.'<br>';
$texto = 'Esto es una prueba';
$primero = $texto[0];
$ultimo = $texto[strlen($texto) -1]; 
echo $texto.'<br>';
echo "La primera letra es: $primero y la ultima es: $ultimo.<br>";
$texto[strlen($texto)-1] = 'A';
echo $texto.'<br>';
echo '**************************************.<br>';
     
################################ FUNCIONES PARA STRING ########################

echo '<br>';
echo '<h3>STR_WORD_COUNT Indica posicion y extrae elemento de un string.</h3>'.'<br>';
$cadena = 'Esta es una cadena demo';
//Numero de palabras en una cadena 0, 
//devuelve array con las palabras 1, 
//devuelve array asociativo 2
$palabras =  str_word_count($cadena, 2);
foreach ($palabras as $valor => $key){
    echo '$x indica la indice donde empieza cada palabra=> '.$valor.' $y extrae la palabra => ',$key.'<br>';
}
echo '****************************************.<br>';

echo '<h3>Extraer caracteres de una cadena.</h3>';
echo '<br>';
echo $cadena.'<br>';
echo 'Extraigo desde el final: '.substr($cadena, -3).'<br>';
echo 'Digo por donde empezar (3) '. 'y el número de caracteres (6): '.substr($cadena, 3, 6).'<br>';

echo '****************************************.<br>';
echo '<br>';
echo 'La mayoria de esta funciones son sensibles a mayuscaula y minusculas.'.'<br>';
echo 'Hello != hello'.'<br>';
echo 'Existen métodos como no sensbles, strstr() == stristr()'.'<br><br>';

echo '<h3>Saber si un texto esta en una cadena STRSTR, devuelve texto.</h3>'.'<br>';
echo '<br>';
echo $cadena.'<br>';
echo 'El texto buscado es <strong>ade</strong>.Si lo encuentra devuelve de '
. 'esa posición al final de la cadena con false, o desde el principio con true.<br>';
$busq = 'ade';
echo strstr($cadena, $busq, true).'<br>';//True devuelve por delante, False por detras
echo 'Podemos utilizar eln operador ernario'.'<br>';
echo strstr($cadena, 'hola') ? 'si esta' : 'no esta'.'<br>';
echo '****************************************.<br>';

echo '<h3>Saber la posicion de una cadena dentro de otra con STRPOS. Encuentra la´ùltima coincidencia.</h3>'.'<br>';
echo $cadena.'<br>';
$tx = 'de';
echo 'El indice donde <strong>'.$tx.'</strong> aparece es: '.strpos($cadena, $tx, 3).'<br>';//indice donde comenzar
echo ' Para evitar problemas con el indice <strong>0</strong> comprobamos con === <br>';
$tx2 = 'Esta';
echo 'El indice de <strong> '.$tx2.'</strong> es: ';
    if (strpos($cadena, $tx2) === false){
        echo 'No found'.'<br>';
        } else {
        echo (strpos($cadena, $tx2)).'<br>';
    }
echo 'Indicar todas las posiciones de una letra en un string con strpos';
$pos = 0;
while( ($pos = strpos($cadena, 'a', $pos) ) !== false){ //cuando ya no puede asignar mas posiciones sale del string, cuando el string se acaba
    echo 'La letra <strong>a</strong> esta en la posición: '.$pos.'<br>';
    $pos++;
}
echo 'Strrpos encuentra la última coincidencia.'.'<br>';
echo '****************************************.<br>';

echo '<h3>Saber el numero de coincidencias con SUBSTR_COUNT.</h3>'.'<br>';
echo $cadena.'<br>';
echo 'El numero de veces que aparece <strong>a</strong> es: '.substr_count($cadena, 'a').'<br>';
echo '****************************************.<br>';

echo '<h3>Buscar un conjunto de caracteres en una cadena STRPBRK . \'Interesante\'.</h3>'.'<br>';
$correo = "arj.123@hotmail.es";
$prohibidos = "@/.";
echo $correo.'<br>';
echo $prohibidos.'<br>';
echo 'Echo en el texto introducido aparecen: '.strpbrk($correo, $prohibidos).'<br>';
echo 'Ejemplo <br>';
if(strpbrk($correo, $prohibidos)){
    echo 'Lo sentimos no puedes introducir ninguno de estos caracteres: '.$prohibidos.'<br>';
} else {
    echo 'Enviado';
}
echo '****************************************.<br>';

echo '<h3>Reemplazar texto en cadenas.</h3>'.'<br><br>';
echo 'Reemplazar todas las coincidencias con str_replace'.'<br>';
$letras = 'Valencia tierra de sol y playas. Sevilla tierra de calor. Barcelona very like Valencia';
$tabla = array('Valencia', 'Sevilla', 'Barcelona');
$remplazar = array('Madrid', 'Lisboa', 'Coruña');
echo $letras.'<br>';
echo str_replace($tabla, $remplazar, $letras, $num).'<br>';
echo 'Valencia fue reemplazado: '.$num.'<br>';
echo '<br>';

echo '<h3>Reemplazar una parte de una cadena con SUBSTR_REPLACE.</h3>'.'<br>';
$letras2 = 'It was the best of times, it was the worst of times.';
echo $letras2.'<br>';
echo substr_replace($letras2, 'bananas ',11);//Ojo corta la cadena
echo '<br>';
echo substr_replace($letras2, 'bananas ', 11, 5).'<br>';//por donde empezar y numero de caracteres a reemplazar
   
echo '<br>';
echo '<h3>Reemplazar palabras por otras, STRSTR().</h3>'.'<br>';
$traducir = 'Here\'s a little string, Can you read the string?. The string is wonderful.';
echo $traducir.'<br>';
echo strtr($traducir, 'e ', 'I+').'<br>';
$opciones = array('string' => 'cadenas');
echo $traducir.'<br>';
echo strtr($traducir, $opciones).'<br>';
echo '******************************************'.'<br>';

echo '<h3>Mayúsculas y minúsculas.</h3>'.'<br><br>';
echo 'strlower pasa a minusculas y strupper a minusculas.'.'<br>';
echo 'ucfirst() pone a mayuscula la primera letra y lcfirst() pone a minuscula la primera letra.'.'<br>';
echo 'ucwords pone la primera letra de cada palabra.'.'<br>';
echo '******************************************'.'<br>';

echo '<h3>Array explode: Devuelve un array de string , siendo cada uno un substring del parametro.</h3>','<br>';
echo '$datos = "foo:*:1023:1000::/home/foo:/bin/sh"'.'<br>';
$datos = "foo:*:1023:1000::/home/foo:/bin/sh";
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $datos);
echo $user.'<br>'; 
echo $pass.'<br>';
echo $uid.'<br>';
echo $gid.'<br>';
echo $gecos.'<br>';
echo $home.'<br>';
echo '<br>';
$str = 'uno|dos|tres|cuatro';
echo $str.'<br>';
echo 'Límite positivo'.'<br>';
print_r(explode('|', $str, 3));
echo '<br>';
echo 'Limte negativo (desde PHP 5.1)'.'<br>';
print_r(explode('|', $str, -2));
echo '<br>';
echo '<h5>Metodo opuesto Implode, une los elementos de un array y los convierte en string.</h5>'.'<br>';
$miArray = array('uno', 'dos', 'tres');
echo var_dump($miArray).'<br>';
echo implode(",", $miArray);
echo '******************************************'.'<br>';

echo '<h3>HTLMENTITIES evitamos que se ejecute código javascript o html.El archivo PHP tiene que estar códificado en UTF-8.</h3>';
echo '<p>Esta función es idéntica a htmlspecialchars() en todos los aspectos, excepto que con htmlentities(), todos los '.'<br>'.
 'caracteres que tienen su equivalente HTML son convertidos a estas entidades. ';
$url = '<p><a href="http://google.es">Enlace</a></p>';
echo $url;
$nuevo = htmlentities($url, ENT_QUOTES, 'UTF-8');
echo $nuevo.'<br>';
echo '<br>';
echo 'HTML_ENTITY_DECODE funciona  a la inversa.'.'<br>';
echo $nuevo.'<br>';
echo html_entity_decode($nuevo);
echo '<br>';
$script =  '<script>alert("hola");</script>';
$lanzar = htmlentities($script, ENT_QUOTES, 'UTF-8');
echo $lanzar;


echo'<h3>HTMLSPECIALCHARS, recomendado si se usa el encoding UTF-8</h3>';
echo '<p>Si el string de entrada pasado a esta función y el documento final comparten el mismo conjunto de carcteres,<br>'.
 'esta función es suficiente para preparar entradas para su inclusión en la mayoría de los contextos de un documento HTML</p>'.'<br>';
$url = '<p><a href="http://google.es">Enlace</a></p>';
echo 'enlace: '.$url;
$nuevo = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
echo $nuevo.'<br>';
$script2 =  '<script>alert("hola");</script>';
$lanzar2 = htmlspecialchars($script, ENT_QUOTES, 'UTF-8');
echo $lanzar2.'<br>';

$nuevo = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $nuevo.'<br>'; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;



echo '<h3>Formato con expedificadores de tipo %D.</h3> '.'<br>';
echo 'Con printf solo imprimimos, con sprintf podemos guardar en una variable'.'<BR>';
echo 'Con fprintf podemos imprimirlo en un archivo abierto.'.'<br>';
$number = 123.45;
echo 'Vamos a formatear el número: '.$number.'<br>';
printf("Binary: %b<br />", $number);
printf("Character: %c<br />", $number);
printf("Decimal: %d<br />", $number);
printf("Scientific: %e<br />", $number);
printf("Float: %f<br />", $number);
printf("Octal: %o<br />", $number);
printf("String: %s<br />", $number);
printf("Hex (lower case: %x<br />", $number);
printf("Hex (upper case: %X<br />", $number);
echo '<br>';
echo 'Poner el simbolo siempre a los números.'.'<br>';
printf("%+d<br />", 123);//Obligamos a poner simbolo delante los números positivos
printf("%+d<br />", -123);
echo '<br>';
echo 'Rellenar tanto por derecha como por izquierda.'.'<br>';
printf("%06d<br />", 123);//Rellena con 0,6 digitos
printf("%06d<br />", 123456);
printf("%06d<br />", 123456789); //Nunca trunca resultado
echo 'Relenar cadenas con str_pad().'.'<br>';
echo 'str_pad("Hello, world!", 20)'.'<br>';
echo str_pad('Hello, world!', 20);
echo '<br>';
echo 'La longitud ahora de Hello, world! es: '.strlen(str_pad('Hello, world!', 20));
echo '<br>';
echo str_pad('Hello, world!', 20, "*");
echo '<br>';
echo 'Existen tambien: str_pad_left y str_pad_both.'.'<br>';
echo '<br>';
echo 'Especificar precisión númerica'.'<br>';
echo 'Número 123.456789000';
printf('%.2f<br />', 123.456789000);
printf('%.0f<br />', 123.456789000);
printf('%.10f<br />', 123.456789000);
echo'<br>';
echo 'Intercambiar argumentos de un archivo de texto.'.'<br>';
$mailbox = 'Inbox';
$totalMessages = 36;
$unredMessages = 4;
printf(file_get_contents("./documento.txt"), $unredMessages, $mailbox, $totalMessages).'<br>';
echo '******************************************'.'<br>';

echo 'Recortar cadena con trim(),Itrim(),rtrim()'.'<br>';
echo 'trim() Elimina el espacio en blanco del principio y fin.'.'<br>';
echo 'ltrim() Elimina el espacio en blanco solo al principio.'.'<br>';
echo 'rtrim() Elimina el espacio en blanco solo al final.'.'<br>';
echo '******************************************'.'<br>';

echo '<h3>Agrupar líneas de texto con wordwap().</h3>'.'<br>';
$string = 'But think not that this famous town has only harpooneers,'
        . 'cannibals, and bumpkins to show her visitors. Not at all. '
        . 'Still New Bedford is a queer place. Had it not been for us whalemen, '
        . 'that tract of land.';
echo $string;
echo '<br>';
echo 'Pongo que la  lineas no superen los 20 caracteres.'.'<br>';
echo wordwrap($string, 20, '<br />', true).'<br>';
echo '******************************************'.'<br>';

echo '<h3>Formatear números con number_format().</h3>'.'<br>';
echo 'Número a formatear: 1234567.89.'.'<br>';
$nu = 1234567.89;
echo 'Número formateado: '.number_format($nu).'<br>';
echo 'Limitandole el número de decimales a 1: '.number_format($nu, 1).'<br>';
echo 'Formateandolo al estilo Frances: '.number_format($num, 2, ",", " ").'<br>';
