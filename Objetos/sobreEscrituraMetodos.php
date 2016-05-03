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
       
        class Fruit{
            
            public function peel() {
                echo "<p>I'm peeling the fruit...</p>";
            }
            public function slice(){
                echo "I'm slicing the fruit...</p>";
            }
            public function eat(){
                echo"<p>I'm eating the fruit.Yummt!!</p>";
            }
            
            public function consume(){
                $this->peel();
                $this->slice();
                $this->eat();
            }
            //class    
        }
        /**
         * qui sobreescribimos los métodos de la clase padre
         */
        class Grape extends Fruit{
            
            public function peel(){
                echo "<p>No need to peel a grape!!</p>";
            }
            
            public function slice(){
                echo "<p>No need to slice a grape!</p>";
            }
            
        //clase    
        }
        
        //Aqui vamos a hacer una sobreescritura parcial
        //Vamos a preservar los metodos de la clase padre,
        //pero añadiendo los de la clase hija
        
        class Banana extends Fruit{
            public function consume(){
                echo"<p>I'm breaking off a banana...</p>";
                parent::consume();
            }
        //clase    
        }
        
        echo '<h3>Consumming a apple...</h3>';
        $apple = new Fruit;
        $apple->consume();
        echo'<br>';
        echo '<h3>Consuming a grape....</h3>';
        $grape = new Grape;
        $grape->consume();
        a();
        function a(){
        echo '<h3>Consuming a Banana</h3>';
        $banana = new Banana;
        $banana->consume();
        
        }
        
        
        
        ?>
    </body>
</html>
