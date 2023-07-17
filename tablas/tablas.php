<?php

/*
  Created on : 15-mar-2016, 19:32:06
  Author     : carlos
  Nombre Archivo : tablas.php
 */

$array = [
    "foo" => "bar",
    "bar" => "foo"
];
//echo $array{"foo"};

echo '<h3>Declaracion de tablas indexeadas.</h3>' . '<br>';
$pr = array('title' => 'una histria',
    'author' => 'desconocido',
    'año' => '2010');
echo 'Mostramos la tabla.<br>';
print_r($pr); //También muestra objetos
echo '<br>';
echo 'Mostramos el año: ' . $pr['año'].'<br>';
echo 'Lo cambiamos: '.'<br>';
$pr['año'] = 2015;
echo $pr['año'].'<br>';

echo 'Varias formas de crear una tabla.<br>';
$personas = array('Jose', 'Manuel', 'Pedro');
var_dump($personas);
echo '<br>';
$pueblos[0] = 'Valencia';
$pueblos[1]= 'villa';
var_dump($pueblos);
echo '<br>';
$numeros[] = 10;
$numeros[] = 5;
var_dump($numeros);
echo '<br>';
echo '***************************************.<br>';
 

echo '<h5>Mover el cursor interno por una tabla.</h5>'.'<br>';
$nombres = array("carlos", "jose", "pedro", "amparo");
echo 'Mostramos el array nombres: '.  print_r($nombres, true);//true devuelve la informacion,no solo la muestra
echo '<br>';
echo 'El actual elemento es: '.current($nombres).'<br>';
echo 'El siguiente elemento es: '.next($nombres).'<br>';
echo 'Y su indice es: '.key($nombres).'<br>';
echo 'El siguiente elemento es: '.next($nombres).'<br>';
echo 'El elemento anterior es: '.prev($nombres).'<br>';
echo 'El primer elemento es: '.reset($nombres).'<br>';
echo 'El ultimo elemento es: '.end($nombres).'<br>';
echo 'El elemento previo es: '.prev($nombres).'<br>';
echo'<br>';

echo 'Estos méodos devuelven /"false/" si un elemento no se puede extraer.<br>'
. ' Lo que puede probocar un error si un elemento de la tabla tiene un valor de false de verdad. <br>'
        . 'Para evitar este problema podemos usar la función each(). Es devuelve una tabla de 4 elementos. '
        . 'Si no puede recuperar un elemento devuelve false, si recupera un elemento con false devuelve'
        . ' la tabla de 4 elementos.';
$tbl_each = array("title" => "La cosa",
                  "autor" => "Steben",
                  "año" => "2020");
echo '<br>';
var_dump($tbl_each).'<br>';
$mostrar = each($tbl_each);
echo '<br>';
echo "Key: ".$mostrar[0].'<br>';
echo "Value: ".$mostrar[1].'<br>';
echo "Key: ".$mostrar["key"].'<br>';
echo "Value: ".$mostrar["value"].'<br>';

echo '<br>';
echo 'Puestoque si recupera un elemento con valor false sigue devolviendo una tabla de 4 elementos,'
. ' podemos usarlo junto con un while para recuperar valores de una tabla con elementos false.'.'<br>';
$tbl_false = array('primero' => 1,
                    'segundo '=> false,
                    'tercero' => 3,
                    'cuarto' => 4);
                var_dump($tbl_false);
echo'<br>';
echo 'Mostramos con while y each().'.'<br>';
while($element = each($tbl_false)){  //Otra forma de instanciar un array
    echo $element[0].' : ';
    if($element[1] === false){ //Esta modificación no afecta  a la tabla original
        $element[1] = 'hola';
    }
    echo $element[1];
    echo '<br>';
}

echo '<br>';
echo 'Recorremos la misma tabla con foreach(). Foreach() hace una copia de la tabla,'
. ' si modificamos elementos en la tabla la original no se modifica.'.'<br>';
foreach($tbl_false as $k => $v){
    echo $k.' : ';
    echo $v;
    echo '<br>';
}

