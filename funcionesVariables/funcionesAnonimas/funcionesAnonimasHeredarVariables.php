<?php

$mensaje = 'hola';

//sin use
$ejemplo = function(){
    echo 'Sin use ';
    var_dump($mensaje);
    echo '<br>';

};

$ejemplo();

//Heredar $mensaje
$ejemplo = function() use ($mensaje){
    echo 'con use ';
    var_dump($mensaje);
    echo '<br>';
    
};

$ejemplo();

$mensaje = "mundo";

echo "hemos cambiado el valor a mensaje volvemos a llamar a ejemplo sin "
. " pasar por referencia "."<br>";
$ejemplo();
//var_dump($ejemplo);



$ejemplo = function() use (&$mensaje){
    echo' paso mensaje por referencia ';
    
    var_dump($mensaje);  
    echo '<br>';
};

$ejemplo();

echo $mensaje.'<br>';

$ejemplo = function($arg) use($mensaje){
    echo 'pasandole argumentos ';
    var_dump($arg." ".$mensaje);
    echo '<br>';
};

$ejemplo("hola");



//Pasar una funcion anonima
//a otra funcion
function decir($algo){
    $p = $algo();
    echo "p vale => ".$p;
}


decir(function(){
    $d = 1;
    $x = 2;
    return ($d+$x);
    
});

/*
 * Cuando se emplea use, 
 * se hereda una variable del ámbito padre. 
 * Esto no es lo mismo que usar variables globales.
 *  El ámbito padre de una clausura es el ámbito de la 
 * función en el que la clausura fue declarada 
 * (no desde la función desde la que se llamó).
 */
global $miGlobal;

function declaroClousure($color){

    $valor = 5;
    $producto = "cualquiera";
    $miGlobal = "variable global"; //LA COJE
    
    $mostrar = function($color,$miGlobal) use ($valor,$cantidad){
        //$miGlobal = "variable global"; LA COJE

        echo '<br>';
        echo "valor vale ".$valor.'<br>';
        echo "cantidad vale ".$cantidad.'<br>';
        echo "es de color ".$color.'<br>';
        echo "Variable global ".$miGlobal."<br>";
        
        echo '<br>';
        
    };
    
    echo $mostrar($color,$miGlobal);
 
 // declaroClousure()  
}

function llamarDeclaroClosure(){
    
    $cantidad = 10;
    $color = "marron";
    declaroClousure($color);
    
}

llamarDeclaroClosure();



