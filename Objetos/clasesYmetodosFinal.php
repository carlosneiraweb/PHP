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
        
        final class HandsOffThisClass{
            public $someProperty = 123;
            public function someMethod($f){
                echo 'Soy una clase final'.$f;
            }
            public final function handsOffThisMethod(){
                echo'<p>Soy un método final</p>';
            }
       //clase     
        }
        /*
        class Children extends HandsOffThisClass{
            public function mostrar(){
            echo 'Genera error, no se puede heredar de una clase final'.'<br>';
            }
        }
        
        */
            
         
          $obj = new HandsOffThisClass;
          echo $obj->someProperty.'<br>'; 
          $obj->someMethod('hola');
        ?>
    </body>
</html>
