<?php

print "<br> ******************************* <br>";
echo 'con invoke <br>';
function title($title, $name)
{
    return sprintf("%s. %s\r\n", $title, $name);
}

$funcion = new ReflectionFunction('title');
echo $funcion->invoke("sr","fff");
echo '<br>';
echo ReflectionFunction::export('title',false);


