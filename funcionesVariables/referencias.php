<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<h5>Pasar variables sin referencia a una función.</h5>'.'<br>';
         
        function resetCounter($x){
            $x = 0;
        }
        
        $y = 0;
        $y++;
        $y++;
        $y++;
        echo 'Valor de $y antes de mandar sin referencia: '.$y.'.<br>';
        echo 'Mandamos a $y a la función.'.'<br>';
        resetCounter($y);
        echo 'Después de mandar $y a la función su valor no se ve modificado: '.$y.'<br>';
        
        
        
        echo '<h5>Pasar variables por referencia a una función.</h5>';
        function myFuntion(&$x){ //mismo nombre que la que recive
            $x = 0;
        }
        $y = 0;
        $y++;
        $y++;
        $y++;
        echo '$y antes de mandar a la función: '.$y.'<br>';
        myFuntion($y);
        echo '$y después de mandar a la función: '.$y;
        
        
        echo '<h5>Devolver referencias desde la función.</h5>'.'<br>';
        echo 'Básicamente lo que hacemos es tener dos variables que apuntan a una misma variable'.'<br>';
        $number= 5;
        function & getNumber(){
            global $number;
            return $number;
        } 
        
        $ref_number = & getNumber();
        $ref_number++;
        echo "\$number vale: = $number".'<br>';
        echo "\$ref_number vale: = $ref_number".'<br>';
        
        
        echo '<h5>Pasar un array a una función.</h5> '.'<br>';
        $numeros = array(1,2,3,4,5,6);
        echo 'Mostramos array: '.  print_r($numeros);
        echo '<br>';
        echo 'Provamos a pasar el array a un método con indicación.'.'<br>';
        mostrarArray($numeros);
        echo 'Todo bien, probamos a pasarle otro tipo de variable.'.'<br>';
        mostrarArray($i = 10);
        
        
        function mostrarArray(array $test){
            foreach ($test as $key => $value){
                echo 'Indice: '.$key.' Valor: '.$value.'<br>';
            }
        }
        ?>
    </body>
</html>