echo '<br>';
echo 'Para modificar elementos en la tabla original,'.'<br>';
foreach ($tbl_false as $k => & $v){
    if($v === false) $v = 2;
    echo $v.'<br>';
}
unset($v);//Eliminamos la referencia de $v a la tabla 
echo 'Mostramos tabla original, modificada en el foreach.'.'<br>';
var_dump($tbl_false);
echo '<br>';
echo '***************************************.<br>';

echo'<h3>Tablas Vidimensionales.</h3>'.'<br>';
$libros = array(
    array(
      'titulo' => 'La cosa',
      'autor' => 'Steben',
      'año' => 2010
    ),
    array(
      'titulo' => 'Mentiras',
      'autor' => 'Manolo santiestebam',
      'año' => 2008
    ),
    array(
      'titulo' => 'El tren del destino',
      'autor' => 'Maria gonzalez',
      'año' => 1998
    ),  
);
echo 'Haceder a elementos individuales: '.$libros[1]['titulo'].'<br>';
echo 'Mostramos tabla libros.'.'<br>';
echo '<pre>';
print_r($libros);
echo '</pre>';
echo '<br>';
echo 'Mostramos la tabla con un foreach().'.'<br>';
$numLibro = 0;
foreach ($libros as $libro){
    $numLibro++;
    echo '<br>';
    echo 'Número de libro: '.$numLibro.'<br>';
    foreach($libro as $k => $v){
        echo $k.' : '.$v;
        echo '<br>';
    }
}

valuarSegundaExpresion();
function valuarSegundaExpresion(){
    
$array = array(
        'pop0',
        'pop1',
        'pop2',
        'pop3',
        'pop4',
        'pop5',
        'pop6',
        'pop7',
        'pop8'
    );
    echo "Tot Before: ".count($array)."<br><br>";
    $count = count($array);//para evitarlo
       $p = 0;
    for ($i=0; $i< count($array); $i++) {
     
        if ($i === 3) {
            unset($array[$i]);
        }
        echo "Count: ".count($array). " - Position: ".$i." con valor: ".$array[$p++].'<br>';
    }
    //sort($array); Posible solución, buscar el sitio adecuado
    echo "<br> Tot After: ".count($array)."<br>";
   
}
echo '***************************************.<br>'; 

echo '<h3>Métodos para tabla.</h3>'.'<br>';

$numeros = array(1,2,3,4,5,6,7);
echo '<h5>Array_slice()Extraer un rango de elementos de una tabla.'.
        'Nos devuelve una nueva tabla, no toca la original</h5>.<br>';
print_r(array_slice($numeros, 1, 2, true)); //por donde empieza y el número total, true para preservar los indices
echo '<br>';


echo '<h5>Ordenar tablas indexeadas con sort() y rsort().</h5> Letras primero que números.'
. 'Devuelve true si consigue ordenar la tabla'.'<br>';
$tbl_ordenar = array('primero','segundo', 'tercero', 'cuarto' );
echo'Mostramos tabla original.'.'<br>';
print_r($tbl_ordenar);
echo '<br>';
echo 'Mostramos ordenada con sort().'.'<br>';
sort($tbl_ordenar);
print_r($tbl_ordenar);
echo '<br>';
echo 'Ahora en descendiente con rsort().'.'<br>';
rsort($tbl_ordenar);
print_r($tbl_ordenar);
echo '<br>';
echo '<br>';
echo 'Ordenamos tablas asociativas, con assort() y arsort().'
. 'Ordenas los valores de la tabla, impotante.'.'<br>';
$tbl_ordenar_asociativa = array('titulo' => 'Historias del campo',
                                'autor' => 'Antoni Percuson',
                                'año' => 1959
                        );
print_r($tbl_ordenar_asociativa);
echo '<br>';
echo 'Mostramos ordenada por los valores.'.'<br>';
asort($tbl_ordenar_asociativa);
print_r($tbl_ordenar_asociativa);
echo '<br>';
echo 'Ordenada al reveres.'.'<br>';
arsort($tbl_ordenar_asociativa);
print_r($tbl_ordenar_asociativa);
echo'<br>';
echo '***************************************.<br>'; 

echo '<h5>Ordenar tablas asociativas por clave con ksort() y krsort()</h5>.'.'<br>';
$tbl_ordenar_clave = array('titulo' => 'Historias del campo',
                                'autor' => 'Antoni Percuson',
                                'año' => 1959
                            );
