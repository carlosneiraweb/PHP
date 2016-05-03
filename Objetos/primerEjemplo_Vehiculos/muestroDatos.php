<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//Función para cargar clases 
//Evitamos ataque al evitar poder ascender por los directorios ".."
function __autoload($class){
    $class = str_replace("..", "", $class);
    require_once("classes/$class.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
$uno = new Car;
$uno->setType('tourism');
$uno->year= 2000;
$uno->manufacturer = 'ford';
$uno->setSeats(4);
$uno->setBranch('tourism');

echo 'My car is from '.Car::COUNTRY.' the total is '.Car::$total.'. Its type is '.$uno->getType().'<br>';
echo 'This is made in the '.$uno->year.' years and it has '.$uno->getSeats().'total. '
        . 'The manufacturer is '.$uno->manufacturer.' y tiene '.Car::WHEEL.
        ' and its branch is '.$uno->getBranch().'<br>';
echo 'We are going to accelerate our car.'.'<br>';
while($uno->accelerate()){
    echo 'Our velocity is: '.$uno->getSpeed().'<br>';
    if($uno->getSpeed() == 100){
        echo 'We are reached the 100 km/h'.'<br>';
    }
}
echo 'We are to brake!!!'.'<br>';
while($uno->brake()){
    echo "Our are stopping".$uno->getSpeed().'<br>';
    if($uno->getSpeed() == 0){
        echo'We are stoped '.$uno->getSpeed().'<br>';
    }
        
}

echo 'El rendimiento de nuestro coche es: '.Car::rendimiento(100, 8). ' por cada 100 km';


        ?>
    </body>
</html>
