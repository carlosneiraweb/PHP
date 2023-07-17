<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        echo '<h5>Ejemplo de variable static</h5>'.'<br>';
        function nextNumber(){
        static $cont = 0; //static   
            return ++$cont;
        }
        
        echo 'El total es: '.nextNumber().'<br>';
        echo 'El total es: '.nextNumber().'<br>';
        echo 'El total es: '.nextNumber().'<br>';
        
        
        echo '<h5>Ejemplo de función anónimas.</h5>'.'<br>';
        
        $mode = '+';
        $resultado = create_function('$a, $b', "return \$a $mode \$b;");
        echo $resultado(2,3);
        
      
        
        ?>
    </body>
</html>