echo'Mostramos tabla sin ordenar.'.'<br>';
ksort($tbl_ordenar_clave);
print_r($tbl_ordenar_clave);
echo '<br>';
echo 'Mostramos tabla ordenada'.'<br>';
print_r($tbl_ordenar_clave);
echo '<br>';
krsort($tbl_ordenar_clave);
echo 'Mostramos tabla ordenada de menor a mayor.'.'<br>';
print_r($tbl_ordenar_clave);
echo'<br>';
echo '***************************************.<br>';

echo '<h5>Ordenación multiple con array_multisort().</h5>'.'<br>';
echo 'Ejemplo de 3 tablas independientes pero relcionadas entre ellas.'.'<br>';
$autores = array ('Sergio', 'Silvia', 'Rodrigez');
$titulos = array('El fin del paraiso', 'Una historia para dos', 'El tren del destino');
$año = array( 1998, 2014, 1996);
echo 'Mostramos las tres tablas.'.'<br>';
print_r($autores);
echo '<br>';
print_r($titulos);
echo '<br>';
print_r($año);
echo '<br>';
echo 'Ordenamos por la primera tabla que se le pasa al método, en este caso año.'.'<br>';
array_multisort($año, $titulos, $autores);
//array_multisort($año, SORT_ASC, $titulos); Hay que investigarlos
print_r($año);
echo '<br>';
print_r($autores);
echo '<br>';
print_r($titulos);
echo'<br>';
echo '***************************************.<br>';


echo '<h5>Añadir y eliminar  elementos de tabla.</h5>'.'<br>';
$anaElimi = array (1,2,3,4,5,6);
echo 'Mostramos tabla original.'.'<br>';
print_r($anaElimi);
echo '<br>';
echo '<h5>Array_unshift() Añade nuevos elementos al inicio de la tabla.</h5>'.'<br>';
echo 'Tanto unshift como push podemos agregar tablas a tablas'.'<br>';
array_unshift($anaElimi, -2,-1,0);
print_r($anaElimi);
echo'<br>';
echo '<h5>Array_push() Añadimos elementos al final de la tabla.</h5>'.'<br>';
array_push($anaElimi, 1000, 1005);
print_r($anaElimi);
echo '<br>';
echo '<h5>Array_shift() Elimina el primer elemento de la tabla y devuelve su valor, pero no devuelve su clave.</h5>'.'<br>';
$tbl_shift = array( 'uno' => 1,
                    'dos' => 2,
                    'tres' => 3
                    );
                    print_r($tbl_shift);
echo '<br>';
$pri = array_shift($tbl_shift);
echo 'Valor del primer elemento: '.$pri.'<br>';
echo'Imprimimos la tabla: '.'<br>';
print_r($tbl_shift);
echo '<br>';
echo '<h5>Array_pop() Elimina el último elemento de la tabla.</h5>'.'<br>';
$ult = array_pop($tbl_shift);
echo 'Mostramos el último valor.'.'<br>';
echo $ult.'<br>';
echo 'Mostramos la tabla.'.'<br>';
print_r($tbl_shift);
echo '<br>';
echo '***************************************.<br>';

echo '<h5>Array_slice() Eliminamos elementos en la mitad.</h5>'.'<br>';
echo 'Podemos tanto eliminar un rango de elementos y reemplazarlos con otros o insertar nuevos elementos.'.'<br>';
$personas = array ('Jose', 'Pedro', 'David');
$masPersonas = array ('Lucia', 'Cristina');
echo 'Mostramos dos tablas.'.'<br>';
print_r($personas);
echo '<br>';
print_r($masPersonas);
echo '<br>';
echo 'array_splice($personas,1,1, $masPersonas); //Tabla a la que añadir/ por donde empezar/ numero a eliminar/tabla que añadir'.'<br>';
array_splice($personas,1,1, $masPersonas);
print_r($personas);
echo '<br>';
echo 'Otro ejemplo: array_splice($personas, 0,2,$personas)'.'<br>';
$xp = array(1,2,3,4);
array_splice($personas, 0,2,$personas);
print_r($personas);
echo '<br>';
echo 'Eliminando el segundo parametro.'.'<br>';
echo 'array_splice($personas,1)'.'<br>';
array_splice($personas,1);
print_r($personas);
echo '<br>';
echo '***************************************.<br>';

