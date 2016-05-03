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
       class MyClass{
          
       } 
    
       $obj = new MyClass();
       echo 'La clase expedifica de este objeto es: '.  get_class($obj).'<br>';
       
       class Fruit{}
       class SoftFruit extends Fruit{}
       class HardFruit extends Fruit{}
       
       $banana = new SoftFruit();
       $apple = new HardFruit();
       eatSomeFruit(array($banana, $apple));
       function eatSomeFruit(array $fruit){
           foreach ($fruit as $x){
               if($x instanceof Fruit){
                   echo 'Soy una fruta';
               }
           }
       }
        
        
        
        
        
        ?>
    </body>
</html>
