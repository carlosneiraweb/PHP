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
       echo '<h2>Los métodos en PHP admiten recivir más o menos parametros de los experados.</h2>';
       echo '<h5>Mandando más parametros de los experados</h5>';
       echo 'Muestra error pero realiza la operación.'.'<br>';
       sumar(5,10,20,30);
       
      function sumar($a, $b, $c){
          echo 'La suma total es: '.$a+$b+c;
      } 
      
      echo '<h5>Mandando menos parametros de los experados</h5>';
      echo 'No muestra ni error.'.'<br>';
      restar(10,20,30,5);
      
      function restar($a,$b,$c){
          echo 'La resta total es: '.$a-$b-$c;
      }
        ?>
    </body>
</html>
