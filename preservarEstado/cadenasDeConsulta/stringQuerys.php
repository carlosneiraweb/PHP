<!DOCTYPE html>
<!--
 author Carlos Neira Sanchez
 mail arj.123@hotmail.es
 telefono ""
 nameAndExt stringQuerys.php
 fecha 18-abr-2016
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../common.css"/>
    </head>
    <body>
        <h1>Cadenas de consultas</h1>
        <p>
            Las cadenas de consulta son una forma rápida de pasar pequeñas cantidades de datos <br>
            por el navegador.Como recordar las palabras claves utilizadas por el usuario. Se deben utilizar<br>
            solo en situaciones donde enviar datos no comprometa la seguridad.<br>
            Estan son muy sencillas de alterar por el usuario.<br>   
        </p>
        <?php
        echo'<h3>Ejemplo de URL que contiene una cadena de consulta utilizada en un enlaze</h3>';
        $nombre ='carlos';
        $apellido = 'neira';
        $query = 'nombre='.$nombre.'&amp;apellido='.$apellido;
        echo'<p><a href="moreInfo.php?'.$query.'">Averigua</a></p>';
        echo'La query vale: '.$query.'<br>';
        
        echo'<h5>urlencode() puede codificar cualquier cadena al utilizar codificación URL</h5>';
        echo'Las especificaciones para una cadena de consulta permiten sólo usar : '.'<br>';
        echo"letras, números y símbolos -_.,!~'";
        
        $nombre = 'carlos';
        $web = 'http://www.example.com';
        $deporteFavorito = 'Ice Hockey';
        $query2 = "nombre=".  urlencode($nombre)."&amp;web=".urlencode($web)."&amp;deporteFavorito=".urlencode($deporteFavorito);
        echo'<p><a href="moreInfo.php?'.$query2.'">Find</a></p>';             
        echo 'Query con urlencode()'.$query2.'<br>';
        echo'Podemos decodificar la query con urldecode.'.'<br>';
        echo urldecode($query2).'<br>';
        
        echo'<h5>http_build_query() toma una tabla asociativa u objeto de nombres de campo y valores y devuelve toda la cadena de consulta.</h5>';
        $fields = array(
            "nombre" => 'carlos',
            "web" => 'http://www.example.com',
            'deporteFavorito' => 'Ice Hockey'
        );
        
        echo '<p><a href="moreinfo.php?'.  htmlspecialchars(http_build_query($fields)).'">Find</a></p>';
        
        echo'<h2>Números cuadrados con Paginación</h2>';
        
        define("PAGE_SIZE", 10);
        $start = 0;
        
        if(isset($_GET['start']) and $_GET['start'] >= 0 and $_GET["start"] <= 1000){
            $start = (int)$_GET['start'];
        }
        
        $end = $start + PAGE_SIZE -1;
             
        ?>
        
        <h2>Number squaring</h2>
        
        <p>Display the squares of the numbers<?php echo $start ?>to<?php echo $end?>:</p>
        <table cellspacing="0" border="0" style="width: 20em; border:1px solid #666;">
            <tr>
                <th>n</th>
                <th>n<sup>2</sup></th>
            </tr>
            <?php
            for($i= $start; $i<= $end; $i++){?>
            <tr<?php if($i % 2 != 0)echo 'class="alt"'?>>
                <td><?php echo $i?></td>
                <td><?php echo pow($i, 2)?></td>
            </tr>
            <?php } ?>
            
            
        </table> 
        
        <p>
            <?php if($start > 0) { ?>
            <a href="stringQuerys.php?start=<?php echo $start - PAGE_SIZE ?>">&lt; Previous Page</a> | <?php } ?>
            <a href="stringQuerys.php?start=<?php echo $start + PAGE_SIZE?>">Next Page &gt;</a>
        </p>
        
        
    </body>
</html>