echo '<h5>Array_merge() Combinar tablas</h5>.'.'<br>';
echo 'Toma una o más tablas y devuelve una tabla convinada. No se alteran las tablas originales.'.'<br>';
print_r($xp);
echo '<br>';
print_r($masPersonas);
echo '<br>';
echo 'array_merge($xp, $masPersonas);'.'<br>';
$combinadas = array_merge($xp, $masPersonas);
print_r($combinadas);
echo '<br>';
echo 'Tanto array_push o array_unshift() crean tablas bidimensionales. Ejemplo:'.'<br>';
echo 'array_push($xp, $masPersonas);'.'<br>';
array_push($xp,$masPersonas);
print_r($xp);
echo '<br>';
echo 'Si se añade una clave de cadena que ya existia, esta sobre escribe a la existente.'.'<br>'
     .'Pero si se hace con una clave númerica esta se añade al final'.'<br>'.
      'También se puede indexear una tabla con claves númericas pasando la tabla.'.'<br>';
echo '<h5>Array_replace() conserva las claves númericas.</h5>'.'<br>';
echo 'Si la clave pasada en el segundo o ... El valor de la clave del primer array será'.'<br>'.
        ' sobreescrito por el valor del mismo indice del segundo array().'.'<br>';
        
$rep_a = array(1,2,3,4,5);
$rep_b = array(0 => 'tomates', 10 => 'melones');
$rep_final = array_replace( $rep_a, $rep_b);
print_r($rep_final);
echo '<br>';
echo '***************************************.<br>';


echo '<h5>Conversion entre tablas y cadenas.'.'<br>';
echo 'Utilizar los métodos string implode() y explode()'.'<br>';
echo 'explode() devuelve un array de una cadena separada por el limitador.'.'<br>'.
        '$string = "casa-piso-salon".'.
            ' explode(-, $string);'.'<br>';
echo '***************************************.<br>';


echo '<h5>Convertir una tabla en una lista de variables.</h5>'.'<br>';
print_r($rep_a);
echo '<br>';
echo 'list($uno, $dos, $tres, $cuatro, $cinco) = $rep_a;'.'<br>';
list($uno, $dos, $tres, $cuatro, $cinco) = $rep_a;
echo $uno.'<br>';
echo $dos.'<br>';
echo $tres.'<br>';
echo $cuatro.'<br>';
echo $cinco.'<br>';
echo '<h5>Ejemplo combinado de metodo each() y list().</h5>'.'</br>';
$array_libros = array('titulo' => 'Historias de fantasmas',
                      'autor' => 'Steben',
                       'anio' => 'Año');
                   print_r($array_libros);
while(list($k, $v) = each($array_libros)){
    echo 'Key: '.$k.'<br>';
    echo 'Value: '.$v.'<br>';
    echo '<br>';
}




/*
                Algunos métodos que pueden ser interesantes

array_column {Interesante para recojer datos devueltos de una bbdd}
array_combine{Dadas dos tablas utiliza 1 para las keys y la otra para el value}ar
array_count_values{Devuelve un array en el que el key es un elemento de la tabla y el values es el número de repeticiones}
array_diff{Compara arrays y devuelve los elementos que no esten presentes}
array_fill{LLenas un array indexeado con el parametro que le pases convirtiendolo en asociativo}
array_filter{Devuelve un elemento de un array si cumple una función calback}
array_key_exists{Devuelve true si la key dada existe}
array_pad{Devuelve un array con la longitud expecificada, se rellena si hace falta con el elemento pasado como paramtro}
array_rand{Devuelve las claves de un array aleatoriamente}
array_reverse{}
in_array{Comprueba si existe un valor}
array_search{Busca un valor determinado y devuelve la clave}
array_unique{Elimina duplicados del array}
array_values{Devuelve todos los valores de un array}
array_walk{Aplica una función defenida por el usuario a cada elemento}
array_map{Devuelve un array que contiene todos los elementos de array1 después de haber aplicado una función callback}
 */


 
