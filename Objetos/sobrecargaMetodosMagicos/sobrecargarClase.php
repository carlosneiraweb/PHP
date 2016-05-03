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
       
        class Car{
            
            public $manufacturer;
            public $model;
            public $color;
            private $_extraData = array();
            
            public function __get($propertyName){
                if(array_key_exists($propertyName, $this->_extraData)){
                    return $this->_extraData[$propertyName];
                    }else{
                        return null;
                    }
                }
            
            public function __set($propertyName, $propertyValue){
                $this->_extraData[$propertyName] = $propertyValue;
            }
                 
      //clase      
        }
        
        $myCar = new Car();
        $myCar->manufacturer = "Volswagen";
        $myCar->model = "Beetle";
        $myCar->color = "red";
        $myCar->engineSize = 1.8;
        $myCar->otherColors = array("green", "blue", "purple");
        
        echo'<H2>Some properties:</h2>';
        echo"<p>My car's manufacturer is: ".$myCar->manufacturer." .".'<br>';
        echo"<p>My car's engine size is: ".$myCar->engineSize.' .'.'<br>';
        echo"<p>My car's fuel type is: ".$myCar->fuelType.' .'.'<br>';
        echo'<h4>My car Object</h4>'.'<br>';
        echo '<pre>';
        print_r($myCar);
        echo'</pre>';
        
        
        
        
        
        ?>
    </body>
</html>
