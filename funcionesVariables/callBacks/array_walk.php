<?php

$frutas = array("d" => "limon", "a" => "naranja", "b" => "banana", "c" => "manzana");

function test_alter(&$elemento1,$clave, $prefijo){
    //echo "$clave => $elemento1"."<br/>";
    
    $elemento1 = "$prefijo : $elemento1";
}

function test_print($elemento2, $clave){
    echo "$clave . $elemento2 <br />\n";
}

echo "OJO"."<br/>";
echo "Normalmente, callback asume dos parámetros. <br/>".
" El primero, los valores de los parámetros de array, y el segundo la clave/índice. "."<br/>".
"Solo admite un tercer parametro para el callback"        . "<br/>";

echo "Antes ... <br>";

array_walk($frutas, 'test_print');

array_walk($frutas, "test_alter","fruta");
echo " ... y después: <br/> \n";
array_walk($frutas,'test_print');



echo "array_walk_recursive"."<br><br>";

function myfunction($value,$key)
{
echo "The key $key has the value $value<br>";
}
$a1=array("a"=>"red","b"=>"green");
$a2=array($a1,"1"=>"blue","2"=>"yellow");
array_walk_recursive($a2,"myfunction");
?>


