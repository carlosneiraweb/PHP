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
       
        $counterFile = "count2.dat";

        if(!file_exists($counterFile)){
            if(!($handle = fopen($counterFile, 'w'))){
                die("No se puede abrir el archivo");
            }else{
                fwrite($handle, 0);
                fclose($handle);
            }
        }
  
        if(!($handle = fopen($counterFile, 'r'))){
            die("No se puede leer el archivo");
        }
        
        $counter = (int) fread($handle, 20);
        fclose($handle);
        
        $counter++;
        echo '<p>Tú eres el número de visitante: '.$counter.'.'.'<br>';
        
        if(!($handle = fopen($counterFile, 'w'))){
            die("No se puede abrir el archivo");
        }
        fwrite($handle, $counter);
        fclose($handle);
        
        
        
        
        
        ?>
    </body>
</html>
