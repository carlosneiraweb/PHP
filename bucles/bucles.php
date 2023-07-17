<?php

/**
 * Autor carlos neira sanchez
 * Proyecto en estudio
 */


function miSwitch($variable){
    
    switch ($variable){
        case 'rojo': echo 'MI variable es roja';
            break;
        case 5: echo 'Mi variable es un numero';
            break;
        case 'cinco': echo 'MI variable es cinco escrito';
            break;
        default: echo 'Ninguno de los anteriores';
            
    }
     
}

 #miSwitch(5); 

/**
 * OPerador ternario
 */

$var = 2;
$primero = 'Es prueba';
$segundo = 'No es prueba';
$primeroNum = 10;
$segundoNum = 20;
#echo ($var >= 2 ? $primeroNum : $segundoNum);

/**
 * Bucle for con break
 */

function miFor($var){

    $tamanio = count($var); //Evitamos la comprobación cada vez
    for($i=0; $i < $tamanio; $i++){
        echo 'i vale : '.$i.' $var vale: '.$var[$i].'. <br>';
        if($i == 18) {
            break;
        }
    }
    
    echo 'Hemos acabado en la funcion.<br>';
}


#miFor(range( $primeroNum, $segundoNum, 2));

/**
 * Bucle con continue
 */

function saltoContinue($var){

        foreach ($var as $tmp){
            if ($tmp == 5){
                continue;
            }
            
            echo 'Tmp vale: '.$tmp.'<br>';
        } 
}

#saltoContinue(range(0,10));


/**
 * 
 * Range puede recorrexr un array de letras
 */
function rangeLetras($var){
    
    foreach($var as $letra){
        echo 'Pasamos la letra '.$letra.'<br>';
        
        if ($letra == 'e'){
            
            echo 'La \'e\' estaba. <br>';
            break;
        }
    }
}

$letras = array('a', 'b', 'c', 'e', 'h', 'i');
#rangeLetras(range('c', 'h'));

/**
 * for comparando letras
 */

function forLetras($arr){
    
    for($i = 'a'; $i != $arr; $i++){
        echo 'i vale: '.$i.'. <br>';
        if($i == $arr){
            break;
        }
    }
    echo 'el valor de $i: '.$i.' es igual al valor pasado: '.$arr;
}

#forLetras('m');

/**
 * El valor de la segunda expresion se evalua
 * en cada ciclo, ojo al eliminar elementos 
 * de un array
 */




/**
 * Goto
 * 
 */
for($i=0,$j=50; $i<100; $i++) {
  while($j--) {
    if($j==17) goto end;
    
  }  
}
echo "i = $i".'<br>';
end:
echo 'j alcanzó 17';


/**
 * Metodo list
 */

$resultado = $pdo->query("SELECT id, nombre, salario FROM empleados");
while (list($id, $nombre, $salario) = $resultado->fetch(PDO::FETCH_NUM)) {
    echo " <tr>\n" .
          "  <td><a href=\"info.php?id=$id\">$nombre</a></td>\n" .
          "  <td>$salario</td>\n" .
          " </tr>\n";
};