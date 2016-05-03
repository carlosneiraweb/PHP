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
        
        echo '<h3>Las variables dentro de un método no son accesibles.</h3>'.'<br>';
        function saludo(){
            $hola = 'Hola';
            $mundo = 'Mundo';
            return $hola.$mundo;
        }
        
        echo saludo();
        echo 'El valor de $hola es: '.$hola; //Undefained
        echo 'El valor de $mundo es: '.$mundo;//Undefained
        
        
        echo'<h3>Variables Globales</h3>'.'<br>';
        
        $fuera = 'Hola'; //Solo es accesible desde cualquier parte del script que no este dentro de una función
        function accederVariable(){
            echo 'Variable $fuera esta declarada fuera de la función, y si no es declarada global no es accesible: '.$fuera.'<br>';
            echo 'PHP difiere en esto a la mayoría de lenguajes.'.'<br>';
        }
        accederVariable();
        
        echo '<h5>Declaramos una variable global.</h5>'.'<br>';
        $glb = "Hello World!";
        function declararGlobal(){
            global $glb;
            echo "Al declararla global dentro de la función si se puede acceder ".$glb."<br><br>";
        }
        
        declararGlobal();
        
        echo '<h5>Se declara y instancia en un método una varible global y se muestra en otro.</h5>'.'<br>';
        function inicializo(){
            global $saludo, $anotherGlobal;
            $saludo = 'Hola Mundo!';
        }
        
        function muestro(){
            global $saludo; //En cada método se valla a utilizar hay que declara global la variable
            echo $saludo.'<br><br>';
        }
        
        inicializo();
        muestro();
        
        
        echo '<h5>Acceso a variables SUPERGLOBALES</h5>'.'<br>';
        echo '$GLOBALS Contiene una lista con todas las variables globales.'.'<br>';
        global $otraGlobal;
        $otraGlobal = 'Cuidado con modificar este tipo de variables.'.'<br>';
        function superGlobales(){
            global $otraGlogal;
            $otraGlogal= 'adios';
            echo $GLOBALS["otraGlobal"].'<br>';
            echo $otraGlogal;
        }
        
        superGlobales();
        
        echo '<h5>El mismo nombre de una variable puede tener valores distintos.</h5>';
        function test() {
            $foo = "variable local";

            echo '$foo en el ámbito global: ' . $GLOBALS["foo"] . "<br>";
            echo '$foo en el ámbito simple: ' . $foo . "<br>";
        }

        $foo = "Contenido de ejemplo";
        test();
        echo '<br>';
      
        ?>
    </body>
</html>
