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
        
        function saludo($font, $size = 3){ //Con parametro opcional
            echo "<p style=\"font-family: $font; font-size:{$size}em;\">Hello World!</p>";
        }
        //saludo("Helvetica", 3);//Sin parametro opcional
        saludo("Times");
        ?>
    </body>
</html>
