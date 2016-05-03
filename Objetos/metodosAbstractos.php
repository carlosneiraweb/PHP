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
        echo '<h2>Clases abstractas</h2>';
        echo '<h5>Un método abstracto es obligado implementarlo en las'.
                ' clases que herede, a menos que se declaren abstractas.<br>'.
                ' Una clase abstracta puede tener métodos '.
                ' abstractos y no abstractos.</h5>';
        
                abstract  class Shape{
            private $color= "black";
            private $relleno = "false";
            
            function getColor() {
                return $this->color;
            }

            function setColor($color) {
                $this->color = $color;
            }

            public function isFill(){
                return $this->relleno;
            }
            
            public function fill(){
                $this->relleno = true;
            }
            
            public function makeHollow(){
                $this->relleno = false;
            }
            abstract public function getArea();


            //clase   
        }  
        
        class Circle extends Shape{
            private $radius = 0;
            
            function getRadius() {
                return $this->radius;
            }

            function setRadius($radius) {
                $this->radius = $radius;
            }
            //Método de obligada implementación
            public function getArea(){
                return M_PI * pow($this->radius, 2);
            }            
              
        //class    
        }
        
        class ShapeInfo{
            private $shape;
            public function setShape(Shape $shape){
                $this->shape = $shape;
            }
            public function showInfo(){
                echo "<p>The shape's color is: ".$this->shape->getColor();
                echo ", and its area is ".$this->shape->getArea()."</p>";
            }
            
        }
        
        
        $myCircle = new Circle();
        $myCircle->setColor('green');
        $myCircle->makeHollow();
        $myCircle->setRadius(5);
   
        
        $info = new ShapeInfo();
        $info->setShape($myCircle);  
        $info->showInfo();
      
        
        
        
        
        
        
        
        
        
        
        /*
        $myCircle = new Circle;
        $myCircle->setColor("red");
        $myCircle->fill();
        $myCircle->setRadius(4);
        echo '<h6>My Circle</h6>';
        echo "<p>My circle has a radius of ".$myCircle->getRadius()."</p>";
        echo "<p>It is ".$myCircle->getColor(). " and it is ".
                ($myCircle->isFill() ? "filled" : "hollow")."</p>";
        echo "The area de myCircle is: ".$myCircle->getArea()."</p>";
        */
        
        ?>
    </body>
</html>
